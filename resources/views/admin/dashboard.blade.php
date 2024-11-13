{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('content')
<div class="container my-5">
    <div class="card shadow-sm p-4"> <!-- Thêm thẻ card và shadow để tạo khung cho dashboard -->
        <h1 class="mb-4 text-center text-primary">Admin Dashboard</h1>
        <p class="text-center text-muted">Chào mừng đến với trang quản trị! Từ đây, bạn có thể quản lý sản phẩm, danh mục, và nhiều chức năng khác.</p>
        
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('admin.products.index') }}" class="list-group-item list-group-item-action btn-primary mb-2 text-center">
                        Quản lý Sản phẩm
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="list-group-item list-group-item-action btn-secondary mb-2 text-center">
                        Quản lý Danh mục
                    </a>
                    <a href="{{ route('admin.orders.index') }}" class="list-group-item list-group-item-action btn-success mb-2 text-center">
                        Quản lý Đơn hàng
                    </a>
                    <a href="{{ route('admin.reports.index') }}" class="list-group-item list-group-item-action btn-info text-center">
                        Báo cáo
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="alert alert-info">
                    <h5 class="alert-heading">Thông tin chung</h5>
                    <p>Bạn có thể sử dụng các chức năng bên trái để điều hướng và quản lý nội dung của hệ thống.</p>
                    <hr>
                    <p class="mb-0">Nếu gặp vấn đề, vui lòng liên hệ bộ phận hỗ trợ kỹ thuật.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
