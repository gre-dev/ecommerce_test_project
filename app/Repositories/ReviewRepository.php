<?php

namespace App\Repositories;

use App\Interfaces\ReviewRepositoryInterface;
use App\Models\Review;
use Illuminate\Support\Facades\Validator;

class ReviewRepository implements ReviewRepositoryInterface
{
    protected $model;

    public function __construct(Review $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function getProductReviews(int $productId)
    {
        return $this->model->with('user')
            ->where('product_id', $productId)
            ->latest()
            ->get();
    }

    public function validateReview(array $data): array
    {
        $validator = Validator::make($data, [
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10',
            'product_id' => 'required|exists:products,id'
        ]);

        return [
            'isValid' => !$validator->fails(),
            'errors' => $validator->errors()->all()
        ];
    }
}
