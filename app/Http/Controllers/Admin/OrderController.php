<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders; // nếu tên model là Order (số ít)
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Lấy tất cả đơn hàng để hiển thị cho admin
        $orders = Orders::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Cập nhật trạng thái đơn hàng
        $order = Orders::findOrFail($id);
        $order->status = $request->status; // status có thể là 'paid' hoặc 'cancelled'
        $order->save();
        return redirect()->route('admin.orders.index')->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }
    public function show($id)
    {
        $orders = Orders::findOrFail($id);
        return view('admin.orders.show', compact('orders'));
    }
    public function destroy($id)
    {
        $orders = Orders::findOrFail($id); // Tìm đơn hàng theo ID
        $orders->delete(); // Xóa đơn hàng
    
        return redirect()->route('admin.orders.index')->with('success', 'Đơn hàng đã được xóa thành công.');
    }
    
}
