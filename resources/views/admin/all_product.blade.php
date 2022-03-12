@extends('admin_layout')
@section('admin_content')
<!-- Content Body Start -->
        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Product <span>/ Manage Product</span></h3>
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
                                    <th>Product Name</th>
                                    <th>Photo</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                    <th>Origin</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_product as $key => $pro)
                                <tr>
                                    <td>{{$pro->product_name}}</td>
                                    <td><img src="public/upload/product/{{$pro->product_image}}" height="100" width="100"></td>
                                    <td>{{$pro->product_price}}</td>
                                    <td>{{$pro->product_quantity}}</td>
                                    <td>{{$pro->category_name}}</td>
                                    <td>{{$pro->origin_name}}</td>
                                    <td>
                                    	<?php
                                    		if($pro->product_status==0){
                                        ?>
                                    			<a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span class="fa fa-eye-slash"></span></a>
                                        <?php
                                    		}else{
                                        ?>
                                    			<a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span class="fa fa-eye"></span></a>
                                        <?php
                                    		}
                                    	?> 
                                    </td>
                                    <td>
                                        <div class="table-action-buttons">
                                            <a class="edit button button-box button-xs button-info" href="{{URL::to('/edit-product/'.$pro->product_id)}}"><i class="zmdi zmdi-edit"></i></a>
                                            <a onclick="return confirm('Are you sure to delete?')" class="delete button button-box button-xs button-danger" href="{{URL::to('/delete-product/'.$pro->product_id)}}"><i class="zmdi zmdi-delete"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--Manage Product List End-->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end" style="margin:20px 0">
                        {!! $all_product->links() !!}
                    </ul>
                </nav>
            </div>

        </div><!-- Content Body End -->
@endsection