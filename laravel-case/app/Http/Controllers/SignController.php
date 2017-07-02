<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SIgnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/home/sign');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $name = $request->username;
        $pass = $request->pwd;
        $passagain = $request->pwdagain;
        $sex = $request->sex;



        if (!preg_match('/^[A-Za-z0-9]+$/', $pass)) {

            $this->notice('密码需要以字母开头,5-16字节,字母数字下划线');

        }

        if ($pass !== $passagain)
        {
         $this->notice('两次输入的密码不正确');

        }
        $arr = "'$name'";


        $uname = DB::select('select * from `bbs_user_info` where `username` = '.$arr);
//        dd($uname);
        if (!empty($uname)){
            $this->notice('该帐号已存在 请重新更换帐号');
        }

        $mdpwd = md5($pass);

        $id = DB::table('bbs_user_info')->insertGetId(
        ['username' => $name, 'pwd' => $mdpwd, 'sex' => $sex,'regdate'=>time()]
    );
//        $id = 2;
        if ($id)
        {
            $_SESSION['username'] = $name;
            $_SESSION['uid'] = $id;

            // 注册得分20

            // 1. 选出积分
            $point = DB::table('bbs_pointrule')
                ->where('typeid',1)
                ->select('value')
                ->first();
            $point = $point->value;

            // 2. 加入数据库积分
            $result = DB::table('bbs_point')
                ->insert([
                    ['point'=>$point, 'uid'=>$id, 'typeid'=>1],
                    ['point'=>0,'uid'=>$id,'typeid'=>2],
                    ['point'=>0,'uid'=>$id,'typeid'=>3],
                    ['point'=>0,'uid'=>$id,'typeid'=>4],
                ]);
            // 3. 存入用户表

            // 3.1 存入前先从用户表中选出积分,在相加
               $credits = DB::table('bbs_user_info')
                    ->where('uid',$id)
                    ->select('credits')
                    ->first();
               $credits = $credits->credits;
            $credits = $credits + $point;

            // 更新user数据
            $result =  DB::table('bbs_user_info')
                ->where('uid',$id)
                ->update(['credits'=>$credits]);
//            dd($result);
            $this->notice('注册成功','/');

        }
        else
        {
            $this->notice('注册失败');
        }
    }

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




