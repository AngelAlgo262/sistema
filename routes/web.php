<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

/* //Accediendo directamente a vista
Route::get('/empleado', function (){
    return view('empleado.index');
});
 */

/* Route::get('/empleados/create',[EmpleadosController::class, 'create']); //Accediendo a vista desde controlador método por método*/



Route::resource('empleado', EmpleadosController::class)->middleware('auth'); //Todos los métodos del controlador
Auth::routes(['register' => false, 'reset' => false]); //ocultar enlaces de autenticación, registro y recuperar contraseña


Route::get('/home', [EmpleadosController::class, 'index'])->name('home');//al escribir /home llevara al controlador de empleados en el index

Route::group(['middleware' => 'auth'], function (){ //crea y protege 
    Route::get('/', [EmpleadosController::class, 'index']) ->name('home'); //a estas rutas
});

