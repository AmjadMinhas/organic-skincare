@extends('layouts.app')

@section('title', 'Products - Glowlin Organic Skincare')

@section('content')
<!-- # products
================================================== -->
<section id="products" class="container s-menu target-section">

    <div class="row s-menu__content">
        
        <div class="column xl-4 lg-5 md-12 s-menu__content-start">

            <div class="section-header" data-num="01">
                <h2 class="text-display-title" style="
    background: linear-gradient(135deg, #65443a, #755148, #51221c);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    color: transparent;
">Our Products</h2>

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
                            <a href="{{ route('products.show', $product) }}" class="btn btn--primary">
                                <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                View Details
                            </a>
                            <button type="button" class="btn btn--cart add-to-cart-btn" data-product-id="{{ $product->id }}" data-product-name="{{ $product->title }}">
                                <svg class="btn-icon cart-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 22C9.55228 22 10 21.5523 10 21C10 20.4477 9.55228 20 9 20C8.44772 20 8 20.4477 8 21C8 21.5523 8.44772 22 9 22Z"></path>
                                    <path d="M20 22C20.5523 22 21 21.5523 21 21C21 20.4477 20.5523 20 20 20C19.4477 20 19 20.4477 19 21C19 21.5523 19.4477 22 20 22Z"></path>
                                    <path d="M1 1H5L7.68 14.39C7.77144 14.8504 8.02191 15.264 8.38755 15.5583C8.75318 15.8526 9.2107 16.009 9.68 16H19.4C19.8693 16.009 20.3268 15.8526 20.6925 15.5583C21.0581 15.264 21.3086 14.8504 21.4 14.39L23 6H6"></path>
                                    <path class="cart-plus" d="M12 8V16M8 12H16" stroke-width="2.5" opacity="0"></path>
                                </svg>
                                <span class="btn-text">Add to Cart</span>
                                <span class="btn-loading" style="display: none;">
                                    <svg class="loading-spinner" viewBox="0 0 24 24" fill="none">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" opacity="0.25"></circle>
                                        <path fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" opacity="0.75"></path>
                                    </svg>
                                </span>
                            </button>
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
    /* Enhanced Organic Skincare Product Cards */
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
    gap: 2.8rem;
    margin-top: 3rem;
    padding: 1rem;
}

.product-item {
    position: relative;
    background: linear-gradient(145deg, rgba(255, 251, 245, 0.95), rgba(250, 245, 235, 0.9));
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 2px solid transparent;
    background-clip: padding-box;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 
        0 12px 40px rgba(139, 69, 19, 0.08),
        0 4px 12px rgba(160, 82, 45, 0.05),
        0 0 0 1px rgba(210, 180, 140, 0.1) inset;
    transition: all 0.5s cubic-bezier(0.23, 1, 0.320, 1);
    transform-style: preserve-3d;
}

.product-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent, rgba(34, 139, 34, 0.6), rgba(46, 125, 50, 0.4), transparent);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.product-item:hover::before {
    opacity: 1;
}

.product-item:hover {
    transform: translateY(-12px) rotateX(3deg) scale(1.02);
    box-shadow: 
        0 25px 60px rgba(139, 69, 19, 0.15),
        0 8px 25px rgba(34, 139, 34, 0.1),
        0 0 0 1px rgba(46, 125, 50, 0.15) inset,
        0 0 80px rgba(34, 139, 34, 0.08);
    border: 2px solid rgba(46, 125, 50, 0.2);
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
    color: #2e4a1a;
    font-size: 1.4rem;
    font-weight: 700;
    text-shadow: 0 2px 8px rgba(46, 74, 26, 0.1);
    transition: all 0.3s ease;
    letter-spacing: 0.3px;
}

.product-item:hover .product-info h3 {
    color: #228b22;
    text-shadow: 0 0 25px rgba(34, 139, 34, 0.4);
    transform: translateY(-1px);
}

.product-info p {
    color: #6e503a;
    margin-bottom: 1.5rem;
    font-size: 0.95rem;
    line-height: 1.6;
    text-shadow: 0 1px 3px rgba(110, 80, 58, 0.1);
}

.product-price {
    font-size: 1.6rem;
    font-weight: 800;
    background: linear-gradient(135deg, #228b22, #32cd32, #20b2aa);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 1.8rem;
    text-shadow: 0 0 30px rgba(34, 139, 34, 0.3);
    filter: drop-shadow(0 3px 6px rgba(34, 139, 34, 0.15));
    letter-spacing: 0.5px;
}

.product-actions {
    display: flex;
    gap: 0.8rem;
    margin-top: 1.5rem;
}

.product-actions .btn {
    flex: 1;
    padding: 1rem 1.8rem;
    border: none;
    border-radius: 16px;
    font-size: 0.95rem;
    font-weight: 700;
    cursor: pointer;
    text-decoration: none;
    text-align: center;
    transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
    position: relative;
    overflow: hidden;
    backdrop-filter: blur(15px);
    text-transform: uppercase;
    letter-spacing: 0.8px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.6rem;
    min-height: 50px;
}

.btn-icon {
    width: 18px;
    height: 18px;
    transition: all 0.3s ease;
}

.btn--primary {
    background: linear-gradient(135deg, #228b22, #32cd32, #20b2aa);
    color: white;
    border: 2px solid rgba(34, 139, 34, 0.3);
    box-shadow: 
        0 6px 20px rgba(34, 139, 34, 0.25),
        0 2px 8px rgba(50, 205, 50, 0.15),
        0 0 0 1px rgba(255, 255, 255, 0.1) inset;
}

.btn--primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
    transition: left 0.6s ease;
}

.btn--primary:hover::before {
    left: 100%;
}

.btn--primary:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 
        0 12px 35px rgba(34, 139, 34, 0.35),
        0 4px 15px rgba(50, 205, 50, 0.2),
        0 0 0 1px rgba(255, 255, 255, 0.15) inset;
    background: linear-gradient(135deg, #32cd32, #228b22, #20b2aa);
}

.btn--primary:hover .btn-icon {
    transform: scale(1.1) rotate(5deg);
}

/* New Enhanced Cart Button */
.btn--cart {
    background: linear-gradient(135deg, #4e342e, #5d4037, #3e2723);
    color: white;
    border: 2px solid rgba(255, 107, 53, 0.3);
    backdrop-filter: blur(15px);
    box-shadow: 
        0 6px 20px rgba(255, 107, 53, 0.25),
        0 2px 8px rgba(247, 147, 30, 0.15),
        0 0 0 1px rgba(255, 255, 255, 0.1) inset;
    font-weight: 800;
}

.btn--cart::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    transition: left 0.6s ease;
}

.btn--cart:hover::before {
    left: 100%;
}

.btn--cart:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 
        0 12px 35px rgba(255, 107, 53, 0.35),
        0 4px 15px rgba(247, 147, 30, 0.25),
        0 0 0 1px rgba(255, 255, 255, 0.2) inset;
        background: linear-gradient(135deg, #65443a, #755148, #51221c);
}

.btn--cart:hover .cart-icon {
    animation: cartBounce 0.6s ease;
}

.btn--cart:hover .cart-plus {
    opacity: 1;
    animation: plusPulse 0.4s ease 0.2s;
}

.btn--cart:active {
    transform: translateY(-1px) scale(1.02);
}

.btn--cart.loading {
    pointer-events: none;
    opacity: 0.8;
}

.btn--cart.loading .btn-text,
.btn--cart.loading .cart-icon {
    opacity: 0;
}

.btn--cart.loading .btn-loading {
    display: flex !important;
    align-items: center;
    justify-content: center;
}

.loading-spinner {
    width: 20px;
    height: 20px;
    animation: spin 1s linear infinite;
}

.btn--cart.success {
    background: linear-gradient(135deg, #4caf50, #45a049, #66bb6a);
    border-color: rgba(76, 175, 80, 0.3);
}

.btn--cart.success .cart-icon {
    animation: checkmark 0.5s ease;
}

.no-products {
    text-align: center;
    padding: 4rem 2rem;
    background: linear-gradient(135deg, #fefcf9 0%, #faf8f5 100%);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    border: 1px solid rgba(184, 148, 110, 0.2);
    margin: 2rem 0;
}

.no-products h3 {
    color: #3a291d;
    margin-bottom: 1rem;
    font-size: 1.5rem;
}

.no-products p {
    color: #6e503a;
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
    color: var(--color-headings);
}

.intro-block-content__text {
    color: var(--color-text);
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

/* Enhanced Animations */
@keyframes cartBounce {
    0%, 20%, 60%, 100% { transform: translateY(0) scale(1); }
    40% { transform: translateY(-4px) scale(1.1); }
    80% { transform: translateY(-2px) scale(1.05); }
}

@keyframes plusPulse {
    0% { opacity: 0; transform: scale(0.8); }
    50% { opacity: 1; transform: scale(1.2); }
    100% { opacity: 1; transform: scale(1); }
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes checkmark {
    0% { transform: scale(0.8); }
    50% { transform: scale(1.2); }
    100% { transform: scale(1); }
}

/* Cart Counter Animation */
@keyframes counterPulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.3); background-color: #ff6b35; }
    100% { transform: scale(1); }
}

.cart-count {
    display: inline-block;
    background: #228b22;
    color: white;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    line-height: 24px;
    font-size: 12px;
    font-weight: bold;
    text-align: center;
    margin-left: 6px;
    transition: all 0.3s ease;
}

.cart-count.updated {
    animation: counterPulse 0.6s ease;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add to cart functionality
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const productId = this.dataset.productId;
            const productName = this.dataset.productName;
            const btnText = this.querySelector('.btn-text');
            const btnLoading = this.querySelector('.btn-loading');
            
            // Add loading state
            this.classList.add('loading');
            this.disabled = true;
            
            // Create form data
            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            
            // Send AJAX request
            fetch(`/cart/add/${productId}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Success state
                    this.classList.remove('loading');
                    this.classList.add('success');
                    btnText.textContent = 'Added!';
                    
                    // Update cart counter
                    updateCartCounter(data.cartCount);
                    
                    // Show success message
                    showNotification(`${productName} added to cart!`, 'success');
                    
                    // Reset button after 2 seconds
                    setTimeout(() => {
                        this.classList.remove('success');
                        btnText.textContent = 'Add to Cart';
                        this.disabled = false;
                    }, 2000);
                } else {
                    throw new Error(data.message || 'Failed to add to cart');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                this.classList.remove('loading');
                this.disabled = false;
                showNotification('Failed to add to cart. Please try again.', 'error');
            });
        });
    });
    
    // Update cart counter
    function updateCartCounter(count) {
        const cartCountElement = document.querySelector('.cart-count');
        if (cartCountElement) {
            cartCountElement.textContent = `(${count})`;
            cartCountElement.classList.add('updated');
            setTimeout(() => {
                cartCountElement.classList.remove('updated');
            }, 600);
        } else if (count > 0) {
            // Create cart counter if it doesn't exist
            const cartLink = document.querySelector('a[href*="cart"]');
            if (cartLink) {
                const countSpan = document.createElement('span');
                countSpan.className = 'cart-count updated';
                countSpan.textContent = `(${count})`;
                cartLink.appendChild(countSpan);
                setTimeout(() => {
                    countSpan.classList.remove('updated');
                }, 600);
            }
        }
    }
    
    // Notification system
    function showNotification(message, type = 'success') {
        // Remove existing notifications
        const existingNotification = document.querySelector('.ajax-notification');
        if (existingNotification) {
            existingNotification.remove();
        }
        
        // Create notification
        const notification = document.createElement('div');
        notification.className = `ajax-notification ajax-notification--${type}`;
        notification.innerHTML = `
            <div class="notification-content">
                <svg class="notification-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    ${type === 'success' 
                        ? '<path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
                        : '<path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
                    }
                </svg>
                <span>${message}</span>
            </div>
        `;
        
        // Add styles
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: ${type === 'success' ? 'linear-gradient(135deg, #4caf50, #45a049)' : 'linear-gradient(135deg, #f44336, #d32f2f)'};
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            z-index: 10000;
            transform: translateX(100%);
            transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
        `;
        
        notification.querySelector('.notification-content').style.cssText = `
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            font-size: 0.9rem;
        `;
        
        notification.querySelector('.notification-icon').style.cssText = `
            width: 20px;
            height: 20px;
        `;
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 10);
        
        // Auto remove
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.remove();
                }
            }, 400);
        }, 3000);
    }
});
</script>
@endpush
