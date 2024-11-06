<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductServiceInterface;
use App\Interfaces\ReviewRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $reviewRepository;

    public function __construct(
        ProductServiceInterface $productService,
        ReviewRepositoryInterface $reviewRepository
    ) {
        $this->productService = $productService;
        $this->reviewRepository = $reviewRepository;
    }


    public function create()
    {
        $categories = Category::all();

        return view('products.create', [
            'categories' => $categories
        ]);
    }

    public function index()
    {
        $products = $this->productService->getProducts();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = $this->productService->getProduct($id);
        return view('products.show', compact('product'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = $this->productService->searchProducts($query);

        if ($request->wantsJson()) {
            return response()->json([
                'products' => $products
            ]);
        }

        return view('products.index', [
            'products' => $products,
            'searchQuery' => $query
        ]);
    }

    public function editStatus($id)
    {
        $product = $this->productService->getProduct($id);
        return view('products.edit-status', compact('product'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product = $this->productService->createProduct($validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully');
    }

    // public function update(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'price' => 'required|numeric|min:0',
    //         'stock' => 'required|integer|min:0',
    //         'category_id' => 'required|exists:categories,id'
    //     ]);

    //     $this->productService->updateProduct($id, $validated);

    //     return redirect()
    //         ->route('products.index')
    //         ->with('success', 'Product updated successfully');
    // }

    public function updateStatus(Request $request, $id)
    {
        $status = $request->validate(['status' => 'required|in:active,inactive'])['status'];

        $this->productService->updateStatus($id, $status);

        return back()->with('success', 'Product status updated successfully');
    }
}
