<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Product;

class AdminController extends Controller
{
    public function index(){
        return view ('admin.dashboard');
    }
    public function dashboard()
    {
        // Lấy tất cả sản phẩm và hiển thị cùng với danh mục của chúng
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }
    public function products()
    {
        return app(ProductController::class)->index();
    }
    public function categories()
    {
        return app(CategoryController::class)->index();
    }
}
