<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ItemController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ThreadController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\ShopController;

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

Route::middleware('auth:users')->group(function(){
        Route::get('/items', [ItemController::class,'index'])->name('items.index');
        Route::get('/items/show/{item}',[ItemController::class, 'show'])->name('items.show');
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
Route::get('/comments/create', [CommentController::class, 'create'])->name('comment.create');
Route::post('/comments/store', [CommentController::class, 'store'])->name('comment.store');
// Route::get('/question', [ThreadController::class, 'index'])->name('question.index');
// Route::get('/question/show/{thread}', [ThreadController::class, 'show'])->name('question.show');
// Route::get('/question/create', [ThreadController::class, 'create'])->name('question.create');
// Route::post('/question/store', [ThreadController::class, 'store'])->name('question.store');
// Route::resource('/questions', 'ThreadController',  ['except' => ['index']]);
// Route::resource('/comments', 'CommentController')->middleware('auth');
// Route::get('/dashboard', function () {
//     return view('user.dashboard');
// })->middleware(['auth:users', 'verified'])->name('dashboard');

Route::resource('shops', ShopController::class);

Route::middleware('auth:users')->group(function () {
    Route::get('/', [UserController::class,'index'])->name('index');
    Route::get('profile.edit', [UserController::class, 'edit'])->name('profile.index');
    Route::post('profile.update/{user}', [UserController::class, 'update'])->name('profile.update');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
