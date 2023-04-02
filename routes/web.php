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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('users', App\Http\Controllers\UserController::class)->middleware('web');


Route::resource('partients', App\Http\Controllers\PartientsController::class);


Route::resource('diagnoses', App\Http\Controllers\DiagnosisController::class);


Route::resource('treatments', App\Http\Controllers\TreatmentsController::class);


Route::resource('payments', App\Http\Controllers\PaymentsController::class);


Route::resource('services', App\Http\Controllers\ServicesController::class);
