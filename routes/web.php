<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\JugadorController;

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
// Route::get('/inicio', function () {
//     return view('rifa.index');
// });

Route::get('inicio', [EmpleadoController::class, 'vaciaGeneral'])->name('inicio');
Route::get('empleados', [EmpleadoController::class, 'index'])->name('empleados');
Route::get('empezar', [EmpleadoController::class, 'inicio'])->name('empezar');
Route::get('todos', [EmpleadoController::class, 'generarTodos'])->name('todos');


Route::get('especial', [EmpleadoController::class, 'vaciaEspecial'])->name('especial');
Route::get('sorteoEspecial', [EmpleadoController::class, 'especiales'])->name('sorteoEspecial');

Route::get('ganadoresGe', [EmpleadoController::class, 'ganadoresGeneral'])->name('ganadoresGe');
Route::get('ganadoresEsp', [EmpleadoController::class, 'ganadoresEspecial'])->name('ganadoresEsp');

// Route::get('pdfGeneral',[EmpleadoController::class,'createPDFGenerales'])->name('pdfGeneral');
// nuevo pdf
Route::get('pdfGeneral',[JugadorController::class,'guardarbase'])->name('pdfGeneral');

Route::get('pdfEspecial',[EmpleadoController::class,'pdfEspecial'])->name('pdfEspecial');

Route::get('excel',[EmpleadoController::class,'exportExcel'])->name('excel');

// Segunda version 

Route::get('inicioRifa', [JugadorController::class, 'inicio'])->name('inicioRifa');
Route::get('inicioespecial', [JugadorController::class, 'inicioEspecial'])->name('inicioespecial');
Route::get('iniciomitadespecial', [JugadorController::class, 'mitadEspecial'])->name('iniciomitadespecial');

Route::get('rifaEspecial', [JugadorController::class, 'rifaespeciales'])->name('rifaEspecial');
Route::get('rifaEspecialmitad', [JugadorController::class, 'rifaespecialesmitad'])->name('rifaEspecialmitad');


Route::get('general', [JugadorController::class, 'iniciogeneral'])->name('general');
// RUTA DE LOS GANADORES
Route::get('rifageneral', [JugadorController::class, 'rifageneral'])->name('rifageneral');


Route::get('ganadoresEspeciales', [JugadorController::class, 'ganadoresEspecial'])->name('ganadoresEspeciales');


Route::get('resetGeneral',[JugadorController::class,'resetGeneral'])->name('resetGeneral');
Route::get('resetEspecial',[JugadorController::class,'resetEspecial'])->name('resetEspecial');
// ruta para la vista de botones del reset
Route::get('/reset', function () {
    return view('newViews.reset');
});