<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SupportController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');
Route::resource('empresas', EmpresaController::class)->names('admin.businesses');
Route::resource('accounts', AccountController::class)->names('admin.accounts');
Route::resource('items', ItemController::class)->names('admin.items');
Route::resource('products', ProductoController::class)->names('admin.products');

Route::get('reports', [ReportController::class, 'index'])->name('admin.reports.index');
Route::get('supports', [SupportController::class, 'index'])->name('admin.supports.index');
