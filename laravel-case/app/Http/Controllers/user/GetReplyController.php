<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Validator;

class GetReplyController extends Controller
{
	public function get(){
		$id = session('id');
        $user = DB::select('select `icon`, `username`, `regdate`,`sex` from `bbs_user_info` where `uid` = '.$id);
        $info1 = DB::table('thread')->where('tauthorid',session('id'))->get();
        $info2 = DB::table('thread')->where([['tauthorid',session('id')],['best',1]])->get();
        // 回复表 和 帖子表联合查询
        $info = DB::table('thread')
                        ->join('reply', 'reply.tid', '=', 'thread.tid')
                        ->where('thread.tauthorid', '=' ,session('id'))->orderBy('rdateline', 'desc')
                        ->paginate(5);
        // 回复数量 帖子 精华帖数量
        $n = ($info->total());
        $num = (count($info1));
        $num1 = (count($info2));
        // dump($info);
        return view('user/user_get',[
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