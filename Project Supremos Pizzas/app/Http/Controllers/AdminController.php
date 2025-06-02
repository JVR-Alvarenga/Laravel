<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {
    public function home() {
        $userLogged = Auth::user();

        return view('admin.home', ['user' => $userLogged]);
    }
}
