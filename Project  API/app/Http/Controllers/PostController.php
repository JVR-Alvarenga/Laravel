<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller {
    public function findAll(Request $r) : JsonResponse{
        $posts = Post::all();

        return response()->json(['Postes' => $posts]);
    }

    public function findOne(Request $r) : JsonResponse{
        $post = Post::find($r->id);

        return response()->json($post);
    }

    public function addPost(CreatePostRequest $r) : JsonResponse{
        $data = $r->only(['title', 'price', 'isNegotiable', 'description', 'user_id', 'state_id', 'category_id']);
        $post = Post::create($data);

        return response()->json(['Aviso' => 'Poste Criado Com Sucesso !']);
    }

    public function updatePost(UpdatePostRequest $r) : JsonResponse{
        $data = $r->only(['title', 'price']);

        if($post = Post::find($r->id)){
            $post->update($data);
            
            return response()->json($post);
        }
        return response()->json(['Aviso' => 'Poste Não Encontrado !']);
    }

    public function deletePost(Request $r) : JsonResponse{
        if(Post::where('id', $r->id)->delete()){
            return response()->json(['Aviso' => 'Poste Deletado Com Sucesso !']);
        }
        return response()->json(['Aviso' => 'Poste Não Encontrado']);
    }
}
