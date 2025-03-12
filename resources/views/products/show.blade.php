@extends('layouts.admin')

@section('title', 'Product Details')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="row g-0">
                <!-- Product Image -->
                <div class="col-md-5">
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded-start w-100"
                        style="height: 100%; object-fit: cover;" alt="{{ $product->name }}">
                </div>

                <!-- Product Details -->
                <div class="col-md-7">
                    <div class="card-body">
                        <h2 class="card-title fw-bold">{{ $product->name }}</h2>
                        <p class="text-muted">Brand: <strong>{{ $product->brand }}</strong></p>

                        <h3 class="text-success fw-bold">
                            ₹{{ number_format($product->discount_price ?? $product->price, 2) }}
                            @if ($product->discount_price)
                                <span class="text-danger fs-5 ms-2">
                                    <s>₹{{ number_format($product->price, 2) }}</s>
                                </span>
                            @endif
                        </h3>

                        <p class="mt-3">
                            <strong>SKU:</strong> {{ $product->sku }} <br>
                            <strong>Quantity:</strong> {{ $product->quantity }} <br>
                            <strong>Stock:</strong>
                            @if ($product->stock > 0)
                                <span class="badge bg-success">In Stock ({{ $product->stock }})</span>
                            @else
                                <span class="badge bg-danger">Out of Stock</span>
                            @endif
                        </p>

                        <p class="mt-2"><strong>Gender:</strong> {{ $product->gender }}</p>

                        <p class="mt-3"><strong>Description:</strong></p>
                        <p class="text-muted">{{ $product->description }}</p>

                        <p class="mt-3">
                            <strong>Status:</strong>
                            @if ($product->status == 0)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </p>

                        <!-- Buttons -->
                        <div class="mt-4">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back to Products
                            </a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline"
                                id="delete-form-{{ $product->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $product->id }})">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert for Delete Confirmation -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(productId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + productId).submit();
                }
            });
        }
    </script>
@endsection
