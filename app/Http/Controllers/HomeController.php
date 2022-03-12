<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use Session;


class HomeController extends Controller
{
    

    public function index(Request $request){
        // Seo
        $meta_desc = "Natural Benefits from Jeju Island, Korea. The #1 beauty brand in Korea has officially arrived in the US. Shop now and learn more about Korean beauty secrets, effective skincare routines, and more.";
        $meta_keywords = "Innisfree, Korea, Beauty, Skincare, Mask, Serum";
        $meta_title = "Innisfree Official USA | Korean Beauty Products, Skincare & Makeup | innisfree";
        $url_canonical = $request->url();
        // Seo

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $origin_product = DB::table('tbl_origin')->where('origin_status','1')->orderby('origin_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(5)->get();

        return view('pages.home')->with('category',$cate_product)->with('origin',$origin_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }

    public function search(Request $request){
        // Seo
        $meta_desc = "Natural Benefits from Jeju Island, Korea. The #1 beauty brand in Korea has officially arrived in the US. Shop now and learn more about Korean beauty secrets, effective skincare routines, and more.";
        $meta_keywords = "Innisfree, Korea, Beauty, Skincare, Mask, Serum";
        $meta_title = "Search | Korean Beauty Products, Skincare & Makeup | innisfree";
        $url_canonical = $request->url();
        // Seo
        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $origin_product = DB::table('tbl_origin')->where('origin_status','1')->orderby('origin_id','desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();

        return view('pages.product.search')->with('category',$cate_product)->with('origin',$origin_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }

}