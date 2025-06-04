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
            'description' => 'required',
            'type_pizza_id' => 'required',
            'price_m' => 'required',
            'price_g' => 'required'
        ]);

        $pizza = $r->only(['flavor', 'description', 'type_pizza_id', 'price_m', 'price_g']);
        $pizza['user_id'] = Auth::id();

        if(Pizza::create($pizza)) {
            return redirect(route('create.pizza'))->with('success', 'Sabor de Pizza criado com sucesso!');
        }
        
        return redirect(route('create.pizza'))->with('error', 'Erro Ao Criar Um Sabor de Pizza');
    }
}
