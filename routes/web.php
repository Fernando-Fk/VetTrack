<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\VeterinarioController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\VacunaController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
     return view('landing');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('propietarios', PropietarioController::class);
Route::resource('mascotas', MascotaController::class);
Route::resource('veterinarios', VeterinarioController::class);
Route::resource('consultas', ConsultaController::class);
Route::resource('vacunas', VacunaController::class);

require __DIR__.'/auth.php';
