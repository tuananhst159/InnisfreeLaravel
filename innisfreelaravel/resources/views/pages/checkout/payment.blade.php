@extends('layout')
@section('content')
<div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>CHECKOUT</h3>
                    <ul>
                        <li><a href="{{URL::to('/home')}}">Home</a></li>
                        <li class="active">CHECKOUT</li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
        <!-- checkout-area start -->
        <div class="checkout-area pb-80 pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                            	<div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>2.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-1">payment</a></h5>
                                    </div>
                                    <div id="payment-1" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <div class="payment-info-wrapper">
                                            	<form action="{{URL::to('/order-place')}}" method="post">
                                            		{{ csrf_field() }}
                                                <div class="ship-wrapper">
                                                    <div class="single-ship">
                                                        <input type="radio" checked="" value="1" name="payment_option">
                                                        <label>COD </label>
                                                    </div>
                                                    {{-- <div class="single-ship">
                                                        <input type="radio" value="2" name="payment_option">
                                                        @php
                                                            $total = 0;
                                                        @endphp
                                                        @foreach(Session::get('cart') as $key => $cart)
                                                            @php
                                                                $total = $total + $cart['product_price']*$cart['product_qty'];
                                                            @endphp
                                                        @endforeach
                                                        <input type="hidden" id="totalUSD" value="{{number_format($total)}}">
                                                        <div id="paypal-button"></div>
                                                    </div> --}}
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        {{-- <a href="#"><i class="ion-arrow-up-c"></i> back</a> --}}
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">Order</button>
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
                    <div class="col-lg-3">
                        <div class="checkout-progress">
                            <h4>Checkout Progress</h4>
                            <ul>
                                <li>Shipping Address</li>
                                <li>Payment</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection