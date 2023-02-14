<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
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
    return view('welcome');
});

//Accediendo directamente a vista
Route::get('/empleado', function (){
    return view('empleado.index');
});

//Accediendo a vista desde controlador
//método por método
/* Route::get('/empleados/create',[EmpleadosController::class, 'create']); */
//Todos los métodos del controlador
Route::resource('empleado', EmpleadosController::class);