@if($products->count() > 0)
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
@else
    <center><h3>Not Products Exist</h3></center>

@endif

