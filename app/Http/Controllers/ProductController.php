<?php

namespace App\Http\Controllers;

use App\Actions\Product\UpdateProductStatus;
use App\Actions\Review\StoreReview;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateProductStatusRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(
        private StoreReview $storeReview,
        private UpdateProductStatus $updateProductStatus,
    ) {}


    public function show(Product $product): View
    {
        $product->load("reviews.user");

        return view("products.show", compact("product")); // Return the view with the product
    }

    public function storeReview(StoreReviewRequest $request, Product $product): RedirectResponse
    {
        $this->storeReview->execute($request, $product);

        return redirect()->route("products.show", $product->id)
            ->with("success", "Review added successfully.");
    }

    public function updateStatus(UpdateProductStatusRequest $request, Product $product): JsonResponse
    {
        if ($product->status === $request->get("status")) {
            return response()->json(["message" => "No change in product status."], 200);
        }

        $this->updateProductStatus->execute($request, $product);

        return response()->json(["message" => "Product status updated successfully!"]);
    }
}
