<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MbgDistributionController;
Route::get('/', [MbgDistributionController::class, 'index'])->name('mbg.index');
Route::post('/distribution', [MbgDistributionController::class, 'store'])->name('mbg.store');
Route::patch('/distribution/{id}/status', [MbgDistributionController::class, 'updateStatus'])->name('mbg.updateStatus');
Route::delete('/distribution/{id}', [MbgDistributionController::class, 'destroy'])->name('mbg.destroy');

Route::post('/school', [MbgDistributionController::class, 'storeSchool'])->name('school.store');
Route::delete('/school/{id}', [MbgDistributionController::class, 'destroySchool'])->name('school.destroy');

Route::post('/menu', [MbgDistributionController::class, 'storeMenu'])->name('menu.store');
Route::delete('/menu/{id}', [MbgDistributionController::class, 'destroyMenu'])->name('menu.destroy');

// --- Edit Routes ---
Route::get('/distribution/{id}/edit', [MbgDistributionController::class, 'edit'])->name('mbg.edit');
Route::put('/distribution/{id}', [MbgDistributionController::class, 'update'])->name('mbg.update');

Route::get('/school/{id}/edit', [MbgDistributionController::class, 'editSchool'])->name('school.edit');
Route::put('/school/{id}', [MbgDistributionController::class, 'updateSchool'])->name('school.update');

Route::get('/menu/{id}/edit', [MbgDistributionController::class, 'editMenu'])->name('menu.edit');
Route::put('/menu/{id}', [MbgDistributionController::class, 'updateMenu'])->name('menu.update');
