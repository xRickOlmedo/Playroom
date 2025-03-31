<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\AutenticacionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ContactoController;

Route::get('/', [TiendaController::class, 'index'])->name('home');
Route::get('/productos', [TiendaController::class, 'productos'])->name('productos');
Route::get('/membresias', [TiendaController::class, 'membresias'])->name('membresias');
Route::get('/blog', [TiendaController::class, 'blog'])->name('blog');
Route::get('/contacto', [TiendaController::class, 'contacto'])->name('contacto');
Route::get('/registro', [AutenticacionController::class, 'mostrarRegistro'])->name('registro');
Route::post('/registro', [AutenticacionController::class, 'registrar'])->name('registro.post');
Route::get('/login', [AutenticacionController::class, 'mostrarFormularioLogin'])->name('login');
Route::post('/login', [AutenticacionController::class, 'autenticar'])->name('login.post');
Route::get('/logout', [AutenticacionController::class, 'cerrarSesion'])->name('logout');
Route::get('/productos', [ProductoController::class, 'index'])->name('productos');
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'submit'])->name('contacto.submit');
//ruta del panel de administración
Route::get('/admin/panel', function () {
   return view('admin.panel');
})->name('admin.panel');
//ruta para agregar productos
Route::post('/admin/productos/agregar', [ProductoController::class, 'store'])->name('productos.store');

//Route::get('/', function () {
   // return view('welcome');
//});
