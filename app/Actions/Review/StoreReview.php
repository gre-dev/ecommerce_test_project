<?php

namespace App\Actions\Review;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Product;
use App\Models\Review;

class StoreReview
{
    public function execute(StoreReviewRequest $request, Product $product): void
    {
        Review::create([
            "user_id" => 1, // For the test demonstration
            "product_id" => $product->id,
            "rating" => $request->get("rating"),
            "comment" => $request->get("comment"),
        ]);
    }
}
