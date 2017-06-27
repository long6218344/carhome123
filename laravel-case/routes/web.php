<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');

});

//Route::get('/admin/login',function(){
//    return view('/admin.public.login');
//});

Route::get('/admin/layout',function(){
    // 中间件操作用户界面,用户头像

    return view('/admin.public.layout');

});

Route::get('/admin/store',function(){
    return view('/admin.user.store');
});

Route::get('/admin/repwd',function(){
    return view('/admin.user.repwd');
});
Route::get('/admin/group',function(){
    return view('/admin.user.setgroup');
});

// 中间件 权限登录验证
Route::group(['middleware'=>['checkpower']],function(){
    Route::get('/admin/index','admin\UserController@index');
});





// 用户列表更新第一步,读取信息
Route::get('/admin/update/{uid}','admin\UserController@userUpdate');
// 用户列表更新第二步
Route::post('/admin/user/newdate/{uid}','admin\UserController@update');


// 资源控制器
Route::resource('/admin/user','admin\UserController');
// 用户删除
Route::get('/admin/delete/{uid}','admin\UserController@destroy');
//
//Route::resource('/admin/user/{uid}','admin\UserController');

// 密码传入
Route::get('/admin/user/repwd/{id}',function($id){
    return view('/admin.user.repwd')->with('uid', $id);
});

// 密码修改
Route::post('/admin/user/pwd','admin\UserController@pwd');

// 重置管理员组第一步
Route::get('/admin/user/group/{uid}',function($uid){

    $groupname = \Illuminate\Support\Facades\DB::table('bbs_user_info')
        ->join('bbs_auth_group_access','bbs_user_info.uid','=','bbs_auth_group_access.uid')
        ->join('bbs_auth_group','bbs_auth_group_access.group_id','=','bbs_auth_group.id')
        ->select('bbs_user_info.username','bbs_auth_group.title','bbs_auth_group.id')
        ->where('bbs_user_info.uid','=',$uid)
        ->get();
    // 用户名
//    $username = \Illuminate\Support\Facades\DB::table('bbs_user_info')
//        ->join('bbs_auth_group_access','bbs_user_info.uid','=','bbs_auth_group_access.uid')
//        ->join('bbs_auth_group','bbs_auth_group_access.group_id','=','bbs_auth_group.id')
//        ->select('bbs_user_info.username','bbs_auth_group.title','bbs_auth_group.id')
//        ->where('bbs_user_info.uid','=',$uid)
//        ->first();
    $username = \Illuminate\Support\Facades\DB::table('bbs_user_info')

        ->where('bbs_user_info.uid','=',$uid)
        ->first();
    // 权限名
//    dump($groupname);die;
    $bbs_auth_group = \Illuminate\Support\Facades\DB::table('bbs_auth_group')->get();
    return view('/admin.user.setgroup')->with('user',$groupname)->with('uid',$uid)->with('bbs_auth_group',$bbs_auth_group)->with('username',$username);
});

// 管理员组第二步
Route::post('/amdin/user/updategroup','admin\UserController@updategroup');


// 用户状态在线,离线
 Route::get('/admin/user/status/{uid}','admin\UserController@status');

// 权限管理 ,用户组
Route::get('/admin/usergroup',function(){
    return view('/admin.usergroup.member');
});

// 规则管理
Route::get('/admin/authrule/index',function(){
    return view('/admin.authrule.index');
});

// 1.权限普通用户管理组内容
Route::get('/admin/powergroup','admin\UserGroupController@member');

// 2.权限普通用户管理组内容增加
Route::post('/admin/powergroupadd','admin\UserGroupController@insert');

// 2.1 权限普通用户管理组内容显示
Route::get('/admin/powergroup/show/{gid}',function($gid){
    $result = \Illuminate\Support\Facades\DB::table('bbs_user_group')->where('gid',$gid)->first();
//    var_dump($result);die;
    return view('/admin.usergroup.mv')->with('info',$result);
});

// 2.2 修改
Route::post('/admin/powergroupupdate','admin\UserGroupController@update');

// 3.权限默认用户管理组内容显示第一步
Route::get('/admin/usermember','admin\UserGroupController@defaults');

// 第二步
//Route::get('/admin/usermember',function(){
//    return view('/admin.usergroup.default');
//});

// 普通用户权限删除
Route::get('/admin/powergroupdelete/{gid}','admin\UserGroupController@delete');

// 权限管理组内容遍历
Route::get('/admin/usergroupsystem','admin\UserGroupController@system');

// 后台管理组
// 浏览管理组
Route::get('/admin/authgroup/index','admin\AuthGroupController@index');

// 管理组修改第一步,显示
Route::get('/admin/authgroup/show/{id}',function($id){
    $result = \Illuminate\Support\Facades\DB::table('bbs_auth_group')->where('id', $id)->first();
//    var_dump($result);die;

    for ($i = 1;$i < 16;$i++){

        $data[$i][] = \Illuminate\Support\Facades\DB::table('bbs_auth_rule')->where('sort',$i)->where('status',1)->get();

    }
    for ($i = 0;$i<17;$i++){
        $key[] = $i;
    }
//    dd($data);die;

    return view('/admin.authgroup.mod')->with('auth_group', $result)->with('rule',$data)->with('key',$key);
});


// 管理组修改第二步,修改
Route::post('/admin/authgroup/update','admin\AuthGroupController@update'

);
// 管理组删除
Route::get('/admin/authgroup/delete/{id}','admin\AuthGroupController@delete');

// 1.管理组添加 第一步,显示

Route::get('/admin/authgroup/insertshow',function(){

//    $result = \Illuminate\Support\Facades\DB::table('bbs_auth_group')->first();
////    var_dump($result);die;

    for ($i = 1;$i < 16;$i++){

        $data[$i][] = \Illuminate\Support\Facades\DB::table('bbs_auth_rule')->where('sort',$i)->get();

    }
    for ($i = 0;$i<17;$i++){
        $key[] = $i;
    }
//    dd($data);die;

    return view('/admin.authgroup.add')->with('rule',$data)->with('key',$key);
});

// 2. 管理组添加第二步
Route::post('/admin/authgroup/insert','admin\AuthGroupController@insert');

// 添加规则列表页面
Route::get('/admin/authrule/index','admin\AuthRuleController@index');


// 执行规则添加页面
Route::post('/admin/authrule/insert','admin\AuthRuleController@insert');


// 张伟康---------------------------------------------------------
// 登录
Route::get('/admin/login','AdminLoginController@index');
Route::post('/admin/login/join','AdminLoginController@join');


