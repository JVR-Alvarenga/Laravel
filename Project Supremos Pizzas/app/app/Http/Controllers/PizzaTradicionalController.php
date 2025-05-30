<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PizzaTradicional;

class PizzaTradicionalController extends Controller {
    public function home() {
        return view('pages_pizzas.pizzatradicional_home');
    }
}
