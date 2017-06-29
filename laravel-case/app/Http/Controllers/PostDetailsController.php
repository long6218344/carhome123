<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Shanghai');
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Redirect;
class PostDetailsController extends Controller
{
    public function index(Request $request)
    {
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
        return view('/home.details',['reply'=>$reply,'post'=>$post]);
    }

//    public function xxx()
//{
//    return 111;
//}

    public function submit(Request $request)
    {
//        return 111;
        $rid = null;
        $content = $request->input('content');
        $tid = $request->input('tid');
        $pid = $request->input('pid');
        $fid = $request->input('fid');
        $now = Carbon::now()->toDateTimeString();
        $ip = $_SERVER["REMOTE_ADDR"];
        $value = DB::table('thread')->where('tid',$tid)->get();
        $renumber = ($value[0]->renumber+1);
        DB::transaction(function() use ($tid, $content, $fid, $now, $ip, $renumber, $pid)
        {
            try {
                $rid = DB::table('reply')->insertGetId([
                    'fid'=>$fid,
                    'tid'=>$tid,
                    'pid'=>$pid,
                    'rmessage'=>$content,
                    'rauthor'=> session('username'),
                    'rauthorid'=> session('uid'),
                    'rauthorip'=>$ip,
                    'rdateline'=>$now
                ]);
                DB::table('thread')->where('tid',$tid)->update([
                    'renumber'=>$renumber,
                    'replies'=>$now
                ]);
            } catch (\Exception $e) {
                var_dump('回复失败');
                return redirect('/home/post/{tid}'.$tid);
                exit;
            }
        });

        return redirect('/home/post/{tid}'.$tid);
    }
}
