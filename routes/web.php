<?php

use App\Http\Controllers\DeployWebhookController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Rector\Edit;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/webhadm2025', [DeployWebhookController::class, 'handle']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/rector', Edit::class)->name('rector.edit')->middleware(['auth']);

require __DIR__.'/auth.php';
