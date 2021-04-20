<?php
 
use Illuminate\Support\Facades\Route;

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

route::resource("empresas",CompaniaController::class);
route::resource("estados",EstadoController::class);
route::resource("cargos",CargoController::class);
route::resource("empleados",EmpleadoController::class); 


 
Auth::routes();
 
