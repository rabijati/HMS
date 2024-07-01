<?php

use Illuminate\Support\Facades\Route;

use App\Http\ControllerS\HomeController;
use App\Http\ControllerS\AdminController;

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


Route::get('/',[HomeController::Class, 'index']);

Route::get('/home',[HomeController::Class, 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_doctor_view',[AdminController::Class, 'addview']);

Route::post('/upload_doctor',[AdminController::Class, 'upload']);

