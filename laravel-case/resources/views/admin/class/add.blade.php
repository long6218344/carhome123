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


                    <form action="{{url('/admin/classify/add')}}" method="post">
                        {{ csrf_field() }}


                     @foreach($list as $v)




                        <?php $pid = empty($v->id) ? 0 : $v->id;
                              $path = empty($v->path) ? '0,' : $v->path.$pid.',';


                            ?>

                            <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control"  name="name" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Pid</label>

                            <input class="form-control" type="text" name="pid"  value="{{$pid}}" readonly>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Path</label>
                            <input class="form-control" type="text" name="path" value="{{$path}}" readonly>
                        </div>
                            <input type="hidden" name="id" value="{{$v->id}}">


                        <br>

                        <button style="margin-left: 900px;margin-top: 30px;" type="submit" class="btn btn-primary btn-lg">Submit</button>

                      @endforeach

                    </form>



                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection




