<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ProfileUserController extends Controller {
    public function index() : View{
        return view('site.profile');
    }
}
