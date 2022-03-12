@extends('admin_layout')
@section('admin_content')
<!-- Content Body Start -->
        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Origin <span>/ Edit Origin</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <!-- Add or Edit Product Start -->
            <div class="add-edit-product-wrap col-12">
                @foreach($edit_origin_product as $key => $edit_value)
                <div class="add-edit-product-form">
                    <form action="{{URL::to('/update-origin-product/'.$edit_value->origin_id)}}" method="post">
                        {{csrf_field()}}
                                <?php
                                $message = Session::get('message');
                                if($message){
                                    echo'<div class="alert alert-success" role="alert">'.$message.'</div>';
                                    Session::put('message',null);
                                }
                                ?>
                        <h4 class="title">About Origin</h4>
                        <div class="row">
                            <div class="col-lg-6 col-12 mb-30">
                                <h4 class="title">Origin Name</h4>
                                <input class="form-control" name="origin_product_name" type="text" value="{{$edit_value->origin_name}}" data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill in the Origin Name. The input value is shorter than 4 characters.">
                            </div>
                            <div class="col-12 mb-30">
                                <h4 class="title">Origin Description</h4>
                                <textarea style="resize: none;" rows="8" class="form-control" name="origin_product_desc" data-validation="length" data-validation-length="min5" data-validation-error-msg="Please fill in the Origin Description. The input value is shorter than 5 characters.">{{$edit_value->origin_desc}}</textarea>
                            </div>
                            <div class="col-12 mb-30">
                                <h4 class="title">Origin Keywords</h4>
                                <textarea style="resize: none;" rows="8" class="form-control" name="origin_product_keywords" data-validation="length" data-validation-length="min5" data-validation-error-msg="Please fill in the Origin Keywords. The input value is shorter than 5 characters.">{{$edit_value->meta_keywords}}</textarea>
                            </div>
                        </div>

                        <!-- Button Group Start -->
                        <div class="row">
                            <div class="d-flex flex-wrap justify-content-end col-12 mbn-10">
                                <button class="button button-outline button-primary mb-10 ml-10 mr-0" name="update_origin_product">Update</button>
                            </div>
                        </div><!-- Button Group End -->

                    </form>
                </div>
                @endforeach
            </div><!-- Add or Edit Product End -->

        </div><!-- Content Body End -->
        <!-- Plugins & Activation JS For Only This Page -->
        <script src="{{asset('public/backend/assets/js/plugins/nice-select/jquery.nice-select.min.js')}}" defer></script>
        <script src="{{asset('public/backend/assets/js/plugins/nice-select/niceSelect.active.js')}}" defer></script>
        <script src="{{asset('public/backend/assets/js/plugins/filepond/filepond.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/js/plugins/filepond/filepond-plugin-image-exif-orientation.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/js/plugins/filepond/filepond-plugin-image-preview.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/js/plugins/filepond/filepond.active.js')}}" defer></script>
@endsection