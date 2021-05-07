<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/index', function () {
    return redirect('/');
});
Route::get('/home', function () {

    if(Auth::check()) {
        return redirect('/admin/dashboard');

    } else {
        return redirect('/');
    }
});

Route::get('/user/index', [IndexController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    /**
     * Dashboard Routes
     */
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/dashboard', [DashboardController::class, 'upload']);

});
