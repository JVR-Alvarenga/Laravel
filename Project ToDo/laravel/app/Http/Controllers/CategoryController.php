<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller{
    public function index(Request $r){
        $userId = Auth::id();
        $data = Category::where('user_id', $userId)->get();
        return view('categories.home', ['data' => $data]);
    }

    public function create(Request $r){
        $userId = Auth::id();
        return view('categories.create', ['userId' => $userId]);
    }
    public function createAction(Request $r){
        $r->validate([
            'title' => 'required',
            'color' => 'required'
        ]);

        $data = $r->only(['title', 'color']);
        $data['user_id'] = $r->user_id;

        Category::create($data);
        return redirect(route('category.home'));
    }

    public function edit(Request $r){
        $category = Category::find($r->id);
        if(!$category){
            return redirect(route('category.home'));
        }

        return view('categories.edit', ['category' => $category]);
    }
    public function editAction(Request $r){
        $data = $r->only(['title', 'color']);

        Category::where('id', $r->id)->update($data);
        return redirect(route('category.home'));
    }

    public function delete(Request $r){
        Category::where('id', $r->id)->delete();
        return redirect(route('category.home'));
    }
}
