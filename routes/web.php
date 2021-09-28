<?php

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

Route::get('/testimonials', function () {
    return view('welcome');
})->name('testimoniale');

// ------------ BACK -------------

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/articles', function () {
    return view('back.articles');
})->middleware(['auth'])->name('articles');

Route::get('/commentaires', function () {
    return view('back.commentaires');
})->middleware(['auth'])->name('commentaires');

Route::get('/contacts', function () {
    return view('back.contact');
})->middleware(['auth'])->name('contacts');

Route::get('/testimonials', function () {
    return view('back.testimonials');
})->middleware(['auth'])->name('testimonials');


require __DIR__.'/auth.php';