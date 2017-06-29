<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello world!</title>
    <!-- zui -->
    <link href="{{asset('css/zui.sexy/zui.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/home/Post-details&blog-plate.css') }}" rel="stylesheet">
    <link href="{{asset('fonts/iconfont/iconfont.css')}}" rel="stylesheet" >


</head>
<body>
        {{--{{var_dump($result)}}--}}
    <div class="container-fluid" style="position: relative;">

        <div class="blog-top  clearfix">

            <img style="margin:10px 0 0 20px" src="{{asset('img/login-img/carhome-login-logo.jpg')}}" width="150" alt="">

            <span style="float:right;margin:20px 70px 0 0"><span>游客</span><span> | 新消息</span></span>

        </div> {{--end blog-top--}}

        <div class="plate-top">

                {{--<img src="{{asset('img/rest-img/sampleimg.jpg')}}" alt="">--}}
{{--{{$request->fid}}--}}
                <p style="color: red;font-size: 50px;">{{$forum[0]->name}}版块</p>
               <div class="plate-top-div">
                   {{--<p>{{$platename}}</p>--}}
                   <p><span>版主:</span>
                       <span><a href="">申请版主</a></span>
                       <span><a href="">投诉版主</a></span></p>

               </div>

             <a href=""><button style="position: absolute;
                                       right:30px;
                                       top:60px;"
                                class="btn btn-danger ">收藏板块</button></a>




        </div> {{--end plate-top--}}

{{--{{$request->fid}}--}}

        <div class="plate-center">

            <div class="plate-center-top clearfix">
                <ul class="plate-center-top-ul" style="display: inline">
                    <li><a href=""><button class="btn ">精品板块1</button></a></li>
                    <li><a href=""><button class="btn ">精品板块2</button></a></li>
                    <li><a href=""><button class="btn ">精品板块3</button></a></li>
                    <li><a href=""><button class="btn ">精品板块4</button></a></li>
                </ul>

                <a href="{{url('home/'.$forum[0]->fid).'/posting'}}"><button class="btn btn-warning "
                                   style="float: right;
                                   margin-top: 10px;
                                   margin-right: 10px;">发新帖</button></a>
            </div>

            <div class="plate-center-up" >
                <p style="color: red;font-size: 35px;">热贴</p>
            </div>

            <div class="plate-center-top-recommend clearfix">

                 <ul class="clearfix" >
                         @if (!empty($result[0]))
                             @foreach( $result as $k => $v )
                             @if ($v->top === 1)
                             <li class="iconfont" style="border-bottom: 1px solid #ccc;
                                                 box-shadow: 5px 5px 5px #ccc;
                                                height: 40px;line-height: 40px;"><span>&#xe602;</span><a href=""><span> | {{$v->title}}</span></a><a
                                         href=""><span> | {{$v->tauthor}}</span></a><span> |发帖时间 {{$v->tdateline}}</span><span> |回复数： {{$v->renumber}}</span><span> |点击量： {{$v->clicknumber}}</span><b style="color: red;"> 置顶</b></li>
                             @else
                                 本版块暂无置顶贴 @break
                             @endif
                             @endforeach
                         @else
                             本版块暂无置顶贴
                         @endif

                             @if (!empty($result[0]))
                                 @foreach( $result as $k => $v )
                                     @if ($v->best === 1)
                                 <li class="iconfont" style="border-bottom: 1px solid #ccc;
                                                 box-shadow: 5px 5px 5px #ccc;
                                                height: 40px;line-height: 40px;"><span>&#xe602;</span><a href=""><span> | {{$v->title}}</span></a><a
                                         href=""><span> | {{$v->tauthor}}</span></a><span> |发帖时间 {{$v->tdateline}}</span><span> |回复数： {{$v->renumber}}</span><span> |点击量： {{$v->clicknumber}}</span><b style="color: red;"> 精</b></li>
                                     @else
                                         本版块暂无精品贴 @break
                                     @endif
                                 @endforeach
                             @else
                                 本版块暂无精品贴
                             @endif
                 </ul>
            </div>

            <div class="plate-center-list">
                <p style="display: inline-block;margin-left: 10px;margin-top: 10px;"> <span><p style="color: red;font-size: 35px;">帖子列表</p></span>
                    {{--<span><a href="" class="btn btn-primary">论坛精华贴</a></span> </p>--}}


            </div>
            <div class="plate-center-list-list">

                <ul>
                        @if (!empty($result[0]))
                        @foreach( $result as $k => $v )
                        <li class="iconfont" style="border-bottom: 1px solid #ccc;
                                                 box-shadow: 5px 5px 5px #ccc;
                                                height: 40px;line-height: 40px;"><span>&#xe602;</span><a href="{{url('/home/post/'.$v->tid)}}"><span> | {{$v->title}}</span></a><a
                                    href=""><span> | {{$v->tauthor}}</span></a><span> |发帖时间 {{$v->tdateline}}</span><span> |回复数： {{$v->renumber}}</span><span> |点击量： {{$v->clicknumber}}</span></li>
                        @endforeach
                    @else
                                本版块暂无帖子
                            @endif
                </ul>

            </div>
        </div>

        <div class="plate-footer">
            <p style="text-align: center;line-height: 60px">Copyright © 2004-2017 www.carhome.com All Rights Reserved. carhome 版权所有</p>
        </div>

    </div>




<!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- ZUI Javascript组件 -->
<script src="{{asset('js/zui.sexy/zui.min.js')}}"></script>
</body>
<