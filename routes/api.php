<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostCategoryController;
use App\Http\Controllers\Api\ProfileController;
use App\Models\Post;

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

// Lưu danh mục bài viết mới vào hệ thống
Route::post('/post-categories/store', [PostCategoryController::class, 'store']);

// Cập nhật danh mục bài viết vào hệ thống
Route::put('/post-categories/{id}/update', [PostCategoryController::class, 'update']);

// Xóa danh mục bài viết 
Route::delete('/post-categories/{id}/delete', [PostCategoryController::class, 'destroy']);




// Lấy danh sách danh mục bài viết 
Route::get('/post', [PostController::class, 'index']);

// Lấy chi tiết danh mục bài viết 
Route::get('/post/{id}/show', [PostController::class, 'show']);

// Lấy chi danh mục bài viết vào hệ thống
Route::post('/post/store', [PostController::class, 'store']);

// Cập nhật thông tin bài viết vào hệ thống
Route::put('/post/{id}/update', [PostController::class, 'update']);

// Xóa danh mục bài viết 
Route::delete('/post/{id}/delete', [PostController::class, 'destroy']);

// Cập nhật trạng thái bài viết
Route::put('/post/{id}/update-status', [PostController::class, 'updateStatus']);

// Lấy chi tiết danh mục bài viết 
Route::get('/users/{id}/show', [UserController::class, 'show']);

// Lấy chi tiết danh mục bài viết 
Route::get('/profiles/{id}/show', [ProfileController::class, 'show']);
