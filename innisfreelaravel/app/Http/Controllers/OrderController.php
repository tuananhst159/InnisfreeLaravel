<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
session_start();

class OrderController extends Controller
{
    public function cancel_order(Request $request){
        $data = $request->all();
        $order = Order::where('order_id',$data['id'])->first();

        $order->order_destroy = $data['lydo'];
        $order->order_status = 3;
        $order->save();
    }

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('admin')->send();
        }
    }

    public function manage_order(){
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manage_order',$manager_order);
    }

    public function view_order($order_id){
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_payment.*')->where('tbl_order.order_id', $order_id)->get();

        $order_details = DB::table('tbl_order_details')
        ->join('tbl_order','tbl_order.order_id','=','tbl_order_details.order_id')
        ->join('tbl_product','tbl_product.product_id','=','tbl_order_details.product_id')
        ->select('tbl_order_details.*','tbl_order.*','tbl_product.*')->where('tbl_order.order_id', $order_id)->get();

        // $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id);
        return view('admin.view_order')->with('order_by_id',$order_by_id)->with('order_details',$order_details);
    }

    public function update_order_qty(Request $request){
        $data = $request->all();
        //update order
        $order = Order::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->save();

        if($order->order_status==2){
            foreach($data['order_product_id'] as $key => $product_id){
                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                foreach($data['quantity'] as $key2 => $qty){

                    if($key == $key2){
                        $pro_remain = $product_quantity - $qty;
                        $product->product_quantity = $pro_remain;
                        $product->product_sold = $product_sold + $qty;
                        $product->save();
                        
                    }
                }
                

            }
        }elseif($order->order_status!=2 && $order->order_status!=1){
            foreach($data['order_product_id'] as $key => $product_id){
                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                foreach($data['quantity'] as $key2 => $qty){

                    if($key == $key2){
                        $pro_remain = $product_quantity + $qty;
                        $product->product_quantity = $pro_remain;
                        $product->product_sold = $product_sold - $qty;
                        $product->save();

                    }
                }

            }
        }
    }

    public function update_qty(Request $request){
        $data = $request->all();
        $order_details = OrderDetails::where('product_id',$data['order_product_id'])->where('order_id',$data['order_id'])->first();
        $order = Order::find($data['order_id']);
        $order_total_draft = $order->order_total - $order_details->product_price*$order_details->product_sales_quantity;

        $order_details->product_sales_quantity = $data['order_qty'];
        $order_details->save();

        $order->order_total = $order_total_draft + $order_details->product_price*$order_details->product_sales_quantity;
        $order->save();
    }

    public function history(Request $request){
        if(!Session::get('customer_id')){
            return Redirect::to('/login-checkout')->with('error','Please Sign in or Register.');
        }else{
            // Seo
            $meta_desc = "Natural Benefits from Jeju Island, Korea. The #1 beauty brand in Korea has officially arrived in the US. Shop now and learn more about Korean beauty secrets, effective skincare routines, and more.";
            $meta_keywords = "Innisfree, Korea, Beauty, Skincare, Mask, Serum";
            $meta_title = "Order History | Korean Beauty Products, Skincare & Makeup | innisfree";
            $url_canonical = $request->url();
            // Seo
            
            $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
            $origin_product = DB::table('tbl_origin')->where('origin_status','1')->orderby('origin_id','desc')->get();
        
            $get_order = Order::where('customer_id',Session::get('customer_id'))->orderby('order_id','desc')->get();
            return view('pages.history.history')->with('category',$cate_product)->with('origin',$origin_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with(compact('get_order'));
        }
    }

    public function view_history_order(Request $request, $order_id){
        if(!Session::get('customer_id')){
            return Redirect::to('/login-checkout')->with('error','Please Sign in or Register.');
        }else{
            // Seo
            $meta_desc = "Natural Benefits from Jeju Island, Korea. The #1 beauty brand in Korea has officially arrived in the US. Shop now and learn more about Korean beauty secrets, effective skincare routines, and more.";
            $meta_keywords = "Innisfree, Korea, Beauty, Skincare, Mask, Serum";
            $meta_title = "Order History | Korean Beauty Products, Skincare & Makeup | innisfree";
            $url_canonical = $request->url();
            // Seo
            
            $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
            $origin_product = DB::table('tbl_origin')->where('origin_status','1')->orderby('origin_id','desc')->get();

            $order_by_id = DB::table('tbl_order')
            ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
            ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
            ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*')->where('tbl_order.order_id', $order_id)->get();

            $order_details = DB::table('tbl_order_details')
            ->join('tbl_order','tbl_order.order_id','=','tbl_order_details.order_id')
            ->join('tbl_product','tbl_product.product_id','=','tbl_order_details.product_id')
            ->select('tbl_order_details.*','tbl_order.*','tbl_product.*')->where('tbl_order.order_id', $order_id)->get();

            return view('pages.history.view_history_order')->with('category',$cate_product)->with('origin',$origin_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('order_by_id',$order_by_id)->with('order_details',$order_details);
        }
    }

}
