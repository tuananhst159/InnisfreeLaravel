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

class CheckoutController extends Controller
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

    // $this->AuthLogin();
    //     $order_by_id = DB::table('tbl_order')
    //     ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')->where('tbl_order.order_id',$orderId)->get();
    //     $order_details = DB::table('tbl_order_details')->join('tbl_product','tbl_order_details.product_id','=','tbl_product.product_id')->where('tbl_order.order_id',$orderId)->get();

    //     return view('admin.view_order')->with('order_by_id',$order_by_id)->with('order_details',$order_details)->with('orderId',$orderId);

    // $this->AuthLogin();
    //     $order_by_id = DB::table('tbl_order')
    //     ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
    //     ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
    //     ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
    //     ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*')->first();

    //     $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id);
    //     return view('admin_layout')->with('admin.view_order',$manager_order_by_id);

    // public function view_order($order_id){
    //     $this->AuthLogin();
    //     $order_by_id = DB::table('tbl_order')
    //     ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
    //     ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
    //     ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*')->where('tbl_order.order_id', $order_id)->get();

    //     $order_details = DB::table('tbl_order_details')
    //     ->join('tbl_order','tbl_order.order_id','=','tbl_order_details.order_id')
    //     ->join('tbl_product','tbl_product.product_id','=','tbl_order_details.product_id')
    //     ->select('tbl_order_details.*','tbl_order.*','tbl_product.*')->where('tbl_order.order_id', $order_id)->get();

    //     // $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id);
    //     return view('admin.view_order')->with('order_by_id',$order_by_id)->with('order_details',$order_details);
    // }

    public function login_checkout(Request $request){
        // Seo
        $meta_desc = "Natural Benefits from Jeju Island, Korea. The #1 beauty brand in Korea has officially arrived in the US. Shop now and learn more about Korean beauty secrets, effective skincare routines, and more.";
        $meta_keywords = "Innisfree, Korea, Beauty, Skincare, Mask, Serum";
        $meta_title = "Login & Register | Korean Beauty Products, Skincare & Makeup | innisfree";
        $url_canonical = $request->url();
        // Seo

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $origin_product = DB::table('tbl_origin')->where('origin_status','1')->orderby('origin_id','desc')->get();

        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('origin',$origin_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }

    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect::to('/checkout');
    }

    public function checkout(Request $request){
        // Seo
        $meta_desc = "Natural Benefits from Jeju Island, Korea. The #1 beauty brand in Korea has officially arrived in the US. Shop now and learn more about Korean beauty secrets, effective skincare routines, and more.";
        $meta_keywords = "Innisfree, Korea, Beauty, Skincare, Mask, Serum";
        $meta_title = "Checkout | Korean Beauty Products, Skincare & Makeup | innisfree";
        $url_canonical = $request->url();
        // Seo

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $origin_product = DB::table('tbl_origin')->where('origin_status','1')->orderby('origin_id','desc')->get();

        return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('origin',$origin_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }

    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_notes'] = $request->shipping_notes;
        $data['shipping_phone'] = $request->shipping_phone;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');
    }

    public function payment(Request $request){
        // Seo
        $meta_desc = "Natural Benefits from Jeju Island, Korea. The #1 beauty brand in Korea has officially arrived in the US. Shop now and learn more about Korean beauty secrets, effective skincare routines, and more.";
        $meta_keywords = "Innisfree, Korea, Beauty, Skincare, Mask, Serum";
        $meta_title = "Payment | Korean Beauty Products, Skincare & Makeup | innisfree";
        $url_canonical = $request->url();
        // Seo
        // 
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $origin_product = DB::table('tbl_origin')->where('origin_status','1')->orderby('origin_id','desc')->get();

        return view('pages.checkout.payment')->with('category',$cate_product)->with('origin',$origin_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }

    public function order_place(Request $request){
        //insert payment method
        // $content = Cart::content();
        // echo $content;
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Process';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert data
        $total = 0;
        foreach(Session::get('cart') as $key => $cart){
        
            $total = $total + $cart['product_price']*$cart['product_qty'];
        }
        
        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = $total;
        $order_data['order_status'] = '1';
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order_data['order_created_at'] = now();
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order details
        foreach(Session::get('cart') as $key => $cart){
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $cart['product_id'];
            $order_d_data['product_name'] = $cart['product_name'];
            $order_d_data['product_price'] = $cart['product_price'];
            $order_d_data['product_sales_quantity'] = $cart['product_qty'];
            DB::table('tbl_order_details')->insertGetId($order_d_data); 
        }

        if($data['payment_method']==1){
            // Seo
            $meta_desc = "Natural Benefits from Jeju Island, Korea. The #1 beauty brand in Korea has officially arrived in the US. Shop now and learn more about Korean beauty secrets, effective skincare routines, and more.";
            $meta_keywords = "Innisfree, Korea, Beauty, Skincare, Mask, Serum";
            $meta_title = "Thank You | Korean Beauty Products, Skincare & Makeup | innisfree";
            $url_canonical = $request->url();
            // Seo
            
            //Clear
            $cart = Session::get('cart');
            Session::forget('cart');
            
            $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
            $origin_product = DB::table('tbl_origin')->where('origin_status','1')->orderby('origin_id','desc')->get();

            return view('pages.checkout.cod')->with('category',$cate_product)->with('origin',$origin_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
        }else{
            echo 'credit card';
        }
        

        // Session::put('shipping_id',$shipping_id);
        // return Redirect::to('/payment');
    }

    public function logout_checkout(){
        Session::flush();
        return Redirect::to('/login-checkout');
    }

    public function login_customer(Request $request){
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();

        if($result){
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/home');
        }else{
            return Redirect::to('/login-checkout')->with('error','Email or Password is incorrect.');
        }
    }

    // public function manage_order(){
    //     $this->AuthLogin();
    //     $all_order = DB::table('tbl_order')
    //     ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
    //     ->select('tbl_order.*','tbl_customers.customer_name')
    //     ->orderby('tbl_order.order_id','desc')->get();
    //     $manager_order = view('admin.manage_order')->with('all_order',$all_order);
    //     return view('admin_layout')->with('admin.manage_order',$manager_order);
    // }

    // public function update_order(Request $request,$order_id){
    //     $data = array();
    //     $data['order_status'] = $request->ord_status;

    //     DB::table('tbl_order')->where('order_id',$order_id)->update($data);
    //     // Session::put('message','Update Product Success!');
    //     return Redirect::to('view_order');
    // }
}
