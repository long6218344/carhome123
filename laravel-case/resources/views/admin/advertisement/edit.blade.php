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


                <li class="active">编辑广告</li>
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

                    <form action="{{url('/admin/adver/edit')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @foreach($list as $v)



                                <div class="form-group">
                                    <label for="exampleInputEmail1">广告名称</label>
                                    <input type="text" class="form-control"  name="name" value="{{$v->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">有效时间</label>
                                    <input class="form-control" type="text" name="time" value="{{$v->time}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">广告内容</label>
                                    <input class="form-control" type="text" name="details" value="{{$v->details}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">广告图片</label>
                                    <input class="form-control" type="file" name="picture" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">广告连接</label>
                                    <input class="form-control" type="text" name="url" value="{{$v->url}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">广告类型</label>

                                    <label class="checkbox-inline">
                                        <input type="radio" name="adclass" value="0" {{$v->adclass == 0?'checked':''}}>图片广告
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" name="adclass" value="1" {{$v->adclass == 1?'checked':''}}>图文广告
                                    </label>

                                </div>





                                <input type="hidden" value="{{$v->id}}" name="id">
                            <br>
                        @endforeach
                        <button style="margin-left: 900px;margin-top: 30px;" type="submit" class="btn btn-primary btn-lg">Submit</button>


                    </form>




                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection




