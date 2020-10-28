<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', [LoginController::class, 'index']);


Route::group(['middleware' => 'pageAuth'], function(){
    Route::get('/dashboard-page', [DashboardController::class, 'index']);
});

Route::get('/fetch-transaction', [DashboardController::class, 'fetchTransactions']);
Route::post('/update-sortir', [DashboardController::class, 'updateSortir']);
Route::post('/create-transaction', [DashboardController::class, 'addTransaction']);
Route::get('/print-scale-card/{id}', [DashboardController::class, 'printScaleCard']);
Route::get('/logout-process', [DashboardController::class, 'logoutProcess']);
