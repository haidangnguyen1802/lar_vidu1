@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4 text-uppercase">Products</h1>
        <div class="mb-3">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add New Product</a>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ $product->image ? Storage::url($product->image) : 'https://via.placeholder.com/150' }}" alt="Product Image" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                            <p><strong>Price:</strong> {{ number_format($product->price) }} VNĐ</p>
                            <p><strong>Category:</strong> {{ $product->category->name }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
