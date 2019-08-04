<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
// use Request;
// use Response;

use File;
use Validator;
use App\User;
class AdminAccountController extends Controller
{
    public function showAccount(){
        $users = User::orderBy('id','DESC')->get();
        $convert = ['male'=>'Nam','female'=>'Nữ'];
        return view('admin.page.account.list',compact('users','convert'));
    }
    public function postEdit(Request $res){
        $users = User::find($res->id);
        if($users->email !== $res->email){
            $unique = Validator::make($res->all(),[
                'email' => 'unique:users,email'
            ],[
                'email.unique' => 'Email đã có người dùng!'
            ]);
            if($unique->fails())
                return response()->json(['type'=>'errors','mess'=>$unique->errors()->all()]);
        }
        $validation = Validator::make($res->all(),[
            'name'  => 'bail|required|alpha|max:30',
            'email' => 'bail|required|email',
            'role'  => 'bail|min:1'
        ],[
            'name.alpha' =>'Tên không có số đâu',
            'name.max' => 'Tên đừng dài quá',
            'name.required' => 'Bạn cần nhập tên',
            'email.required' => 'Bạn cần nhập email',
            'email.email' => 'Đây có phải là email?',
            'role.min' => 'Vui lòng xác định quyền account'
        ]);
        if($validation->fails()){
            return  response()->json(['type'=>'errors','mess'=>$validation->errors()->all()]);
        }
        
        else{
            if(isset($res->password)){
                $pass = Validator::make($res->all(),[
                    'password' => 'min:4'
                ],[
                    'password.min' => 'Vui lòng đặt mật khẩu trên 4 ký tự !'
                ]);
                if($pass->fails())
                    return response()->json(['type'=>'errors','mess'=>$pass->errors()->all()]);
            }

            $users->password = Hash::make($res->password);           
            $users->id = $res->id;
            $users->name = $res->name;
            $users->email = $res->email;
            $users->gender = $res->gender;
            $users->role = $res->role;
            $users->save();
            return response()->json(['mess'=>$users]);
        }
        
    }
    public function postCreate(){
        $user = new User;
        $validation = Validator::make(Input::all(),[
            'name'      => 'required|alpha|max:30',
            'email'     => 'required|email|unique:users,email',
            'role'      => 'required|min:2',
            'password'  => 'required|min:4',
            'gender'    => 'required|min:2'
        ],[
            'name.alpha' =>'Tên không có số đâu',
            'name.max' => 'Tên đừng dài quá',
            'name.required' => 'Bạn cần nhập tên',
            'email.required' => 'Bạn cần nhập email',
            'password.required' => 'Bạn cần nhập mật khẩu',
            'role.required' => 'Bạn cần xác định quyền',
            'gender.required' => 'Bạn cần xác định giới tính',
            'email.unique' => 'Email đã có người dùng! Vui lòng đăng ký bằng mail khác',
            'email.email' => 'Đây có phải là email?',
            'role.min' => 'Vui lòng xác định quyền account',
            'password.min' => 'Mật khẩu phải dài hơn 4 ký tự',
            'gender.min' => 'Bạn cần xác định giới tính',
        ]);
        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
        }
        $user->name = Input::get('name');
        $user->gender = Input::get('gender');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->role = Input::get('role');
        $user->save();
        return redirect()->back()->with(['created'=>"Đã tạo tài khoản thành công!!!"]);
    }
    public function getDel(Request $res){
        $users = User::find($res->id)->delete();
        return response()->Json(['mess'=>'Xóa thành công!']);
    }
}
