@extends('admin/public/layout')
@section('content')
    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">

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
                                        <th>FID</th>
                                        <th>版块名</th>
                                        <th>版块状态</th>
                                        <th>帖子总数</th>
                                        <th>精品帖数</th>
                                        <th>今日帖子数</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>


                                    @foreach( $result as $k => $v )
                                        <tr>
                                            <td class="center">
                                                <label>
                                                    <input type="checkbox" class="ace"/>
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>


                                            <td>{{$v->fid}}</td>
                                            <td>{{$v->name}}</td>
                                            <td>@if (($v->fstatus) === 1)
                                                    <a href="{{url('/admin/forum/edit')}}/{{$v->fid}}/2">开放</a>
                                                @else
                                                    <a href="{{url('/admin/forum/edit')}}/{{$v->fid}}/1">停用</a>
                                                @endif
                                            </td>
                                            <td>{{$v->posts}}</td>
                                            <td>{{$v->boutique}}</td>
                                            <td>{{$v->todayposts}}</td>
                                            <td><a href="{{url('/admin/forum/delete')}}/{{$v->fid}}">删</a>&nbsp;&nbsp;</td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td class="hidden-480" colspan='12'>1</td>

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

@endsection