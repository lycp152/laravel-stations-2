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

use App\Http\Controllers\PracticeController;
use App\Http\Controllers\Controller;

// Route::get('URL', [Controllerの名前::class, 'Controller内のfunction名']);
Route::get('/practice', [PracticeController::class, 'sample']);
Route::get('/practice2', [PracticeController::class, 'sample2']);
Route::get('/practice3', [PracticeController::class, 'sample3']);
Route::get('/getPractice', [PracticeController::class, 'getPractice']);
Route::get('/movies', [Controller::class, 'movies']);
Route::get('/admin/movies', [Controller::class, 'adminMovies']);
Route::get('/admin/movies/create', [Controller::class, 'adminMoviesCreate']);
Route::post('/admin/movies/store', [Controller::class, 'adminMoviesStore']);
Route::get('/admin/movies/{id}/edit', [Controller::class, 'adminMoviesEdit'])->name('admin.movies.edit');
Route::patch('/admin/movies/{id}/update', [Controller::class, 'adminMoviesUpdate']);
Route::delete('/admin/movies/{id}/destroy', [Controller::class, 'destroyMovie'])->name('admin.movies.destroy');
