<?php
namespace App\Http\Controllers;
date_default_timezone_set('Asia/Shanghai');
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
class PostingController extends Controller
{
    public function index(Request $request)
    {
//        $result = DB::table('forum')
//            ->join('thread', 'forum.fid', '=', 'thread.fid')
//            ->where('thread.fid',$request->fid)
//            ->join('post', 'forum.fid', '=', 'post.fid')
//            ->get();
        $forum = DB::table('forum')->where('forum.fid',$request->fid)->get();
//        var_dump($forum);
        return view('/home/posting', ['forum' => $forum]);
    }

    public function submit(Request $request)
    {

        $tid = null;
        $title = $request->input('title');
        $content = $request->input('content');
        $fid = $request->input('fid');
        $now = Carbon::now()->toDateTimeString();
//        $onlineip = getip();
//        var_dump($request->getClientIp());
        $ip = $_SERVER["REMOTE_ADDR"];
//        var_dump($fid);die;
        $value = DB::table('forum')->where('fid',$fid)->get();
//        var_dump($value[0]->posts);die;
        $posts = ($value[0]->posts+1);
        $todayposts = ($value[0]->todayposts+1);
//        var_dump($tid, $title, $content, $fid, $now, $ip, $posts, $todayposts);die;
        DB::transaction(function() use ($tid, $title, $content, $fid, $now, $ip, $posts, $todayposts)
        {
            try {
            DB::table('forum')
                ->where('fid',$fid)
                ->update([
                    'posts'=>$posts,
                    'todayposts'=>$todayposts
                ]);
//                var_dump(session('username'));die;
                $tid = DB::table('thread')->insertGetId([

                'title'=>$title,
                'fid'=>$fid,
                'tauthor'=> $_SESSION['username'],
                'tauthorid'=> $_SESSION['uid'],
                'tdateline'=>$now,
                'replies'=>$now
            ]);
//                var_dump($tid);die;
                DB::table('post')->insert([

                'ptitle'=>$title,
                'pmessage'=>$content,
                'fid'=>$fid,
                'tid'=>$tid,
                'pauthor'=> $_SESSION['username'],
                'pauthorid'=> $_SESSION['uid'],
                'pdateline'=>$now,
                'pauthorip'=>$ip
            ]);
            } catch (\Exception $e) {
//                var_dump('发帖失败',$e);
                return redirect('/home/blog/'.$fid);
            }
        });

        // 发帖得分
        $uid = $_SESSION['uid'];
        // 1. 选出积分
        $point = DB::table('bbs_pointrule')
            ->where('typeid',3)
            ->select('value')
            ->first();
//        dd($point);
        $point = $point->value;
        // 2. 加入数据库积分
        $result = DB::table('bbs_point')
            ->insert([
                ['point'=>$point, 'uid'=>$uid, 'typeid'=>3],
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


        return redirect('/home/blog/'.$fid);

    }
}