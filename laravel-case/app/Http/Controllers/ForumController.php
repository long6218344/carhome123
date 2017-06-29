<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ForumController extends Controller
{
    public function index()
    {
        $result = DB::table('forum')->get();
//        dump($result);
//        view('admin/posts/forum',['result'=>$result]);
//        view('admin/posts/forum',['result'=>123123]);
        return view('/admin/posts/forum',['result'=>$result]);
    }

    public function add(Request $request)
    {
        $forum_name = $request->input('forum_name');
        $status = $request->input('fstatus');
        if(DB::table('forum')->insert([
            'name'=>$forum_name,
            'fstatus'=>$status
        ])) {
            echo 'ok';
             } else {
            echo 'no';
            }
    }

    public function edit(Request $request)
    {
        $fid = $request->fid;
        $status = $request->status;
//        dump($fid,$status);die;
        if(DB::table('forum')
            ->where('fid',$fid)
            ->update([
                'status'=>$status
            ])) {
            echo 'ok';
        } else {
            echo 'no';
        }
    }

    public function delete(Request $request)
    {
        $fid = $request->fid;
        if(DB::table('forum')->where('fid',$fid)->delete()) {
            echo 'ok';
        } else {
            echo 'no';
        }
    }
}
