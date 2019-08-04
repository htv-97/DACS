<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
// use Illuminate\Pagination\Paginator;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\ProductType;
use App\Product;
use Validator;
use File;
class AdminProductController extends Controller
{
    // productType
    public function showList(){
        $currentType = ProductType::first()->id;
        $list = Product::orderBy('created_at','desc')->where('id_type',$currentType)->get();
        return view('admin.page.product.list',compact('list','currentType'));
    }
    public function showListType(){
        $id=Input::get('id');
        $type = ProductType::find($id);
        $list = Product::orderBy('created_at','desc')->where('id_type',$id)->get();
        return response()->json(['list'=>$list,'type'=>$type]);
    }
    public function getDel(){
        $id = Input::get('id');
        Product::find($id)->delete();
        return response()->json(['mess'=>'Xóa thành công!'], 200);
    }
    public function getDetail($id){
        $product = Product::findOrFail($id);
        return view('admin.page.product.detail',compact('product'));
    }
    public function postEdit(ProductRequest $res){
        $data = $res->validated(); 
        $product = ($res->id !== null) ?  Product::findOrFail($res->id) : new Product;
        $product->name = $res->name;
        $product->unit_price = $res->unit_price;
        $product->promotion_price = $res->promotion_price;
        $product->description = $res->description;
        $product->id_type = $res->id_type;
        if($res->hasFile('image')){
            $file = $res->file('image');
            $imgName = $file->getClientOriginalName();
            $newName = 'product_'.str_random(4).'_'.$imgName;
            while(file_exists('source/image/product'.$newName)){
                $newName = 'product_'.str_random(5).'_'.$imgName;
            }
            $file->move('source/image/product',$newName);
            if($product->image !== 'default.jpg')
                File::delete('source/image/product/'.$product->image);
            $product->image = $newName;
        }
        $product->save();
        return response()->json(['product'=>$product]);
    }
    public function getNew(){
        return view('admin.page.product.create');
    }

}
