<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ProfileUserController extends Controller {
    public function profileHome() : View{
        $user = Auth::user();

        return view('site.profiles.profile', [ 'user' => $user]);
    }

    public function profileEdit(Request $r) {
        $data = $r->only(['name', 'email', 'password', 'password_confirmation']);

        $validator = Validator::make([
            'name' => $data['name'],
            'email' => $data['email'],1
        ], [
            'name' => 'required|string|max:100',
            'email' => 'required|email|string|max:100'
        ]);

        if($validator->fails()) {
            return redirect(route('user.profile'))
            ->withErrors($validator);            
        }

        $user = User::find($r->id);
        $user->name = $data['name'];

        if($user->email != $data['email']) {
            $emailCount = User::where('email', $data['email'])->count();
            if($emailCount > 0) {
                return redirect(route('user.profile'))
                ->withErrors([
                    'email' => 'E-mail já em uso !'
                ]);
            }
            $user->email = $data['email'];
        }

        if(!empty($data['password'])) {
            $validatorPassword = Validator::make([
                'password' => $data['password'],
                'password_confirmation' => $data['password_confirmation']
            ], [
                'password' => 'required|string|min:6|confirmed'
            ]);

            if($validatorPassword->fails()) {
                return redirect(route('user.profile'))
                ->withErrors($validatorPassword);
            }

            $user->password = Hash::make($data['password']);
        }

        $user->save();
        return redirect(route('user.profile'))
        ->with('success', 'Informações Atualizadas Com Sucesso !');
    }
}
