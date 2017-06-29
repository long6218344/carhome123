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
                    <a href="#">用户管理</a>
                </li>


                <li class="active">添加用户</li>
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


                    <form action="{{url('/admin/classify/edit')}}" method="post">
                        {{ csrf_field() }}

                        @foreach($list as $v)

                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control"  name="name" value="{{$v->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Pid</label>
                                <input class="form-control" type="text" name="pid" value="{{$v->pid}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Path</label>
                                <input class="form-control" type="text" name="path" value="{{$v->path}}" readonly>
                            </div>


                            <label class="checkbox-inline">
                                <input type="radio" name="display" value="0" {{$v->display==0?'checked':''}}>显示
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" name="display" value="1" {{$v->display==1?'checked':''}}>隐藏
                            </label>
                            <input type="hidden" value="{{$id}}" name="id">
                            <br>
                        @endforeach
                        <button style="margin-left: 900px;margin-top: 30px;" type="submit" class="btn btn-primary btn-lg">Submit</button>


                    </form>




                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection




