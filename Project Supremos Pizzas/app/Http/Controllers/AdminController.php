<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TypePizza;
use App\Models\Pizza;
use App\Models\Drink;

class AdminController extends Controller {
    public function home() {
        $userLogged = Auth::user();
        $typePizzas = TypePizza::all();
        $drinks = Drink::all();

        return view('admin.home', [
            'user' => $userLogged, 
            'typePizzas' => $typePizzas, 
            'drinks' => $drinks
        ]);
    }

    public function createItens() {
        $typePizza = TypePizza::all();

        return view('admin.itens.create', ['typePizzas' => $typePizza]);
    }
}
