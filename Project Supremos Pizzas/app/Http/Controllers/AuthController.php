<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    public function login() {
        return view('auth.login');
    }
    public function loginAction(Request $r) {
        $validate = $r->validate([
            'password' => 'required|min:6',
            'email' => 'required|email'
        ]);

        if(Auth::attempt($validate)) {
            return redirect(route('admin.home'));
        }
    }

    public function logout() {
        Auth::logout();
        return redirect(route('admin.login'));
    }

    public function register() {
        return view('auth.register');
    }
    public function registerAction(Request $r) {
        $r->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min: 6|confirmed'
        ]);

        $user = $r->only(['name', 'email']);
        $user['password'] = Hash::make($r->password);
        $user['is_admin'] = true;

        User::create($user);

        return redirect(route('admin.login'));
    }
}
