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

Route::get('ajax-get-service-info',[\App\Http\Controllers\ServicesController::class, 'ajaxGetServiceInfo'])->name('ajax_get_service_info');
Route::get('ajax-append-service',[\App\Http\Controllers\ServicesController::class, 'ajaxAppendService'])->name('ajax_append_service');
Route::get('ajax-add-payment',[\App\Http\Controllers\PaymentsController::class, 'ajaxAddPayment'])->name('ajax_add_payment');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('users', App\Http\Controllers\UserController::class)->middleware('verified');


Route::resource('partients', App\Http\Controllers\PartientsController::class);

Route::get('partients/history/{id}',[\App\Http\Controllers\PartientsController::class, 'history'])->name('partients.history');


Route::resource('diagnoses', App\Http\Controllers\DiagnosisController::class);


Route::resource('treatments', App\Http\Controllers\TreatmentsController::class);


Route::resource('payments', App\Http\Controllers\PaymentsController::class);


Route::resource('services', App\Http\Controllers\ServicesController::class);
