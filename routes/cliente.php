<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cliente\HomeController as ClienteHomeController;

Route::get('', [ClienteHomeController::class, 'index'])->name('cliente.home');
Route::post('store', [ClienteHomeController::class, 'store'])->name('cliente.store');
