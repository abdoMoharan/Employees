<?php

use App\Http\Controllers\Backend\ChangePasswordController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\StateController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route User Resource
Route::resource('users', UserController::class);
// Route Country Resource
Route::resource('countries', CountryController::class);
// Route Country Resource
Route::resource('states', StateController::class);
// Route City Resource
Route::resource('cities', CityController::class);
// Route departments Resource
Route::resource('departments',DepartmentController::class);
// Route departments Resource
Route::resource('employees', EmployeeController::class);

Route::post('users/{user}/change-password',[ChangePasswordController::class,'Change_password'])->name('change.password');
