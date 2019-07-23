<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Slides;
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
                $productTypeId = ProductType::where('name','like',$productType)->firstOrFail()->id;
                $productList = Product::where('id_type','=',$productTypeId)->paginate(9);
                return view('page.archive',compact('productList','productType'));
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

    public function getAddToCart(Request $req,$id){
        $product = Product::findOrFail($id);
        $oldCart = Session('cart') ? Session::get('cart') : Null;
        $cart = new Cart($oldCart);
        $cart -> add($product,$id);
        $req -> session() -> put('cart',$cart);
        return redirect()->back();
    }   

    public function getShoppingCart(){
        return view('page.shoppingCart');
    }    
    public function getPopup(){
        return view('page.login-signup');
    }    
    public function getCheckout(){
        return view('page.checkout');
    }
}
