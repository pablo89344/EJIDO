<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LibrosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí puedes registrar las rutas web para tu aplicación.
| Todas las rutas se asignan al grupo de middleware "web".
|
*/

// Redirigir la raíz a la vista login
Route::get('/', function () {
    return view('auth/login'); // Redirige a la vista 'auth.login' que está en resources/views/auth/login.blade.php
});

// Ruta para crear un libro (sin middleware de autenticación)


Route::get('welcome', [LibrosController::class, 'welcome'])->name('views.welcome');

Route::get('/secretario', [LoginController::class, 'secretario'])->name('secretario');




// Rutas para login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');




// usuarios control de usuarios 


use App\Http\Controllers\UsuarioController;

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
