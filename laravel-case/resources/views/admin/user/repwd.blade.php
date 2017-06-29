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
                    <a href="#">用户管理</a>
                </li>


                <li class="active">重设密码</li>
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

                    <form class="form-horizontal" role="form" action="/admin/user/pwd" method="post" name="reg" >

                        {{csrf_field()}}
                        {{--{{var_dump($uid)}}--}}
                        <input type="hidden" name="uid" value="{{$uid}}" />
                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 请设置密码 </label>

                            <div class="col-sm-9">
                                <input type="password" id="form-field-2" name="pwd" class="col-xs-10 col-sm-5" />
                                <span id="regpwd"></span>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 请确认密码 </label>

                            <div class="col-sm-9">
                                <input type="password" id="form-field-2" name="repwd" class="col-xs-10 col-sm-5" />
                                <div id="regrepwd"></div>

                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">


                                <button class="btn btn-info" type="submit" >
                                    <i class="icon-ok bigger-110"></i>
                                    提交
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    重置
                                </button>
                            </div>
                        </div>

                        <div class="hr hr-24"></div>

                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->
    @if(!empty(session('error')))
        <script>
            alert('{{session('error')}}');
        </script>
    @endif
@endsection
