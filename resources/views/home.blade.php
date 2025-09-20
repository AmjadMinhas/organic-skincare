@extends('layouts.app')

@section('title', 'Glowlin - Organic Skincare for Pakistani Beauty')

@section('content')
<!-- # intro
================================================== -->
<section id="intro" class="container s-intro target-section">

    <div class="grid-block s-intro__content">

        <div class="intro-header">
            <div class="intro-header__overline">Welcome to</div>
            <h1 class="intro-header__big-type">
                {{-- <br> --}}
                Organixa Skincare
            </h1>
        </div> <!-- end intro-header -->

        {{-- @if($featuredProduct)
        <figure class="intro-pic-primary">
            @if($featuredProduct->primaryImage)
                <img src="{{ Storage::url($featuredProduct->primaryImage->image_url) }}" alt="{{ $featuredProduct->title }}">
            @else
                <img src="{{ asset('assets/images/intro-pic-primary.jpg') }}" alt="Featured Product">
            @endif
        </figure> <!-- end intro-pic-primary -->
        @else
        <figure class="intro-pic-primary">
            <img src="{{ asset('assets/images/intro-pic-primary.jpg') }}" alt="Featured Product">
        </figure> <!-- end intro-pic-primary -->
        @endif --}}
            
        <div class="intro-block-content">

            <div class="aesthetic-carousel">
                <div class="carousel-container">
                    <div class="carousel-track">
                        <div class="carousel-slide active">
                            <img src="{{ asset('assets/images/intro-pic-secondary.jpg') }}" alt="Organic Skincare - Natural Beauty">
                            <div class="slide-overlay">
                                <div class="slide-content">
                                    <h3>Natural Beauty</h3>
                                    <p>Embrace your natural glow</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-slide">
                            <img src="{{ asset('assets/images/about-pic-primary.jpg') }}" alt="Organic Ingredients">
                            <div class="slide-overlay">
                                <div class="slide-content">
                                    <h3>Pure Ingredients</h3>
                                    <p>Sourced from nature's finest</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-slide">
                            <img src="{{ asset('assets/images/intro-pic-primary.jpg') }}" alt="Glowing Skin">
                            <div class="slide-overlay">
                                <div class="slide-content">
                                    <h3>Radiant Results</h3>
                                    <p>Transform your skincare routine</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Navigation Dots -->
                    <div class="carousel-dots">
                        <button class="dot active" data-slide="0"></button>
                        <button class="dot" data-slide="1"></button>
                        <button class="dot" data-slide="2"></button>
                    </div>
                    
                    <!-- Navigation Arrows -->
                    <button class="carousel-arrow prev" aria-label="Previous slide">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="carousel-arrow next" aria-label="Next slide">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="intro-block-content__text-wrap">
                <p class="intro-block-content__text">
                    Discover the power of nature with our premium organic skincare products, 
                    specially crafted for Pakistani beauty. Experience radiant, healthy skin 
                    with our carefully selected natural ingredients.
                </p>
                
                <ul class="intro-block-content__social">
                    <li><a href="#0">FB</a></li>
                    <li><a href="#0">IG</a></li>
                    <li><a href="#0">PI</a></li>
                    <li><a href="#0">X</a></li>
                </ul>
            </div> <!-- end intro-block-content__social -->   

        </div> <!-- end intro-block-content -->

        <div class="intro-scroll">
            <a href="#products">                            
                <span class="intro-scroll__circle-text"></span>
                <span class="intro-scroll__text u-screen-reader-text">Scroll Down</span>
                <div class="intro-scroll__icon">
                    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m5.214 14.522s4.505 4.502 6.259 6.255c.146.147.338.22.53.22s.384-.073.53-.22c1.754-1.752 6.249-6.244 6.249-6.244.144-.144.216-.334.217-.523 0-.193-.074-.386-.221-.534-.293-.293-.766-.294-1.057-.004l-4.968 4.968v-14.692c0-.414-.336-.75-.75-.75s-.75.336-.75.75v14.692l-4.979-4.978c-.289-.289-.761-.287-1.054.006-.148.148-.222.341-.221.534 0 .189.071.377.215.52z" fill-rule="nonzero"/></svg>
                </div>
            </a>
        </div> <!-- end intro-scroll -->

    </div> <!-- grid-block -->            

</section> <!-- end s-intro -->

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
                    Premium organic skincare products made with love for Pakistani beauty. 
                    Each product is carefully crafted using natural ingredients to give you 
                    the radiant, healthy skin you deserve.
                </p>
                
                <a href="{{ route('products.index') }}" class="btn btn--primary">Shop Now</a>
            </div>

        </div> <!-- end s-menu__content-start -->

        <div class="column xl-6 lg-6 md-12 s-menu__content-end">

            <div class="tab-content menu-block">
                <div class="menu-block__group tab-content__item">
                    <h6 class="menu-block__cat-name">Featured Products</h6>

                    @if($products->count() > 0)
                    <ul class="menu-list">
                        @foreach($products as $product)
                        <li class="menu-list__item">
                            <div class="menu-list__item-desc">                                            
                                <h4>{{ $product->title }}</h4>
                                <p>{{ Str::limit($product->description, 100) }}</p>
                            </div>
                            <div class="menu-list__item-price">
                                <span>{{ $product->formatted_price }}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul> <!-- end menu-list -->
                    @else
                    <div class="menu-list__item">
                        <div class="menu-list__item-desc">
                            <h4>Glowlin Hydrating Clay Mask</h4>
                            <p>Our signature product - a premium hydrating clay mask that deeply cleanses and moisturizes your skin, leaving it soft, supple, and radiant.</p>
                        </div>
                        <div class="menu-list__item-price">
                            <span>₨2,500</span>
                        </div>
                    </div>
                    @endif
                </div> <!-- end tab-content__item -->
            </div> <!-- menu-block -->

        </div> <!-- end s-menu__content-end -->

    </div> <!-- end s-menu__content -->

</section> <!-- end s-menu -->  

<!-- # about
================================================== -->
<section id="about" class="container s-about target-section">

    <div class="row s-about__content">

        <div class="column xl-4 lg-5 md-12 s-about__content-start">

            <div class="section-header" data-num="02">
                <h2 class="text-display-title">Our Story</h2>
            </div>  

            <figure class="about-pic-primary">
                <img src="{{ asset('assets/images/about-pic-primary.jpg') }}" alt="Our Story">
            </figure>

        </div> <!-- end s-about__content-start -->

        <div class="column xl-6 lg-6 md-12 s-about__content-end">                   
            <p>
            At Glowlin, we believe that beauty comes from within and is enhanced by nature's finest ingredients. 
            Our journey began with a simple mission: to provide Pakistani women with premium organic skincare 
            products that celebrate their natural beauty.
            </p>

            <p>
            Every product in our collection is carefully formulated using time-tested natural ingredients, 
            free from harmful chemicals and artificial additives. We understand the unique needs of Pakistani 
            skin and climate, which is why our products are specifically designed to provide optimal care 
            and protection.
            </p>

            <p>
            From our signature Glowlin Hydrating Clay Mask to our complete skincare range, each product 
            is crafted with love, attention to detail, and a commitment to your skin's health and radiance. 
            Join thousands of satisfied customers who have discovered the power of organic skincare.
            </p>

            <p>
            Experience the difference that nature can make in your skincare routine. Your skin deserves 
            the best, and that's exactly what we provide at Glowlin.
            </p>

        </div> <!--end column -->
        
    </div> <!-- end s-about__content-end -->
    
</section> <!-- end s-about -->   

<!-- # testimonials
================================================== -->
<section id="testimonials" class="container s-testimonials">

    <div class="row s-testimonials__content">
        <div class="column xl-12">

            <h3 class="testimonials-title u-text-center">What Our Customers Say</h3>
    
            <div class="swiper-container testimonials-slider">    
                <div class="swiper-wrapper">

                    <div class="testimonials-slider__slide swiper-slide">
                        <div class="testimonials-slider__author">
                            <img src="{{ asset('assets/images/avatars/user-02.jpg') }}" alt="Author image" class="testimonials-slider__avatar">
                            <cite class="testimonials-slider__cite">
                                Aisha Khan
                                <span>Karachi, Pakistan</span>
                            </cite>
                        </div>
                        <p>
                        The Glowlin Hydrating Clay Mask has transformed my skincare routine! My skin feels so soft and 
                        hydrated after each use. I love that it's made with natural ingredients and perfect for Pakistani weather.
                        </p>
                    </div> <!-- end testimonials-slider__slide -->
        
                    <div class="testimonials-slider__slide swiper-slide">
                        <div class="testimonials-slider__author">
                            <img src="{{ asset('assets/images/avatars/user-03.jpg') }}" alt="Author image" class="testimonials-slider__avatar">
                            <cite class="testimonials-slider__cite">
                                Fatima Ahmed
                                <span>Lahore, Pakistan</span>
                            </cite>
                        </div>
                        <p>
                        Finally found organic skincare products that work perfectly for my skin type! The quality is 
                        exceptional and the results speak for themselves. Highly recommended for anyone looking for 
                        natural beauty solutions.
                        </p>
                    </div> <!-- end testimonials-slider__slide -->
        
                    <div class="testimonials-slider__slide swiper-slide">
                        <div class="testimonials-slider__author">
                            <img src="{{ asset('assets/images/avatars/user-01.jpg') }}" alt="Author image" class="testimonials-slider__avatar">
                            <cite class="testimonials-slider__cite">
                                Zara Sheikh
                                <span>Islamabad, Pakistan</span>
                            </cite>
                        </div>
                        <p>
                        Glowlin products have become an essential part of my daily routine. The natural ingredients 
                        make such a difference, and I love supporting a Pakistani brand that truly cares about 
                        women's beauty and wellness.
                        </p>
                    </div> <!-- end testimonials-slider__slide -->

                </div> <!-- end swiper-wrapper -->
    
                <div class="swiper-pagination"></div>
    
            </div> <!-- end testimonials-slider -->
    
        </div> <!-- end column -->
    </div> <!-- end s-testimonials__content -->

</section> <!-- end s-testimonials --> 
@endsection

@push('styles')
<style>
/* Aesthetic Carousel Styles */
.aesthetic-carousel {
    position: relative;
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 
        0 20px 60px rgba(74, 156, 107, 0.15),
        0 8px 32px rgba(184, 148, 110, 0.1);
}

.carousel-container {
    position: relative;
    width: 100%;
    height: 400px;
    overflow: hidden;
    border-radius: 24px;
    background: linear-gradient(135deg, #f0f8f4 0%, #faf8f5 100%);
}

.carousel-track {
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.carousel-slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transform: translateX(100px) scale(0.95);
    transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    border-radius: 24px;
    overflow: hidden;
}

.carousel-slide.active {
    opacity: 1;
    transform: translateX(0) scale(1);
    z-index: 2;
}

.carousel-slide.prev {
    opacity: 0.7;
    transform: translateX(-100px) scale(0.9);
    z-index: 1;
}

.carousel-slide.next {
    opacity: 0.7;
    transform: translateX(100px) scale(0.9);
    z-index: 1;
}

.carousel-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.8s ease;
    filter: brightness(1.1) contrast(1.05);
}

.carousel-slide:hover img {
    transform: scale(1.05);
}

.slide-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(
        transparent 0%, 
        rgba(58, 41, 29, 0.3) 40%, 
        rgba(58, 41, 29, 0.8) 100%
    );
    padding: 3rem 2rem 2rem;
    transform: translateY(100%);
    transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.carousel-slide.active .slide-overlay {
    transform: translateY(0);
}

.slide-content h3 {
    color: #fefcf9;
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    font-family: 'Playfair Display', serif;
}

.slide-content p {
    color: rgba(254, 252, 249, 0.9);
    font-size: 0.95rem;
    text-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
}

/* Navigation Dots - Organic Theme */
.carousel-dots {
    position: absolute;
    bottom: 25px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 16px;
    z-index: 10;
    background: rgba(254, 252, 249, 0.15);
    backdrop-filter: blur(20px);
    padding: 12px 20px;
    border-radius: 50px;
    border: 1px solid rgba(254, 252, 249, 0.2);
    box-shadow: 
        0 8px 32px rgba(58, 41, 29, 0.15),
        0 0 0 1px rgba(74, 156, 107, 0.1) inset;
}

.dot {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    border: none;
    background: rgba(254, 252, 249, 0.4);
    cursor: pointer;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    position: relative;
    overflow: hidden;
}

.dot::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 8px;
    height: 8px;
    background: linear-gradient(135deg, #b8946e, #a67d5c);
    border-radius: 50%;
    opacity: 0;
    transition: all 0.3s ease;
}

.dot:hover {
    background: rgba(254, 252, 249, 0.6);
    transform: scale(1.15);
    box-shadow: 
        0 4px 16px rgba(184, 148, 110, 0.3),
        0 0 0 2px rgba(184, 148, 110, 0.2);
}

.dot:hover::before {
    opacity: 0.7;
    transform: translate(-50%, -50%) scale(1.2);
}

.dot.active {
    background: linear-gradient(135deg, #4a9c6b, #3d7f56);
    transform: scale(1.2);
    box-shadow: 
        0 0 0 3px rgba(74, 156, 107, 0.3),
        0 6px 20px rgba(74, 156, 107, 0.4),
        0 0 0 1px rgba(254, 252, 249, 0.2) inset;
}

.dot.active::before {
    background: rgba(254, 252, 249, 0.9);
    opacity: 1;
    width: 6px;
    height: 6px;
    transform: translate(-50%, -50%) scale(1);
    box-shadow: 0 0 8px rgba(254, 252, 249, 0.5);
}

/* Navigation Arrows */
.carousel-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 50px;
    height: 50px;
    border: none;
    border-radius: 50%;
    background: rgba(254, 252, 249, 0.9);
    color: #3a1f17;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    backdrop-filter: blur(20px);
    box-shadow: 
        0 8px 24px rgba(58, 41, 29, 0.15),
        0 0 0 1px rgba(74, 156, 107, 0.1) inset;
    z-index: 10;
}

.carousel-arrow:hover {
    background: linear-gradient(135deg, #4a9c6b, #3d7f56);
    color: white;
    transform: translateY(-50%) scale(1.1);
    box-shadow: 
        0 12px 32px rgba(74, 156, 107, 0.3),
        0 0 0 1px rgba(74, 156, 107, 0.2) inset;
}

.carousel-arrow.prev {
    left: 20px;
}

.carousel-arrow.next {
    right: 20px;
}

.carousel-arrow svg {
    width: 24px;
    height: 24px;
}

/* Auto-play indicator */
.carousel-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #4a9c6b 0%, #4a9c6b 0%);
    z-index: 10;
    animation: autoplayProgress 5s linear infinite;
}

@keyframes autoplayProgress {
    0% { background: linear-gradient(90deg, #4a9c6b 0%, transparent 0%); }
    100% { background: linear-gradient(90deg, #4a9c6b 100%, transparent 100%); }
}

/* Responsive Design */
@media (max-width: 768px) {
    .aesthetic-carousel {
        max-width: 100%;
        margin: 0 1rem;
    }
    
    .carousel-container {
        height: 300px;
        border-radius: 16px;
    }
    
    .carousel-slide {
        border-radius: 16px;
    }
    
    .slide-overlay {
        padding: 2rem 1.5rem 1.5rem;
    }
    
    .slide-content h3 {
        font-size: 1.2rem;
    }
    
    .slide-content p {
        font-size: 0.9rem;
    }
    
    .carousel-arrow {
        width: 40px;
        height: 40px;
    }
    
    .carousel-arrow.prev {
        left: 15px;
    }
    
    .carousel-arrow.next {
        right: 15px;
    }
}

/* Smooth entrance animation */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.aesthetic-carousel {
    animation: slideIn 1s ease-out;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.aesthetic-carousel');
    const track = carousel.querySelector('.carousel-track');
    const slides = carousel.querySelectorAll('.carousel-slide');
    const dots = carousel.querySelectorAll('.dot');
    const prevBtn = carousel.querySelector('.prev');
    const nextBtn = carousel.querySelector('.next');
    
    let currentSlide = 0;
    const totalSlides = slides.length;
    let autoplayInterval;
    
    // Initialize carousel
    function init() {
        updateCarousel();
        startAutoplay();
        
        // Add event listeners
        prevBtn.addEventListener('click', () => {
            prevSlide();
            resetAutoplay();
        });
        
        nextBtn.addEventListener('click', () => {
            nextSlide();
            resetAutoplay();
        });
        
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                goToSlide(index);
                resetAutoplay();
            });
        });
        
        // Pause on hover
        carousel.addEventListener('mouseenter', stopAutoplay);
        carousel.addEventListener('mouseleave', startAutoplay);
        
        // Touch/swipe support
        let startX = 0;
        let isDragging = false;
        
        carousel.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            isDragging = true;
            stopAutoplay();
        });
        
        carousel.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            e.preventDefault();
        });
        
        carousel.addEventListener('touchend', (e) => {
            if (!isDragging) return;
            isDragging = false;
            
            const endX = e.changedTouches[0].clientX;
            const diff = startX - endX;
            
            if (Math.abs(diff) > 50) {
                if (diff > 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
            }
            
            startAutoplay();
        });
    }
    
    function updateCarousel() {
        slides.forEach((slide, index) => {
            slide.classList.remove('active', 'prev', 'next');
            
            if (index === currentSlide) {
                slide.classList.add('active');
            } else if (index === currentSlide - 1 || (currentSlide === 0 && index === totalSlides - 1)) {
                slide.classList.add('prev');
            } else if (index === currentSlide + 1 || (currentSlide === totalSlides - 1 && index === 0)) {
                slide.classList.add('next');
            }
        });
        
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
    }
    
    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateCarousel();
    }
    
    function goToSlide(index) {
        currentSlide = index;
        updateCarousel();
    }
    
    function startAutoplay() {
        autoplayInterval = setInterval(nextSlide, 5000);
    }
    
    function stopAutoplay() {
        clearInterval(autoplayInterval);
    }
    
    function resetAutoplay() {
        stopAutoplay();
        startAutoplay();
    }
    
    // Initialize the carousel
    init();
});
</script>
@endpush
