<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AuthController::class,'login'])->name('login');
Route::post('/',[AuthController::class, 'handlelogin'])->name('handlelogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', function () {
    return view('dashboard.admin');
})->middleware('auth')->name('dashboard');

Route::get('/employes', function () {
    return view('employers.employer');
});

Route::get('/compagnes', function () {
    return view('compaigns.index');
});
Route::get('/parametres', function () {
    return view('parametres.parametre');
});

Route::get('/manager', function () {
    return view('manager.dashboard');
});


