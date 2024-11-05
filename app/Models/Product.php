<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory; // Use the HasFactory trait for factory support

    // Define the table associated with the model if it's not the plural form of the model name
    protected $table = "products"; // Optional, only if your table name is not 'products'


    // Specify the fillable attributes
    protected $fillable = [
        "name",
        "description",
        "price",
        "stock",
        "status",
        "status_updated_at", // Add status_updated_at to the fillable array
    ];


    // Automatically cast 'status_updated_at' to a Carbon instance (datetime)
    protected $casts = [
        'status_updated_at' => 'datetime',
    ];

    // Define any relationships, for example, if a product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // If a product has many order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Define the relationship with the Review model
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // You may include other methods and scopes as needed
}
