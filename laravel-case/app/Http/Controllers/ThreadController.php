<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ThreadController extends Controller
{
    public function index()
    {
        $result = DB::table('thread')->get();
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
                    var_dump('操作失败',$e);
                    exit;
                }
            });
            echo '操作成功';
        } elseif ($type == 'top') {
            if(DB::table('thread')
                ->where('tid',$tid)
                ->update([
                    'top'=>$num
                ])) {
                echo 'ok';
            } else {
                echo 'no';
            }
        } elseif($type == 'tstatus') {
            if(DB::table('thread')
                ->where('tid',$tid)
                ->update([
                    'tstatus'=>$num
                ])) {
                echo 'ok';
            } else {
                echo 'no';
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
                    var_dump('删除失败');
                    exit;
                }
        });
        echo '删除成功';
    }
}
