<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('server', [AuthController::class, 'server'])->name('server');

Route::get('properties', [PropertyController::class, 'index'])
    ->name('properties.index');
Route::post('properties/filter', [PropertyController::class, 'filter'])
    ->name('properties.filter');