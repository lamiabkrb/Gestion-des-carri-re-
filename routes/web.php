<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompagneController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ManagerController;
use App\Models\Employe;
use Illuminate\Support\Facades\Route;

Route::get('/',[AuthController::class,'login'])->name('login');
Route::post('/',[AuthController::class, 'handlelogin'])->name('handlelogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth','role:grh'])->group(function () {
    Route::get('/admin/dashboard',[AppController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/employes', [EmployeController::class, 'index'])->name('employes.index');
    Route::post('/employes/import', [EmployeController::class, 'importcsv'])->name('employes.import');
    Route::get('/admin/compagnes', [CompagneController::class, 'index'])->name('admin.compagnes.index');
    Route::post('/compagnes', [CompagneController::class, 'store'])->name('compagnes.store');
    Route::get('/compagnes/{id}/employes',[CompagneController::class, 'showEmployes'])->name('compagnes.employes');
});

Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/manager/dashboard', [ManagerController::class, 'index'])->name('manager.dashboard');
    Route::get('/manager/{id}/employes_anoter',[ManagerController::class, 'showEmployes'])->name('manager.employes_anoter');
    Route::get('/notation/{compagne_id}/{matricule}', [ManagerController::class, 'showPageNotation'])->name('manager.shownotation');  // envoyer l id compagne ainsi matricule employe
    Route::post('/manager/{compagne_id}/{matricule}/notation',[ManagerController::class, 'noterEmployes'])->name('manager.notation');
    Route::get('/compagnes', [ManagerController::class, 'showCompagne'])->name('manager.showCompagne');

});




Route::get('/parametres', function () {
    return view('parametres.parametre');
})->name('parametres.index');

Route::get('/manager', function () {
    return view('manager.dashboard');
});



