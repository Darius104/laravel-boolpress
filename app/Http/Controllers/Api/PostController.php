<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        // Sovrascrivo l'attributo cover di ogni post modificandolo in un url assoluto

        foreach($posts as $post){
            if($post->cover){
                $post->cover = url('storage/' . $post->cover);
            }
        }

        return response()->json([
            'success' => true,
            'results' =>  $posts
        ]);
    }

    public function show($slug){
        $post = Post::where('slug', '=', $slug)->with('category', 'tags')->first();
        if($post->cover){
            $post->cover = url('storage/' . $post->cover);
        }
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