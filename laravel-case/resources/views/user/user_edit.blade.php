@extends('/user/index')
@section('block')

<div id="rightContainer">
   
        <div class="classification favoriteBg">
            <p>
            <h3>账户设置</h3>
            </p>

            <ul class="dynNav m_t27">
                <li class="current">个人资料</li>

                <li><a href="{{url('user/secret')}}">隐私设置</a></li>
            </ul>
            <div class="dynD">
            </div>
            <p class="subdyn2 p_l15 m_t15">
                <a href="{{url('user/show')}}">基本信息</a>
                <strong>修改信息</strong>
                <a href="{{url('user/password')}}">修改密码</a>
                <a href="{{url('user/icon')}}">修改头像</a>
            </p>

            <div class="hint">注：完善个人资料有惊喜</div>

            <div>
            <form action="{{url('user/edits')}}" method="post" id="frombaseifno" >
            {{  csrf_field() }}
                <table class="baseInfo fcolor_8">
                    <tr>
                        <th>用户名：
                        </th>
                        <td>
                             <input type="text" id="UserName" name="UserName" class="i" value="{{$name}}" >
                             @if ($errors->has('Username')) 
                                 <span style="color:red">请填写名字</span>
                             @endif
                        </td>
                    </tr>
                    <tr>
                        <th>用户ID：
                        </th>
                        <td>
                            {{$id}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <span class="fcolor_6">*</span> 性别：
                        </th>
                        <td>
                           <input type="radio" name="rdsex" class="d" value="1" checked="checked" id="man">
                             <label for="man" class="lbTxt">男</label>
                            <input type="radio" name="rdsex" class="d" value="2" id="woman">
                            <label for="woman" class="lbTxt">女</label>
                        </td>
                    </tr>
                    <tr>
                        <th>邮箱：</th>
                        <td>
                            <input type="text" id="Useremail" name="email"  value="{{$email}}">
                        @if ($errors->has('email')) 
                            <span style="color:red">请正确填写邮箱</span>
                        @endif
                        </td>
                    </tr>

                    <tr>
                        <th>生日：
                        </th>
                        <td>
                            <input id="meeting" type="date" name=birthday value="{{$birthday}}">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <span class="fcolor_6">*</span> 所在地：
                        </th>
                        <td>
                            <input type="text" id="UserAddress" name="address" class="i" value="{{$address}}">
                        </td>
                    </tr>

                    <tr class="lt_sign">
                        <th>
                            <p class="m_t3">
                                论坛签名：
                            </p>
                        </th>
                        <td>
                            <textarea class="txar_sign" id="textSign" name="textSign" cols="50" rows="5" placeholder="签名最多30字" maxlength="30"  ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="保存">
                    @if (session('mm'))
                            <span style="color:red;font-size: 13px" id="mm">
                                {{ session('mm') }}
                            </span>
                        @endif
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
   
</div>

<script>
    $(document).ready(function(){
        $('form li').click(function(){
            $(this).addClass('current').siblings('li').removeClass('current');
        });
        $('#textSign').html('{{$sign}}');

    });
    // 地址联动 引入area.js文件 调用初始化函数
    if(document.getElementById("mm")){

        setTimeout(function(){
            mm.style.display = "none";
        },3000);
    }
    
</script>

@endsection