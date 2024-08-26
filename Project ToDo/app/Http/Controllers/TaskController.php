<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller{
    public function update(Request $r){
        $task = Task::findOrFail($r->taskId);
        $task->is_done = $r->status;
        $task->save();

        return ['sucess' => true];
    }
    
    public function create(Request $r){
        $userId = Auth::id();
        $data['categories'] = Category::where('user_id', $userId)->get();
        return view('tasks.create', ['data' => $data]);
    }
    public function createAction(Request $r){
        $r->validate([
            'title' => 'required',
            'due_date' => 'required',
            'category_id' => 'required'
        ]);

        $data = $r->only('title', 'description', 'due_date', 'category_id');
        $data['user_id'] = Auth::id();
        
        Task::create($data);

        return redirect(route('home'));
    }


    public function edit(Request $r){
        $userId = Auth::id();
        $data['categories'] = Category::where('user_id', $userId)->get();

        $data['task'] = Task::find($r->id);
        if(!$data['task']){
            return redirect(route('home'));
        }

        return view('tasks.edit', [
            'data' => $data,
        ]);
    }
    public function editAction(Request $r){
        $data = $r->only(['title', 'description', 'due_date', 'category_id']);
        $data['is_done'] = $r->is_done ? true:false;

        Task::where('id', $r->id)->update($data);
        return redirect(route('home'));
    }


    public function delete(Request $r){
        Task::where('id', $r->id)->delete();
        return redirect(route('home'));
    }
}
