<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypePizza;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;

class TypePizzaController extends Controller {
    public function createAction(Request $r) {
        $type = $r->validate([
            'name' => 'required'
        ]);
        $type = $r->only(['name']);
        $type['user_id'] = Auth::id();

        if(TypePizza::where('name', $r->name)) {
            TypePizza::create($type);
            return redirect(route('create.pizza'))->with('success', 'Tipo de Pizza Criado com Sucesso !');
        }

        return redirect(route('create.pizza'))->with('error', 'Erro Ao Criar Um Tipo de Pizza');
    }
}
