<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can ter web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/add/user', [App\Http\Controllers\UserController::class, 'store'])->name('user.add');
Route::post('/update/user', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::group(['prefix' => 'profile', 'middleware' => ['auth']], function() {
    Route::get('/', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::get('/edit', [App\Http\Controllers\UserController::class, 'profile_edit'])->name('profile.edit');
});

Route::group(['prefix' => 'staff', 'middleware' => ['auth']], function() {
    Route::get('/', [App\Http\Controllers\StaffController::class, 'index'])->name('staff');
    Route::get('/add', [App\Http\Controllers\StaffController::class, 'add'])->name('staff.add');
    Route::get('/update/{id}', [App\Http\Controllers\StaffController::class, 'update'])->name('staff.update');
    Route::post('/search', [App\Http\Controllers\StaffController::class, 'search'])->name('staff.search');
});

Route::group(['prefix' => 'student', 'middleware' => ['auth']], function() {
    Route::get('/', [App\Http\Controllers\StudentController::class, 'index'])->name('student');
    Route::get('/add', [App\Http\Controllers\StudentController::class, 'add'])->name('student.add');
    Route::get('/update/{id}', [App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
    Route::post('/search', [App\Http\Controllers\StudentController::class, 'search'])->name('student.search');
    Route::get('/profile/{id}', [App\Http\Controllers\StudentController::class, 'profile'])->name('student.profile');
});

Route::group(['prefix' => 'company', 'middleware' => ['auth']], function() {
    Route::get('/', [App\Http\Controllers\CompanyController::class, 'index'])->name('company');
    Route::get('/add', [App\Http\Controllers\CompanyController::class, 'add'])->name('company.add');
    Route::get('/update/{id}', [App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
    Route::post('/updateform', [App\Http\Controllers\CompanyController::class, 'update_form'])->name('company.update.form');
    Route::post('/search', [App\Http\Controllers\CompanyController::class, 'search'])->name('company.search');
    Route::get('/{id}', [App\Http\Controllers\CompanyController::class, 'detail'])->name('company.detail');

    Route::post('/approve', [App\Http\Controllers\CompanyController::class, 'approve'])->name('company.approve');
    Route::post('/reject', [App\Http\Controllers\CompanyController::class, 'reject'])->name('company.reject');
});

Route::group(['prefix' => 'vacancy', 'middleware' => ['auth']], function() {
    Route::get('/', [App\Http\Controllers\VacancyController::class, 'index'])->name('vacancy.index');
    Route::get('/company/{id}', [App\Http\Controllers\VacancyController::class, 'vacancy'])->name('vacancy');
    Route::get('/detail/{id}', [App\Http\Controllers\VacancyController::class, 'detail'])->name('vacancy.detail');
    Route::get('/edit/{id}', [App\Http\Controllers\VacancyController::class, 'edit'])->name('vacancy.edit');

    Route::get('/add', [App\Http\Controllers\VacancyController::class, 'add'])->name('vacancy.add');
    Route::post('/addorm', [App\Http\Controllers\VacancyController::class, 'add_form'])->name('vacancy.add.form');
    Route::post('/editorm', [App\Http\Controllers\VacancyController::class, 'edit_form'])->name('vacancy.edit.form');

    Route::post('/search', [App\Http\Controllers\VacancyController::class, 'search'])->name('vacancy.search');

    Route::post('/apply', [App\Http\Controllers\VacancyController::class, 'apply'])->name('vacancy.apply');

    Route::post('/applicant/approve', [App\Http\Controllers\VacancyController::class, 'approve'])->name('vacancy.approve');
    Route::post('/applicant/reject', [App\Http\Controllers\VacancyController::class, 'reject'])->name('vacancy.reject');
    Route::post('/applicant/pending', [App\Http\Controllers\VacancyController::class, 'pending'])->name('vacancy.pending');
});

Route::group(['prefix' => 'registration', 'middleware' => ['auth']], function() {
    Route::get('/', [App\Http\Controllers\RegistrationController::class, 'index'])->name('registration');
});