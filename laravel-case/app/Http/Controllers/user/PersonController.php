<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    public function show($id){


        $user = DB::table('bbs_user_info')->where('bbs_user_info.uid', $id)->first();
        // 最新回复
        $user1 = DB::table('post')->where('post.pauthorid',$id)->orderBy('pdateline')->paginate(3);
        // 最新关注我好友
       
                        
        
        // dump($user1);die;
        $num = DB::table('thread')->where('tauthorid',$id)->count();
        $num1 = DB::table('thread')->where([['tauthorid',$id],['best',1]])->count();
        return view('user/user_person',[
            'user'=>$user,
            'user1'=>$user1,
            'id'=>$id,
            'num'=>$num,
            'num1'=>$num1,
            
        ]);
    }

    
}
