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

//Route::get('/', function () {
//
//    return view('welcome');
//
//});



//前台 登录
Route::get('/home/login','LoginController@index');
Route::post('/home/login/join','LoginController@join');


//前台注册
Route::get('/home/sign','SignController@index');
Route::post('/home/sign/create','SignController@create');
Route::get('/home/sign/selete/{data?}','SignController@selete');


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


// -----------------------权限判断-----------------------------------------
// 中间件 权限登录验证
Route::group(['middleware'=>['checkpower']],function() {

// 用户列表显示
    Route::get('/admin/index', 'admin\UserController@index');

// 用户列表更新第一步,读取信息
    Route::get('/admin/update/{uid}', 'admin\UserController@userUpdate');
// 用户列表更新第二步
    Route::post('/admin/user/newdate/{uid}', 'admin\UserController@update');


// 资源控制器
    Route::resource('/admin/user', 'admin\UserController');
// 用户删除
    Route::get('/admin/delete/{uid}', 'admin\UserController@destroy');
//
//Route::resource('/admin/user/{uid}','admin\UserController');

// 密码修改
    Route::post('/admin/user/pwd', 'admin\UserController@pwd');


// 管理员组第二步
    Route::post('/amdin/user/updategroup', 'admin\UserController@updategroup');

// 1.权限普通用户管理组内容
    Route::get('/admin/powergroup', 'admin\UserGroupController@member');

// 2.权限普通用户管理组内容增加
    Route::post('/admin/powergroupadd', 'admin\UserGroupController@insert');

// 2.1 权限普通用户管理组内容显示


// 2.2 修改
    Route::post('/admin/powergroupupdate', 'admin\UserGroupController@update');

// 3.权限默认用户管理组内容显示第一步
    Route::get('/admin/usermember', 'admin\UserGroupController@defaults');


// 普通用户权限删除
    Route::get('/admin/powergroupdelete/{gid}', 'admin\UserGroupController@delete');

// 权限管理组内容遍历
    Route::get('/admin/usergroupsystem', 'admin\UserGroupController@system');

// 后台管理组

// 浏览管理组
    Route::get('/admin/authgroup/index', 'admin\AuthGroupController@index');


// 管理组修改第一步

// 管理组修改第二步,修改
    Route::post('/admin/authgroup/update', 'admin\AuthGroupController@update'

    );
// 管理组删除
    Route::get('/admin/authgroup/delete/{id}', 'admin\AuthGroupController@delete');

// 1.管理组添加 第一步,显示


// 2. 管理组添加第二步
    Route::post('/admin/authgroup/insert', 'admin\AuthGroupController@insert');

// 添加规则列表页面
    Route::get('/admin/authrule/index', 'admin\AuthRuleController@index');


// 执行规则添加页面
    Route::post('/admin/authrule/insert', 'admin\AuthRuleController@insert');

});
// --------------------------中间件规则判断结束------------------------------

// 权限管理 ,用户组
Route::get('/admin/usergroup', function () {
    return view('/admin.usergroup.member');
});

// 规则管理
Route::get('/admin/authrule/index', function () {
    return view('/admin.authrule.index');
});


// 密码传入
Route::get('/admin/user/repwd/{id}', function ($id) {
    return view('/admin.user.repwd')->with('uid', $id);
});

// -----------------------权限判断-----------------------------------------


// 张伟康---------------------------------------------------------

//进入notice控制器
Route::get('/admin/notice','NoticeController@index');


//后天天气APL接口
Route::get('/admin/calendar','CalendarController@index');


//后台分类路由
    Route::get('/admin/classify','AdminClassController@index');

//编辑分类
    Route::get('/admin/classify/editShow/{id}','AdminClassController@editShow');
    Route::post('/admin/classify/edit','AdminClassController@edit');

//删除分类
    Route::get('/admin/classify/delete/{id}','AdminClassController@delete');

//新增分类
    Route::get('/admin/classify/addshow','AdminClassController@addshow');
    Route::post('/admin/classify/add','AdminClassController@add');

//隐藏
    Route::get('/admin/classify/disnone/{id}','AdminClassController@disnone');

//显示
    Route::get('/admin/classify/disblock/{id}','AdminClassController@disblock');

//添加子分类
    Route::get('/admin/classify/sonclassshow/{id}','AdminClassController@sonclassshow');
    Route::post('/admin/classify/sonclassadd','AdminClassController@sonclassadd');


//查看后台子分类
    Route::get('/admin/classify/sonindex/{id}','AdminClassController@sonindex');

//添加一级分类页面
    Route::get('/admin/classify/addone/{data}','AdminClassController@addone');


//后台广告管理模块

    Route::get('/admin/adver','AdminAdverController@index');
    Route::get('/admin/adver/delete/{id}','AdminAdverController@delete');

//后台广告编辑
    Route::get('/admin/adver/editshow/{id}','AdminAdverController@editshow');
    Route::post('/admin/adver/edit','AdminAdverController@edit');

//后台广告添加
    Route::get('/admin/adver/addshow','AdminAdverController@addshow');
    Route::post('/admin/adver/add','AdminAdverController@add');

//添加广告检测是否 有重名
    Route::get('/admin/adver/addshow/check/{data}','AdminAdverController@check');


//后台公告管理
    Route::get('/admin/notic','AdminNoticeController@index');

//Route::get('/admin/notic','AdminNoticeController@index');

//后台公告删除
    Route::get('/admin/notice/delete/{id}','AdminNoticeController@delete');

//后台公告添加
    Route::get('/admin/notice/addshow','AdminNoticeController@addshow');
    Route::post('/admin/notice/add','AdminNoticeController@add');

//后台公告编辑
    Route::get('/admin/notice/editshow/{id}','AdminNoticeController@editshow');
    Route::post('/admin/notice/edit','AdminNoticeController@edit');


//发布
    Route::get('/admin/notice/disnone/{id}','AdminNoticeController@disnone');

//未发布
    Route::get('/admin/notice/disblock/{id}','AdminNoticeController@disblock');


//--------------------------------------------------------------------------

// ------龙淼
// 登录
Route::get('/admin/login','AdminLoginController@index');
Route::post('/admin/login/join','AdminLoginController@join');

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

// 用户状态在线,离线
Route::get('/admin/user/status/{uid}','admin\UserController@status');


// 2.1 权限普通用户管理组内容显示
Route::get('/admin/powergroup/show/{gid}',function($gid){
    $result = \Illuminate\Support\Facades\DB::table('bbs_user_group')->where('gid',$gid)->first();
//    var_dump($result);die;
    return view('/admin.usergroup.mv')->with('info',$result);
});

//  积分管理显示
Route::get('/admin/point/index','admin\PointController@index');

// 2. 积分规则显示编辑页面
Route::get('/admin/point/mod/{typeid}','admin\PointController@mod');

// 3. 积分规则编辑
Route::post('/admin/point/update/{typeid}','admin\PointController@update');

// 1. 添加积分规则 ,页面显示
Route::get('/admin/point/addshow','admin\PointController@addshow');
// 2. 增加积分规则
Route::post('/admin/point/add','admin\PointController@add');

// 积分规则删除
Route::get('/admin/point/delete/{typeid}','admin\PointController@delete');



// ----------------------龙淼模块end------------------------


// ------------------------刘超超-----------------------------

// Route::group(['prefix'=>'user'],function(){
// 前台用户模块
Route::get('user/index', 'user\IndexController@show');
// Route::get('user/myword', function(){return view('/user/user_myword');});
Route::get('user/show', 'user\EditController@show');
Route::get('user/edit', 'user\EditController@show_edit');
Route::post('user/edits', 'user\EditController@edit');
// 编辑个人信息
Route::get('user/myword', 'user\WordController@show');
Route::get('user/password', 'user\WordController@password');
Route::post('user/editpwd', 'user\WordController@edit');
// 头像和提示页
Route::get('user/icon', 'user\WordController@icon');
Route::post('user/editicon', 'user\WordController@editicon');
Route::get('user/notice', 'user\NoticeController@index');
// 关注好友 取消关注 以及相互关注 粉丝
Route::get('user/friend', 'user\FriendController@friend');
Route::get('user/follow', 'user\FansController@show');
Route::get('user/fans/{id}', 'user\FriendController@fans');
Route::get('user/addfans/{uid}', 'user\FriendController@addfans');
Route::get('user/bothfriend', 'user\BothFriendController@show');


//前台发私信
Route::get('/home/message-write/{jd}/{id?}','user\MessageController@index')->middleware('message');
Route::post('/home/message/write','user\MessageController@write');
//ajax 检测用户是否存在
Route::get('/home/message/detection/{data}','user\MessageController@detection');
//ajax 私信详情
Route::get('/home/message/read/{id}','user\MessageController@read');
//ajax 删除私信
Route::get('/home/message/delete/{id}','user\MessageController@delete');

// 好友动态
Route::get('user/newsfeed', 'user\NewsFeedController@show');
Route::get('user/allfeeds', 'user\AllFeedsController@show');


Route::get('user/reply', 'user\ReplyController@reply');
Route::get('user/get', 'user\GetReplyController@get');
Route::get('user/store', 'user\StoreController@show');
Route::get('user/notstore/{id?}', 'user\StoreController@del');
Route::get('user/forum', 'user\StoreController@showforum');
Route::get('user/cancelbbs/{id?}', 'user\StoreController@cancel');

// -----------------------周天野----------------------------


//Route::get('/','HomeIndexController@index');
//Route::get('/home/post/{tid}','PostDetailsController@index');
//Route::get('/home/blog/{fid}','BlogPlateController@index');

//前台注册
Route::get('/home/sign','SignController@index');
Route::post('/home/sign/create','SignController@create')->middleware('sign');
Route::get('/home/sign/selete/{data?}','SignController@selete');


//Route::get('/admin/login',function(){
//    return view('/admin.public.login');
//});

Route::get('/admin/layout',function(){
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


//后台新增版块
Route::get('/admin/addforum',function(){
    return view('/admin.posts.addforum');
});


//后台版块管理
Route::get('/admin/forum','ForumController@index');
Route::post('/admin/forum/add','ForumController@add');
Route::get('/admin/forum/edit/{fid}/{status}','ForumController@edit');
Route::get('/admin/forum/delete/{fid}','ForumController@delete');

//后台帖子管理
Route::get('/admin/thread','ThreadController@index');
Route::get('/admin/thread/edit/{tid}/{type}/{num}/{fid?}','ThreadController@edit');
Route::get('/admin/thread/delete/{tid}/{fid}','ThreadController@delete');

//后台帖子详情管理
Route::get('/admin/post','PostController@index');
Route::get('/admin/post/delete/{pid}','PostController@delete');

//后台回复管理
Route::get('/admin/reply','ReplyController@index');
Route::get('/admin/reply/delete/{rid}','ReplyController@delete');


Route::get('/home/login','LoginController@index');
Route::post('/home/login/join','LoginController@join');


//前台注册
Route::get('/home/sign','SignController@index');



// --------------------周天野--------------------------


// ---------------前台帖子页面----------------------------

// 页面头部




// 本站新帖

// 张伟康---------------------------------------------------------

//后台相册
Route::get('/admin/photo','PhotoController@index');
//展示相册增加页面
Route::get('/admin/photo/addshow','PhotoController@addshow');
//增加功能
Route::post('/admin/photo/add','PhotoController@add');
//删除ajax
Route::get('/admin/photo/delete/{id}','PhotoController@delete');
//展示相册编辑页面
Route::get('/admin/photo/editshow/{id}','PhotoController@editshow');
//编辑功能
Route::post('/admin/photo/edit','PhotoController@edit');
//前台展示
Route::get('/home/photo/{jd?}','PhotoController@homeshow');




//后台连接
Route::get('/admin/blogroll','BlogrollController@index');
//添加连接页面
Route::get('/admin/blogroll/addshow','BlogrollController@addshow');
//添加
Route::post('/admin/blogroll/add','BlogrollController@add');
//删除
Route::get('/admin/blogroll/delete/{id}','BlogrollController@delete');
//编辑页面
Route::get('/admin/blogroll/editshow/{id}','BlogrollController@editshow');
//编辑
Route::post('/admin/blogroll/edit','BlogrollController@edit');



// ----------------龙淼gai个人中心-------------
// 积分
Route::get('/user/user_point','user\PointController@index');

// 权限
Route::get('/user/user_power','user\UserpowerController@index');



// ---------------前台帖子页面----------------------------
// 本站新帖

// 张伟康---------------------------------------------------------

//后台相册
Route::get('/admin/photo','PhotoController@index');
//展示相册增加页面
Route::get('/admin/photo/addshow','PhotoController@addshow');
//增加功能
Route::post('/admin/photo/add','PhotoController@add');
//删除ajax
Route::get('/admin/photo/delete/{id}','PhotoController@delete');
//展示相册编辑页面
Route::get('/admin/photo/editshow/{id}','PhotoController@editshow');
//编辑功能
Route::post('/admin/photo/edit','PhotoController@edit');
//前台展示
Route::get('/home/photo/{jd?}','PhotoController@homeshow');


//后台连接
Route::get('/admin/blogroll','BlogrollController@index');
//添加连接页面
Route::get('/admin/blogroll/addshow','BlogrollController@addshow');
//添加
Route::post('/admin/blogroll/add','BlogrollController@add');
//删除
Route::get('/admin/blogroll/delete/{id}','BlogrollController@delete');
//编辑页面
Route::get('/admin/blogroll/editshow/{id}','BlogrollController@editshow');
//编辑
Route::post('/admin/blogroll/edit','BlogrollController@edit');





// ----------------龙淼gai个人中心-------------
// 积分
Route::get('/user/user_point','user\PointController@index');

// 权限
Route::get('/user/user_power','user\UserpowerController@index');

// -----------徽章---------
// 前台
Route::get('/user/medle','user\MedleController@index');

// 前台徽章第二页显示
Route::get('/user/medle2','user\MedleController@index2');

// 前台徽章添加
Route::get('/user/medle/add/{id}','user\MedleController@insert');

// 后台
Route::get('/admin/medle','admin\MedleController@index');

// 添加页面
Route::get('/admin/medle/addshow','admin\MedleController@addshow');
// 添加徽章
Route::post('/admin/medle/add','admin\MedleController@add');
// 修改页面
Route::get('/admin/medle/modshow/{id}','admin\MedleController@modshow');
// 修改控制器
Route::post('/admin/medle/mod/{id}','admin\MedleController@mod');

// 删除
Route::get('/admin/medle/del/{id}','admin\MedleController@delete');



// -------徽章
// -----------------龙淼end---------------



// --------------------周天野--------------------------


//首页
Route::get('/','HomeIndexController@index');

//发帖页
Route::get('/home/{fid}/posting','PostingController@index')->middleware('post');
//回复页
Route::get('/home/reply/{tid}','HomereplyController@index')->middleware('reply');
//发帖提交
Route::post('/home/posting/submit','PostingController@submit');
//回复提交
Route::post('/home/post/submit','PostDetailsController@submit');
//版块页
Route::get('/home/blog/{fid}','BlogPlateController@index');
//帖子详情页
Route::get('/home/post/{tid}','PostDetailsController@index')->middleware('postdetails');


// --------------------周天野--------------------------
