@extends('layouts.app')

@section('title', 'Organixa')

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

            <div class="simple-carousel">
                <div class="carousel-images">
                    <img src="{{ asset('assets/images/Glowlin Mask.jpg') }}" alt="Organic Skincare" class="carousel-img active">
                    <img src="{{ asset('assets/images/Puresa Mask.jpg') }}" alt="Natural Ingredients" class="carousel-img">
                    <img src="{{ asset('assets/images/Hennova.jpg') }}" alt="Glowing Skin" class="carousel-img">
                </div>
                <div class="carousel-nav">
                    <span class="nav-dot active" data-slide="0"></span>
                    <span class="nav-dot" data-slide="1"></span>
                    <span class="nav-dot" data-slide="2"></span>
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
.simple-carousel {
    position: relative;
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
}

.carousel-images {
    position: relative;
    width: 100%;
    height: 350px;
    overflow: hidden;
    border-radius: 16px;
}

.carousel-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0;
    transition: opacity 0.5s ease;
}

.carousel-img.active {
    opacity: 1;
}

.carousel-nav {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 8px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.simple-carousel:hover .carousel-nav {
    opacity: 1;
}

.nav-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: rgba(254, 252, 249, 0.5);
    cursor: pointer;
    transition: all 0.3s ease;
}

.nav-dot:hover {
    background: rgba(254, 252, 249, 0.8);
}

.nav-dot.active {
    background: #4a9c6b;
    box-shadow: 0 0 0 2px rgba(74, 156, 107, 0.3);
}

@media (max-width: 768px) {
    .carousel-images {
        height: 280px;
        border-radius: 12px;
    }
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.simple-carousel');
    const images = carousel.querySelectorAll('.carousel-img');
    const dots = carousel.querySelectorAll('.nav-dot');
    
    let currentSlide = 0;
    const totalSlides = images.length;
    
    function showSlide(index) {
        images.forEach(img => img.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        images[index].classList.add('active');
        dots[index].classList.add('active');
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }
    
    // Auto-play every 4 seconds
    setInterval(nextSlide, 4000);
    
    // Click navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });
});
</script>
@endpush

