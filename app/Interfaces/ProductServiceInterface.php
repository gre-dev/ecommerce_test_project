<?php

namespace App\Interfaces;

interface ProductServiceInterface
{
    public function updateStatus(int $productId, string $status): bool;
    public function getProduct($id);
    public function getProducts();
    public function searchProducts($query);
    public function createProduct(array $data);
    public function updateProduct(int $id, array $data);
}
