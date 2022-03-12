<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

session_start();

class OriginProduct extends Controller
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

    public function add_origin_product(){
        $this->AuthLogin();
        return view('admin.add_origin_product');
    }

    public function all_origin_product(){
        $this->AuthLogin();
        $all_origin_product = DB::table('tbl_origin')->get();
        $manager_origin_product = view('admin.all_origin_product')->with('all_origin_product',$all_origin_product);
        return view('admin_layout')->with('admin.all_origin_product',$manager_origin_product);
    }

    public function save_origin_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['origin_name'] = $request->origin_product_name;
        $data['origin_desc'] = $request->origin_product_desc;
        $data['meta_keywords'] = $request->origin_product_keywords;
        $data['origin_status'] = $request->origin_product_status;

        DB::table('tbl_origin')->insert($data);
        Session::put('message','Add Origin Product Success!');
        return Redirect::to('add-origin-product');
    }

    public function unactive_origin_product($origin_product_id){
        $this->AuthLogin();
        DB::table('tbl_origin')->where('origin_id',$origin_product_id)->update(['origin_status'=>0]);
        Session::put('message','Unactive Success!');
        return Redirect::to('all-origin-product');

    }

    public function active_origin_product($origin_product_id){
        $this->AuthLogin();
        DB::table('tbl_origin')->where('origin_id',$origin_product_id)->update(['origin_status'=>1]);
        Session::put('message','Active Success!');
        return Redirect::to('all-origin-product');
    }

    public function edit_origin_product($origin_product_id){
        $this->AuthLogin();
        $edit_origin_product = DB::table('tbl_origin')->where('origin_id',$origin_product_id)->get();
        $manager_origin_product = view('admin.edit_origin_product')->with('edit_origin_product',$edit_origin_product);
        return view('admin_layout')->with('admin.edit_origin_product',$manager_origin_product);
    }

    public function update_origin_product(Request $request,$origin_product_id){
        $this->AuthLogin();
        $data = array();
        $data['origin_name'] = $request->origin_product_name;
        $data['origin_desc'] = $request->origin_product_desc;
        $data['meta_keywords'] = $request->origin_product_keywords;

        DB::table('tbl_origin')->where('origin_id',$origin_product_id)->update($data);
        Session::put('message','Update Origin Product Success!');
        return Redirect::to('all-origin-product');
    }

    public function delete_origin_product($origin_product_id){
        $this->AuthLogin();
        DB::table('tbl_origin')->where('origin_id',$origin_product_id)->delete();
        Session::put('message','Delete Origin Product Success!');
        return Redirect::to('all-origin-product');
    }

    // // End Function Admin Pages
    
    public function show_origin_home(Request $request,$origin_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $origin_product = DB::table('tbl_origin')->where('origin_status','1')->orderby('origin_id','desc')->get();
        $origin_by_id = DB::table('tbl_product')->join('tbl_origin','tbl_product.origin_id','=','tbl_origin.origin_id')->where('tbl_product.origin_id',$origin_id)->get();
        foreach($origin_by_id as $key => $val){
            $meta_desc = $val->origin_desc;
            $meta_keywords = $val->meta_keywords;
            $meta_title = "$val->origin_name | Korean Beauty Products, Skincare & Makeup | innisfree";
            $url_canonical = $request->url();
        }

        $origin_name = DB::table('tbl_origin')->where('tbl_origin.origin_id',$origin_id)->limit(1)->get();

        return view('pages.origin.show_origin')->with('category',$cate_product)->with('origin',$origin_product)->with('origin_by_id',$origin_by_id)->with('origin_name',$origin_name)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }
}
