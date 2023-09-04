<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', fn() => view('landing-page'))->middleware('guest');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

/*====== Clear =======*/
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    return "Cleared!";
});
/*====== Cache =======*/
Route::get('/cache', function () {
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
    return "Done!";
});
Route::middleware('admin')->group(function () {
    /*====== Symlink =======*/
    Route::get('/symlink', function () {
        Artisan::call('storage:link');
        return "Linked!";
    });
    /*====== Maintenance =======*/
    Route::get('/m-on', function () {
        Artisan::call('down --render="errors::maintenance" --secret="m-p"');
        return "Application is now in maintenance mode.";
    });
    Route::get('/m-off', function () {
        Artisan::call('up');
        return "Application is now live.";
    });
});
