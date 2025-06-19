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
            'name' => 'required|unique:type_pizzas,name',
            'path_file' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if($r->hasFile('path_file')) {
            $type['path_file'] = $r->file('path_file')->store('assets/image', 'public');
        }else {
            $type['path_file'] = null;
        }
        
        $type['name'] = Str::lower($r->name);
        $type['user_id'] = Auth::id();

        if(TypePizza::create($type)) {
            return redirect(route('create.itens'))->with('success', 'Tipo de Pizza Criado com Sucesso !');
        }
        
        return redirect(route('create.itens'))->with('error', 'Erro Ao Criar Um Tipo de Pizza');
    }
}
