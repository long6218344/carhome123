
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Carhome-bbs-login</title>

    <!-- Bootstrap -->


    <link href="{{asset('css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" >

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="{{ asset('css/home/home-login&sign.css') }}" rel="stylesheet">
    <link href="{{asset('fonts/iconfont/iconfont.css')}}" rel="stylesheet" >


</head>
<body>

<!--



                                   .. .vr
                                 qBMBBBMBMY
                                8BBBBBOBMBMv
                              iMBMM5vOY:BMBBv
              .r,             OBM;   .: rBBBBBY
              vUL             7BB   .;7. LBMMBBM.
             .@Wwz.           :uvir .i:.iLMOMOBM..
              vv::r;             iY. ...rv,@arqiao.
               Li. i:             v:.::::7vOBBMBL..
               ,i7: vSUi,         :M7.:.,:u08OP. .
                 .N2k5u1ju7,..     BMGiiL7   ,i,i.
                  :rLjFYjvjLY7r::.  ;v  vr... rE8q;.:,,
                 751jSLXPFu5uU@guohezou.,1vjY2E8@Yizero.
                 BB:FMu rkM8Eq0PFjF15FZ0Xu15F25uuLuu25Gi.
               ivSvvXL    :v58ZOGZXF2UUkFSFkU1u125uUJUUZ,
             :@kevensun.      ,iY20GOXSUXkSuS2F5XXkUX5SEv.
         .:i0BMBMBBOOBMUi;,        ,;8PkFP5NkPXkFqPEqqkZu.
       .rqMqBBMOMMBMBBBM .           @kexianli.S11kFSU5q5
     .7BBOi1L1MM8BBBOMBB..,          8kqS52XkkU1Uqkk1kUEJ
     .;MBZ;iiMBMBMMOBBBu ,           1OkS1F1X5kPP112F51kU
       .rPY  OMBMBBBMBB2 ,.          rME5SSSFk1XPqFNkSUPZ,.
              ;;JuBML::r:.:.,,        SZPX0SXSP5kXGNP15UBr.
                  L,    :@sanshao.      :MNZqNXqSqXk2E0PSXPE .
              viLBX.,,v8Bj. i:r7:,     2Zkqq0XXSNN0NOXXSXOU
            :r2. rMBGBMGi .7Y, 1i::i   vO0PMNNSXXEqP@Secbone.
            .i1r. .jkY,    vE. iY....  20Fq0q5X5F1S2F22uuv1M;


    又看源码,看你妹妹呀!


-->


<div class="container-fluid login">

  <div class="row">

    <div class=" login-top ">

        <img src="{{asset('img/login-img/carhome-login-logo.jpg')}}" alt="carhome-logo"
             class="carhome-logo-login" width="200">

        <span class="iconfont back-home-login"><a href="" class="back-home-font">&#xe633;返回首页</a></span>

    </div> {{--end login-top--}}


    <div class="login-center clearfix">
        
        <div style="margin:30px 0px 0px 100px">
            <img src="{{asset('img/login-img/carhome-login-bgc.jpg')}}" alt="">
        </div>

        <div class="login-form">
                    <p style="font-size:25px;margin-top:37px;margin-left:15px">用户登录</p>
            <form class="form-horizontal login-form-form" action="{{url('/home/login/join')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">用户名</label>
                    <div class="col-sm-8">
                        <input type="text" name="user" class="form-control" id="inputEmail3" placeholder="Phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" name="" class="col-sm-4 control-label">密码</label>
                    <div class="col-sm-8">
                        <input type="password" name="pwd" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8 clearfix">
                        <button type="submit" style="margin-left:45px" class="btn btn-info btn-lg btn-block">登录</button>
                        <a href="/home/sign" style="float:right;right:5px;top: 10px;">立即注册</a>
                    </div>
                </div>
            </form>

            <hr>


        </div> {{--login-form--}}

    </div> {{--end login-center--}}


    <div class="login-footer">
             <p style="text-align: center;line-height: 60px">Copyright © 2004-2017 www.carhome.com All Rights Reserved. carhome 版权所有</p>
    </div> {{--end login-footer--}}

  </div> {{--end row--}}
</div> {{--<--End login-->--}}

    <script>

    </script>



</body>
</html>
