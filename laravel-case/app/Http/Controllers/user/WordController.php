<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Validator;

class WordController extends Controller
{
    // 我的帖子页面
    public function show(){
        $id = session('id');
        $user = DB::select('select `icon`, `username`, `regdate`,`sex` from `bbs_user_info` where `uid` = '.$id);
        // dump($user);
        $info = DB::table('thread')->where('tauthorid',session('id'))->paginate(2);
        $info1 = DB::table('thread')->where([['tauthorid',session('id')],['best','1']])->paginate(2);
        $num = ($info->total());
        $num1 = ($info1->total());
        return view('user/user_myword',[
        	'icon'=>$user[0]->icon,
            'name'=>$user[0]->username,
        	'sex'=>$user[0]->sex,
        	'regdate'=>$user[0]->regdate,
            'num'=>$num,
        	'num1'=>$num1,
            'info'=>$info,
        	'info1'=>$info1,
        	]);

    }
    // 密码页面
    public function password(){
    	$user = DB::select('select `icon`,`sex`, `username` from `bbs_user_info` where `uid` = 2');

    	return view('user/user_password',['icon'=>$user[0]->icon,'sex'=>$user[0]->sex,'name'=>$user[0]->username]);
    }

    // 密码编辑
    public function edit(request $request){
        $oldpwd = $request->input('oldpwd');
        $user = DB::select('select `pwd` from `bbs_user_info` where `uid` = 2');
        $pwd = $user[0]->pwd;
        // 原密码不对直接reuturn
        if(md5($oldpwd) != $pwd){
            return redirect()->back()->withInput()->with([                      
            'flash_message'=>'原密码不正确!',                      
            'flash_message_important'=>true]);
        }
        // 限制条件
        $this->validate($request, [
             // 'oldpwd' => 'required',
             'newpwd' => 'required|min:6|max:15|alpha_num',
             'prepwd' => 'required|same:newpwd',
       ]);
        // 获取密码更新数据库
        $newpwd = $request->input('newpwd');
        $prepwd = $request->input('prepwd');
        
        $result = DB::update('update `bbs_user_info` set `pwd` = ? where `uid` = 2',[md5($newpwd)]);
        if($result){
            return redirect('user/show');
        }else{
            return redirect()->back()->withInput()->with([                      
            'flash_message'=>'保存失败!',                      
            'flash_message_important'=>true]);
        }


    
    }
    // 头像页面
    public function icon(){
        $user = DB::select('select `icon`, `username`,`sex` from `bbs_user_info` where `uid` = '.session('id'));

        return view('user/user_icon',['icon'=>$user[0]->icon,'sex'=>$user[0]->sex,'name'=>$user[0]->username]);
    }
    // 修改头像
    public function editicon(Request $request){
        if ($request->hasFile('myfile')) {
              
            //移动文件到指定位置
            // $request->file('myfile')->move('./uploads/', '1.jpg');
             
            // 移动文件到指定位置  处理 路径/名字/后缀
            $path = './uploads/' . date('Y/m/d');
            $name = date('Ymd') . uniqid();
            $ext = $request->file('myfile')->getClientOriginalExtension();
            // dump($ext);
            $filename = $name . '.' . $ext;
            $request->file('myfile')->move($path, $filename);
        }

        $icon = $path.'/'.$filename;
        $icon = ltrim($icon,'./');
        $result = DB::update('update `bbs_user_info` set `icon` = "'.$icon.'" where `uid` = '.session('id'));
        if($result){
            return redirect('/user/notice')->with(['message'=>'修改头像成功','url' =>'/user/icon', 'jumpTime'=>3,'status'=>true]);
        }

    }
}
