<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect root ke login
Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    /**
     * Dashboard
     */
    Route::get('/dashboard', [FileController::class, 'index'])->name('dashboard');

    /**
     * File Management
     */
    Route::get('/files', [FileController::class, 'index'])->name('files.index');
    Route::post('/files', [FileController::class, 'store'])->name('files.store');
    Route::get('/files/{id}/download', [FileController::class, 'download'])->name('files.download');
    Route::get('/files/{id}/show', [FileController::class, 'showPdf'])->name('files.showPdf'); // ✅ konsisten dengan blade
    Route::delete('/files/{id}', [FileController::class, 'destroy'])->name('files.destroy');

    /**
     * Dashboard by Role
     */
    Route::get('/dashboard/admin', function () {
        return view('dashboard.admin');
    })->middleware('role:admin')->name('admin.dashboard');

    Route::get('/dashboard/user', function () {
        return view('dashboard.user');
    })->middleware('role:user')->name('user.dashboard');

    /**
     * Profile Management
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /**
     * User Management (Admin only)
     */
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    
    /**
     * Example routes
     */
    Route::get('/admin', function () {
        return "Halo Admin";
    })->middleware('role:admin');

    Route::get('/user', function () {
        return "Halo User";
    })->middleware('role:user');

    Route::get('/detail', function () {
        return view('detail');
    })->name('detail');
});

require __DIR__.'/auth.php';
