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
