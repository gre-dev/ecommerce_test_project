@extends('layouts.master')

@section('title', 'Home')

@section('css')
    <!-- Page-specific CSS for the home page -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero {
            background-color: #28a745; /* Change hero background color */
        }
        .feature h3 {
            color: #007bff; /* Change feature header color */
        }
    </style>
@endsection

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