<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct(protected ReviewService $reviewService)
    {
    }

    public function store(ReviewRequest  $request)
    {
        if($request->validated()){
            $data = $request->validated();
            $data['user_id']=\Auth::user()->id;
            $model = $this->reviewService->create($data);
            
            return response()->json(['success' => 'Form submitted successfully.' , 'data'=>$model]);

        }
    }






}

