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
    return redirect(route('partients.index'));
//    return view('welcome');
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
Route::get('ajax-get-customer-by-phone',[\App\Http\Controllers\PartientsController::class, 'ajaxGetCustomerByPhone'])->name('ajax_get_customer_by_phone');
Route::get('ajax-get-district-by-province',[\App\Http\Controllers\PartientsController::class, 'ajaxGetDistrictByProvince'])->name('ajax_district_by_province');
Route::get('ajax-get-all-ward-by-district',[\App\Http\Controllers\PartientsController::class, 'ajaxGetAllWardByDistrict'])->name('ajax_get_all_ward_by_district');

Auth::routes();


Route::group(['middleware' => 'auth'], function()
{
    Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');

    Route::resource('partients', App\Http\Controllers\PartientsController::class);

    Route::get('partients/history/{id}',[\App\Http\Controllers\PartientsController::class, 'history'])->name('partients.history');


    Route::resource('diagnoses', App\Http\Controllers\DiagnosisController::class);


    Route::resource('treatments', App\Http\Controllers\TreatmentsController::class);


    Route::resource('payments', App\Http\Controllers\PaymentsController::class);


    Route::resource('services', App\Http\Controllers\ServicesController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



