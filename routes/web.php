<?php

use App\Http\Controllers\Admin\AdminCountryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminOVPNFileController;
use App\Http\Controllers\Admin\AdminServerController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/login', [LoginController::class, 'loginshow'])->name('login.show');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('login', [LoginController::class, 'login'])->name('login');
// Route::middleware(['auth'])->group(function () {

// });
Route::middleware(['auth'])->group(function(){
       Route::get('/', function () {
        return redirect()->route('dashboard');
    });
    Route::get('/dashboard', function () {
        return redirect()->route('dashboard');
    })->name('dashboard.index');
    Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('admin/dashboard/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('countries', AdminCountryController::class);
    });
    // Route::resource('admin/servers', AdminServerController::class);
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('ovpn-files', AdminOVPNFileController::class);
    });;
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('servers', AdminServerController::class);
    });;
});
