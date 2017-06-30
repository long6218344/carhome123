<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FansController extends Controller
{
    public function show(){
        $username = $_SESSION['username'];
        $uid = $_SESSION['uid'];
    	// 查用户表
    	$user = DB::table('bbs_user_info')->where('username', $username)->first();
    	// 根据当前用户id查好友表 得到好友fid
    	$info = DB::select('select `fid` from `bbs_friend` where uid = '.$uid);
    	// 找fid 等于自身id的数据 就是粉丝
    	$list = DB::select('select `uid` from `bbs_friend` where fid = '.$uid);

        // var_dump($list);die;
        // 如果好友表里有好友
        if($info != null){
            foreach($info as $k){
                $arr[] = $k->fid;
            }
            // $arr = object_array($info);
            // 感兴趣的人 排除已经关注过的  whereNotIn() 随机得到inRandomOrder()
            $randomUser = DB::table('bbs_user_info')->where('uid','<>',$uid)->whereNotIn('uid', $arr)->inRandomOrder()->get();
                 
            // 遍历出对应的好友id再查好友表
            // 判断粉丝是否为空
            if($list){
            	foreach($list as $val){
                    $friend[] = DB::table('bbs_user_info')->where('uid', $val->uid)->first();
            	}
        	    // $friend = $friend->paginate(3); 分页?
        	    return view('user/user_follow',[
        	        'name'=>$user->username,
        	        'icon'=>$user->icon,
                    'sex'=>$user->sex,
        	        'list'=>$list,
        	        'random'=>$randomUser,
        	        'friend'=>$friend,
        	    ]);
            }else{
                return view('user/user_follow',[
                    'name'=>$user->username,
                    'icon'=>$user->icon,
                    'sex'=>$user->sex,
                    'list'=>'',
                    'random'=>$randomUser,
                    'friend'=>'',
                ]);
            }
    	}else{
    	    // 出自己id 外 随机出用户
    	    $randomUser = DB::table('bbs_user_info')->where('uid','<>',$uid)->inRandomOrder()->get();
    	   
           if($list){
                foreach($list as $val){
                    $friend[] = DB::table('bbs_user_info')->where('uid', $val->uid)->first();
                }
                // $friend = $friend->paginate(3); 分页?
                return view('user/user_follow',[
                    'name'=>$user->username,
                    'icon'=>$user->icon,
                    'sex'=>$user->sex,
                    'list'=>$list,
                    'random'=>$randomUser,
                    'friend'=>$friend,
                ]);
            }else{
                return view('user/user_follow',[
                    'name'=>$user->username,
                    'icon'=>$user->icon,
                    'sex'=>$user->sex,
                    'list'=>'',
                    'random'=>$randomUser,
                    'friend'=>'',
                ]);
            }
    	}
    }
    
}
