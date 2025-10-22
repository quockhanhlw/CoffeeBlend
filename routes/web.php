<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Products\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\Admins\AdminsController;


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

//products
Route::get('products/product-single/{id}', [ProductsController::class, 'singleProduct'])->name('product.single')->middleware('auth');
Route::post('products/product-single/{id}', [ProductsController::class, 'addCart'])->name('add.cart')->middleware('auth');
Route::get('products/cart', [ProductsController::class, 'cart'])->name('cart')->middleware('auth');
Route::get('products/cart-delete/{id}', [ProductsController::class, 'deleteProductCart'])->name('cart.product.delete')->middleware('auth');

//checkout
Route::post('products/prepare-checkout', [ProductsController::class, 'prepareCheckout'])->name('prepare.checkout')->middleware('auth');
Route::get('products/checkout', [ProductsController::class, 'checkout'])->name('checkout')->middleware('check.for.price');
Route::post('products/checkout', [ProductsController::class, 'storeCheckout'])->name('proccess.checkout')->middleware('check.for.price');

//pay and success page
Route::get('products/pay', [ProductsController::class, 'payWithPaypal'])->name('products.pay')->middleware('check.for.price');
Route::get('products/success', [ProductsController::class, 'success'])->name('products.pay.success')->middleware('check.for.price');

//booking
Route::post('products/booking', [ProductsController::class, 'BookTables'])->name('booking.tables')->middleware('auth');

//menu
Route::get('products/menu', [ProductsController::class, 'menu'])->name('products.menu');


//users pages
Route::get('users/orders', [UsersController::class, 'displayOrders'])->name('users.orders')->middleware('auth');
Route::get('users/bookings', [UsersController::class, 'displayBookings'])->name('users.bookings')->middleware('auth');

//write review
Route::get('users/write-reviews', [UsersController::class, 'writeReview'])->name('write.reviews')->middleware('auth');
Route::post('users/write-reviews', [UsersController::class, 'proccessWriteReview'])->name('proccess.write.review')->middleware('auth');



Route::get('admin/login', [AdminsController::class, 'viewLogin'])->name('view.login')->middleware('check.for.auth');
Route::post('admin/login', [AdminsController::class, 'checkLogin'])->name('check.login');

Route::post('admin/logout', [AdminsController::class, 'logout'])->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('index', [AdminsController::class, 'index'])->name('admins.dashboard')->middleware('admin');

    //admin section
    Route::get('all-admins', [AdminsController::class, 'displayAllAdmins'])->name('all.admins');
    Route::get('create-admins', [AdminsController::class, 'createAdmins'])->name('create.admins');
    Route::post('create-admins', [AdminsController::class, 'storeAdmins'])->name('store.admins');

    //orders
    Route::get('all-orders', [AdminsController::class, 'displayAllOrders'])->name('all.orders');
    Route::get('edit-order/{id}', [AdminsController::class, 'editOrders'])->name('edit.order');
    Route::post('edit-order/{id}', [AdminsController::class, 'updateOrders'])->name('update.order');

    Route::get('delete-order/{id}', [AdminsController::class, 'deleteOrders'])->name('delete.order');

    //products
    Route::get('all-products', [AdminsController::class, 'displayAllProducts'])->name('all.products');
    Route::get('create-products', [AdminsController::class, 'createProducts'])->name('create.products');
    Route::post('create-products', [AdminsController::class, 'storeProducts'])->name('store.products');
    Route::get('delete-products{id}', [AdminsController::class, 'deleteProducts'])->name('delete.products');

    //bookings
    Route::get('all-bookings', [AdminsController::class, 'displayAllBookings'])->name('all.bookings');
    Route::get('edit-bookings/{id}', [AdminsController::class, 'editBookings'])->name('edit.booking');
    Route::post('edit-bookings/{id}', [AdminsController::class, 'updateBookings'])->name('update.booking');
    Route::get('delete-bookings/{id}', [AdminsController::class, 'deleteBookings'])->name('delete.booking');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
