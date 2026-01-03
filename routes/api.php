<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\PostCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);


// Lấy danh sách danh mục bài viết 
Route::get('/post-categories', [PostCategoryController::class, 'index']);

// Lấy chi tiết danh mục bài viết 
Route::get('/post-categories/{id}/show', [PostCategoryController::class, 'show']);

// Lấy chi danh mục bài viết vào hệ thống
Route::post('/post-categories/store', [PostCategoryController::class, 'store']);

// Cập nhật danh mục bài viết vào hệ thống
Route::put('/post-categories/{id}/update', [PostCategoryController::class, 'update']);

// Xóa danh mục bài viết 
Route::delete('/post-categories/{id}/delete', [PostCategoryController::class, 'destroy']);
