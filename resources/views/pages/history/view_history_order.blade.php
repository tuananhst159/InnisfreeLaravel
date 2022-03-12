@extends('layout')
@section('content')
<!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>Order History</h3>
                    <ul>
                        <li><a href="{{URL::to('/home')}}">Home</a></li>
                        <li><a href="{{URL::to('/history')}}">Order History</a></li>
                        <li class="active">Order Details</a></li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
         <!-- shopping-cart-area start -->
        <div class="cart-main-area ptb-100">
            <div class="container">
                {{-- <h3 class="page-title">Order List</h3> --}}
                <div class="row">
                	<div class="row mbn-30">

		                <!--Order Details Head Start-->
		                <div class="col-12 mb-30">
		                    <div class="row mbn-15">
		                        <div class="col-12 col-md-4 mb-15">
		                            @foreach($order_by_id as $key => $order)
		                            <h4 class="text-primary fw-600 m-0">Order ID# {{$order->order_id}}</h4>
		                            @endforeach
		                        </div>
		                        <div class="text-left text-md-center col-12 col-md-4 mb-15">
		                            @foreach($order_by_id as $key => $order)
		                            <span>Status: 
		                                @if($order->order_status==1)
		                                    <span class="badge badge-round badge-primary">Process</span>
		                                @elseif($order->order_status==2)
		                                    <span class="badge badge-round badge-success">Shipped</span>
		                                @elseif($order->order_status==3)
		                                    <span class="badge badge-round badge-danger">Cancle</span>
		                                @endif
		                            </span>
		                            @endforeach
		                        </div>
		                        {{-- <div class="text-left text-md-right col-12 col-md-4 mb-15">
		                            <p>02 February, 2018</p>
		                        </div> --}}
		                    </div>
		                </div>
		                <!--Order Details Head End-->

		                <!--Order Details Customer Information Start-->
		                <div class="col-12 mb-30">
		                    <div class="order-details-customer-info row mbn-20">

		                        <!--Billing Info Start-->
		                        @foreach($order_by_id as $key => $ord_by_id)
		                        <div class="col-lg-4 col-md-6 col-12 mb-20">
		                            <h4 class="mb-25">Customer Info</h4>
		                            <ul style="list-style: none;">
		                                
		                                <li> <span>Name:</span> <span>{{$ord_by_id->customer_name}}</span> </li>
		                                <li> <span>Phone:</span> <span>{{$ord_by_id->customer_phone}}</span> </li>

		                            </ul>
		                        </div>
		                        <!--Billing Info End-->

		                        <!--Shipping Info Start-->
		                        <div class="col-lg-4 col-md-6 col-12 mb-20">
		                            <h4 class="mb-25">Order Info</h4>
		                            
		                            <ul style="list-style: none;">
		                                <li> <span>Name:</span> <span>{{$ord_by_id->shipping_name}}</span> </li>
		                                <li> <span>Address:</span> <span>{{$ord_by_id->shipping_address}}</span> </li>
		                                <li> <span>Phone:</span> <span>{{$ord_by_id->shipping_phone}}</span> </li>
		                                <li> <span>Total:</span> <span>{{number_format($ord_by_id->order_total).'$'}}</span> </li>
		                            </ul>
		                            
		                        </div>
		                        @endforeach
		                        <!--Shipping Info End-->

		                        <!--Purchase Info Start-->
		                        {{-- <div class="col-lg-4 col-md-6 col-12 mb-20">
		                            <h4 class="mb-25">Purchase Info</h4>
		                            <ul>
		                                <li> <span>Items</span> <span>03</span> </li>
		                                <li> <span>Price</span> <span>$5400.00</span> </li>
		                                <li> <span class="h5 fw-600">Type</span> <span class="h5 fw-600 text-success">Paid</span> </li>
		                            </ul>
		                        </div> --}}
		                        <!--Purchase Info End-->

		                    </div>
		                </div>
		                <!--Order Details Customer Information Start-->

		                <!--Invoice Details Table Start-->
		                <div class="col-12 mb-30">
		                    <div class="table-responsive">
		                        <table class="table table-bordered mb-0">
		                            <thead>
		                                <tr>
		                                    <th><span>Description</span></th>
		                                    <th class="text-right"><span>Product Available</span></th>
		                                    <th class="text-right"><span>Quantity</span></th>
		                                    <th class="text-right"><span>Unit Cost</span></th>
		                                    <th class="text-right"><span>Total</span></th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                @foreach($order_details as $key => $details)
		                                <tr class="color_qty_{{$details->product_id}}">
		                                    
		                                    <td>{{$details->product_name}}</td>
		                                    <td class="text-right">{{$details->product_quantity}}</td>
		                                    <td class="text-right">
		                                        {{-- <form>
		                                            @csrf --}}
		                                        <input type="number" min="1" readonly {{$details->order_status==2 ? 'disabled' : ''}} class="order_qty_{{$details->product_id}}" name="product_sales_quantity" value="{{$details->product_sales_quantity}}">

		                                        <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$details->product_id}}" value="{{$details->product_quantity}}">

		                                        <input type="hidden" name="order_id" class="order_id" value="{{$details->order_id}}">

		                                        <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->product_id}}">
		                                        
		                                        {{-- </form> --}}
		                                    </td>
		                                    <td class="text-right">{{number_format($details->product_price).'$'}}</td>
		                                    <td class="text-right">{{number_format($details->product_price*$details->product_sales_quantity).'$'}}</td>
		                                </tr>
		                                @endforeach
		                            </tbody>
		                        </table>
		                    </div>
		                </div>
		                <!--Invoice Details Table End-->

		                
		            </div>
                </div>
            </div>
        </div>
@endsection