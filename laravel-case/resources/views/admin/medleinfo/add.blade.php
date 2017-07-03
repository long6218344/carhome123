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
                    <a href="#">后台管理</a>
                </li>

                <li>
                    <a href="#">勋章管理</a>
                </li>
                <li class="active">添加勋章</li>
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
                    勋章管理
                    <small>
                        <i class="icon-double-angle-right"></i>
                        添加勋章
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <form class="form-horizontal"  action="{{url('/admin/medle/add')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  名称:</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" name='name'/>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 勋章图标: </label>

                            <div class="col-sm-9">
                                <input type="file" id="form-field-2"  class="col-xs-10 col-sm-5" name='image'/>

                            </div>
                            <br/>
                            <div  style="color:gray">&nbsp建议尺寸：96×96像素</div>
                        </div>



                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 勋章说明: </label>

                            <div class="col-sm-9">
                                <textarea id="form-field-2"  class="col-xs-10 col-sm-5" name='descrip'></textarea>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 勋章积分: </label>

                            <div class="col-sm-9">
                                <input type="number" id="form-field-2"  class="col-xs-10 col-sm-5" name='points'></input>

                            </div>
                        </div>
                        {{--<div class="space-4"></div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 发放机制: </label>--}}

                            {{--<div class="col-sm-9">--}}
                                {{--<input type="radio" id="form-field-2"   name='receive_type'--}}
                                       {{--value=1 />  自动颁发--}}
                                {{--<input type="radio" id="form-field-2"   name='receive_type'value=0  />手动颁发--}}

                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="space-4"></div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 可领用户组: </label>--}}

                            {{--<div class="col-sm-9">--}}
                                {{--<input type="checkbox" id="form-field-2"  name='username'/>&nbsp;&nbsp;会员组--}}
                                {{--<input type="checkbox" id="form-field-2"  name='username'/>&nbsp;&nbsp;管理组--}}
                                {{--<input type="checkbox" id="form-field-2"  name='username'/>&nbsp;&nbsp;默认组--}}

                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="space-4"></div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 颁发条件: </label>--}}

                            {{--<div class="col-sm-9">--}}
                                {{--<input type="radio" id="form-field-2"   name='award_condition' value=1 />自动颁发--}}
                                {{--<input type="radio" id="form-field-2"   name='award_condition' value=0  />手动颁发--}}

                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="space-4"></div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 是否启用: </label>--}}

                            {{--<div class="col-sm-9">--}}
                                {{--<input type="radio" id="form-field-2"   name='isopen' value=1/>启用--}}
                                {{--<input type="radio" id="form-field-2"   name='isopen' value=0/>不启用--}}

                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="space-4"></div>


                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit" >
                                    <i class="icon-ok bigger-110"></i>
                                    Submit
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection