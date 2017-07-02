<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ForumController extends Controller
{
    public function index()
    {
        $result = DB::table('forum')->paginate(10);
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
        DB::transaction(function() use ($rid)
        {
            try {
                DB::table('forum')->where('fid',$fid)->delete();
                DB::table('post')->where('fid',$fid)->delete();
                DB::table('reply')->where('fid',$fid)->delete();
                DB::table('thread')->where('fid',$fid)->delete();
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
//        dd($search);die;
        $result = DB::table('forum')
            ->where('name','like','%'.$search.'%')
            ->paginate(10);

        return view('/admin/posts/forum',['result'=>$result]);
    }

}
