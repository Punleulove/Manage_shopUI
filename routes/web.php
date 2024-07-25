<?php

use App\Models\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Backend\Users_Controller;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\Dashboard_Controller;
use App\Http\Controllers\Frontend\NewsController as FrontendNewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/login', [Users_Controller::class, 'OpenLogin'])->name('login');
Route::post('/login', [Users_Controller::class, 'Login']);

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [Dashboard_Controller::class, 'index']);

        Route::get('/register', [Users_Controller::class, 'OpenRegister']);
        Route::post('/register', [Users_Controller::class, 'Register']);

        // Logo
        Route::get('/add-logo', [LogoController::class, 'OpneLogo']);
        Route::post('/add-logo', [LogoController::class, 'addLogo']);
        Route::get('/view-logo', [LogoController::class, 'viewLogo']);
        Route::get('/update-logo/{id}', [LogoController::class, 'Openupdate_logo']);
        Route::post('/update-logo', [LogoController::class, 'Update_logo']);
        Route::post('/delete-logo', [LogoController::class, 'Delete_logo']);
        // Logo


        //Category
        Route::get('/add-category', [CategoryController::class, 'OpenAdd']);
        Route::post('/add-category', [CategoryController::class, 'AddCategory']);
        Route::get('/view-category', [CategoryController::class, 'Viewcategory']);
        Route::get('/update-category/{id}', [CategoryController::class, 'OpenUpdate']);
        Route::post('/update-category', [CategoryController::class, 'UpdateCategory']);
        Route::post('/delete-category', [CategoryController::class, 'DeleteCategory']);

       //Product
        Route::get('/add-products', [ProductsController::class, 'OpenAdd']);
        Route::post('/add-products', [ProductsController::class, 'Addproduct']);
        Route::get('/view-products', [ProductsController::class,'ViewProducts']);
        Route::get('/update-product/{id}', [ProductsController::class, 'OpenUpdateProduct']);
        Route::post('/update-product', [ProductsController::class, 'UpdateProduct']);
        Route::post('/delete-product', [ProductsController::class, 'DeleteProduct']);



        ///News blog

        Route::get('/add-news',[NewsController::class,'openAdd']);
        Route::post('/add-news',[NewsController::class,'AddNews']);
        Route::get('/update-news/{id}',[NewsController::class,'openUpdate']);
        Route::post('/update-news',[NewsController::class,'UpdateNews']);
        Route::get('/view-news',[NewsController::class,'ViewNews']);
        Route::post('/delete-news', [NewsController::class, 'DeleteNews']);



        Route::get('/logout', [Users_Controller::class, 'Logout']);

    });
});
//Frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/product/{id}', [HomeController::class, 'DetailProduct']);
Route::get('/shop', [ShopController::class, 'shop']);

Route::get('/search', [HomeController::class, 'search']);
Route::get('/news', [FrontendNewsController::class, 'openNews']);
Route::get('/news/{id}', [FrontendNewsController::class, 'Newsdetail']);



