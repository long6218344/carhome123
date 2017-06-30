<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ThreadController extends Controller
{
    public function index()
    {
        $result = DB::table('forum')->join('thread', 'forum.fid', '=', 'thread.fid')->get();
        return view('/admin/posts/thread',['result'=>$result]);
    }

//    public function add(Request $request)
//    {
//        $forum_name = $request->input('forum_name');
//        $status = $request->input('status');
//        if(DB::table('forum')->insert([
//            'name'=>$forum_name,
//            'status'=>$status
//        ])) {
//            echo 'ok';
//        } else {
//            echo 'no';
//        }
//    }

    public function edit(Request $request)
    {
        $tid = $request->tid;
        $type = $request->type;
        $num = $request->num;
        $fid = $request->fid;
        $b = DB::table('forum')->where('fid',$fid)->value('boutique');
//        var_dump($fid,$b);die;
        if($num == 0){$b = ($b - 1);}else{$b = ($b + 1);}
        if($type == 'best') {
            DB::transaction(function() use ($tid, $num, $fid, $b)
            {
                try {
            DB::table('thread')
                ->where('tid',$tid)
                ->update([
                    'best'=>$num
                ]);
                    DB::table('forum')
                        ->where('fid',$fid)
                        ->update([
                            'boutique'=>$b
                        ]);
                } catch (\Exception $e) {
                    return redirect(url('/user/notice'))->with(['message'=>'失败','url' =>url('/admin/thread'), 'jumpTime'=>3,'status'=>true]);
                    exit;
                }
            });
            return redirect(url('/user/notice'))->with(['message'=>'成功','url' =>url('/admin/thread'), 'jumpTime'=>3,'status'=>true]);
        } elseif ($type == 'top') {
            if(DB::table('thread')
                ->where('tid',$tid)
                ->update([
                    'top'=>$num
                ])) {
                return redirect(url('/user/notice'))->with(['message'=>'成功','url' =>url('/admin/thread'), 'jumpTime'=>3,'status'=>true]);
            } else {
                return redirect(url('/user/notice'))->with(['message'=>'失败','url' =>url('/admin/thread'), 'jumpTime'=>3,'status'=>true]);
            }
        } elseif($type == 'tstatus') {
            if(DB::table('thread')
                ->where('tid',$tid)
                ->update([
                    'tstatus'=>$num
                ])) {
                return redirect(url('/user/notice'))->with(['message'=>'成功','url' =>url('/admin/thread'), 'jumpTime'=>3,'status'=>true]);
            } else {
                return redirect(url('/user/notice'))->with(['message'=>'失败','url' =>url('/admin/thread'), 'jumpTime'=>3,'status'=>true]);
            }
        }


    }

    public function delete(Request $request)
    {
        $tid = $request->tid;
        $fid = $request->fid;
        $posts = DB::table('forum')->where('fid',$fid)->value('posts');
        $posts = ($posts - 1);
        DB::transaction(function() use ($tid, $posts, $fid)
        {
            try {
        DB::table('thread')->where('tid',$tid)->delete() ;
        DB::table('forum')->where('fid',$fid)->update(['posts'=>$posts]);
        } catch (\Exception $e) {
                return redirect(url('/user/notice'))->with(['message'=>'失败','url' =>url('/admin/thread'), 'jumpTime'=>3,'status'=>true]);
                    exit;
                }
        });
//        return redirect(url(url('/admin/thread')));
        return redirect(url('/user/notice'))->with(['message'=>'成功','url' =>url('/admin/thread'), 'jumpTime'=>3,'status'=>true]);
    }
}
