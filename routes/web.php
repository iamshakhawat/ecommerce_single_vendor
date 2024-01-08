<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubcategoryController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
    Route::get('/login','Login')->name('login');
    Route::get('/category/{slug}','ShowCategory')->name('category');
    Route::get('/product/{slug}','SingleProduct')->name('product');
    Route::post('/search','SearchProduct')->name('search');
});

Route::middleware('auth','role:user')->group(function(){

    Route::controller(HomeController::class)->group(function(){
        Route::get('/dashboard','Dashboard')->name('userdashboard');
        Route::get('/remove-from-cart/{id}','RemoveFromCart')->name('removefromcart');
        Route::get('/cart','Cart')->name('cart');
        Route::post('/add-product-to-cart','AddProducttoCart')->name('addproducttocart');
        Route::get('/add-single-product-to-cart/{id}','AddtoCartSingleProduct')->name('addtocartsingleproduct');
        Route::get('/logout','Logout')->name('userlogout');

        Route::get('/pending-orders','PendingOrders')->name('orderpending');
        Route::get('/address-book','AddressBook')->name('addressbook');
        Route::get('/order-history','OrderHistory')->name('orderhistory');
        Route::get('/user-profile','UserProfile')->name('userprofile');

        Route::get('/add-address','AddAdress')->name('addaddress');
        Route::post('/add-address','StoreAddress')->name('storeaddress');
        Route::get('/edit-address/{id}','EditAddress')->name('editaddress');
        Route::post('/update-address','UpdateAddress')->name('updateaddress');
        Route::get('/checkout','Checkout')->name('checkout');
        Route::get('/place-order','Placeorder')->name('placeorder');
        Route::get('/change-password','ChangePassword')->name('changepassword');
        Route::post('/update-password','UpdatePassword')->name('userupdatepassword');
        Route::post('/update-profile','UpdateProfile')->name('udpateprofile');
    });

});

// Custom Route Start
Route::middleware('auth','role:admin')->group(function (){

    // Dashboard
    Route::prefix('admin')->controller(DashboardController::class)->group(function () {
        Route::get('/dashboard','Index')->name('dashbaord');
        Route::get('/profile','AdminProfile')->name('adminprofile');
        Route::get('/edit-profile','EditProfile')->name('editadminprofile');
        Route::post('/update-profile','UpdateProfile')->name('updateprofile');
        Route::get('/change-password','ChangePassword')->name('adminchangepassword');
        Route::post('/update-password','UpdatePassword')->name('updateadminpassword');
        Route::get('/logout','Logout')->name('adminlogout');
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
        Route::get('/confirm-order/{order_id}','ConfirmOrder')->name('confirmorder');
        Route::get('/confirm-orders','ConfirmOrders')->name('confirmorders');
        Route::get('/complete-order/{order_id}','CompleteOrder')->name('completeorder');
        Route::get('/complete-orders','CompleteOrders')->name('completeorders');
        Route::get('/cancel-orders','CancelOrders')->name('cancelorders');
        Route::get('/cancel-order/{order_id}','CancelOrder')->name('cancelorder');

        Route::get('/shipping-orders','ShippingOrders')->name('shippingorders');
        Route::get('/shipping-order/{order_id}','ShippingOrder')->name('shippingorder');
    });



});

require __DIR__.'/auth.php';
