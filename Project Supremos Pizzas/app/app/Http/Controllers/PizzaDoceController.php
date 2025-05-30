<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PizzaDoce;

class PizzaDoceController extends Controller {
    public function home() {
        return view('pages_pizzas.pizzadoce_home');
    }
}
