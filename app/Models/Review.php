<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The attributes that are mass assignable
     * user_id: ID of the user who wrote the review
     * product_id: ID of the product being reviewed
     * rating: Product rating (1 to 5)
     * comment: Review text content
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'comment'
    ];

    /**
     * Get the product that owns the review
     * Defines the relationship between Review and Product models
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the user who wrote the review
     * Defines the relationship between Review and User models
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
