<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ReviewService $reviewService)
    {
    }
    
    public function show($id)
    {
        $product = Product::findOrFail($id); // Retrieve product by ID
        $reviews = $this->reviewService->allReviewsForProduct($id);
        return view("products.show", compact("product","reviews")); // Return the view with the product
    }

    public function updateStatus(Request $request , $id){
        Product::where('id',$id)->update(['status'=>$request->status , 'status_updated_at'=>date('Y-m-d H:i:s')]);
        return redirect()->back()->with('success', 'Changed Successfully');

    }

    public function search(Request $request){
        $products = Product::when(request()->search, function ($query, $search) {
            $query->whereAny(['name', 'description'],  'LIKE', '%'.$search.'%');
        })->get();
        $html = view('products.productSearchResult', compact('products'))->render();
        return response()->json(['success' => true, 'html' => $html]);

    }
}
