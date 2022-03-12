<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin | Innisfree Official USA | Korean Beauty Products, Skincare & Makeup | innisfree</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/backend/assets/images/innisfree_favicon.png')}}">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/backend/assets/css/vendor/bootstrap.min.css')}}">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('public/backend/assets/css/vendor/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/assets/css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/assets/css/vendor/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/assets/css/vendor/cryptocurrency-icons.css')}}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('public/backend/assets/css/plugins/plugins.css')}}">

    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{asset('public/backend/assets/css/helper.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('public/backend/assets/css/style.css')}}">

    <!-- Custom Style CSS Only For Demo Purpose -->
    <link id="cus-style" rel="stylesheet" href="{{asset('public/backend/assets/css/style-primary.css')}}">

</head>

<body>

    <div class="main-wrapper">


        <!-- Header Section Start -->
        <div class="header-section">
            <div class="container-fluid">
                <div class="row justify-content-between align-items-center">

                    <!-- Header Logo (Header Left) Start -->
                    <div class="header-logo col-auto">
                        <a href="{{URL::to('/dashboard')}}">
                            <img src="{{asset('public/backend/assets/images/logo/innisfree_logo.png')}}" alt="">
                            {{-- <img src="{{asset('public/backend/assets/images/logo/logo-light.png')}}" class="logo-light" alt=""> --}}
                        </a>
                    </div><!-- Header Logo (Header Left) End -->

                    <!-- Header Right Start -->
                    <div class="header-right flex-grow-1 col-auto">
                        <div class="row justify-content-between align-items-center">

                            <!-- Side Header Toggle & Search Start -->
                            <div class="col-auto">
                                <div class="row align-items-center">

                                    <!--Side Header Toggle-->
                                    <div class="col-auto"><button class="side-header-toggle"><i class="zmdi zmdi-menu"></i></button></div>

                                    
                                </div>
                            </div><!-- Side Header Toggle & Search End -->

                            <!-- Header Notifications Area Start -->
                            <div class="col-auto">

                                <ul class="header-notification-area">

                                    
                                    <!--User-->
                                    <li class="adomx-dropdown col-auto">
                                        <a class="toggle" href="#">
                                            <span class="user">
                                        <span class="avatar">
                                            <img src="{{asset('public/backend/assets/images/avatar/avatar-1.jpg')}}" alt="">
                                            <span class="status"></span>
                                            </span>
                                            <span class="name">
                                                <?php
                                                $name = Session::get('admin_name');
                                                if($name){
                                                    echo $name;
                                                }
                                                ?>
                                            </span>
                                            </span>
                                        </a>

                                        <!-- Dropdown -->
                                        <div class="adomx-dropdown-menu dropdown-menu-user">
                                            <div class="head">
                                                <h5 class="name"><a href="#">
                                                    <?php
                                                    $name = Session::get('admin_name');
                                                    if($name){
                                                        echo $name;
                                                    }
                                                    ?>
                                                </a></h5>
                                                
                                            </div>
                                            <div class="body">
                                                
                                                <ul>
                                                    <li><a href="{{URL::to('/logout')}}"><i class="zmdi zmdi-lock-open"></i>Sing out</a></li>
                                                </ul>
                                                
                                            </div>
                                        </div>

                                    </li>

                                </ul>

                            </div><!-- Header Notifications Area End -->

                        </div>
                    </div><!-- Header Right End -->

                </div>
            </div>
        </div><!-- Header Section End -->
        <!-- Side Header Start -->
        <div class="side-header show">
            <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
            <!-- Side Header Inner Start -->
            <div class="side-header-inner custom-scroll">

                <nav class="side-header-menu" id="side-header-menu">
                    <ul>
                        <li><a href="{{URL::to('/dashboard')}}"><i class="ti-home"></i> <span>Dashboard</span></a></li>
                        <li class="has-sub-menu"><a href="#"><i class="ti-package"></i> <span>Category</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="{{URL::to('/add-category-product')}}"><span>Add Category</span></a></li>
                                <li><a href="{{URL::to('/all-category-product')}}"><span>Manage Category</span></a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu"><a href="#"><i class="ti-crown"></i> <span>Origin</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="{{URL::to('/add-origin-product')}}"><span>Add Origin</span></a></li>
                                <li><a href="{{URL::to('/all-origin-product')}}"><span>Manage Origin</span></a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu"><a href="#"><i class="ti-notepad"></i> <span>Product</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="{{URL::to('/add-product')}}"><span>Add Product</span></a></li>
                                <li><a href="{{URL::to('/all-product')}}"><span>Manage Product</span></a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu"><a href="#"><i class="ti-shopping-cart"></i> <span>Order</span></a>
                            <ul class="side-header-sub-menu">
                                <li><a href="{{URL::to('/manage-order')}}"><span> Manage Order</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>

            </div><!-- Side Header Inner End -->
        </div><!-- Side Header End -->

        @yield('admin_content')

        <!-- Footer Section Start -->
        <div class="footer-section">
            <div class="container-fluid">

                <div class="footer-copyright text-center">
                    <p class="text-body-light">2019 &copy; <a href="https://themeforest.net/user/codecarnival">Codecarnival</a></p>
                </div>

            </div>
        </div><!-- Footer Section End -->

    </div>

    <!-- JS
============================================ -->

    <!-- Global Vendor, plugins & Activation JS -->
    <script src="{{asset('public/backend/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('public/backend/assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/backend/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('public/backend/assets/js/vendor/bootstrap.min.js')}}"></script>
    <!--Plugins JS-->
    <script src="{{asset('public/backend/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('public/backend/assets/js/plugins/tippy4.min.js.js')}}"></script>
    
    <!--Main JS-->
    <script src="{{asset('public/backend/assets/js/main.js')}}"></script>
    
    {{-- <script src="{{URL::to('//cdn.ckeditor.com/4.16.2/full/ckeditor.js')}}"></script> --}}
    {{-- <script src="{{asset('public/backend/assets/js/jquery.form-validator.min.js')}}" defer></script> --}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script type="text/javascript">
        $.validate({

        });
    </script>

    <script type="text/javascript">
        $('.update_quantity_order').click(function(){
            var order_product_id = $(this).data('product_id');
            var order_qty = $('.order_qty_'+order_product_id).val();
            var order_id = $('.order_id').val();
            var _token = $('input[name="_token"]').val();
            // alert(order_product_id);
            // alert(order_qty);
            // alert(order_id);
            

            
            $.ajax({
                url: '{{url('/update-qty')}}',
                method: 'POST',
                data: {_token:_token,order_qty:order_qty,order_id:order_id,order_product_id:order_product_id},

                success:function(data){
                    alert('Update Quantity Success!');
                    location.reload();
                }
            });
        });
    </script>

    <script type="text/javascript">
        $('.order_details').change(function(){
            var order_status = $(this).val();
            var order_id = $(this).children(":selected").attr("id");
            var _token = $('input[name="_token"]').val();
            // alert(order_status);
            
            //get so luong
            quantity = [];
            $("input[name='product_sales_quantity']").each(function(){
                quantity.push($(this).val());
            });

            //get product_id
            order_product_id= [];
            $("input[name='order_product_id']").each(function(){
                order_product_id.push($(this).val());
            });
            // alert(quantity);
            j = 0;
            for(i=0;i<order_product_id.length;i++){
                //so luong khach dat
                var order_qty = $('.order_qty_'+order_product_id[i]).val();
                //so luong ton kho
                var order_qty_storage = $('.order_qty_storage_'+order_product_id[i]).val();

                if(parseInt(order_qty)>parseInt(order_qty_storage)){
                    j = j + 1;
                    if(j==1){
                        alert('Product quantity is not enough');
                    }
                    $('.color_qty_'+order_product_id[i]).css('background','#ffcccc');
                }
            }
            if(j==0){
                $.ajax({
                    url: '{{url('/update-order-qty')}}',
                    method: 'POST',
                    data: {_token:_token,order_status:order_status,order_id:order_id,quantity:quantity,order_product_id:order_product_id},

                    success:function(data){
                        alert('Update Status Success!');
                        location.reload();
                    }
                });
            }

            
        });
    </script>
    </body>

</html>