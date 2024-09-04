<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller {

    use RegistersUsers;

    protected $redirectTo = '/home';
    
    protected function validator(array $data) {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    protected function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $r) : View {
        return view('auth.register');
    }   

    public function registerAction(Request $r) {
        $data = $r->only(['name', 'email', 'password', 'password_confirmation']);
        $validator = $this->validator($data);

        if($validator->fails()) {
            return redirect(route('user.registerAction'))
                ->withErrors($validator)
            ->withInput();
        }   
        
        $user = $this->create($data);
        Auth::login($user);
        return redirect(route('site.home'));
    }
}
