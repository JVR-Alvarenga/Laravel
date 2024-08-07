<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Jobs\SendRegisterMail;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\RegisterEmail;

class AuthMailController extends Controller{
    public function index(){
        return view('welcome');
    }

    public function registerMail(Request $r){
        $user = User::find($r->id);
    
        SendRegisterMail::dispatch($user);

        return redirect(route('home'));
    }
}
