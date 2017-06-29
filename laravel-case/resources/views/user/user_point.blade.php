@extends('/user/index')

@section('block')
@section('imcss')
        <link rel="stylesheet" href="{{asset('home/css/core_11.css')}}" />
        <link rel="stylesheet" href="{{asset('home/css/style_11.css')}}" />
        <link rel="stylesheet" href="{{asset('home/css/widthauto_11.css')}}" />
        <script src="{{asset('home/js/wind.js')}}"></script>
        <script src="{{asset('home/js/jquery.js')}}"></script>
        <link href="{{asset('home/css/register_8.css')}}" rel="stylesheet" />
        <link href="{{asset('home/css/profile.css')}}" rel="stylesheet" />
@show
    {{--<block name="main-content">--}}
        <div class="main_wrap">
            <div class="bread_crumb">
                {{--<a href="#" class="home" title="phpwind 官方论坛">首页</a><em>&gt;</em><a href="#">设置</a>--}}
                <em></em><a href="#">积分</a>
                <em>&gt;</em><a href="#">我的积分</a>
            </div>
            <div class="cc profile_page">
                {{--<div class="md">--}}
                    {{--<div class="menubar">--}}
                        {{--<ul>--}}
                            {{--<li class=""><a href="__CONTROLLER__/index" id="profile_profile">资料</a></li>--}}
                            {{--<li class=""><a href="__CONTROLLER__/avatar" id="profile_avatar">头像</a></li>--}}
                            {{--<li class="current"><a href="__CONTROLLER__/credits" id="profile_credit">积分</a></li>--}}
                            {{--<li class=""><a href="__CONTROLLER__/permission" id="profile_right">权限</a></li>--}}
                            {{--<li class=""><a href="__CONTROLLER__/passwd" id="profile_password">密码安全</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="cm">
                    <div class="cw" style="margin:0 0 0 50px;">
                        <div class="box_wrap">
                            <div id="J_profile_credit" class="content">
                                <div class="profile_nav">
                                    <ul>
                                        <li class="current"><a href="#">我的积分</a></li>
                                    </ul>
                                </div>
                                <div class="credit_page">
                                    <div class="credit_has">
                                        <h2>已有的积分</h2>
                                        <dl>
                                            <dt>
                                                <span class="num">编号</span>
                                                <span class="name">名称</span>
                                                <span class="num">积分值</span>

                                            </dt>
                                            <dd>
                                                <span class="num">1</span>
                                                <span class="name">登录/注册获取积分</span>
                                                <span class="num">{{$loginsum}}点</span>
                                            </dd>
                                            {{--<dd>--}}
                                                {{--<span class="num">2</span>--}}
                                                {{--<span class="name">打卡签到获取积分</span>--}}
                                                {{--<span class="num">{$bpoint['point']}点</span>--}}

                                            {{--</dd>--}}
                                            <dd>
                                                <span class="num">2</span>
                                                <span class="name">回复帖子获取积分</span>
                                                <span class="num">{{$reply}}点</span>

                                            </dd>
                                            <dd>
                                                <span class="num">3</span>
                                                <span class="name">发帖获取积分</span>
                                                <span class="num">{{$post}}点</span>
                                            </dd>
                                            <dt>

                                                <span class="name">积分总数</span>
                                                <span class="num">&nbsp;</span>
                                                <span class="num">{{$userpoint}}点</span>
                                            </dt>
                                        </dl>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--.main-wrap,#main End-->
    {{--</block>--}}
    @section('imjs')

    @endsection


@endsection