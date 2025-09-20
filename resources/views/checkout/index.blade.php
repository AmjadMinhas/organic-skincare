@extends('layouts.app')

@section('title', 'Checkout - Glowlin Organic Skincare')

@section('content')
<!-- # checkout
================================================== -->
<section id="checkout" class="container s-menu target-section">

    <div class="row s-menu__content">
        
        <div class="column xl-12">
            <div class="section-header" data-num="01">
                <h2 class="text-display-title">Checkout</h2>
            </div>
        </div>

        <div class="column xl-12">
            <div class="checkout-container">
                <div class="checkout-form-section">
                    <h3>Shipping Information</h3>
                    <form action="{{ route('checkout.store') }}" method="POST" class="checkout-form">
                        @csrf
                        
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name ?? '') }}" required>
                            @error('name')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" required>
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone ?? '') }}" required>
                            @error('phone')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Delivery Address *</label>
                            <textarea id="address" name="address" rows="4" required>{{ old('address', $user->address ?? '') }}</textarea>
                            @error('address')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <select id="payment_method" name="payment_method">
                                <option value="cash_on_delivery" selected>Cash on Delivery</option>
                                <option value="bank_transfer" disabled>Bank Transfer (Coming Soon)</option>
                                <option value="easypaisa" disabled>EasyPaisa (Coming Soon)</option>
                                <option value="jazzcash" disabled>JazzCash (Coming Soon)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="save_details" value="1" {{ old('save_details') ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                                Save my details for future orders
                            </label>
                        </div>

                        <div class="form-group password-field" id="password-field" style="display: none;">
                            <label for="password">Create Password *</label>
                            <input type="password" id="password" name="password">
                            @error('password')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-actions">
                            <a href="{{ route('cart.index') }}" class="btn btn--secondary">Back to Cart</a>
                            <button type="submit" class="btn btn--primary">Place Order</button>
                        </div>
                    </form>
                </div>

                <div class="order-summary-section">
                    <h3>Order Summary</h3>
                    <div class="order-items">
                        @foreach($cartItems as $item)
                        <div class="order-item">
                            <div class="order-item-image">
                                @if($item['product']->primaryImage)
                                    <img src="{{ Storage::url($item['product']->primaryImage->image_url) }}" alt="{{ $item['product']->title }}">
                                @else
                                    <img src="{{ asset('assets/images/sample-image.jpg') }}" alt="{{ $item['product']->title }}">
                                @endif
                            </div>
                            <div class="order-item-details">
                                <h4>{{ $item['product']->title }}</h4>
                                <p>Quantity: {{ $item['quantity'] }}</p>
                                <p class="order-item-price">{{ $item['product']->formatted_price }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="order-total">
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

                    <div class="delivery-info">
                        <h4>Delivery Information</h4>
                        <ul>
                            <li>Free delivery across Pakistan</li>
                            <li>Cash on Delivery available</li>
                            <li>Estimated delivery: 3-5 business days</li>
                            <li>We'll contact you to confirm delivery details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- end s-menu__content -->

</section> <!-- end s-menu -->  
@endsection

@push('styles')
<style>
.checkout-container {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 2rem;
    margin-top: 2rem;
}

.checkout-form-section,
.order-summary-section {
    background: #fff;
    border-radius: 8px;
    padding: 2rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.checkout-form-section h3,
.order-summary-section h3 {
    margin-bottom: 1.5rem;
    color: #333;
    border-bottom: 2px solid #2c5530;
    padding-bottom: 0.5rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
    color: #333;
}

.form-group input,
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
    outline: none;
    border-color: #2c5530;
}

.checkbox-label {
    display: flex;
    align-items: center;
    cursor: pointer;
    font-weight: normal;
}

.checkbox-label input[type="checkbox"] {
    width: auto;
    margin-right: 0.5rem;
}

.error-message {
    color: #dc3545;
    font-size: 0.9rem;
    margin-top: 0.25rem;
    display: block;
}

.form-actions {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
}

.form-actions .btn {
    flex: 1;
    padding: 0.75rem 1rem;
    text-align: center;
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

.btn--primary:hover {
    background: #1e3a21;
}

.btn--secondary:hover {
    background: #e9ecef;
}

.order-items {
    margin-bottom: 1.5rem;
}

.order-item {
    display: flex;
    gap: 1rem;
    padding: 1rem 0;
    border-bottom: 1px solid #eee;
}

.order-item:last-child {
    border-bottom: none;
}

.order-item-image {
    width: 60px;
    height: 60px;
    overflow: hidden;
    border-radius: 4px;
}

.order-item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.order-item-details h4 {
    margin-bottom: 0.25rem;
    color: #333;
    font-size: 0.9rem;
}

.order-item-details p {
    margin-bottom: 0.25rem;
    color: #666;
    font-size: 0.8rem;
}

.order-item-price {
    font-weight: bold;
    color: #2c5530;
}

.order-total {
    margin-bottom: 1.5rem;
}

.total-line {
    display: flex;
    justify-content: space-between;
    padding: 0.5rem 0;
    border-bottom: 1px solid #eee;
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

.delivery-info {
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 4px;
}

.delivery-info h4 {
    margin-bottom: 0.5rem;
    color: #333;
}

.delivery-info ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.delivery-info li {
    padding: 0.25rem 0;
    color: #666;
    font-size: 0.9rem;
    position: relative;
    padding-left: 1.5rem;
}

.delivery-info li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #2c5530;
    font-weight: bold;
}

@media (max-width: 768px) {
    .checkout-container {
        grid-template-columns: 1fr;
    }
    
    .form-actions {
        flex-direction: column;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const saveDetailsCheckbox = document.querySelector('input[name="save_details"]');
    const passwordField = document.getElementById('password-field');
    const passwordInput = document.getElementById('password');

    saveDetailsCheckbox.addEventListener('change', function() {
        if (this.checked) {
            passwordField.style.display = 'block';
            passwordInput.required = true;
        } else {
            passwordField.style.display = 'none';
            passwordInput.required = false;
            passwordInput.value = '';
        }
    });
});
</script>
@endpush
