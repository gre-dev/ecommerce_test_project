@extends('layouts.master')

@section('title', 'Product Details')

@section('content')

<!-- Product Details Section -->
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6">
            <!-- Product Image (Placeholder) -->
            <div class="product-image">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid rounded shadow-sm">
            </div>
        </div>
        
        <div class="col-lg-6">
            <h1 class="display-4 font-weight-bold">{{ $product->name }}</h1>
            <p class="lead">{{ $product->description }}</p>
            <p class="h4 text-primary mb-3">Price: ${{ number_format($product->price, 2) }}</p>
            <p class="font-weight-bold">Stock: {{ $product->stock }}</p>
            
            <!-- Add to Cart Button (Optional) -->
            <a href="#" class="btn btn-success btn-lg">Add to Cart</a>
        </div>
    </div>
</div>

<hr>

<!-- Reviews Section -->
<div class="container my-5">
    <h3 class="text-center">Reviews</h3>

    @if($product->reviews->isEmpty())
        <p class="text-center">No reviews yet. Be the first to review this product!</p>
    @else
        <div class="reviews-list">
            @foreach ($product->reviews as $review)
                <div class="review-item mb-4">
                    <div class="d-flex justify-content-between">
                        <strong>{{ $review->user->name }}</strong>
                        <span class="badge badge-warning">{{ $review->rating }} / 5</span>
                    </div>
                    <p class="text-muted"><em>Posted on {{ $review->created_at->toFormattedDateString() }}</em></p>
                    <p>{{ $review->comment }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>

<hr>

<!-- Submit a Review Section -->
<div class="container my-5">
    <h4>Submit a Review</h4>
    
    <form action="{{ route('products.storeReview', $product->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="rating">Rating (1 to 5)</label>
            <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" required>
        </div>
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" class="form-control" rows="4" maxlength="1000" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit Review</button>
    </form>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif
</div>

@endsection
