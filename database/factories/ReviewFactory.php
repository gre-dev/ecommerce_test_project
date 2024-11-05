<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition()
    {
        return [
            "product_id" => randomOrCreateFactory(Product::class),
            "user_id" => randomOrCreateFactory(User::class),
            "rating" => random_int(1, 5),
            "comment" => $this->faker->word,
        ];
    }
}
