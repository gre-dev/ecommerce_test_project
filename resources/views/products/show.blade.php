@extends('layouts.master')

@section('title', $product->name)

@section('content')
    <div class="container py-5">
        <div class="row">
            <!-- Product Details -->
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h1 class="h2 mb-0">{{ $product->name }}</h1>
                            <span class="badge bg-{{ $product->status === 'active' ? 'success' : 'danger' }} fs-6">
                                {{ ucfirst($product->status) }}
                            </span>
                        </div>

                        <div class="mb-4">
                            <h3 class="h5 text-muted">Description</h3>
                            <p class="lead">{{ $product->description }}</p>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="text-primary mb-0">${{ number_format($product->price, 2) }}</h4>
                                <small class="text-muted">Stock: {{ $product->stock }} units</small>
                            </div>
                            <div>
                                <small class="text-muted d-block text-end">
                                    Status updated:
                                    {{ $product->status_updated_at ? $product->status_updated_at->diffForHumans() : 'Never updated' }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reviews Section -->
                <div class="card shadow-sm mt-4">
                    <div class="card-body">
                        <h2 class="h4 mb-4">Customer Reviews</h2>

                        <!-- Review Form -->
                        <form action="{{ route('reviews.store', $product->id) }}" method="POST" class="mb-5">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Rating</label>
                                <div class="rating-stars mb-2">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rating"
                                                id="rating{{ $i }}" value="{{ $i }}">
                                            <label class="form-check-label" for="rating{{ $i }}">
                                                @for ($j = 1; $j <= $i; $j++)
                                                    <i class="fas fa-star text-warning"></i>
                                                @endfor
                                                @for ($j = $i + 1; $j <= 5; $j++)
                                                    <i class="far fa-star text-warning"></i>
                                                @endfor
                                            </label>
                                        </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="comment" class="form-label">Your Review</label>
                                <input type="hidden" name="user_id" value="1">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Submit Review
                            </button>
                        </form>

                        <!-- Reviews List -->
                        <div class="reviews-list">
                            @forelse($product->reviews as $review)
                                <div class="border-bottom pb-4 mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="rating-stars">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i
                                                    class="fa{{ $i <= $review->rating ? 's' : 'r' }} fa-star text-warning"></i>
                                            @endfor
                                        </div>
                                        <small class="text-muted d-block text-end">
                                            Status updated:
                                            {{ $product->status_updated_at ? $product->status_updated_at->diffForHumans() : 'Never updated' }}
                                        </small>
                                    </div>
                                    <p class="mb-1">{{ $review->comment }}</p>
                                    <small class="text-muted">By {{ $review->user->name }}</small>
                                </div>
                            @empty
                                <div class="text-center text-muted py-4">
                                    <i class="fas fa-comments fa-2x mb-2"></i>
                                    <p>No reviews yet. Be the first to review this product!</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="h5 mb-4">Product Summary</h3>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Average Rating</span>
                            <div class="rating-stars">
                                @php
                                    $avgRating = $product->reviews->avg('rating') ?? 0;
                                @endphp
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa{{ $i <= $avgRating ? 's' : 'r' }} fa-star text-warning"></i>
                                @endfor
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Reviews</span>
                            <span>{{ $product->reviews->count() }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Category</span>
                            <span>{{ $product->category->name ?? 'Uncategorized' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
