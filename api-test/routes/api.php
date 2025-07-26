<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\AdviceController;


Route::get('/doctors', [DoctorController::class, 'index']);
Route::get('/doctors/{id}', [DoctorController::class, 'show']);
Route::post('/advice', [AdviceController::class, 'store']);
