<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\VaccineController;
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
    return view('homepage');
});

Route::resource('vaccine', VaccineController::class);
Route::get('patient/list-vaccine', [PatientController::class, 'show_list_vaccine'])->name('patient.register');
Route::resource('patient', PatientController::class);
