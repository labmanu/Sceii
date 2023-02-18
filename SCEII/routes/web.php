<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ConfirmController;

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

/* INTERFACES */
Route::get('/', [Controller::class,'raiz'])->name('/');

// Registro
Route::get('/registro', function () { return view('registro.tipo');});
Route::get('/registro/{tipo}', function () { return view('registro.registro');});
Route::get('/confirmarCuenta/{token}',  [ConfirmController::class,'start'])->name('confirmarCuenta');

// Recuperar contraseña
Route::get('/recuperar', [Controller::class,'recuperar'])->name('recuperar');
//Route::post('/recuperar/validar', [Controller::class,'validar'])->name('validar');
Route::get('/recuperar/validar', [Controller::class,'validar'])->name('validar');
//Route::get('/recuperar/validar/confirmar', [Controller::class,'confirmar'])->name('confirmar');
Route::post('/recuperar/validar/confirmar', [Controller::class,'confirmar'])->name('confirmar');

// Control de Usuarios
Route::post('/login', [Controller::class,'login'])->name('redireccion.login');
Route::get('/redireccion', [Controller::class,'redireccion'])->name('redireccion');
Route::get("/logOut", [Controller::class,'logOut'])->name("logOut");

// Session [ALUMNO]
Route::get('/alumno', [Controller::class,'alumno'])->name('alumno');
Route::get('/alumno/perfil', [Controller::class,'perfil'])->name('perfil');
Route::get('/alumno/editar', [Controller::class,'editar'])->name('editar');
Route::get('/alumno/laboratorio/{id}', [Controller::class,'laboratorio'])->name('laboratorio');
Route::get('/alumno/laboratorio/{id}/asistencia', [Controller::class,'asistencia'])->name('asistencia');
Route::get('/alumno/laboratorio/{id}/calendario', [Controller::class,'calendario'])->name('calendario');
Route::get('/alumno/laboratorio/{id}/compañeros', [Controller::class,'compas'])->name('compas');

