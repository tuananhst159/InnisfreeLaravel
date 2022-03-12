@extends('layout')
@section('content')  
<!-- Breadcrumb Area Start -->
        @foreach($product_details as $key => $value)
        <div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>{{$value->product_name}}</h3>
                    <ul>
                        <li><a href="{{URL::to('/home')}}">Home</a></li>
                        <li class="active">{{$value->product_name}}</li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
		<!-- Product Deatils Area Start -->
        <div class="product-details pt-100 pb-95">
            <div class="container">
                <form>
                    @csrf
                    <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                    <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                    <input type="hidden" value="{{$value->product_quantity}}" class="cart_product_quantity_{{$value->product_id}}">
                    <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                    <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                    
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="product-details-img">
                            <img class="zoompro" src="{{URL::to('public/upload/product/'.$value->product_image)}}" data-zoom-image="{{URL::to('public/upload/product/'.$value->product_image)}}" alt="zoom"/>
                            <div id="gallery" class="mt-20 product-dec-slider owl-carousel">
                                <a data-image="{{asset('public/frontend/assets/img/product-details/product-detalis-l1.jpg')}}" data-zoom-image="{{asset('public/frontend/assets/img/product-details/product-detalis-bl1.jpg')}}">
                                    <img src="{{asset('public/frontend/assets/img/product-details/product-detalis-s1.jpg')}}" alt="">
                                </a>
                            </div>
                            {{-- <span>-29%</span> --}}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="product-details-content">
                            <h4>{{$value->product_name}}</h4>
                            <div class="rating-review">
                                <div class="pro-dec-rating">
                                    <i class="ion-android-star-outline theme-star"></i>
                                    <i class="ion-android-star-outline theme-star"></i>
                                    <i class="ion-android-star-outline theme-star"></i>
                                    <i class="ion-android-star-outline theme-star"></i>
                                    <i class="ion-android-star-outline"></i>
                                </div>
                                <div class="pro-dec-review">
                                    <ul>
                                        <li>32 Reviews </li>
                                        <li> Add Your Reviews</li>
                                    </ul>
                                </div>
                            </div>

                            
                            <span>{{number_format($value->product_price).'$'}}</span>
                            <div class="in-stock">
                                <p>Available: <span>{{$value->product_quantity}}</span></p>
                            </div>
                            <p>{!!$value->product_desc!!}</p>
                            {{-- <div class="pro-dec-feature">
                                <ul>
                                    <li><input type="checkbox"> Protection Plan: <span> 2 year  $4.99</span></li>
                                    <li><input type="checkbox"> Remote Holder: <span> $9.99</span></li>
                                    <li><input type="checkbox"> Koral Alexa Voice Remote Case: <span> Red  $16.99</span></li>
                                    <li><input type="checkbox"> Amazon Basics HD Antenna: <span>25 Mile  $14.99</span></li>
                                </ul>
                            </div> --}}
                            {{-- <div class="quality-add-to-cart">
                            <input class="cart-plus-minus-box" type="number" min="1" name="qtybutton" value="1">
                            <button type="submit" class="btn btn-default cart">
                                <i class="ion-android-cart"></i>
                                Add To Cart
                            </button>
                            </div> --}}
                            
                                <div class="quality-add-to-cart">
                                    <div class="quality">
                                        <label>Qty:</label>
                                        <input class="cart-plus-minus-box cart_product_qty_{{$value->product_id}}" type="number" min="1" name="qty" value="1">
                                        {{-- <input type="hidden" value="{{$value->product_quantity}}" class="cart_product_qty_{{$value->product_id}}"> --}}
                                        <input name="productid_hidden" type="hidden" value="{{$value->product_id}}">
                                    </div>

                                    <div class="shop-list-cart-wishlist">
                                        {{-- <button title="Add To Cart" type="submit" class="btn btn-default cart">
                                            <i class="ion-android-cart"></i>
                                        </button> --}}
                                        <button type="button" style="height: 40px" class="btn btn-outline-success add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">+ Add to cart</button>
                                        {{-- <a title="Wishlist" href="#">
                                            <i class="ion-android-favorite-outline"></i>
                                        </a> --}}
                                    </div>
                                </div>
                            

                            <div class="pro-dec-categories">
                                <ul>
                                    <li class="categories-title">Categories:</li>
                                    <li><a href="{{URL::to('/category/'.$value->category_id)}}">{{$value->category_name}},</a></li>
                                </ul>
                            </div>
                            <div class="pro-dec-categories">
                                <ul>
                                    <li class="categories-title">Origin: </li>
                                    <li><a href="{{URL::to('/origin/'.$value->origin_id)}}">{{$value->origin_name}}, </a></li>
                                </ul>
                            </div>
                            <div class="pro-dec-social">
                                <ul>
                                    <li><div class="fb-like" data-href="{{$url_canonical}}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="false"></div></li>
                                    <li><div class="fb-share-button" data-href="http://localhost:8080/innisfreelaravel/" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
		<!-- Product Deatils Area End -->
        <div class="description-review-area pb-70">
            <div class="container">
                <div class="description-review-wrapper">
                    <div class="description-review-topbar nav text-center">
                        <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                        {{-- <a data-toggle="tab" href="#des-details2">Details</a>
                        <a data-toggle="tab" href="#des-details3">Comment</a> --}}
                    </div>
                    <div class="tab-content description-review-bottom">
                        <div id="des-details1" class="tab-pane active">
                            <div class="product-description-wrapper">
                                <p>{!!$value->product_content!!}</p>
                            </div>
                        </div>
                        <div id="des-details2" class="tab-pane">
                            <div class="product-anotherinfo-wrapper">
                                <ul>
                                    <li><span>Tags:</span></li>
                                </ul>
                            </div>
                        </div>
                        <div id="des-details3" class="tab-pane">
                            <div class="rattings-wrapper">
                                <div class="sin-rattings">
                                    <div class="star-author-all">
                                        <div class="ratting-star f-left">
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <span>(5)</span>
                                        </div>
                                        <div class="ratting-author f-right">
                                            <h3>Potanu Leos</h3>
                                            <span>12:24</span>
                                            <span>9 March 2018</span>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
                                </div>
                            </div>
                            <div class="ratting-form-wrapper">
                                <h3>Add your Comments :</h3>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="star-box">
                                            <h2>Rating:</h2>
                                            <div class="ratting-star">
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-20">
                                                    <input placeholder="Name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-20">
                                                    <input placeholder="Email" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="message" placeholder="Message"></textarea>
                                                    <input type="submit" value="add review">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="product-area pb-100">
            <div class="container">
                <div class="product-top-bar section-border mb-35">
                    <div class="section-title-wrap">
                        <h3 class="section-title section-bg-white">Related Products</h3>
                    </div>
                </div>
                <div class="featured-product-active hot-flower owl-carousel product-nav">
                    @foreach($relate as $key => $relate_pro)
                    <form>
                        @csrf
                    <input type="hidden" value="{{$relate_pro->product_id}}" class="cart_product_id_{{$relate_pro->product_id}}">
                    <input type="hidden" value="{{$relate_pro->product_name}}" class="cart_product_name_{{$relate_pro->product_id}}">
                    <input type="hidden" value="{{$relate_pro->product_quantity}}" class="cart_product_quantity_{{$relate_pro->product_id}}">
                    <input type="hidden" value="{{$relate_pro->product_image}}" class="cart_product_image_{{$relate_pro->product_id}}">
                    <input type="hidden" value="{{$relate_pro->product_price}}" class="cart_product_price_{{$relate_pro->product_id}}">
                    <input type="hidden" value="1" class="cart_product_qty_{{$relate_pro->product_id}}">
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="{{URL::to('/product-details/'.$relate_pro->product_id)}}">
                                <img alt="" src="{{asset('public/upload/product/'.$relate_pro->product_image)}}">
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
										<a href="product-details.html">{{$relate_pro->product_name}}</a>
									</h4>
								</div>
								<div class="cart-hover">
									{{-- <h4><a href="product-details.html">+ Add to cart</a></h4> --}}
                                    <button type="button" style="height: 40px" class="btn btn-outline-success add-to-cart" data-id_product="{{$relate_pro->product_id}}" name="add-to-cart">+ Add to cart</button>
								</div>
							</div>
							<div class="product-price-wrapper">
								<span>{{number_format($relate_pro->product_price).'$'}}</span>
								{{-- <span class="product-price-old">$120.00 </span> --}}
							</div>
						</div>
                    </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
@endsection