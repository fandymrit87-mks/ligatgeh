<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermohonanController;

/*
|--------------------------------------------------------------------------
| FORCE HTTPS UNTUK PRODUCTION RAILWAY
|--------------------------------------------------------------------------
*/

if (env('APP_ENV') === 'production') {

    URL::forceScheme('https');

}

/*
|--------------------------------------------------------------------------
| HALAMAN WELCOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return view('welcome');

});

/*
|--------------------------------------------------------------------------
| HALAMAN PERMOHONAN
|--------------------------------------------------------------------------
*/

Route::get('/permohonan',
    [PermohonanController::class, 'create']
);

Route::post('/permohonan',
    [PermohonanController::class, 'store']
)->name('permohonan.store');

/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard',
        [PermohonanController::class, 'dashboard']
    )->name('dashboard');

    Route::get('/admin/permohonan/{id}',
        [PermohonanController::class, 'show']
    )->name('permohonan.show');

    Route::post('/admin/permohonan/{id}/status',
        [PermohonanController::class, 'updateStatus']
    )->name('permohonan.status');

});

/*
|--------------------------------------------------------------------------
| PROFILE USER
|--------------------------------------------------------------------------
*/

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

/*
|--------------------------------------------------------------------------
| VIEW FILE UPLOAD PUBLIC/UPLOADS
|--------------------------------------------------------------------------
*/

Route::get('/uploads/{folder}/{filename}', function ($folder, $filename) {

    $path = public_path(
        'uploads/' . $folder . '/' . $filename
    );

    if (!file_exists($path)) {

        abort(404);

    }

    return response()->file($path);

})->middleware('auth');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';