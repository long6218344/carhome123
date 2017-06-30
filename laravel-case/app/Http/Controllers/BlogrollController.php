<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BlogrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list = DB::table('bbs_blogroll')->paginate(10);

        return view('/admin/blogroll/blogroll', ['list'=>$list]);
    }


    /***
     * 增加页面
     */
    public function addshow()
    {
        return view('/admin/blogroll/add');
    }



    /***
     * @param Request $request
     * 添加连接
     */
    public function add(Request $request)
    {



        // 获取数据,判断

        $name = $request->name;
        $url = $request->url;
        $details = $request->details;




        if (empty($name)){$this->notice('连接名称未填写');}
        if (empty($details)){$this->notice('连接内容未填写');}
        if (empty($url)){$this->notice('链接未填写');}






        $name = "'$name'";
        $details = "'$details'";
        $url = "'$url'";


        $sql = 'insert into `bbs_blogroll` (`name`, `details`, `url`) value ('.$name.','.$details.','.$url.')';

        $result = DB::insert($sql);

        if($result)
        {

            return redirect('/admin/notice')->with(['message'=>'添加连接成功',
                'url' =>'/admin/blogroll/addshow', 'jumpTime'=>3,'status'=>true]);

        }
        else
        {
            return redirect('/admin/notice')->with(['message'=>'添加连接失败',
                'url' =>'/admin/blogroll/addshow', 'jumpTime'=>3,'status'=>false]);
        }


    }


    /***
     * @param $id
     * 删除 AJAX
     */
    public function delete($id)
    {

        $result = DB::table('bbs_blogroll')->where('id', '=', $id)->delete();

        if ($result)
        {
            echo 1;
        }
    }





    /** 消息提示
     * @param $msg
     * @param string $url
     * @param int $time
     */

    public function notice($msg, $url = '' ,$time = 1)
    {

        echo '<body style="margin:0">';
        echo '<div style="width: 100%;height: 100%;position: fixed;">

       <h1 style="font-size: 200px;position: fixed;left: 200px;top:50px;">ovo </h1>
       <div>
        <p style="font-size: 35px;position: fixed;left: 200px;top:400px;
        color: red;">['.$msg.']</p>
        <p style="font-size: 20px;position: fixed;left: 300px;top:500px;">
        
        大概还需'.$time.'秒加载完成 
        
        </p>
        
     </div>
     </div>';


        // 如果没有传入url, 默认返回到上一页面
        if( $url  == ''	){
            $url = $_SERVER['HTTP_REFERER'];
        }

        echo '<meta http-equiv="refresh" content="'.$time.'; url='.$url.'">';
        die;

    }



    /***
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 编辑页面
     */
    public function editshow($id)
    {

        $list = DB::select('select * from `bbs_blogroll` where id ='.$id);
        return view('/admin/blogroll/edit', ['list'=>$list]);
    }


    /***
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * 编辑
     */
    public function edit(Request $request)
    {
        $id = $request->id;

        $details = $request->details;
        $name = $request->name;
        $url= $request->url;

        $details = "'$details'";
        $name = "'$name'";
        $url = "'$url'";
        $sql = 'update `bbs_blogroll`  set `name` ='.$name.', `details` ='.$details.', `url` ='.$url.' where id ='.$id;

        $result = DB::update($sql);

        if($result)
        {

            return redirect('/admin/notice')->with(['message'=>'修改连接成功',
                'url' =>'/admin/blogroll', 'jumpTime'=>3,'status'=>true]);

        }
        else
        {
            return redirect('/admin/notice')->with(['message'=>'修改连接失败',
                'url' =>'/admin/blogroll', 'jumpTime'=>3,'status'=>false]);
        }


    }



}
