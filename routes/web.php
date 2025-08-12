<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IeltsTestController;

Route::get('/', [IeltsTestController::class, 'showTest']);
// Route::post('/ielts-test-submit', [IeltsTestController::class, 'submitTest'])->name('ielts.test.submit');
