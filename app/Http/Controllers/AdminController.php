<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Requests\CheckAdminLoginRequest;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function defaultLogin() {

        return response()->json(['success' => false, 'message' => 'Unauthenticated'], 401);

    }

    public function login(CheckAdminLoginRequest $request)
    {

        $credentials = $request->only('admin_id', 'password');


        if (Auth::guard('admin')->attempt($credentials)) {
            $token = Auth::guard('admin')->user()->createToken('admin-token')->plainTextToken;

            return response()->json(['success' => true, 'token' => $token, 'message' => 'Admin login successfully'], 200);

        }

        return response()->json(['success' => false, 'message' => 'Admin login failed.'], 404);

    }

    public function adminDetails(Request $request) {
        $user = Auth::user();
        return response()->json(['data' => $user], 200);
    }

    public function details(Request $request) {
        $data['admin'] = Admin::all();
        $data['staff'] = Staff::all();

        return response()->json($data, 200);
    }

    public function logout(Request $request)
    {
        // $user = Auth::user();;
        $request->user()->currentAccessToken()->delete();

        return response()->json(['success' => true, 'message' => 'Admin logged out successfully'], 200);
    }
}
