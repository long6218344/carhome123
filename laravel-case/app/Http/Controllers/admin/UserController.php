<?php
namespace App\Http\Controllers\admin;

//use Faker\Provider\Image;
use App\models\Role;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public $filename;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示所有用户
//        $user = DB::select('select * from `bbs_user_info`');
        $user = DB::table('bbs_user_info')->paginate(5);;

        return view('/admin.user.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行新增用户
        //判断文件是否上传
        if (!$request->hasFile('icon')) {
            return back()->with('error', '请上传文件');
        }

//        if (!$request->hasFile('icon')){
//
//        }
        // 获取数据,判断
        //处理图片
        $pwd = $request->input('pwd');
        $repwd = $request->input('repwd');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $userdetails = $request->input('userdetails');

////         取得所有值
        $input = $request->all();
        // 不能为空
        foreach ($input as $v) {
            if ($v == '') {
                return back()->with('error', '表单不能为空');
            }
        }
//
        // 判断手机号
        if (!preg_match('/^[0-9]{11,11}/', $phone)) {
            //  view('手机号长度不够','add.php');
            return back()->with('error', '手机长度不够');
        } elseif (!preg_match('/^[1][34578]/', $phone)) {
            // 手机号不合法
            return back()->with('error', '手机号不合法');
        } else {
        }
        // 判断密码
        if (!preg_match('/[0-9a-zA-Z]{6,}/', $pwd)) {
            // 密码长度不够
            return back();
        }
        $a = preg_match('/[0-9]/', $pwd);
        $b = preg_match('/[a-z]/', $pwd);
        $c = preg_match('/[A-Z]/', $pwd);
        $d = preg_match('/^[A-Z]/', $pwd);
        if (!$d) {
            // 密码必须已大写字母开头
            return back();
        }
        if (!($a && $b && $c)) {
            //  notice('密码必须要有数字,小写字母和大写字母组成','add.php');
            return back();
        }
        // 邮箱
        $preg = '/^[\w]{7,}@[\w\*]{1,10}\.(com|cn|net|xyz|edu|org|com)$/';

        $email = preg_match($preg, $email);

        if (!$email) {
            //邮箱格式不正确,至少7位
            return back();
        }
        // 判断两次密码是否一致
        if ($pwd != $repwd) {
            return back();
        }
        // 处理图片
        $file = $request->File();
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
        if (!is_uploaded_file($_FILES[$key]['tmp_name'])) {
            return back();
        }

        // 判断文件类型
        $ext = $request->file('icon')->getClientOriginalExtension();
        if (!in_array($ext, array('jpg', 'png', 'jpeg'))) {
//                ('不合法的文件类型');
            return back();
        }
        // 移动文件到指定位置
        $size = 300;
        $path = './uploads/' . date('Y/m/d');
        $name = date('Ymd') . uniqid();
        $ext = $request->file('icon')->getClientOriginalExtension();
        $filename = $name . '.' . $ext;
        $img = Image::make($request->file('icon'))->resize(300, 200)->save($path . '/' . $size . '_' . $filename);

        $request->file('icon')->move($path, $filename);

        // 导入数据库
        $field = '';
        $values = '';

        foreach ($input as $k => $v) {
            if ($k == 'pwd') {
                $v = md5($v);
            }
            if ($k == '_token') {
                continue;
            }
            if ($k == 'icon') {
                $v = $path . '/' . $filename;
            }
            if ($k != 'repwd') {
                $field .= '`' . $k . '`,';
                $values .= '"' . $v . '",';
            }
        }
        $field .= '`regdate`';
//        $values .= '"' . time() . '", "' . $filename . '"';
        $values .= time();

        $sql = 'insert into `bbs_user_info`(' . $field . ')  values(' . $values . ')';
//        var_dump($sql);die;
        $result = DB::insert($sql);
        if ($result) {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
//        echo 11;

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //编辑表单

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        //编辑用户
        //判断文件是否存在,存在则删除
        // 获取数据,判断
        $username = $request->input('username');
        //处理图片
        $pwd = $request->input('pwd');

        $repwd = $request->input('repwd');

        $grouppower = $request->input('grouppower');

        $phone = $request->input('phone');

        $email = $request->input('email');
        // 取得所有值
        $input = $request->all();
//        // 不能为空
        foreach ($input as $v) {
            if ($v == '') {
                return back();
            }
        }
        // 判断手机号
        if (!preg_match('/^[0-9]{11,11}/', $phone)) {
            //  view('手机号长度不够','add.php');
            return back();
        } elseif (!preg_match('/^[1][34578]/', $phone)) {
            // 手机号不合法
            return back();
        } else {
        }
        // 判断密码
        if (!preg_match('/[0-9a-zA-Z]{6,}/', $pwd)) {
            // 密码长度不够
            return back();
        }
        $a = preg_match('/[0-9]/', $pwd);
        $b = preg_match('/[a-z]/', $pwd);
        $c = preg_match('/[A-Z]/', $pwd);
        $d = preg_match('/^[A-Z]/', $pwd);
        if (!$d) {
            // 密码必须已大写字母开头
            return back();
        }
        if (!($a && $b && $c)) {
            //  notice('密码必须要有数字,小写字母和大写字母组成','add.php');
            return back();
        }
        // 邮箱
        $preg = '/^[\w]{7,}@[\w\*]{1,10}\.(com|cn|net|xyz|edu|org|com)$/';

        $email = preg_match($preg, $email);

        if (!$email) {
            //邮箱格式不正确,至少7位
            return back();
        }
        // 判断两次密码是否一致
        if ($pwd != $repwd) {
            return back();
        }
        // 输入内容不能为空
        foreach ($input as $k => $v) {
            if (empty($v)) {
                return back();
            }
        }
        // 判断图片上传
        if ($request->hasFile('icon')) {
            $result = DB::select('select `icon` from `bbs_user_info` where `uid`= ?', [$uid]);
            $result = $result[0]->icon;
            if ($result) {
                //删除文件
                $small = basename($result);
                $str_path = dirname($result);
                $smallname = trim(strrchr($small, '_'), '_');
                unlink($result);
                unlink($str_path . '/' . $smallname);
            }

            $file = $request->File();
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
            if (!is_uploaded_file($_FILES[$key]['tmp_name'])) {
                return back();
            }
            // 判断文件类型
            $ext = $request->file('icon')->getClientOriginalExtension();
//            dd($ext);die;
            if (!in_array($ext, array('jpg', 'png', 'jpeg'))) {
//                ('不合法的文件类型');
                return back();
            }

            // 上传图片,保存路径
            $size = 300;
            $path = './uploads/' . date('Y/m/d');
            $name = date('Ymd') . uniqid();
            $ext = $request->file('icon')->getClientOriginalExtension();
            $filename = $name . '.' . $ext;
            $img = Image::make($request->file('icon'))->resize(300, 200);
            $request->file('icon')->move($path, $filename);
            $img->save($path . '/' . $size . '_' . $filename);
            if (!file_exists($path)) {
                mkdir($path, '0777', true);
            }
        }

        //更新数据
        $str = '';
        foreach ($input as $k => $v) {

            if ($k == 'repwd') {
                continue;
            }
            if ($k == 'pwd') {
                $v = md5($v);
            }
            if ($k == 'icon') {
                $v = $path . '/' . '300_' . $filename;
            }
            if ($k != '_token') {
                $str .= '`' . $k . '`="' . $v . '",';
            }
        }

        $str = rtrim($str, ',');
        $result = DB::update('update `bbs_user_info` set ' . $str . ' where uid = ?', [$uid]);
        if ($result) {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {
        //删除
        $result = DB::delete('delete from `bbs_user_info` where uid = ? ', [$uid]);
//        dd($result);
        return $result;

    }

    public function userUpdate($uid)
    {
        //显示所有用户
        $user = DB::select('select * from `bbs_user_info` where uid = ?', [$uid]);
//        dd($user);die;
        return view('/admin.user.update', ['user' => $user]);

    }

    // 密码修改
    public function pwd()
    {
        $data = $_POST;
        $pwd = $data['pwd'];
        $repwd = $data['repwd'];
//         判断两次密码是否一致
        if ($pwd != $repwd) {
            return back();
        }
        // 判断密码
        if (!preg_match('/[0-9a-zA-Z]{7,}/', $pwd)) {
            // 密码长度不够
            return back();
        }
        $a = preg_match('/[0-9]/', $pwd);
        $b = preg_match('/[a-z]/', $pwd);
        $c = preg_match('/[A-Z]/', $pwd);
        $d = preg_match('/^[A-Z]/', $pwd);

        if (!$d) {
            // 密码必须已大写字母开头
            return back();
        }
        if (!($a && $b && $c)) {
            //  notice('密码必须要有数字,小写字母和大写字母组成','add.php');
            return back();
        }
        $pwd = md5($pwd);
        $result = DB::update('update `bbs_user_info` set `pwd`= "' . $pwd . '"  where uid = ?', [$data['uid']]);
        if ($result) {
            return back();
        }
    }

    // 状态修改
    public function status(Request $request, $uid)
    {

        $status = $request->all()['status'];

        if ($status == 1) {
            $status = 2;
        } else {
            $status = 1;
        }
        DB::update('update bbs_user_info set status = ' . $status . ' where uid = ?', [$uid]);

        return $status;
    }

    public function updategroup(Request $request)
    {
        // 获取用户隐藏uid
        $uid = $request->uid;
//        var_dump((typeOf(DB::table('bbs_auth_group_access')->where('uid',                 1)->get())));
        // dump($_POST);
        // 判断是否有更新值
        if (!empty($_POST['group_id'])) {
            if (DB::table('bbs_auth_group_access')->where('uid', $uid)->get()) {
                DB::table('bbs_auth_group_access')->where('uid', $uid)->delete();
            }
        }
        foreach ($_POST['group_id'] as $v) {
            $data['group_id'] = $v;
//            var_dump($v);
            DB::table('bbs_auth_group_access')->insert(['uid' => $uid, 'group_id' => $v]);
        }
        return back()->with('error', '修改成功');
    }
}

