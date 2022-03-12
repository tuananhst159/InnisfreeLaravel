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
                                        <h5 class="panel-title"><span>1.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-1">shipping information</a></h5>
                                    </div>
                                    <div id="payment-1" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <form action="{{URL::to('/save-checkout-customer')}}" method="post">
                                            		{{ csrf_field() }}
	                                                <div class="row">
	                                                    <div class="col-lg-6 col-md-6">
	                                                        <div class="billing-info">
	                                                            <label>Name</label>
	                                                            <input type="text" name="shipping_name">
	                                                        </div>
	                                                    </div>
	                                                    <div class="col-lg-6 col-md-6">
	                                                        <div class="billing-info">
	                                                            <label>Email Address</label>
	                                                            <input type="email" name="shipping_email">
	                                                        </div>
	                                                    </div>
	                                                    <div class="col-lg-6 col-md-6">
	                                                        <div class="billing-info">
	                                                            <label>Address</label>
	                                                            <input type="text" name="shipping_address">
	                                                        </div>
	                                                    </div>
	                                                    <div class="col-lg-6 col-md-6">
	                                                        <div class="billing-info">
	                                                            <label>Telephone</label>
	                                                            <input type="text" name="shipping_phone">
	                                                        </div>
	                                                    </div>
	                                                    <div class="col-lg-12 col-md-12">
	                                                        <div class="billing-info">
	                                                            <label>Notes</label>
	                                                            <input type="text" name="shipping_notes">
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                                <div class="billing-back-btn">
	                                                    <div class="billing-back">
	                                                        {{-- <a href="#"><i class="ion-arrow-up-c"></i> back</a> --}}
	                                                    </div>
	                                                    <div class="billing-btn">
	                                                        <button type="submit" name="send_order">Continue</button>
	                                                    </div>
	                                                </div>
                                                </form>
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