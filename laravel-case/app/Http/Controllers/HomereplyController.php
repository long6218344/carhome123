<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Shanghai');
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
class HomereplyController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->type;
        $rid = $request->rid;
//        var_dump($type);die;
        $tid = $request->tid;
//        var_dump(mt_rand());die;
        $post = DB::table('thread')
            ->where('thread.tid',$tid)
            ->join('post', 'thread.tid', '=', 'post.tid')
//            ->join('reply', 'thread.tid', '=', 'reply.tid')
            ->get();
        $reply = DB::table('thread')
            ->join('reply', 'thread.tid', '=', 'reply.tid')
            ->get();
        $cn = DB::table('thread')->where('tid',$tid)
            ->value('clicknumber');
        $cn = ($cn + 1);
//        var_dump($tid,$cn);die;
        DB::table('thread')
            ->where('tid',$tid)
            ->update([
                'clicknumber'=>$cn
            ]);
        return view('/home.reply',['reply'=>$reply,'post'=>$post,'type'=>$type,'rid'=>$rid]);
    }
}
