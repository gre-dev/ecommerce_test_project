<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Review extends Model
{

    // Specify the fillable attributes
    protected $fillable = ["user_id" , "product_id", "rate", "comment"];

    // Define any relationships, for example, if a Raview belongs to a Product
    public function product()
    {
        return $this->belongsTo( Product::class);
    }

    // Define any relationships, for example, if a Raview belongs to a User
    public function user()
    {
        return $this->belongsTo( User::class);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y-m-d H:i:s');

    } 
}
