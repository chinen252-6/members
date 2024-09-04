<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ReviewController;

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

Route::get('/home', function () {
    return view('home');
})->name('home');



// Route::resource('review',ReviewController::class);
Route::get('review/comment/{store_id}', [ReviewController::class, 'create'])->name('review.comment');
Route::post('review/store', [ReviewController::class, 'store'])->name('review.store');;
