@extends('admin.public.layout')

@section('main-content')
    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="#">后台主页</a>
                </li>

                <li>
                    <a href="#">用户管理</a>
                </li>
                <li class="active">用户列表</li>
            </ul><!-- .breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input"
                                           id="nav-search-input" autocomplete="off"/>
									<i class="icon-search nav-search-icon"></i>
									<button class="btn btn-xs btn-info">搜索</button>
								</span>
                </form>
            </div><!-- #nav-search -->
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    用户管理
                    <small>
                        <i class="icon-double-angle-right"></i>
                        用户列表
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
                                                <input type="checkbox" class="ace"/>
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>ID</th>
                                        <th>用户名</th>
                                        <th>邮箱</th>
                                        <th>手机</th>
                                        <th>生日</th>
                                        <th class="hidden-480">用户组</th>
                                        <th class="hidden-480">性别</th>
                                        <th>状态</th>
                                        <th class="hidden-480">积分</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($user as $v)
                                        <tr>
                                            <td class="center">
                                                <label>
                                                    <input type="checkbox" class="ace"/>
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>{{ $v->uid }}</td>
                                            <td>
                                                <a href="#">{{$v->username}}</a>
                                            </td>
                                            {{--<td>{{$v->name}}</td>--}}
                                            <td>{{$v->email}}</td>
                                            <td>{{$v->phone}}</td>
                                            <td>{{$v->birthday}}</td>
                                            {{--<td>{{$user['birthday']|date="Y-m-d",###}}</td>--}}
                                            <td class="hidden-480">{{$v->grouppower}}</td>
                                            <td class="hidden-480">
															<span class="label label-sm label-warning">
                                            {{$v->sex == '1' ? '男' : '女'}}
															</span>
                                            </td>
                                            <td><center><a  class="btn {{$v->status==1? 'btn-primary':'btn-danger' }} btn-sm si" status ='{{$v->status}}' data-name="{{$v->username}}" data-id="{{$v->uid}}">{{($v->status==1)?'在线':'离线'}}
                                                </a></center></td>
                                            <td>{{$v->credits}}</td>
                                            {{--<td></td>--}}
                                            {{--<td>--}}
                                            {{--<a href="#"></a>--}}
                                            {{--</td>--}}
                                            {{--<td></td>--}}
                                            {{--<td></td>--}}
                                            {{--<td></td>--}}
                                            {{--<td></td>--}}
                                            {{--<td class="hidden-480"></td>--}}
                                            {{--<td class="hidden-480">--}}
                                            {{--<span class="label label-sm label-warning">--}}

                                            {{--</span>--}}
                                            {{--</td>--}}
                                            {{--<td></td>--}}
                                            {{--<td></td>--}}


                                            <td>
                                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">

                                                    <a href="/admin/update/{{$v->uid}}" class="btn btn-xs btn-info">
                                                        <i class="icon-edit bigger-120"></i>
                                                    </a>

                                                    <button   class="btn btn-xs btn-danger del"  data-id="{{$v->uid}}" data-name="{{$v->username}}">
                                                        <i class="icon-trash bigger-120 " ></i>
                                                    </button>
                                                    <a href="{{url('/admin/user/repwd')}}/{{$v->uid}}" class="btn btn-xs btn-success">
																	<span class="blue">
																		<i class="icon-zoom-in bigger-120"></i>
																	</span>
                                                    </a>
                                                    <a href="{{url('/admin/user/group/')}}/{{$v->uid}}" class="btn btn-xs btn-success">
																	<span class="yellow">
																		<i class="icon-flag bigger-120"></i>
																	</span>
                                                    </a>
                                                </div>

                                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                    <div class="inline position-relative">
                                                        <button class="btn btn-minier btn-primary dropdown-toggle"
                                                                data-toggle="dropdown">
                                                            <i class="icon-cog icon-only bigger-110"></i>
                                                        </button>

                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                            <li>
                                                                <a href="#" class="tooltip-info" data-rel="tooltip"
                                                                   title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-success" data-rel="tooltip"
                                                                   title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#" class="tooltip-error" data-rel="tooltip"
                                                                   title="Delete">
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
                                        <td class="hidden-480" colspan='12'>{{ $user->links() }}</td>

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

    {{--href="/admin/delete/{{$v->uid}}"--}}
    <script src="{{asset('/js/admin/jquery-1.8.3.min.js') }}"></script>

    <script>
        $(function () {
            // 触发用户删除
            $('.del').click(function () {
                var uid = $(this).attr('data-id');
                var username = $(this).attr('data-name');
//                console(id);
                if (confirm("您确定要删除用户[" +username+ "]吗?")) {
                    var obj = $(this).parents('tr');
                    delAjax(uid, obj);// 执行删除操作
                }
            })
            // 改变状态
            $('.si').click(function () {
                var uid = $(this).attr('data-id');
                var stu = $(this).attr('status');
                var name = $(this).attr('data-name');
                var obj = $(this);
                if (confirm("您确定要改变用户[" +name+ "]的状态吗?")) {
                    status(stu,uid,obj);
                }
            });

        });
        // 执行AJAX删除的操作
        function delAjax(uid, obj) {
            $.ajax({
                type: 'get',
                url: "{{url('/admin/delete')}}/" + uid,
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

        function status(stu,uid,obj) {

            $.ajax({
                type: 'get',
                url: "{{url('/admin/user/status')}}/"+ uid,
                dateType: 'json', // 处理返回的响应值为JSON
                data: 'status='+stu,
                success: function (data) {
                    console.log(data);
                        if(data == 1){
                            obj.attr('status',data);
                            obj.attr('class','btn btn-primary btn-sm si');
                            obj.html('在线');
                        }else{
                            obj.attr('class','btn btn-danger btn-sm si');
                            obj.attr('status',data);
                            obj.html('离线');
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
