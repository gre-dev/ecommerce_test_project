@extends('layouts.master')

@section('title', 'Product Details')

@push('styles')
<style>
    body {
        background-color: #f8f9fa;
    }

    .hero {
        background-color: #007bff;
        color: white;
        padding: 60px 0;
        text-align: center;
    }

    .feature {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
        margin: 20px;
        text-align: center;
    }
</style>
@endpush

@section('content')
<div class="product-details">
    <div class="row">
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p class="text-muted">${{ number_format($product->price, 2) }}</p>
            <p>{{ $product->description }}</p>
            <button class="btn btn-primary">Add to Cart</button>
        </div>
    </div>

    <hr>

    <!-- Reviews Section -->
    <h3>Customer Reviews</h3>
    <div class="reviews">
        @forelse($product->reviews as $review)
        <div class="media mb-4">
            <div class="media-body">
                <h5 class="mt-0">{{ $review->user->name }}</h5>
                <div>
                    @for($i = 1; $i <= 5; $i++)
                        <span class="text-warning">{{ $i <= $review->rating ? '★' : '☆' }}</span>
                        @endfor
                </div>
                <p>{{ $review->comment }}</p>
                <small class="text-muted">Reviewed on {{ $review->created_at->format('M d, Y') }}</small>
            </div>
        </div>
        @empty
        <p>No reviews yet. Be the first to leave a review!</p>
        @endforelse
    </div>

    <!-- Review Submission Form -->
    <div class="mt-5">
        <h4>Leave a Review</h4>
        <form action="{{ route('products.reviews.store', $product->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="rating">Rating</label>
                <select name="rating" id="rating" class="form-control">
                    <option value="5">5 - Excellent</option>
                    <option value="4">4 - Very Good</option>
                    <option value="3">3 - Good</option>
                    <option value="2">2 - Fair</option>
                    <option value="1">1 - Poor</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit Review</button>
        </form>
    </div>
</div>
@endsection