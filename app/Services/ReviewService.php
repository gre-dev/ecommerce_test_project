<?php

namespace App\Services;

use App\Repository\Eloquent\ReviewRepository;
use App\Repository\ReviewRepositoryInterface;

class ReviewService
{
    public function __construct(
        protected ReviewRepositoryInterface $ReviewRepository
    ) {
    }

    public function create(array $data)
    {
        return $this->ReviewRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->ReviewRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->ReviewRepository->delete($id);
    }

    public function all()
    {
        return $this->ReviewRepository->all();
    }

    public function allReviewsForProduct($id)
    {
        return $this->ReviewRepository->all_reviews_for_product($id);
    }

    public function find($id)
    {
        return $this->ReviewRepository->find($id);
    }
}