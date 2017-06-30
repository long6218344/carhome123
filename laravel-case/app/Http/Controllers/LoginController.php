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

        foreach ($uname as $user) {$pwd =  $user->pwd;}

//         dump($pass , $pwd);die;

         if ($pass !== $pwd){$this->notice('您的密码不正确');}



         $_SESSION['username'] = $name;


        $_SESSION['uid'] = $uid[0]->uid;
//        echo 123;die;
//var_dump(session('username'));
        $this->notice('登录成功','/');
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


