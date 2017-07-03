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
        <div class="main cc" style="background:none;">
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
