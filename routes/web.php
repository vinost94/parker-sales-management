<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesTeamController;

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

Route::get('/dashboard', [SalesTeamController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/sales-team/{id}', [SalesTeamController::class, 'show'])->middleware(['auth']);
Route::delete('/sales-team/{id}', [SalesTeamController::class, 'destroy'])->middleware(['auth']);
Route::post('/sales-team', [SalesTeamController::class, 'create'])->middleware(['auth']);
Route::put('/sales-team', [SalesTeamController::class, 'update'])->middleware(['auth']);

require __DIR__.'/auth.php';
