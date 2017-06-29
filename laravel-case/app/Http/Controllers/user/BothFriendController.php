<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BothFriendController extends Controller
{
    // 相互关注的好友
    public function show(){
        
        // 查用户表 有页面需要值
        $user = DB::table('bbs_user_info')->where('username', session('username'))->first();
        // 根据当前用户id查好友表 得到uid,fid等于当前用户id的 顺便排除关注过的人
        $info = DB::select('select `fid` from `bbs_friend` where uid = '.session('id'));
       
        // 如果好友表里有好友
        $list = DB::select('select `uid` from `bbs_friend` where fid = '.session('id'));
        // $info 和 $list 中的 交集id 就是我关注的也关注我的
        if($info != null){
            // 把$info $list 由(object(stdClass)) 变成array数组
            function object_array($array) {  
                if(is_object($array)) {  
                    $array = (array)$array;  
                } 
                if(is_array($array)) {  
                    foreach($array as $key=>$value) {  
                        $array[$key] = object_array($value);  
                    }  
                }  
                return $array;  
            } 
            $arr = object_array($info);
            $arr1 = object_array($list);
            foreach($arr as $a){
                $r1[] = $a['fid'];
            }
            foreach($arr1 as $a){
                $r2[] = $a['uid'];
            }

            // 取交集 便利查询
            $arr3=array_intersect($r1,$r2);
            foreach($arr3 as $a){
                $friend[] = DB::table('bbs_user_info')->where('uid', $a)->first();
            }
            // 感兴趣的人 排除已经关注过的  whereNotIn() 随机得到inRandomOrder()
            $randomUser = DB::table('bbs_user_info')->where('uid','<>',session('id'))->whereNotIn('uid', $arr)->inRandomOrder()->get();
                 
            // $friend = $friend->paginate(3); 分页?
            return view('user/user_bothfriend',[
                'name'=>$user->username,
                'icon'=>$user->icon,
                'sex'=>$user->sex,
                'arr3'=>$arr3,
                'friend'=>$friend,
                'random'=>$randomUser,
            ]);
        }else{
            // 除自己id 外 随机出用户
            $randomUser = DB::table('bbs_user_info')->where('uid','<>',session('id'))->inRandomOrder()->get();
            return view('user/user_bothfriend',[
                'name'=>$user->username,
                'icon'=>$user->icon,
                'sex'=>$user->sex,
                'arr3'=>$arr3,
                'friend'=>$friend,
                'random'=>$randomUser,
            ]);
        }
        
    }
   
    // 取消关注
    public function fans($id){
        //取消关注 删除 $id是好友fid
        $info = DB::table('bbs_friend')->where([['uid', session('id')],['fid',$id]])->delete();
        $info1 = DB::table('bbs_user_info')->where('uid', session('id'))->decrement('views');
        $info2 = DB::table('bbs_user_info')->where('uid', $id)->decrement('fans');

        return $id;
    }
    // 关注
    public function addfans($uid){
        // 关注 插入好友表
        $info = DB::table('bbs_friend')->insert(
            ['uid' => session('id'), 'fid' => $uid]
        );

        // 关注 粉丝 自加
        $user = DB::table('bbs_user_info')->where('uid', session('id'))->increment('views');
        $info = DB::table('bbs_user_info')->where('uid', $uid)->increment('fans');
        return $uid;
    }
}