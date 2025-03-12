<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = ['name', 'brand', 'quantity', 'description', 'price', 'discount_price', 'stock', 'sku', 'image', 'rating', 'review', 'gender', 'status'];
}
