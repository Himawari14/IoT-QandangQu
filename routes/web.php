<?php
namespace App\Http\Controllers;

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
Route::get('/login',[AuthController::class, 'index'])->name('login');
Route::post('/auth/login',[AuthController::class, 'login']);
Route::post('/auth/logout',[AuthController::class, 'logout']);

Route::middleware('auth')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::middleware('role:farmer')->prefix('config')->name('config.')->group(function(){
        Route::get('config/heater',[ConfigHeaterController::class,'index']);
        Route::post('config/heater/update',[ConfigHeaterController::class,'update'])->name('heater.update');
        Route::get('config/lamp',[ConfigLampController::class,'index']);
        Route::post('config/lamp/update',[ConfigLampController::class,'update'])->name('lamp.update');
    });
    Route::middleware('role:admin')->prefix('manage')->name('manage.')->group(function(){
        Route::resource('users', UserController::class);
        Route::resource('devices', DeviceController::class);
    });
});



    // Route::get('config/heater',[ConfigHeaterController::class,'index']);
    // Route::post('config/heater/update',[ConfigHeaterController::class,'update'])->name('heater.update');
    // Route::get('config/lamp',[ConfigLampController::class,'index']);
    // Route::post('config/lamp/update',[ConfigLampController::class,'update'])->name('lamp.update');