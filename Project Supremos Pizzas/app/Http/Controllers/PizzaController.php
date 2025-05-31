<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;   

class PizzaController extends Controller {
    public function create() {
        return view('pizzas_admin.create');
    }
    public function createAction(Request $r) {
        $r->validate([
            'flavor' => 'required',
            'type' => 'required',
            'description' => 'required',
            'price_m' => 'required',
            'price_g' => 'required'
        ]);

        $pizza = $r->all();

        if(Pizza::create($pizza)) {
            return redirect(route('create.pizza'));
        }
        
        return redirect(route('home'));
    }
}
