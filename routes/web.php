<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;

Route::get('post/mypost', [PostController::class, 'mypost'])->name('post.mypost');
Route::get('post/mycomment', [PostController::class, 'mycomment'])->name('post.mycomment');
Route::resource('post', PostController::class);
Route::post('post/comment/store', [CommentController::class, 'store'])->name('comment.store');



// Route::get('/', function () {
//     return view('welcome');
// })->name('top');


Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__.'/auth.php';



Route::controller(ContactController::class)->group(function(){
    Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
});

Route::controller(ContactController::class)->middleware('auth')->group(function(){
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
    Route::get('contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});




Route::resource('store', StoreController::class);
Route::middleware('auth')->group(function () {
    Route::get('/store/{store}/edit', [StoreController::class, 'edit'])->name('store.edit');
    Route::put('/store/{store}', [StoreController::class, 'update'])->name('store.update');
    Route::delete('/store/{store}', [StoreController::class, 'destroy'])->name('store.destroy');
});

Route::get('/', [StoreController::class, 'home'])->name('home');



Route::resource('review', ReviewController::class)->except(['create', 'store']); 
Route::get('review/comment/{store_id}', [ReviewController::class, 'create'])->name('review.comment');
Route::post('review/store', [ReviewController::class, 'store'])->name('review.store');;
Route::middleware('auth')->group(function () {
    Route::get('/review/{review}/edit', [ReviewController::class, 'edit'])->name('review.edit');
    Route::put('/review/{review}', [ReviewController::class, 'update'])->name('review.update');
    Route::delete('/review/{review}', [ReviewController::class, 'destroy'])->name('review.destroy');
});











// // 管理者画面ルート
// Route::middleware(['auth.admin'])->prefix('admin')->group(function () {
//     Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    
//     // 正しい名前空間でコントローラーを指定
//     Route::resource('contacts', ContactController::class)->only(['index', 'edit', 'update', 'destroy']);
//     Route::resource('stores', StoreController::class)->only(['index', 'show', 'edit', 'update', 'destroy']);
//     Route::resource('reviews', ReviewController::class)->only(['index', 'edit', 'update', 'destroy']);
// });




Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    
});