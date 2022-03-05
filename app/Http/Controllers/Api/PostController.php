<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return response()->json([
            'success' => true,
            'results' =>  $posts
        ]);
    }

    public function show($slug){
        $post = Post::where('slug', '=', $slug)->with('category', 'tags')->first();
        
        // se il contenuto che cerco esiste allora faccio vedere il l'oggetto
        if($post){
            return response()->json([
                'success' => true,
                'results' => $post
            ]);
        } else {
            // altrimenti faccio vedere un array vuoto
            return response()->json([
                'success' => false,
                'results' => []
            ]);
        }
    }
}