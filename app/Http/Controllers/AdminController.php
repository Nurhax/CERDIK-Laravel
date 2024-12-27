<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function tampilLogin(){
        return view('admin.login');
    }

    function submitLogin(Request $request){
        $data = $request->only('email','password');

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('adminMenu');
        }else{
            return redirect()->back()->with('failed', 'Email atau Password anda salah!');
        }
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
