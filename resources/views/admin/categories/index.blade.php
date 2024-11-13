@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4 text-uppercase">CATEGORIES TABLE</h1>
        <div class="mb-3">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add New Category</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có thực sự muốn xóa?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
