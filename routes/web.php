<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'create'])->middleware(['auth'])->name('posts');
Route::post('/posts', [PostController::class, 'store'])->middleware(['auth'])->name('posts.store');
Route::get('/posts/view', [PostController::class, 'show'])->middleware(['auth','role:admin'])->name('posts.show');
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->middleware(['auth','role:admin'])->name('posts.edit');
Route::post('/posts/update', [PostController::class, 'update'])->middleware(['auth','role:admin'])->name('posts.update');
Route::get('/posts/destroy/{id}', [PostController::class, 'delete'])->middleware(['auth','role:admin'])->name('posts.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
