<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\Pizza; 
use App\Models\TypePizza; 

class HomeController extends Controller {
    public function index() {
        return view('home');
    }

    public function homeTradicional() {
        $data = TypePizza::where('name', 'tradicional')->first();

        return view('pages_pizzas.pizzatradicional_home', ['dataPizza' => $data->pizzas]);
    }
    public function homeEspecial() {
        $data = TypePizza::where('name', 'especial')->first();

        return view('pages_pizzas.pizzaespecial_home', ['dataPizza' => $data->pizzas]);
    }
    public function homeDoce() {
        $data = TypePizza::where('name', 'doce')->first();

        return view('pages_pizzas.pizzadoce_home', ['dataPizza' => $data->pizzas]);
    }
    public function homeFrango() {
        $data = TypePizza::where('name', 'frango')->first();

        return view('pages_pizzas.pizzafrango_home', ['dataPizza' => $data->pizzas]);
    }
}
