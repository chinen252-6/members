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



Route::get('/', function () {
    return view('welcome');
})->name('top');


Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__.'/auth.php';



Route::controller(ContactController::class)->group(function(){
    Route::get('contact/create', 'create')->name('contact.create');
    Route::post('contact/store', 'store')->name('contact.store');
});




Route::resource('store', StoreController::class);

Route::get('/home', [StoreController::class, 'home'])->name('home');



// Route::resource('review',ReviewController::class);
Route::get('review/comment/{store_id}', [ReviewController::class, 'create'])->name('review.comment');
Route::post('review/store', [ReviewController::class, 'store'])->name('review.store');;

// 管理者画面ーーーーーーーーーーーーーーーーーーーーーーーーーー
Route::middleware(['auth.admin'])->prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::resource('contacts', 'Admin\ContactController')->only(['index', 'edit', 'update', 'destroy']);
    Route::resource('stores', 'Admin\StoreController')->only(['index', 'show', 'edit', 'update', 'destroy']); 
    Route::resource('reviews', 'Admin\ReviewController')->only(['index', 'edit', 'update', 'destroy']);
});







// Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
// Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
// Route::post('/admin/logout', [AdminController::class, 'login'])->name('admin.logout');




Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// 管理者用ルート
Route::middleware(['auth.admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    // 他の管理者ルートをここに追加
});

// 管理者ログイン時のみ
Route::middleware(['auth:admin'])->group(function () {
    Route::get('store/{id}/edit', [StoreController::class, 'edit'])->name('store.edit');
    Route::put('store/{id}', [StoreController::class, 'update'])->name('store.update');
    Route::delete('store/{id}', [StoreController::class, 'destroy'])->name('store.destroy');
    
    Route::get('review/{id}/edit', [ReviewController::class, 'edit'])->name('review.edit');
    Route::put('review/{id}', [ReviewController::class, 'update'])->name('review.update');
    Route::delete('review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');

    Route::get('contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('contact/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::delete('contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
});