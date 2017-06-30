<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
    public function index()
    {
        $result = DB::table('forum')->join('post', 'forum.fid', '=', 'post.fid')->get();
        return view('/admin/posts/post',['result'=>$result]);
    }



    public function delete(Request $request)
    {
        $pid = $request->pid;
        if(DB::table('post')->where('pid',$pid)->delete()) {
            echo 'ok';
        } else {
            echo 'no';
        }
    }
}
