<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
    public function login(Request $r){
        $logged = Auth::check();
        if($logged){
            return redirect(route('home'));
        }
        return view('login');
    }
    public function loginAction(Request $r){
        $validate = $r->validate([
            'email' => 'required|email',
            'password' => 'required|min: 6'
        ]);

        if(Auth::attempt($validate)){
            return redirect(route('home'));
        }

        return redirect(route('login'));
    }

    public function logout(Request $r){
        Auth::logout();
        return redirect(route('login'));
    }


    public function register(Request $r){
        $logged = Auth::check();
        if($logged){
            return redirect(route('home'));
        }
        return view('register');
    }
    public function registerAction(Request $r){
        $r->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min: 6|confirmed'
        ]);

        $user = $r->only(['name', 'email']);
        $user['password'] = Hash::make($r->password);

        User::create($user);
        return redirect(route('login'));
    }
}
