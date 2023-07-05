<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'index']);
Route::get('/{students_group_id}', [MainController::class, 'get_class']);
Route::get('/{students_group_id}/{subject_id}', [MainController::class, 'start_lesson'])->name('start_lesson');
Route::post('/{students_group_id}/{subject_id}', [MainController::class, 'end_lesson'])->name('end_lesson');
