@extends('/user/index')
@section('block')
    @section('imcss')
    <link rel="stylesheet" href="{{url(asset('home/css/core.css'))}}" />
    <link rel="stylesheet" href="{{url(asset('home/css/style.css'))}}" />

    <link rel="stylesheet" href="{{url(asset('/home/css/widthauto.css'))}}" />
    <link href="{{url(asset('/home/css/medal.css'))}}" rel="stylesheet" />
    <style>.main .thread_posts_list .st{font-size:14px;}</style>
    <script src="{{url(asset('/home/js/jquery.js'))}}"></script>
    <script src="{{url(asset('home/js/wind.js'))}}"></script>
    <link href="{{url(asset('home/css/message.css'))}}" rel="stylesheet" />

    @endsection
    @section('main-content')
    <div class="main_wrap">
        <div class="bread_crumb">
            <a href="#" class="home" title="CARHOME123 官方论坛">首页</a><em>&gt;</em><a href="#">勋章</a><em>&gt;</em><a href="{{url(asset('/user/medle'))}}">我的勋章</a>
        </div>
        <div class="main cc" style="background-image:none;width: 800px;" >
            <div class="main_body">
                <div class="main_content">
                    <div class="box_wrap medal_page">
                        <nav>
                            <div class="content_nav">
                                <ul>
                                    <li class="current"><a href="{{url(asset('/user/medle'))}}">我的勋章</a></li>
                                    <li><a href="{{url(asset('/user/medle2'))}}">勋章中心</a></li>

                                </ul>
                            </div>
                        </nav>
                        <div id="J_medal_card_wrap" class="medal_content">
                            <div class="medal_unshow_list" >
                                <div class="hd">
                                    <h2>可以获取的勋章</h2><span></span>
                                </div>
                                <div id="J_medal_unshow" class="cc">

                                    <div class="ct" style="width:680px;">
                                        <ul class="J_lazyslide_list" >


                                            @foreach($allimage as $v)
                                                {{--<if condition="#" >--}}
                                                    <li class="ct" style="float:left;margin:20px">
                                                        <a data-role="show" data-id="16" class="J_medal_card" href="#"><img src="{{url(asset($v->image))}}" width="96" height="96" alt="{{$v->name}}" class="imgs" /></a>
                                                        <p title="{{$v->name}}">{{$v->name}}</p>
                                                        <input type="hidden" name="medal_id" value="{{$v->medal_id}}">
                                                        {{--判断勋章状态--}}
                                                        @if(in_array($v->medal_id,$k) )
                                                            <button id="lq" class="btn {$use[$name['medal_id']]}" type="submit"  name="sub"
                                                                    onclick="store(this,{{$v->medal_id}})" disabled>已领取</button>
                                                        @else
                                                        <button id="lq" class="btn {$use[$name['medal_id']]}" type="submit"  name="sub"
            {{--@if()--}}

            onclick="store(this,$v->medal_id)" >领取</button>
                                                    </li>
                                                    @endif

                                                    {{--<else/>--}}
                                                    {{--<li class="doing" style="float:left;margin:20px">--}}
                                                        {{--<a data-role="show" data-id="16" class="J_medal_card" href="#"><img src="{{$v->image}}" width="96" height="96" alt="{{$v->image}}" class="imgs" /></a>--}}
                                                        {{--<p title="{{$v->image}}">{{$v->name}}</p>--}}
                                                        {{--<button class="btn disabled" type="button" >进行中</button>--}}
                                                    {{--</li>--}}

                                                {{--</if>--}}
                                                <div  class="pop_deep J_medel_pop" style="top:25%; left:400.5px; display: none;" tabindex="0" aria-labelledby="alert_title" role="alertdialog">
                                                    <div class="core_pop" style="min-width:200px">
                                                        <div class="hd J_drag_handle" style="cursor: move;">

                                                            <strong>勋章说明</strong>
                                                        </div>
                                                        <div class="ct J_content">
                                                            <form class="J_medal_pop_form" method="post" action="#">
                                                                <dl class="cc">
                                                                    <dt id="J_medal_pop_img">
                                                                        <img width="96" height="96" src="{{url(asset($v->image))}}">
                                                                    </dt>
                                                                    <dd>
                                                                        <p>
                                                                            <span id="J_medal_pop_name" class="name mr5">{{url(asset($v->name))}}</span>
                                                                        </p>
                                                                        <p class="type">勋章类型：自动勋章</p>
                                                                        <p id="J_medal_pop_time_row" style="">有效时长： 长期有效</p>
                                                                        <p class="descrip">勋章描述：{{$v->descrip}}</p>

                                                                    </dd>
                                                                </dl>
                                                                <div class="tac">
                                                                    <button class="btn btn_big J_close" type="button">关闭</button>
                                                                </div>
                                                                <input type="hidden" name="medalid" value="{{$v->medal_id}}">

                                                                <input type="hidden" value="8c62dbea4bd3c6f0" name="csrf_token">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <script>

                                                $('.imgs').click(function(){
                                                    var index=$(this).index('.imgs')
                                                    $('.pop_deep').eq(index).css("display","block");
                                                    //alert(1);

                                                });
                                                $('.btn').click(function(){
                                                    $(".pop_deep").css("display","none");
                                                    //alert(2);
                                                });

                                         // 点击获取勋章
                                                function store(obj,id){
                                                    var id = id;
//                                                     alert(id);
                                                    $.ajax({
                                                        url:"{{url('user/medle/add')}}/"+id,
                                                        type:'get',
                                                        dataType: 'json',
                                                        headers:{
                                                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                                        },
                                                        success: function( id ) {
                                                             console.log(id);
                                                            var sel = $('#lq'+id);
                                                            sel.css('disabled','disabled');

                                                        },
                                                        error: function () {
                                                            // AJAX执行失败

                                                            alert('积分不足');
                                                        }
                                                    });
                                                    obj.onclick = function(){};
                                                }


                                            </script>
                                        </ul>
                                    </div>

                                </div>
                            </div>




                            <!--设置排序时，样式变成 medal_show_sort -->
                            {{--<div id="J_medal_show_wrap" class="medal_show_list">--}}
                                {{--<form id="J_medal_order_form" action="__CONTROLLER__/insert?m=medal&a=doOrder" method="post">--}}
                                    {{--<div class="hd">--}}
                                        {{--<h2>已获取的勋章</h2>--}}
                                    {{--</div>--}}

                                    {{--@if(count($image) == 0)--}}

                                        {{--<div class="not_content">啊哦，您还没有申请勋章哦，赶紧去领取个吧！</div>--}}

                                    {{--@else--}}
                                        {{--<div class="ct" style="">--}}
                                            {{--<ul id="J_medal_show_list" class="cc" style="position:relative;">--}}
                                                {{--<foreach name="medalss" item="medal">--}}
                                                    {{--<li style="position:relative;z-index:1;">--}}
                                                        {{--<a data-role="show" data-id="15" class="J_medal_card" href="#">--}}
                                                            {{--<img src="#" width="96" height="96" alt="" class="imgs" />--}}
                                                            {{--<p title="{$medal['name']}">{$medal['name']}</p>--}}
                                                        {{--</a>--}}

                                                    {{--</li>--}}
                                                    {{--<div  class="pop_deep J_medel_pop" style="position:fixed;top:25%; left: 430.5px; display:none;" tabindex="0" aria-labelledby="alert_title" role="alertdialog" >--}}
                                                        {{--<div class="core_pop" style="min-width:200px">--}}
                                                            {{--<div class="hd J_drag_handle" style="cursor: move;">--}}

                                                                {{--<strong>勋章说明</strong>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="ct J_content" >--}}
                                                                {{--<form class="J_medal_pop_form" method="post" action="#">--}}
                                                                    {{--<dl class="cc">--}}
                                                                        {{--<dt id="J_medal_pop_img">--}}
                                                                            {{--<img width="96" height="96" src="#">--}}
                                                                        {{--</dt>--}}
                                                                        {{--<dd >--}}
                                                                            {{--<p>--}}
                                                                                {{--<span id="J_medal_pop_name" class="name mr5">{$name['name']}</span>--}}
                                                                            {{--</p>--}}
                                                                            {{--<p class="type">勋章类型：自动勋章</p>--}}
                                                                            {{--<p id="J_medal_pop_time_row" style="">有效时长： 长期有效</p>--}}
                                                                            {{--<p class="descrip">勋章描述： {$name['descrip']}</p>--}}

                                                                        {{--</dd>--}}
                                                                    {{--</dl>--}}
                                                                    {{--<div class="tac">--}}
                                                                        {{--<button class="btn btn_big J_close" type="button">关闭</button>--}}
                                                                    {{--</div>--}}
                                                                    {{--<input type="hidden" name="medalid" value="{$name['medal_id']}">--}}

                                                                    {{--<input type="hidden" value="7685391187d8e980" name="csrf_token">--}}
                                                                {{--</form>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</foreach>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</if>--}}
                                {{--</form>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            <script>
                $("button[name='sub']").click(function(){
                    var	t=$(this).prev().val();

                    $(this).removeClass('btu');
                    if(!$(this).hasClass("disabled")){

                        $.post('__CONTROLLER__/insert',{'medal_id':t},function(data){

                        });
                    }

                    $(this).addClass("btu disabled");

                });

                $(".imgs").click(function(){
                    //alert(1);
                    //	var index=$(this).index('.imgs')
                    //	$('.imgs').eq(index).appendTo("#J_medal_show_list");

                });
                //<script type="text/javascript">
                //function(){
                //移到右边
                //$('#add').click(function() {
                //获取选中的选项，删除并追加给对方
                $('#select1 option:selected').appendTo('#select2');
                //});
            </script>

        </div>
    </div>
    <!--.main-wrap,#main End-->
    @show
@endsection
