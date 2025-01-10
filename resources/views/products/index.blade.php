@extends('layouts.app')

@section('content')
<div class="container mt-5">
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-4">Laravel</h1>
        <a href="{{ route('products.create') }}" class="btn btn-success">Create New Product</a>
    </div>

    <form method="GET" action="{{ route('products.index') }}" class="d-flex justify-content-end mb-3">
        <div class="input-group" style="width: 300px;">
            <input type="text" name="search" placeholder="Search products" value="{{ request('search') }}" class="form-control me-2">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Price (RM)</th>
                <th>Details</th>
                <th>Publish</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->published ? 'Yes' : 'No' }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No products available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
