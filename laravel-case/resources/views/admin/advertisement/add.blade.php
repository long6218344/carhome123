@extends('admin.public.layout')
@section('plugin')
    <script src="{{asset('/js/admin/jquery.js')}}"></script>
    <style type="text/css">
        .demo{width:300px; margin-left:260px; }
        .demo p{line-height:42px; font-size:16px}
    </style>
@endsection

@section('main-content')
    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="#">广告管理</a>
                </li>


                <li class="active">添加广告</li>
            </ul><!-- .breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                                <span class="input-icon">
                                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                                    <i class="icon-search nav-search-icon"></i>
                                </span>
                </form>
            </div><!-- #nav-search -->
        </div>

        <div class="page-content">

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <a href="{{url('/admin/adver')}}"><button class="btn btn-success">返回列表</button></a>
                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">

                    <form action="{{url('/admin/adver/add')}}" method="post" enctype="multipart/form-data" >
                        {{ csrf_field() }}



                        <div class="form-group">
                            <label for="exampleInputEmail1">广告名称</label>
                            <input type="text" class="form-control"  name="name" id="inp" required>
                            <span id="span"></span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">广告到期合同时间</label>
                            <input class="form-control" type="date" name="time"  required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">广告内容</label>
                            <input class="form-control" type="text" name="details"  required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">广告连接</label>
                            <input type="text" class="form-control"  name="url" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">广告类型</label>

                            <label class="checkbox-inline">
                                <input type="radio" name="adclass" value="0" required>图片广告
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" name="adclass" value="1" required>图文广告
                            </label>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">广告图片</label>
                            <input class="form-control" type="file" name="picture" required >
                        </div>



                            <br>

                            <button style="margin-left: 900px;margin-top: 30px;" type="submit" class="btn btn-primary btn-lg">Submit</button>


                            </form>


                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->



    <script src="{{asset('/js/home/jquery-1.8.3.min.js')}}"></script>

    <script>


        var inp = document.getElementById('inp');

        inp.onblur = function(){

            var input = document.getElementById('inp').value;



            $.ajax({

                    type: 'get',
                    url: '{{url('/admin/adver/addshow/check')}}/'+input,
                    success: function(data)
                    {
                        if(data == 2)
                        {

                            var span = document.getElementById('span');
                            span.style.color = 'red';
                            span.innerHTML = '该名称已存在 请更换'



                        }
                        else if(data == 1)
                        {
                            var span = document.getElementById('span');
                            span.style.color = 'green';
                            span.innerHTML = '该名称可以使用'
                        }

                    }

                  })


        }




        </script>

@endsection




