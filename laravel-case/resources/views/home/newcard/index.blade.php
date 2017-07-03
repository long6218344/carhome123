@extends('/home.public.layout')
@section('imcss')
    <style>
        .pagination li{float:left;}
    </style>
@endsection
@section('main-content')

    <script src="../js/jquery-1.8.3.min.js"></script>
    <div class="main_wrap">
          <style>

            .wrapa{height:170px;
                width:490px;
                margin:60px auto;
                overflow: hidden;
                position: relative;
                margin:100px auto;}
            .wrapa ul{position:absolute;}
            .wrapa ul li{height:170px;}
            .wrapa ol{position:absolute;
                right:7px;
                bottom:10px;}
            .wrapa ol li{height:20px; width: 20px;
                background:#ccc;
                border:solid 1px #666;
                margin-left:5px;
                color:#000;
                float:left;
                line-height:center;
                text-align:center;
                cursor:pointer;}
            .wrapa ol .on{background:#E97305;
                color:#fff;}

        </style>

        <script type="text/javascript">
            window.onload=function(){
                var wrap=document.getElementById('wrap'),
                    pic=document.getElementById('pic').getElementsByTagName("li"),
                    list=document.getElementById('list').getElementsByTagName('li'),
                    index=0,
                    timer=null;

                // 定义并调用自动播放函数
                timer = setInterval(autoPlay, 1000);

                // 鼠标划过整个容器时停止自动播放
                wrap.onmouseover = function () {
                    clearInterval(timer);
                }

                // 鼠标离开整个容器时继续播放至下一张
                wrap.onmouseout = function () {
                    timer = setInterval(autoPlay, 2000);
                }
                // 遍历所有数字导航实现划过切换至对应的图片
                for (var i = 0; i < list.length; i++) {
                    list[i].onmouseover = function () {
                        clearInterval(timer);
                        index = this.innerText - 1;
                        changePic(index);
                    };
                };

                function autoPlay () {
                    if (++index >= pic.length) index = 0;
                    changePic(index);
                }

                // 定义图片切换函数
                function changePic (curIndex) {
                    for (var i = 0; i < pic.length; ++i) {
                        pic[i].style.display = "none";
                        list[i].className = "";
                    }
                    pic[curIndex].style.display = "block";
                    list[curIndex].className = "on";
                }

            };

        </script>

        {{--这儿是轮播图--}}
        <div style="width: 100%;box-shadow: 5px 5px 5px #ccc">


            <div class="wrapa" id='wrap' style="width: 95%;margin: auto;height: 510px;">
                <ul id="pic">
                    @foreach($list as $v)
                        <li><img src="{{asset($v->picture)}}" width="1202" alt=""></li>
                    @endforeach
                </ul>
                <ol id="list">
                    <li class="on">1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                </ol>
            </div>


        </div>
        {{--这儿是轮播图结束--}}

        <div class="bread_crumb" id="bread_crumb">
            <a href="{{url('/')}}" class="home" title="carhome123官方论坛">首页</a>
        </div>

        <div id="cloudwind_forum_top"></div>
        <div class="main cc" style="background:none;">
            <div class="main_body">
                <div class="main_content cc">
                    <h2><b>所有版块</b></h2>
                    <div class="thread_posts_list">
                        <table id="J_posts_list" summary="帖子列表" width="100%">
                    @foreach( $forum as $k => $v )
                        <tr>
                            <td class="subject">
                                <p class="title">
                                    <b><a href="{{url('/home/blog/'.$v->fid)}}" class="st">[<font style="font-size:18px">{{$v->name}}</font>]</a></b>
                                    <i><span>[<font style="color:red">版块精品贴：{{$v->posts}}</font>]</span></i>
                                    <i><span>[<font style="color:green">总帖数：{{$v->posts}}</font>]</span></i>
                                    <i><span>[<font style="color:orange">今日发帖：{{$v->todayposts}}</font>]</span></i>

                                </p>
                            </td>
                        </tr>
                    @endforeach
                        </table>
                    </div>
                    {{--{{ $forum->links() }}--}}
                    {{$forum->appends(array_except(Request::query(), 'fpage'))->links()}}

                    <div class="box_wrap thread_page J_check_wrap">
                        <nav>
                            <div class="content_nav" id="hashpos_ttype">
                                <div class="content_filter"><a href="{{url('/order/post')}}" class="">最新发帖</a><span>|</span><a href="{{url('/order/reply')}}" class="">最新回复</a><span>|</span><a href="{{url('/order/hot')}}" class="">热门排序</a><span>|</span><a href="{{url('/order/best')}}" class="">精品贴</a></div>
                                <ul>
                                    <li class="current"><a href="#">本站帖子</a></li>
                                </ul>
                            </div>
                        </nav>
                        <!--公告-->
                        <!--公告结束-->
                        <div class="thread_posts_list">
                            <table id="J_posts_list" summary="帖子列表" width="100%">

                                {{--                                {{$thread}}--}}
                                @foreach( $best as $k => $v )

                                    <tr>
                                        <td class="author"><a class="J_user_card_show" href="#"></a></td>
                                        <td class="subject">
                                            <p class="title">
                                                @if ($v->top == 1)  <a href="#" target="_blank"><span class="posts_icon"><i class="icon_headtopic_3" title="置顶3  新窗口打开"></i></span></a>顶 @endif
                                                {{--<a href="" class="st">[<font color="red">标题</font>]</a>--}}
                                                <a href="{{url('/home/post/'.$v->tid)}}" class="st" style="color:#FF0000;font-weight:bold" title="">[<font color="red">{{$v->title}}</font>]</a>
                                                 {{--<span class="posts_icon"><i class="icon_img" title="图片帖"><img src=""--}}
                                                                                                               {{--alt=""></i></span>--}}
                                                <a href="{{url('/home/blog/'.$v->fid)}}" class="st">[<font>{{$v->name}}</font>]</a>
                                                <a href="#" class="st"><font color="red">@if ($v->best == 1) [精品]  @endif</font></a>
                                            </p>
                                            <p class="info">
                                                楼主：<a class="J_user_card_show" style='color:blue' href="">{{$v->tauthor}}</a><span>{{$v->tdateline}}</span>
                                                最后回复：
                                                {{--<a class="J_user_card_show" href="">@if (!empty($v->rauthor)) {{$v->rauthor}} @else {{$v->rauthor}} @endif </a>--}}
                                                <span><a href="#" rel="nofollow" aria-label="最后回复时间">@if (!empty($v->replies)) {{$v->replies}} @else {{$v->rdateline}} @endif </a></span>
                                            </p>
                                        </td>
                                        <td class="num">
                                            <span>回复<em style='color:red'>{{$v->renumber}}</em></span>
                                            <span>浏览<em style='color:red'>{{$v->clicknumber}}</em></span>
                                        </td>
                                    </tr>
                                @endforeach
                                @foreach( $thread as $k => $v )
                                    <tr>
                                        <td class="author"><a class="J_user_card_show" href="#"></a></td>
                                        <td class="subject">
                                            <p class="title">
                                                @if ($v->top == 1)  <a href="#" target="_blank"><span class="posts_icon"><i class="icon_headtopic_3" title="置顶3  新窗口打开"></i></span></a>顶 @endif
                                                {{--<a href="" class="st">[<font color="red">{{$v->title}}</font>]</a>--}}
                                                <a href="{{url('/home/post/'.$v->tid)}}" class="st" style="color:#FF0000;font-weight:bold" title="">[<font color="red">{{$v->title}}</font>]</a>

                                                <!-- <span class="posts_icon"><i class="icon_img" title="图片帖"></i></span>	 -->
                                                <a href="{{url('/home/blog/'.$v->fid)}}" class="st">[<font>{{$v->name}}</font>]</a>
                                                <a href="#" class="st"><font color="red">@if ($v->best == 1) [精品]  @endif</font></a>
                                            </p>
                                            <p class="info">
                                                楼主：<a class="J_user_card_show" style='color:blue' href="">{{$v->tauthor}}</a><span>{{$v->tdateline}}</span>
                                                最后回复：
                                                {{--<a class="J_user_card_show" href="">@if (!empty($v->rauthor)) {{$v->rauthor}} @else {{$v->rauthor}} @endif </a>--}}
                                                <span><a href="#" rel="nofollow" aria-label="最后回复时间">@if (!empty($v->replies)) {{$v->replies}} @else {{$v->rdateline}} @endif </a></span>
                                            </p>
                                        </td>
                                        <td class="num">
                                            <span>回复<em style='color:red'>{{$v->renumber}}</em></span>
                                            <span>浏览<em style='color:red'>{{$v->clicknumber}}</em></span>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                    <div class="J_page_wrap cc" data-key="true">
                        {{--<div class="pages" style="float:left">--}}
                            {{--{{ $thread->links() }}--}}
                        {{$thread->appends(array_except(Request::query(), 'spage'))->links()}}
                        {{--</div>--}}
                    </div>


                </div>
            </div>

            {{--右边栏,用户详情--}}
            <div class="main_sidebar">
                  <ul>
                    <li style="font-size: 30px;color: dodgerblue;margin-left: 5px">公告栏</li>
                    @foreach($list4 as $v)
                        <li style="border: 1px solid #ccc;box-shadow: 5px 5px 10px #ccc;margin: 10px 0 10px 5px;
                            width: 75%;">
                            <span style="color: red;text-align: center">{{$v->name}}</span>
                            <br>
                            <span style="margin: 5px 0 5px 0;">{{$v->details}}</span>
                            <br>
                            <span><b>发布时间:</b>{{$v->time}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
 {{--//左边栏广告--}}
                    <div id="adver-left" style="display: block;width: 200px;height: 200px;position: fixed;left: 10px;top: 200px;">
                        <buttom id="btn-ad-left" style="width: 200px">X</buttom>
                        @foreach($list2 as $v)
                            <a href=""><img src="{{asset($v->picture)}}" width="200"></a>

                            <span>{{$v->details}}</span>
                        @endforeach

                    </div>

                    <script>
                        var adverleft = document.getElementById('adver-left')
                        var btnadleft = document.getElementById('btn-ad-left')
                        btnadleft.onclick = function ()
                        {
                            adverleft.style.display = 'none';
                        }

            <div class="main_sidebar">
                <p>驾考题库</p>
                {{--<form action="{{url('/getinfo')}}" method="get">--}}
                    {{--<p><input type="text" placeholder="上海天气" name="question"></p>--}}
                    {{--<button type="submit">提问</button>--}}
                {{--</form>--}}
                <p style="width:35%">题目：{{$question[0]->question}}</p>
                @if($question[0]->option1)
                <p style="width:35%">选项：{{$question[0]->option1}}</p>
                <p style="width:35%">选项：{{$question[0]->option2}}</p>
                <p style="width:35%">选项：{{$question[0]->option3}}</p>
                <p style="width:35%">选项：{{$question[0]->option4}}</p>
                @endif
                <p style="width:35%">回答：{{$question[0]->answer}}</p>
                <p style="width:35%">解释：{{$question[0]->explain}}</p>
                <p style="width:35%">出处：{{$question[0]->chapter}}</p>

                    </script>

                    {{--//右边栏广告--}}
                    <div id="adver-right" style="display: block;width: 200px;height: 200px;position: fixed;right: 10px;top: 300px;">
                        <buttom id="btn-ad-right" style="width: 200px;">X</buttom>
                        @foreach($list3 as $v)
                            <a href=""><img src="{{asset($v->picture)}}" width="200"></a>

                            <span>{{$v->details}}</span>
                        @endforeach

                    </div>

        </div>
        <div id="cloudwind_forum_bottom">
            {{--<p>题目：{{$question[0]->question}}</p>--}}
            {{--<p>回答：{{$question[0]->answer}}</p>--}}
            {{--<p>解释：{{$question[0]->explain}}</p>--}}
            {{--<p>答案：{{$question[0]->chapter}}</p>--}}
        </div>
    </div> 
                    <script>
                        var adverright = document.getElementById('adver-right')
                        var btnadright = document.getElementById('btn-ad-right')
                        btnadright.onclick = function ()
                        {
                            adverright.style.display = 'none';
                        }



                    </script>
@endsection

