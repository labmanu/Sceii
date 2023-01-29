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

// Login
Route::get('/', function () { // Home / Login
    //Session::forget('data');
    //Session::flush();
    session_start();
    if(isset($_SESSION["data"]))
        return view('alumno.home');
    else
        return view('login');
})->name('/');
Route::post('/login', [Controller::class,'signin'])->name('redireccion.login');

//Creo que el /inicio se puede dejar como raiz pero se deberia cambiar la forma de cerrar session
Route::get('/inicio', [Controller::class,'redireccion'])->name('redireccion');
Route::get('/laboratorio/{id}', [Controller::class,'laboratorio'])->name('laboratorio');

// Registro
Route::get('/registro', function () { // Tipo de registro
    //Session::flush();
    return view('registro.tipo');
});
Route::get('/registro/{tipo}', function () { // Interfaz dinámica para el registro
    //Session::flush();
    return view('registro.registro');
});

Route::post('/registrar', [Controller::class,'nuevoRegistro'])->name('registrar.nuevo');
Route::get('/registrado', [Controller::class,'getLogin'])->name('registrado');
Route::get("/logOut", [Controller::class,'logOut'])->name("logOut");

// Confirmar cuenta
Route::get('/confirmarCuenta/{token}',  [ConfirmController::class,'start'])->name('confirmarCuenta');

// Alumno
Route::get('/alumno', function () { // Alumno
    session_start();
    if(isset($_SESSION["data"]))
    return view('alumno.home');
    else
    header("location: /SCEII");
});
