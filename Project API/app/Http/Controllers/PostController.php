<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\PostRequest;

class PostController extends Controller {
    public function findAll(Request $r) {
        $posts = Post::all();

        return response()->json(['Postes' => $posts]);
    }

    public function findOne(Request $r) {
        $post = Post::find($r->id);

        return response()->json($post);
    }

    public function addPost(PostRequest $r) {
        $data = $r->only(['title', 'price', 'isNegotiable', 'description', 'user_id', 'state_id', 'category_id']);
        Post::create($data);

        return response()->json(['Aviso' => 'Poste Criado Com Sucesso !']);
    }
}
