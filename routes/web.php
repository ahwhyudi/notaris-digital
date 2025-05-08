<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

route::get('/', [IndexController::class, 'index'])->name('components.index');
route::get('/report', [DashboardController::class, 'report'])->name('components.admin.dashboard');
route::get('/dashboard/divisi/{id}', [DashboardController::class, 'show'])->name('detail-user.rekap-detail-user');
route::post('/import', [DashboardController::class, 'import'])->name('dashboard.import');
route::delete('/delete', [DashboardController::class, 'delete'])->name('dashboard.delete');
route::get('/login',[AuthController::class,'loginForm'])->name('components.admin.login');
route::post('/login',[AuthController::class,'login']);
route::post('/logout',[AuthController::class,'logout'])->name('logout');
