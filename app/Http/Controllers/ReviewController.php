<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductServiceInterface;
use App\Interfaces\ReviewRepositoryInterface;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
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


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // التحقق من صحة البيانات
        $validation = $this->reviewRepository->validateReview($data);
        if (!$validation['isValid']) {
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'بيانات غير صالحة',
                    'errors' => $validation['errors'],
                    'status' => 'error'
                ], 422);
            }

            return redirect()->back()
                ->withErrors($validation['errors'])
                ->with('error', 'فشل إنشاء المراجعة')
                ->withInput();
        }

        // إنشاء المراجعة
        try {
            $review = $this->reviewRepository->create($data);

            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'تم إنشاء المراجعة بنجاح',
                    'data' => $review,
                    'status' => 'success'
                ], 201);
            }

            return redirect()->back()
                ->with('success', 'تم إنشاء المراجعة بنجاح');
        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'حدث خطأ أثناء إنشاء المراجعة',
                    'status' => 'error'
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء إنشاء المراجعة')
                ->withInput();
        }
    }
}
