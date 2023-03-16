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
Route::get('/{class}', [MainController::class, 'get_class']);
Route::get('/{class}/{subject}', [MainController::class, 'get_lesson'])->name('new_lesson');
Route::post('/{class}/{subject}', [MainController::class, 'end_lesson']);

// Route::get('/main', function () {
//     return view('index');
// });

// Route::get('/user/{id}', function ($id) {
//     return view('index');
// });