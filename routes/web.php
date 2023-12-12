<?php

use App\Http\Controllers\UsuarioController;
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

Route::get('/', [UsuarioController::class, 'index'])->name('home');
route::post('/register', [UsuarioController::class,'store'])->name('usuario.register');
route::get('listar', [UsuarioController::class, 'show'])->name('usuario.index');
route::delete('/delete/{usuario}', [UsuarioController::class,'delete'])->name('usuario.delete');
route::patch('/update/{usuario}', [UsuarioController::class,'update'])->name('usuario.update');