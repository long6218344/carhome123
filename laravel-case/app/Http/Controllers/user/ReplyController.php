<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Validator;

class ReplyController extends Controller
{
	public function reply(){
    
        $user = DB::select('select `icon`, `username`, `regdate`,`sex` from `bbs_user_info` where `uid` = '.$_SESSION['uid']);
        $info1 = DB::table('thread')->where('tauthorid',$_SESSION['uid'])->get();
        $info2 = DB::table('thread')->where([['tauthorid',$_SESSION['uid']],['best',1]])->get();
        // 回复表 和 帖子表联合查询
        $info = DB::table('reply')
                        ->join('thread', 'reply.tid', '=', 'thread.tid')
                        ->where('reply.rauthorid', '=' ,$_SESSION['uid'])->orderBy('rdateline', 'desc')
                        ->paginate(5);
        // 回复数量 帖子 精华帖数量
        // dump($info);die;
        $n = ($info->total());
        $num = (count($info1));
        $num1 = (count($info2));
        // dump($num);die;
        return view('user/user_reply',[
        	'icon'=>$user[0]->icon,
            'name'=>$user[0]->username,
        	'sex'=>$user[0]->sex,
            'regdate'=>$user[0]->regdate,
            'n'=>$n,
            'num'=>$num,
            'num1'=>$num1,
            'info'=>$info,
        	]);
	}





}