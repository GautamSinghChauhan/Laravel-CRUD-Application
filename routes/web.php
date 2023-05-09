<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

// Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

// Route::get('/articles/add', [ArticleController::class, 'addArticle'])->name('articles');
// Route::get('/articles', [ArticleController::class, 'show'])->name('article.add');
// Route::post('/articles', [ArticleController::class, 'saveArticle'])->name('article.save');
// Route::post('articles/add', [ArticleController::class, 'store'])->name('articles.add');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/add', [ArticleController::class, 'addArticle'])->name('articles.add');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/edit/{id}', [ArticleController::class, 'editArticle'])->name('articles.edit');
Route::put('/articles/edit/{id}', [ArticleController::class, 'updateArticle'])->name('articles.update');
// Route::put('/articles/{id}', [ArticleController::class, 'updateArticle'])->name('articles.update');
Route::get('/articles/delete/{id}', [ArticleController::class, 'deleteArticle'])->name('articles.delete');
Route::post('articles/add', [ArticleController::class, 'store'])->name('articles.add');

Route::match(['put', 'post'], '/articles/edit/{id}', [ArticleController::class, 'updateArticle'])->name('articles.update');




// Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
// Route::get('/articles/add', [ArticleController::class, 'addArticle'])->name('articles.add');
// Route::post('/articles/add', [ArticleController::class, 'store'])->name('articles.store');
// Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
// Route::get('/articles/edit/{id}', [ArticleController::class, 'editArticle'])->name('articles.edit');
// Route::put('/articles/edit/{id}', [ArticleController::class, 'updateArticle'])->name('articles.update');
// Route::get('/articles/delete/{id}', [ArticleController::class, 'deleteArticle'])->name('articles.delete');




// Route::get('/articles/add', 'ArticleController@addArticle');


// Route::get('/articles', function () {
//     return view('list');
// });

// Route::get('/articles/add', function () {
//     return view('addArticle');
// });

Route::get('/', function () {
    return view('welcome');
});
