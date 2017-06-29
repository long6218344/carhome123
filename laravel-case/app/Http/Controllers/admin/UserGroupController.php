<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserGroupController extends Controller
{
    //等级管理详情
    public function member()
    {
        $result = DB::table('bbs_user_group')->where("grouptype", "member")->get();
//       dd($result);
        return view('/admin.usergroup.member')->with('users', $result);
    }

    //等级添加
    public function insert(Request $request)
    {
//        var_dump($_POST);die;
//        var_dump($_FILES);die;
        $groupname = $_POST['groupname'];

        $points = $_POST['points'];
        if (empty($_FILES)) {
            return back()->with('error', '文件不能为空');
        }
        foreach ($_POST as $v) {
            if (empty($v)) {
                return back()->with('error', '数据不能为空');
            }
        }
        // 上传图片,保存路径
//            $size = 300;
        $path = './uploads/level';

        $name = date('Ymd') . uniqid();
        $ext = $request->file('groupicon')->getClientOriginalExtension();
        $filename = $name . '.' . $ext;
//            $img = Image::make($request->file('icon'))->resize(300, 200);
        $request->file('groupicon')->move($path, $filename);
//            $img->save($path . '/' . $size . '_' . $filename);
//            $img->save($path . '/'. $filename);
        $groupicon = $path . '/' . $filename;

//        dd($groupicon);
        $result = DB::table('bbs_user_group')->insert(['groupname' => $groupname, 'groupicon' => $groupicon, 'points' => $points]);
//        dd($result);
        if ($result) {
            return back()->with('error', '添加成功');
        } else {
            return back()->with('error', '添加失败');

        }
    }

    // 执行更新
    public function update(Request $request)
    {
        // 判断文件存不存在
        // 上传图片,保存路径
        if ($request->hasFile('groupicon')) {

//            $size = 300;
            $path = './uploads/level';

            $name = date('Ymd') . uniqid();
            $ext = $request->file('groupicon')->getClientOriginalExtension();
            $filename = $name . '.' . $ext;
//            $img = Image::make($request->file('icon'))->resize(300, 200);
            $request->file('groupicon')->move($path, $filename);
//            $img->save($path . '/' . $size . '_' . $filename);
//            $img->save($path . '/'. $filename);
            $groupicon = $path . '/' . $filename;
            // 保存到数据库
            $data = $_POST;
            $field = '';
            $values = '';
            $str = '';
            foreach ($data as $k => $v) {


                if ($k != '_token') {
                    $str .= '`' . $k . '`="' . $v . '",';
                }

            }
            $str = rtrim($str, ',');

            $result = DB::update('update `bbs_user_group` set ' . $str . ' where gid = ?', [$data['gid']]);
            $pic = DB::table('bbs_user_group')->where('gid',$data['gid'])->update(['groupicon'=>$groupicon]);

            if ($result || $pic) {
                return back()->with('error', '更新成功');
            } else {
                return back()->with('error', '更新失败');
            }

        } else {
        // 如果没有图片
            $data = $_POST;
            $field = '';
            $values = '';
            $str = '';
            foreach ($data as $k => $v) {
                if ($k != '_token') {
                    $str .= '`' . $k . '`="' . $v . '",';
                }
            }
            $str = rtrim($str, ',');

            $result = DB::update('update `bbs_user_group` set ' . $str . ' where gid = ?', [$data['gid']]);
            if ($result) {
                return back()->with('error', '更新成功');
            } else {
                return back()->with('error', '更新失败');
            }
        }
    }

    // 删除
    public function delete($gid)
    {

        $result = DB::delete('delete from `bbs_user_group` where gid = ? ', [$gid]);
        if ($result) {
            return back()->with('error', '删除成功');
        } else {
            return back()->with('error', '删除失败');
        }
    }

    // 默认组权限显示
    public function defaults()
    {
        $result = DB::table('bbs_user_group')->where('grouptype', 'default')->get();

        return view('/admin.usergroup.default')->with('default', $result);
    }

    // 管理组权限显示
    public function system()
    {
        $result = DB::table('bbs_user_group')->where('grouptype', 'system')->get();
//        dd($result);
        return view('/admin.usergroup.system')->with('system', $result);

    }
}
