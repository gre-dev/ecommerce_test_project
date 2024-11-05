<?php

namespace App\Actions\Product;

use App\Http\Requests\UpdateProductStatusRequest;
use App\Models\Product;

class UpdateProductStatus
{
    public function execute(UpdateProductStatusRequest $request, Product $product): void
    {
        $product->update([
            "status" => $request->get("status"),
            "status_updated_at" => now()
        ]);
    }
}
