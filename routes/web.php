
<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\JobApplicationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use Illuminate\Support\Facades\Route;




// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jobs', [JobsController::class, 'index'])->name('jobs');
Route::get('/jobs/detail/{id}', [JobsController::class, 'detail'])->name('jobDetail');
Route::post('/apply-job', [JobsController::class, 'applyJob'])->name('applyJob');
Route::post('/save/job', [JobsController::class, 'saveJobs'])->name('saveJob');


Route::middleware('CheckRole')->prefix('admin')->as('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('user')->as('user.')->group(function () {
        Route::get('/list', [UserController::class, 'index'])->name('list');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete', [UserController::class, 'delete'])->name('delete');
    });
    Route::prefix('job')->as('job.')->group(function () {
        Route::get('/list', [JobController::class, 'index'])->name('list');
        Route::get('/edit/{id}', [JobController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [JobController::class, 'update'])->name('update');
        Route::delete('/delete', [JobController::class, 'delete'])->name('delete');
    });
    Route::prefix('jobApplication')->as('jobApplication.')->group(function () {
        Route::get('/list', [JobApplicationController::class, 'index'])->name('list');
        Route::get('/edit/{id}', [JobApplicationController::class, 'edit'])->name('edit');
        // Route::put('/update/{id}', [JobApplicationController::class, 'update'])->name('update');
        Route::delete('/delete', [JobApplicationController::class, 'delete'])->name('delete');
    });
});







Route::group(['prefix' => 'account'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/account/registration', [AccountController::class, 'registration'])->name('account.registration');
        Route::get('/account/login', [AccountController::class, 'login'])->name('account.login');
        Route::post('/proces/registration', [AccountController::class, 'processRegistration'])->name('account.processRegistration');
        Route::post('/account/authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/account/profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::get('/account/logout', [AccountController::class, 'logout'])->name('account.logout');
        Route::put('/account/update/Profile', [AccountController::class, 'updateProfile'])->name('account.updateProfile');
        Route::post('/account/updateProfilePic', [AccountController::class, 'updateProfilePic'])->name('account.updateProfilePic');
        Route::get('/account/create/Job', [AccountController::class, 'createJob'])->name('account.createJob');
        Route::post('/account/save/Job', [AccountController::class, 'saveJob'])->name('account.saveJob');
        Route::get('/account/my/Jobs', [AccountController::class, 'myJobs'])->name('account.myJobs');
        Route::get('/account/my/Jobs/edit/{jobId}', [AccountController::class, 'editJob'])->name('account.editJob');
        Route::post('/account/my/Jobs/Update/{jobId}', [AccountController::class, 'updateJob'])->name('account.updateJob');
        Route::post('/account/my/Jobs/delete/', [AccountController::class, 'deleteJob'])->name('account.deleteJob');
        Route::get('/account/my/Jobs/application/', [AccountController::class, 'myJobApplications'])->name('account.myJobApplications');
        Route::post('/remove/Jobs/application', [AccountController::class, 'removeJob'])->name('account.removeJob');
        Route::get('/saved/Jobs/application', [AccountController::class, 'savedJob'])->name('account.savedJob');
        Route::post('/remove/saved/job', [AccountController::class, 'removeSavedJob'])->name('account.removeSavedJob');
        Route::post('/update/password', [AccountController::class, 'updatePassword'])->name('account.updatePassword');
    });
});
