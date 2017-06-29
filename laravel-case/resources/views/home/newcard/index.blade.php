@extends('/home.public.layout')
@section('imcss')
    <style>
        .pagination li{float:left;}
    </style>
@endsection
    @section('main-content')
    <div class="main_wrap">

        <div class="bread_crumb" id="bread_crumb">
            <a href="__APP__/Index/index" class="home" title="phpwind 官方论坛">首页</a><em>&gt;</em><a href="#">本站新帖</a>
        </div>

        <div id="cloudwind_forum_top"></div>
        <div class="main cc">
            <div class="main_body">
                <div class="main_content cc">


                    <div class="box_wrap thread_page J_check_wrap">
                        <nav>
                            <div class="content_nav" id="hashpos_ttype">
                                <div class="content_filter"><a href="__CONTROLLER__/index" class="">最新发帖</a><span>|</span><a href="#" class=" current">最后回复</a></div>
                                <ul>
                                    <li class="current"><a href="__CONTROLLER__/index">本站新帖</a></li>
                                </ul>
                            </div>
                        </nav>
                        <!--公告-->
                        <!--公告结束-->
                        <div class="thread_posts_list">
                            <table id="J_posts_list" summary="帖子列表" width="100%">

                                <foreach >
                                    <tr>
                                        <td class="author"><a class="J_user_card_show" href="#"><img src="" onerror="this.src=''" height="45" width="45"></a></td>
                                        <td class="subject">
                                            <p class="title">
                                                <a href="#" target="_blank"><span class="posts_icon"><i class="icon_headtopic_3" title="置顶3  新窗口打开"></i></span></a>
                                                <a href="#" class="st">[<font color="red">站长交流</font>]</a>
                                                <a href="" class="st" style="color:#FF0000;font-weight:bold" title="">1</a>
                                                <!-- <span class="posts_icon"><i class="icon_img" title="图片帖"></i></span>	 -->
                                            </p>
                                            <p class="info">
                                                楼主：<a class="J_user_card_show" style='color:blue' href="">21</a><span>createtime</span>
                                                最后回复：<a class="J_user_card_show" href="">username</a><span><a href="#" rel="nofollow" aria-label="最后回复时间">time</a></span>
                                            </p>
                                        </td>
                                        <td class="num">
                                            <span>回复<em style='color:red'>num</em></span>
                                            <span>浏览<em style='color:red'>clicknum</em></span>
                                        </td>
                                    </tr>
                                </foreach>

                            </table>
                        </div>
                    </div>
                    <div class="J_page_wrap cc" data-key="true">
                        <div class="pages" style="float:left">
                            1
                        </div>
                    </div>


                </div>
            </div>

            {{--右边栏,用户详情--}}
            <div class="main_sidebar">
                <div class="box_wrap user_info">
                    <dl class="cc">
                        <dt id="J_ava_ie6">
                            <a href="/phpwind/thinkphp3.2.2phpwind/phpwind/index.php/Personinfo/avatar"><img class="J_avatar" src="/phpwind/thinkphp3.2.2phpwind/phpwind/Public/uploads/m_55ad93b99f7da.jpg" data-type="middle" width="72" height="72" onerror="this.src='/phpwind/thinkphp3.2.2phpwind/phpwind/Public/home/picture/face_small.jpg'"></a>
                            <a href="/phpwind/thinkphp3.2.2phpwind/phpwind/index.php/Personinfo/avatar"><b></b><span>修改头像</span></a>
                        </dt>
                        <dd>
                            <div class="name"><a href="/phpwind/thinkphp3.2.2phpwind/phpwind/index.php/Personinfo/index" class="username">admin<i></i></a></div>
                            <div class="level"><a href="/phpwind/thinkphp3.2.2phpwind/phpwind/index.php/Personinfo/permission/gid/3">管理员</a></div>
                            <div class="level_img">
                                <a href="#"><img src="/phpwind/thinkphp3.2.2phpwind/phpwind/Public/uploads/level/" alt="管理员"></a>
                            </div>
                        </dd>
                    </dl>
                    <div class="num">
                        <ul class="cc">
                            <li><a href="/phpwind/thinkphp3.2.2phpwind/phpwind/index.php/FriendList/index"><span>7</span><em>关注</em></a></li>
                            <li><a href="/phpwind/thinkphp3.2.2phpwind/phpwind/index.php/FriendList/fans"><span>4</span><em>粉丝</em></a></li>
                            <li class="tail"><a href="/phpwind/thinkphp3.2.2phpwind/phpwind/index.php/Zone/index"><span>17</span><em>帖子</em></a></li>
                        </ul>
                    </div>
                    <div class="medal_widget" id="J_medal_widget">
                        <div class="medal_list_wrap">
                            <ul id="J_medal_widget_ul" class="cc J_lazyslide_list" style="width:900px;">
                                <li><img src="/phpwind/thinkphp3.2.2phpwind/phpwind/Public/uploads/icon/c_shequjumin.gif" width="30" height="30" title="社区居民" alt="社区居民"></li><li><img src="/phpwind/thinkphp3.2.2phpwind/phpwind/Public/uploads/icon/c_shequmingxing.gif" width="30" height="30" title="社区明星" alt="社区明星"></li><li><img src="/phpwind/thinkphp3.2.2phpwind/phpwind/Public/uploads/icon/c_zuiaishafa.gif" width="30" height="30" title="最爱沙发" alt="最爱沙发"></li>			</ul>

                        </div>
                    </div>
                    <div class="cc punch_widget_wrap">
                        <div id="J_punch_main_tip" class="fl dn"></div>
                        <div class="punch_widget punch_widget_disabled" id="J_punch_widget">
                            <div class="date">06.28<span>周三</span></div>

                            <!--------打卡签到--------->
                            <div id="J_credittxt_pop" class="pop_credittxt_tips" style="position: fixed; top: 186.5px; left: 570.5px; display: none;">
                                <strong>打卡签到</strong>
                                <span>
					积分
					<em>+10</em>
					</span>
                            </div>
                            <!---------打卡签到--------->
                            <div class="cont">
                                <a href="javascript:void(0);" id="J_punch_over" tabindex="-1" disabled="">已经打卡</a>
                            </div>
                            <div style="line-height:40px;color:#555;font-weight:bold;">&lt;-点击这里</div>			</div>
                    </div>
                </div>

                <pw-drag id="sidebar_1">
                    {{--<div class="linkforum">--}}
                        {{--<div class="box_wrap">--}}
                            {{--<h2 class="box_title J_sidebar_box_toggle">我的应用</h2>--}}
                            {{--<div class="my_app_list">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="#"><span class="icon_vote"></span>投票</a></li>--}}
                                    {{--<li><a href="#"><span class="icon_like"></span>喜欢</a></li>--}}
                                    {{--<li><a href="#"><span class="icon_medal"></span>勋章</a></li>--}}
                                    {{--<li><a href="#"><span class="icon_task"></span>任务</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <pw-drag id="sidebar_thread">

                    </pw-drag></pw-drag></div>
            {{--右边详情结束--}}

            页数
        </div>
        <div id="cloudwind_forum_bottom">

        </div>
    </div>

@endsection
