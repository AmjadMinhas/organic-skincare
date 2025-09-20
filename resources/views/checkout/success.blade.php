@extends('layouts.app')

@section('title', 'Order Confirmation - Glowlin Organic Skincare')

@section('content')
<!-- # order success
================================================== -->
<section id="order-success" class="container s-menu target-section">

    <div class="row s-menu__content">
        
        <div class="column xl-12">
            <div class="success-container">
                <div class="success-icon">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22,4 12,14.01 9,11.01"></polyline>
                    </svg>
                </div>
                
                <h1>Order Confirmed!</h1>
                <p class="success-message">Thank you for your order. We've received your request and will process it shortly.</p>
                
                <div class="order-details">
                    <h3>Order Details</h3>
                    <div class="order-info">
                        <div class="info-row">
                            <span class="label">Order Number:</span>
                            <span class="value">#{{ $order->id }}</span>
                        </div>
                        <div class="info-row">
                            <span class="label">Order Date:</span>
                            <span class="value">{{ $order->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="info-row">
                            <span class="label">Customer Name:</span>
                            <span class="value">{{ $order->name }}</span>
                        </div>
                        <div class="info-row">
                            <span class="label">Email:</span>
                            <span class="value">{{ $order->email }}</span>
                        </div>
                        <div class="info-row">
                            <span class="label">Phone:</span>
                            <span class="value">{{ $order->phone }}</span>
                        </div>
                        <div class="info-row">
                            <span class="label">Delivery Address:</span>
                            <span class="value">{{ $order->address }}</span>
                        </div>
                        <div class="info-row">
                            <span class="label">Payment Method:</span>
                            <span class="value">Cash on Delivery</span>
                        </div>
                        <div class="info-row">
                            <span class="label">Order Status:</span>
                            <span class="value status-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                        </div>
                    </div>
                </div>

                <div class="order-items-summary">
                    <h3>Items Ordered</h3>
                    <div class="items-list">
                        @foreach($order->items as $item)
                        <div class="order-item">
                            <div class="item-image">
                                @if($item->product->primaryImage)
                                    <img src="{{ Storage::url($item->product->primaryImage->image_url) }}" alt="{{ $item->product->title }}">
                                @else
                                    <img src="{{ asset('assets/images/sample-image.jpg') }}" alt="{{ $item->product->title }}">
                                @endif
                            </div>
                            <div class="item-details">
                                <h4>{{ $item->product->title }}</h4>
                                <p>Quantity: {{ $item->quantity }}</p>
                                <p class="item-price">{{ $item->formatted_price }} each</p>
                            </div>
                            <div class="item-subtotal">
                                {{ $item->formatted_subtotal }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="order-total">
                        <div class="total-line">
                            <span>Subtotal:</span>
                            <span>₨{{ number_format($order->total_price, 2) }}</span>
                        </div>
                        <div class="total-line">
                            <span>Delivery:</span>
                            <span>Free</span>
                        </div>
                        <div class="total-line total-final">
                            <span>Total:</span>
                            <span>₨{{ number_format($order->total_price, 2) }}</span>
                        </div>
                    </div>
                </div>

                <div class="next-steps">
                    <h3>What's Next?</h3>
                    <ul>
                        <li>We'll process your order within 24 hours</li>
                        <li>You'll receive a confirmation call within 24-48 hours</li>
                        <li>Your order will be delivered within 3-5 business days</li>
                        <li>Payment will be collected upon delivery</li>
                    </ul>
                </div>

                <div class="success-actions">
                    <a href="{{ route('home') }}" class="btn btn--primary">Continue Shopping</a>
                    <a href="{{ route('products.index') }}" class="btn btn--secondary">View Products</a>
                </div>

                <div class="contact-info">
                    <h4>Need Help?</h4>
                    <p>If you have any questions about your order, please contact us:</p>
                    <div class="contact-details">
                        <p><strong>Phone:</strong> +92 325 454 5589</p>
                        <p><strong>Email:</strong> info@glowlin.pk</p>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- end s-menu__content -->

</section> <!-- end s-menu -->  
@endsection

@push('styles')
<style>
.success-container {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
    background: #fff;
    border-radius: 8px;
    padding: 3rem 2rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.success-icon {
    color: #28a745;
    margin-bottom: 1.5rem;
}

.success-container h1 {
    color: #2c5530;
    margin-bottom: 1rem;
    font-size: 2.5rem;
}

.success-message {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 2rem;
}

.order-details,
.order-items-summary,
.next-steps,
.contact-info {
    text-align: left;
    margin: 2rem 0;
    padding: 1.5rem;
    background: #f8f9fa;
    border-radius: 8px;
}

.order-details h3,
.order-items-summary h3,
.next-steps h3,
.contact-info h4 {
    margin-bottom: 1rem;
    color: #333;
    border-bottom: 2px solid #2c5530;
    padding-bottom: 0.5rem;
}

.info-row {
    display: flex;
    justify-content: space-between;
    padding: 0.5rem 0;
    border-bottom: 1px solid #eee;
}

.info-row:last-child {
    border-bottom: none;
}

.label {
    font-weight: bold;
    color: #333;
}

.value {
    color: #666;
}

.status-pending {
    color: #ffc107;
    font-weight: bold;
}

.status-processing {
    color: #17a2b8;
    font-weight: bold;
}

.status-completed {
    color: #28a745;
    font-weight: bold;
}

.status-cancelled {
    color: #dc3545;
    font-weight: bold;
}

.items-list {
    margin-bottom: 1.5rem;
}

.order-item {
    display: flex;
    gap: 1rem;
    align-items: center;
    padding: 1rem 0;
    border-bottom: 1px solid #eee;
}

.order-item:last-child {
    border-bottom: none;
}

.item-image {
    width: 60px;
    height: 60px;
    overflow: hidden;
    border-radius: 4px;
}

.item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.item-details {
    flex: 1;
}

.item-details h4 {
    margin-bottom: 0.25rem;
    color: #333;
}

.item-details p {
    margin-bottom: 0.25rem;
    color: #666;
    font-size: 0.9rem;
}

.item-price {
    font-weight: bold;
    color: #2c5530;
}

.item-subtotal {
    font-weight: bold;
    color: #2c5530;
    font-size: 1.1rem;
}

.order-total {
    border-top: 2px solid #2c5530;
    padding-top: 1rem;
}

.total-line {
    display: flex;
    justify-content: space-between;
    padding: 0.5rem 0;
}

.total-final {
    font-size: 1.2rem;
    font-weight: bold;
    color: #2c5530;
    margin-top: 0.5rem;
    padding-top: 0.5rem;
    border-top: 1px solid #ddd;
}

.next-steps ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.next-steps li {
    padding: 0.5rem 0;
    color: #666;
    position: relative;
    padding-left: 1.5rem;
}

.next-steps li:before {
    content: "→";
    position: absolute;
    left: 0;
    color: #2c5530;
    font-weight: bold;
}

.success-actions {
    margin: 2rem 0;
    display: flex;
    gap: 1rem;
    justify-content: center;
}

.success-actions .btn {
    padding: 0.75rem 2rem;
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

.contact-details {
    margin-top: 1rem;
}

.contact-details p {
    margin-bottom: 0.5rem;
    color: #666;
}

@media (max-width: 768px) {
    .success-container {
        padding: 2rem 1rem;
    }
    
    .success-container h1 {
        font-size: 2rem;
    }
    
    .success-actions {
        flex-direction: column;
    }
    
    .order-item {
        flex-direction: column;
        text-align: center;
    }
    
    .item-details {
        text-align: center;
    }
}
</style>
@endpush
