<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
// Route::redirect('/', 'login');
// Route::get('login', [AuthController::class, 'LoginPage'])->name('auth#LoginPage');
// Route::get('register', [AuthController::class, 'RegisterPage'])->name('auth#RegisterPage');

Route::middleware(['admin_auth'])->group(function () {
    Route::redirect('/', 'login');
    Route::get('login', [AuthController::class, 'LoginPage'])->name('auth#LoginPage');
    Route::get('register', [AuthController::class, 'RegisterPage'])->name('auth#RegisterPage');
});

Route::middleware(['auth'])->group(function () {
    // dashboard
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    // admin
    Route::middleware(['admin_auth'])->group(function () {
        // catergory
        Route::prefix('category')->group(function () {
            Route::get('list', [CategoryController::class, 'list'])->name('Catergory#list');
            Route::get('create/page', [CategoryController::class, 'createPage'])->name('catergory#createPage');
            Route::post('create', [CategoryController::class, 'create'])->name('category#create');
            Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('category#delete');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category#edit');
            Route::post('update', [CategoryController::class, 'update'])->name('category#update');
        });
        // admin account
        Route::prefix('admin')->group(function () {
            Route::get('password/changePage', [AdminController::class, 'changePasswordPage'])->name('admin#changePasswordPage');
            Route::Post('change/password', [AdminController::class, 'changePassword'])->name('admin#changePassword');

            // profile
            Route::get('details', [AdminController::class, 'details'])->name('admin#details');
            Route::get('edit', [AdminController::class, 'edit'])->name('admin#edit');
            Route::post('update/{id}', [AdminController::class, 'update'])->name('admin#update');
        });

        // products
        Route::prefix('product')->group(function () {
            Route::get('list', [ProductController::class, 'list'])->name('product#list');
            Route::get('create/page', [ProductController::class, 'createPage'])->name('product#createPage');
            Route::post('create', [ProductController::class, 'create'])->name('product#create');
            Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product#delete');
            Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product#edit');
            Route::get('updatePage/{id}', [ProductController::class, 'updatePage'])->name('product#updatePage');
            Route::post('update', [ProductController::class, 'update'])->name('product#update');
        });
    });
    //  user home
    Route::group(['prefix' => 'user', 'middleware' => 'user_auth'], function () {
        Route::get('home', function () {
            return view('user.home');
        })->name('user#home');
    });
});


//admin
//category



//user
