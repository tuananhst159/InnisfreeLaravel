@extends('admin_layout')
@section('admin_content')
<!-- Content Body Start -->
        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Order <span>/ Manage Order</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->
            <?php
            $message = Session::get('message');
            if($message){
                echo'<div class="alert alert-success" role="alert">'.$message.'</div>';
                Session::put('message',null);
            }
            ?>

            <div class="row">

                <!--Manage Product List Start-->
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-vertical-middle">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Total</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Reason Canceled</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($all_order as $key => $order)
                                <tr>
                                    <td>{{$order->customer_name}}</td>
                                    <td>{{number_format($order->order_total).'$'}}</td>
                                    <td>{{$order->order_created_at}}</td>
                                    <td>
                                        @if($order->order_status==1)
                                            <span class="badge badge-round badge-primary">Process</span>
                                        @elseif($order->order_status==2)
                                            <span class="badge badge-round badge-success">Shipped</span>
                                        @elseif($order->order_status==3)
                                            <span class="badge badge-round badge-danger">Cancle</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="table-action-buttons">
                                            <a class="edit button button-box button-xs button-info" href="{{URL::to('/view-order/'.$order->order_id)}}"><i class="zmdi zmdi-edit"></i></a>
                                            {{-- <a onclick="return confirm('Are you sure to delete?')" class="delete button button-box button-xs button-danger" href="{{URL::to('/delete-order/'.$order->order_id)}}"><i class="zmdi zmdi-delete"></i></a> --}}
                                        </div>
                                    </td>
                                    <td>
                                        @if($order->order_status==3)
                                            {{$order->order_destroy}}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Manage Product List End-->

            </div>

        </div><!-- Content Body End -->
@endsection