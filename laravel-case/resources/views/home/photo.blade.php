@extends('/home.public.layout')
@section('imcss')
    <style>
        .pagination li{float:left;}
    </style>
@endsection
@section('main-content')

<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beautiful picture!</title>
    <!-- zui -->
    <link href="{{asset('/css/zui.sexy/zui.min.css')}}" rel="stylesheet">
</head>
<body>



    <div class="container" >

        <nav class="navbar" role="navigation">
            <div class="container-fluid">
                <!-- 导航头部 -->
                <div class="navbar-header">

                    <!-- 品牌名称或logo -->
                    <a class="navbar-brand" href="">CarHome123</a>
                </div>
                <!-- 导航项目 -->
                <div   class="collapse navbar-collapse navbar-collapse-example">
                    <!-- 一般导航项目 -->
                    <ul class="nav navbar-nav">
                        @foreach($list2 as $v)
                        <li class="active"><a href="{{url('/home/photo/'.$v->id)}}">{{$v->name}}</a></li>
                        @endforeach


                    </ul>
                </div><!-- END .navbar-collapse -->
            </div>
        </nav>




        @foreach($list1 as $v)

            <div class="col-md-4 col-sm-6 col-lg-3">
                <a class="card" href="{{asset($v->picture)}}">
                    <img src="{{asset($v->picture)}}" alt="">
                    <div class="caption">{{$v->uptime}}</div>
                    <div class="card-heading"><strong>{{$v->name}}</strong></div>
                    <div class="card-content text-muted">{{$v->details}}</div>
                </a>
            </div>

        @endforeach

    </div>

<!-- jQuery (ZUI中的Javascript组件依赖于jQuery) -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- ZUI Javascript组件 -->
<script src="{{asset('/js/zui.js/zui.sexy/zui.min.js')}}"></script>

    <script>



    </script>

</body>
</html>

@endsection