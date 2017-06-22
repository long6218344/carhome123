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

//    echo env('APP_KEY');
//    echo '<br>';
//    echo date('H');
//    echo '<br>';

//    dump($_ENV);
//      config(['app.name'=>'演示demo']);
//      echo config('app.name');
//    var_dump(config('database.connections.mysql'));
    return view('welcome');
//    abort(404); //HTTP 404信息
    //门面方法
//    Config::set('app.timezone', 'UTC');
//    echo config('app.timezone');
//    echo date('H');

});


//路由参数
//Route::get('/good/{id}',function(){
//    return '商品ID为'.$id;
//});
//Route::get('/hi/{id?}',function($id='22'){
//    return '游客ID为'.$id;
//});

Route::get('/admin/login',function(){
    return view('/admin.public.login');
});

Route::get('/admin/layout',function(){
    // 中间件操作用户界面,用户头像

    return view('/admin.public.layout');

});


//Route::get('/admin/index',function(){
//    return view('/admin.user.index');
//});
Route::get('/admin/store',function(){
    return view('/admin.user.store');
});

Route::get('/admin/repwd',function(){
    return view('/admin.user.repwd');
});
Route::get('/admin/group',function(){
    return view('/admin.user.setgroup');
});

// 中间件 验证登录
//Route::group(['prefix'=>'admin'],['middleware'=>'adminlogin'],function(){
//
//});
Route::get('/admin/index','admin\UserController@index');

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
    $username = \Illuminate\Support\Facades\DB::table('bbs_user_info')
        ->join('bbs_auth_group_access','bbs_user_info.uid','=','bbs_auth_group_access.uid')
        ->join('bbs_auth_group','bbs_auth_group_access.group_id','=','bbs_auth_group.id')
        ->select('bbs_user_info.username','bbs_auth_group.title','bbs_auth_group.id')
        ->where('bbs_user_info.uid','=',$uid)
        ->first();
    // 权限名
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