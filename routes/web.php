<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YearController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ThesisBookController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/thesis/download/{id}', [ThesisBookController::class, 'download'])->name('thesis.download');

Route::resource('/event',EventController::class);
Route::resource('/year',YearController::class);
Route::resource('/thesisbook',ThesisBookController::class);
Route::resource('/admin',AdminController::class);
Route::resource('/student',StudentController::class);
Route::resource('/teacher',TeacherController::class);
Route::resource('/tutorial',TutorialController::class);
Route::resource('/user',UserController::class);

Route::get('/user/search', [UserController::class, 'search'])->name('user.search');
