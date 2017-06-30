<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class CheckPower
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $uid = $_SESSION['admin']['uid'];
        // 1.获取用户权限
        $result = DB::table('bbs_auth_group_access')
            ->join('bbs_auth_group', 'bbs_auth_group_access.group_id', '=', 'bbs_auth_group.id')
            ->select('bbs_auth_group_access.uid', 'bbs_auth_group.rules')
            ->where('bbs_auth_group_access.uid', '=', $uid)
            ->get();
//        dd($result);
        // 2. 获取用户当前操作规则
        $action = Route::currentRouteAction();
        //控制器和路由
        $d = strchr(strstr($action, 'Controllers'), '\\');
        $e = trim($d, '\\');
        // 3. 获取规则组权限id
        $rulepower = DB::table('bbs_auth_rule')
            ->select('id')
            ->where('name', '=', $e)
            ->first();


        // 4.判断用户当前操作是否在规则里面
        $result1 = DB::table('bbs_auth_group_access')
            ->join('bbs_auth_group', 'bbs_auth_group_access.group_id', '=', 'bbs_auth_group.id')
            ->select('bbs_auth_group_access.uid', 'bbs_auth_group.rules')
            ->where('bbs_auth_group_access.uid', '=', $uid)
            ->first();
//        dd($result1);
        if (!$result1) {
            return redirect('/admin/layout')->with('error', '权限不够');
        }
//        dd($rulepower);
        foreach ($result as $v) {
            $rules = $v->rules;
            $r = explode(',', $rules);
//            $num = count($r);
            // 2. 判断用户当前操作是否在规则里面
            $action = Route::currentRouteAction();
//        dd($action);
//       dd(strstr($action,'Controllers')) ;

            $d = strchr(strstr($action, 'Controllers'), '\\');
            $e = trim($d, '\\');

//        dd($e);
            // 3. 获取规则组权限
            $rulepower = DB::table('bbs_auth_rule')
                ->select('id')
                ->where('name', '=', $e)
                ->get();
            // dump($rulepower);die;

            $a = '';
            foreach ($rulepower as $v) {
                $a .= ',' . $v->id;
            }
            $a = ltrim($a, ',');
            $a = explode(',', $a);

//        foreach ($result as $v){
//            $rules = $v->rules;
//            $r = explode(',',$rules);
//            $num = count($r);
////            dd($num);die;
//            for ($i=0;$i<$num;$i++){
//                // 判断数组中是否有权限,需要分割
//                $power = in_array($r[$i],$a);
//                if(!$power){
//                    return back()->with('error','权限不足');
//                }
//            }
//        }


            $d = strchr(strstr($action, 'Controllers'), '\\');
            $e = trim($d, '\\');

            // 3. 获取规则组权限
            $rulepower = DB::table('bbs_auth_rule')
                ->select('id')
                ->where('name', '=', $e)
                ->get();

            $a = '';
            foreach ($rulepower as $v) {
                $a .= ',' . $v->id;
            }
            $a = ltrim($a, ',');
            $a = explode(',', $a);
            if ($_SESSION['admin']['name'] != 'admin') {
                if (empty($rulepower[0])) {
                    return redirect('/admin/layout')->with('error', '权限不够');
                }
                if (!in_array($rulepower[0]->id, $r)) {
                    return redirect('/admin/layout')->with('error', '权限不够');
                }
            }
//            dd($_SESSION['admin']['name'] );
            return $next($request);
        }
    }
}
