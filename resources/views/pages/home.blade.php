@extends('layout')
@section('content')
<!-- Slider Start -->
        <div class="slider-area">
            <div class="slider-active owl-dot-style owl-carousel">
                <div class="single-slider ptb-240 bg-img" style="background-image:url(public/frontend/assets/img/slider/slider-1-3.jpg);">
                    <div class="container">
                        <div class="slider-content slider-animated-1">
                            <h1 class="animated">Want to stay Beauty ?</h1>
                            <h1 class="animated">Use <span class="theme-color">Innisfree</span>.</h1>
                            <p>As the #1 beauty brand in Korea, innisfree is at the forefront of the global movement towards K-Beauty.</p>
                        </div>
                    </div>
                </div>
                <div class="single-slider ptb-240 bg-img" style="background-image:url(public/frontend/assets/img/slider/slider-1-4.jpg);">
                    <div class="container">
                        <div class="slider-content slider-animated-1">
                            <h1 class="animated">Want to stay Beauty ?</h1>
                            <h1 class="animated">Use <span class="theme-color">Innisfree</span>.</h1>
                            <p>As the #1 beauty brand in Korea, innisfree is at the forefront of the global movement towards K-Beauty.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider End -->
        <!-- Product Area Start -->
        <div class="product-area bg-image-1 pt-100 pb-95">
            <div class="container">
                <div class="featured-product-active hot-flower owl-carousel product-nav">
                    
                </div>
            </div>
        </div>
        <!-- Product Area End -->
        <!-- Banner Start -->
        <div class="banner-area pt-100 pb-70">
            <div class="container">
                <div class="banner-wrap">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="single-banner img-zoom mb-30">
                                <a href="#">
                                    <img src="{{asset('public/frontend/assets/img/banner/banner-3.png')}}" alt="">
                                </a>
                                <div class="banner-content">
                                    <h4>-50% Sale</h4>
                                    <h5>Summer Vacation</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-banner img-zoom mb-30">
                                <a href="#">
                                    <img src="{{asset('public/frontend/assets/img/banner/banner-4.png')}}" alt="">
                                </a>
                                <div class="banner-content">
                                    <h4>-20% Sale</h4>
                                    <h5>Winter Vacation</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner End -->
        <!-- New Products Start -->
        <div class="product-area gray-bg pt-90 pb-65">
            <div class="container">
                <div class="product-top-bar section-border mb-55">
                    <div class="section-title-wrap text-center">
                        <h3 class="section-title">New Products</h3>
                    </div>
                </div>
                <div class="tab-content jump">
                    <div class="tab-pane active">
                        <div class="featured-product-active owl-carousel product-nav">
                            @foreach($all_product as $key => $product)
                            <div class="product-wrapper-single">
                                
                                <div class="product-wrapper mb-30">
                                    <form>
                                    @csrf
                                    <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                    <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                    <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">
                                    <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                    <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                    <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                                    <div class="product-img">
                                        <a href="{{URL::to('/product-details/'.$product->product_id)}}">
                                            <img alt="" src="{{URL::to('public/upload/product/'.$product->product_image)}}">
                                        </a>
                                        {{-- <span>-30%</span>
                                        <div class="product-action">
                                            <a class="action-wishlist" href="#" title="Wishlist">
                                                <i class="ion-android-favorite-outline"></i>
                                            </a>
                                            <a class="action-cart" href="#" title="Add To Cart">
                                                <i class="ion-ios-shuffle-strong"></i>
                                            </a>
                                            <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                                <i class="ion-ios-search-strong"></i>
                                            </a>
                                        </div> --}}
                                    </div>
                                    <div class="product-content text-left">
                                        <div class="product-hover-style">
                                            <div class="product-title">
                                                <h4>
                                                    <a href="{{URL::to('/product-details/'.$product->product_id)}}">{{$product->product_name}}</a>
                                                </h4>
                                            </div>
                                            <div class="cart-hover">
                                                {{-- <h4><a href="product-details.html">+ Add to cart</a></h4> --}}
                                                <button type="button" class="btn btn-outline-success add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">+ Add to cart</button>
                                            </div>
                                        </div>
                                        <div class="product-price-wrapper">
                                            <span>{{number_format($product->product_price).'$'}}</span>
                                            {{-- <span class="product-price-old">$120.00 </span> --}}
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Products End -->
        <!-- Testimonial Area Start -->
        <div class="testimonials-area bg-img pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="testimonial-active owl-carousel">
                            <div class="single-testimonial text-center">
                                <div class="testimonial-img">
                                    <img alt="" src="{{asset('public/frontend/assets/img/icon-img/testi.png')}}">
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt ut labore</p>
                                <h4>Gregory Perkins</h4>
                                <h5>Customer</h5>
                            </div>
                            <div class="single-testimonial text-center">
                                <div class="testimonial-img">
                                    <img alt="" src="{{asset('public/frontend/assets/img/icon-img/testi.png')}}">
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt ut labore</p>
                                <h4>Khabuli Teop</h4>
                                <h5>Marketing</h5>
                            </div>
                            <div class="single-testimonial text-center">
                                <div class="testimonial-img">
                                    <img alt="" src="{{asset('public/frontend/assets/img/icon-img/testi.png')}}">
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eiusmod tempor incididunt ut labore </p>
                                <h4>Lotan Jopon</h4>
                                <h5>Admin</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial Area End -->
        <!-- News Area Start -->
        <div class="blog-area bg-image-1 pt-90 pb-70">
            <div class="container">
                <div class="product-top-bar section-border mb-55">
                    <div class="section-title-wrap text-center">
                                            </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-single mb-30">
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-single mb-30">
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-single mb-30">
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- News Area End -->
        <!-- Newsletter Araea Start -->
        <div class="newsletter-area bg-image-2 pt-90 pb-100">
            <div class="container">
                <div class="product-top-bar section-border mb-45">
                    <div class="section-title-wrap text-center">
                        <h3 class="section-title">Join to our Newsletter</h3>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-lg-6 col-md-10 col-md-auto">
                        <div class="footer-newsletter">
                             <div id="mc_embed_signup" class="subscribe-form">
                                <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll" class="mc-form">
                                        <input type="email" value="" name="EMAIL" class="email" placeholder="Your Email Address*" required>
                                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                        <div class="submit-button">
                                            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter Araea End -->
@endsection