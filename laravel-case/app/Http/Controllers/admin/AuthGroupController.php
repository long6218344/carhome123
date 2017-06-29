<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class AuthGroupController extends Controller
{
    //管理组列表
    public function index()
    {
        $result = DB::table('bbs_auth_group')->get();
//        dd($result);die;
        return view('/admin.authgroup.index')->with('auth_group', $result);

    }

    // 更新
    public function update(Request $request )
    {
        //---------------权限管理
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
//        dd($action);
        // 3. 获取规则组权限id
        $rulepower = DB::table('bbs_auth_rule')
            ->select('id')
            ->where('name', '=', $e)
            ->first();

//        foreach($rulepower as $v){
//            $a .=','.$v->id;
//        }
//        $a = ltrim($a,',');
//        $a = explode(',',$a);

        // 4.判断用户当前操作是否在规则里面
        $result1 = DB::table('bbs_auth_group_access')
            ->join('bbs_auth_group', 'bbs_auth_group_access.group_id', '=', 'bbs_auth_group.id')
            ->select('bbs_auth_group_access.uid', 'bbs_auth_group.rules')
            ->where('bbs_auth_group_access.uid', '=', $uid)
            ->first();
        if(!$result1){
            return redirect('/admin/layout')->with('error','权限不够');
        }
//        dd($rulepower);
        foreach ($result as $v) {
            $rule = $v->rules;
            $r = explode(',', $rule);
//            $num = count($r);

//            dd($rulepower);
            if (!in_array($rulepower->id, $r)) {
                return redirect('/admin/layout')->with('error','权限不够');
            }
//
        }
//----------------------------权限管理-------------------------
        // 判断rules有没有这个字段
        $key = '';
        foreach ($_POST as $k=>$v){
            $key .= ','.$k;
        }
        $key = ltrim($key,',');
        $key = explode(',',$key);
        if(!in_array('rules',$key))
        {
            $rules = '';
            $_POST['rules']= $rules;
        }else{
            $data = $_POST['rules'];
            $rules = implode(",",$data);

        }
//        dd($_POST);
        $id = $_POST['id'];
        // 获取用户隐藏uid
//        dd(apc_exists($_POST['rules']));
//        if(apc_exists($_POST['rules'])){
//            return back()->with('error','权限不能为空');
//        }
//        dd($id);die;
//        var_dump($rules);die;
        // 判断是否有更新值
        $result = DB::table('bbs_auth_group')->where('id',$id)->update(["rules"=>$rules]);
        if($result){
            return back()->with('error', '修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }


    public function mod(){

    }

    // 增加
    public function add(){

    }

    // 管理组添加
    public function insert(){
//       dd($_POST) ;
        if(empty($_POST['title'])){
            return back()->with('error','名字不能为空');
        }

        if(empty($_POST['rules'])){
            return back()->with('error','规则不能为空');
        };

        $data = $_POST['rules'];

        $rules = implode(",",$data);
        var_dump($_POST['title']);        // 判断是否有更新值
        $result = DB::table('bbs_auth_group')->insert([
            "rules"=>$rules, "title"=>$_POST['title']
        ]);
        if($result){
            return back()->with('error', '修改成功');
        }else{
            return back()->with('error','修改失败');
        }

    }

    // 刪除
    public function delete($id){

        $result = DB::delete('delete from `bbs_auth_group` where id = ? ', [$id]);

        return $result;
    }

}
