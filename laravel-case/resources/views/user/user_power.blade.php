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
    <style>.main .thread_posts_list .st{font-size:14px;}</style>
    @show

    <div class="main_wrap">
        <div class="bread_crumb">
            <a href="#" class="home" title="梦之翼论坛">首页</a><em>&gt;</em><a href="#">设置</a>
           
            <em>&gt;</em><a href="#">权限</a>
            <em>&gt;</em><a href="#">权限显示</a>
        </div>
        <div class="cc profile_page">
            {{--<div class="md">--}}
                {{--<div class="menubar">--}}
                    {{--<ul>--}}
                        {{--<li class=""><a href="__CONTROLLER__/index" id="profile_profile">资料</a></li>--}}
                        {{--<li class=""><a href="__CONTROLLER__/avatar" id="profile_avatar">头像</a></li>--}}
                        {{--<li class=""><a href="__CONTROLLER__/credits" id="profile_credit">积分</a></li>--}}
                        {{--<li class="current"><a href="__CONTROLLER__/permission" id="profile_right">权限</a></li>--}}
                        {{--<li class=""><a href="__CONTROLLER__/passwd" id="profile_password">密码安全</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="cm">
                <div class="cw" style="margin:0 0 0 0px;">
                    <div class="box_wrap">
                        <div id="J_profile_right" class="content" style="width:1150px;">

                            <div class="profile_nav">
                                <ul>
                                    <li class="current"><a href="#">权限</a></li>
                                </ul>
                            </div>
                            <div class="management_group_list">
                                <ul class="cc">
                                    <li><a id="mygroup" href="#">我的用户组</a><em class="core_arrow"></em></li>
                                    <li><a id="membersgroup" href="#">{{$groupname}}组</a><em class="core_arrow"></em></li>
                                    {{--<li><a id="systemsgroup" href="#">管理组</a><em class="core_arrow"></em></li>--}}
                                </ul>
                            </div>
                            <div class="core_menu J_right_menus" style="margin:-2px 0 0 -15px;display:none" id="J_right_my">
                                <div class="core_arrow_top"><em></em><span></span></div>
                                <div class="core_menu_list">
                                    <ul class="cc">
                                        <li><a href="__CONTROLLER__/permission/gid/{$Think.session.data.gid}">{$Think.session.data.groupname}</a></li>
                                        <li><a href="__CONTROLLER__/permission/gid/{$info['gid']}">{$info['groupname']}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="core_menu J_right_menus" style="margin:-2px 0 0 -27px;display:none" id="J_right_member">
                                <div class="core_arrow_top"><em></em><span></span></div>
                                <div class="core_menu_list">
                                    <ul class="cc">
                                        <foreach name="members" item="member" >
                                            <li><a href="__CONTROLLER__/permission/gid/{$member['gid']}">{$member['groupname']}</a></li>
                                        </foreach>
                                    </ul>
                                </div>
                            </div>
                            <div class="core_menu J_right_menus" style="margin:-2px 0 0 -27px;display:none" id="J_right_system">
                                <div class="core_arrow_top"><em></em><span></span></div>
                                <div class="core_menu_list">
                                    <ul class="cc">
                                        {{--<foreach name="systems" item="system">--}}
                                            <li><a href="#">{{$groupname}}</a></li>
                                        {{--</foreach>--}}
                                    </ul>
                                </div>
                            </div>
                            <div class="my_group cc">
                                <div class="type">
                                    <h2>&nbsp;</h2>
                                    <ul>
                                        <li></li>
                                        <li class="hd">基本权限</li>
                                        {{--<li>站点访问</li>--}}
                                        {{--<li>使用举报</li>--}}
                                        <li>查看用户IP</li>
                                        <li>发送消息</li>
                                        <li>每日发送消息条数</li>
                                        {{--<li>提醒功能</li>--}}
                                        <li class="hd">论坛权限</li>
                                        <li>浏览帖子</li>
                                        <li>发表帖子</li>
                                        <li>发表回复</li>
                                        <li>帖子审核</li>
                                        <li>每次发表帖子数</li>
                                        {{--<li>发布投票</li>--}}
                                        {{--<li>参与投票</li>--}}
                                        {{--<li>查看投票人员</li>--}}
                                        {{--<li class="hd">附件权限</li>--}}
                                        {{--<li>允许上传</li>--}}
                                        {{--<li>允许下载</li>--}}
                                    </ul>
                                </div>
                                <div class="current" id="current">
                                    <h2>{{$power->groupname}}　的权限</h2>
                                    <ul>
                                        <li>我的积分　{{$credits}}　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　升级需要的积分  　{{$level}}</li>
                                        <li class="hd">&nbsp;</li>
                                        {{--<li><span class="{$row['allow_visit'] ? 'correct_span' : 'error_span'}">{$row['allow_visit'] ? '支持' : '不支持'}</span>--}}
                                            {{--　　　　　　　　　　　　　　　　　　　　　　　　--}}
                                            {{--<span style="color:#bbb;font-size:12px;">关闭后，用户将不能访问站点的任何页面</span>--}}
                                        {{--</li>--}}
                                        {{--<li><span class="{$row['use_inform'] ? 'correct_span' : 'error_span'}">{$row['use_inform'] ? '支持' : '不支持'}</span></li>--}}
                                        <li><span class="{{$power->look_user_ip ? 'correct_span' : 'error_span'}}">{{$power->look_user_ip ? '支持' : '不支持'}}</span></li>
                                        <li><span class="{{$power->message_allow_send ? 'correct_span' : 'error_span'}}">{{$power->message_allow_send ? '支持' : '不支持'}}</span>
                                            　　　　　　　　　　　　　　　　　　　　　　　　
                                            <span style="color:#bbb;font-size:12px;">开启后，用户才有权限发送站内消息</span>
                                        </li>
                                        <li>{{$power->message_max_send}}
                                            　　　　　　　　　　　　　　　　　　　　　　　　
                                            <span style="color:#bbb;font-size:12px;">设置用户每天允许发送多少条消息</span>
                                        </li>
                                        {{--<li><span class="{$row['remind_open'] ? 'correct_span' : 'error_span'}">{$row['remind_open'] ? '支持' : '不支持'}</span></li>--}}
                                        <li class="hd">&nbsp;</li>
                                        <li><span class="{{$power->allow_read ? 'correct_span' : 'error_span'}}">{{$power->allow_read ? '支持' : '不支持'}}</span>
                                            　　　　　　　　　　　　　　　　　　　　　　　　
                                            <span style="color:#bbb;font-size:12px;">开启后，用户可以浏览帖子</span>
                                        </li>
                                        <li><span class="{{$power->allow_post ? 'correct_span' : 'error_span'}}">{{$power->allow_post ? '支持' : '不支持'}}</span></li>
                                        <li><span class="{{$power->allow_reply ? 'correct_span' : 'error_span'}}">{{$power->allow_reply ? '支持' : '不支持'}}</span></li>
                                        <li><span class="{{$power->post_check ? 'correct_span' : 'error_span'}}">{{$power->post_check ? '支持' : '不支持'}}</span></li>
                                        <li>{{$power->post_max_num}}
                                            　　　　　　　　　　　　　　　　　　　　　　　　
                                            <span style="color:#bbb;font-size:12px;">设置用户每天允许发表帖子数目</span>
                                        </li>
                                        {{--<li><span class="{$row['allow_add_vote'] ? 'correct_span' : 'error_span'}">{$row['allow_add_vote'] ? '支持' : '不支持'}</span></li>--}}
                                        {{--<li><span class="{$row['allow_participate_vote'] ? 'correct_span' : 'error_span'}">{$row['allow_participate_vote'] ? '支持' : '不支持'}</span></li>--}}
                                        {{--<li><span class="{$row['look_user_ip'] ? 'correct_span' : 'error_span'}">{$row['look_user_ip'] ? '支持' : '不支持'}</span></li>--}}
                                        {{--<li class="hd">&nbsp;</li>--}}
                                        {{--<li><span class="{$row['allow_upload'] ? 'correct_span' : 'error_span'}">{$row['allow_upload'] ? '支持' : '不支持'}</span>--}}
                                            {{--　　　　　　　　　　　　　　　　　　　　　　　　--}}
                                            {{--<span style="color:#bbb;font-size:12px;">用户满足一定等级可以下载</span>--}}
                                        {{--</li>--}}
                                        {{--<li><span class="{$row['allow_download'] ? 'correct_span' : 'error_span'}">{$row['allow_download'] ? '支持' : '不支持'}</span>--}}
                                            {{--　　　　　　　　　　　　　　　　　　　　　　　　--}}
                                            {{--<span style="color:#bbb;font-size:12px;">用户满足一定等级可以上传</span>--}}
                                        {{--</li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        ﻿	</div>
                </div>
            </div>
        </div>
    </div>
    <!--.main-wrap,#main End-->
@endsection
    @section('imjs')
    <script>
        $(function(){
            $("#mygroup").hover(function(){
                $("#J_right_my").css("display","block");
                $("#J_right_my").css("margin-left","0px");
            },function(){
                $("#J_right_my").mouseover(function(){
                    $(this).css("display","block");
                }).mouseout(function(){
                    $(this).css("display","none");
                });
                $("#J_right_my").css("display","none");
            });

            $("#membersgroup").hover(function(){
                $("#J_right_member").css("display","block");
                $("#J_right_member").css("margin-left","100px");
            },function(){
                $("#J_right_member").mouseover(function(){
                    $(this).css("display","block");
                }).mouseout(function(){
                    $(this).css("display","none");
                });
                $("#J_right_member").css("display","none");
            });

            $("#systemsgroup").hover(function(){
                $("#J_right_system").css("display","block");
                $("#J_right_system").css("margin-left","175px");
            },function(){
                $("#J_right_system").mouseover(function(){
                    $(this).css("display","block");
                }).mouseout(function(){
                    $(this).css("display","none");
                });
                $("#J_right_system").css("display","none");
            });


        });
    </script>
    @show