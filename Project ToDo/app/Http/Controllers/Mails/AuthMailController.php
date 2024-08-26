<?php

namespace App\Http\Controllers\Mails;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Jobs\SendRegisterMail;

class AuthMailController extends Controller {
    public function sendEmail(Request $r) {
        $user = User::where('email', $r->email)->first();
        SendRegisterMail::dispatch($user);
        return redirect(route('login'));
    }
}
