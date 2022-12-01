<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

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

Route::get('pdfGeneral',[EmpleadoController::class,'createPDFGenerales'])->name('pdfGeneral');
Route::get('pdfEspecial',[EmpleadoController::class,'pdfEspecial'])->name('pdfEspecial');



