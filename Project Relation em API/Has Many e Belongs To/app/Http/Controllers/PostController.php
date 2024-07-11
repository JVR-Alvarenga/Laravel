<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller{
    public function index(Request $r){
        $posts = Post::all();
        if(count($posts) > 0){
            return $posts;
        }else{
            return 'Nenhum Poste Criado.';
        }
    }

    public function findOne(Request $r){
        $id = $r->id;
        $post = Post::where('id', $id)->first();

        if(!empty($post)){
            $post['user'] = $post->user;
            return $post;
        }else{
            return 'Poste Não Existente.';
        }
    }

    public function create(Request $r){
        $data =  $r->only('title', 'body', 'user_id', 'type');
        $post = Post::create($data);

        return $post;
    }
}
