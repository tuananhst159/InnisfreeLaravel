@extends('admin_layout')
@section('admin_content')
<!-- Content Body Start -->
        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Order <span>/ Order Details</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

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
                            <ul>
                                
                                <li> <span>Name</span> <span>{{$ord_by_id->customer_name}}</span> </li>
                                <li> <span>Phone</span> <span>{{$ord_by_id->customer_phone}}</span> </li>

                            </ul>
                        </div>
                        <!--Billing Info End-->

                        <!--Shipping Info Start-->
                        <div class="col-lg-4 col-md-6 col-12 mb-20">
                            <h4 class="mb-25">Order Info</h4>
                            
                            <ul>
                                <li> <span>Name</span> <span>{{$ord_by_id->shipping_name}}</span> </li>
                                <li> <span>Address</span> <span>{{$ord_by_id->shipping_address}}</span> </li>
                                <li> <span>Phone</span> <span>{{$ord_by_id->shipping_phone}}</span> </li>
                                <li> <span>Total</span> <span>{{number_format($ord_by_id->order_total).'$'}}</span> </li>
                                <li> <span>Payment</span> <span>
                                    @if($ord_by_id->payment_method==1)
                                    COD
                                    @else
                                    Paypal
                                    @endif
                                </span> </li>
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
                                        <input type="number" min="1" {{$details->order_status!=1 ? 'disabled' : ''}} class="order_qty_{{$details->product_id}}" name="product_sales_quantity" value="{{$details->product_sales_quantity}}">

                                        <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$details->product_id}}" value="{{$details->product_quantity}}">

                                        <input type="hidden" name="order_id" class="order_id" value="{{$details->order_id}}">

                                        <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->product_id}}">
                                        @if($details->order_status == 1)
                                        <button class="btn btn-outline-success update_quantity_order" data-product_id="{{$details->product_id}}" name="update_quantity_order">Update</button>
                                        @endif
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
            <div class="col-12 mb-15">
                <hr>
            </div>
                @foreach($order_by_id as $key => $ord)
                <div class="col-lg-4 col-12 mb-30">
                <h5 class="title">Status</h5>
                    @if($ord->order_status==1)
                    <form>
                        @csrf
                    <select class="form-control nice-select order_details">
                        <option value="">----Select----</option>
                        <option id="{{$ord->order_id}}" selected value="1">Process</option>
                        <option id="{{$ord->order_id}}" value="2">Shipped</option>
                        <option id="{{$ord->order_id}}" value="3">Cancle</option>
                    </form>
                    @elseif($ord->order_status==2)
                    <form>
                        @csrf
                    <select class="form-control nice-select order_details">
                        <option value="">----Select----</option>
                        <option id="{{$ord->order_id}}" value="1">Process</option>
                        <option id="{{$ord->order_id}}" selected value="2">Shipped</option>
                        <option id="{{$ord->order_id}}" value="3">Cancle</option>
                    </form>
                    @elseif($ord->order_status==3)
                    <form>
                        @csrf
                    <select class="form-control nice-select order_details">
                        <option value="">----Select----</option>
                        <option id="{{$ord->order_id}}" value="1">Process</option>
                        <option id="{{$ord->order_id}}" value="2">Shipped</option>
                        <option id="{{$ord->order_id}}" selected value="3">Cancle</option>
                    </select>
                    </form>
                    @endif
                </div>
                <!--Invoice Action Button Start-->
                {{-- <div class="col-12 d-flex justify-content-end mb-30">
                    <div class="buttons-group">
                        <button type="submit" class="button button-outline button-primary">Update</button>
                    </div>
                </div> --}}
                
                @endforeach
                <!--Invoice Action Button Start-->

        </div><!-- Content Body End -->
@endsection