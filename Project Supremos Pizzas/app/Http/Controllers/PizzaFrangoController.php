<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PizzaFrango;

class PizzaFrangoController extends Controller {
    public function home() {
        return view('pages_pizzas.pizzafrango_home');
    }
}
