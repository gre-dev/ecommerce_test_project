@extends('layouts.master')

@section('title', 'Home')

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
<header class="hero">
    <h1>Welcome to Our Store</h1>
    <p>Your one-stop shop for everything!</p>
    <a href="#products" class="btn btn-light">Shop Now</a>
</header>

<div class="container my-5">
    <h2 class="text-center mb-4">Featured Products</h2>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4">
            <div class="feature">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <p><strong>Price: ${{ number_format($product->price, 2) }}</strong></p>
                <p>Stock: {{ $product->stock }}</p>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Details</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection