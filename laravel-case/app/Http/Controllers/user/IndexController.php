<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function show(){
        // session(['uid'=>9]);

        $id = $_SESSION['uid'];
        $user = DB::table('bbs_user_info')->where('uid', $id)->first();
        $num = DB::table('thread')->where('tauthorid',$id)->count();
        $num1 = DB::table('thread')->where([['tauthorid',$id],['best',1]])->count();
        // dump($user);die;
        return view('user/user_index',[
            'name'=>$user->username,
            'icon'=>$user->icon,
            'sex'=>$user->sex,
            'fans'=>$user->fans,
            'views'=>$user->views,
            'num'=>$num,
            'num1'=>$num1,
        ]);
    }

    
}
