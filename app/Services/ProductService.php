<?php

namespace App\Services;

use App\Interfaces\ProductServiceInterface;
use App\Models\Product;

class ProductService implements ProductServiceInterface
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function updateStatus(int $productId, string $status): bool
    {
        $product = $this->model->findOrFail($productId);
        $product->status_updated_at = now();
        return $product->updateStatus($status);
    }

    public function getProduct($id)
    {
        $productId = (int) $id;
        return $this->model->with('reviews.user')->findOrFail($productId);
    }

    public function getProducts()
    {
        return $this->model->latest()->paginate(12);
    }

    public function createProduct(array $data)
    {
        return $this->model->create($data);
    }

    public function updateProduct(int $id, array $data)
    {
        $product = $this->model->findOrFail($id);
        return $product->update($data);
    }

    public function searchProducts($query)
    {
        return Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%");
            })
            ->latest()
            ->paginate(12);
    }
}
