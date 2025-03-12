@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
    <h1 class="mt-4">Edit Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
        <li class="breadcrumb-item active">Edit Product</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i>
            Edit Product Details
        </div>
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Brand</label>
                    <input type="text" name="brand" class="form-control" value="{{ $product->brand }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Discount Price</label>
                    <input type="number" step="0.01" name="discount_price" class="form-control"
                        value="{{ $product->discount_price }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="Male" {{ $product->gender == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $product->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Unisex" {{ $product->gender == 'Unisex' ? 'selected' : '' }}>Unisex</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" required>{{ $product->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                    <small>Leave empty if you don't want to change the image.</small>
                    <br>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100">
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Product</button>
            </form>
        </div>
    </div>
@endsection
