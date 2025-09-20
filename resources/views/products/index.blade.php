@extends('layouts.app')

@section('title', 'Products - Glowlin Organic Skincare')

@section('content')
<!-- # products
================================================== -->
<section id="products" class="container s-menu target-section">

    <div class="row s-menu__content">
        
        <div class="column xl-4 lg-5 md-12 s-menu__content-start">

            <div class="section-header" data-num="01">
                <h2 class="text-display-title">Our Products</h2>
            </div>  

            <div class="intro-block-content__text-wrap">
                <p class="intro-block-content__text">
                    Discover our complete range of premium organic skincare products. 
                    Each product is carefully crafted with natural ingredients to provide 
                    the best care for your skin.
                </p>
            </div>

        </div> <!-- end s-menu__content-start -->

        <div class="column xl-8 lg-7 md-12 s-menu__content-end">

            @if($products->count() > 0)
            <div class="products-grid">
                @foreach($products as $product)
                <div class="product-item">
                    <div class="product-image">
                        @if($product->primaryImage)
                            <img src="{{ Storage::url($product->primaryImage->image_url) }}" alt="{{ $product->title }}">
                        @else
                            <img src="{{ asset('assets/images/sample-image.jpg') }}" alt="{{ $product->title }}">
                        @endif
                    </div>
                    <div class="product-info">
                        <h3>{{ $product->title }}</h3>
                        <p>{{ Str::limit($product->description, 100) }}</p>
                        <div class="product-price">{{ $product->formatted_price }}</div>
                        <div class="product-actions">
                            <a href="{{ route('products.show', $product) }}" class="btn btn--primary">View Details</a>
                            <form action="{{ route('cart.add', $product) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn--secondary">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="pagination-wrapper">
                {{ $products->links() }}
            </div>
            @else
            <div class="no-products">
                <h3>No products available at the moment</h3>
                <p>We're working on adding amazing organic skincare products. Check back soon!</p>
                <a href="{{ route('home') }}" class="btn btn--primary">Back to Home</a>
            </div>
            @endif

        </div> <!-- end s-menu__content-end -->

    </div> <!-- end s-menu__content -->

</section> <!-- end s-menu -->  
@endsection

@push('styles')
<style>
    /* Enhanced Glassmorphism Product Cards for Dark Background */
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2.5rem;
    margin-top: 3rem;
    padding: 1rem;
}

.product-item {
    position: relative;
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 
        0 8px 32px rgba(0, 0, 0, 0.3),
        0 0 0 1px rgba(255, 255, 255, 0.05) inset;
    transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
    transform-style: preserve-3d;
}

.product-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-item:hover::before {
    opacity: 1;
}

.product-item:hover {
    transform: translateY(-8px) rotateX(5deg);
    box-shadow: 
        0 20px 60px rgba(0, 0, 0, 0.4),
        0 0 0 1px rgba(255, 255, 255, 0.1) inset,
        0 0 100px rgba(44, 85, 48, 0.2);
    border-color: rgba(255, 255, 255, 0.25);
}

.product-image {
    height: 240px;
    overflow: hidden;
    position: relative;
    border-radius: 16px 16px 0 0;
}

.product-image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.23, 1, 0.320, 1);
    filter: brightness(1.1) contrast(1.05);
}

.product-item:hover .product-image img {
    transform: scale(1.08);
}

.product-info {
    padding: 2rem;
    background: rgba(255, 255, 255, 0.02);
    backdrop-filter: blur(10px);
    position: relative;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.product-info::before {
    content: '';
    position: absolute;
    top: 0;
    left: 1rem;
    right: 1rem;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(44, 85, 48, 0.6), transparent);
}

.product-info h3 {
    margin-bottom: 0.8rem;
    color: rgba(255, 255, 255, 0.95);
    font-size: 1.3rem;
    font-weight: 600;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    transition: color 0.3s ease;
}

.product-item:hover .product-info h3 {
    color: #ffffff;
    text-shadow: 0 0 20px rgba(44, 85, 48, 0.5);
}

.product-info p {
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
    line-height: 1.6;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
}

.product-price {
    font-size: 1.4rem;
    font-weight: 700;
    background: linear-gradient(135deg, #4ade80, #22c55e, #16a34a);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1.5rem;
    text-shadow: 0 0 30px rgba(34, 197, 94, 0.3);
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
}

.product-actions {
    display: flex;
    gap: 0.8rem;
    margin-top: 1.5rem;
}

.product-actions .btn {
    flex: 1;
    padding: 0.8rem 1.5rem;
    border: none;
    border-radius: 12px;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
    transition: all 0.3s cubic-bezier(0.23, 1, 0.320, 1);
    position: relative;
    overflow: hidden;
    backdrop-filter: blur(10px);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.btn--primary {
    background: linear-gradient(135deg, rgba(44, 85, 48, 0.9), rgba(34, 68, 38, 0.9));
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 
        0 4px 15px rgba(44, 85, 48, 0.3),
        0 0 0 1px rgba(255, 255, 255, 0.1) inset;
}

.btn--primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s ease;
}

.btn--primary:hover::before {
    left: 100%;
}

.btn--primary:hover {
    transform: translateY(-2px);
    box-shadow: 
        0 8px 25px rgba(44, 85, 48, 0.4),
        0 0 0 1px rgba(255, 255, 255, 0.2) inset;
    background: linear-gradient(135deg, rgba(44, 85, 48, 1), rgba(34, 68, 38, 1));
}

.btn--secondary {
    background: rgba(255, 255, 255, 0.1);
    color: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    box-shadow: 
        0 4px 15px rgba(0, 0, 0, 0.2),
        0 0 0 1px rgba(255, 255, 255, 0.05) inset;
}

.btn--secondary:hover {
    background: rgba(255, 255, 255, 0.15);
    border-color: rgba(255, 255, 255, 0.3);
    color: white;
    transform: translateY(-2px);
    box-shadow: 
        0 8px 25px rgba(0, 0, 0, 0.3),
        0 0 0 1px rgba(255, 255, 255, 0.1) inset;
}

.no-products {
    text-align: center;
    padding: 4rem 2rem;
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    margin: 2rem 0;
}

.no-products h3 {
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 1rem;
    font-size: 1.5rem;
}

.no-products p {
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 2rem;
}

.pagination-wrapper {
    margin-top: 3rem;
    text-align: center;
}

.pagination {
    display: inline-flex;
    list-style: none;
    padding: 0;
    margin: 0;
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(20px);
    border-radius: 15px;
    padding: 0.5rem;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.pagination li {
    margin: 0 0.2rem;
}

.pagination a {
    display: block;
    padding: 0.8rem 1.2rem;
    background: transparent;
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    border-radius: 10px;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.pagination a:hover {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    transform: scale(1.05);
}

.pagination .active a {
    background: linear-gradient(135deg, rgba(44, 85, 48, 0.8), rgba(34, 68, 38, 0.8));
    color: white;
    box-shadow: 0 4px 15px rgba(44, 85, 48, 0.3);
}

/* Enhanced section header for better integration */
.section-header h2 {
    background: linear-gradient(135deg, #ffffff, rgba(255, 255, 255, 0.8));
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0 0 30px rgba(255, 255, 255, 0.3);
}

.intro-block-content__text {
    color: rgba(255, 255, 255, 0.8);
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
}

/* Responsive enhancements */
@media (max-width: 768px) {
    .products-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
        padding: 0.5rem;
    }
    
    .product-item {
        border-radius: 16px;
    }
    
    .product-info {
        padding: 1.5rem;
    }
    
    .product-actions {
        flex-direction: column;
    }
    
    .product-actions .btn {
        margin-bottom: 0.5rem;
    }
}

/* Subtle animation for page load */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.product-item {
    animation: fadeInUp 0.6s ease-out;
    animation-fill-mode: both;
}

.product-item:nth-child(1) { animation-delay: 0.1s; }
.product-item:nth-child(2) { animation-delay: 0.2s; }
.product-item:nth-child(3) { animation-delay: 0.3s; }
.product-item:nth-child(4) { animation-delay: 0.4s; }
.product-item:nth-child(5) { animation-delay: 0.5s; }
.product-item:nth-child(6) { animation-delay: 0.6s; }
</style>
@endpush
