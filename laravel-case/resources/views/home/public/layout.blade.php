<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    {{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>phpwind 官方论坛 - Powered by phpwind</title>
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="generator" content="phpwind v9.0.1" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="{{asset('home/css/core_3.css')}}" />
    <link rel="stylesheet" href="{{asset('home/css/style_3.css')}}" />
    <link rel="stylesheet" href="{{asset('home/css/widthauto_3.css')}}" />
    <link rel="stylesheet" href="{{asset('home/css/widthauto.css')}}" />
    <link rel="stylesheet" href="{{asset('home/css/forum.css')}}" />
    <link rel="stylesheet" href="{{asset('home/css/editor_content.css')}}" />
    <script src="{{asset('home/js/plugin.client.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="{{asset('css/home/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/home/user_index.css')}}">

    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <!-- Bootstrap -->
    <link href="{{asset('/home/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/my.css">
    <!--  -->
    @section('imcss')
    @show
    <!--  -->
    <style>.main .thread_posts_list .st{font-size:14px;}</style><script>
        //全局变量 Global Variables
        var GV = {
            JS_ROOT : 'http://www.phpwind.net/res/js/dev/',										//js目录
            JS_VERSION : '20141124',											//js版本号(不能带空格)
            JS_EXTRES : 'http://www.phpwind.net/themes/extres',
            TOKEN : '7c634c22f900c920',	//token $.ajaxSetup data
            U_CENTER : 'http://www.phpwind.net/index.blade.php?m=space',		//用户空间(参数 : uid)
            U_AVATAR_DEF : 'http://www.phpwind.net/res/images/face/face_small.jpg',					//默认小头像
            U_ID : parseInt('0'),									//uid
            REGION_CONFIG : '',														//地区数据
            CREDIT_REWARD_JUDGE : '',			//是否积分奖励，空值:false, 1:true
            URL : {
                LOGIN : 'http://www.phpwind.net/index.blade.php?m=u&c=login',										//登录地址
                QUICK_LOGIN : 'http://www.phpwind.net/index.blade.php?m=u&c=login&a=fast',								//快速登录
                IMAGE_RES: 'http://www.phpwind.net/res/images',										//图片目录
                CHECK_IMG : 'http://www.phpwind.net/index.blade.php?m=u&c=login&a=showverify',							//验证码图片url，global.js引用
                VARIFY : 'http://www.phpwind.net/index.blade.php?m=verify&a=get',									//验证码html
                VARIFY_CHECK : 'http://www.phpwind.net/index.blade.php?m=verify&a=check',							//验证码html
                HEAD_MSG : {
                    LIST : 'http://www.phpwind.net/index.blade.php?m=message&c=notice&a=minilist'							//头部消息_列表
                },
                USER_CARD : 'http://www.phpwind.net/index.blade.php?m=space&c=card',								//小名片(参数 : uid)
                LIKE_FORWARDING : 'http://www.phpwind.net/index.blade.php?c=post&a=doreply',							//喜欢转发(参数 : fid)
                REGION : 'http://www.phpwind.net/index.blade.php?m=misc&c=webData&a=area',									//地区数据
                SCHOOL : 'http://www.phpwind.net/index.blade.php?m=misc&c=webData&a=school',								//学校数据
                EMOTIONS : "http://www.phpwind.net/index.blade.php?m=emotion&type=bbs",					//表情数据
                CRON_AJAX : '',											//计划任务 后端输出执行
                FORUM_LIST : 'http://www.phpwind.net/index.blade.php?c=forum&a=list',								//版块列表数据
                CREDIT_REWARD_DATA : 'http://www.phpwind.net/index.blade.php?m=u&a=showcredit',					//积分奖励 数据
                AT_URL: 'http://www.phpwind.net/index.blade.php?c=remind',									//@好友列表接口
                TOPIC_TYPIC: 'http://www.phpwind.net/index.blade.php?c=forum&a=topictype'							//主题分类
            }
        };
    </script>
    <script src="{{asset('home/js/wind.js')}}"></script>
    <link href="{{asset('home/css/register.css')}}" rel="stylesheet" />

    <link href="{{asset('home/css/post.css')}}" rel="stylesheet" />
    <style>
        .login{
            font-size:20px;
            color:#ffffff;
            display:block;float:left;line-height: 100px;padding:0 20px;transition:all 0.25s ease-in;
        }

    </style>
</head>
<body>
<div class="wrap">
    <header class="header_wrap">
        <div class="head">
            <div id="J_header" class="cc header">
                {{--<div class="logo">--}}
                    {{--<a href="{{url('/')}}">--}}
                        {{--<!--后台logo上传-->--}}
                        {{--<h1>carhome123官方论坛</h1>--}}
                    {{--</a>--}}
                {{--</div>--}}
                <!-------调用显示导航------------->
                <b><a rel="nofollow" href="{{url('/')}}" class="login" >carhome123官方论坛</a></b>
                {{--<a rel="nofollow" href="__APP__/Register/index" class="login">新帖</a>--}}

                <if condition="$Think.session.webuser != ''" >
                    <!--  用户信息头像那一部分  -->
                    <a rel="nofollow" href="__APP__/Personinfo/avatar" class="fr userface" title="修改头像"><img class="J_avatar" src="__PUBLIC__/uploads/s_{$_SESSION['webuser']['icon']}" data-type="middle" width="50" height="50" onerror="this.src='{{asset('home/picture/face_small.jpg')}}'" /></a>

                    <!-------------->
                    <!--消息下拉菜单-->
                    <div id="J_head_msg_pop" tabindex="0" aria-label="消息下拉菜单,按ESC键关闭菜单" class="header_menu_wrap my_message_menu" style="display:none;">
                        <div class="header_menu cc">
                            <div class="core_arrow_top" style="left:206px;"><em></em><span></span></div>
                            <div id="J_head_msg" class="my_message_content"><div class="pop_loading"></div></div>
                        </div>
                    </div>
                    <div class="header_login_later fr">
                        <a aria-haspopup="J_head_user_menu" aria-label="个人功能菜单,按pagedown打开菜单,tab键导航,esc键关闭" tabindex="0" rel="nofollow" href="#" id="J_head_user_a" class="header_login_btn username">1</a>
                        <div class="fl">
                            <div id="J_head_user_menu" role="menu" class="header_menu_wrap my_menu_wrap" style="display:none;">
                                <div class="header_menu my_menu cc">
                                    <div class="core_arrow_top" id="selected" style="left:77px;"><em></em><span></span></div>
                                    <ul class="ct cc">
                                        <li><a href="/user/index"><em class="icon_space"></em>我的空间</a></li>
                                        <li><a href="/user/friend"><em class="icon_fresh"></em>我的好友</a></li>
                                        {{--<li><a href="__APP__/Messagetext/index"><em class="icon_task"></em>站内信息</a></li>--}}
                                        <li><a href="/home/message-write/2"><em class="icon_article"></em>我的信息</a></li>
                                        <li><a href="/user/medle"><em class="icon_medal"></em>我的勋章</a></li>
                                    </ul>
                                    <ul class="ft cc">
                                        <li><a href="/user/show"><em class="icon_profile"></em>个人设置</a></li>
                                        <li><a href="#" rel="nofollow"><em class="icon_quit"></em>退出</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <else />
                    <div class="header_login">
                        @if(empty($_SESSION['username']))
                        <a rel="nofollow" href="{{url('/home/login')}}" class="mr15">登录</a><a rel="nofollow" href="/home/sign">注册</a>
                        @else
                            <a rel="#" class="mr15">{{$_SESSION['username']}}</a><a rel="nofollow" href="{{url('/home/login/out')}}">退出</a>
                            @endif

                    </div>
                </if>

                <div class="header_search" role="search">
                    <form action="__CONTROLLER__/index" method="post">
                        <button  class="search-btn"type="submit" aria-label="搜索">搜索</button>
                        <input class="search-txt" type="text" id="s" aria-label="搜索关键词" accesskey="s" placeholder="按帖子标题搜索" x-webkit-speech speech name="title"/>
                        <input type="hidden" name="csrf_token" value="7c634c22f900c920"/>
                    </form>
                </div>
                <a class="header_login_btn search-magnify"  href="#"><span class="header_search_btn">搜索</span></a>
                <script src="{{asset('home/js/jquery.js')}}"></script>
                <script>

                    /*搜索框的变化*/
                    $(function(){

                        $(".search-magnify").click(function(event) {

                            $(this).hide();
                            $(".search-txt").focus();
                            $(".header_search").animate({width: "200px"},200, function() {

                            });

                            return false;
                        });

                        $('body').click(function(event){
                            var e = event || window.event;
                            if ( !$(e.target).is('.header_search,.search-txt,.search-btn') ) {

                                $(".header_search").animate({width: 0},100, function() {

                                });

                                $(".search-magnify").show();
                            }
                        });

                    })


                    $(".header_login_later").hover(function(){
                        $("#J_head_user_menu").css("display","block");
                        $("#J_head_user_menu").css("margin-top","30px");
                    },function(){
                        $("#J_head_user_menu").mouseover(function(){
                            $(this).css("display","block");
                        }).mouseout(function(){
                            $(this).css("display","none");
                        });
                    });

                </script>
            </div>
        </div>
    </header>
    <div class="tac"></div>
    <!----------主题内容---------->

    @section('main-content')

    @show
    <div class="tac">
        <br />
    </div>
    <div class="footer_wrap" style="margin-left:-86px">
        <div class="footer">
            <pw-drag id="footer_segment"/>
            <div class="bottom">
                <a href="#">关于phpwind</a><a href="#">联系我们</a><a href="#">问题反馈</a><a href="#">程序建议</a><a href="#" target="_blank">阿里云官方网站</a><a href="#" target="_blank">官方微博</a>		</div>
            <p>Powered by <a href="#" target="_blank" rel="nofollow">thinkphp_phpwindV1.0</a> &copy;2015 <a href="#" target="_blank" rel="nofollow">yixiangtuwen.com</a> <a href="#" target="_blank" rel="nofollow">意象图文网络工作室版权所有</a></p>
            <!-- <p><script src='__PUBLIC__/home/js/c.php' language='JavaScript'></script></p> -->
        </div>

        <div id="cloudwind_common_bottom"></div>
    </div>

    <!--返回顶部-->
    <a href="#" rel="nofollow" role="button" id="back_top" tabindex="-1">返回顶部</a>

</div>
@section('imjs')
    <!-- jQuery  -->
    <script src="./public/js/jquery.min.js"></script>
    <!-- Bootstrap的JS文件需要在JQ之后引入 -->
    <script src="./public/js/bootstrap.min.js"></script>
@endsection

</body>
</html>