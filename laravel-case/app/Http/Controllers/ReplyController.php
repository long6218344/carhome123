<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ReplyController extends Controller
{
    public function index()
    {
        $result = DB::table('forum')->join('thread', 'forum.fid', '=', 'thread.fid')->join('reply', 'forum.fid', '=', 'reply.fid')->get();
        return view('/admin/posts/reply',['result'=>$result]);
    }

}
