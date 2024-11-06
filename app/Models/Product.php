<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; // Use the HasFactory trait for factory support

    // Define the table associated with the model if it's not the plural form of the model name
    protected $table = "products"; // Optional, only if your table name is not 'products'

    // Specify the fillable attributes
    protected $fillable = ["name", "description", "price", "stock", "category_id"];

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

    // If a product has many reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // You may include other methods and scopes as needed

    protected $dates = [
        'status_updated_at',
        'created_at',
        'updated_at'
    ];

    /**
     * Update the product status and track the update time
     */
    public function updateStatus(string $status): bool
    {
        return $this->update([
            'status' => $status,
            'status_updated_at' => now()
        ]);
    }

    /**
     * Get the formatted status update time
     */
    public function getLastStatusUpdateAttribute(): string
    {
        return $this->status_updated_at?->diffForHumans() ?? 'Never updated';
    }


    public function getAverageRatingAttribute()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    public function getReviewsCountAttribute()
    {
        return $this->reviews()->count();
    }

    protected $casts = [
        'status_updated_at' => 'datetime'
    ];
}

    }
}
