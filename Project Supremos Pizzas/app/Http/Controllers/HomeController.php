<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use App\Models\Pizza;  

class HomeController extends Controller {
    public function index() {
        return view('home');
    }

    public function homeTradicional() {
        $data = Pizza::where('type', 'tradicional')->get();

        return view('pages_pizzas.pizzatradicional_home', ['dataPizza' => $data]);
    }
    public function homeEspecial() {
        $data = Pizza::where('type', 'especial')->get();
        $data['title'] = 'Pizzas Especiais';

        return view('pages_pizzas.pizzaespecial_home', ['dataPizza' => $data]);
    }
    public function homeDoce() {
        $data = Pizza::where('type', 'doce')->get();

        return view('pages_pizzas.pizzadoce_home', ['dataPizza' => $data]);
    }
    public function homeFrango() {
        $data = Pizza::where('type', 'frango')->get();

        return view('pages_pizzas.pizzafrango_home', ['dataPizza' => $data]);
    }
}
