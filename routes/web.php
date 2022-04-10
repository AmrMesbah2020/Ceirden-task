<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/new-post', [\App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/create-post', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/show-post/{postId}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::get('/delete-post/{postId}', [\App\Http\Controllers\PostController::class, 'delete'])->name('posts.delete');
Route::get('/edit-post/{postId}', [\App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
Route::post('/update-post/{postId}', [\App\Http\Controllers\PostController::class, 'update'])->name('posts.update');

Route::name('admin.')->prefix('admin')->group(function () {
    Auth::routes(['login'=>false]);
});

Route::get('/auth/redirect/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.auth');

Route::get('/auth/google/callback', function () {
    $user = Socialite::driver('google')->user();
    return redirect(route('posts.index'));});


Route::get('/auth/redirect/facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name('facebook.auth');

Route::get('/auth/facebook/callback', function () {
    $user = Socialite::driver('facebook')->user();
    return redirect(route('posts.index'));});

