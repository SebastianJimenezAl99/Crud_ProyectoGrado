<?php

use App\Http\Controllers\CarreraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('layouts.app');
});
/*
Route::get('/estudiante', function () {
    return view('estudiante.index');
});//Al cololar /estudiante estamos diciendo que cuando entre, nos lleve a la vista que retorna la cual es la carpeta estudiante en el index

Route::get('/estudiante/create',[EstudianteController::class,'create']);
*/
Route::resource('estudiantes',EstudianteController::class);
Auth::routes();
Route::resource('carreras',CarreraController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard.dashboard');
