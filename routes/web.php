<?php

use App\Http\Controllers\GaleryController;
use App\Http\Controllers\LKJIPController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PKRKTController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SPMPController;
use App\Http\Controllers\UserDataController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    //    all user routes
    Route::get('/home', [HomeController::class, 'index'])->name('visitor.home');

    // Admin and superadmin routes
    Route::middleware(['auth', 'user-access:admin,superadmin'])->group(function(){
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
        
    });

    // Superadmin only
    Route::middleware(['auth', 'user-access:superadmin'])->group(function(){
        Route::get('/superadmin/users-management', [UserDataController::class, 'index'])->name('users.index');
        Route::delete('/{id}/delete', [UserDataController::class, 'deleteUser'])->name('users.delete');
        Route::get('/{id}/detail', [UserDataController::class, 'detailUser'])->name('users.detail');
        Route::get('/{id}/update', [UserDataController::class, 'updateUser'])->name('users.update');
        Route::put('/{id}/update', [UserDataController::class, 'editUser'])->name('users.edit');
        Route::get('/create', [UserDataController::class, 'createUser'])->name('users.create');
        Route::post('/create', [UserDataController::class, 'storeUser'])->name('users.store');
    });
});
