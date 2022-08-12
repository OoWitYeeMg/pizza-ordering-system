<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
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

// Route::get('/', function () {
//     return view('hell');
// });

// login register
Route::redirect('/', 'login');
Route::get('login', [AuthController::class, 'LoginPage'])->name('auth#LoginPage');
Route::get('register', [AuthController::class, 'RegisterPage'])->name('auth#RegisterPage');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // dashboard
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
    // admin catergory
    Route::group(['prefix' => 'category','middleware'=>'admin_auth'],function () {
        Route::get('list', [CategoryController::class, 'list'])->name('Catergory#list');
    });
    //  user home
    Route::group(['prefix' => 'user','middleware'=>'user_auth'],function () {
        Route::get('home', function () {
            return view('user.home');
        })->name('user#home');
    });


});


//admin
//category



//user
