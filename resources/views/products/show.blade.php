@extends('layouts.app')

@section('title', $product->title . ' - Glowlin Organic Skincare')

@section('content')
<!-- # product detail
================================================== -->
<section id="product-detail" class="container s-menu target-section">

    <div class="row s-menu__content">
        
        <div class="column xl-6 lg-6 md-12">
            <div class="product-gallery">
                @if($product->images->count() > 0)
                    <div class="main-image">
                        <img src="{{ Storage::url($product->images->first()->image_url) }}" alt="{{ $product->title }}" id="main-product-image">
                    </div>
                    @if($product->images->count() > 1)
                    <div class="thumbnail-images">
                        @foreach($product->images as $image)
                        <img src="{{ Storage::url($image->image_url) }}" alt="{{ $product->title }}" class="thumbnail" onclick="changeMainImage(this.src)">
                        @endforeach
                    </div>
                    @endif
                @else
                    <div class="main-image">
                        <img src="{{ asset('assets/images/sample-image.jpg') }}" alt="{{ $product->title }}">
                    </div>
                @endif
            </div>
        </div>

        <div class="column xl-6 lg-6 md-12">
            <div class="product-details">
                <h1 class="product-title">{{ $product->title }}</h1>
                
                <div class="product-price">{{ $product->formatted_price }}</div>
                
                <div class="product-description">
                    <p>{{ $product->description }}</p>
                </div>

                <div class="product-stock">
                    @if($product->stock > 0)
                        <span class="stock-available">In Stock ({{ $product->stock }} available)</span>
                    @else
                        <span class="stock-unavailable">Out of Stock</span>
                    @endif
                </div>

                <div class="product-actions">
                    @if($product->stock > 0)
                    <form action="{{ route('cart.add', $product) }}" method="POST" class="add-to-cart-form">
                        @csrf
                        <div class="quantity-selector">
                            <label for="quantity">Quantity:</label>
                            <select name="quantity" id="quantity">
                                @for($i = 1; $i <= min($product->stock, 10); $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <button type="submit" class="btn btn--primary btn--large">Add to Cart</button>
                    </form>
                    @else
                    <button class="btn btn--secondary btn--large" disabled>Out of Stock</button>
                    @endif
                </div>

                <div class="product-features">
                    <h3>Product Features:</h3>
                    <ul>
                        <li>100% Organic Ingredients</li>
                        <li>Made in Pakistan</li>
                        <li>No Harmful Chemicals</li>
                        <li>Perfect for Pakistani Skin</li>
                        <li>Cash on Delivery Available</li>
                    </ul>
                </div>
            </div>
        </div>

    </div> <!-- end s-menu__content -->

</section> <!-- end s-menu -->  

<!-- # related products
================================================== -->
<section id="related-products" class="container s-menu target-section">

    <div class="row s-menu__content">
        
        <div class="column xl-12">
            <div class="section-header" data-num="02">
                <h2 class="text-display-title">You Might Also Like</h2>
            </div>
        </div>

        <div class="column xl-12">
            <div class="related-products-grid">
                @php
                    $relatedProducts = \App\Models\Product::where('is_active', true)
                        ->where('id', '!=', $product->id)
                        ->with('primaryImage')
                        ->take(3)
                        ->get();
                @endphp

                @if($relatedProducts->count() > 0)
                    @foreach($relatedProducts as $relatedProduct)
                    <div class="related-product-item">
                        <div class="related-product-image">
                            @if($relatedProduct->primaryImage)
                                <img src="{{ Storage::url($relatedProduct->primaryImage->image_url) }}" alt="{{ $relatedProduct->title }}">
                            @else
                                <img src="{{ asset('assets/images/sample-image.jpg') }}" alt="{{ $relatedProduct->title }}">
                            @endif
                        </div>
                        <div class="related-product-info">
                            <h4>{{ $relatedProduct->title }}</h4>
                            <div class="related-product-price">{{ $relatedProduct->formatted_price }}</div>
                            <a href="{{ route('products.show', $relatedProduct) }}" class="btn btn--primary">View Product</a>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="no-related-products">
                        <p>Check out our other amazing products!</p>
                        <a href="{{ route('products.index') }}" class="btn btn--primary">View All Products</a>
                    </div>
                @endif
            </div>
        </div>

    </div> <!-- end s-menu__content -->

</section> <!-- end s-menu -->  
@endsection

@push('styles')
<style>
.product-gallery {
    margin-bottom: 2rem;
}

.main-image {
    margin-bottom: 1rem;
}

.main-image img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 8px;
}

.thumbnail-images {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.thumbnail {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 4px;
    cursor: pointer;
    border: 2px solid transparent;
    transition: border-color 0.3s ease;
}

.thumbnail:hover {
    border-color: #2c5530;
}

.product-details {
    padding-left: 2rem;
}

.product-title {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    color: #333;
}

.product-price {
    font-size: 2rem;
    font-weight: bold;
    color: #2c5530;
    margin-bottom: 1.5rem;
}

.product-description {
    margin-bottom: 1.5rem;
    color: #666;
    line-height: 1.6;
}

.product-stock {
    margin-bottom: 1.5rem;
}

.stock-available {
    color: #28a745;
    font-weight: bold;
}

.stock-unavailable {
    color: #dc3545;
    font-weight: bold;
}

.add-to-cart-form {
    margin-bottom: 2rem;
}

.quantity-selector {
    margin-bottom: 1rem;
}

.quantity-selector label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
}

.quantity-selector select {
    padding: 0.5rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
}

.btn--large {
    padding: 1rem 2rem;
    font-size: 1.1rem;
    width: 100%;
}

.product-features {
    background: #f8f9fa;
    padding: 1.5rem;
    border-radius: 8px;
}

.product-features h3 {
    margin-bottom: 1rem;
    color: #333;
}

.product-features ul {
    list-style: none;
    padding: 0;
}

.product-features li {
    padding: 0.5rem 0;
    color: #666;
    position: relative;
    padding-left: 1.5rem;
}

.product-features li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #2c5530;
    font-weight: bold;
}

.related-products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.related-product-item {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.related-product-item:hover {
    transform: translateY(-5px);
}

.related-product-image {
    height: 150px;
    overflow: hidden;
}

.related-product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.related-product-info {
    padding: 1rem;
    text-align: center;
}

.related-product-info h4 {
    margin-bottom: 0.5rem;
    color: #333;
}

.related-product-price {
    font-size: 1.1rem;
    font-weight: bold;
    color: #2c5530;
    margin-bottom: 1rem;
}

.no-related-products {
    text-align: center;
    padding: 2rem;
    color: #666;
}

@media (max-width: 768px) {
    .product-details {
        padding-left: 0;
        margin-top: 2rem;
    }
    
    .product-title {
        font-size: 2rem;
    }
    
    .product-price {
        font-size: 1.5rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
function changeMainImage(src) {
    document.getElementById('main-product-image').src = src;
}
</script>
@endpush
