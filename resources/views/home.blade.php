@extends('layouts.master')
@section('title', 'Show products')

@section('css')

@endsection


@section('style')
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
@endsection

@section('breadcrumb-title')
    <h3>Show product Deatils</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item active">Product List</li>
@endsection

@section('content')
    <header class="hero">
        <h1>Welcome to Our Store</h1>
        <p>Your one-stop shop for everything!</p>
        <a href="#products" class="btn btn-light">Shop Now</a>
    </header>
    <div class="container-fluid my-5">
        <h2 class="text-center mb-4">Featured Products</h2>
        <div  id="message"></div>

        <div class="row" id="searchResult">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="feature">
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->description }}</p>
                                <p><strong>Price: ${{ number_format($product->price, 2) }}</strong></p>
                                <p>Stock: {{ $product->stock }}</p>
                                <p class="badge {{ $product->status == 1 ? 'badge-success' : 'badge-danger' }} "> {{ $product->status == 1 ? 'Active' : 'Inactive' }}</p>
                                </br>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>    
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection  
@section('script')


@endsection  