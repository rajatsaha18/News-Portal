<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\website\AuthController;
use App\Http\Controllers\website\CustomerAuthController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category-news/{id}', [HomeController::class, 'category'])->name('category');
Route::get('/sub-category-news/{id}', [HomeController::class, 'subCategory'])->name('subcategory');
Route::get('/news-detail/{id}', [HomeController::class, 'detail'])->name('detail');

Route::middleware(['alreadyLoggedIn'])->group(function (){
    Route::get('/customer-login', [CustomerAuthController::class, 'login'])->name('login-customer');
    Route::get('/customer-registration', [CustomerAuthController::class, 'registration'])->name('registration-customer');
});
Route::post('/register-user', [CustomerAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [CustomerAuthController::class, 'loginUser'])->name('login-user');
Route::get('/customer-dashboard', [CustomerAuthController::class, 'customerDashboard'])->name('customer-dashboard')->middleware('isLoggedIn');
Route::get('/customer-logout', [CustomerAuthController::class, 'customerLogout'])->name('customer-logout');


//Route::get('/login', [AuthController::class, 'index'])->name('login');
//Route::post('/post-login', [AuthController::class, 'postLogin'])->name('login.post');
//Route::get('/registration', [AuthController::class, 'registration'])->name('register');
//Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
//Route::get('/user-dashboard', [AuthController::class, 'dashboard']);
//Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::get('/add-category', [CategoryController::class,'index'])->name('category.index');
    Route::post('/new-category', [CategoryController::class,'create'])->name('category.new');
    Route::get('/manage-category', [CategoryController::class,'manage'])->name('category.manage');
    Route::get('/edit-category/{id}', [CategoryController::class,'edit'])->name('category.edit');
    Route::post('/update-category/{id}', [CategoryController::class,'update'])->name('category.update');
    Route::get('/delete-category/{id}', [CategoryController::class,'delete'])->name('category.delete');

    Route::get('/add-sub-category', [SubCategoryController::class,'index'])->name('subcategory.index');
    Route::post('/new-sub-category', [SubCategoryController::class,'create'])->name('subcategory.new');
    Route::get('/manage-sub-category', [SubCategoryController::class,'manage'])->name('subcategory.manage');
    Route::get('/edit-sub-category/{id}', [SubCategoryController::class,'edit'])->name('subcategory.edit');
    Route::post('/update-sub-category/{id}', [SubCategoryController::class,'update'])->name('subcategory.update');
    Route::get('/delete-sub-category/{id}', [SubCategoryController::class,'delete'])->name('subcategory.delete');

    Route::get('/add-news', [NewsController::class,'index'])->name('news.index');
    Route::get('/get-sub-category', [NewsController::class,'getSubCategory'])->name('news.get-sub-category');
    Route::post('/news-create', [NewsController::class,'create'])->name('news.create');
    Route::get('/manage-news', [NewsController::class,'manage'])->name('news.manage');
    Route::get('/edit-news/{id}', [NewsController::class,'edit'])->name('news.edit');
    Route::post('/update-news/{id}', [NewsController::class,'update'])->name('news.update');
    Route::get('/delete-news/{id}', [NewsController::class,'delete'])->name('news.delete');
});
