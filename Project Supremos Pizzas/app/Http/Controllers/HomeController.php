<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;
use App\Models\TypePizza; 

class HomeController extends Controller {
    public function index() {
        if(!Auth::check()) {
            abort(404);
        }

        $loggedId = Auth::id();
        $data = TypePizza::where('user_id', $loggedId)->get();

        return view('home', ['dataType' => $data]);
    }

    public function homePizzas(Request $r) {
        if(empty($r->id)) {
            return redirect(route('home'));
        }
        $data = TypePizza::where('id', $r->id)->get();


        return view('pizzas_home', ['dataPizza' => $data->pizzas]);
    }
}
