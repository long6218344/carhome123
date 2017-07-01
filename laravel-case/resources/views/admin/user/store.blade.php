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

                    <form class="form-horizontal" role="form" action="/admin/user" method="post" name="reg" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户名 </label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="username" class="col-xs-10 col-sm-5" />
                                <div id="regusername"> </div>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        {{--<div class="form-group">--}}
                            {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 真实名 </label>--}}

                            {{--<div class="col-sm-9">--}}
                                {{--<input type="text" id="form-field-1" name="name" class="col-xs-10 col-sm-5" />--}}
                                {{--<div id="regname"> </div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

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

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 头像 </label>

                            <div class="col-sm-9">
                                <input type="file" id="form-field-2" name="icon" class="col-xs-10 col-sm-5" />

                            </div>
                        </div>

                        <div class="space-4"></div>

                        {{--<div class="form-group">--}}
                            {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 联系地址 </label>--}}

                            {{--<div class="col-sm-9">--}}
                                {{--<input type="text" id="form-field-1" name="address" class="col-xs-10 col-sm-5" />--}}
                                {{--<div id="regaddress"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 联系电话 </label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="phone" class="col-xs-10 col-sm-5" />
                                <div id="regphone"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 性别 　</label>

                            <div class="col-sm-9">
                                <input type="radio" name="sex" value="1"/>　男　　　　
                                <input type="radio" name="sex" value="2"/>　女
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> E-mail </label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" name="email" class="col-xs-10 col-sm-5" />
                                <div id="regemail"></div>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="demo" style="margin-left:370px;">
                            <p>
                                <label> 生日　</label>
                                {{--<select id="sel_year" name="year"></select>年--}}
                                {{--<select id="sel_month" name="month"></select>月--}}
                                {{--<select id="sel_day" name="day"></select>日--}}
                                <input type="date" name="birthday">
                            </p>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 状态　
                            </label>

                            <div class="col-sm-9">
                                <input type="radio" name="status" value="1"/>　在线　　　
                                <input type="radio" name="status" value="2"/>　离线
                            </div>
                        </div>

                        <div class="space-4"></div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户权限　 </label>

                            <div class="col-sm-9">
                                <input type="radio" name="grouppower" value="1" />　会员　　　
                                <input type="radio" name="grouppower" value="2"/>　游客　　　　
                                <input type="radio" name="grouppower" value="3" />　管理员　　
                                <input type="radio" name="grouppower" value="4" />　版主
                                <input type="radio" name="grouppower" value="5" />　禁言用户
                                　　　
                            </div>
                        </div>

                        <div class="space-4"></div>

                        {{--<div class="form-group">--}}
                            {{--<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 版块版主　--}}
                            {{--</label>--}}

                            {{--<div class="col-sm-9">--}}
                                {{--<input type="checkbox" name="type" value="1"/>　大众版　　　--}}
                                {{--<input type="checkbox" name="type" value="2"/>　宝马版　　　--}}
                                {{--<input type="checkbox" name="type" value="3"/>　奔驰版　　　--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 个人简介　 </label>

                            <div class="col-sm-9">
                                <textarea cols="52" rows="3" name="userdetails"></textarea>
                            </div>
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

@section('js')
    <script type="text/javascript" src="{{asset('/js/admin/birthday.js')}}"></script>
    <script>
        $(function () {
            $.ms_DatePicker({
                YearSelector: ".sel_year",
                MonthSelector: ".sel_month",
                DaySelector: ".sel_day"
            });
            $.ms_DatePicker();
        });

        /**
         *	表单提交
         */

        $(function(){
            $("form[name='reg']").submit(function(){
                var a = checkusername();
                var c = checkpwd();
                var d = checkrepwd();
                var e = checkregemail();
                var f = checkregphone();
                if(a && b && c && d && e && f){
                    return true;
                }else{
                    return false;
                }
            });
        });


    </script>
    <script type="text/javascript">
        /**
         *	用户名验证
         */

        $("input[name='username']").focus(function(){
            msg = '请输入用户名';
            ischeck = false;
            color = "#ccc";
            $("#regusername").html(msg);
            $("#regusername").css("color",color);
            return ischeck;
        });

        $("input[name='username']").blur(function(){
            checkusername();
        });

        function checkusername(){
            if($("input[name='username']").val().length > 16){
                msg = "用户名的长度不能大于16位";
                color = "red";
                ischeck = false;
            }else if($("input[name='username']").val().length == 0){

                msg = "用户名必须填写";
                color = "red";
                ischeck = false;
            }else{
                msg = "用户名可以使用";
                color = "green";
                ischeck = true;
            }
            $("#regusername").css("color",color);
            $("#regusername").html(msg);

            return ischeck;
        }

        /**
         *	验证密码
         */
        $("input[name='pwd']").focus(function(){
            msg = '请设置密码,,至少7位';
            ischeck = false;
            color = "#ccc";
            $("#regpwd").html(msg);
            $("#regpwd").css("color",color);
            return ischeck;
        });

        $("input[name='pwd']").blur(function(){
            checkpwd();
        });

        function checkpwd(){
            if($("input[name='pwd']").val().length >= 3 && $("input[name='pwd']").val().length <= 20){
                msg = '密码安全';
                color = 'green';
                ischeck = true;
            }else{
                msg = "密码长度只能在7-20位字符之间";
                color = "red";
                ischeck = false;
            }
            $("#regpwd").css("color",color);
            $("#regpwd").html(msg);

            return ischeck;
        }

        /**
         *	确认密码
         */

        $("input[name='repwd']").focus(function(){
            msg = '请设置密码,大写字母开头,小写字母和数字组成,至少7位';
            ischeck = false;
            color = "#ccc";
            $("#regrepwd").html(msg);
            $("#regrepwd").css("color",color);
            return ischeck;
        });

        $("input[name='repwd']").blur(function(){
            checkrepwd();
        });

        function checkrepwd(){
            if(!($("input[name='repwd']").val().length >= 3 && $("input[name='repwd']").val().length <= 20)){
                msg = "请设置密码,大写字母开头,小写字母和数字组成,至少7位";
                color = "red";
                ischeck = false;
            }else if($("input[name='repwd']").val() != $("input[name='pwd']").val()){
                msg = "两次输入的密码不一致";
                color = 'red';
                ischeck = false;
            }else{
                msg = '密码安全';
                color = 'green';
                ischeck = true;
            }
            $("#regrepwd").css("color",color);
            $("#regrepwd").html(msg);

            return ischeck;
        }

        /**
         *	验证邮箱
         */

        $("input[name='email']").focus(function(){
            msg = '请输入正确的邮箱';
            ischeck = false;
            color = "#ccc";
            $("#regemail").html(msg);
            $("#regemail").css("color",color);
            return ischeck;
        });

        $("input[name='email']").blur(function(){
            checkregemail();
        });

        function checkregemail(){
            var regem = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
            if(!(reg.email.value.match(regem))){
                msg = '邮箱格式地址错误';
                color = 'red';
                ischeck = false;
            }else{
                msg = '邮箱格式正确';
                color = 'green';
                ischeck = true;
            }
            $("#regemail").css("color",color);
            $("#regemail").html(msg);

            return ischeck;
        }

        /**
         *	手机号码验证
         */

        $("input[name='phone']").focus(function(){
            msg = '请输入手机号';
            ischeck = false;
            color = "#ccc";
            $("#regphone").html(msg);
            $("#regphone").css("color",color);
            return ischeck;
        });

        $("input[name='phone']").blur(function(){
            checkregphone();
        });

        function checkregphone(){
            var regph = /^[1][3-8][0-9]{9}$/;
            if(!(reg.phone.value.match(regph))){
                msg = '请输入正确的手机号';
                color = 'red';
                ischeck = false;
            }else{
                msg = '手机号格式正确';
                color = 'green';
                ischeck = true;
            }
            $("#regphone").css("color",color);
            $("#regphone").html(msg);

            return ischeck;
        }

    </script>
@endsection
