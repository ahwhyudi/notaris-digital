<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

route::get('/', [DashboardController::class, 'index'])->name('components.dashboard');
route::get('/dashboard/divisi/{id}', [DashboardController::class, 'show'])->name('detail-user.rekap-detail-user');
route::post('/import', [DashboardController::class, 'import'])->name('dashboard.import');
