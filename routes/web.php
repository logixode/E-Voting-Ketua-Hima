<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
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
  return view('welcome');
});

Route::get('/', [PagesController::class, 'index']);
Route::get('/login', [PagesController::class, 'login']);
// Route::prefix('admin')->group(function () {
//   Route::get('/', [PagesController::class, 'admin']);
//   Route::view('/login', 'Admin/login');
//   // Route::get('/login', [Admin\LoginController::class, 'index']);
// });

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('admin/login',[LoginController::class, 'index'])->middleware('guest');
Route::post('admin/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['prefix' => 'admin','middleware' => 'admin_auth'], function () {
	// Admin Dashboard
	Route::get('/', [DashboardController::class, 'index']);	
});