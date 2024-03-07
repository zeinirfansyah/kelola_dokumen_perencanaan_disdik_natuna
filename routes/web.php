<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DpaController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\LKJIPController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KdpController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MusrenbangkabController;
use App\Http\Controllers\PeraturanController;
use App\Http\Controllers\PKRKTController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RenjaController;
use App\Http\Controllers\RkpdController;
use App\Http\Controllers\SaprasController;
use App\Http\Controllers\SPMPController;
use App\Http\Controllers\UserDataController;
use App\Models\About;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// redirect / to /home route
Route::get('/', function () {
    $about = About::first();
    return view('welcome', compact('about'));
});

Route::get('/lkjip', [LandingPageController::class, 'showLKJIP'])->name('landing.lkjip');
Route::get('/spmp', [LandingPageController::class, 'showSPMP'])->name('landing.spmp');
Route::get('/pkrkt', [LandingPageController::class, 'showPKRKT'])->name('landing.pkrkt');
Route::get('/peraturan', [LandingPageController::class, 'showPeraturan'])->name('landing.peraturan');
Route::get('/galery', [LandingPageController::class, 'showGalery'])->name('landing.galery');
Route::get('/contact', [LandingPageController::class, 'showContact'])->name('landing.contact');
Route::get('/sapras', [LandingPageController::class, 'showSapras'])->name('landing.sapras');
Route::get('/kdp', [LandingPageController::class, 'showKdp'])->name('landing.kdp');
Route::get('/musrenbangkab', [LandingPageController::class, 'showMusrenbangkab'])->name('landing.musrenbangkab');
Route::get('/renja', [LandingPageController::class, 'showRenja'])->name('landing.renja');
Route::get('/rkpd', [LandingPageController::class, 'showRkpd'])->name('landing.rkpd');
Route::get('/dpa', [LandingPageController::class, 'showDpa'])->name('landing.dpa');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    //    all user routes
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Admin and superadmin routes
    Route::middleware(['auth', 'user-access:admin,superadmin'])->group(function () {
        Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');

        Route::prefix('admin/profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('profile.show');
            Route::get('/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
            Route::put('/update', [ProfileController::class, 'editProfile'])->name('profile.edit');
        });

        Route::prefix('admin/lkjip')->group(function () {
            Route::get('/', [LKJIPController::class, 'index'])->name('lkjip.index');
            Route::get('/create', [LKJIPController::class, 'createDocument'])->name('lkjip.create');
            Route::post('/create', [LKJIPController::class, 'storeDocument'])->name('lkjip.store');
            Route::get('/{id}/update', [LKJIPController::class, 'updateDocument'])->name('lkjip.update');
            Route::put('/{id}/update', [LKJIPController::class, 'editDocument'])->name('lkjip.edit');
            Route::delete('/{id}/delete', [LKJIPController::class, 'deleteDocument'])->name('lkjip.delete');
        });

        Route::prefix('admin/spmp')->group(function () {
            Route::get('/', [SPMPController::class, 'index'])->name('spmp.index');
            Route::get('/create', [SPMPController::class, 'createDocument'])->name('spmp.create');
            Route::post('/create', [SPMPController::class, 'storeDocument'])->name('spmp.store');
            Route::get('/{id}/update', [SPMPController::class, 'updateDocument'])->name('spmp.update');
            Route::put('/{id}/update', [SPMPController::class, 'editDocument'])->name('spmp.edit');
            Route::delete('/{id}/delete', [SPMPController::class, 'deleteDocument'])->name('spmp.delete');
        });

        Route::prefix('admin/pkrkt')->group(function () {
            Route::get('/', [PKRKTController::class, 'index'])->name('pkrkt.index');
            Route::get('/create', [PKRKTController::class, 'createDocument'])->name('pkrkt.create');
            Route::post('/create', [PKRKTController::class, 'storeDocument'])->name('pkrkt.store');
            Route::get('/{id}/update', [PKRKTController::class, 'updateDocument'])->name('pkrkt.update');
            Route::put('/{id}/update', [PKRKTController::class, 'editDocument'])->name('pkrkt.edit');
            Route::delete('/{id}/delete', [PKRKTController::class, 'deleteDocument'])->name('pkrkt.delete');
        });

        Route::prefix('admin/galery')->group(function () {
            Route::get('/', [GaleryController::class, 'index'])->name('galery.index');
            Route::get('/create', [GaleryController::class, 'createDocument'])->name('galery.create');
            Route::post('/create', [GaleryController::class, 'storeDocument'])->name('galery.store');
            Route::get('/{id}/update', [GaleryController::class, 'updateDocument'])->name('galery.update');
            Route::put('/{id}/update', [GaleryController::class, 'editDocument'])->name('galery.edit');
            Route::delete('/{id}/delete', [GaleryController::class, 'deleteDocument'])->name('galery.delete');
            Route::get('/{id}/detail', [GaleryController::class, 'detailDocument'])->name('galery.detail');
        });

        Route::prefix('admin/peraturan')->group(function () {
            Route::get('/', [PeraturanController::class, 'index'])->name('peraturan.index');
            Route::get('/create', [PeraturanController::class, 'createDocument'])->name('peraturan.create');
            Route::post('/create', [PeraturanController::class, 'storeDocument'])->name('peraturan.store');
            Route::get('/{id}/update', [PeraturanController::class, 'updateDocument'])->name('peraturan.update');
            Route::put('/{id}/update', [PeraturanController::class, 'editDocument'])->name('peraturan.edit');
            Route::delete('/{id}/delete', [PeraturanController::class, 'deleteDocument'])->name('peraturan.delete');
        });

        Route::prefix('admin/about')->group(function () {
            Route::get('/', [AboutController::class, 'index'])->name('about.index');
            Route::get('/create', [AboutController::class, 'createAbout'])->name('about.create');
            Route::post('/create', [AboutController::class, 'storeAbout'])->name('about.store');
            Route::get('/{id}/update', [AboutController::class, 'updateAbout'])->name('about.update');
            Route::put('/{id}/update', [AboutController::class, 'editAbout'])->name('about.edit');
        });

        Route::prefix('admin/sapras')->group(function () {
            Route::get('/', [SaprasController::class, 'index'])->name('sapras.index');
            Route::get('/create', [SaprasController::class, 'createDocument'])->name('sapras.create');
            Route::post('/create', [SaprasController::class, 'storeDocument'])->name('sapras.store');
            Route::get('/{id}/update', [SaprasController::class, 'updateDocument'])->name('sapras.update');
            Route::put('/{id}/update', [SaprasController::class, 'editDocument'])->name('sapras.edit');
            Route::delete('/{id}/delete', [SaprasController::class, 'deleteDocument'])->name('sapras.delete');
        });

        Route::prefix('admin/kdp')->group(function () {
            Route::get('/', [KdpController::class, 'index'])->name('kdp.index');
            Route::get('/create', [KdpController::class, 'createDocument'])->name('kdp.create');
            Route::post('/create', [KdpController::class, 'storeDocument'])->name('kdp.store');
            Route::get('/{id}/update', [KdpController::class, 'updateDocument'])->name('kdp.update');
            Route::put('/{id}/update', [KdpController::class, 'editDocument'])->name('kdp.edit');
            Route::delete('/{id}/delete', [KdpController::class, 'deleteDocument'])->name('kdp.delete');
        });

        Route::prefix('admin/musrenbangkab')->group(function () {
            Route::get('/', [MusrenbangkabController::class, 'index'])->name('musrenbangkab.index');
            Route::get('/create', [MusrenbangkabController::class, 'createDocument'])->name('musrenbangkab.create');
            Route::post('/create', [MusrenbangkabController::class, 'storeDocument'])->name('musrenbangkab.store');
            Route::get('/{id}/update', [MusrenbangkabController::class, 'updateDocument'])->name('musrenbangkab.update');
            Route::put('/{id}/update', [MusrenbangkabController::class, 'editDocument'])->name('musrenbangkab.edit');
            Route::delete('/{id}/delete', [MusrenbangkabController::class, 'deleteDocument'])->name('musrenbangkab.delete');
        });

        Route::prefix('admin/renja')->group(function () {
            Route::get('/', [RenjaController::class, 'index'])->name('renja.index');
            Route::get('/create', [RenjaController::class, 'createDocument'])->name('renja.create');
            Route::post('/create', [RenjaController::class, 'storeDocument'])->name('renja.store');
            Route::get('/{id}/update', [RenjaController::class, 'updateDocument'])->name('renja.update');
            Route::put('/{id}/update', [RenjaController::class, 'editDocument'])->name('renja.edit');
            Route::delete('/{id}/delete', [RenjaController::class, 'deleteDocument'])->name('renja.delete');
        });

        Route::prefix('admin/rkpd')->group(function () {
            Route::get('/', [RkpdController::class, 'index'])->name('rkpd.index');
            Route::get('/create', [RkpdController::class, 'createDocument'])->name('rkpd.create');
            Route::post('/create', [RkpdController::class, 'storeDocument'])->name('rkpd.store');
            Route::get('/{id}/update', [RkpdController::class, 'updateDocument'])->name('rkpd.update');
            Route::put('/{id}/update', [RkpdController::class, 'editDocument'])->name('rkpd.edit');
            Route::delete('/{id}/delete', [RkpdController::class, 'deleteDocument'])->name('rkpd.delete');
        });

        Route::prefix('admin/dpa')->group(function () {
            Route::get('/', [DpaController::class, 'index'])->name('dpa.index');
            Route::get('/create', [DpaController::class, 'createDocument'])->name('dpa.create');
            Route::post('/create', [DpaController::class, 'storeDocument'])->name('dpa.store');
            Route::get('/{id}/update', [DpaController::class, 'updateDocument'])->name('dpa.update');
            Route::put('/{id}/update', [DpaController::class, 'editDocument'])->name('dpa.edit');
            Route::delete('/{id}/delete', [DpaController::class, 'deleteDocument'])->name('dpa.delete');
        });
    });

    // Superadmin only
    Route::middleware(['auth', 'user-access:superadmin'])->group(function () {
        Route::get('/superadmin/users-management', [UserDataController::class, 'index'])->name('users.index');
        Route::delete('/{id}/delete', [UserDataController::class, 'deleteUser'])->name('users.delete');
        Route::get('/{id}/detail', [UserDataController::class, 'detailUser'])->name('users.detail');
        Route::get('/{id}/update', [UserDataController::class, 'updateUser'])->name('users.update');
        Route::put('/{id}/update', [UserDataController::class, 'editUser'])->name('users.edit');
        Route::get('/create', [UserDataController::class, 'createUser'])->name('users.create');
        Route::post('/create', [UserDataController::class, 'storeUser'])->name('users.store');
    });
});
