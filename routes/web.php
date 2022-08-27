<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Models\Job;
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

// Authenticaded Users Can Navigate to Any Routes
Route::resource("jobs", JobController::class)->middleware('auth')->except(['index', 'show']);
// But Guests Can Only Visit Specified Routes
Route::resource("jobs", JobController::class)->only(['index', 'show']);

// Authentication Routes
Route::group(['as' => 'auth.'], function () {
    Route::controller(UserController::class)->group(function () {
        Route::middleware('guest')->group(function () {
            Route::get("register", 'create')->name('register_form');
            Route::post('register', 'register')->name('register');

            Route::get("login", 'index')->name('login');
            Route::post("login", 'login')->name('login_form');
        });

        Route::post("logout", 'logout')->name('logout')->middleware('auth');
    });
});



// Temporary Homepage Route
Route::get('/', [JobController::class, 'index']);
