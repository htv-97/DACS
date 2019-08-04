<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Http\Response;
// use Illuminate\Routing\ResponseFactory;
use Response;


use Auth;
// use Request;
use App\Slides;
use App\Wish;
use App\Wishlist;
use App\ProductType;
use App\Product;
use App\News;
use App\Cart;
use Session;
class PageController extends Controller
{
    public function getIndex(){
        $slides = Slides::all();
        $productType = ProductType::all();
        $productFeature = Product::where('feature',1)->take(4)->get();
        $productNew = Product::orderBy('id','DESC')->take(4)->get();
        $productSale = Product::where('promotion_price','<>','null')->where('promotion_price','<>','0')->take(4)->get();
        $news = News::orderBy('id','DESC')->take(4)->get();
        return view('page.index',compact('slides','productType','productFeature','productNew','productSale','news'));
    }


    public function getProductType(Request $request,$productType){
                    
        switch ($productType) {
            case 'hot-trends':
                $productType = 'Sản phẩm mới';
                $productList = Product::orderBy('created_at','DESC')->paginate(9);
                return view('page.archive',compact('productList','productType'));
                break;
            case 'feature':
                $productType = "Sản phẩm nổi bật";
                $productList = Product::where('feature','=','1')->paginate(9);
                return view('page.archive',compact('productList','productType'));
                break;
            case 'sale':
                $productType = "Sản phẩm đang giảm giá";
                $productList = Product::where('promotion_price','<>','null')->where('promotion_price','<>','0')->paginate(9);
                return view('page.archive',compact('productList','productType'));
                break;                
            default:
                $type = ProductType::where('name','like',$productType)->firstOrFail();
                $typeImg = $type->image;
                $productList = Product::where('id_type','=',$type->id)->paginate(9);
                return view('page.archive',compact('productList','productType','typeImg'));
                break;
        }
        
                
        


    }
    public function getProductDetail($productName){
        $product = Product::where('name','like',$productName)->FirstOrFail();
        return view('page.productDetail',compact('product'));
    }   
    
    public function getNews($newsTitle){
        $news = News::where('title','like',$newsTitle)->FirstOrFail();
        return view('page.news',compact('news','newsTitle'));
    }
// end get data

// wishlist
    public function getWishlistLoad(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            dd($data);
        }
    }
    public function getWishlistAdd(Request $request,$id){
        $product = Product::findOrFail($id);
        $oldWishlist = SESSION::has('wishlist') ? SESSION::get('wishlist') : null;
        $wishlist = new Wish($oldWishlist); 
        $wishlist->add($product,$id);
        $request->session()->put('wishlist',$wishlist);
        return json_encode($wishlist);        
    }
    public function getWishlistSave(Request $request){
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $oldData = Wishlist::where('id_user','=',$id_user)->delete();
            $data = SESSION::get('wishlist');
            if(!is_null($data)){
                foreach($data->items as $key=>$value){

                    $wishlist = new Wishlist;
                    $wishlist->id_user = $id_user;
                    $wishlist->id_product = $key;
                    $wishlist->save();
                }
            }
            return redirect()->back()->with('success','Lưu danh sách yêu thích thành công');

        }
        else
           return redirect()->route('login-signup')->with('error','Bạn vui lòng đăng nhập tài khoản để lưu danh sách yêu thích');
    }

//   Cart
    public function getAddToCart(Request $request,$id){
        $valueForm = $request->all();
        $product = Product::findOrFail($id);
        if(!empty($valueForm))
            $qty = $valueForm['quantity'];
        else
            $qty = 1;
        $oldCart = SESSION::has('cart') ? SESSION::get('cart') :null;
        $cart = new Cart($oldCart);
        $cart->add($product,$qty,$id);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getDelCart(Request $request,$id){
        $oldCart = SESSION::has('cart') ? SESSION::get('cart') :null;
        $cart = new Cart($oldCart);
        $cart -> removeItem($id);
        $request->session()->put('cart', $cart);
        return json_encode($cart);
    }
    // update Quantity one product
    public function getQtyCart(Request $request,$id){
        $qty = $request->all()['qty'];;
        $oldCart = SESSION::get('cart');
        $cart = new Cart($oldCart);
        $cart->updateQty($id,$qty);
        $request->session()->put('cart',$cart);
        // dd($cart);
        return json_encode($cart);
    }
    public function getQtyOneCart(Request $request,$id){
        $data = $request->all();
        $oldCart = SESSION::get('cart');
        $cart = new Cart($oldCart);
        // if($data['type'] > 0) $cart->increaseByOne($id); //increase..() not working in user reduce to 0 and after them want to increase this . 
        if($data['type'] > 0) {
            $product = Product::find($id);
            $cart->add($product,1,$id);
        }
        else $cart->reduceByOne($id);
        $request->session()->put('cart', $cart);
        return json_encode($cart);

    }     

    public function getShoppingCart(){
        return view('page.shoppingCart');
    }
    public function getForgotSess($ses){
        
        if(SESSION::has($ses)){
            SESSION::forget($ses);
        }
        return redirect()->route('index-page');
    } 
// end cart       

    public function postSearch(Request $request){
        $dataSearch = $request->key;
        $products = Product::where('name','like','%'.$request->key.'%')->orWhere('unit_price',$request->key)->get();
        // dd($dataSearch,count($products));
        return view('page.archiveSearch',compact('products','dataSearch'));
    }



}

