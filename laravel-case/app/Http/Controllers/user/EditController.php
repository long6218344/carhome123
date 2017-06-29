<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Validator;

class EditController extends Controller
{
    public function show(){
        $user = DB::table('bbs_user_info')->where('uid', session('id'))->first();
        return view('user/user_show',[
            'name'=>$user->username,
            'icon'=>$user->icon,
            'id'=>$user->uid,
            'sex'=>$user->sex,
            'sign'=>$user->userdetails,
            'birthday'=>$user->birthday,
            'email'=>$user->email,
            'address'=>$user->address,
        ]);
    }

    public function show_edit(){
        $user = DB::table('bbs_user_info')->where('uid', session('id'))->first();
        return view('user/user_edit',[
            'name'=>$user->username,
            'icon'=>$user->icon,
            'id'=>$user->uid,
            'sex'=>$user->sex,
            'sign'=>$user->userdetails,
            'birthday'=>$user->birthday,
            'email'=>$user->email,
            'address'=>$user->address,
        ]);
    
    }

    public function edit(request $request){
        
        $this->validate($request, [
            'email' => 'email|required',
            'UserName' => 'required',
        ]);
        $name = $request->input('UserName');
        $sex = $request->input('rdsex');
        $email = $request->input('email');
        $birthday = $request->input('birthday');
        $province = $request->input('s_province');
        $address = $request->input('address');
        $sign = $request->input('textSign');
        $result = DB::update('update `bbs_user_info` set `username` = ?, `sex` = ?, `email` = ?, `birthday` = ?, `address` = ?, `userdetails` = ? where `uid` = ?', [$name,$sex,$email,$birthday,$address,$sign,session('id')]);
        if($result){
            return redirect('/user/notice')->with(['message'=>'修改成功','url' =>'/user/show', 'jumpTime'=>3,'status'=>true]);
        }else{
            return redirect('/user/notice')->with(['message'=>'修改失败','url' =>'/user/edit', 'jumpTime'=>3,'status'=>false]);
        }

    }
}
