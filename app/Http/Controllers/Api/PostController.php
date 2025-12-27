<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
     public function index()
    {
        $posts = Post::get();

        return response()->json([
            'success' => true,
            'data' => $posts
        ], 200);
    }
     public function show($id)
    {
        return Post::find($id);
    }

}
