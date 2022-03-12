<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        {{-- Seo --}}
        <title>{{$meta_title}}</title>
        <meta name="description" content="{{$meta_desc}}"/>
        <meta name="keywords" content="{{$meta_keywords}}"/>
        <link  rel="canonical" href="{{$url_canonical}}" />
        <meta name="robots" content="INDEX,FOLLOW"/>

        {{-- <meta property="og:image" content="{{$image_og}}" /> --}}
        <meta property="og:site_name" content="http://localhost:8080/innisfreelaravel/" />
        <meta property="og:description" content="{{$meta_desc}}" />
        <meta property="og:title" content="{{$meta_title}}" />
        <meta property="og:url" content="{{$url_canonical}}" />
        <meta property="og:type" content="website" />

        {{-- Seo --}}
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend/assets/img/innisfree_favicon.png')}}">
		
		<!-- all css here -->
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/chosen.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/ionicons.min.css')}}">
		<link rel="stylesheet" href="{{asset('public/frontend/assets/css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/meanmenu.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/responsive.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontend/assets/css/sweetalert.css')}}">
    </head>
    <body>
        {{-- @php
        echo Session::get('customer_id');
        echo Session::get('shipping_id');
        @endphp --}}
        <!-- header start -->
        <header class="header-area gray-bg clearfix">
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="logo">
                                <a href="{{URL::to('/home')}}">
                                    <img alt="" src="{{asset('public/frontend/assets/img/logo/innisfree_logo.png')}}">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-6">
                            <div class="header-bottom-right">
                                <div class="main-menu">
                                    <nav>
                                        <ul>
                                            <li>
                                            <form action="{{URL::to('/search')}}" method="post">
                                                @csrf
                                            <div class="input-group">
                                                <input style="height: 31px;" name="keywords_submit" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                                <button type="submit" class="btn btn-outline-success">Search</button>
                                            </div>
                                            </form>
                                            </li>
                                            <li class="top-hover"><a href="{{URL::to('/home')}}">home</a>
                                                
                                            </li>
                                            <li class="mega-menu-position top-hover"><a href="shop.html">shop</a>
                                                <ul class="mega-menu">
                                                    <li>
                                                        <ul>
                                                            <li class="mega-menu-title">Categories</li>
                                                            @foreach($category as $key => $cate)
                                                            <li><a href="{{URL::to('/category/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <ul>
                                                            <li class="mega-menu-title">Origin</li>
                                                            @foreach($origin as $key => $ori)
                                                            <li><a href="{{URL::to('/origin/'.$ori->origin_id)}}">{{$ori->origin_name}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            
                                            <li class="top-hover"><a href="{{URL::to('/login-checkout')}}">my account </a>
                                                <ul class="submenu">
                                                    @php 
                                                    $customer_id = Session::get('customer_id');
                                                    if($customer_id!=NULL){

                                                    @endphp
                                                    <li><a href="{{URL::to('/history')}}">order history</a></li>

                                                    @php
                                                        }else{
                                                    @endphp

                                                    <li><a href="{{URL::to('/login-checkout')}}">history</a></li>
                                                    @php
                                                        }
                                                    @endphp

                                                    @php 
                                                    $customer_id = Session::get('customer_id');
                                                    $shipping_id = Session::get('shipping_id');
                                                    if($customer_id!=NULL && $shipping_id==NULL){

                                                    @endphp
                                                    <li><a href="{{URL::to('/checkout')}}">payment</a></li>

                                                    @php
                                                        }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                                    @endphp

                                                    <li><a href="{{URL::to('/payment')}}">payment</a></li>

                                                    @php
                                                        }else{
                                                    @endphp

                                                    <li><a href="{{URL::to('/login-checkout')}}">payment</a></li>
                                                    @php
                                                        }
                                                    @endphp
                                                    
                                                </ul>
                                            </li>
                                            @php 
                                                $customer_id = Session::get('customer_id');
                                                if($customer_id!=NULL){

                                            @endphp
                                            <li><a href="{{URL::to('/logout-checkout')}}">logout</a></li>

                                            @php
                                                }else{
                                            @endphp

                                            <li><a href="{{URL::to('/login-checkout')}}">login</a></li>
                                            @php
                                                }
                                            @endphp

                                        </ul>
                                    </nav>
                                </div>
								
                                <div class="header-cart">
                                    <a href="#">
                                        <div class="cart-icon">
                                            <i class="ti-shopping-cart"></i>
                                        </div>
                                    </a>
                                    <div class="shopping-cart-content">
                                        
                                        <div class="shopping-cart-btn">
                                            <a href="{{URL::to('/show-cart-ajax')}}">view cart</a>

                                            @php 
                                                $customer_id = Session::get('customer_id');
                                                if($customer_id!=NULL){

                                            @endphp
                                            <a href="{{URL::to('/checkout')}}">checkout</a>

                                            @php 
                                                }else{
                                            @endphp

                                            <a href="{{URL::to('/login-checkout')}}">checkout</a>
                                            @php 
                                                }
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul class="menu-overflow">
                                    <li><a href="#">HOME</a>
                                        <ul>
                                            <li><a href="index.html">home version 1</a></li>
                                            <li><a href="index-2.html">home version 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">pages</a>
                                        <ul>
                                            <li><a href="about-us.html">about us </a></li>
                                            <li><a href="shop.html">shop Grid</a></li>
                                            <li><a href="shop-list.html">shop list</a></li>
                                            <li><a href="product-details.html">product details</a></li>
                                            <li><a href="cart-page.html">cart page</a></li>
                                            <li><a href="checkout.html">checkout</a></li>
                                            <li><a href="wishlist.html">wishlist</a></li>
                                            <li><a href="my-account.html">my account</a></li>
                                            <li><a href="login-register.html">login / register</a></li>
                                            <li><a href="contact.html">contact</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop.html"> Shop </a>
                                        <ul>
                                            <li><a href="#">Categories 01</a>
                                                <ul>
                                                    <li><a href="shop.html">Aconite</a></li>
                                                    <li><a href="shop.html">Ageratum</a></li>
                                                    <li><a href="shop.html">Allium</a></li>
                                                    <li><a href="shop.html">Anemone</a></li>
                                                    <li><a href="shop.html">Angelica</a></li>
                                                    <li><a href="shop.html">Angelonia</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Categories 02</a>
                                                <ul>
                                                    <li><a href="shop.html">Balsam</a></li>
                                                    <li><a href="shop.html">Baneberry</a></li>
                                                    <li><a href="shop.html">Bee Balm</a></li>
                                                    <li><a href="shop.html">Begonia</a></li>
                                                    <li><a href="shop.html">Bellflower</a></li>
                                                    <li><a href="shop.html">Bergenia</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Categories 03</a>
                                                <ul>
                                                    <li><a href="shop.html">Caladium</a></li>
                                                    <li><a href="shop.html">Calendula</a></li>
                                                    <li><a href="shop.html">Carnation</a></li>
                                                    <li><a href="shop.html">Catmint</a></li>
                                                    <li><a href="shop.html">Celosia</a></li>
                                                    <li><a href="shop.html">Chives</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Categories 04</a>
                                                <ul>
                                                    <li><a href="shop.html">Daffodil</a></li>
                                                    <li><a href="shop.html">Dahlia</a></li>
                                                    <li><a href="shop.html">Daisy</a></li>
                                                    <li><a href="shop.html">Diascia</a></li>
                                                    <li><a href="shop.html">Dusty Miller</a></li>
                                                    <li><a href="shop.html">Dame’s Rocket</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">BLOG</a>
                                        <ul>
                                            <li><a href="blog-masonry.html">Blog Masonry</a></li>
                                            <li><a href="#">Blog Standard</a>
                                                <ul>
                                                    <li><a href="blog-left-sidebar.html">left sidebar</a></li>
                                                    <li><a href="blog-right-sidebar.html">right sidebar</a></li>
                                                    <li><a href="blog-no-sidebar.html">no sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Post Types</a>
                                                <ul>
                                                    <li><a href="blog-details-standerd.html">Standard post</a></li>
                                                    <li><a href="blog-details-audio.html">audio post</a></li>
                                                    <li><a href="blog-details-video.html">video post</a></li>
                                                    <li><a href="blog-details-gallery.html">gallery post</a></li>
                                                    <li><a href="blog-details-link.html">link post</a></li>
                                                    <li><a href="blog-details-quote.html">quote post</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html"> Contact us </a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
		<!-- header end -->
		@yield('content')
		<!-- Footer style Start -->
        <footer class="footer-area pt-75 gray-bg-3">
            <div class="footer-top gray-bg-3 pb-35">
                <div class="container">
                    <div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget mb-40">
                                <div class="footer-title mb-25">
                                    <h4>My Account</h4>
                                </div>
                                <div class="footer-content">
                                    <ul>
                                        <li><a href="my-account.html">My Account</a></li>
                                        <li><a href="about-us.html">Order History</a></li>
                                        <li><a href="wishlist.html">WishList</a></li>
                                        <li><a href="#">Newsletter</a></li>
                                        <li><a href="about-us.html">Order History</a></li>
                                        <li><a href="#">International Orders</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
						<div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget mb-40">
                                <div class="footer-title mb-25">
                                    <h4>Information</h4>
                                </div>
                                <div class="footer-content">
                                    <ul>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="#">Delivery Information</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="#">Customer Service</a></li>
                                        <li><a href="#">Return Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
						<div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget mb-40">
                                <div class="footer-title mb-25">
                                    <h4>Quick Links</h4>
                                </div>
                                <div class="footer-content">
                                    <ul>
                                        <li><a href="#">Support Center</a></li>
                                        <li><a href="#">Term & Conditions</a></li>
                                        <li><a href="#">Shipping</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Help</a></li>
                                        <li><a href="#">FAQS</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget footer-widget-red footer-black-color mb-40">
                                <div class="footer-title mb-25">
                                    <h4>Contact Us</h4>
                                </div>
                                <div class="footer-about">
                                    <p>Your current address goes to here,120 haka, angladesh</p>
                                    <div class="footer-contact mt-20">
                                        <ul>
                                            <li>(+008) 254 254 254 25487</li>
                                            <li>(+009) 358 587 657 6985</li>
                                        </ul>
                                    </div>
									<div class="footer-contact mt-20">
                                        <ul>
                                            <li>yourmail@example.com</li>
                                            <li>example@admin.com</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom pb-25 pt-25 gray-bg-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="copyright">
                                <p>Copyright © <a href="#">SabujCha</a>. All Right Reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="payment-img f-right">
                                <a href="#">
                                    <img alt="" src="{{asset('public/frontend/assets/img/icon-img/payment.png')}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
		<!-- Footer style End -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <!-- Thumbnail Large Image start -->
                                <div class="tab-content">
                                    <div id="pro-1" class="tab-pane fade show active">
                                        <img src="{{asset('public/frontend/assets/img/product-details/product-detalis-l1.jpg')}}" alt="">
                                    </div>
                                    <div id="pro-2" class="tab-pane fade">
                                        <img src="{{asset('public/frontend/assets/img/product-details/product-detalis-l2.jpg')}}" alt="">
                                    </div>
                                    <div id="pro-3" class="tab-pane fade">
                                        <img src="{{asset('public/frontend/assets/img/product-details/product-detalis-l3.jpg')}}" alt="">
                                    </div>
                                    <div id="pro-4" class="tab-pane fade">
                                        <img src="{{asset('public/frontend/assets/img/product-details/product-detalis-l4.jpg')}}" alt="">
                                    </div>
                                </div>
                                <!-- Thumbnail Large Image End -->
                                <!-- Thumbnail Image End -->
                                <div class="product-thumbnail">
                                    <div class="thumb-menu owl-carousel nav nav-style" role="tablist">
                                        <a class="active" data-toggle="tab" href="#pro-1"><img src="{{asset('public/frontend/assets/img/product-details/product-detalis-s1.jpg')}}" alt=""></a>
                                        <a data-toggle="tab" href="#pro-2"><img src="{{asset('public/frontend/assets/img/product-details/product-detalis-s2.jpg')}}" alt=""></a>
                                        <a data-toggle="tab" href="#pro-3"><img src="{{asset('public/frontend/assets/img/product-details/product-detalis-s3.jpg')}}" alt=""></a>
                                        <a data-toggle="tab" href="#pro-4"><img src="{{asset('public/frontend/assets/img/product-details/product-detalis-s4.jpg')}}" alt=""></a>
                                    </div>
                                </div>
                                <!-- Thumbnail image end -->
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="modal-pro-content">
                                    <h3>Dutchman's Breeches </h3>
                                    <div class="product-price-wrapper">
                                        <span class="product-price-old">£162.00 </span>
                                        <span>£120.00</span>
                                    </div>
                                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.</p>	
                                    <div class="quick-view-select">
                                        <div class="select-option-part">
                                            <label>Size*</label>
                                            <select class="select">
                                                <option value="">S</option>
                                                <option value="">M</option>
                                                <option value="">L</option>
                                            </select>
                                        </div>
                                        <div class="quickview-color-wrap">
                                            <label>Color*</label>
                                            <div class="quickview-color">
                                                <ul>
                                                    <li class="blue">b</li>
                                                    <li class="red">r</li>
                                                    <li class="pink">p</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                                        </div>
                                        <button>Add to cart</button>
                                    </div>
                                    <span><i class="fa fa-check"></i> In stock</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
        

		<!-- all js here -->
        <script src="{{asset('public/frontend/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/popper.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/ajax-mail.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/plugins.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/main.js')}}"></script>
        <script src="{{asset('public/frontend/assets/js/sweetalert.js')}}"></script>
        {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}

        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="YfvoTZ2z"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                // swal("Hello");
                $('.add-to-cart').click(function(){
                    var id = $(this).data('id_product');
                    var cart_product_id = $('.cart_product_id_' + id).val();
                    var cart_product_name = $('.cart_product_name_' + id).val();
                    var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                    var cart_product_image = $('.cart_product_image_' + id).val();
                    var cart_product_price = $('.cart_product_price_' + id).val();
                    var cart_product_qty = $('.cart_product_qty_' + id).val();
                    var _token = $('input[name="_token"]').val();
                    // swal("Hello");
                    if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                        alert('There are not enough products in stock');
                    }else{


                        $.ajax({
                            url: '{{url('/add-cart-ajax')}}',
                            method: 'POST',
                            data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},

                            success:function(data){
                                swal({
                                    title: "The product has been successfully added to the cart",
                                    text: "You can continue to purchase or go to the shopping cart to proceed with the payment",
                                    showCancelButton: true,
                                    cancelButtonText: "See more",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Go to cart",
                                    closeOnConfirm: false
                                    },
                                function(){
                                    window.location.href = "{{url('/show-cart-ajax')}}";    
                                });
                            }
                        });
                    }
                });
            });
        </script>
        <script type="text/javascript">
            function Huydonhang(id){
                var id=id;
                var lydo = $('.lydohuydon').val();
                var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: '{{url('/cancel-order')}}',
                            method: 'POST',
                            data:{id:id, lydo:lydo, _token:_token},

                            success:function(data){
                                alert('Canceled Order');
                                location.reload();
                            }
                        });

            }
        </script>

        {{-- <script src="https://www.paypalobjects.com/api/checkout.js"></script>
        <script>
            var usd = document.getElementById("totalUSD").value;
          paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
              sandbox: 'AWIrv9Dsl6a0r-a1xYQvjyihefDmEyOp2be1u6j-QTiYHHcQzXTGne1906mEm6nVHu79LRm54fk4Eb94',
              production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
              size: 'small',
              color: 'gold',
              shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
              return actions.payment.create({
                transactions: [{
                  amount: {
                    total: `${usd}`,
                    currency: 'USD'
                  }
                }]
              });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
              return actions.payment.execute().then(function() {
                // Show a confirmation message to the buyer
                window.alert('Thank you for your purchase!');
              });
            }
          }, '#paypal-button');

        </script> --}}
    </body>
</html>
