<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
{
    // 关注的好友
    public function friend(){
        
        // 查用户表
        $user = DB::table('bbs_user_info')->where('username', session('username'))->first();
        // 根据当前用户id查好友表 得到好友fid
        $info = DB::select('select `fid` from `bbs_friend` where uid = '.session('id'));
        // 如果好友表里有好友
        if($info != null){
            
            foreach($info as $v){
                $arr[] = $v->fid;
            }
            // $arr = object_array($info);
            // 感兴趣的人 排除已经关注过的  whereNotIn() 随机得到inRandomOrder()
            $randomUser = DB::table('bbs_user_info')->where('uid','<>',session('id'))->whereNotIn('uid', $arr)->inRandomOrder()->get();
                 
            // 遍历出对应的好友id再查好友表
            foreach($info as $k){
                $friend[] = DB::table('bbs_user_info')->where('uid', $k->fid)->first();
            }
            // $friend = $friend->paginate(3); 分页?
            return view('user/user_friend',[
                'name'=>$user->username,
                'icon'=>$user->icon,
                'sex'=>$user->sex,
                'info'=>$info,
                'friend'=>$friend,
                'random'=>$randomUser,
            ]);
        }else{
            // 出自己id 外 随机出用户
            $randomUser = DB::table('bbs_user_info')->where('uid','<>',session('id'))->inRandomOrder()->get();
            return view('user/user_friend',[
                'name'=>$user->username,
                'icon'=>$user->icon,
                'sex'=>$user->sex,
                'info'=>$info,
                'random'=>$randomUser,
            ]);
        }
        
    }

    
    // 取消关注
    public function fans($id){
        //取消关注 删除 $id是好友fid
        $info = DB::table('bbs_friend')->where([['uid', session('id')],['fid',$id]])->delete();
        // 数据库对应 关注 粉丝 自减1
        $info1 = DB::table('bbs_user_info')->where('uid', session('id'))->decrement('views');
        $info2 = DB::table('bbs_user_info')->where('uid', $id)->decrement('fans');

        return $id;
    }
    // 关注
    public function addfans($uid){
        // 关注 插入好友表
        $info = DB::table('bbs_friend')->insert(
            ['uid' => session('id'), 'fid' => $uid,'time'=>time()]
        );

        // 关注 粉丝 自加
        $user = DB::table('bbs_user_info')->where('uid', session('id'))->increment('views');
        $info = DB::table('bbs_user_info')->where('uid', $uid)->increment('fans');
        return $uid;
    }
}