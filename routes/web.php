<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Inertia\Inertia;

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
  return view('index');
});

/*
|--------------------------------------------------------------------------
| E-Voting Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'evoting'], function() {
  Route::get('/', [PagesController::class, 'index'])->middleware('user_auth');

  /*
  |--------------------------------------------------------------------------
  | Auth Routes
  |--------------------------------------------------------------------------
  */
  Route::get('admin/login',[LoginController::class, 'index'])->middleware('guest');
  Route::post('admin/login', [LoginController::class, 'admin_login']);
  Route::get('/login', [PagesController::class, 'login'])->middleware('guest');
  Route::post('/login', [LoginController::class, 'user_login']);
  Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

  Route::get('/send_mail', [EmailController::class, 'index']);

  /*
  |--------------------------------------------------------------------------
  | Admin Routes
  |--------------------------------------------------------------------------
  */
  Route::group(['prefix' => 'admin','middleware' => 'admin_auth'], function () {
    // Admin Dashboard
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/voting_data', [DashboardController::class, 'voting_data']);

    Route::get('/candidate', [CandidateController::class, 'index']);
    Route::post('/candidate', [CandidateController::class, 'store']);
    Route::put('/candidate', [CandidateController::class, 'update']);
    Route::delete('/candidate', [CandidateController::class, 'destroy']);

    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user', [UserController::class, 'store']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
    
    Route::get('/setting', [SettingController::class, 'index']);
  });
});