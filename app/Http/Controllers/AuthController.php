<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{


    public function index(){
        return view('auth.login');
    }


    public function login(Request $request){

        $request->validate([

            'username'=>'required',
            'password'=>'required'

        ]);



        if(Auth::attempt($request->only('username','password'))){

            $user = User::where('username', $request->username)->get();

            Session::put([
                'user_id' => $user[0]['id'],
                'name' => $user[0]['name'],
                'user_name' => $user[0]['username'],
                // 'user_level' => $user[0]['level'],
            ]);


            return redirect('dashboard');


        }else{

            return redirect('login')->withError('Login are not valid');

        }




    }


    public function logout(){

        Session::flush();
        Auth::logout();

        return redirect('dashboard');
    }


}
