<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function show(){
    	session(['username'=>'zty']);
        $user = DB::table('bbs_user_info')->where('username', session('username'))->first();
        session(['id'=>$user->uid]);
        $num = DB::table('thread')->where('tauthorid',session('id'))->count();
        $num1 = DB::table('thread')->where([['tauthorid',session('id')],['best',1]])->count();
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
