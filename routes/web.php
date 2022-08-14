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
    Route::get('/dt/staff', [App\Http\Controllers\StaffController::class, 'dt'])->name('dt_staff');


    Route::get('/add', [App\Http\Controllers\StaffController::class, 'add'])->name('staff.add');
    Route::get('/update/{id}', [App\Http\Controllers\StaffController::class, 'update'])->name('staff.update');
    Route::post('/search', [App\Http\Controllers\StaffController::class, 'search'])->name('staff.search');
});

Route::group(['prefix' => 'report', 'middleware' => ['auth']], function() {
    Route::get('/submit', [App\Http\Controllers\ReportController::class, 'submit'])->name('report.submit');
    Route::post('/reportAdd', [App\Http\Controllers\ReportController::class, 'reportAdd'])->name('report.addSubmit');

    Route::group(['middleware' => ['role:admin|coordinator']], function() {
        Route::get('/', [App\Http\Controllers\ReportController::class, 'index'])->name('report');
        Route::get('/add', [App\Http\Controllers\ReportController::class, 'create'])->name('report.add');
        Route::post('/store', [App\Http\Controllers\ReportController::class, 'store'])->name('report.store');
        Route::get('/edit/{id}', [App\Http\Controllers\ReportController::class, 'edit'])->name('report.edit');
        Route::post('/update/{id}', [App\Http\Controllers\ReportController::class, 'update'])->name('report.update');
        Route::get('/delete/{id}', [App\Http\Controllers\ReportController::class, 'destroy'])->name('report.delete');
        Route::get('/detail/{id}', [App\Http\Controllers\ReportController::class, 'show'])->name('report.show');
        Route::post('/putMark', [App\Http\Controllers\ReportController::class, 'updateMark'])->name('report.updateMark');
    });
});

Route::group(['prefix' => 'student', 'middleware' => ['auth']], function() {
    Route::get('/', [App\Http\Controllers\StudentController::class, 'index'])->name('student');
    Route::get('/dt/students', [App\Http\Controllers\StudentController::class, 'dt'])->name('dt_students');


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
    
    Route::post('/addform', [App\Http\Controllers\CompanyController::class, 'add_form'])->name('company.add.form');
    Route::post('/approve', [App\Http\Controllers\CompanyController::class, 'approve'])->name('company.approve');
    Route::post('/reject', [App\Http\Controllers\CompanyController::class, 'reject'])->name('company.reject');
});

Route::group(['prefix' => 'vacancy', 'middleware' => ['auth']], function() {
    Route::get('/', [App\Http\Controllers\VacancyController::class, 'index'])->name('vacancy.index');
    Route::get('/company/{id}', [App\Http\Controllers\VacancyController::class, 'vacancy'])->name('vacancy');
    Route::get('/detail/{id}', [App\Http\Controllers\VacancyController::class, 'detail'])->name('vacancy.detail');
    Route::get('/edit/{id}', [App\Http\Controllers\VacancyController::class, 'edit'])->name('vacancy.edit');
    Route::get('/delete/{id}', [App\Http\Controllers\VacancyController::class, 'delete'])->name('vacancy.delete');


    Route::get('/add', [App\Http\Controllers\VacancyController::class, 'add'])->name('vacancy.add');
    Route::post('/addorm', [App\Http\Controllers\VacancyController::class, 'add_form'])->name('vacancy.add.form');
    Route::post('/editorm', [App\Http\Controllers\VacancyController::class, 'edit_form'])->name('vacancy.edit.form');

    Route::post('/search', [App\Http\Controllers\VacancyController::class, 'search'])->name('vacancy.search');

    Route::post('/apply', [App\Http\Controllers\VacancyController::class, 'apply'])->name('vacancy.apply');
    Route::post('/reject', [App\Http\Controllers\VacancyController::class, 'reject_application'])->name('vacancy.reject.application');

    Route::post('/applicant/approve', [App\Http\Controllers\VacancyController::class, 'approve'])->name('vacancy.approve');
    Route::post('/applicant/reject', [App\Http\Controllers\VacancyController::class, 'reject'])->name('vacancy.reject');
    Route::post('/applicant/pending', [App\Http\Controllers\VacancyController::class, 'pending'])->name('vacancy.pending');
});

Route::group(['prefix' => 'registration', 'middleware' => ['auth']], function() {
    Route::get('/', [App\Http\Controllers\RegistrationController::class, 'index'])->name('registration');
    Route::get('/manage', [App\Http\Controllers\RegistrationController::class, 'manage'])->name('registration.manage');
    Route::post('/confirm', [App\Http\Controllers\RegistrationController::class, 'confirm'])->name('registration.confirm');
    Route::post('/reject', [App\Http\Controllers\RegistrationController::class, 'reject'])->name('registration.reject');
    Route::post('/pending', [App\Http\Controllers\RegistrationController::class, 'pending'])->name('registration.pending');

    Route::get('agreement', [App\Http\Controllers\RegistrationController::class, 'download_agreement'])->name('registration.getagreement');
});

Route::group(['prefix' => 'term', 'middleware' => ['auth']], function() {
    Route::get('/edit', [App\Http\Controllers\TermController::class, 'edit'])->name('term.edit');

    Route::post('/update', [App\Http\Controllers\TermController::class, 'update'])->name('term.update');
});
