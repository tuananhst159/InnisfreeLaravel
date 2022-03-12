@extends('admin_layout')
@section('admin_content')
<!-- Content Body Start -->
        <div class="content-body">

            <!-- Page Headings Start -->
            <div class="row justify-content-between align-items-center mb-10">

                <!-- Page Heading Start -->
                <div class="col-12 col-lg-auto mb-20">
                    <div class="page-heading">
                        <h3>Product <span>/ Add Product</span></h3>
                    </div>
                </div><!-- Page Heading End -->

            </div><!-- Page Headings End -->

            <!-- Add or Edit Product Start -->
            <div class="add-edit-product-wrap col-12">

                <div class="add-edit-product-form">
                    <form action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                                <?php
                                $message = Session::get('message');
                                if($message){
                                    echo'<div class="alert alert-success" role="alert">'.$message.'</div>';
                                    Session::put('message',null);
                                }
                                ?>
                        <h4 class="title">About Product</h4>
                        <div class="row">
                            <div class="col-lg-6 col-12 mb-30">
                                <h4 class="title">Product Name</h4>
                                <input class="form-control" name="product_name" type="text" placeholder="Product Name / Title*" data-validation="length" data-validation-length="min4" data-validation-error-msg="Please fill in the Product Name. The input value is shorter than 4 characters.">
                            </div>
                            <div class="col-lg-6 col-12 mb-30">
                                <h4 class="title">Product Price</h4>
                                <input class="form-control" name="product_price" type="text" placeholder="Product Price*" data-validation="number" data-validation-error-msg="Please fill in the Product Price.">
                            </div>
                            <div class="col-lg-6 col-12 mb-30">
                                <h4 class="title">Product Quantity</h4>
                                <input class="form-control" name="product_quantity" type="text" placeholder="Product Quantity*" data-validation="number" data-validation-error-msg="Please fill in the Product Quantity.">
                            </div>
                            <div class="col-12 mb-30">
                                <h4 class="title">Product Description</h4>
                                <textarea style="resize: none;" rows="8" class="form-control" name="product_desc" placeholder="Product Description*" id="ckeditor" {{-- data-validation="length" data-validation-length="min10" data-validation-error-msg="Please fill in the Product Description. The input value is shorter than 10 characters." --}}></textarea>
                            </div>
                            <div class="col-12 mb-30">
                                <h4 class="title">Product Content</h4>
                                <textarea style="resize: none;" rows="8" class="form-control" name="product_content" placeholder="Product Content*" id="ckeditor1" {{-- data-validation="length" data-validation-length="min10" data-validation-error-msg="Please fill in the Product Content. The input value is shorter than 10 characters." --}}></textarea>
                            </div>
                            <div class="col-12 mb-30">
                                <h4 class="title">Product Keywords</h4>
                                <textarea style="resize: none;" rows="8" class="form-control" name="product_keywords" placeholder="Product Keywords*" {{-- data-validation="length" data-validation-length="min10" data-validation-error-msg="Please fill in the Product Content. The input value is shorter than 10 characters." --}}></textarea>
                            </div>
                            <div class="col-lg-6 col-12 mb-30">
                                <h4 class="title">Category</h4>
                                <select class="form-control select2" name="product_cate">
                                    @foreach($cate_product as $key => $cate)
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 col-12 mb-30">
                                <h4 class="title">Origin</h4>
                                <select class="form-control select2" name="product_origin">
                                    @foreach($origin_product as $key => $origin)
                                    <option value="{{$origin->origin_id}}">{{$origin->origin_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 col-12 mb-30">
                                <h4 class="title">Active</h4>
                                <select class="form-control select2" name="product_status">
                                    <option value="1">Public</option>
                                    <option value="0">Hide</option>
                                </select>
                            </div>
                        </div>

                        <h4 class="title">Product Gallery</h4>

                        <div class="product-upload-gallery row flex-wrap">
                            <div class="col-12 mb-30">
                                <p class="form-help-text mt-0">Upload Maximum 800 x 800 px & Max size 2mb.</p>
                                <input class="dropify" type="file" name="product_image" {{-- data-validation="mime size required" data-validation-allowing="jpg, png" data-validation-max-size="300kb" data-validation-error-msg-required="No image selected" --}}>
                            </div>
                        </div>

                        <!-- Button Group Start -->
                        <div class="row">
                            <div class="d-flex flex-wrap justify-content-end col-12 mbn-10">
                                <button class="button button-outline button-primary mb-10 ml-10 mr-0" name="add_product">Save</button>
                            </div>
                        </div><!-- Button Group End -->

                    </form>
                </div>

            </div><!-- Add or Edit Product End -->

        </div><!-- Content Body End -->
        <!-- Plugins & Activation JS For Only This Page -->
        <script src="{{asset('public/backend/assets/js/plugins/nice-select/jquery.nice-select.min.js')}}" defer></script>
        <script src="{{asset('public/backend/assets/js/plugins/nice-select/niceSelect.active.js')}}" defer></script>
        <script src="{{asset('public/backend/assets/js/plugins/filepond/filepond.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/js/plugins/filepond/filepond-plugin-image-exif-orientation.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/js/plugins/filepond/filepond-plugin-image-preview.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/js/plugins/filepond/filepond.active.js')}}" defer></script>
        {{-- <script src="{{asset('public/backend/assets/js/plugins/ckeditor/ckeditor.js')}}" defer></script> --}}
        <script src="{{URL::to('//cdn.ckeditor.com/4.16.2/full/ckeditor.js')}}"></script>
        <script>
            CKEDITOR.replace('ckeditor');
            CKEDITOR.replace('ckeditor1');
        </script>
@endsection