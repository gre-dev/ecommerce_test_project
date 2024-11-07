<?php

namespace App\Interfaces;

interface ReviewRepositoryInterface
{
    public function create(array $data);
    public function getProductReviews(int $productId);
    public function validateReview(array $data);
}
