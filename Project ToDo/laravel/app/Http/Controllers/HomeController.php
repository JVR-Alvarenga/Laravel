<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller{
    public function index(Request $r){
        $userId = Auth::id();
        
        if($r->date){
            $filteredDate = $r->date;
        }else{
            $filteredDate = date('y-m-d');
        }

        $carbonDate = Carbon::createFromDate($filteredDate);
        $data['current_day'] = $carbonDate->translatedFormat('d \d\e M');

        $data['prev_day'] = $carbonDate->addDay(-1)->translatedFormat('y-m-d');
        $data['next_day'] = $carbonDate->addDay(2)->translatedFormat('y-m-d');

        $data['tasks'] = Task::whereDate('due_date', $filteredDate)->where('user_id', $userId)->get();

        $data['count_tasks'] = $data['tasks']->count();
        $data['tasks_true'] = $data['tasks']->where('is_done', true)->count();
        $data['tasks_false'] = $data['tasks']->where('is_done', false)->count();

        return view('home', ['data' => $data]);
    }

}
