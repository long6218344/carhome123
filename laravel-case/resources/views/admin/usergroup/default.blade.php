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
                    <a href="#">权限管理</a>
                </li>
                <li class="active">权限列表</li>
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
            <div class="page-header">
                <h1>
                    用户组权限
                    <small>
                        <i class="icon-double-angle-right"></i>
                        默认组权限
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

                                        <th>编号</th>
                                        <th>头衔</th>
                                        <th class="hidden-480">用户组图标</th>

                                        <th>
                                            升级点数
                                        </th>

                                        <th>操作</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($default as $v )
                                        <tr>

                                            <td>
                                                {{$v->gid}}
                                            </td>
                                            <td>{{$v->groupname}}</td>
                                            <td class="hidden-480"><img height="18px"  src="{{url(asset($v->groupicon))}}"/></td>
                                            <td>{{$v->points}}</td>

                                            <td>
                                                <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">

                                                    <a href="/admin/powergroup/show/{{$v->gid}}" class="btn btn-xs btn-info">
                                                        <i class="icon-edit bigger-120"></i>
                                                    </a>

                                                    <a href="/admin/powergroupdelete/{{$v->gid}}" class="btn btn-xs btn-danger"  onclick="return confirm('你确定要删除么？')">
                                                        <i class="icon-trash bigger-120"></i>
                                                    </a>


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
    {{--@if(!empty(session('error')))--}}
        {{--<script>--}}
            {{--alert('{{session('error')}}');--}}
        {{--</script>--}}
    {{--@endif--}}
@endsection
