<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Cart;
session_start();

class CartController extends Controller
{
    public function show_cart_ajax(Request $request){
        // Seo
        $meta_desc = "Natural Benefits from Jeju Island, Korea. The #1 beauty brand in Korea has officially arrived in the US. Shop now and learn more about Korean beauty secrets, effective skincare routines, and more.";
        $meta_keywords = "Innisfree, Korea, Beauty, Skincare, Mask, Serum";
        $meta_title = "Cart | Korean Beauty Products, Skincare & Makeup | innisfree";
        $url_canonical = $request->url();
        // Seo
        
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $origin_product = DB::table('tbl_origin')->where('origin_status','1')->orderby('origin_id','desc')->get();
        return view('pages.cart.cart_ajax')->with('category',$cate_product)->with('origin',$origin_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }

    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart =  Session::get('cart');
        $ses_id = 0;
        if($cart==true){
            $is_aviable = 0;
            //Kiểm tra sp mới có trùng với sp có trong session cart
            foreach($cart as $key => $val){
                if($val['product_id'] == $data['cart_product_id'] ){
                    $is_aviable++;
                    $ses_id=$key;
                }
            }
            //Nếu không có trùng trong giỏ hàng thì tạo cart mới thêm vào
            if($is_aviable==0){

                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );

                Session::put('cart',$cart);
            }else{
                //Nếu có sp trùng thì cộng dồn số lượng 
                $cart[$ses_id]['product_qty'] = $cart[$ses_id]['product_qty'] + $data['cart_product_qty'];
                Session::put('cart',$cart);

            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
            );
        }

        Session::put('cart',$cart);
        Session::save();
    }

    public function del_product($session_id){
        $cart = Session::get('cart');
        if($cart == true){
            foreach($cart as $key =>$val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return Redirect()->back()->with('message','Delete product success!');
        }
        else{
            return Redirect()->back()->with('message','Delete product fail!');
        }
    }

    public function update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart == true){
            foreach($data['cart_qty'] as $key => $qty){
                foreach($cart as $session => $val){
                    if($val['session_id']==$key){
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session::put('cart',$cart);
            return Redirect()->back()->with('message','Update product success!');
        }
        else{
            return Redirect()->back()->with('message','Update product fail!');
        }
    }


    public function save_cart(Request $request){
        $productId = $request->productid_hidden;
        $quantity = $request->qty;

        
        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first();
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = '123';
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        
        // Cart::destroy();
        return Redirect::to('/show-cart');

        // return view('pages.cart.show_cart')->with('category',$cate_product)->with('origin',$origin_product);
    }

    public function show_cart(Request $request){
        // Seo
        $meta_desc = "Natural Benefits from Jeju Island, Korea. The #1 beauty brand in Korea has officially arrived in the US. Shop now and learn more about Korean beauty secrets, effective skincare routines, and more.";
        $meta_keywords = "Innisfree, Korea, Beauty, Skincare, Mask, Serum";
        $meta_title = "Cart | Korean Beauty Products, Skincare & Makeup | innisfree";
        $url_canonical = $request->url();
        // Seo
        
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $origin_product = DB::table('tbl_origin')->where('origin_status','1')->orderby('origin_id','desc')->get();
        return view('pages.cart.show_cart')->with('category',$cate_product)->with('origin',$origin_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }

    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }

    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
}
