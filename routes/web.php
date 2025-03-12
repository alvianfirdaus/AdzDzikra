<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLevel;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\ControllerSiswa\MaController;
use App\Http\Controllers\ControllerSiswa\SdController;
use App\Http\Controllers\ControllerSiswa\SmpController;

Route::get('/', [LandingController::class, 'index']);

// // Sub routes landing page
Route::prefix('landingpage')->group(function () {
    Route::get('/sd', [SdController::class, 'index'])->name('landing.sd');
    Route::get('/ma', [MaController::class, 'index'])->name('landing.ma');    
    Route::get('/smp', [SmpController::class, 'index'])->name('landing.smp');
});

// Login routes
Route::get('/login', [HomeController::class, 'showLoginForm'])->name('login');
Route::post('/login', [HomeController::class, 'login']);
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

// Register routes
Route::get('/register', [HomeController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [HomeController::class, 'register']);

// Password reset routes
Route::get('/reset-password', [HomeController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [HomeController::class, 'resetPassword'])->name('password.update');

Route::middleware(['auth'])->group(function () {
    Route::get('/change-password', [HomeController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('password.update');
    Route::get('dashboard/pendaftar/{id}', [PendaftarController::class, 'show'])->name('pendaftar.show');
    Route::put('/pendaftar/{id}', [PendaftarController::class, 'update'])->name('pendaftar.update');
    Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
    Route::put('/pembayaran/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
    Route::get('/pembayaran/{id}/print', [PembayaranController::class, 'print'])->name('pembayaran.print');
    Route::get('/siswa/{id}', [SiswaController::class, 'show'])->name('siswa.show');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::get('/siswa/{id}/print', [SiswaController::class, 'print'])->name('siswa.print');
    Route::get('/table', [AdminController::class, 'index'])->name('table');
    Route::put('/pembayaran/update/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
    Route::put('/pembayaran/updatebktperssek/{id}', [PembayaranController::class, 'updatebktperssek'])->name('pembayaran.updatebktperssek');
    Route::put('/pembayaran/updatebktpangpon/{id}', [PembayaranController::class, 'updatebktpangpon'])->name('pembayaran.updatebktpangpon');
    Route::put('/pembayaran/updatebktperpon/{id}', [PembayaranController::class, 'updatebktperpon'])->name('pembayaran.updatebktperpon');
    Route::put('/pembayaran/updatebktup/{id}', [PembayaranController::class, 'updatebktup'])->name('pembayaran.updatebktup');

});

// User routes
Route::middleware(['checkLevel:user'])->group(function () {
    Route::get('/user/dashboard', [HomeController::class, 'showUserDashboard'])->name('user.dashboard');
    Route::get('/user/profile', [HomeController::class, 'viewProfile'])->name('user.profile');
    Route::get('/user/landing', [HomeController::class, 'UserLanding'])->name('user.landing');
    Route::get('/user/edit-profile', [HomeController::class, 'editProfile'])->name('edit-profile');
    Route::post('/user/update-user', [HomeController::class, 'updateUser'])->name('update-user');
    Route::get('/user/dashboard/pendaftar', [PendaftarController::class, 'dashboard'])->name('pendaftar.dashboard');
    Route::post('/user/dashboard/pendaftar', [PendaftarController::class, 'store'])->name('pendaftar.store');
    Route::get('/user/dashboard/pembayaran', [PembayaranController::class, 'dashboard'])->name('pembayaran.dashboard');
    Route::get('/user/dashboard/siswa', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
    Route::get('user/pembayaran/{id}', [PembayaranController::class, 'showuser'])->name('pembayaran.showuser');
    
    

});

// Panitia routes
Route::middleware(['checkLevel:panitia'])->group(function () {
    Route::get('/panitia/dashboard', [HomeController::class, 'showPanitiaDashboard'])->name('panitia.dashboard');
    Route::get('/panitia/profile', [HomeController::class, 'viewProfile'])->name('panitia.profile');
    Route::get('/panitia/siswa', [SiswaController::class, 'dashboard'])->name('panitia.siswa');
    Route::post('add-panitia', [PanitiaController::class, 'addPanitia'])->name('panitia.add-panitia');
    Route::get('/panitia/pendaftar', [PendaftarController::class, 'dashboard'])->name('panitia.pendaftar');
    Route::get('/panitia/pembayaran', [PembayaranController::class, 'dashboard'])->name('panitia.pembayaran');
    Route::get('/panitia/pendaftar/print/{id}', [PendaftarController::class, 'printPDF'])->name('panitia.print');
    Route::get('/panitia/edit/profile', [HomeController::class, 'editProfile'])->name('panitia.edit.editProfile');
    Route::post('/panitia/update-user', [HomeController::class, 'updateUser'])->name('panitia.update-user');
    Route::put('panitia/pendaftar/{id}/update-status', [PendaftarController::class, 'updateStatus'])->name('panitia.pendaftar.updateStatus');
    Route::get('panitia/pembayaran/{id}', [PembayaranController::class, 'show'])->name('pembayaran.show');
});

// Admin routes
Route::middleware(['checkLevel:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'showAdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [HomeController::class, 'viewProfile'])->name('admin.profile');
    Route::get('/admin/admintable', [AdminController::class, 'index'])->name('admin.admintable');
    Route::post('add-admin', [AdminController::class, 'addAdmin'])->name('admin.add-admin');
    Route::get('/admin/pendaftar', [PendaftarController::class, 'dashboard'])->name('admin.pendaftar');
    Route::get('/admin/pembayaran', [PembayaranController::class, 'dashboard'])->name('admin.pembayaran');
    Route::get('/admin/pendaftar/print/{id}', [PendaftarController::class, 'printPDF'])->name('admin.print');
    Route::put('pendaftar/{id}/update-status', [PendaftarController::class, 'updateStatus'])->name('pendaftar.updateStatus');
    Route::get('/admin/siswa', [SiswaController::class, 'dashboard'])->name('admin.siswa');
    Route::post('/admin/update-user', [HomeController::class, 'updateUser'])->name('admin.update-user');
    Route::get('/admin/edit/profile', [HomeController::class, 'editProfile'])->name('admin.edit.editProfile');
    Route::get('/admin/pembayaran/{id}', [PembayaranController::class, 'showadmin'])->name('pembayaran.showadmin');
}
);

// CRUD resources routes
Route::resource('users', AdminController::class);
Route::resource('pendaftars', PendaftarController::class);
Route::resource('panitias', PanitiaController::class);

// Google routes
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Facebook routes
Route::get('login/facebook', [FacebookController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

//Pengumuman routes
Route::get('admin/pengumuman', [PengumumanController::class, 'index'])->name('admin.pengumuman');
Route::resource('pengumuman', PengumumanController::class);

//Gallery routes
Route::get('admin/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
Route::resource('gallery', GalleryController::class);

//Search routes
Route::get('/search', [HomeController::class, 'searchAdmin'])->name('searchAdmin');
Route::get('/search/user', [HomeController::class, 'searchUser'])->name('searchUser');
Route::get('/search/panitia', [HomeController::class, 'searchPanitia'])->name('searchPanitia');
Route::get('/search/pendaftar', [HomeController::class, 'searchPendaftar'])->name('searchPendaftar');
Route::get('/search/pembayaran', [HomeController::class, 'searchPembayaran'])->name('searchPembayaran');
Route::get('/search/gallery', [HomeController::class, 'searchGallery'])->name('searchGallery');
Route::get('/search/pengumuman', [HomeController::class, 'searchPengumuman'])->name('searchPengumuman');
Route::get('/search/pendaftars', [HomeController::class, 'searchPendaftarUser'])->name('searchPendaftarUser');
Route::get('/search/panitia/user', [PanitiaController::class, 'searchPUser'])->name('searchPUser');
Route::get('/search/panitia/panitia', [PanitiaController::class, 'searchPPanitia'])->name('searchPPanitia');
Route::get('/search/panitia/pendaftar', [PanitiaController::class, 'searchPPendaftar'])->name('searchPPendaftar');
Route::get('/search/panitia/siswa', [PanitiaController::class, 'searchPSiswa'])->name('searchPSiswa');
Route::get('/search/panitia/pembayaran', [PanitiaController::class, 'searchPpembayaran'])->name('searchPPembayaran');
