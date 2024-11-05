<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with('reviews')->findOrFail($id); // Retrieve product by ID
        return view("products.show", compact("product")); // Return the view with the product
    }


    // Store a new review for the product
    public function storeReview(Request $request, $id)
    {
        // Validate the review data
        $validated = $request->validate([
            'rating' => 'required|numeric|min:1|max:5',  // Rating must be between 1 and 5
            'comment' => 'nullable|string|max:1000',  // Comment is optional, with a max length
        ]);

        // Retrieve the product
        $product = Product::findOrFail($id);

        // Create a new review and associate it with the product and authenticated user
        $product->reviews()->create([
            'user_id' => 1,  // Assuming the user is authenticated
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);

        // Redirect back to the product page with a success message
        return redirect()->route('products.show', $id)->with('success', 'Your review has been submitted!');
    }

    // Method to update the status of a product
    public function updateStatus($id, Request $request)
    {
        // Ensure the request contains a valid status
        $validated = $request->validate([
            'status' => 'required|string|in:active,inactive,out_of_stock' // You can adjust the allowed status values
        ]);

        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Check if the status has actually changed
        if ($product->status !== $validated['status']) {
            // Update the status and the timestamp
            $product->status = $validated['status'];
            $product->status_updated_at = now(); // Set the current date and time
            $product->save(); // Save the changes
        }

        // Return a success message
        return redirect()->route('products.show', $id)->with('success', 'Product status updated successfully!');
    }
}
