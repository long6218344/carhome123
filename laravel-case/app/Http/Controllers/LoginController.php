<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/home/login');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function join(Request $request)
    {

        $name = $request->user;
        $pass = md5($request->pwd);


        $arr = "'$name'";

        $uname = DB::select('select * from `bbs_user_info` where `username` = '.$arr);

        $uid = DB::select('select uid from `bbs_user_info` where `username` = '.$arr);

        if(empty($uname))
        {
            $this->notice('您输入的帐号不存在');
        }

        foreach ($uname as $user) {
            $pwd =  $user->pwd;
            $uname = $user->username;
            $uid = $user->uid;
        }

        if ($pass !== $pwd){$this->notice('您的密码不正确');}

        $_SESSION['username'] = $uname;

        $_SESSION['uid'] = $uid;

        // 登录得分
        // 1. 选出积分
        $point = DB::table('bbs_pointrule')
            ->where('typeid',1)
            ->select('value')
            ->first();
        $point = $point->value;
        // 2. 加入数据库积分
        $result = DB::table('bbs_point')
            ->insert([
                ['point'=>$point, 'uid'=>$uid, 'typeid'=>1],
            ]);
        // 3. 存入用户表

        // 3.1 存入前先从用户表中选出积分,在相加
        $credits = DB::table('bbs_user_info')
            ->where('uid',$uid)
            ->select('credits')
            ->first();
        $credits = $credits->credits;
        $credits = $credits + $point;
        // 更新user数据
        $result =  DB::table('bbs_user_info')
            ->where('uid',$uid)
            ->update(['credits'=>$credits]);

        $this->notice('登录成功',url('/'));


    }

    public function out(Request $request)
    {



        $_SESSION['username'] = null;

        $_SESSION['uid'] = null;



        $this->notice('退出成功',url('/'));



    }


    /**
     * @param $msg
     * @param string $url
     * @param float $time
     */

    public function notice($msg, $url = '' ,$time = 1)
    {

        echo '<body style="margin:0">';
        echo '<div style="width: 100%;height: 100%;position: fixed;">

     <h1 style="font-size: 200px;position: fixed;left: 200px;top:50px;">ovo </h1>
     <div>
        <p style="font-size: 35px;position: fixed;left: 200px;top:400px;
        color: red;">['.$msg.']</p>
        <p style="font-size: 20px;position: fixed;left: 300px;top:500px;">
        
        大概还需'.$time.'秒加载完成 
        
        </p>
        
     </div>
     </div>';


        // 如果没有传入url, 默认返回到上一页面
        if( $url  == ''	){
            $url = $_SERVER['HTTP_REFERER'];
        }

        echo '<meta http-equiv="refresh" content="'.$time.'; url='.$url.'">';
        die;

    }

}


