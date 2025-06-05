<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;
use App\Models\Pizza; 
use App\Models\TypePizza; 

class HomeController extends Controller {
    public function index() {
        $loggedId = Auth::id();
        $data = TypePizza::where('user_id', $loggedId)->first();

        return view('home', ['dataType' => $data]);
    }

    public function homePizzas(Request $r) {
        if(!empty($r->id)) {
            return redirect(route('home'));
        }
        $data = TypePizza::where('id', $r->id)->first();

        return view('pizzas_home', ['dataPizza' => $data->pizzas]);
    }
}
