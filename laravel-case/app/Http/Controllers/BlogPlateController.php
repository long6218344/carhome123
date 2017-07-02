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
            ->where('forum.fid',$request->fid)->orderBy('replies','desc')
            ->paginate(5);
        $forum = DB::table('forum')
            ->where('fid',$request->fid)
            ->get();

        return view('/home/index2',['result'=>$result,'forum'=>$forum]);
    }





    public function post(Request $request)
    {
     $result = DB::table('forum')
        ->join('thread', 'forum.fid', '=', 'thread.fid')
        ->where('forum.fid',$request->fid)->orderBy('tdateline','desc')
        ->paginate(5);
        $forum = DB::table('forum')
            ->where('fid',$request->fid)
            ->get();

        return view('/home/index2',['result'=>$result,'forum'=>$forum]);
    }
    public function reply(Request $request)
    {
        $result = DB::table('forum')
            ->join('thread', 'forum.fid', '=', 'thread.fid')
            ->where('forum.fid',$request->fid)->orderBy('replies','desc')
            ->paginate(5);
        $forum = DB::table('forum')
            ->where('fid',$request->fid)
            ->get();

        return view('/home/index2',['result'=>$result,'forum'=>$forum]);
    }
    public function hot(Request $request)
    {
        $result = DB::table('forum')
            ->join('thread', 'forum.fid', '=', 'thread.fid')
            ->where('forum.fid',$request->fid)->orderBy('clicknumber','desc')
            ->paginate(5);
        $forum = DB::table('forum')
            ->where('fid',$request->fid)
            ->get();

        return view('/home/index2',['result'=>$result,'forum'=>$forum]);
    }
    public function best(Request $request)
    {
        $result = DB::table('forum')
            ->join('thread', 'forum.fid', '=', 'thread.fid')
            ->where('forum.fid',$request->fid)->where('best',1)->orderBy('replies','desc')
            ->paginate(5);
        $forum = DB::table('forum')
            ->where('fid',$request->fid)
            ->get();

        return view('/home/index2',['result'=>$result,'forum'=>$forum]);
    }






}
