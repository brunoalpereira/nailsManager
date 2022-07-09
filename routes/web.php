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

Route::get('/personal-infos/create',[PersonalInfosController::class, 'create']);
Route::post('/personal-infos', [PersonalInfosController::class, 'store']);
Route::get('/personal-infos/edit/{id}', [PersonalInfosController::class, 'edit']);
Route::put('/personal-infos/update/{id}', [PersonalInfosController::class, 'update']);
Route::get('/personal-infos', [PersonalInfosController::class,'index']);
Route::delete('/personal-infos/delete/{id}',[PersonalInfosController::class,'delete']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
