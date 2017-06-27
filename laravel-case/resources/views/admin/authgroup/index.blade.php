@extends('admin.public.layout')

@section('main-content')

    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="__APP__">后台主页</a>
                </li>

                <li>
                    <a href="#">用户管理</a>
                </li>
                <li class="active">用户列表</li>
            </ul><!-- .breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
									<button class="btn btn-xs btn-info">搜索</button>
								</span>
                </form>
            </div><!-- #nav-search -->
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    管理组管理
                    <small>
                        <i class="icon-double-angle-right"></i>
                        管理组列表
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="center">
                                            <label>
                                                <input type="checkbox" class="ace" />
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>管理组ID</th>
                                        <th>管理组名</th>
                                        <th>状态</th>
                                        <th>规则</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($auth_group as $v)
                                        <tr>
                                            <td class="center">
                                                <label>
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>{{$v->id}}</td>
                                            <td>{{$v->title}}</td>
                                            <td>{{$v->status}}</td>
                                            <td>{{$v->rules}}</td>
                                            <td>
                                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">

                                                    <a href="/admin/authgroup/show/{{$v->id}}" class="btn btn-xs btn-info">
                                                        <i class="icon-edit bigger-120"></i>
                                                    </a>

                                                    <a  class="btn btn-xs btn-danger del" data-id="{{$v->id}}" data-name="{{$v->title}}">
                                                        <i class="icon-trash bigger-120"></i>
                                                    </a>

                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div><!-- /.table-responsive -->
                        </div><!-- /span -->
                    </div><!-- /row -->

                    <div class="hr hr-18 dotted hr-double"></div>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->
    <script src="{{asset('/js/admin/jquery-1.8.3.min.js') }}"></script>

    <script>
        $(function(){
            // 触发用户删除
            $('.del').click(function () {
                var id = $(this).attr('data-id');
                var title = $(this).attr('data-name');
//                console(id);
                if (confirm("您确定要删除用户[" +title+ "]吗?")) {
                    var obj = $(this).parents('tr');
                    delAjax(id, obj);// 执行删除操作
                }
            })
        })

            function delAjax(id, obj) {
                $.ajax({
                    type: 'get',
                    url: "{{url('/admin/authgroup/delete')}}/" + id,
                    dateType: 'json', // 处理返回的响应值为JSON
                    success: function (data) {
                        console.log(data);
                        if (data) {
                            obj.remove();
                        } else {
                            alert(data.info);
                        }
                    },
                    error: function () {
                        // AJAX执行失败
                        alert('ajax操作失败');
                    }
                });
            }



    </script>

    @if(!empty(session('error')))
        <script>
            alert('{{session('error')}}');
        </script>
    @endif

@endsection
