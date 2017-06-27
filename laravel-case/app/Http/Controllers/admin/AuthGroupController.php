<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
    public function update()
    {
        // 获取用户隐藏uid
        $id = $_POST['id'];
        $data = $_POST['rules'];
//        dd($id);die;
        $rules = implode(",",$data);
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
