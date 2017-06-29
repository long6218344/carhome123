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

                    <a href="{{url('/admin/photo')}}"><button class="btn btn-success">返回列表</button></a>
                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">

                        @foreach($list as $v)
                        <form action="{{url('/admin/photo/edit')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="exampleInputEmail1">图片名称</label>
                                    <input type="text" class="form-control"  name="name" value="{{$v->name}}" maxlength="7" onkeyup="ck(this)" required>
                                    <span>还可以输入</span> <span id="span" style="color: red;font-size: 25px ;">7</span><span>字</span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">图片详情</label>
                                    <input type="text" class="form-control"  name="details" value="{{$v->details}}" required>

                                </div>

                            <div class="form-group">
                                <p>分类: <select name="class">
                                        @foreach($list2 as $v)
                                            <option value="{{$v->id}}"> {{$v->name}} </option>
                                        @endforeach
                                    </select></p>

                            </div>

                                <input type="hidden" value="{{$id}}" name="cid">
                            <br>

                        <button style="margin-left: 900px;margin-top: 30px;" type="submit" class="btn btn-primary btn-lg">Submit</button>

                    </form>
                    @endforeach




                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

    <script>

        // 检测输入字数
        var span = document.getElementById('span');
        num = 7; // 限制总数
        function ck(obj){
            // console.log(obj.value.length);
            var n = obj.value;// 输入字符串内容
            var lengths = num - n.length;// 剩余长度
            span.innerHTML =lengths;//输出显示字数
        }
    </script>

@endsection




