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
            'name' => 'required',
            'path_file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = null;
        if($r->hasFile('path_file')) {
            $image = $r->file('path_file')->store('assets/image', 'public');
        }
        
        $type['name'] = Str::lower($r->name);
        $type['path_file'] = $image;
        $type['user_id'] = Auth::id();

        if(TypePizza::where('name', $type['name'])) {
            TypePizza::create($type);
            return redirect(route('create.pizza'))->with('success', 'Tipo de Pizza Criado com Sucesso !');
        }

        return redirect(route('create.pizza'))->with('error', 'Erro Ao Criar Um Tipo de Pizza');
    }
}
