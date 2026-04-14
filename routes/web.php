<?php

use App\Http\Controllers\Admin\AccountController as AdminAccountController;
use App\Http\Controllers\Admin\AchievementController as AdminAchievementController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Admin\TeacherController as AdminTeacherController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/tentang', 'pages.tentang')->name('tentang');
Route::get('/guru', [TeacherController::class, 'index'])->name('guru');
Route::get('/program', [ProgramController::class, 'index'])->name('program');
Route::get('/prestasi', [AchievementController::class, 'index'])->name('prestasi');
Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri');
Route::view('/kontak', 'pages.kontak')->name('kontak');
Route::post('/kontak', [ContactMessageController::class, 'store'])->name('kontak.store')->middleware('throttle:10,1');
Route::view('/kontak-alt', 'pages.kontak_alt')->name('kontak.alt');
Route::post('/kontak-alt', [ContactMessageController::class, 'store'])->name('kontak.alt.store')->middleware('throttle:10,1');

// Admin login routes (accessible at /login-admin)
Route::get('/login-admin', [AdminAuthController::class, 'show'])->name('login-admin');
Route::post('/login-admin', [AdminAuthController::class, 'login'])->name('login-admin.store')->middleware('throttle:5,1');

// Legacy /admin/login redirect to /login-admin
Route::get('/admin/login', function () {
    return redirect()->route('login-admin');
});
Route::post('/admin/login', function () {
    return redirect()->route('login-admin');
});

Route::prefix('admin')->name('admin.')->group(function () {
    // Logout route (needs to be accessible)
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected admin routes (require authentication)
    Route::middleware('admin')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::get('/akun', [AdminAccountController::class, 'edit'])->name('account.edit');
        Route::post('/akun', [AdminAccountController::class, 'update'])->name('account.update');

        Route::get('/guru', [AdminTeacherController::class, 'index'])->name('teachers.index');
        Route::post('/guru', [AdminTeacherController::class, 'store'])->name('teachers.store');
        Route::get('/guru/{teacher}/edit', [AdminTeacherController::class, 'edit'])->name('teachers.edit');
        Route::put('/guru/{teacher}', [AdminTeacherController::class, 'update'])->name('teachers.update');
        Route::delete('/guru/{teacher}', [AdminTeacherController::class, 'destroy'])->name('teachers.destroy');

        Route::get('/program', [AdminProgramController::class, 'index'])->name('programs.index');
        Route::post('/program', [AdminProgramController::class, 'store'])->name('programs.store');
        Route::get('/program/{program}/edit', [AdminProgramController::class, 'edit'])->name('programs.edit');
        Route::put('/program/{program}', [AdminProgramController::class, 'update'])->name('programs.update');
        Route::delete('/program/{program}', [AdminProgramController::class, 'destroy'])->name('programs.destroy');

        Route::get('/prestasi', [AdminAchievementController::class, 'index'])->name('achievements.index');
        Route::post('/prestasi', [AdminAchievementController::class, 'store'])->name('achievements.store');
        Route::get('/prestasi/{achievement}/edit', [AdminAchievementController::class, 'edit'])->name('achievements.edit');
        Route::put('/prestasi/{achievement}', [AdminAchievementController::class, 'update'])->name('achievements.update');
        Route::delete('/prestasi/{achievement}', [AdminAchievementController::class, 'destroy'])->name('achievements.destroy');

        Route::get('/galeri', [AdminGalleryController::class, 'index'])->name('gallery.index');
        Route::post('/galeri', [AdminGalleryController::class, 'store'])->name('gallery.store');
        Route::delete('/galeri/{galleryImage}', [AdminGalleryController::class, 'destroy'])->name('gallery.destroy');
    });
});


