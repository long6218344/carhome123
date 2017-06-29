<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PointController extends Controller
{
    // 显示规则列表
    public function index(){
        $list = DB::table('bbs_pointrule')->paginate(3);
//        dd($list);
        return view('/admin.point.index')->with('list',$list);

    }

    // 1. 显示编辑页面
    public function mod(Request $request,$typeid){
        $list = DB::table('bbs_pointrule')->where('typeid',$typeid)->first();
//        dd($list);
        return view('/admin.point.mod')->with('list',$list);

    }

    // 2. 编辑积分规则
    public function update(Request $request,$typeid){
        $data = $_POST;
        foreach ($data as $v){
            if(empty($v)){
                return back()->with('error','数据不能为空');
            }
        }
        $name = $data['name'];
        $value = $data['value'];
        $result = DB::table('bbs_pointrule')
            ->where('typeid',$typeid)
            ->update(['name'=>$name,'value'=>$value]);
//        dd($result);
        if($result){
            return back()->with('error','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    // 显示添加页面
    public function addshow(){
        return view('/admin.point.add');
    }
    // 执行添加
    public function  add(){
        $data = $_POST;
        foreach ($data as $v){
            if(empty($v)){
                return back()->with('error','数据不能为空');
            }
        }
//        dd($data);
//        $typeid = $data['typeid'];
        $name = $data['name'];
        $value = $data['value'];

        $result = DB::table('bbs_pointrule')->insert(['name'=>$name,'value'=>$value]);
//        dd($result);
        if ($result){
            return back()->with('error','添加成功');
        }else{
            return back()->with('error','添加失败');
        }

    }

    // 删除操作
    public function delete($typeid){

       $result = DB::table('bbs_pointrule')->where('typeid',$typeid)->delete();
        return $result;
    }

}
