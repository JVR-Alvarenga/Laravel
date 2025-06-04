<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypePizza;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TypePizzaController extends Controller {
    public function createAction(Request $r) {
        $type = $r->validate([
            'name' => 'required'
        ]);
        $type['name'] = Str::lower($r->name);
        $type['user_id'] = Auth::id();

        if(TypePizza::where('name', $type['name'])) {
            TypePizza::create($type);
            return redirect(route('create.pizza'))->with('success', 'Tipo de Pizza Criado com Sucesso !');
        }

        return redirect(route('create.pizza'))->with('error', 'Erro Ao Criar Um Tipo de Pizza');
    }
}
