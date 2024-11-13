@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Chi tiết Đơn hàng</h1>

    <div class="card">
        <div class="card-header">
            Đơn hàng ID: {{ $orders->id }}
        </div>
        <div class="card-body">
            <p><strong>Tên người dùng:</strong> {{ $orders->user->name }}</p>
            <p><strong>Tổng tiền:</strong> {{ number_format($orders->total, 2) }} VND</p>
            <p><strong>Trạng thái:</strong> {{ $orders->status }}</p>
            <p><strong>Phương thức thanh toán:</strong> {{ $orders->payment_method }}</p>
            <p><strong>Ngày tạo:</strong> {{ $orders->created_at }}</p>
            <p><strong>Ngày cập nhật:</strong> {{ $orders->updated_at }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
</div>
@endsection
