<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MedleController extends Controller
{
    // 勋章展示

    public function index()
    {
        // 传送头像
        //    $username = $_SESSION['username'];
        $username = $_SESSION['username'];

        $uid = $_SESSION['uid'];
        $icon = DB::table('bbs_user_info')->where('uid', $uid)->select('icon', 'credits')->first();

        // 所有的徽章
        $allimage = DB::table('bbs_medleinfo')
            ->select()
            ->get();
//        dd($allimage);

        // 判断徽章有没有被用户获取
            $hasimage = DB::table('bbs_medleinfo')
                ->join('bbs_user_medle', 'bbs_user_medle.medal_id', '=', 'bbs_medleinfo.medal_id')
                ->where('bbs_user_medle.uid', $uid)
                ->select()
                ->get();
            $k = '';
        // 获取勋章状态为1的id数组
        foreach ($hasimage as $v){

                if ($v->statues == 1) {
                    $k .= ',' . $v->medal_id;
                }
            }
            $k = ltrim($k,',');
            $k = explode(',',$k);
        return view('/user.medle')->with('icon', $icon->icon)->with('allimage', $allimage)->with('k',$k);

    }

    // 勋章添加
    public function insert($id)
    {
        $uid = $_SESSION['uid'];

        // 取出用户积分
        $credits = DB::table('bbs_user_info')->where('uid',$uid)->first();
        $credits = $credits->credits;
        // 取出勋章积分
        $hasimage = DB::table('bbs_medleinfo')
            ->where('medal_id', $id)
            ->first();

        $points = $hasimage->points;
        //用户积分判断
        if ($credits <= $points){
            return false;
        }
        return $points;
        $result = DB::table('bbs_user_medle')->insert(['uid' => $uid, 'medal_id' => $id, 'statues' => 1]);
        if ($result){
            return $id;
        }else{
            return false;
        }
    }

    public function index2()
    {
        // 传送头像
        //    $username = $_SESSION['username'];
        $username = $_SESSION['username'];
        $uid = $_SESSION['uid'];
        $icon = DB::table('bbs_user_info')->where('uid', $uid)->select('icon', 'credits')->first();

        $uid = $_SESSION['uid'];
        // 已经获取的徽章
        $image = DB::table('bbs_user_medle')
            ->join('bbs_medleinfo', 'bbs_user_medle.medal_id', '=', 'bbs_medleinfo.medal_id')
            ->where('bbs_user_medle.uid', $uid)
            ->get();
        return view('/user.medle2')->with('image', $image)->with('icon', $icon->icon);
    }


}
