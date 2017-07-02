<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
    public function index()
    {
        $result = DB::table('forum')->join('post', 'forum.fid', '=', 'post.fid')->paginate(10);
        return view('/admin/posts/post',['result'=>$result]);
    }



    public function delete(Request $request)
    {
        $pid = $request->pid;
        $tid = DB::table('post')->where('pid',$pid)->value('tid');
        $fid = DB::table('post')->where('pid',$pid)->value('fid');
//        $renumber = DB::table('thread')->join('reply', 'thread.tid', '=', 'reply.tid')->where('rid',$rid)->value('renumber');
//        $renumber = ($renumber - 1);
        $posts = DB::table('forum')->where('fid',$fid)->value('posts');
        $posts = ($posts - 1);
        $todayposts = DB::table('forum')->where('fid',$fid)->value('todayposts');
        $todayposts = ($todayposts - 1);
        $boutique = DB::table('forum')->where('fid',$fid)->value('boutique');
        $best = DB::table('thread')->where('tid',$tid)->value('best');
        if($best == 1){$boutique = ($boutique - 1);}
//        var_dump($posts,$todayposts);die;
        DB::transaction(function() use ($pid, $tid, $fid, $posts, $todayposts, $boutique, $best)
        {
            try {
                DB::table('post')->where('pid',$pid)->delete();
                DB::table('reply')->where('pid',$pid)->delete();
                DB::table('thread')->where('tid',$tid)->delete();
                DB::table('forum')->where('fid',$fid)->update([
                    'posts'=>$posts,
                'todayposts'=>$todayposts,
                'boutique'=>$boutique
                ]);
            } catch (\Exception $e) {
                return redirect(url('/user/notice'))->with(['message'=>'失败','url' =>url('/admin/post'), 'jumpTime'=>3,'status'=>true]);
                exit;
            }
        });
        return redirect(url('/user/notice'))->with(['message'=>'成功','url' =>url('/admin/post'), 'jumpTime'=>3,'status'=>true]);
    }





    public function select(Request $request)
    {
        $search = $request->input('search');

        $result = DB::table('forum')->join('post', 'forum.fid', '=', 'post.fid')->where('ptitle','like','%'.$search.'%')->orWhere('pmessage','like','%'.$search.'%')->paginate(10);
        return view('/admin/posts/post',['result'=>$result]);
    }
}
