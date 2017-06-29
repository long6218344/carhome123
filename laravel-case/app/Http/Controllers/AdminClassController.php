<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminClassController extends Controller
{

    public function index()
    {

        $list = Db::table('bbs_type')->where('pid', '=', '0')->simplePaginate(10);


        return view('/admin/class/classify',['list' => $list]);

    }




    public function sonindex($id)
    {

//        $list = Db::select('select * from `bbs_type` where pid ='.$id);
//        dd($list);
        $list = Db::table('bbs_type')->where('pid', '=', $id)->simplePaginate(10);


        return view('/admin/class/classify',['list' => $list, 'sid'=>$id]);
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function editShow($id)
    {
        $result = DB::select('select * from `bbs_type` where id = '.$id);

        return view('/admin.class.edit',['list'=>$result,'id'=>$id]);

    }

    /** 编辑
     * @param Request $request
     */

    public function edit(Request $request)
    {
        $id  = $request->id;
        $namea = $request->name;
        $display = $request->display;
        $name = "'$namea'";



        $sql = 'update `bbs_type` set `name` ='.$name.', `display` ='.$display.' where id ='.$id;
        $result = DB::update($sql);

        if ($result)
        {
            $this->notice('修改成功', '/admin/classify');
        }else
        {
            $this->notice('修改失败');
        }



    }


    /**
     * 删除
     */
    public function delete($id)
    {

//        echo $id;die;
        //如果 有子分类贼无法删除
        $sql = 'select `id` from `bbs_type` where pid = '.$id;

        $a = DB::select($sql);
        if(!empty($a)){
            echo '2';die;
        }


       $result = DB::delete('delete from `bbs_type` where id='.$id);


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


    /**
     * 新增分类页面
     */
    public function addone($data)
    {

        $data = "'$data'";
        $path = "'0,'";

        $sql = 'insert into `bbs_type` (`name`, `pid`, `path`) values ('.$data.', 0 ,'.$path.')';

        $result = DB::insert($sql);



        if($result)
        {
            echo 1;
        }
        else
        {
            echo 2;
        }


    }


    /**
     * 新增分类
     */
    public function add(Request $a)
    {
        $id = $a->id;

//        dd($id);
        $namea = $a->name;
        $pid = $a->pid;
        $patha = $a->path;
//        dd($namea, $pid, $path);

        $name = "'$namea'";
        $path = "'$patha'";
        $sql = 'insert into `bbs_type` (`name`, `pid`, `path`) values ('.$name.','.$pid.','.$path.')';
//        dd($sql);
        $result = DB::insert($sql);

        if ($result)
        {
            $this->notice('添加成功','/admin/classify/sonindex/'.$id,'0.5');
        }
        else
        {
            $this->notice('添加失败');
        }

    }


    /**
     * 隐藏
     */
    public function disnone($id)
    {

        $sql = 'update `bbs_type` set `display` = 1 where id ='.$id;
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
     * 显示
     */
    public function disblock($id)
    {

        $sql = 'update `bbs_type` set `display` = 0 where id ='.$id;
        $result = DB::update($sql);

        if ($result)
        {
            echo 1;
        }else
        {
            echo 2;
        }
    }


    //增加子分类页面
    public function sonclassshow($id)
    {

       $sql = 'select * from `bbs_type` where id='.$id;
       $list = DB::select($sql);

       return view('/admin/class/add',['list'=>$list]);

    }



}