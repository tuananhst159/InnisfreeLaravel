@extends('layout')
@section('content')  
<!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>Search</h3>
                    <ul>
                        <li><a href="{{URL::to('/home')}}">Home</a></li>
                        <li class="active">Search</li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
		<!-- Shop Page Area Start -->
        <div class="shop-page-area ptb-100">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="shop-topbar-wrapper">
                            <div class="shop-topbar-left">
                                <ul class="view-mode">
                                    <li class="active"><a href="#product-grid" data-view="product-grid"><i class="fa fa-th"></i></a></li>
                                    <li><a href="#product-list" data-view="product-list"><i class="fa fa-list-ul"></i></a></li>
                                </ul>
                                <p>Showing 1 - 20 of 30 results  </p>
                            </div>
                            <div class="product-sorting-wrapper">
                                <div class="product-shorting shorting-style">
                                    <label>View:</label>
                                    <select>
                                        <option value=""> 20</option>
                                        <option value=""> 23</option>
                                        <option value=""> 30</option>
                                    </select>
                                </div>
                                <div class="product-show shorting-style">
                                    <label>Sort by:</label>
                                    <select>
                                        <option value="">Default</option>
                                        <option value=""> Name</option>
                                        <option value=""> price</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="grid-list-product-wrapper">
                            <div class="product-grid product-view pb-20">
                                <div class="row">
                                    @foreach($search_product as $key => $product)
                                    <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                        <div class="product-wrapper">
                                            <form>
                                                @csrf
                                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                                            <div class="product-img">
                                                <a href="{{URL::to('/product-details/'.$product->product_id)}}">
                                                    <img alt="" src="{{URL::to('public/upload/product/'.$product->product_image)}}">
                                                </a>
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
												</div>
											</div>
                                            <div class="product-list-details">
                                                <h4>
                                                    <a href="product-details.html">{{$product->product_name}}</a>
                                                </h4>
                                                <div class="product-price-wrapper">
                                                    <span>{{number_format($product->product_price).'$'}}</span>
                                                    <span class="product-price-old">$120.00 </span>
                                                </div>
                    
                                                
                                            </div>
                                            <form>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="pagination-total-pages">
                                <div class="pagination-style">
                                    <ul>
                                        <li><a class="prev-next prev" href="#"><i class="ion-ios-arrow-left"></i> Prev</a></li>
                                        <li><a class="active" href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">...</a></li>
                                        <li><a href="#">10</a></li>
                                        <li><a class="prev-next next" href="#">Next<i class="ion-ios-arrow-right"></i> </a></li>
                                    </ul>
                                </div>
                                <div class="total-pages">
                                    <p>Showing 1 - 20 of 30 results  </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                            <div class="shop-widget">
                                <h4 class="shop-sidebar-title">Categories</h4>
                                @foreach($category as $key => $cate)
                                <div class="shop-catigory">
                                    <ul id="faq">
                                        <li> <a href="{{URL::to('/category/'.$cate->category_id)}}">{{$cate->category_name}}</a> </li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>

                            {{-- Origin Sidebar Start --}}
                            <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                                <h4 class="shop-sidebar-title">Origin</h4>
                                @foreach($origin as $key => $ori)
                                <div class="shop-catigory">
                                    <ul id="faq">
                                        <li> <a href="{{URL::to('/origin/'.$ori->origin_id)}}">{{$ori->origin_name}}</a> </li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                            {{-- Origin Sidebar End --}}

                            
                            {{-- <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                                <h4 class="shop-sidebar-title">Popular Tags</h4>
                                <div class="shop-tags mt-25">
                                    <ul>
                                        <li><a href="#">Green</a></li>
                                        <li><a href="#">Oolong</a></li>
                                        <li><a href="#">Black</a></li>
                                        <li><a href="#">Pu'erh</a></li>
                                        <li><a href="#">Dark </a></li>
                                        <li><a href="#">Special</a></li>
                                    </ul>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection