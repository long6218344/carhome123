<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function show(){

        // session(['uid'=>9]);

        $id = $_SESSION['uid'];
        $user = DB::table('bbs_user_info')->where('bbs_user_info.uid', $id)->first();
        // 最新回复
        $user1 = DB::table('thread')
                        ->join('reply', 'reply.tid', '=', 'thread.tid')
                        ->where('thread.tauthorid', $id)->orderBy('reply.rdateline')->first();
        // 最新关注我好友
        $info = DB::table('bbs_friend')->where('bbs_friend.fid', $id)->orderBy('bbs_friend.time')->first();
        if($info != null){
            $user2 = DB::table('bbs_user_info')->where('bbs_user_info.uid', $info->uid)->first();
        }else{
            $user2 = '';
        }
                        
        // 最新收到好友私信
        $user3 = DB::table('bbs_message')
                        ->join('bbs_user_info', 'bbs_user_info.uid', '=', 'bbs_message.reuid')
                        ->where('bbs_user_info.uid', $id)->orderBy('bbs_message.time')->first();
        // 最新收藏帖子
        $info1 = DB::table('bbs_astore')->where('bbs_astore.uid', $id)->orderBy('bbs_astore.time')->first();
        if($info1 != null){
            $user4 = DB::table('post')->where('post.tid', $info1->thid)->first();
        }else{
            $user4 = '';
        }
        // dump($user4);die;
        $num = DB::table('thread')->where('tauthorid',$id)->count();
        $num1 = DB::table('thread')->where([['tauthorid',$id],['best',1]])->count();
        return view('user/user_index',[
            'icon'=>$user->icon,
            'num'=>$num,
            'num1'=>$num1,
            'user'=>$user,
            'user1'=>$user1,
            'info'=>$info,
            'info1'=>$info1,
            'user2'=>$user2,
            'user3'=>$user3,
            'user4'=>$user4,
            // 'name'=>$user->username,
            // 'sex'=>$user->sex,
            // 'fans'=>$user->fans,
            // 'views'=>$user->views,
        ]);
    }

    
}
