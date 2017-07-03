<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PointController extends Controller
{
    //积分统计
    public function index()
    {

    $username = $_SESSION['username'];
//        $username = 'admin';
        $uid = $_SESSION['uid'];
        $icon = DB::table('bbs_user_info')->where('username', $username)->select('icon')->first();

        $sum1 = DB::table('bbs_point')
            ->join('bbs_pointrule', 'bbs_point.typeid', '=', 'bbs_pointrule.typeid')
            ->where([
                ['bbs_point.uid', '=', $uid],
                ['bbs_point.typeid','=',1]
            ])
            ->select('bbs_point.point')
            ->get();
//        dd($sum1);
        // 1. 登录注册积分
        $loginsum ='';
        foreach ($sum1 as $v){
//            dd($v->point);
            $loginsum += $v->point;

        }
//            dd($loginsum);

        // 3. 发帖
        $reply = '';
        $sum3 = DB::table('bbs_point')
            ->join('bbs_pointrule', 'bbs_point.typeid', '=', 'bbs_pointrule.typeid')
            ->where([
                ['bbs_point.uid', '=', $uid],
                ['bbs_point.typeid','=',3]
            ])
            ->select('bbs_point.point')
            ->get();
        foreach ($sum3 as $v){
            $reply += $v->point;
        }
//        dd($reply);

        // 2.回帖
        $post = '';
        $sum4 = DB::table('bbs_point')
            ->join('bbs_pointrule', 'bbs_point.typeid', '=', 'bbs_pointrule.typeid')
            ->where([
                ['bbs_point.uid', '=', $uid],
                ['bbs_point.typeid','=',2]
            ])
            ->select('bbs_point.point')
            ->get();
//        dd($sum4);
        foreach ($sum4 as $v){
        
            $post += $v->point;
        }
//        dd($post);
        $userpoint = $post + $loginsum + $reply;
//        dd($userpoint);
        $result = DB::table('bbs_user_info')->where('uid',$uid)->update(['credits'=>$userpoint]);
//        dd($result);
        return view('/user.user_point')->with('icon', $icon->icon)->with('userpoint',$userpoint)->with('loginsum',$loginsum)->with('reply',$reply)->with('post',$post);

    }
}