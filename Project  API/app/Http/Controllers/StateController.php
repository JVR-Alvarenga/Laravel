<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use Illuminate\Http\JsonResponse;

class StateController extends Controller {
    public function findAll(Request $r) : JsonResponse{
        $states = State::all();

        return response()->json(['Estados' => $states]);
    }
}
