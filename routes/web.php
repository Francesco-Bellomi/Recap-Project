<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[PublicController::class, 'homepage'])->name('homepage');
Route::get('/contact',[PublicController::class, 'contact'])->name('contact');
Route::post('/contact/submit',[PublicController::class, 'submit'])->name('contact.submit');

Route::get('/category/create',[CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/index',[CategoryController::class, 'index'])->name('category.index');
Route::get('/category/show/{category}',[CategoryController::class, 'show'])->name('category.show');
Route::get('/category/edit/{category}',[CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/update/{category}',[CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/destroy/{category}',[CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/category/auth/{auth}',[CategoryController::class, 'auth'])->name('category.auth');

Route::get('/article/create',[ArticleController::class, 'create'])->name('article.create');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
Route::get('/article/index',[ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}',[ArticleController::class, 'show'])->name('article.show');
Route::get('/article/edit/{article}',[ArticleController::class, 'edit'])->name('article.edit');
Route::put('/article/update/{article}',[ArticleController::class, 'update'])->name('article.update');
Route::delete('/article/destroy/{article}',[ArticleController::class, 'destroy'])->name('article.destroy');
Route::get('/article/auth/{auth}',[ArticleController::class , 'auth'])->name('article.auth');
Route::post('/article/colors/{article}',[ArticleController::class,  'colors'])->name('article.colors');