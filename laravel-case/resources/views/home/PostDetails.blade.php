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

            <img style="margin:10px 0 0 20px" src="{{asset('img/login-img/carhome-login-logo.jpg')}}" width="150" alt="">

            <span style="float:right;margin:20px 70px 0 0"><span>游客</span><span> | 新消息</span></span>

        </div> {{--end blog-top--}}


        <div class="blog-top-ad">
            <p>广告</p>
        </div>

        <div class="blog-center clearfix">


            <div class="blog-center-top clearfix">
                <a href="" > <button style="margin-top:10px;margin-left:20px" class="btn btn-default">返回帖子列表</button> </a>

                <div class="blog-center-top-right">
                    {{--<a href=""><button class="btn btn-warning">发帖</button></a>--}}
                    <a href="/home/details#reply"><button class="btn btn-primary">快速回复</button></a>
                </div>


            </div>

            <hr>



            <div class="blog-center clearfix">


                {{--<div class="blog-center-top clearfix">--}}
                    {{--<a href="" > <button style="margin-top:10px;margin-left:20px" class="btn btn-default">返回帖子列表</button> </a>--}}

                    {{--<div class="blog-center-top-right">--}}
                        {{--<a href=""><button class="btn btn-warning">发帖</button></a>--}}
                        {{--<a href="/home/details#reply"><button class="btn btn-primary">快速回复</button></a>--}}
                    {{--</div>--}}


                {{--</div>--}}

                <hr>
{{--//帖子--}}
                {{--<h2>{{$v->title}}</h2>--}}
                {{--{{$post}}--}}
                <div class="blog-details clearfix">

                    <div class="blog-user">
                        <br>

                        <ul>
                            <li>{{$post[0]->pauthor}}</li>
                            <p>{{$post[0]->pdateline}}</p>
                            <li><a href="">加关注</a>
                                <a href="{{url('/home/message-write/1/'.$post[0]->pauthorid)}}">发私信</a></li>
                            <li>来自:{{$post[0]->pauthorip}}</li>
                            <li>回帖:<p>{{$post[0]->renumber}}</p></li>

                        </ul>
                    </div>
                    <div class="blog-details-details">
                        <p>{{$post[0]->title}}</p>


                        {{$post[0]->pmessage}}
                    </div>


                </div>

                <div style="float:right;margin:0 10px 10px 0">
                    <a href=""><button class="btn btn-success">点赞</button></a>
                    <a href=""><button class="btn btn-danger">收藏</button></a>
                </div>

            </div>
    @foreach( $reply as $k => $v )
            <div class="blog-center clearfix">


            <div class="blog-center-top clearfix">
                <a href="" > <button style="margin-top:10px;margin-left:20px" class="btn btn-default">返回帖子列表</button> </a>

                <div class="blog-center-top-right">
                    <a href=""><button class="btn btn-warning">发帖</button></a>
                    <a href="/home/details#reply"><button class="btn btn-primary">快速回复</button></a>
                </div>


            </div>

            <hr>

            {{--<h2>{{$v->title}}</h2>--}}
            <div class="blog-details clearfix">

                <div class="blog-user">
                    <br>

                    <ul>
                        <li>{{$v->rauthor}}</li>
                        <p>{{$v->rdateline}}</p>
                        <li><a href="">加关注</a>
                            <a href="{{url('/home/message-write/1/'.$post[0]->pauthorid)}}">发私信</a></li>
                        <li>来自:{{$v->rauthorip}}</li>
                        {{--<li>回帖:<p>{{$v->renumber}}</p></li>--}}

                    </ul>
                </div>
                <div class="blog-details-details">
                    {{--<p>{{$v->title}}</p>--}}


                    {{$v->rmessage}}
                </div>


            </div>

            <div style="float:right;margin:0 10px 10px 0">
                <a href=""><button class="btn btn-success">点赞</button></a>
                <a href=""><button class="btn btn-danger">收藏</button></a>
            </div>

        </div> end blog-center
        @endforeach


        <div class="blog-user-reply">
            <a href="" name="reply"></a>
            <p style="font-size: 25px;margin-left: 10px">撰写回复</p>
            <form action="{{url('home/post/submit')}}" method="post" class="clearfix " style="margin-left: 10px;width: 70%">
                {{ csrf_field() }}
                <input type="hidden" value="{{$post[0]->tid}}" name="tid">
                <input type="hidden" value="{{$post[0]->fid}}" name="fid">
                <input type="hidden" value="{{$post[0]->pid}}" name="pid">
                <textarea class="form-control" rows="5" name="content"></textarea>
                <button type="submit" class="btn btn-lg btn-info"
                style="width: 150px;margin-left: 10px; float: right; margin-top: 10px;margin-bottom: 20px">推送</button>
            </form>

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