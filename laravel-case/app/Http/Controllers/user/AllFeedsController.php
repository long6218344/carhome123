<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AllFeedsController extends Controller
{
    public function show(){
//        $id = $_SESSION['uid'];
//        dd($id);die;
        // 全部好友动态
        $user = DB::table('bbs_user_info')->where('username', session('username'))->first();
        // 根据当前用户id查好友表 得到好友fid
        $info = DB::select('select `fid` from `bbs_friend` where uid = '.$id);
        // 找fid 等于自身id的数据 就是粉丝
        $list = DB::select('select `uid` from `bbs_friend` where fid = '.$id);
       
        // 把好友id变成数组 查帖子表
        foreach($info as $v){
            $r[] = $v->fid;
        }
        // 把自身id 加进去遍历查询 帖子表和用户表
        array_push($r,$id);
        foreach($r as $v){

            $news[] = DB::table('bbs_user_info')
                        ->join('post', 'bbs_user_info.uid', '=', 'post.pauthorid')
                        ->where('bbs_user_info.uid', '=' ,$v)->orderBy('pdateline', 'desc')
                        ->paginate(2);

            // $news[] = DB::select('select `icon`, `username`,`uid`,`ptitle`,`pdateline`,`pmessage`  from `bbs_user_info` as us,`post` as p  where us.`uid` = p.`pauthorid` and us.`uid` = '.$v.' order by `pdateline` desc');
        }

        // 如果好友表里有好友 需排除感兴趣的人,不能再次出现
        if($info != null){
            // 把$info变成数组
            foreach($info as $v){
                $arr[] = $v->fid;
            }
            // 感兴趣的人 排除已经关注过的  whereNotIn() 随机得到inRandomOrder()
            $randomUser = DB::table('bbs_user_info')->where('uid','<>',$id)->whereNotIn('uid', $arr)->inRandomOrder()->get();
                 
            // $friend = $friend->paginate(3); 分页?
            return view('user/user_allfeeds',[
                'name'=>$user->username,
                'icon'=>$user->icon,
                'sex'=>$user->sex,
                'news'=>$news,
                'random'=>$randomUser,
            ]);
        }else{
            // 出自己id 外 随机出用户
            $randomUser = DB::table('bbs_user_info')->where('uid','<>',$id)->inRandomOrder()->get();
            return view('user/user_allfeeds',[
                'name'=>$user->username,
                'icon'=>$user->icon,
                'sex'=>$user->sex,
                'news'=>$news,
                'random'=>$randomUser,
            ]);
        }
    
    }

    
}