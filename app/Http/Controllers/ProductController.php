<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

session_start();

class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('admin')->send();
        }
    }

    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $origin_product = DB::table('tbl_origin')->orderby('origin_id','desc')->get();

        return view('admin.add_product')->with('cate_product',$cate_product)->with('origin_product',$origin_product);
    }

    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_origin','tbl_origin.origin_id','=','tbl_product.origin_id')
        ->orderby('tbl_product.product_id','desc')->paginate(5);
        // $manager_product = view('admin.all_product')->with('all_product',$all_product);
        // return view('admin_layout')->with('admin.all_product',$manager_product);
        return view('admin.all_product')->with(compact('all_product'));
    }

    public function save_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['meta_keywords'] = $request->product_keywords;
        $data['category_id'] = $request->product_cate;
        $data['origin_id'] = $request->product_origin;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');

        if($get_image){
            $get_name = $get_image->getClientOriginalName();
            $name = current(explode('.',$get_name));
            $new_image = $name.time() .'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Add Product Success!');
            return Redirect::to('add-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Add Product Fail!');
        return Redirect::to('add-product');
    }

    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Unactive Success!');
        return Redirect::to('all-product');

    }

    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Active Success!');
        return Redirect::to('all-product');
    }

    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $origin_product = DB::table('tbl_origin')->orderby('origin_id','desc')->get();
        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('origin_product',$origin_product);

        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }

    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['meta_keywords'] = $request->product_keywords;
        $data['category_id'] = $request->product_cate;
        $data['origin_id'] = $request->product_origin;
        $get_image = $request->file('product_image');

        if($get_image){
            $get_name = $get_image->getClientOriginalName();
            $name = current(explode('.',$get_name));
            $new_image = $name.time() .'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Update Product Success!');
            return Redirect::to('all-product');
        }
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Update Product Success!');
        return Redirect::to('all-product');
    }

    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','Delete Product Success!');
        return Redirect::to('all-product');
    }

    // End Function Admin Pages
    
    public function product_details(Request $request,$product_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $origin_product = DB::table('tbl_origin')->where('origin_status','1')->orderby('origin_id','desc')->get();
        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_origin','tbl_origin.origin_id','=','tbl_product.origin_id')
        ->where('tbl_product.product_id',$product_id)->get();

        foreach($details_product as $key =>$value){
            $category_id = $value->category_id;
            $meta_desc = $value->product_desc;
            $meta_keywords = $value->meta_keywords;
            $meta_title = "$value->product_name | Korean Beauty Products, Skincare & Makeup | innisfree";
            $url_canonical = $request->url();
        }

        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_origin','tbl_origin.origin_id','=','tbl_product.origin_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();

        return view('pages.product.show_details')->with('category',$cate_product)->with('origin',$origin_product)->with('product_details',$details_product)->with('relate',$related_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
}
