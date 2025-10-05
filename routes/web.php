<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AuthController::class,'login'])->name('login');
Route::post('/',[AuthController::class, 'handlelogin'])->name('handlelogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth','role:GRH'])->group(function () {
    Route::get('/admin/dashboard',[AppController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:Manager'])->group(function () {
    Route::get('/manager/dashboard', [ManagerController::class, 'index'])->name('manager.dashboard');
});

Route::get('/employes', function () {
    return view('employers.employer');
})->name('employes.index');

Route::get('/compagnes', function () {
    return view('compaigns.index');
})->name('compagnes.index');
Route::get('/parametres', function () {
    return view('parametres.parametre');
})->name('parametres.index');

Route::get('/manager', function () {
    return view('manager.dashboard');
});


