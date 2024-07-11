<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{
    public function index(Request $r){
        $users = User::all();
        return $users;
    }

    public function findOne(Request $r){
        $id = $r->id;
        $user = User::where('id', $id)->first();
        if(!empty($user)){
            $user['posts'] = $user->posts;
            return $user;
        }else{
            return 'Usuario Nao Existente.';
        }
    }

    public function create(Request $r){
        $data = $r->only(['name', 'email', 'password']);
        $user = User::create($data);

        return $user;
    }
}
