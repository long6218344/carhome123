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
                    <a href="#">积分规则管理</a>
                </li>
                <li class="active">规则列表</li>
            </ul><!-- .breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search" action="__CONTROLLER__/index" method="post">

								<span class="input-icon">

									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" name='name'/>
									<i class="icon-search nav-search-icon"></i>
									<button class="btn btn-xs btn-info">搜索</button>
								</span>
                </form>
            </div><!-- #nav-search -->
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    规则管理
                    <small>
                        <i class="icon-double-angle-right"></i>
                        规则列表
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
                                        <th>顺序</th>
                                        <th class="hidden-480">名称</th>

                                        <th>
                                            数值
                                        </th>


                                        <th>操作</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($list as $v)
                                        <tr>
                                            <td class="center">
                                                <label>
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>
                                                {{$v->typeid}}
                                            </td>
                                            <td>{{$v->name}}</td>
                                            <td class="hidden-480">
                                                {{$v->value}}</td>


                                            <td>
                                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">

                                                    <a href="/admin/point/mod/{{$v->typeid}}" class="btn btn-xs btn-info">
                                                        <i class="icon-edit bigger-120"></i>
                                                    </a>

                                                    <button   class="btn btn-xs btn-danger del"  data-id="{{$v->typeid}}" data-name="{{$v->name}}">
                                                        <i class="icon-trash bigger-120 " ></i>
                                                    </button>

                                                </div>

                                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                    <div class="inline position-relative">
                                                        <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-cog icon-only bigger-110"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                            <li>
                                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
				<span class="blue">
					<i class="icon-zoom-in bigger-120"></i>
				</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
				<span class="green">
					<i class="icon-edit bigger-120"></i>
				</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
				<span class="red">
					<i class="icon-trash bigger-120"></i>
				</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach
                                    <tr>

                                        <td class="hidden-480" colspan='9'>{{$list->links()}}</td>

                                    </tr>
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
            $('.del').click(function () {
                var uid = $(this).attr('data-id');
                var username = $(this).attr('data-name');
//                console(id);
                if (confirm("您确定要删除规则[" +username+ "]吗?")) {
                    var obj = $(this).parents('tr');
                    delAjax(uid, obj);// 执行删除操作
                }
            })
        })

        // 执行AJAX删除的操作
        function delAjax(uid, obj) {
            $.ajax({
                type: 'get',
                url: "{{url('/admin/point/delete')}}/" + uid,
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
@endsection
@section('js')
    <script>
    </script>
@endsection