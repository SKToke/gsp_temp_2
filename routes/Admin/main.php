<?php


/*Route::prefix('dashboard')->name('jeebika.')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard.view');
    Route::post('head', [DashboardController::class, 'getHeadData'])->name('dashboard.view__head');
    Route::post('project-manager', [DashboardController::class, 'getProjectManagerData'])->name('dashboard.view__project_manager');
});*/

use App\Http\Controllers\Admin\DataImportController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\CommonController;


Route::prefix('settings')->group(base_path('routes/Admin/settings.php'));

//EXIM
Route::prefix('exim')->controller(DataImportController::class)->group(function () {
    Route::get('', 'index')->name('exim.view');
    Route::post('', 'import')->name('exim.import');
});

//Students
Route::prefix('students')->as('students.')->controller(StudentsController::class)->group(function () {
    Route::get('', 'index')->name('view');
    Route::get('{student}/edit', 'edit')->name('edit');
    Route::get('{student}/view', 'view')->name('view_single');
    Route::post('{student}', 'update')->name('update');
    Route::get('{student}/password', 'password')->name('password');
});

