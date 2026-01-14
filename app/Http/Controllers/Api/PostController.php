<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return response()->json([
            'success' => true,
            'data' => $posts,

        ], 200);
    }
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'content' => 'required|string',
                'author' => 'required|string',
            ]);

            $post = Post::create($data);
            // Trả về JSON chuẩn theo schema
            return response()->json([
                'id' => $post->id,
                'title' => $post->title,
                'description' => $post->description,
                'content' => $post->content,
                'author' => $post->author,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
            ], 201);
        } catch (\Throwable $th) {
            Log::info($th);
            throw $th;
        }
    }
    public function show($id)
    {;
        return Post::with('categories')->find($id);
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'author' => 'required|string',
        ]);
        $post = Post::findOrFail($id);

        $post->update($data);

        return response()->json([
            $post
        ], status: 200);
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json([
            'message : Xoá Danh mục thành công'
        ], status: 200);
    }
    public function updateStatus(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required'
        ]);
        $post = Post::findOrFail($id);

        $post->update($data);

        return response()->json([
            $post
        ], status: 200);
    }
}
