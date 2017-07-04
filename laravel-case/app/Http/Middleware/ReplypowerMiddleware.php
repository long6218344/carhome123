<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use Closure;

class ReplypowerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty($_SESSION['uid'])){
            return redirect(url('/user/notice'))->with(['message'=>'请登录','url' =>url('/home/login'), 'jumpTime'=>3,'status'=>false]);
        }
        $uid = $_SESSION['uid'];
        // 判断用户uid权限
//        dd($uid);
        // 1. 从数据库获取权限
        $result = DB::table('bbs_user_info')
            ->join('bbs_user_group','bbs_user_group.gid','=','bbs_user_info.grouppower')
            ->where([
                ['bbs_user_info.uid','=',$uid]
            ])
            ->select()
            ->first();
//        dd($result);

        // 如果用户为会员,判断他的等级,不同等级对应不同权限
        if($result->grouppower == 1){

            if($result->credits >= 100 && $result->credits < 200){
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',6]
                    ])
                    ->select()
                    ->first();
                $replypower = $result->allow_reply;

                // 判断有没有发帖权限
                if($replypower == 1){
                    return $next($request);
                }else{
                    return  redirect('/user/notice')->with(['message'=>'权限不够','url' =>'/', 'jumpTime'=>3,'status'=>false]);
                }

            }elseif($result->credits >= 200 && $result->credits <500){
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',7]
                    ])
                    ->select()
                    ->first();
                $replypower = $result->allow_reply;

                // 判断有没有发帖权限
                if($replypower == 1){
                    return $next($request);
                }else{
                    return  redirect('/user/notice')->with(['message'=>'权限不够','url' =>'/', 'jumpTime'=>3,'status'=>false]);
                }

            }elseif($result->credits >= 500 && $result->credits <1000){
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',8]
                    ])
                    ->select()
                    ->first();
                $replypower = $result->allow_reply;

                // 判断有没有发帖权限
                if($replypower == 1){
                    return $next($request);
                }else{
                    return  redirect('/user/notice')->with(['message'=>'权限不够','url' =>'/', 'jumpTime'=>3,'status'=>false]);
                }

            }elseif($result->credits >=1000 && $result->credits <5000){
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',9]
                    ])
                    ->select()
                    ->first();
                $replypower = $result->allow_reply;
//              dd($postpower);
                // 判断有没有发帖权限
                if($replypower == 1){
                    return $next($request);
                }else{
//                  dd(1);
                    return  redirect('/user/notice')->with(['message'=>'权限不够','url' =>'/', 'jumpTime'=>3,'status'=>false]);
                }

            }elseif($result->credits >=5000 && $result->credits <10000){
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',10]
                    ])
                    ->select()
                    ->first();

                $replypower = $result->allow_reply;

                // 判断有没有发帖权限
                if($replypower == 1){
                    return $next($request);
                }else{
//                  dd(1);
                    return  redirect('/user/notice')->with(['message'=>'权限不够','url' =>'/', 'jumpTime'=>3,'status'=>false]);
                }

            }elseif($result->credits >= 10000 && $result->credits <50000){
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',11]
                    ])
                    ->select()
                    ->first();
                $replypower = $result->allow_reply;

                // 判断有没有发帖权限
                if($replypower == 1){
                    return $next($request);
                }else{
                    return  redirect('/user/notice')->with(['message'=>'权限不够','url' =>'/', 'jumpTime'=>3,'status'=>false]);
                }
            }elseif($result->credits >= 0 && $result->credits < 100){
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',1]
                    ])
                    ->select()
                    ->first();

                $replypower = $result->allow_reply;

                // 判断有没有发帖权限
                if($replypower == 1){
                    return $next($request);
                }else{
                    return  redirect('/user/notice')->with(['message'=>'权限不够','url' =>'/', 'jumpTime'=>3,'status'=>false]);
                }
//                dd($result);
            }else{
                $result = DB::table('bbs_user_group')
                    ->where([
                        ['bbs_user_group.gid','=',12]
                    ])
                    ->select()
                    ->first();
                $replypower = $result->allow_reply;

                // 判断有没有发帖权限
                if($replypower == 1){
                    return $next($request);
                }else{
                    return  redirect('/user/notice')->with(['message'=>'权限不够','url' =>'/', 'jumpTime'=>3,'status'=>false]);
                }
            }
        }
// ------------------ 如果不是会员组--------------------
        // 如果是游客组
        if ($result->grouppower == 2) {
            $result = DB::table('bbs_user_group')
                ->where([
                    ['bbs_user_group.gid', '=', 2]
                ])
                ->select()
                ->first();
            $replypower = $result->allow_reply;

            // 判断有没有发帖权限
            if ($replypower == 1) {
                return $next($request);
            } else {
                return redirect('/user/notice')->with(['message' => '权限不够', 'url' => '/', 'jumpTime' => 3, 'status' => false]);
            }
        }
        // 如果是管理员
        if ($result->grouppower == 3) {
            $result = DB::table('bbs_user_group')
                ->where([
                    ['bbs_user_group.gid', '=', 3]
                ])
                ->select()
                ->first();
            $replypower = $result->allow_reply;

            // 判断有没有发帖权限
            if ($replypower == 1) {
                return $next($request);
            } else {
                return redirect('/user/notice')->with(['message' => '权限不够', 'url' => '/', 'jumpTime' => 3, 'status' => false]);
            }
        }
        // 如果是版主
        if ($result->grouppower == 4){
            $result = DB::table('bbs_user_group')
                ->where([
                    ['bbs_user_group.gid','=',4]
                ])
                ->select()
                ->first();
            $replypower = $result->allow_reply;

            // 判断有没有发帖权限
            if($replypower == 1){
                return $next($request);
            }else{
                return  redirect('/user/notice')->with(['message'=>'权限不够','url' =>'/', 'jumpTime'=>3,'status'=>false]);
            }
        }
        // 如果是禁言
        if ($result->grouppower == 5){
            $result = DB::table('bbs_user_group')
                ->where([
                    ['bbs_user_group.gid','=',5]
                ])
                ->select()
                ->first();
            $replypower = $result->allow_reply;

            // 判断有没有发帖权限
            if($replypower == 1){
                return $next($request);
            }else{
                return  redirect('/user/notice')->with(['message'=>'权限不够','url' =>'/', 'jumpTime'=>3,'status'=>false]);
            }
        }


        return $next($request);//通过了检测,进行下一步操作
    }
}
