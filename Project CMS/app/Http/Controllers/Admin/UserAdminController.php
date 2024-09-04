<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller {
    public function index() : View {
        $usersAll = User::paginate(5);
        $userLoggedId = Auth::id();

        return view('admin.users.index', [
            'usersAll' => $usersAll,
            'userLoggedId' => $userLoggedId
        ]);
    }

    public function create() : View{
        return view('admin.users.create');
    }

    public function store(Request $r) {
        $data = $r->only(['name', 'email', 'password', 'password_confirmation']);
        $validator = Validator::make($data, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
        
        if($validator->fails()) {
            return back()
                ->withErrors($validator)
            ->withInput();
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect(route('users.index'));
    }

    public function show(Request $r) {
        
    }

    public function edit(Request $r) {
        if($user = User::find($r->user)) {
            return view('admin.users.edit', ['user' => $user]);
        }

        return redirect(route('users.index'));
    }

    public function update(Request $r, string $id) {
        $user = User::find($r->user);

        $data = $r->only(['name', 'email', 'password', 'password_confirmation']);
        $validator = Validator::make([
            'name' => $data['name'],
            'email' => $data['email']
        ], [
            'name' => 'required|string|max:100',
            'email' => 'required|email|string|max:100'
        ]);

        if($validator->fails()){
            return redirect(route('users.edit', ['user' => $r->user]))
            ->withErrors($validator);
        }

        $user->name = $data['name'];

        if($user->email != $data['email']) {
            $emailVerification = User::where('email', $data['email'])->count();
            if($emailVerification > 0) {
                return redirect(route('users.edit', ['user' => $r->user]))
                ->withErrors([
                    'email' => 'Email Inválido, Tente Outro !'
                ]);
            }
            $user->email = $data['email'];
        }

        if(!empty($data['password'])) {
            $validatorPassword = Validator::make([
                'password' => $data['password'],
                'password_confirmation' => $data['password_confirmation']
            ], [
                'password' => 'required|min:6|confirmed'
            ]);

            if($validatorPassword->fails()) {
                return redirect(route('users.edit', ['user' => $r->user]))
                ->withErrors($validatorPassword);
            }

            $user->password = Hash::make($data['password']);
        }

        $user->save();
        return redirect(route('users.index'));
    }

    public function destroy(string $id) {
        $userLogged = Auth::id();

        if($userLogged != $id) {
            User::where('id', $id)->delete();    
        }

        return redirect(route('users.index'));
    }
}
