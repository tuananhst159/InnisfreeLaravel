@extends('admin_layout')
@section('admin_content')
<!-- Content Body Start -->
        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Category <span>/ Manage Category</span></h3>
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
                                    <th>Category Name</th>
                                    <th>Category Description</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($all_category_product as $key => $cate_pro)
                                <tr>
                                    <td>{{$cate_pro->category_name}}</td>
                                    <td>{{$cate_pro->category_desc}}</td>
                                    <td>
                                    	<?php
                                    		if($cate_pro->category_status==0){
                                        ?>
                                    			<a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"><span class="fa fa-eye-slash"></span></a>
                                        <?php
                                    		}else{
                                        ?>
                                    			<a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><span class="fa fa-eye"></span></a>
                                        <?php
                                    		}
                                    	?> 
                                    </td>
                                    <td>
                                        <div class="table-action-buttons">
                                            <a class="edit button button-box button-xs button-info" href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}"><i class="zmdi zmdi-edit"></i></a>
                                            <a onclick="return confirm('Are you sure to delete?')" class="delete button button-box button-xs button-danger" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}"><i class="zmdi zmdi-delete"></i></a>
                                        </div>
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