<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PizzaEspecial;

class PizzaEspecialController extends Controller {
    public function home() {
        return view('pages_pizzas.pizzaespecial_home');
    }
}
