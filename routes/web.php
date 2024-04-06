<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    \App\Events\OrderShipped::dispatch();
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admin/users/export', [UserController::class, 'export'])->name('admin.users.export');
    Route::resource('/admin/users', UserController::class)->names('admin.users');
    Route::get('/activities', function () {
        return Activity::all();
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
