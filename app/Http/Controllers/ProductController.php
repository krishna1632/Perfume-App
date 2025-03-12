<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all(); // Fetch all products from database
        return view("products.index", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'stock' => 'required|integer|min:0',
            'gender' => 'required|string|in:Male,Female,Unisex',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Image Upload
        $imagePath = $request->file('image')->store('products', 'public');

        // Auto-generate SKU: name-brand-quantity
        $sku = strtoupper(Str::slug($request->name . '-' . $request->brand . '-' . $request->quantity));

        // Stock-Based Status
        $status = ($request->stock == 0) ? 1 : 0;

        // Create Product
        Product::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'stock' => $request->stock,
            'sku' => $sku, // Auto-generated SKU
            'image' => $imagePath,
            'gender' => $request->gender,
            'description' => $request->description,
            'rating' => null, // Default null
            'review' => null, // Default null
            'status' => $status, // Stock-based status
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id); // Find product by ID
        return view("products.edit", compact('product')); // Show edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'stock' => 'required|integer|min:0',
            'gender' => 'required|string|in:Male,Female,Unisex',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);

        // Image Upload (Only if new image is provided)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        // Update Product Details
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->stock = $request->stock;
        $product->gender = $request->gender;
        $product->description = $request->description;

        // Auto-update Status Based on Stock
        $product->status = ($request->stock == 0) ? 1 : 0;

        $product->save(); // Save updated data

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete(); // Delete the product

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }

}
