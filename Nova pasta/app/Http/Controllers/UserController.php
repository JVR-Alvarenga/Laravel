<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\SigninRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    public function signup(CreateUserRequest $r) : JsonResponse {
        $data = $r->only(['name', 'email', 'state_id']);
        $data['password'] = Hash::make($r->password);
        $user = User::create($data);

        $response = [
            'error' => "",
            'token' => $user->createToken('RegisterToken')->plainTextToken
        ];
        return response()->json($response);
    }

    public function signin(SigninRequest $r) : JsonResponse {
        $data = $r->only(['email', 'password']);

        if(Auth::attempt($data)){
            $user = Auth::user();
            $response = [
                'error' => "",
                'token' => $user->createToken('LoginToken')->plainTextToken
            ];
            return response()->json($response);
        }
        return response()->json(['error' => "Usuário ou Senha Inválidos !"]);
    }

    public function infoUser(Request $r) : JsonResponse {
        $user = Auth::user();
        $response = [
            'name' => $user->name,
            'email' => $user->email,
            'states' => $user->state->title,
            'posts' => $user->posts
        ];

        return response()->json($response);
    }
}
