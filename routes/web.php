<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Products\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\Admins\AdminsController;
use App\Http\Controllers\Staffs\StaffsController;


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

//products
Route::get('products/product-single/{id}', [ProductsController::class, 'singleProduct'])->name('product.single')->middleware('auth');
Route::post('products/product-single/{id}', [ProductsController::class, 'addCart'])->name('add.cart')->middleware('auth');
Route::get('products/cart', [ProductsController::class, 'cart'])->name('cart')->middleware('auth');
Route::post('products/cart/update-quantity/{id}', [ProductsController::class, 'updateCartQuantity'])->name('cart.update.quantity')->middleware('auth');
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


//ADMIN
Route::get('admin/login', [AdminsController::class, 'viewLoginAdmin'])->name('view.login.admin')->middleware('check.for.auth');
Route::post('admin/login', [AdminsController::class, 'checkLoginAdmin'])->name('check.login.admin');
Route::post('admin/logout', [AdminsController::class, 'logoutAdmin'])->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('index', [AdminsController::class, 'index'])->name('admins.dashboard')->middleware('admin');

    //admin section
    Route::get('all-staffs', [AdminsController::class, 'displayAllStaffs'])->name('all.staffs');
    Route::get('create-staffs', [AdminsController::class, 'createStaffs'])->name('admin.create.staffs');
    Route::post('create-staffs', [AdminsController::class, 'storeStaffs'])->name('admin.store.staffs');

    //orders
    Route::get('all-orders', [AdminsController::class, 'displayAllOrders'])->name('all.orders');
    Route::get('edit-order/{id}', [AdminsController::class, 'editOrders'])->name('edit.order');
    Route::post('edit-order/{id}', [AdminsController::class, 'updateOrders'])->name('update.order');

    Route::get('delete-order/{id}', [AdminsController::class, 'deleteOrders'])->name('delete.order');

    //products
    Route::get('all-products', [AdminsController::class, 'displayAllProducts'])->name('all.products');
    Route::get('create-products', [AdminsController::class, 'createProducts'])->name('create.products');
    Route::post('create-products', [AdminsController::class, 'storeProducts'])->name('store.products');
    Route::get('edit-products/{id}', [AdminsController::class, 'editProducts'])->name('edit.products');
    Route::post('edit-products/{id}', [AdminsController::class, 'updateProducts'])->name('update.products');
    Route::get('delete-products{id}', [AdminsController::class, 'deleteProducts'])->name('delete.products');

    //bookings
    Route::get('all-bookings', [AdminsController::class, 'displayAllBookings'])->name('all.bookings');
    Route::get('edit-bookings/{id}', [AdminsController::class, 'editBookings'])->name('edit.booking');
    Route::post('edit-bookings/{id}', [AdminsController::class, 'updateBookings'])->name('update.booking');
    Route::get('delete-bookings/{id}', [AdminsController::class, 'deleteBookings'])->name('delete.booking');
});

//STAFF
Route::get('staff/login', [StaffsController::class, 'viewLoginStaff'])->name('view.login.staff')->middleware('check.for.auth');
Route::post('staff/login', [StaffsController::class, 'checkLoginStaff'])->name('check.login.staff');
Route::post('staff/logout', [StaffsController::class, 'logoutStaff'])->name('staff.logout');

Route::group(['prefix' => 'staff', 'middleware' => 'auth:staff'], function () {
    Route::get('index', [StaffsController::class, 'index'])->name('staffs.dashboard')->middleware('staff');

    //staff section
    Route::get('all-staffs', [StaffsController::class, 'displayAllStaffs'])->name('staff.all.staffs');
    Route::get('create-staffs', [StaffsController::class, 'createStaffs'])->name('create.staffs');
    Route::post('create-staffs', [StaffsController::class, 'storeStaffs'])->name('store.staffs');

    //orders
    Route::get('all-orders', [StaffsController::class, 'displayAllOrdersStaff'])->name('all.orders.staff');
    Route::get('edit-order/{id}', [StaffsController::class, 'editOrdersStaff'])->name('edit.order.staff');
    Route::post('edit-order/{id}', [StaffsController::class, 'updateOrdersStaff'])->name('update.order.staff');
    Route::get('delete-order/{id}', [StaffsController::class, 'deleteOrdersStaff'])->name('delete.order.staff');

    //products
    Route::get('all-products', [StaffsController::class, 'displayAllProductsStaff'])->name('all.products.staff');
    Route::get('create-products', [StaffsController::class, 'createProductsStaff'])->name('create.products.staff');
    Route::post('create-products', [StaffsController::class, 'storeProductsStaff'])->name('store.products.staff');
    Route::get('edit-products/{id}', [StaffsController::class, 'editProductsStaff'])->name('edit.products.staff');
    Route::post('edit-products/{id}', [StaffsController::class, 'updateProductsStaff'])->name('update.products.staff');
    Route::get('delete-products/{id}', [StaffsController::class, 'deleteProductsStaff'])->name('delete.products.staff');

    //bookings
    Route::get('all-bookings', [StaffsController::class, 'displayAllBookingsStaff'])->name('all.bookings.staff');
    Route::get('edit-bookings/{id}', [StaffsController::class, 'editBookingsStaff'])->name('edit.booking.staff');
    Route::post('edit-bookings/{id}', [StaffsController::class, 'updateBookingsStaff'])->name('update.booking.staff');
    Route::get('delete-bookings/{id}', [StaffsController::class, 'deleteBookingsStaff'])->name('delete.booking.staff');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
