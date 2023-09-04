<?php


use App\Http\Controllers\CommonController;
use App\Http\Controllers\StudentController;

//student
Route::prefix('dashboard')->as('student.')->controller(StudentController::class)->group(function () {
    Route::get('', 'index')->name('dashboard');
    Route::post('{student}', 'update')->name('update');
});

Route::post('get-upazila', [CommonController::class, 'getUpazila'])->name('get_upazila');
Route::post('get-union', [CommonController::class, 'getUnion'])->name('get_union');
