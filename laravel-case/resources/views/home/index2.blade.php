@extends('/home.public.layout')
@section('imcss')
    <style>
        .pagination li{float:left;}
    </style>
@endsection
    @section('main-content')
        <script src="../js/jquery-1.8.3.min.js"></script>
    <div class="main_wrap">

        <div class="bread_crumb" id="bread_crumb">
            <a href="{{url('/')}}" class="home" title="carhome123官方论坛">首页</a><a href="{{url('/home/blog/'.$forum[0]->fid)}}" class="home" title="版块详情">版块详情</a>

        </div>

        <div id="cloudwind_forum_top"></div>
        <div class="main cc">
            <div class="main_body">
                <div class="main_content cc">


                    <div class="box_wrap thread_page J_check_wrap">
                        <nav>
                            <div class="content_nav" id="hashpos_ttype">
                                <div class="content_filter"><a href="{{url($forum[0]->fid.'/orderby/post')}}" class="notselect" name="post">最新发帖</a href="{{url($forum[0]->fid.'/orderby/post')}}"><span>|</span><a href="{{url($forum[0]->fid.'/orderby/reply')}}" class="notselect" name="reply">最新回复<span>|</span><a href="{{url($forum[0]->fid.'/orderby/hot')}}" class="notselect" name="hot">热门排序</a><span>|</span><a href="{{url($forum[0]->fid.'/orderby/best')}}" class="notselect" name="best">精品贴</a><a href="{{url('home/'.$forum[0]->fid).'/posting'}}" class="content_filter">我要发帖</a></div>
                                <ul>
                                    <li class="current"><a href="{{url('/')}}">返回首页</a></li>

                                </ul>
                            </div>
                        </nav>
                        <!--公告-->
                        <!--公告结束-->
                        <div class="thread_posts_list">
                            <table id="J_posts_list" summary="帖子列表" width="100%">

                                @if (!empty($result[0]))
                                    @foreach( $result as $k => $v )
                                        <tr>
                                            {{--<td class="author"><a class="J_user_card_show" href="#"><img src="{{asset('\imgs\shouyeche.jpg')}}" onerror="this.src=''" height="45" width="45"></a></td>--}}
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
                                @else
                                    <h3>本版块暂无帖子</h3>
                                @endif

                            </table>
                        </div>
                    </div>
                    <div class="J_page_wrap cc" data-key="true">
                        {{ $result->links() }}
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

        </div>
        <div id="cloudwind_forum_bottom">

        </div>
    </div>

        {{--<script>--}}


            {{--$(function(){--}}
                {{--$('.notselect').click(function(){--}}
                    {{--var way = $(this).attr("name");--}}
                    {{--var path = '{{url($forum[0]->fid.'/orderby')}}/'+way;--}}
{{--//                console.log(path);--}}
                    {{--$.ajax({--}}
                        {{--type: 'get',--}}
                        {{--url: path,--}}
                        {{--success: function (){--}}
{{--//                            alert('删除成功!');--}}
{{--//                        console.log(path);--}}
                        {{--},--}}
                        {{--error: function (){--}}
{{--//                            alert('删除出现错误!');--}}
{{--//                        console.log(path);--}}
                        {{--}--}}
                    {{--});--}}
                {{--})--}}
            {{--})--}}
        {{--</script>--}}





@endsection
