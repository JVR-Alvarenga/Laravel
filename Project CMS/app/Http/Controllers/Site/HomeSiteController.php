<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class HomeSiteController extends Controller {
    public function home(Request $r) : View {
        $user = Auth::user();
        if($user->is_admin == 1) {
            return view('admin.home');
        }
        return view('site.home');
    }
}
