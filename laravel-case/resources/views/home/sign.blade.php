<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Carhome-bbs-sign</title>

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

 <div class="sign container-fluid">
     <div class="sign-top">
         <span style="color: black;font-size: 30px">CarHome123</span>

         <a href="/home/login" style="float: right; right:20px; margin-top:20px;"><span>已有帐号立即登陆</span></a>
     </div>
     
     <div class="sign-form">

         <p style="font-size:25px;margin-top:37px;margin-left:15px">用户注册</p>
         <hr>

         <form class="form-horizontal " action="{{url('/home/sign/create')}}" method="post" onsubmit="return checkForm()">
             {{ csrf_field() }}
             <div class="form-group">
                 <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
                 <div class="col-sm-6">
                     <input type="text" name="username" class="form-control" id="user" placeholder="请输入用户名">
                     <span id="usera"></span>
                 </div>
             </div>
             <div class="form-group">
                 <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                 <div class="col-sm-6">
                     <input type="password" name="pwd"  class="form-control" id="pwd" placeholder="请输入密码">
                     <span id="pwda">* 密码必须字母开头，允许5-16字节，允许字母数字下划线</span>
                 </div>

             </div>
             <div class="form-group">
                 <label for="inputPassword3" class="col-sm-2 control-label">验证密码</label>
                 <div class="col-sm-6">
                     <input type="password" name="pwdagain" class="form-control" id="repwd" placeholder="请验证您的密码">
                     <span id="pwdb">* 两次密码必须相同</span>
                 </div>
             </div>








             <div class="form-group">
                 <label for="inputPassword3" class="col-sm-2 control-label">性别</label>

                 <label class="checkbox-inline">
                     <input type="checkbox" id="inlineCheckbox1" name="sex" value="1"> 男
                 </label>
                 <label class="checkbox-inline">
                     <input type="checkbox" id="inlineCheckbox2" name="sex" value="0"> 女
                 </label>

             </div>
             
             <div class="form-group">
                 <div class="col-sm-offset-3 col-sm-10">
                     <button type="submit" class="btn btn-primary btn-lg">同意协议并注册</button>
                 </div>
             </div>
         </form>

         <span style="margin-left:230px">CarHome用户协议</span>




     </div>

 </div> {{--end sign--}}

 <script src="{{asset('/js/jquery-1.8.3.min.js')}}"></script>

 <script>




     $(function(){
         $('#user').focusout(function(){


             // 得到参数
              var user = $('#user').val();
              var usera = document.getElementById('usera');
             // 将表单数据串行化

//             alert(user);
             $.ajax({
                  type: 'get',
                  url: '{{url('/home/sign/selete')}}/'+ user,
//                  data: user, //发送请求数据/
                  success: function (data){

                     if(data == 2)
                     {
                         usera.style.color = '#f00';
                         usera.innerHTML = '× 该用已存在';
                         return false;
                     }
                     else
                     {
                         usera.style.color = '#0a0';
                         usera.innerHTML = '√ 通过';

                     }
                 }

             });




         })
     })


     function checkForm()
     {


         var pass = document.getElementById('pwd').value;
         var pwda = document.getElementById('pwda');

         if(pass.search(/^[A-Za-z0-9]+$/) === -1){
//

             pwda.style.color = '#f00';
             pwda.innerHTML = '× 密码输入有误,请重新输入';
             return false;
         }else{
             pwda.style.color = '#0a0';
             pwda.innerHTML = '√ 通过';
         }

//         -------------------------

         var repwd = document.getElementById('repwd').value;
         var pwdb = document.getElementById('pwdb');

         if(pass !== repwd){
//

             pwdb.style.color = '#f00';
             pwdb.innerHTML = '× 密码输入有误,请重新输入';
             return false;
         }else{
             pwdb.style.color = '#0a0';
             pwdb.innerHTML = '√ 通过';
         }
     }

//         ------------------------
     var tel = document.getElementById('phone');
     tel.onblur = function () {

         var phone = document.getElementById('phone').value;
         var phonea = document.getElementById('phonea');

         if(phone.search(/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/) === -1){
//

             phonea.style.color = '#f00';
             phonea.innerHTML = '× 手机号码输入有误,请重新输入';
             return false;
         }else{
             phonea.style.color = '#0a0';
             phonea.innerHTML = '√ 通过';
         }

     }








 </script>


</body>
</html>






