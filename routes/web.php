<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ItemController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ThreadController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\LikeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('user.welcome');
// });
Route::get('/', [UserController::class,'index'])->name('index');

Route::middleware('auth:users')->group(function () {
    Route::get('profile.edit', [UserController::class, 'edit'])->name('profile.index');
    Route::post('profile.update/{user}', [UserController::class, 'update'])->name('profile.update');
});


Route::get('/items', [ItemController::class,'index'])->name('items.index');
Route::get('/items/show/{item}',[ItemController::class, 'show'])->name('items.show');
Route::middleware('auth:users')->group(function(){
    Route::get('/items/favorite',[ItemController::class, 'favorite'])->name('items.favorite');
    Route::post('/favorite', [LikeController::class,'toggleFavorite'])->name('favorite.toggle');
});

Route::prefix('cart')->middleware('auth:users')->group(function(){
    Route::get('/', [CartController::class,'index'])->name('cart.index');
    Route::post('add', [CartController::class,'add'])->name('cart.add');
    Route::post('delete/{item}', [CartController::class,'delete'])->name('cart.delete');
    Route::get('checkout', [CartController::class,'checkout'])->name('cart.checkout');
    Route::get('success', [CartController::class,'success'])->name('cart.success');
    Route::get('cancel', [CartController::class,'cancel'])->name('cart.cancel');
});

Route::resource('questions', ThreadController::class);
Route::post('/questions/search', [ThreadController::class, 'search'])->name('questions.search');
Route::middleware('auth:users')->group(function () {
    Route::post('questions/delete/{thread}', [ThreadController::class,'delete'])->name('questions.delete');
    Route::get('/comments/create', [CommentController::class, 'create'])->name('comment.create');
    Route::post('/comments/store', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comments/delete/{comment}', [CommentController::class, 'delete'])->name('comment.delete');
    Route::post('/comments/delete/{comment}', [CommentController::class, 'delete'])->name('comment.delete');
});

Route::resource('shops', ShopController::class);



require __DIR__.'/auth.php';
