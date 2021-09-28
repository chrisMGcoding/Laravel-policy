<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

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

// ------------ FRONT -------------

Route::get('/', function () {
    return view('welcome');
})->name('accueil');

Route::get('/testimoniales', function () {
    return view('pages.testimonials');
})->name('testimoniales');

// ------------ BACK -------------

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'admin'])->name('dashboard');

Route::resource('/articles', ArticleController::class);

Route::resource('/commentaires', CommentaireController::class);

Route::resource('/testimonials', TestimonialController::class);

Route::get('/contacts', function () {
    return view('back.contact');
})->middleware(['auth', 'admin'])->name('contacts');


require __DIR__.'/auth.php';