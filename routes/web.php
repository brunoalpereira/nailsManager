<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;
use App\Models\Services;

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

Route::get('/services/create',[ServicesController::class, 'create']);
Route::post('/services', [ServicesController::class, 'store']);
Route::get('/services/edit/{id}', [ServicesController::class, 'edit']);
Route::put('/services/update/{id}', [ServicesController::class, 'update']);
Route::get('/services', [ServicesController::class,'index']);
Route::delete('/services/delete/{id}',[ServicesController::class,'delete']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
