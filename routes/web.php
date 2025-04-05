<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Mail\EmailVerification;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\DashboardController;

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
Route::redirect('/', '/login');

Route::get('/login', function () {
    return view('index.login');
})->name('index.login');

Route::get('/verifycode/{userId}', function ($userId) {
    return view('index.verifycode', ['userId' => $userId]);
})->name('index.verifycode');

Route::post('/verifycode/{userId}', [AuthController::class, 'verifyCode'])->name('index.verifycode.verify');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/signup', function () {
    return view('index.signup');
})->name('index.signup');

Route::post('/signup', [UserController::class, 'register']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard.index')
    ->middleware('auth');

Route::get('/moons', [DashboardController::class, 'list'])->name('moons.list');
Route::get('/moons/create', [DashboardController::class, 'store'])->name('moons.create');
Route::post('/moons', [DashboardController::class, 'add'])->name('moons.store');
Route::get('/moons/{moon}/edit', [DashboardController::class, 'edit'])->name('moons.edit');
Route::put('/moons/{moon}', [DashboardController::class, 'update'])->name('moons.update');
Route::delete('/moons/{moon}', [DashboardController::class, 'destroy'])->name('moons.destroy');


Route::any('/email/verify/{user_id}', [EmailController::class, 'verify_email'])->name('email.verify')->where('user_id', '[0-9]+');

