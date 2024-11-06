<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\View\View;

class ProductViewService
{
    /**
     * Render the product page with all necessary data
     */
    public function renderProductPage(Product $product, $reviews): View
    {
        return view('products.show', [
            'product' => $product,
            'reviews' => $reviews,
            'averageRating' => $this->calculateAverageRating($reviews),
        ]);
    }

    /**
     * Calculate average rating for a product
     */
    private function calculateAverageRating($reviews): float
    {
        if ($reviews->isEmpty()) {
            return 0;
        }

        return $reviews->avg('rating');
    }
} 
