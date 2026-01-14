<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = PostCategory::get();

        return response()->json([
            'success' => true,
            'data' => $posts
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|limit:1',
            'description' => 'required|string',
            'content' => 'required|string',
        ]);

        $postCategory = PostCategory::create($data);

        // Trả về JSON chuẩn theo schema
        return response()->json([
            'id' => $postCategory->id,
            'title' => $postCategory->title,
            'description' => $postCategory->description,
            'content' => $postCategory->content,
            'created_at' => $postCategory->created_at,
            'updated_at' => $postCategory->updated_at,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {;
        return PostCategory::with('posts')->find($id);

        // SELECT
        //     c.id   AS category_id,
        //     c.name AS category_name,
        //     p.*
        // FROM post_categories c
        // LEFT JOIN post_post_category pc
        //     ON pc.post_category_id = c.id
        // LEFT JOIN posts p
        //     ON p.id = pc.post_id
        // WHERE c.id = :id;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'content' => 'required|string',
            ]);

            $postCategory = PostCategory::findOrFail($id);
            $postCategory->update($data);

            if (!$postCategory) {
                return response()->json([
                    "message" => "not found data"
                ], 404);
            }
            // Trả về JSON chuẩn theo schema
            return response()->json([
                $postCategory
            ], 201);
        } catch (\Throwable $th) {
            Log::info($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $postCategory = PostCategory::findOrFail($id);
        $postCategory->delete();

        return response()->json([
            'message' => 'Xóa danh mục thành công'
        ], 200);
    }
}
