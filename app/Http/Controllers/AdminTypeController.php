<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\ProductType;
use Validator;
use File;
class AdminTypeController extends Controller
{
    // productType
    public function showList(){
        $list = ProductType::orderBy('id','desc')->get();
        return view('admin.page.product-type.list',compact('list'));
    }
    public function postEdit(Request $res){
        $type = ProductType::find($res->id);
        if($res->hasFile('image')){
            $validation = Validator::make($res->all(),[
                'image' => 'image|max:2048'
            ],[
                'image.image'=> 'Đây không phải là hình ảnh',
                'image.max' => 'file không được vượt quá 2Mb'
            ]);
            if($validation->passes()){
                $file = $res->file('image');
                $name = $file->getClientOriginalName();
                $newName = str_random(4)."_".$name;
                while(file_exists('source/image/product/'.$newName)){
                    $newName = str_random(5)."_".$name;
                }
                $file->move("source/image/product",$newName);
            }
            else{
               return response()->json(['mess'=>$validation->errors()->all(),
                                        'type'=>'error']);
            }

        }
        else{
            $newName = $type->image;
        }
        FILE::delete('source/image/product/'.$type->image);
        $type->image = $newName;
        $type->name = $res->name;
        $type->save();
        
        return response()->json(['mess'=>'uploaded','type'=>'success',
                                'newImg'=>$newName]);
       



    }
    public function getDel(Request $res){
        $data = ProductType::findOrFail($res->id);
        $path = 'source/image/product/'.$data->image;
        // dd($data->image,file_exists($path),$path);
        if(file_exists($path)){
            File::delete($path);
        }
        $data->delete();
        return response()->json(['mess'=>'Đã xóa '.$data->name.' thành công!']);
    }
    public function getCreate(Request $res){
            $validation = Validator::make($res->all(),
            [
                'image'=>'bail|required|image|max:2048',
                'name'=>'bail|required|unique:type_products,name|max:10'
            ],
            [
                'name.required'   =>  'Bạn chưa khai báo tên thể loại muốn tạo! ',
                'name.unique'   =>  'Vui lòng chọn thể loại khác! Web đã có loại này rồi! ',
                'name.max'   =>  'Tên chỉ tối đa 10 ký tự! ',
                'image.bail'   =>  'Dung lượng ảnh không được quá 2Mb! ',
                'image.required'=>'Bạn chưa chọn ảnh đại diện cho thể loại! ',
                'image.image' => 'File bạn chọn không phải ảnh!',
                'image.max'   =>  'Dung lượng ảnh không được quá 2Mb!',
            ]);
        if($validation->passes()){
            $file = $res->file('image');
            $name = $file->getClientOriginalName();                        
            $newName = str_random(4).'_'.$name;
            while(file_exists('source/image/product'.$newName)){
                $newName = str_random(5).'_'.$name;
            }
            $file->move('source/image/product',$newName);
        }
        else{
            return  response()->Json(['type' => 'error',
                                    'mess' => $validation->errors()->all()
                                    ]);
        }
        $type = new ProductType;
        $type->name = $res->name;
        $type->image = $newName;
        $type->save(); 
        return  response()->Json(['type' => 'success',
                                'mess' => 'Đã thêm loại '.$type->name .' thành công!!!'
                                ]);
    }
}
