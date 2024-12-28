<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ExampleController;


Route::get('/greet/{name}', [ExampleController::class, 'greetUser']);
// Default authentication routes with email verification
Auth::routes(['verify' => true]);
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/add', [ArticleController::class, 'addArticle'])->name('articles.add');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/edit/{id}', [ArticleController::class, 'editArticle'])->name('articles.edit');
Route::put('/articles/edit/{id}', [ArticleController::class, 'updateArticle'])->name('articles.update');
Route::get('/articles/delete/{id}', [ArticleController::class, 'deleteArticle'])->name('articles.delete');
Route::post('articles/add', [ArticleController::class, 'store'])->name('articles.add');

// Protected routes requiring email verification
Route::middleware(['web', 'auth', 'verified'])->group(function () {
   
});

// Registration Routes (optional)
Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');

// Other routes
Route::get('/get-all-session', function () {
    $session = session()->all();
    return view('session-data', ['session' => $session]);
});

Route::get('/', function () {
    return view('welcome');
});

// // Email verification notice route
// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Home route (if needed)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
