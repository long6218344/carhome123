<?php

namespace App\Http\Controllers;

//use Barryvdh\Debugbar\Twig\Extension\Dump;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAdverController extends Controller
{

    public function index()
    {
        $list = DB::table('Advertisement')->simplePaginate(10);


      return  view('/admin/advertisement/advertisement',['list'=>$list]);
    }

    /***
     * @删除ajax
     */
    public function delete($id)
    {

        $list = DB::select('select `picture` from `Advertisement` where id ='.$id);
        $pic = $list[0]->picture;

//        echo $pic;die;
        if ($pic) {
            //删除文件
            $small = basename($pic); //返回文件名中的路径部分
            $str_path = dirname($pic);
            $smallname = trim(strrchr($small, '_'), '_');
            unlink($pic); //删除文件函数

        }

        $sql = 'delete from `Advertisement` where id='.$id;

       $result =  DB::delete($sql);

        if ($result)
        {
            echo 1;
        }

    }

    /***
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 编辑页面
     */
    public function editshow($id)
    {
        $result = DB::select('select * from `Advertisement` where id = '.$id);

        return view('/admin/advertisement/edit',['list'=>$result,'id'=>$id]);

    }

    /***
     * @param Request $request
     * 编辑广告
     */
    public function edit(Request $request)
    {
        $id = $request->id;
//
        //判断文件是否上传
        if (!$request->hasFile('picture')) {
            $this->notice('请上传图片');
        }

        //如果文件上传了就将其删除
        if ($request->hasFile('picture')) {
            $result = DB::select('select `picture` from `Advertisement` where `id`= ?', [$id]);
            $result = $result[0]->picture;
//            dump($result);
            if ($result) {
                //删除文件
                $small = basename($result);
                $str_path = dirname($result);
                $smallname = trim(strrchr($small, '_'), '_');
                unlink($result); //删除文件函数

            }

        }



            $namea = $request->name;
            $time = $request->time;
            $details = $request->details;
            $url = $request->url;
            $adclass = $request->adclass;


        $file = $request->File();
//        dd($file);
        //获取 键
        $key = key($file);

        if ($_FILES[$key]['error'] > 0) {

            switch ($_FILES[$key]['error']) {
                case '1':
                    $msg = '孩子, 回家重新上传, 文件太大了, 不要超过2M';
                    return back();
                    break;
                case '2':
                    $msg = '请打开F12, 删除 MAX_FILE_SIZE , 即可正常上传';
                    return back();
                    break;
                case '3':
                    $msg = '请查看网线是否连接好';
                    return back();
                    break;
                case '4':
                    $msg = '请不要调戏我, 上传一个给我';
                    return back();
                    break;
                case '6':
                    $msg = '请联系网管, 晚上啥时候约一下, 连个目录都不给我';
                    return back();
                    break;
                case '7':
                    $msg = '再联系网管, 你想什么时候死, 说一声, 连个权限都不给我';
                    return back();
                    break;
            }
        }

        //函数判断指定的文件是否是通过 HTTP POST 上传的。
        if (!is_uploaded_file($_FILES[$key]['tmp_name'])) {
            $this->notice('该文件未通过HTTP POST 上传');
        }

        // 判断文件类型 (获得文件的后缀
        $ext = $request->file('picture')->getClientOriginalExtension();


        //如果文件不包括在数组中的几种后缀中将返回
        if (!in_array($ext, array('jpg', 'png', 'jpeg'))) {
            $this->notice('文件格式只支持jpg,png,jpeg');
        }

        // 移动文件到指定位置
        $size = 900;
        $path = './uploads_ad/' . date('Y/m/d');
        $name = date('Ymd') . uniqid();
        $ext = $request->file('picture')->getClientOriginalExtension();
        $filename = $name . '.' . $ext;


//        $img = $request->file('picture');

//        Image::make($img)->resize(900, 400)->save($path.'/'.$size.'_'.$filename);

        $request->file('picture')->move($path, $filename);



        $mname = "'$namea'";
        $mtime = "'$time'";
        $mdetails = "'$details'";
        $murl = "'$url'";
        $madclass = "'$adclass'";

        $pname = $path.'/'.$filename;
        $mpname = "'$pname'";






        $sql = 'update `Advertisement` set `name` ='.$mname.', `time` ='.$mtime.', `details` ='.$mdetails.',
         `url` ='.$murl.', `adclass` ='.$madclass.', `picture` ='.$mpname.' where id ='.$id;
        $result = DB::update($sql);

        if ($result)
        {
            $this->notice('修改成功', '/admin/adver');
        }else
        {
            $this->notice('修改失败');
        }


    }





    /***
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 展示添加 页面
     */
    public function addshow()
    {
        return view('/admin/advertisement/add');
    }


    /***
     * @param Request $request
     * 添加广告
     */
    public function add(Request $request)
    {

        //判断文件是否上传
        if (!$request->hasFile('picture')) {
            $this->notice('请上传图片');
        }

        // 获取数据,判断

        $namea = $request->name;
        $time = $request->time;
        $details = $request->details;
        $url = $request->url;
        $adclass = $request->adclass;



        if (empty($namea)){$this->notice('广告名称未填写');}
        if (empty($time)){$this->notice('广告合同时间未填写');}
        if (empty($details)){$this->notice('广告内容未填写');}
        if (empty($url)){$this->notice('广告链接未填写');}




        $file = $request->File();
        //获取 键
        $key = key($file);

        if ($_FILES[$key]['error'] > 0) {

            switch ($_FILES[$key]['error']) {
                case '1':
                    $msg = '孩子, 回家重新上传, 文件太大了, 不要超过2M';
                    return back();
                    break;
                case '2':
                    $msg = '请打开F12, 删除 MAX_FILE_SIZE , 即可正常上传';
                    return back();
                    break;
                case '3':
                    $msg = '请查看网线是否连接好';
                    return back();
                    break;
                case '4':
                    $msg = '请不要调戏我, 上传一个给我';
                    return back();
                    break;
                case '6':
                    $msg = '请联系网管, 晚上啥时候约一下, 连个目录都不给我';
                    return back();
                    break;
                case '7':
                    $msg = '再联系网管, 你想什么时候死, 说一声, 连个权限都不给我';
                    return back();
                    break;
            }
        }

        //函数判断指定的文件是否是通过 HTTP POST 上传的。
        if (!is_uploaded_file($_FILES[$key]['tmp_name'])) {
            $this->notice('该文件未通过HTTP POST 上传');
        }

        // 判断文件类型 (获得文件的后缀
        $ext = $request->file('picture')->getClientOriginalExtension();


        //如果文件不包括在数组中的几种后缀中将返回
        if (!in_array($ext, array('jpg', 'png', 'jpeg'))) {
            $this->notice('文件格式只支持jpg,png,jpeg');
        }

        // 移动文件到指定位置
        $size = 900;


        $path = './uploads_ad/' . date('Y/m/d');

        $name = date('Ymd') . uniqid();
        $ext = $request->file('picture')->getClientOriginalExtension();
        $filename = $name . '.' . $ext;

        $img = $request->file('picture');

        $request->file('picture')->move($path, $filename);

//        Image::make($img)->resize(900, 400)->save($path.'/'.$size.'_'.$filename);



        $mname = "'$namea'";
        $mtime = "'$time'";
        $mdetails = "'$details'";
        $murl = "'$url'";
        $madclass = "'$adclass'";

        $pname = $path.'/'.$filename;
        $mpname = "'$pname'";


        $sql = 'insert into `Advertisement` (`name`, `time`, `details`, `url`, `adclass`, `picture`) value ('.$mname.','.$mtime.','.$mdetails.','.$murl.','.$madclass.','.$mpname.')';

        $result = DB::insert($sql);

        if($result)
        {
            $this->notice('添加成功','',3);
        }
        else
        {
            $this->notice('删除失败','',3);
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
     * @param $data
     * 验证广告名是否重复
     */
   public function check($data)
   {
      $data = "'$data'";

      $sql = 'select `name` from `Advertisement` where name ='.$data;

      $re = DB::select($sql);


      if(empty($re))
      {
          echo '1';
      }
      else
      {
          echo '2';
      }

   }








}
