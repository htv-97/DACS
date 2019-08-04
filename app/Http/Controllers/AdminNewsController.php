<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Request;
// use Response;
use File;
use Validator;
use App\News;
class AdminNewsController extends Controller
{
    public function showNews(){
        $news = News::orderBy('id','DESC')->get();
        return view('admin.page.news.list',compact('news'));
    }
    public function postEdit(Request $res){
        $news = News::find($res->id);
        if(!$news){
            $news = new News;
        }
        if($res->hasFile('image')){
            $validation = Validator::make($res->all(),[
                'image' => 'bail|image|max:2046',
                'title' => 'bail|required',
                'content' => 'bail|required',

            ],[
                'image.image' =>'Đây không phải là ảnh',
                'image.max' => 'Không được upload ảnh lớn hơn 2Mb',
                'image.required' => 'Bạn cần nhập tiêu đề',
                'content.required' => 'Bạn cần nhập nội dung tin'
            ]);
            if($validation->fails()){
                return  response()->json(['type'=>'errors','mess'=>$validation->errors()->all()]);
            }
            else{
                $file = $res->file('image');
                $name = $file->getClientOriginalName();
                $newName = 'news_'.str_random(4).'_'.$name;
                while(file_exists('source/image/news'.$newName)){
                    $newName = 'news_'.str_random(5).'_'.$name;
                }
                $file->move('source/image/news',$newName);
                if($news->image !== 'default.jpg'){
                    File::delete('source/image/news/'.$news->image);
                }
                $news->image = $newName;
            }
        }
        else $news->image = 'default.jpg';
        $news->id = $res->id;
        $news->title = $res->title;
        $news->content = $res->content;
        $news->save();
        return response()->json(['mess'=>$news]);
            // return response()->json(['mess'=>'Bạn chưa chọn file','type'=>'errors']);
        
    }
    public function getDel(Request $res){
        $news = News::find($res->id);
        if($news->image !== 'default.jpg'){
            $path = 'source/image/news/'.$news->image;
            if(file_exists($path)){
                FILE::delete($path);
            }
        }
        $news->delete();
        return response()->Json(['mess'=>'Xóa thành công!']);
    }
}
