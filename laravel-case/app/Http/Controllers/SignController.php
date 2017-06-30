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

        if (!empty($uname)){
            $this->notice('该帐号已存在 请重新更换帐号');
        }

        $mdpwd = md5($pass);

        $id = DB::table('bbs_user_info')->insertGetId(
        ['username' => $name, 'pwd' => $mdpwd, 'sex' => $sex]
    );
        if ($id)
        {
            $_SESSION['username'] = $name;

            $this->notice('注册成功','/');

        }
        else
        {
            $this->notice('注册失败');
        }
    }
}




