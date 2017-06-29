<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserpowerController extends Controller
{
    // 个人中心显示权限

    public function index(){

        // 传送头像
        //    $username = $_SESSION['username'];
        $username = 'admin';
        $uid = '2';
        $icon = DB::table('bbs_user_info')->where('username', $username)->select('icon','credits')->first();
//        dd($icon);

        // 从数据库获取权限
        $result = DB::table('bbs_user_info')
            ->join('bbs_user_group','bbs_user_group.gid','=','bbs_user_info.grouppower')
            ->where([
                ['bbs_user_info.uid','=',$uid]
            ])
            ->select()
            ->first();
//        dd($result);
        $groupname = $result->groupname;

        // 如果用户为会员,判断他的等级,不同等级对应不同权限
        if($result->grouppower == 1){
            if($result->credits >= 100 && $result->credits < 200){
//                $groupname = $result->groupname;
                $level = 200 - $result->credits;
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',6]
                    ])
                    ->select()
                    ->first();
//                dd($result);

            }elseif($result->credits >= 200 && $result->credits <500){
                $level = 500 - $result->credits;
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',7]
                    ])
                    ->select()
                    ->first();
            }elseif($result->credits >= 500 && $result->credits <1000){
                $level = 1000 - $result->credits;
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',8]
                    ])
                    ->select()
                    ->first();

            }elseif($result->credits >=1000 && $result->credits <5000){
                $level = 5000 - $result->credits;
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',9]
                    ])
                    ->select()
                    ->first();

            }elseif($result->credits >=5000 && $result->credits <10000){
                $level = 10000 - $result->credits;
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',10]
                    ])
                    ->select()
                    ->first();

            }elseif($result->credits >= 10000 && $result->credits <50000){
                $level = 50000 - $result->credits;
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',11]
                    ])
                    ->select()
                    ->first();
//                dd($result);
            }else{
                $level = 0;
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',12]
                    ])
                    ->select()
                    ->first();
            }
        }
//        dd($result);

        return view('/user.user_power')->with('icon',$icon->icon)->with('power',$result)->with('credits',$icon->credits)->with('level',$level)->with('groupname',$groupname);
    }

}
