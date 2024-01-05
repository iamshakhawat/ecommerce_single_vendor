<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::controller(HomeController::class)->group(function(){
    Route::get('/','Index')->name('homepage');
    Route::get('/category/{slug}','ShowCategory')->name('category');
    Route::get('/product/{slug}','SingleProduct')->name('product');
});


// Custom Route Start
Route::middleware('auth','role:admin')->group(function (){

    // Dashboard
    Route::prefix('admin')->controller(DashboardController::class)->group(function () {
        Route::get('/dashboard','Index')->name('dashbaord');
    });

    // Category
    Route::prefix('admin')->controller(CategoryController::class)->group(function () {
        Route::get('/all-category','Index')->name('allcategory');
        Route::get('/add-category','AddCategory')->name('addcategory');
        Route::post('/store-category','StoreCategory')->name('storecategory');
        Route::get('/edit-category/{id}','EditCategory')->name('editcategory');
        Route::post('/update-category','UpdateCategory')->name('updatecategory');
        Route::get('/delete-category/{cat_id}','DeleteCategory')->name('deletecategory');
    });

    // Sub-Category
    Route::prefix('admin')->controller(SubcategoryController::class)->group(function () {
        Route::get('/all-subcategory','Index')->name('allsubcategory');
        Route::get('/add-subcategory','AddSubcategory')->name('addsubcategory');
        Route::post('/store-subcategory','StoreCategory')->name('storesubcategory');
        Route::get('/edit-subcategory/{id}','EditSubCategory')->name('editsubcategory');
        Route::post('/update-subcategory','UpdateSubCategory')->name('updatesubcategory');
        Route::get('/delete-subcategory/{id}','DeleteSubCategory')->name('deletesubcategory');
    });

    // Product
    Route::prefix('admin')->controller(ProductController::class)->group(function () {
        Route::get('/all-product','Index')->name('allproduct');
        Route::get('/add-product','AddProduct')->name('addproduct');
        Route::post('/select-subcategory','SelectSubCategory')->name('selectsubcategory');
        Route::post('/store-product','StoreProduct')->name('storeproduct');
        Route::get('/edit-product/{id}','EditProduct')->name('editproduct');
        Route::post('/update-product','UpdateProduct')->name('updateproduct');
        Route::get('/delete-product/{id}','DeleteProduct')->name('deleteproduct');
    });

    // Order
    Route::prefix('admin')->controller(OrderController::class)->group(function () {
        Route::get('/pending-orders','PendingOrders')->name('pendingorders');
        Route::get('/completed-orders','CompletedOrders')->name('completedorders');
        Route::get('/cancel-orders','CancelOrders')->name('cancelorders');
    });



});

require __DIR__.'/auth.php';
