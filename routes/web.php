<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [Controllers\FilterController::class, 'index'])->name('filter');
Route::resource('genres', Controllers\GenreController::class);
Route::resource('movies', Controllers\MovieController::class);
Route::patch('movies/poster/{id}', [Controllers\MovieController::class, 'deleteImage'])->name('deleteImage'); //удаляет постер
Route::get('admin/movies', [Controllers\Admin\MovieController::class, 'index'])->name('admin.movies'); // выводит список всех фильмов
Route::patch('admin/movies/{id}', [Controllers\Admin\MovieController::class, 'update'])->name('admin.movies.update');//обновляет статус фильма
require __DIR__.'/auth.php';


