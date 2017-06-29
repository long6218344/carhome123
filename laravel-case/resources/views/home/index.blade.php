<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>CarHome123</title>

    <link href="css/co.ashx" rel="stylesheet">
    <link href="css/common.min.css" rel="stylesheet" />

    <link href="css/autohome.min20170116.css" rel="stylesheet" />


    <script src="js/ahas_head.20160729.min.js"></script>
</head>
<body class="wide-body">
<!--迷你导航开始-->
<div id="head">
    <div class="public_top" id="public_top" style="height:36px;">
        <div class="t_inner">
            <h1 class="t_logo">
                CarHome123
            </h1>
            <!--左侧-->
{{--{{var_dump(session())}}--}}
            <!--end左侧-->
            <!--搜索-->
            <div class="t_search">
                <form action="http://sou.autohome.com.cn/luntan?startDate=&endDate=" accept-charset="gb2312"
                      onsubmit="document.charset='gb2312'" target="_blank" id="headQueryForm">
                    <input type="text" value="" autocomplete="off" name="q" class="s_tx" id="headsearch" />
                    <a class="s_btn" href="javascript:ReqHeader.search()" lang="0">论坛搜索</a>
                </form>

            </div>
            <!--end搜索-->
            <!--其他论坛-->

            <!--登录 注册-->
            <ul class="t_right t_login">
                <li><a href="{{url('/home/login')}}">登录</a></li>
                <li><a href="{{url('/home/sign')}}">注册</a></li>
            </ul>
            <!--end登录 注册-->
            <!--左侧-->
            <ul class="t_right" id="right_login" style="">
                <li><a href="http://i.autohome.com.cn"><b id="LoginName"></b></a></li>
                <li>
                    <div class="relate_box" id="messageLi">
                        <a id="messageA" class="" href="javascript:void(0);" onfocus="this.blur()">消息<em class="ico_z">
                                </em></a>

                    </div>
                </li>

            </ul>
            <!--end左侧-->
        </div>
    </div>
</div>

<!--头部导航结束-->



<iframe style="display: none; background-color: #e3e3e3; border: none; position: absolute; z-index: 10000; left: 0; top: 0; display: none; width: 100%; height: 1000px; opacity: 0.5; filter: alpha(opacity=50); -moz-opacity: 0.5;"
        id="back"></iframe>



<div class="content">


    <div class="row">
        <div class="column grid-16" style="overflow:visible">
            <!--多标签-->
            <div class="tab tab02">

                <div class="tab-nav">
                   <div class="search search03">
                        <div class="search-box">
                            <input id="search_text" data-toggle="search" data-val="请输入感兴趣的车型" type="text" class="search-text" value="请输入感兴趣的品牌" />
                            <i class="icon16 icon16-search2"></i>
                        </div>
                        <a id="search_btn" href="javascript:void(0);" class="btn btn-small btn-blue">搜索</a>
                        <div id="search_tips" class="search-pop"></div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-4" class="tab-content-item current">
                        <div class="forum-tab-box">
                            <div id="_c" class="search-pinyin">
                                <a href="javascript:void(0)" class="btn btn-mini btn-pinyin  btn-blue" data-type="py">品牌拼音</a>
                                <a href="javascript:void(0)" class="btn btn-mini btn-blue">热门</a>
                                <a href="javascript:void(0)" class="btn btn-mini">A</a><a href="javascript:void(0)" class="btn btn-mini">B</a><a href="javascript:void(0)" class="btn btn-mini">C</a><a href="javascript:void(0)" class="btn btn-mini">D</a><a href="javascript:void(0)" class="btn btn-mini">E</a><a href="javascript:void(0)" class="btn btn-mini">F</a><a href="javascript:void(0)" class="btn btn-mini">G</a><a href="javascript:void(0)" class="btn btn-mini">H</a><a href="javascript:void(0)" class="btn btn-mini">I</a><a href="javascript:void(0)" class="btn btn-mini">J</a><a href="javascript:void(0)" class="btn btn-mini">K</a><a href="javascript:void(0)" class="btn btn-mini">L</a><a href="javascript:void(0)" class="btn btn-mini">M</a><a href="javascript:void(0)" class="btn btn-mini">N</a><a href="javascript:void(0)" class="btn btn-mini">O</a><a href="javascript:void(0)" class="btn btn-mini">P</a><a href="javascript:void(0)" class="btn btn-mini">Q</a><a href="javascript:void(0)" class="btn btn-mini">R</a><a href="javascript:void(0)" class="btn btn-mini">S</a><a href="javascript:void(0)" class="btn btn-mini">T</a><a href="javascript:void(0)" class="btn btn-mini">U</a><a href="javascript:void(0)" class="btn btn-mini">V</a><a href="javascript:void(0)" class="btn btn-mini">W</a><a href="javascript:void(0)" class="btn btn-mini">X</a><a href="javascript:void(0)" class="btn btn-mini">Y</a><a href="javascript:void(0)" class="btn btn-mini">Z</a>
                            </div>
                            <div class="forum-brand-box">

                                <p>A</p>
                                {{--<ul class="forum-list02">--}}
{{--{{var_dump($forum)}}--}}
                                    {{--<li>--}}
                                        @foreach( $forum as $k => $v )
                                            {{--{{var_dump($forum)}}--}}
                                        <a target="_blank" href="{{url('/home/blog/'.$v->fid)}}" title="{{$v->name}}" >{{$v->name}}</a>
                                        @endforeach
                                    {{--</li>--}}
                                {{--</ul>--}}


                            </div>
                        </div>
                    </div>



                    <div class="forum-tab-bottom">
                        <i class="icon icon-hot-recom"></i>
                        <em id="ftb_c"><a href="javascript:void(0);">loading...</a></em>

                        <a id="favorite" onclick="return autohome.UserValidate()" href="http://i.autohome.com.cn/favor?tabid=2" class="btn btn-mini btn-orange fn-right btn-club-maintain">管理常用论坛</a>
                    </div>
                </div>
                <!--end多标签-->
            </div>
        </div>
        <div class="column grid-4">
            <!--广告-->
            <div class="advbox fn-mb10" id="s2870"></div>
            <div class="advbox" id="s2864"></div>
            <!--end广告-->
        </div>
    </div>
    <!--通栏广告01-->

    <!--通栏广告01-->


    <!--广告-->
    <div class="advbox fn-mb10" id="s2869"></div>
    <!--end广告-->

    <div class="row">
        <div class="column grid-16">
            <div class="essence-post forum-rankings-bor">
                <h3>
                    <span class="fn-left">最新帖子</span>
                    <span class="fn-left check-box"></span>
                    <div class="fn-right check-select">
                        <span class="fn-left">按车<i class="icon10 icon10-jtr1"></i></span>
                        <div data-toggle="select" class="select fn-left">
                            <div id="_b_opt" class="select-selected"><span data-val="-1">选择品牌</span><i class="icon10 icon10-down1"></i></div>
                            <div id="_b" class="select-option">
                                <dl></dl>
                            </div>
                        </div>
                        <div data-toggle="select" class="select fn-left">
                            <div id="_s_opt" class="select-selected"><span data-val="-1">选择车系</span><i class="icon10 icon10-down1"></i></div>
                            <div id="_s" class="select-option">
                                <dl></dl>
                            </div>
                        </div>
                        <a id="_ets_btn" href="javascript:void(0);" class="fn-left btn btn-mini btn-blue">确定</a>
                    </div>
                </h3>
                <ul id="_ets">
                    {{--{{var_dump($result)}}--}}
                @foreach( $thread as $k => $v )
                    <li><em><a target="_blank" title="{{$v->title}}" href="{{url('/home/post/'.$v->tid)}}">{{$v->title}}</a></em><span class="username"><a target="_blank" title="{{$v->tauthor}}" href="">{{$v->tauthor}}</a></span><span class="bbsname"><a target="_blank" href="{{url('/home/blog/'.$v->fid)}}">{{$v->name}}</a></span></li>
                    @endforeach
                </ul>

                <span id="load_pos"></span>
            </div>
        </div>
        <div class="column grid-4">
            <!--认证车主-->
            <div class="uibox fn-mb10">
                <div class="uibox-tilte"><span class="fn-left">认证车主</span></div>
                <div class="car-owner">
                    <div class="car-owner-btn"><a target="_blank" href="http://club.autohome.com.cn/post/CarOwnercampNew" onclick="return autohome.UserValidate(1)" class="btn btn-small btn-blue fn-left">申请认证车主</a></div>
                    <p>目前已有<span id="carOwnerCounts"></span>位认证车主<br />以下为最新成功认证的车主：</p>
                    <ul id="authcarsowner">
                    </ul>
                </div>
            </div>
            <!--end认证车主-->
            <!--广告-->
            <div class="advbox fn-mb10" id="s2863"></div>
            <!--end广告-->
            <!--认证车主-->
            <div class="uibox fn-mb10">
                <div class="uibox-tilte"><span class="fn-left">近期活动招募</span></div>
                <ul class="owner-list">
                    <li><em id="ad_word_1"></em><span>进行中</span></li>
                    <li><em id="ad_word_2"></em><span>进行中</span></li>
                    <li><em id="ad_word_3"></em><span>进行中</span></li>
                    <li><em id="ad_word_4"></em><span>进行中</span></li>
                    <li><em id="ad_word_5"></em><span>进行中</span></li>
                </ul>
            </div>
            <!--end认证车主-->
            <div class="advbox fn-mb10"><a target="_blank" href="http://club.autohome.com.cn/superdriver"><img width="200" height="240" src="picture/superdrivers_200x240.jpg" /></a></div>
        </div>
    </div>
    <!--返回顶部区域开始-->
    <div class="gotop02" data-toggle="gotop">
        <a class="gotop02-con" href="javascript:void(0)" title="找论坛" onclick="javascript: { document.getElementById('btn_otherclub').click(); return false;}">
            <i class="icon16 icon16-search2"></i>
            <span>查找论坛</span>
        </a>
        <a target="_blank" href="http://www.autohome.com.cn/bug/default.aspx" class="gotop02-con">
            <i class="icon16 icon16-book3"></i>
            <span>意见反馈</span>
        </a>
        <a href="#" class="gotop02-con" data-scroll="true" data-gotop="true">
            <i class="icon16 icon16-top"></i>
            <span>返回顶部</span>
        </a>
    </div>
    <!--返回顶部区域结束-->
</div>

<div class="footer_auto">
    <p>
        <a href="http://www.autohome.com.cn/about/index.htm" target="_blank">关于我们</a><a href="http://www.autohome.com.cn/about/lianxi.htm"
                                                                                        target="_blank">联系我们</a><a href="http://special.zhaopin.com/bf/2014/czj041009/sz.html"
                                                                                                                   target="_blank">招贤纳士</a><span class="fline">|</span><a class="footios" href="http://www.autohome.com.cn/apps/1.html"
                                                                                                                                                                          target="_blank">iPhone客户端</a>/<a href="http://www.autohome.com.cn/apps/2.html" target="_blank">iPad客户端</a><a
                class="footand" href="http://www.autohome.com.cn/apps/3.html" target="_blank">Android客户端</a><a
                class="footwp" href="http://www.autohome.com.cn/apps/8.html" target="_blank">WP客户端</a><a
                class="footphone" href="http://www.autohome.com.cn/apps/m/" target="_blank">手机版</a><span
                class="fline">|</span><a class="footauto" href="http://e.weibo.com/qichezhijia" target="_blank">CarHome123</a><span
                class="fline">|</span><a href="http://www.autohome.com.cn/bug/default.aspx" target="_blank">意见反馈</a></p>
    <p>
        <span class="footarial">&copy; 2004-2017 www.autohome.com.cn All Rights Reserved.</span>
        CarHome123</p>
</div>


<script src="js/_commonpageheadscript.js"></script>

<script src="js/json2.js"></script>
</body>
</html>
