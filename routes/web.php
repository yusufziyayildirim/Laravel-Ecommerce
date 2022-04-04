<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AddressController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/users', UserController::class);
Route::get('/users/{user}/change-password', [UserController::class, 'passwordForm'])->name('user.changePassword');
Route::post('/users/{user}/change-password', [UserController::class, 'changePassword']);

Route::resource('/users/{user}/addresses', AddressController::class);



