<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class BlogPlateController extends Controller
{
    public function index(Request $request)
    {
        $result = DB::table('forum')
            ->join('thread', 'forum.fid', '=', 'thread.fid')
            ->where('forum.fid',$request->fid)
            ->get();
        $forum = DB::table('forum')
            ->where('fid',$request->fid)
            ->get();
//        var_dump($result);
//        $result->toArray();
        return view('/home/BlogPlate',['result'=>$result,'forum'=>$forum]);
    }
}
