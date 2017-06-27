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
                    <a href="#">首页</a>
                </li>

                <li>
                    <a href="#">用户管理</a>
                </li>
                <li class="active">用户信息修改</li>
            </ul><!-- .breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input"
                                           id="nav-search-input" autocomplete="off"/>
									<i class="icon-search nav-search-icon"></i>
								</span>
                </form>
            </div><!-- #nav-search -->
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    <a href="/admin/index">返回用户列表</a>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="/amdin/user/updategroup" class="form-horizontal" id="regform" method="post" role="form">
                        {{csrf_field()}}
                        <input type="hidden" name="uid" value="{{$uid}}"/>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户名 </label>
                            <div class="col-sm-9">
                                <input type="text" id="name" readonly placeholder="请输入用户名"
                                       value="{{$username->username}}"
                                       class="col-xs-10 col-sm-3"/>
                                <span class="help-inline col-xs-12 col-sm-7">
                                    <span id="yzname" class="middle"></span>
											</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right"
                                   for="form-field-1">你当前的用户组</label>
                            @if(empty($user))
                            @else
                                @foreach( $user as $v)
                                <label class="col-sm-3 control-label no-padding-right"
                                       for="form-field-1"> </label>
                                <div class="col-sm-9">
                                    <p><input type="checkbox" checked disabled value="{{$uid}}"> {{$v->title}}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                        @endif
                        <hr/>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right"
                                   for="form-field-1">重置所属组</label>
                            @foreach($bbs_auth_group as $v)
                                <label class="col-sm-3 control-label no-padding-right"
                                       for="form-field-1"> </label>
                                <div class="col-sm-9">
                                    <p><input type="checkbox" name="group_id[]" value="{{$v->id}}">{{$v->title}}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    提交
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    重填
                                </button>
                            </div>
                        </div>
                        <!-- PAGE CONTENT ENDS -->
                    </form>
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
