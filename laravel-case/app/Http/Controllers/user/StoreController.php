<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function show(){
        $id = $_SESSION['uid'];
        $user = DB::table('bbs_user_info')->select('icon')->where('uid', $id)->first();
        // 收藏贴
        $num = DB::table('bbs_astore')->select('thid')->where('uid',$id)->get();
        if(!empty($num)){
            // 收藏表 thread表 post表 查
            foreach($num as $k){
                $list[] = DB::table('post')
                ->join('bbs_astore','bbs_astore.thid','=','post.tid')
                ->join('thread','thread.tid','=','post.tid')
                ->where('post.tid',$k->thid)
                ->select('thid','ptitle','pmessage','time')
                ->orderBy('time','desc')
                ->get();
            }
            // dump(time());die;
            return view('user/user_store',[
            'icon'=>$user->icon,
            'list'=>$list,
           
            ]);
        }else{
            return view('user/user_store',[
            'icon'=>$user->icon,
            'list'=>'',
           
            ]);
        }

    }

    public function del($id){
        // dd($id);
        $info = DB::table('bbs_astore')->where([['uid', $_SESSION['uid']],['postid',$id]])->delete();
        return $id;
    }
    // 收藏论坛
    public function showforum(){
        $id = $_SESSION['uid'];
        $user = DB::table('bbs_user_info')->select('icon')->where('uid', $id)->first();
        // 收藏贴
        $num = DB::table('bbs_bstore')->select('fid')->where('uid',$id)->get();
        if(!empty($num)){
            // 收藏表 thread表 post表 查
            foreach($num as $k){
                $list[] = DB::table('forum')
                // ->join('forum','forum.fid','=','post.tid')
                // ->join('thread','thread.tid','=','post.tid')
                ->where('forum.fid',$k->fid)
                // ->select('thid','ptitle','pmessage','time')
                // ->orderBy('time','desc')
                ->get();
            }
            return view('user/user_bbstore',[
            'icon'=>$user->icon,
            'list'=>$list,
           
            ]);
        }else{
            return view('user/user_bbstore',[
            'icon'=>$user->icon,
            'list'=>'',
           
            ]);
        }
    }

     public function cancel($id){
        // dd($id);
        $info = DB::table('bbs_bstore')->where([['uid', $_SESSION['uid']],['fid',$id]])->delete();
        return $id;
    }

    
}
