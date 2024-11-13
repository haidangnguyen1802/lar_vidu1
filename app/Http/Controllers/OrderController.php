<?php

namespace App\Http\Controllers;

use App\Models\Cart; // Đảm bảo import đúng mô hình Cart
use App\Models\Orders;
use App\Models\Payment;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Hiển thị danh sách đơn hàng của người dùng
    public function index()
    {
        $orders = Orders::where('user_id', Auth::id())->get();
        return view('orders.index', compact('orders'));
    }

    // Xử lý việc tạo đơn hàng
    public function store(Request $request)
    {
        // Lấy giỏ hàng từ cơ sở dữ liệu
        $cartItems = Cart::getItemsByUser(Auth::id());

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn trống.');
        }

        // Tính tổng tiền từ giỏ hàng
        $total = $cartItems->sum(function($item) {
            return $item->price * $item->quantity;
        });

        // Tạo đơn hàng mới
        $orders = Orders::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'status' => 'processing',
            'payment_method' => $request->payment_method,
            
        ]);
        // Tạo bản ghi thanh toán
        Payment::create([
            'order_id' => $orders->id,
            'amount' => $orders->total, // Sử dụng tổng từ đơn hàng
            'payment_method' => $orders->payment_method, // Sử dụng phương thức thanh toán từ đơn hàng
            'payment_date' => now(), // Thêm ngày thanh toán
        ]);

        // Lưu các mặt hàng trong đơn hàng
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $orders->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        // Xóa các mặt hàng trong giỏ hàng
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('orders.index')->with('success', 'Đặt hàng thành công!');
    }
    
}
