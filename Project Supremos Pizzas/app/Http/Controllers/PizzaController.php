<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;   
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use App\Models\TypePizza;

class PizzaController extends Controller {
    public function create() {
        $typePizza = TypePizza::all();

        return view('admin.pizzas.create', ['typePizzas' => $typePizza]);
    }
    public function createAction(Request $r) {
        $r->validate([
            'flavor' => 'required',
            'type_pizza_id' => 'required',
            'description' => 'required',
            'path_file' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'price_m' => 'required|numeric',
            'price_g' => 'required|numeric'
        ]);

        $image = null;
        if($r->hasFile('path_file')) {
            $image = $r->file('path_file')->store('assets/image', 'public');
        }

        $pizza = $r->only(['flavor', 'type_pizza_id', 'description', 'price_m', 'price_g']);
        $pizza['path_file'] = $image;
        $pizza['user_id'] = Auth::id();

        if(Pizza::create($pizza)) {
            return redirect(route('create.itens'))->with('success', 'Sabor de Pizza criado com sucesso!');
        }
        
        return redirect(route('create.itens'))->with('error', 'Erro Ao Criar Um Sabor de Pizza');
    }
}
