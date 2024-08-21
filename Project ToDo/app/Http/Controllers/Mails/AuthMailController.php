<?php

namespace App\Http\Controllers\Mails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendRegisterMail;

class AuthMailController extends Controller {
    public function sendEmail(Request $r) {
        if($user = User::where('email', $r->email)->first()) {
            SendRegisterMail::dispatch($user);
            return redirect(route('login'));
        }
        return redirect(route('home'));
    }
}
