<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsFeedController extends Controller
{
    public function show(){
       
        $user = DB::table('bbs_user_info')->where('username', session('username'))->first();
        // 根据当前用户id查好友表 得到好友fid
        $info = DB::select('select `fid` from `bbs_friend` where uid = '.session('id'));
        // 找fid 等于自身id的数据 就是粉丝
        $list = DB::select('select `uid` from `bbs_friend` where fid = '.session('id'));
        // 根据当前用户id 查 帖子表和用户表
        // $news = DB::table('post')->where('pauthorid',session('id')) ->orderBy('pdateline', 'desc')->paginate(5);
        $news = DB::table('bbs_user_info')
                        ->join('post', 'bbs_user_info.uid', '=', 'post.pauthorid')
                        ->where('bbs_user_info.uid', '=' ,session('id'))->orderBy('pdateline', 'desc')
                        ->paginate(5);
       
        // 如果好友表里有好友 需排除感兴趣的人
        if($info != null){
            // 把$info变成数组
            foreach($info as $v){
                $arr[] = $v->fid;
            } 
            // 感兴趣的人 排除已经关注过的  whereNotIn() 随机得到inRandomOrder()
            $randomUser = DB::table('bbs_user_info')->where('uid','<>',session('id'))->whereNotIn('uid', $arr)->inRandomOrder()->get();
                 
            // $friend = $friend->paginate(3); 分页?
            return view('user/user_newsfeed',[
                'name'=>$user->username,
                'icon'=>$user->icon,
                'sex'=>$user->sex,
                'news'=>$news,
                'random'=>$randomUser,
            ]);
        }else{
            // 出自己id 外 随机出用户
            $randomUser = DB::table('bbs_user_info')->where('uid','<>',session('id'))->inRandomOrder()->get();
            return view('user/user_newsfeed',[
                'name'=>$user->username,
                'icon'=>$user->icon,
                'sex'=>$user->sex,
                'news'=>$news,
                'random'=>$randomUser,
            ]);
        }
    
    }

    
}