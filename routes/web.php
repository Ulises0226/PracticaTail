<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidarContoller;
use App\Http\Controllers\OtraVentanaContoller;
use App\Http\Controllers\CrearCuentaContoller;
use App\Http\Controllers\LoginContoller;
use App\Http\Controllers\LogoutContoller;
use App\Http\Controllers\ModificarController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\ModificarCuentaController;


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
    return view('ejemplo');
})->name('index');

Route::post('/', [ValidarContoller::class,'obtenerDatos'])->name('index');
Route::get('acceso',[OtraVentanaContoller::class,'vincular'])->name('post.index');

Route::get('crear',[CrearCuentaContoller::class,'mostrarDatos'])->name('crear-cuenta');
Route::post('crear',[CrearCuentaContoller::class,'crearDatos'])->name('crear-cuenta');

Route::post('/logout',[LogoutContoller::class,'cerrarsesion'])->name('logout');

Route::delete('/eliminar/{user}',[OtraVentanaContoller::class,'eliminar'])->name('post.delete');

Route::get('/login',[LoginContoller::class,'mostrarLogin'])->name('login');

Route::post('/editar-cuenta/{user}',[OtraVentanaContoller::class,'editar'])->name('post.edit');
Route::get('/editar-usuario/{user}',[ModificarController::class,'mostrar'])->name('post.editar');






