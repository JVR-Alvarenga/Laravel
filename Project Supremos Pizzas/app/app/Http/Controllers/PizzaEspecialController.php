<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PizzaEspecial;   

class PizzaEspecialController extends Controller {
    public function home() {
        $data = PizzaEspecial::all();
        return view('pages_pizzas.pizzaespecial_home', ['data' => $data]);
    }

    public function create() {
        return view('pizzas.create_pizzas');
    }
    public function createAction(Request $r) {
        $r->validate([
            'flavor' => 'required',
            'description' => 'required',
            'price_m' => 'required',
            'price_g' => 'required'
        ]);

        $pizza = $r->all();

        if(PizzaEspecial::create($pizza)) {
            return redirect(route('createEspecial'));
        }
        
        return redirect(route('home'));
    }
}
