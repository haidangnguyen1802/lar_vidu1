<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WellcomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController; // Import thêm OrderController
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;

/*
|------------------------------------------------------
| Web Routes
|------------------------------------------------------
| Đây là nơi bạn có thể đăng ký các route cho ứng dụng.
| Các route này sẽ được tải bởi RouteServiceProvider
| và được gán vào nhóm middleware "web".
*/

// Trang chào
Route::get('/', [ProductUserController::class, 'index'])->name('welcome');

// Đăng ký và đăng nhập người dùng
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route dành cho admin (sử dụng middleware để kiểm tra quyền)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Route quản lý sản phẩm
    Route::resource('/products', ProductController::class, [
        'as' => 'admin'
    ]);

    // Route quản lý danh mục
    Route::resource('/categories', CategoryController::class, [
        'as' => 'admin'
    ]);
});

// Route cho tất cả người dùng (đã đăng nhập và chưa đăng nhập)
Route::get('/products', [ProductUserController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductUserController::class, 'show'])->name('products.show');

// Route cho giỏ hàng (người dùng chưa đăng nhập có thể thêm sản phẩm vào giỏ hàng)
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');

// Route dành cho người dùng đã đăng nhập để đặt hàng
Route::middleware(['auth'])->group(function () {
    // Các route đặt hàng
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

    // Route cho giỏ hàng (người dùng chưa đăng nhập có thể thêm sản phẩm vào giỏ hàng)
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');

   // Route dành cho admin (sử dụng middleware để kiểm tra quyền)
Route::middleware(['auth', 'admin'])->group(function () {

    // Route quản lý đơn hàng
    Route::get('/admin/orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders.index');

    Route::patch('/admin/orders/{order}', [App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    });    
// Route quản lý báo cáo
Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports.index');
//xem thông tin đơn hàng 
Route::get('admin/orders/{id}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('admin.orders.show');
//xóa đơn hàng
Route::delete('admin/orders/{id}', [App\Http\Controllers\Admin\OrderController::class, 'destroy'])->name('admin.orders.destroy');

});



