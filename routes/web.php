<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermohonanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',
    [PermohonanController::class, 'dashboard']
)->middleware(['auth'])
 ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch('/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete('/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/permohonan',
    [PermohonanController::class, 'create']
);

Route::post('/permohonan',
    [PermohonanController::class, 'store']
)->name('permohonan.store');

Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard',
        [PermohonanController::class, 'dashboard']
    )->name('dashboard');

   Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard',
        [PermohonanController::class,
        'dashboard']
    )->name('dashboard');

    Route::get('/admin/permohonan/{id}',
        [PermohonanController::class,
        'show']
    )->name('permohonan.show');

    Route::post('/admin/permohonan/{id}/status',
        [PermohonanController::class,
        'updateStatus']
    )->name('permohonan.status');

});

});