<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title></title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="{{ asset('css/home/Post-details&blog-plate.css') }}" rel="stylesheet">

</head>
<body>

    <div class="container-fluid ">

        <div class="blog-top  clearfix">

{{--            <img style="margin:10px 0 0 20px" src="{{asset('img/login-img/carhome-login-logo.jpg')}}" width="150" alt="">--}}
            <p style="color: red;font-size: 50px;">{{$forum[0]->name}}版块</p>
            <span style="float:right;margin:20px 70px 0 0"><span>游客</span><span> | 新消息</span></span>

        </div> {{--end blog-top--}}


        <div class="blog-top-ad">
            <p>广告</p>
        </div>

            <div class="blog-center clearfix">


            <div class="blog-center-top clearfix">
                <a href="" > <button style="margin-top:10px;margin-left:20px" class="btn btn-default">返回帖子列表</button> </a>

                <div class="blog-center-top-right">
                </div>


            </div>

            <hr>


        <div class="blog-user-reply">
            {{--<a href="" name="reply"></a>--}}
            <p style="font-size: 25px;margin-left: 10px">标题</p>
            <form action="{{url('home/posting/submit')}}" method="post" class="clearfix " style="margin-left: 10px;width: 70%">
                {{ csrf_field() }}
                {{--{{var_dump(url('home/posting/submit'))}}--}}
                <input type="text" class="form-control" name="title" >内容
                <textarea class="form-control" rows="5" name="content"></textarea>
                <input type="hidden" value="{{$forum[0]->fid}}" name="fid">
                <button class="btn btn-lg btn-info" type="submit"
                style="width: 150px;margin-left: 10px; float: right; margin-top: 10px;margin-bottom: 20px">发帖</button>
            </form>
            {{--{{$result[0]->fid}}--}}
        </div>


        <div class="blog-footer">
            <p style="text-align: center;line-height: 60px">Copyright © 2004-2017 www.carhome.com All Rights Reserved. carhome 版权所有</p>
        </div> {{--end blog-footer--}}
    </div>



        <button onclick="gotoTop()" class="btn btn-primary btn-lg active" style="position:fixed;right: 20px;top:800px;"
        >返回顶部</button>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>



    <script>
        //实现缓慢回滚效果
        function gotoTop(){
            var top = document.body.scrollTop || document.documentElement.scrollTop;
            // console.log(top);
            // alert(top);
            window.scrollBy(0 , -100);
            if (top <= 0) {
                return;
            }
            setTimeout(gotoTop, 20);
        }

    </script>
</body>
</html>