<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\CollegeController;
use App\Http\Controllers\admin\StudentRegisterController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::controller(CourseController::class)->prefix('courses')->group(function () {
    Route::get('/', 'index')->name('courses.index');
    Route::get('/create','create')->name('courses.create');
    Route::post('/submit', 'save')->name('courses.save');
    Route::get('/edit/{course}', 'edit')->name('courses.edit');
    Route::put('/{course}','update')->name('courses.update');
    Route::get('destory/{course}', 'destroy')->name('courses.destroy');
});

Route::controller(StudentRegisterController::class)->prefix('registers')->group(function () {
    Route::get('/', 'index')->name('registers.index');
    Route::get('/create','create')->name('registers.create');
    Route::post('/submit', 'save')->name('registers.save');
    Route::get('/edit/{studentRegister}', 'edit')->name('registers.edit');
    Route::put('/update/{studentRegister}','update')->name('registers.update');
    Route::get('/show/{studentRegister}','show')->name('registers.show');
    Route::get('destory/{studentRegister}', 'destroy')->name('registers.destroy');
});

Route::controller(CollegeController::class)->prefix('college')->group(function () {
    Route::get('/', 'index')->name('college.index');
    Route::get('/create','create')->name('college.create');
    Route::post('/submit', 'save')->name('college.save');
    Route::get('/edit/{college}', 'edit')->name('college.edit');
    Route::put('/update/{college}','update')->name('college.update');
    Route::get('/show/{college}','show')->name('college.show');
    Route::get('destory/{college}', 'destroy')->name('college.destroy');
});




