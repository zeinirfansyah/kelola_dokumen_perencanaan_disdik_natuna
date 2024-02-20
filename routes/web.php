<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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
    Route::get('/home', [HomeController::class, 'index'])->name('customer.home');

    // Admin and superadmin routes
    Route::middleware(['auth', 'user-access:admin,superadmin'])->group(function(){
        Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');

        Route::prefix('admin/profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('profile.show');
            Route::get('/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
            Route::put('/update', [ProfileController::class, 'editProfile'])->name('profile.edit');
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
