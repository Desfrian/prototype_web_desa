<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\PotentialController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ComplaintController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\TourismController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\ComplaintController as AdminComplaintController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\VillageProfileController;
use App\Http\Controllers\Admin\GalleryController;

// ============================================
// FRONTEND
// ============================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfileController::class, 'index'])->name('profile');
Route::get('/potensi', [PotentialController::class, 'index'])->name('potential');
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/layanan', [ServiceController::class, 'index'])->name('service');
Route::get('/pengaduan', [ComplaintController::class, 'create'])->name('complaint.create');
Route::post('/pengaduan', [ComplaintController::class, 'store'])->name('complaint.store');
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');

// ============================================
// ADMIN — semua butuh login
// ============================================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
         ->name('dashboard');

    // ---- Super Admin + Admin Konten ----
    Route::middleware('role:super-admin|admin-konten')->group(function () {
        Route::resource('news', AdminNewsController::class);
        Route::resource('tourism', TourismController::class);
        Route::resource('umkm', UmkmController::class);
        Route::resource('gallery', GalleryController::class);

        // Profil Desa
        Route::get('village', [VillageProfileController::class, 'index'])
             ->name('village.index');
        Route::put('village/profile', [VillageProfileController::class, 'updateProfile'])
             ->name('village.update-profile');
        Route::post('village/officials', [VillageProfileController::class, 'storeOfficial'])
             ->name('village.store-official');
        Route::delete('village/officials/{official}', [VillageProfileController::class, 'destroyOfficial'])
             ->name('village.destroy-official');
        Route::post('village/statistics', [VillageProfileController::class, 'storeStatistic'])
             ->name('village.store-statistic');
        Route::delete('village/statistics/{statistic}', [VillageProfileController::class, 'destroyStatistic'])
             ->name('village.destroy-statistic');
    });

    // ---- Super Admin + Admin Layanan ----
    Route::middleware('role:super-admin|admin-layanan')->group(function () {
        Route::get('complaints', [AdminComplaintController::class, 'index'])
             ->name('complaints.index');
        Route::get('complaints/{complaint}', [AdminComplaintController::class, 'show'])
             ->name('complaints.show');
        Route::patch('complaints/{complaint}/status', [AdminComplaintController::class, 'updateStatus'])
             ->name('complaints.status');
        Route::delete('complaints/{complaint}', [AdminComplaintController::class, 'destroy'])
             ->name('complaints.destroy');
    });

    // ---- Super Admin Only ----
    Route::middleware('role:super-admin')->group(function () {
        Route::resource('users', AdminUserController::class);
        Route::get('settings', [SiteSettingController::class, 'index'])
             ->name('settings.index');
        Route::put('settings', [SiteSettingController::class, 'update'])
             ->name('settings.update');

        // Role & Akses
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
        Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });

});

require __DIR__.'/auth.php';