@extends('layouts.app')

@section('title', 'Shopping Cart - Glowlin Organic Skincare')

@section('content')
<!-- # cart
================================================== -->
<section id="cart" class="container s-menu target-section">

    <div class="row s-menu__content">
        
        <div class="column xl-12">
            {{-- <div class="section-header" data-num="01"> --}}
                <h2 class="text-display-title">Shopping Cart</h2>
            {{-- </div> --}}
        </div>

        <div class="column xl-12">
            @if(count($cartItems) > 0)
            <div class="cart-container">
                <div class="cart-items">
                    @foreach($cartItems as $item)
                    <div class="cart-item">
                        <div class="cart-item-image">
                            @if($item['product']->primaryImage)
                                <img src="{{ Storage::url($item['product']->primaryImage->image_url) }}" alt="{{ $item['product']->title }}">
                            @else
                                <img src="{{ asset('assets/images/sample-image.jpg') }}" alt="{{ $item['product']->title }}">
                            @endif
                        </div>
                        
                        <div class="cart-item-details">
                            <h3>{{ $item['product']->title }}</h3>
                            <p class="cart-item-price">{{ $item['product']->formatted_price }}</p>
                        </div>
                        
                        <div class="cart-item-quantity">
                            <form action="{{ route('cart.update', $item['product']) }}" method="POST" class="quantity-form">
                                @csrf
                                @method('PUT')
                                <label for="quantity-{{ $item['product']->id }}">Quantity:</label>
                                <select name="quantity" id="quantity-{{ $item['product']->id }}" onchange="this.form.submit()">
                                    @for($i = 1; $i <= min($item['product']->stock, 10); $i++)
                                        <option value="{{ $i }}" {{ $i == $item['quantity'] ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </form>
                        </div>
                        
                        <div class="cart-item-subtotal">
                            <span class="subtotal-label">Subtotal:</span>
                            <span class="subtotal-amount">₨{{ number_format($item['subtotal'], 2) }}</span>
                        </div>
                        
                        <div class="cart-item-actions">
                            <form action="{{ route('cart.remove', $item['product']) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn--danger btn--small" onclick="return confirm('Are you sure you want to remove this item?')">
                                    Remove
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="cart-summary">
                    <div class="cart-total">
                        <h3>Order Summary</h3>
                        <div class="total-line">
                            <span>Subtotal:</span>
                            <span>₨{{ number_format($total, 2) }}</span>
                        </div>
                        <div class="total-line">
                            <span>Delivery:</span>
                            <span>Free</span>
                        </div>
                        <div class="total-line total-final">
                            <span>Total:</span>
                            <span>₨{{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                    
                    <div class="cart-actions">
                        <a href="{{ route('products.index') }}" class="btn btn--secondary">Continue Shopping</a>
                        <a href="{{ route('checkout.index') }}" class="btn btn--primary">Proceed to Checkout</a>
                    </div>
                    
                    <div class="cart-clear">
                        <form action="{{ route('cart.clear') }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn--danger btn--small" onclick="return confirm('Are you sure you want to clear your cart?')">
                                Clear Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <div class="empty-cart">
                <div class="empty-cart-icon">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="m1 1 4 4 13 0 4-4"></path>
                        <path d="M5 5h14l-1 7H6z"></path>
                    </svg>
                </div>
                <h3>Your cart is empty</h3>
                <p>Looks like you haven't added any products to your cart yet.</p>
                <a href="{{ route('products.index') }}" class="btn btn--primary">Start Shopping</a>
            </div>
            @endif
        </div>

    </div> <!-- end s-menu__content -->

</section> <!-- end s-menu -->  
@endsection

@push('styles')
<style>
.cart-container {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 2rem;
    margin-top: 2rem;
}

.cart-items {
    background: #fff;
    border-radius: 8px;
    padding: 1.5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.cart-item {
    display: grid;
    grid-template-columns: 100px 1fr auto auto auto;
    gap: 1rem;
    align-items: center;
    padding: 1rem 0;
    border-bottom: 1px solid #eee;
}

.cart-item:last-child {
    border-bottom: none;
}

.cart-item-image {
    width: 100px;
    height: 100px;
    overflow: hidden;
    border-radius: 8px;
}

.cart-item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.cart-item-details h3 {
    margin-bottom: 0.5rem;
    color: #333;
}

.cart-item-price {
    color: #2c5530;
    font-weight: bold;
    font-size: 1.1rem;
}

.cart-item-quantity select {
    padding: 0.5rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
}

.cart-item-subtotal {
    text-align: right;
}

.subtotal-label {
    display: block;
    font-size: 0.9rem;
    color: #666;
}

.subtotal-amount {
    font-size: 1.2rem;
    font-weight: bold;
    color: #2c5530;
}

.cart-summary {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 1.5rem;
    height: fit-content;
}

.cart-total h3 {
    margin-bottom: 1rem;
    color: #333;
}

.total-line {
    display: flex;
    justify-content: space-between;
    padding: 0.5rem 0;
    border-bottom: 1px solid #ddd;
}

.total-line:last-child {
    border-bottom: none;
}

.total-final {
    font-size: 1.2rem;
    font-weight: bold;
    color: #2c5530;
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 2px solid #2c5530;
}

.cart-actions {
    margin: 1.5rem 0;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.cart-actions .btn {
    text-align: center;
    padding: 0.75rem 1rem;
    text-decoration: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1rem;
}

.btn--primary {
    background: #2c5530;
    color: white;
}

.btn--secondary {
    background: #f8f9fa;
    color: #333;
    border: 1px solid #ddd;
}

.btn--danger {
    background: #dc3545;
    color: white;
}

.btn--small {
    padding: 0.5rem 1rem;
    font-size: 0.9rem;
}

.btn--primary:hover {
    background: #1e3a21;
}

.btn--secondary:hover {
    background: #e9ecef;
}

.btn--danger:hover {
    background: #c82333;
}

.cart-clear {
    text-align: center;
}

.empty-cart {
    text-align: center;
    padding: 4rem 2rem;
    color: var(--color-headings);
}

.empty-cart-icon {
    margin-bottom: 1rem;
    color: var(--color-headings);
}

.empty-cart h3 {
    margin-bottom: 1rem;
    color: var(--color-headings);
}

.empty-cart p {
    margin-bottom: 2rem;
}

@media (max-width: 768px) {
    .cart-container {
        grid-template-columns: 1fr;
    }
    
    .cart-item {
        grid-template-columns: 80px 1fr;
        gap: 0.5rem;
    }
    
    .cart-item-quantity,
    .cart-item-subtotal,
    .cart-item-actions {
        grid-column: 1 / -1;
        margin-top: 0.5rem;
    }
    
    .cart-item-quantity {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .cart-item-subtotal {
        text-align: left;
    }
    
    .cart-item-actions {
        text-align: center;
    }
}
</style>
@endpush
