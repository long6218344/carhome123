<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class MedleController extends Controller
{
    // 显示勋章
    public function index()
    {
        $list = DB::table('bbs_medleinfo')->select()->paginate(6);
//        dd($list);
        return view('/admin.medleinfo.index')->with('list', $list);
    }


    // 添加徽章页面
    public function addshow()
    {

        return view('/admin.medleinfo.add');
    }

    // 添加徽章方法
    public function add(Request $request)
    {
        $inputs = $request->all();
//        dd($inputs);
        // 判断图片上传
        if (!$request->hasFile('image')) {
            return redirect('/user/notice')->with(['message' => '请上传图片', 'url' => '/admin/medle', 'jumpTime' => 3, 'status' => false]);
        }
        // 上传图片
        $size = 300;
        $path = './uploads/big';
        $name = date('Ymd') . uniqid();
        $ext = $request->file('image')->getClientOriginalExtension();
        $filename = $name . '.' . $ext;
        $request->file('image')->move($path, $filename);

        $name = $inputs['name'];
        // 保存图片路径
        $image = $path . '/' . $filename;
        $descrip = $inputs['descrip'];
        $points = $inputs['points'];

        $result = DB::table('bbs_medleinfo')->insert([
            [
                'name' => $name,
                'image' => $image,
                'descrip' => $descrip,
                'points' => $points
            ]
        ]);
//        dd($result);
        if ($result){
            return redirect('/user/notice')->with(['message' => '添加成功', 'url' => '/admin/medle', 'jumpTime' => 3, 'status' => true]);
        }else{
            return redirect('/user/notice')->with(['message' => '添加失败', 'url' => '/admin/medle', 'jumpTime' => 3, 'status' => false]);
        }
    }

    // 修改页面
    public function modshow(Request $request,$id)
    {
        $list = DB::table('bbs_medleinfo')->where('medal_id',$id)->first();

        return view('/admin.medleinfo.mod')->with('list', $list)->with('id',$id);
    }

    // 修改方法
    public function mod(Request $request,$id)
    {
        $inputs = $request->all();
        $name = $inputs['name'];
        $descrip = $inputs['descrip'];
        $points = $inputs['points'];

//        dd($points);
//        dd($inputs);
        // 判断图片上传
        if ($request->hasFile('image')) {
            // 上传图片
            $path = './uploads/big';
            $name = date('Ymd') . uniqid();
            $ext = $request->file('image')->getClientOriginalExtension();
            $filename = $name . '.' . $ext;
            $request->file('image')->move($path, $filename);
            $image = $path . '/' . $filename;
            // 保存图片路径
//        dd($image);
            $result = DB::table('bbs_medleinfo')->where('medal_id',$id)->update([
                    'name' => $name,
                    'image' => $image,
                    'descrip' => $descrip,
                    'points' => $points
            ]);
        }else{
            $result = DB::table('bbs_medleinfo')->where('medal_id',$id)->update([
                    'name' => $name,
                    'descrip' => $descrip,
                    'points' => $points
            ]);
        }

//        dd($result);
        if ($result){
            return redirect('/user/notice')->with(['message' => '修改成功', 'url' => '/admin/medle/modshow/'.$id, 'jumpTime' => 3, 'status' => true]);
        }else{
            return redirect('/user/notice')->with(['message' => '修改失败', 'url' => '/admin/medle/modshow'.$id, 'jumpTime' => 3, 'status' => false]);
        }

    }

    // 删除
    public function delete(Request $request, $id)
    {
        $result = DB::table('bbs_medleinfo')->where('medal_id','=', $id)->delete();
        if ($result) {
            return redirect('/user/notice')->with(['message' => '删除成功', 'url' => '/admin/medle', 'jumpTime' => 3, 'status' => true]);
        } else {
            return redirect('/user/notice')->with(['message' => '删除失败', 'url' => '/admin/medle', 'jumpTime' => 3, 'status' => false]);
        }

    }


}