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
        $uid = $_SESSION['uid'];
//        var_dump(mt_rand());die;
        $post = DB::table('thread')
            ->where('thread.tid',$tid)
            ->join('post', 'thread.tid', '=', 'post.tid')
            ->join('bbs_user_info', 'bbs_user_info.uid', '=', 'thread.tauthorid')
            ->get();
        // 发帖人UID
         $postuid = $post[0]->uid;

         // 回复人
        $reply = DB::table('thread')
            ->join('reply', 'thread.tid', '=', 'reply.tid')
            ->join('bbs_user_info','bbs_user_info.uid','=','reply.rauthorid')
            ->where('reply.tid',$tid)
            ->paginate(5);

        $cn = DB::table('thread')->where('tid',$tid)

            ->value('clicknumber');
        $cn = ($cn + 1);
        DB::table('thread')
            ->where('tid',$tid)
            ->update([
                'clicknumber'=>$cn
            ]);
        foreach ($reply as $v){
            $pid = $v->pid;
        }

        // 发帖人权限 , 从数据库获取权限
        $result = DB::table('bbs_user_info')
            ->join('bbs_user_group','bbs_user_group.gid','=','bbs_user_info.grouppower')
            ->where([
                ['bbs_user_info.uid','=',$postuid]
            ])
            ->select()
            ->first();
//        dd($result);
        $groupname = $result->groupname;

        // 如果发帖用户为会员,判断他的等级,不同等级对应不同权限
        if($result->grouppower == 1){

            if($result->credits >= 100 && $result->credits < 200){
//                $groupname = $result->groupname;
                $level = 200 - $result->credits;
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',6]
                    ])
                    ->select()
                    ->first();
//                dd($result);

            }elseif($result->credits >= 200 && $result->credits <500){
                $level = 500 - $result->credits;
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',7]
                    ])
                    ->select()
                    ->first();
            }elseif($result->credits >= 500 && $result->credits <1000){
                $level = 1000 - $result->credits;
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',8]
                    ])
                    ->select()
                    ->first();

            }elseif($result->credits >=1000 && $result->credits <5000){
                $level = 5000 - $result->credits;
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',9]
                    ])
                    ->select()
                    ->first();

            }elseif($result->credits >=5000 && $result->credits <10000){
                $level = 10000 - $result->credits;
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',10]
                    ])
                    ->select()
                    ->first();

            }elseif($result->credits >= 10000 && $result->credits <50000){
                $level = 50000 - $result->credits;
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',11]
                    ])
                    ->select()
                    ->first();

            }elseif($result->credits >= 0 && $result->credits < 100){
//                dd($result->credits);
                $level = 100 - $result->credits;
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',1]
                    ])
                    ->select()
                    ->first();
//                dd($result);
            }else{
                $level = 0;
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',12]
                    ])
                    ->select()
                    ->first();
            }
        }else{
            $level=0;
        }

        // 统计发帖人帖子数量

       $num = DB::table('thread')
            ->where('tid',$tid)
            ->first();
        $tauthorid = $num->tauthorid;
       $num = DB::table('thread')
            ->where('tauthorid',$tauthorid)
            ->count();

       // 统计回复人帖子数量
//        $replyer = DB::table('reply')
//            ->select('rauthorid')
//            ->where('tid',$tid)
//            ->first();
////        dd($replyer);
//        $tauthorid = $replyer->rauthorid;
//        $replynum = DB::table('thread')
//            ->where('tauthorid',$tauthorid)
//            ->count();
//        dd($post[0]->icon);
//        dd($reply);

        // 勋章图标
        $groupicon1 = DB::table('bbs_user_group')
            ->where([
                ['bbs_user_group.gid','=',1]
            ])
            ->select('groupicon')
            ->first();
        $groupicon6 = DB::table('bbs_user_group')
            ->where([
                ['bbs_user_group.gid','=',6]
            ])
            ->select('groupicon')
            ->first();
        $groupicon7 = DB::table('bbs_user_group')
            ->where([
                ['bbs_user_group.gid','=',7]
            ])
            ->select('groupicon')
            ->first();
        $groupicon8 = DB::table('bbs_user_group')
            ->where([
                ['bbs_user_group.gid','=',8]
            ])
            ->select('groupicon')
            ->first();
        $groupicon9 = DB::table('bbs_user_group')
            ->where([
                ['bbs_user_group.gid','=',9]
            ])
            ->select('groupicon')
            ->first();
        $groupicon10 = DB::table('bbs_user_group')
            ->where([
                ['bbs_user_group.gid','=',10]
            ])
            ->select('groupicon')
            ->first();
        $groupicon11 = DB::table('bbs_user_group')
            ->where([
                ['bbs_user_group.gid','=',11]
            ])
            ->select('groupicon')
            ->first();
        $groupicon12 = DB::table('bbs_user_group')
            ->where([
                ['bbs_user_group.gid','=',12]
            ])
            ->select('groupicon')
            ->first();

        return view('/home.details',['reply'=>$reply,'post'=>$post,'group'=>$result,'count'=>$num,'groupname'=>$groupname,'groupicon6'=>$groupicon6,'groupicon7'=>$groupicon7,'groupicon8'=>$groupicon8,'groupicon9'=>$groupicon9,'groupicon10'=>$groupicon10,'groupicon11'=>$groupicon11,'groupicon12'=>$groupicon12,'groupicon1'=>$groupicon1]);
    }


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
//        dd($result);
        return redirect('/home/post/'.$tid);

    }
}




