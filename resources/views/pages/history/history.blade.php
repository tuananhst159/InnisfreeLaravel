@extends('layout')
@section('content')
<!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>Order History</h3>
                    <ul>
                        <li><a href="{{URL::to('/home')}}">Home</a></li>
                        <li class="active">Order History</li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
         <!-- shopping-cart-area start -->
        <div class="cart-main-area ptb-100">
            <div class="container">
                <h3 class="page-title">Order List</h3>
                <div class="row">
                    <!--Manage Product List Start-->
	                <div class="col-12">
	                    <div class="table-responsive">
	                        <table class="table table-vertical-middle">
	                            <thead>
	                                <tr>
	                                    <th>Order ID</th>
	                                    <th>Total</th>
	                                    <th>Order Date</th>
	                                    <th>Status</th>
	                                    <th>View</th>
	                                    <th>Cancel</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            	@foreach($get_order as $key => $order)
	                                <tr>
	                                    <td>{{$order->order_id}}</td>
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
	                                            <a class="edit button button-box button-xs button-info" href="{{URL::to('/view-history-order/'.$order->order_id)}}"><i class="fa fa-pencil"></i></a>
	                                            {{-- <a class="cancel button button-box button-xs button-info" href="{{URL::to('/view-history-order/'.$order->order_id)}}"><i class="fa fa-times"></i></a> --}}
	                                   		</div>
	                                   	</td>
	                                   	<td>
	                                        <!-- Button to Open the Modal -->
	                                        @if($order->order_status!=3 && $order->order_status!=2)
											<button type="button" class="btn btn-danger button-xs" data-toggle="modal" data-target="#huydon">Cancel Order</button>
											@endif
													<!-- Modal -->
											<form>
												@csrf
											<div class="modal fade" id="huydon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											  <div class="modal-dialog" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        <h5 class="modal-title" id="exampleModalLabel">Reasons for cancelling Order</h5>
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											          <span aria-hidden="true">&times;</span>
											        </button>
											      </div>
											      <div class="modal-body">
											        <textarea class="lydohuydon" rows="5" required placeholder="Reasons..."></textarea>
											      </div>
											      <div class="modal-footer">
											        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											        <button type="button" id="{{$order->order_id}}" onclick="Huydonhang(this.id)" class="btn btn-danger">Send cancel</button>
											      </div>
											    </div>
											  </div>
											</div>
											</form>
	                                    </td>
	                                </tr>
	                                @endforeach
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
                <!--Manage Product List End-->
                	{{-- <div class="pagination pagination-sm m-t-none m-b-none">
                        {!! $get_order->links() !!}
                    </div> --}}
                </div>
                    
            </div>
        </div>
@endsection