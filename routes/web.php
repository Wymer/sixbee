<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Auth;


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

Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AppointmentController::class)->group(function () {
    Route::get('/create-appointment', 'create')->name('appointment_create');
    Route::middleware(['auth'])->get('/view-appointments', 'view')->name('appointment_list');
    Route::middleware(['auth'])->get('/edit-appointment/{id}', 'edit')->name('appointment_edit');

    Route::post('/appointment_submit', 'store')->name('appointment_submit');
    Route::middleware(['auth'])->post('/appointment_approve', 'approve')->name('appointment_approve');
    Route::middleware(['auth'])->post('/appointment_update', 'update')->name('appointment_update');
    Route::middleware(['auth'])->post('/appointment_delete', 'delete')->name('appointment_delete');
});