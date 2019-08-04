<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Request;
// use Response;
use File;
use Validator;
use App\Slides;
class AdminSlideController extends Controller
{
    public function showSlide(){
        $imgs = Slides::orderBy('id','DESC')->get();
        return view('admin.page.slide.list',compact('imgs'));
    }
    public function postEdit(Request $res){
        $slide = Slides::find($res->id);
        if(!$slide){
            $slide = new Slides;
        }
        if($res->hasFile('image')){
            $validation = Validator::make($res->all(),[
                'image' => 'bail|image|max:2046'
            ],[
                'image.image' =>'Đây không phải là ảnh',
                'image.max' => 'Không được upload ảnh lớn hơn 2Mb'
            ]);
            if($validation->fails()){
                return  response()->json(['type'=>'errors','mess'=>$validation->errors()->all()]);
            }
            else{
                $file = $res->file('image');
                $name = $file->getClientOriginalName();
                $newName = 'slide_'.str_random(4).'_'.$name;

                while(file_exists('source/image/slide'.$newName)){
                    $newName = 'slide_'.str_random(5).'_'.$name;
                }
                $file->move('source/image/slide',$newName);
                if($slide->image !== 'default.jpg')
                    File::delete('source/image/slide/'.$slide->image);
                $slide->image = $newName;
            }
        }
        else $slide->image = 'default.jpg';
        $slide->id = $res->id;
        $slide->save();
        return response()->json(['mess'=>$newName]);
        
    }
    public function getDel(Request $res){
        $slide = Slides::find($res->id);
        if($slide->image !== 'default.jpg'){
            $path = 'source/image/slide/'.$slide->image;
            if(file_exists($path)){
                FILE::delete($path);
            }
        }
        $slide->delete();
        return response()->Json(['mess'=>'Xóa thành công!']);
    }
}
