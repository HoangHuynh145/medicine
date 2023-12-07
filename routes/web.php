<?php

use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\MedicationsController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\PrescriptionsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PrescriptionsController::class, 'index'])->name('homePage');
Route::resource('/prescriptions', PrescriptionsController::class);
Route::resource('/patients', PatientsController::class);
Route::resource('/doctors', DoctorsController::class);
Route::resource('/medications', MedicationsController::class);