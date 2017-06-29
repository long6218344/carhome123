<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = DB::table('bbs_notice')->simplePaginate(10);
       return view('/admin/notice/notice',['list'=>$list]);
    }


    /***
     * ajax 删除
     */
    public function delete($id)
    {

        $result = DB::delete('delete from `bbs_notice` where id='.$id);


        if ($result)
        {
            echo 1;
        }


    }


    /***
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 展示增加公告页面
     */
    public function addshow()
    {
        return view('/admin/notice/add');
    }


    /***
     * @param Request $a
     * @return \Illuminate\Http\RedirectResponse
     * 公告增加
     */
    public function add(Request $a)
    {


        $name = $a->name;
        $time = $a->time;
        $details = $a->details;
        $status = $a->status;

        $name = "'$name'";
        $time = "'$time'";
        $details = "'$details'";
        $status = "'$status'";


        $sql = 'insert into `bbs_notice` (`name`, `time`, `details`, `status`) values ('.$name.','.$time.','.$details.','.$status.')';

        $result = DB::insert($sql);

        if ($result)
        {
            return back()->with('error', '增加成功');
        }
        else
        {
            return back()->with('error', '添加失败');
        }

    }


    /***
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *展示广告编辑页面
     */
    public function editshow($id)
    {
        $list = DB::select('select * from `bbs_notice` where id='.$id);
        return view('/admin/notice/edit', ['list'=>$list]);
    }


    public function edit(Request $request)
    {
         $id = $request->id;
         $name = "'$request->name'";
         $time = "'$request->time'";
         $details = "'$request->details'";
         $status = "'$request->status'";

        $sql = 'update `bbs_notice` set `name` ='.$name.', `time` ='.$time.', `details` ='.$details.', `status` ='.$status.' where id ='.$id;
        $result = DB::update($sql);

        if ($result)
        {
           return back()->with('error', '修改成功');
        }else
        {
            return back()->with('error', '修改失败');
        }
    }




    /**
     * 发布
     */
    public function disnone($id)
    {

        $sql = 'update `bbs_notice` set `status` = 1 where id ='.$id;
        $result = DB::update($sql);

        if ($result)
        {
            echo 1;
        }else
        {
            echo 2;
        }
    }




    /**
     * 未发布
     */
    public function disblock($id)
    {

        $sql = 'update `bbs_notice` set `status` = 0 where id ='.$id;
        $result = DB::update($sql);

        if ($result)
        {
            echo 1;
        }else
        {
            echo 2;
        }
    }












}
