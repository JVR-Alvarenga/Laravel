<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller {

    use AuthenticatesUsers;

    protected $redirectTo = '/home';
    
    protected function validator(array $data) {
        return Validator::make($data, [
            'email' => 'required|email|max:100',
            'password' => 'required|min:6'
        ]);
    }

    public function login(Request $r) : View {
        return view('auth.login');
    }

    public function loginAction(Request $r) {
        $data = $r->only(['email', 'password']);
        $remember = $r->input('remember', false);
        $validator = $this->validator($data);

        if($validator->fails()) {
            return redirect(route('login'))
                ->withErrors($validator)
            ->withInput();
        }

        if(Auth::attempt($data, $remember)) {
            return redirect(route('site.home'));
        }else {
            return redirect(route('login'))
                ->withErrors(['password' => 'E-mail e/ou Senha não conferem !'])
            ->withInput();
        }
    }

    public function logout() {
        Auth::logout();
        return redirect(route('login'));
    }
}
