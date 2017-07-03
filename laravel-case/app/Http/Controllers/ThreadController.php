<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ThreadController extends Controller
{
    public function index()
    {
        $result = DB::table('forum')->join('thread', 'forum.fid', '=', 'thread.fid')->paginate(10);
        return view('/admin/posts/thread',['result'=>$result]);
    }

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
        $todayposts = DB::table('forum')->where('fid',$fid)->value('todayposts');
        $todayposts = ($todayposts - 1);
        $boutique = DB::table('forum')->where('fid',$fid)->value('boutique');
        $best = DB::table('thread')->where('tid',$tid)->value('best');
        if($best == 1){$boutique = ($boutique -1);}
        DB::transaction(function() use ($fid, $tid, $posts, $todayposts, $boutique, $best)
        {
            try {
                DB::table('post')->where('tid',$tid)->delete();
                DB::table('reply')->where('tid',$tid)->delete();
                DB::table('thread')->where('tid',$tid)->delete();
                DB::table('forum')->where('fid',$fid)->update(
                   [ 'posts'=>$posts,
                'todayposts'=>$todayposts,
                'boutique'=>$boutique
               ] );
            }catch (\Exception $e) {
                return redirect(url('/user/notice'))->with(['message'=>'失败','url' =>url('/admin/thread'), 'jumpTime'=>3,'status'=>true]);
                exit;
            }
        });
        return redirect(url('/user/notice'))->with(['message'=>'成功','url' =>url('/admin/thread'), 'jumpTime'=>3,'status'=>true]);
    }

    public function select(Request $request)
    {
        $search = $request->input('search');

        $result = DB::table('forum')->join('thread', 'forum.fid', '=', 'thread.fid')->where('title','like','%'.$search.'%')->paginate(10);
        return view('/admin/posts/thread',['result'=>$result]);

    }

    public function black(Request $request)
    {
        $tid = $request->tid;
        DB::table('thread')
            ->where('tid',$tid)
            ->update([
                'black'=>'1'
            ]);
        return redirect(url('/user/notice'))->with(['message'=>'举报成功','url' =>url('/home/post/'.$tid), 'jumpTime'=>3,'status'=>true]);
    }

    public function cancel(Request $request)
    {
        $tid = $request->tid;
        DB::table('thread')
            ->where('tid',$tid)
            ->update([
                'black'=>'0'
            ]);
        return redirect(url('/user/notice'))->with(['message'=>'已驳回','url' =>url('/admin/black'), 'jumpTime'=>3,'status'=>true]);
    }

    public function blackindex()
    {
        $result = DB::table('forum')->join('thread', 'forum.fid', '=', 'thread.fid')->where('black',1)->paginate(10);
        return view('/admin/posts/black',['result'=>$result]);
    }

    public function bestindex()
    {
        $result = DB::table('forum')->join('thread', 'forum.fid', '=', 'thread.fid')->where('best',1)->paginate(10);
        return view('/admin/posts/best',['result'=>$result]);
    }

    public function topindex()
    {
        $result = DB::table('forum')->join('thread', 'forum.fid', '=', 'thread.fid')->where('top',1)->paginate(10);
        return view('/admin/posts/top',['result'=>$result]);
    }
}
