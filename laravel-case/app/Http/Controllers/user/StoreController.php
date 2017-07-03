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

        $num = DB::table('bbs_astore')->select('thid')->where('uid',$id)->orderBy('time','desc')->get();
        // 如果有收藏贴
        if(count($num) != 0){
            // 收藏表 thread表 post表 查
            foreach($num as $k){
                // dump($k);die;
                $list[] = DB::table('bbs_astore')
                ->join('post','bbs_astore.thid','=','post.tid')
                ->join('thread','thread.tid','=','bbs_astore.thid')
                ->where('post.tid',$k->thid)
                ->select('thid','ptitle','pmessage','bbs_astore.time')
                ->get();
            }
            // dd($list);
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
        $info = DB::table('bbs_astore')->where([['uid', $_SESSION['uid']],['thid',$id]])->delete();
        return $id;
    }
    // 收藏论坛
    public function showforum(){
        $id = $_SESSION['uid'];
        $user = DB::table('bbs_user_info')->select('icon')->where('uid', $id)->first();
        // 收藏贴

        $num = DB::table('bbs_bstore')->select('fid')->where('uid',$id)->get();
        if(count($num) != 0){
            // 收藏表 thread表 post表 查
            foreach($num as $k){
                $list[] = DB::table('forum')
                ->where('forum.fid',$k->fid)
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

    // 添加收藏
    public function add($id){
        $info = DB::table('bbs_astore')->insert(

            ['uid' => $_SESSION['uid'], 'thid' => $id,'time'=>time()]
        );
        return $id;
    }

    
}
