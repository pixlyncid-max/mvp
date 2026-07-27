<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MilestoneController;
use App\Http\Controllers\Admin\PageContentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// ─── Public Pages ─────────────────────────────────────────────────────────────
Route::get('/',         [PageController::class, 'home'])->name('home');
Route::get('/layanan',  [PageController::class, 'layanan'])->name('layanan');
Route::get('/tentang',  [PageController::class, 'tentang'])->name('tentang');
Route::get('/tim',      [PageController::class, 'tim'])->name('tim');
Route::get('/kontak',   [PageController::class, 'kontak'])->name('kontak');

// ─── Admin Auth ───────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware('admin')->group(function () {
        Route::get('/',          [DashboardController::class, 'index'])->name('dashboard');

        // Settings
        Route::get('/settings',  [SettingController::class, 'index'])->name('settings.index');
        Route::put('/settings',  [SettingController::class, 'update'])->name('settings.update');

        // Services
        Route::resource('services', ServiceController::class)->except(['show']);
        Route::patch('/services/{service}/toggle', [ServiceController::class, 'toggleActive'])->name('services.toggle');

        // Team
        Route::resource('team', TeamController::class)->except(['show']);

        // Testimonials
        Route::resource('testimonials', TestimonialController::class)->except(['show']);

        // Milestones
        Route::resource('milestones', MilestoneController::class)->except(['show']);

        // Page Contents
        Route::get('/pages',          [PageContentController::class, 'index'])->name('pages.index');
        Route::get('/pages/{page}',   [PageContentController::class, 'edit'])->name('pages.edit');
        Route::put('/pages/{page}',   [PageContentController::class, 'update'])->name('pages.update');
    });
});
