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
            ->where('reply.tid',$tid)
            ->get();

        $cn = DB::table('thread')->where('tid',$tid)

            ->value('clicknumber');
        $cn = ($cn + 1);
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
                    'rauthor'=> $_SESSION['username'],
                    'rauthorid'=> $_SESSION['uid'],
                    'rauthorip'=>$ip,
                    'rdateline'=>$now
                ]);

                DB::table('thread')->where('tid',$tid)->update([

                    'renumber'=>$renumber,
                    'replies'=>$now
                ]);
            } catch (\Exception $e) {

                return redirect('/home/post/'.$tid);
                exit;
            }
        });

        // ---------------回复得分---------------------
        $uid = $_SESSION['uid'];
        // 1. 选出积分
        $point = DB::table('bbs_pointrule')
            ->where('typeid',2)
            ->select('value')
            ->first();
//        dd($point);
        $point = $point->value;
        // 2. 加入数据库积分
        $result = DB::table('bbs_point')
            ->insert([
                ['point'=>$point, 'uid'=>$uid, 'typeid'=>2],
            ]);
        // 3. 存入用户表

        // 3.1 存入前先从用户表中选出积分,在相加
        $credits = DB::table('bbs_user_info')
            ->where('uid',$uid)
            ->select('credits')
            ->first();
        $credits = $credits->credits;
        $credits = $credits + $point;
//        dd($credits);
        // 更新user数据
        $result =  DB::table('bbs_user_info')
            ->where('uid',$uid)
            ->update(['credits'=>$credits]);
        return redirect('/home/post/'.$tid);

    }
}




