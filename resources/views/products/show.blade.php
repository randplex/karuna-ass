@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Show Product</h1>
  
        <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
    </div>

    <div>
        <p class="mb-3"><strong>Name:</strong> {{ $product->name }}</p>
        <p class="mb-3"><strong>Price:</strong> RM {{ number_format($product->price, 2) }}</p>
        <p class="mb-3"><strong>Details:</strong> {{ $product->description }}</p>
        <p class="mb-3"><strong>Publish:</strong> {{ $product->published ? 'Yes' : 'No' }}</p>
    </div>
</div>
@endsection
