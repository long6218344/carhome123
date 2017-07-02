<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ReplyController extends Controller
{
    public function index()
    {
        $result = DB::table('forum')->join('reply', 'forum.fid', '=', 'reply.fid')->paginate(10);
        return view('/admin/posts/reply',['result'=>$result]);
    }

    public function select(Request $request)
    {
        $search = $request->input('search');
//        $thread = DB::table('thread')->value('title');
        $result = DB::table('forum')->join('reply', 'forum.fid', '=', 'reply.fid')->where('rmessage','like','%'.$search.'%')->paginate(10);
        return view('/admin/posts/reply',['result'=>$result]);
    }

    public function delete(Request $request)
    {
        $rid = $request->rid;
        $renumber = DB::table('thread')->join('reply', 'thread.tid', '=', 'reply.tid')->where('rid',$rid)->value('renumber');
        $renumber = ($renumber - 1);
        $tid = DB::table('thread')->join('reply', 'thread.tid', '=', 'reply.tid')->where('rid',$rid)->value('thread.tid');
//        var_dump($rid,$renumber,$tid);die;
        DB::transaction(function() use ($rid, $renumber, $tid)
        {
            try {
                DB::table('reply')->where('rid',$rid)->delete();
                DB::table('thread')->where('tid',$tid)->update(['renumber'=>$renumber]);
            } catch (\Exception $e) {
                return redirect(url('/user/notice'))->with(['message'=>'失败','url' =>url('/admin/reply'), 'jumpTime'=>3,'status'=>true]);
                exit;
            }
        });
        return redirect(url('/user/notice'))->with(['message'=>'成功','url' =>url('/admin/reply'), 'jumpTime'=>3,'status'=>true]);
    }
}
