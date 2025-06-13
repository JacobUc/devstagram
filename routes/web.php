<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', HomeController::class)->name('home')
    ->middleware('auth');

Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('register');
Route::post('/crear-cuenta', [RegisterController::class, 'store']);

Route::get('/iniciar-sesion', [LoginController::class, 'index'])->name('login');
Route::post('/iniciar-sesion', [LoginController::class, 'store']);
Route::post('/cerrar-sesion', [LogoutController::class, 'store'])->name('logout');

// Rutas para el perfil
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index')
    ->middleware('auth');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store')
    ->middleware('auth');

Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')
    ->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')
    ->middleware('auth');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')
    ->middleware('auth');

Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store')
    ->middleware('auth');

Route::post('/imagenes', [ImagenController::class, 'store'])->name('images.store')
    ->middleware('auth');

// Like a las fotos
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store')
    ->middleware('auth');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy')
    ->middleware('auth');

// Seguidores
Route::post('/{user}/follow', [FollowerController::class, 'store'])->name('users.follow')
    ->middleware('auth');
Route::delete('/{user}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow')
        ->middleware('auth');