<?php

use App\Http\Controllers\CarreraController;
use App\Http\Controllers\CoordinadoreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProfesoreController;
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
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
/*
Route::get('/estudiante', function () {
    return view('estudiante.index');
});//Al cololar /estudiante estamos diciendo que cuando entre, nos lleve a la vista que retorna la cual es la carpeta estudiante en el index

Route::get('/estudiante/create',[EstudianteController::class,'create']);
*/
// Route::resource('estudiantes',EstudianteController::class);
// Route::resource('coordinadores',CoordinadoreController::class);
// Route::resource('carreras',CarreraController::class);
// Route::resource('profesores',ProfesoreController::class);
// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::prefix('home')->group(function () {
        Route::resource('estudiantes',EstudianteController::class);
        Route::resource('coordinadores',CoordinadoreController::class);
        Route::resource('carreras',CarreraController::class);
        Route::resource('profesores',ProfesoreController::class);
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Auth::routes();


Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

