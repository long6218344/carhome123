<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $list = DB::table('bbs_photo')->simplePaginate(12);



      return view('/admin/photo/photo', ['list'=>$list]);


    }


    /***
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 展示增加页面
     */
    public function addshow()
    {
        $list = DB::select('select `id`, `name`, `path`, concat(path, id, ",") as px
	        from  `bbs_type`
	        order by px
	        ');

        return view('/admin/photo/add', ['list'=>$list]);
    }


    /***
     * 增加功能
     */
    public function add(Request $request)
    {
        //判断文件是否上传
        if (!$request->hasFile('picture')) {
            $this->notice('请上传图片');
        }

        // 获取数据,判断
        $cname =  $request->name;
        $details = $request->details;
        $uptime = date('Y-m-d  H:m');
        $class = $request->class;





        if (empty($details)){$this->notice('照片详细内容未填写');}





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

        $path = './uploads_photo/' . date('Y/m/d');
        $name = date('Ymd') . uniqid();
        $ext = $request->file('picture')->getClientOriginalExtension();
        $filename = $name . '.' . $ext;
        $request->file('picture')->move($path, $filename);





        $details = "'$details'";
        $uptime = "'$uptime'";
        $cname = "'$cname'";

        $pname = $path.'/'.$filename;
        $mpname = "'$pname'";


        $sql = 'insert into `bbs_photo` (`picture`, `details`, `uptime`, `name`, `class`) value ('.$mpname.','.$details.','.$uptime.','.$cname.','.$class.')';

        $result = DB::insert($sql);

        if($result)
        {

            return redirect('/admin/notice')->with(['message'=>'添加照片成功',
                'url' =>'/admin/photo/addshow', 'jumpTime'=>3,'status'=>true]);


        }
        else
        {
            return redirect('/admin/notice')->with(['message'=>'添加照片失败',
                'url' =>'/admin/photo/addshow', 'jumpTime'=>3,'status'=>false]);
        }


    }


    /***
     * @param $id
     * AJAX删除
     */
    public function delete($id)
    {
        $result = DB::table('bbs_photo')->where('id', '=', $id)->delete();

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
        $list2 = DB::select('select `id`, `name`, `path`, concat(path, id, ",") as px
	        from  `bbs_type`
	        order by px
	        ');
        $list = DB::select('select * from `bbs_photo` where id ='.$id);
        return view('/admin/photo/edit', ['list'=>$list, 'list2'=>$list2, 'id'=>$id]);
    }


    /***
     * @param Request $request
     * 编辑功能
     */
    public function edit(Request $request)
    {
        $id = $request->cid;

        $details = $request->details;
        $name = $request->name;
        $class = $request->class;

        $details = "'$details'";
        $name = "'$name'";
        $sql = 'update bbs_photo  set `name` ='.$name.', `details` ='.$details.', `class` ='.$class.' where id ='.$id;

        $result = DB::update($sql);

        if($result)
        {

            return redirect('/admin/notice')->with(['message'=>'修改照片成功',
                'url' =>'/admin/photo', 'jumpTime'=>3,'status'=>true]);

        }
        else
        {
            return redirect('/admin/notice')->with(['message'=>'修改照片失败',
                'url' =>'/admin/photo', 'jumpTime'=>3,'status'=>false]);
        }


    }


    public function homeshow($jd = 167)
    {


        $list2 = DB::select('select * from `bbs_type` where display = 0 and pid = 0');

        $list1 = Db::select('select * from `bbs_photo` where status = 0 and class ='.$jd);

        return view('/home/photo', ['list1'=>$list1, 'list2'=>$list2]);
    }






}
