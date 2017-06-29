
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE =edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{asset('js/app.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="{{asset('css/home/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/home/user_index.css')}}">
    
    <title>carhome</title>
    <style>

    </style>
</head>
<body>

<!-- 此页为模板 -->
<div class="content">
    <div id="subContainer">

    @section('content')
    <!-- 左侧栏显示 -->

        <div class="leftside">
            <div class="left index-left" id="left">
                <div class="userHead" id="userHead">
                    @if($icon == null)
                    <a href=""><img src="{{asset('image/home/head_120X120.gif')}}" alt=""></a>
                    @else
                   <a href=""><img src="{{asset($icon)}}" alt="" width="120"></a>
                    @endif
                    <p class="uh_edit"  id="upHead">
                        <a href="{{url('user/icon')}}">修改头像</a>
                    </p>
                </div>

                <p class="nickname">
                    <a href="{{url('user/index')}}">我的首页</a></p>
                <div class="divide dividePos" id="menuSideList">
                </div>

                <div class="menuBox" id="menuBox">
                    <h4>消息</h4>
                    <ul class="item">
                        <li class=""><a class="ico_xx01" href="{{url('/home/message-write/2/'.session('id'))}}">私信</a></li>
                        <li class=""><a class="ico_xx02" href="#">评论</a></li>
                        <li class=""><a class="ico_xx03" href="#">系统通知</a></li>
                        <li class=""><a class="ico_xx04" href="#">订单</a></li>
                        <li class=""><a class="ico_xx05" href="{{url('user/friend')}}">好友</a></li>
                    </ul>
                    <div class="divide">
                    </div>
                    <h4>
                        论坛</h4>
                    <ul class="item">
                        <li class=""><a class="ico_lt01" href="{{url('user/myword')}}">
                                我的主帖</a></li>
                        <li class=""><a class="ico_lt02" href="">收到回复</a></li>
                        <li class=""><a class="ico_lt03" href="">
                                发出回复</a></li>
                        <li class=""><a class="ico_lt04" href="">
                                我的活动</a></li>
                    </ul>
                    <div class="divide">
                    </div>
                    <h4>
                        应用</h4>
                    <ul class="item">
                        <li class=""><a href="#" class="ico_yy20">任务中心</a></li>
                        <li class=""><a class="ico_yy15" href="{{url('user/newsfeed')}}">好友动态</a> </li>
                        <li class=""><a class="ico_yy12" href="#">车主价格</a></li>

                        <li class=""><a class="ico_yy08" href="#">我的问答</a></li>
                        <li class=""><a class="ico_yy01" href="#">口碑</a></li>
                        <li class="" style="z-index: 200;">
                            <a class="ico_yy03" href="#">
                                收藏</a>
                        </li>
                        <li class=""><a class="ico_yy06" href="#">上传车型图</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @show
    
        <!--右侧继承空出-->
        <div id="rightContainer">
         @yield('block')
            
        </div>
     

    </div>
</div>


</body>
</html>