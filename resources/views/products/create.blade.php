@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')
    <h1 class="mt-4">Add New Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
        <li class="breadcrumb-item active">Add Product</li>
    </ol>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-box"></i> Add Product
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <!-- Name -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <!-- Brand -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Brand</label>
                        <input type="text" name="brand" class="form-control" required>
                    </div>

                    <!-- Quantity -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" required min="1">
                    </div>

                    <!-- Price -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" required>
                    </div>

                    <!-- Discount Price -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Discount Price</label>
                        <input type="text" name="discount_price" class="form-control">
                    </div>

                    <!-- Stock -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Stock</label>
                        <input type="number" name="stock" class="form-control" required min="0">
                    </div>

                    <!-- Gender -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Unisex">Unisex</option>
                        </select>
                    </div>

                    <!-- Image Upload -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Product Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>

                    <!-- Description -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Product
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
