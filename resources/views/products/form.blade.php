@extends('layouts.app')

@section('content')

    <div class="container mt-5">
    <!-- Dynamic Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ isset($product) ? 'Edit Product' : 'Add New Product' }}</h1>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
    </div>



    <form method="POST" action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input placeholder="Name" type="text" id="name" name="name" class="form-control" value="{{ $product->name ?? '' }}" required>
        </div>

        <!-- Price -->
        <div class="mb-3">
            <label for="price" class="form-label">Price (RM):</label>
            <input placeholder="Price" type="number" id="price" name="price" class="form-control" step="0.01" value="{{ $product->price ?? '' }}" required>
        </div>

        <!-- Detail -->
        <div class="mb-3">
            <label for="description" class="form-label">Detail:</label>
            <textarea placeholder="Detail" id="description" name="description" class="form-control" required>{{ $product->description ?? '' }}</textarea>
        </div>

        <!-- Publish -->
        <div class="mb-3">
            <label class="form-label">Publish:</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="published_yes" name="published" value="1" {{ isset($product) && $product->published ? 'checked' : '' }}>
                    <label class="form-check-label" for="published_yes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="published_no" name="published" value="0" {{ isset($product) && !$product->published ? 'checked' : '' }}>
                    <label class="form-check-label" for="published_no">No</label>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection
