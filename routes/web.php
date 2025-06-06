<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\ActaPosesionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ActaController;



Route::get('/', function () {
    return view('auth.login');
});

// Rutas de bienvenida y panel
Route::get('welcome', [LibrosController::class, 'welcome'])->name('views.welcome');
Route::get('/secretario', [LoginController::class, 'secretario'])->name('secretario');

// Rutas de autenticación
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Rutas de usuarios
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

// Rutas de acta


Route::get('/actas', [ActaController::class, 'seleccionarTipo'])->name('seleccionar_tipo_acta');
// Esta ruta muestra la vista actaposesion/actaposesion.blade.php
Route::view('/actaposesion', 'actaposesion.actaposesion')->name('actaposesion');


Route::get('/ver-pdf', [FirmaController::class, 'verPDF']);
Route::get('/formulario', [FirmaController::class, 'mostrarFormulario']);
Route::post('/procesar-formulario', [FirmaController::class, 'procesarFormulario']);



Route::get('/acta/previsualizar/{folio}', [ActaController::class, 'previsualizar'])->name('acta.previsualizar');
Route::get('/acta/editar/{folio}', [ActaController::class, 'editar'])->name('acta.editar');
Route::get('/acta/continuar/{folio}', [ActaController::class, 'continuar'])->name('acta.continuar');
