<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Http\Requests\CheckStaffLoginRequest;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{

    public function login(CheckStaffLoginRequest $request)
    {

        $credentials = $request->only('staff_id', 'password');


        if (Auth::guard('staff')->attempt($credentials)) {
            $user = Auth::guard('staff')->user();

            $token = $user->createToken('MyApp',['staff'])->plainTextToken;

            return response()->json(['success' => true, 'token' => $token, 'message' => 'Staff login successfully'], 200);

        }

        return response()->json(['success' => false, 'message' => 'Staff login failed.'], 404);

    }

    // public function staffDetails(Request $request) {
    //     $user = Auth::user();
    //     return response()->json(['data' => $user], 200);
    // }


    // public function staffList(Request $request) {
    //     $staff = Staff::all();
    //     return response()->json($staff, 200);
    // }



    public function changePassword(UpdateStaffRequest $request)
    {

        $staff_id = $request->staff_id;
        $new_pass = $request->new_pass;

        // $staff = Staff::find($staff_id);
        $staff = Staff::where("staff_id", $staff_id)->first();

        // Check if the current password provided in the request matches the existing password
        if (Hash::check($request->current_pass, $staff->password)) {
            // Current password matches, update the password
            $staff->password = Hash::make($new_pass);
            $staff->save();

            return response()->json(['success' => true, 'message' => 'Password updated successfully.'], 200);
        } else {
            // Current password doesn't match
            return response()->json(['success' => false, 'message' => 'Current password is incorrect.'], 422);
        }
    }



    public function logout(Request $request)
    {
        // $user = Auth::user();;
        $request->user()->currentAccessToken()->delete();

        return response()->json(['success' => true, 'message' => 'Staff logged out successfully'], 200);
    }




}
