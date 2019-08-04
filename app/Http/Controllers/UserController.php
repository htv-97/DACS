<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Validator;
use Auth;
use App\Customer;
use App\User;
use App\Bill;
use App\Product;
use App\BillDetail;
use App\Wish;
use App\Wishlist;
class UserController extends Controller
{
    public function getFormLogin(){
        return view('page.login-signup');
    }
    public function postLogin(Request $request){
        // $pass = Hash::make($request->pass);
        // dd($pass,$users,$request->email);
        // $user = User::where('password','=',$request->pass)->first();
        // dd($user,$pass);
        $credentials =  array('email' => $request->email ,'password'=>$request->pass );
        if(Auth::attempt($credentials)){
            $id_user = Auth::user()->id;
            $dbWishlist = Wishlist::where('id_user','=',$id_user)->get('id_product');
            foreach($dbWishlist as $key=>$val)
            {
                $product = Product::find($val->id_product);
                $oldWishlist = Session::has('wishlist') ? SESSION::get('wishlist') :null;
                $wishlist = new Wish($oldWishlist);
                $wishlist->add($product,$val->id_product);
                $request->session()->put('wishlist', $wishlist);
            }
            return redirect()->back();
        }
        else {
            return redirect()->back()->with(['errorLogin'=>'error','message'=>'Tài khoản không đúng!']);
        }

    }
    // controll account
    public function getLogout(){
        Auth::logout();
        return redirect()->route('index-page');
    }  
    public function postSignup(Request $request){
        $validator = Validator::make($request->all(),[
            'username' => 'required|alpha|min:4',
            'email' => 'required|unique:users,email|email',
            'pass' => 'required|alpha_num|min:4',
            'gender'=> 'required'
            // 'password_confirmation' => 'bail|required|same:password',
        ],[
            'username.required' => 'Vui lòng nhập tên!',
            'username.alpha' => 'Tên bạn là chữ!',
            'username.min' => 'Vui lòng nhập đầy đủ họ và tên',
            'email.required' => 'Vui lòng nhập email!',
            'username.email' => 'Đây không phải là email',
            'email.unique' =>'Email đã có người dùng rồi',
            'pass.required' => 'Vui lòng nhập mật khẩu',
            'pass.min' => 'Vui lòng nhập mật khẩu trên 4 ký tự',
            'pass.alpha_num' => 'Vui lòng nhập mật khẩu gồm chữ và số)',
            'pass.required' => 'Vui lòng nhập mật khẩu'
        ]);
        if ($validator->fails()) {
            // dd('err',$validator)->withErrors($validator);
            return redirect()->back()->withErrors($validator);
        }    
        $user = new User;
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->pass);
        $user->gender = $request->gender;
        $user->save();
        return redirect()->back()->with('signupAlert','Đã tạo tài khoản '.$user->name.' thành công!');
    } 
    public function getCheckout(){
        return view('page.checkout');
    }
    public function postCheckout(Request $req){
        if(SESSION::has('cart')){
            $cart = SESSION::get('cart');
            $customer = new Customer;
            $customer->name = $req->name;
            $customer->email = $req->email;
            $customer->gender = $req->gender;
            $customer->address = $req->address;
            $customer->phone = $req->phone;
            $customer->save();

            $bill = new Bills;
            $bill->id_customer = $customer->id;
            $bill->date_order = date('Y-m-d');
            $bill->total = $cart->totalPrice;
            $bill->payment = $req->payment;
            $bill->save();
            foreach ($cart->items as $key => $value) {
                $billDetail = new BillDetail;
                $billDetail->id_bill = $bill->id;
                $billDetail->id_product = $key;
                $billDetail->quantity = $value['qty'];
                $billDetail->unit_price = $value['price']/$value['qty'];
                $billDetail->save();
            }
            SESSION::pull('cart','default');
            return redirect()->back()->with('checkout-success','Đã gửi thông tin thanh toán thành công!!!');
        }
        else{
            return redirect()->back();
        }

    }
    //end account   
}
