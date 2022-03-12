@extends('layout')
@section('content') 
<!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>CART</h3>
                    <ul>
                        <li><a href="{{URL::to('/home')}}">Home</a></li>
                        <li class="active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
         <!-- shopping-cart-area start -->
        <div class="cart-main-area ptb-100">
            <div class="container">
                <h3 class="page-title">Your cart items</h3>
                                <?php
                                $message = Session::get('message');
                                if($message){
                                    echo'<div class="alert alert-success" role="alert">'.$message.'</div>';
                                    Session::put('message',null);
                                }
                                ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div>
                            <form action="{{URL::to('/update-cart')}}" method="post">
                                @csrf
                            <div class="table-content table-responsive">
                                
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Until Price</th>
                                            <th>Available</th>
                                            <th>Qty</th>
                                            {{-- <th>Update</th> --}}
                                            <th>Subtotal</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @if(Session::get('cart'))
                                        @foreach(Session::get('cart') as $key => $cart)
                                            @php
                                                $total = $total + $cart['product_price']*$cart['product_qty'];
                                            @endphp
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="{{URL::to('/product-details/'.$cart['product_id'])}}"><img src="{{asset('public/upload/product/'.$cart['product_image'])}}" width="125" alt="{{$cart['product_name']}}"></a>
                                            </td>
                                            <td class="product-name"><a href="{{URL::to('/product-details/'.$cart['product_id'])}}">{{$cart['product_name']}}</a></td>
                                            <td class="product-price-cart"><span class="amount"></span>{{number_format($cart['product_price']).'$'}}</td>
                                            <td class="product-quantity"><a href="{{URL::to('/product-details/'.$cart['product_id'])}}">{{$cart['product_quantity']}}</a></td>

                                            
                                            <td class="product-quantity">
                                                
                                                <div class="pro-dec-cart">
                                                    <input type="number" name="cart_qty[{{$cart['session_id']}}]" min="1" value="{{$cart['product_qty']}}">
                                                </div>

                                            </td>
                                            {{-- <td>
                                                <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                                <input type="submit" value="Update" name="update_qty" class="cart-shiping-update">
                                            </td> --}}
                                            
                                            
                                            <td class="product-subtotal">
                                                {{number_format($cart['product_price']*$cart['product_qty'])}}$
                                            </td>
                                            <td class="product-remove">
                                                {{-- <a href="#"><i class="fa fa-pencil"></i></a> --}}
                                                <a href="{{URL::to('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
                                           </td>
                                        </tr>
                                        @endforeach
                                        @else
                                            <tr>
                                                <th class="col-lg-12 col-md-12 col-sm-12 col-12">Cart is empty</th>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="{{URL::to('/home')}}">Continue Shopping</a>
                                        </div>
                                        <div class="cart-clear">
                                            <button>Update Shopping Cart</button>
                                            {{-- <a href="#">Clear Shopping Cart</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="row">
                            {{-- <div class="col-lg-4 col-md-6">
                                <div class="cart-tax">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                                    </div>
                                    <div class="tax-wrapper">
                                        <p>Enter your destination to get a shipping estimate.</p>
                                        <div class="tax-select-wrapper">
                                            <div class="tax-select">
                                                <label>
                                                    * Country
                                                </label>
                                                <select class="email s-email s-wid">
                                                    <option>Bangladesh</option>
                                                    <option>Albania</option>
                                                    <option>Åland Islands</option>
                                                    <option>Afghanistan</option>
                                                    <option>Belgium</option>
                                                </select>
                                            </div>
                                            <div class="tax-select">
                                                <label>
                                                    * Region / State
                                                </label>
                                                <select class="email s-email s-wid">
                                                    <option>Bangladesh</option>
                                                    <option>Albania</option>
                                                    <option>Åland Islands</option>
                                                    <option>Afghanistan</option>
                                                    <option>Belgium</option>
                                                </select>
                                            </div>
                                            <div class="tax-select">
                                                <label>
                                                    * Zip/Postal Code
                                                </label>
                                                <input type="text">
                                            </div>
                                            <button class="cart-btn-2" type="submit">Get A Quote</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="discount-code-wrapper">
                                    <div class="title-wrap">
                                       <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4> 
                                    </div>
                                    <div class="discount-code">
                                        <p>Enter your coupon code if you have one.</p>
                                        <form>
                                            <input type="text" required="" name="name">
                                            <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-lg-4 col-md-12">
                                <div class="grand-totall">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                    </div>
                                    <h5>Total products <span>{{number_format($total)}}$</span></h5>
                                    <h5>Shipping Cost <span>Free</span></h5>
                                    {{-- <div class="total-shipping">
                                        <h5>Shipping Cost</h5>
                                        <ul>
                                            <li><input type="checkbox"> Standard <span>$20.00</span></li>
                                            <li><input type="checkbox"> Express <span>$30.00</span></li>
                                        </ul>
                                    </div> --}}
                                    <h4 class="grand-totall-title">Grand Total  <span>{{number_format($total)}}$</span></h4>

                                            
                                            <?php 
                                                $customer_id = Session::get('customer_id');
                                                if($customer_id!=NULL){

                                            ?>
                                            <a href="{{URL::to('/checkout')}}">Proceed to Checkout</a>
                                            <?php
                                                }else{
                                            ?>

                                            <a href="{{URL::to('/login-checkout')}}">Proceed to Checkout</a>
                                            <?php
                                                }
                                            ?>
                                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection