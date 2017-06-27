<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class CheckPower
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
//        $uid = $request->input('uid');
        $uid = 9;
        // 1.获取用户权限
        $result = DB::table('bbs_auth_group_access')
                ->join('bbs_auth_group','bbs_auth_group_access.group_id','=','bbs_auth_group.id')
                ->select('bbs_auth_group_access.uid','bbs_auth_group.rules')
                ->where('bbs_auth_group_access.uid','=',$uid)
                ->get();
//        dd($result);

        // 2.获取规则组权限
        $rulepower = DB::table('bbs_auth_rule')->select('id')->get();
//        dump($rulepower);die;
        $a = '';
        foreach($rulepower as $v){
            $a .=','.$v->id;
        }
        $a = ltrim($a,',');
        $a = explode(',',$a);
//        dd($a);die;

        // 3.判断用户权限是否在规则里面
        foreach ($result as $v){
           $rules = $v->rules;
            $r = explode(',',$rules);
            $num = count($r);
//            dd($num);die;
            for ($i=0;$i<$num;$i++){
                // 判断数组中是否有权限,需要分割
                $power = in_array($r[$i],$a);
                if(!$power){
                    return back()->with('error','权限不足');
                }
            }
        }

        return $next($request);
    }
}
