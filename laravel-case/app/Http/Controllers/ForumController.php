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
        $name = $request->input('name');
        $status = $request->input('status');
        if(DB::table('forum')->insert([
            'name'=>$name,
            'fstatus'=>$status
        ])) {
            return redirect(url('/user/notice'))->with(['message'=>'成功','url' =>url('/admin/forum'), 'jumpTime'=>3,'status'=>true]);
             } else {
            return redirect(url('/user/notice'))->with(['message'=>'失败','url' =>url('/admin/forum'), 'jumpTime'=>3,'status'=>true]);
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
                'fstatus'=>$status
            ])) {
            return redirect(url('/user/notice'))->with(['message'=>'成功','url' =>url('/admin/forum'), 'jumpTime'=>3,'status'=>true]);
        } else {
            return redirect(url('/user/notice'))->with(['message'=>'失败','url' =>url('/admin/forum'), 'jumpTime'=>3,'status'=>true]);
        }
    }

    public function delete(Request $request)
    {
        $fid = $request->fid;
        if(DB::table('forum')->where('fid',$fid)->delete()) {
            return redirect(url('/user/notice'))->with(['message'=>'成功','url' =>url('/admin/forum'), 'jumpTime'=>3,'status'=>true]);
        } else {
            return redirect(url('/user/notice'))->with(['message'=>'失败','url' =>url('/admin/forum'), 'jumpTime'=>3,'status'=>true]);
        }
    }
}
