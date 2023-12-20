<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\UserController;

Route::middleware(['App\Http\Middleware\PageVisitMiddleware'])->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('admin.home');
    Route::resource('empresas', EmpresaController::class)->names('admin.businesses');
    Route::resource('accounts', AccountController::class)->names('admin.accounts');
    Route::resource('items', ItemController::class)->names('admin.items');
    Route::resource('products', ProductoController::class)->names('admin.products');
    Route::resource('reports', ReportController::class)->names('admin.reports');
    Route::get('supports', [SupportController::class, 'index'])->name('admin.supports.index');
    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('users', [UserController::class, 'store'])->name('admin.users.store');
});
