<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeAdminController extends Controller {
    public function home(Request $r) : View {
        return view('admin.home');
    }
}

