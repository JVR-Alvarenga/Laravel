<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class DrinksController extends Controller {
    public function createAction(Request $r) {
        $r->validate([
            'name' => 'required',
            'volume' => 'required',
            'price' => 'required|numeric'
        ]);

        $drink = $r->only(['name', 'volume', 'price']);
        $drink['user_id'] = Auth::id();

        if(Drink::create($drink)) {
            return redirect(route('create.itens'))->with('success', 'Bebida Salva com Sucesso !');
        }

        return redirect(route('create.itens'))->with('error', 'Erro ao criar nova bebida !');
    }
}
