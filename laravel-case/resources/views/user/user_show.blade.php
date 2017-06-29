@extends('/user/index')
@section('block')

<div id="rightContainer">
   
        <div class="classification favoriteBg">
            <p>
            <h3>账户设置</h3>
            </p>

            <ul class="dynNav m_t27">
                <li class="current">个人资料</li>

                <!-- <li><a href="#">修改头像</a></li> -->

                <li><a href="#">隐私设置</a></li>
                <li><a href="#">消息设置</a></li>
                <!-- <li><a href="/setting/PaymentSettings" >支付设置</a></li> -->
                <!-- <li><a href="http://club.autohome.com.cn/bbs/thread-o-200058-17326399-1.html?pvareaid=2072101" target="_blank">意见反馈</a></li> -->
            </ul>
            <div class="dynD">
            </div>
            <p class="subdyn2 p_l15 m_t15">
                <strong>基本信息</strong>
                <a href="{{url('user/edit')}}">修改信息</a>
                <a href="{{url('user/password')}}">修改密码</a>
                <a href="{{url('user/icon')}}">修改头像</a>
            </p>

            <div class="hint">注：填写性别、姓名、生日和所在地，绑定手机、邮箱和至少一个社交账号，添加地址信息，可得帮助值。</div>

            <div>
                
                <table class="baseInfo fcolor_8">
                    <tr>
                        <th>用户名：
                        </th>
                        <td>
                             <label input="userInfo">{{$name}}</label>
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
                            @if($sex == 1)
                            <label input="userInfo">男</label>
                            @else
                            <label input="userInfo">女</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>邮箱：</th>
                        <td>
                            <label input="userInfo">{{$email}}</label>
                        </td>
                    </tr>

                    <tr>
                        <th>生日：
                        </th>
                        <td>
                            <label input="userInfo">{{$birthday}}</label>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <span class="fcolor_6">*</span> 所在地：
                        </th>
                        <td>
                            <label input="userInfo" id="cityLabel">{{$address}}</label>
                        </td>
                    </tr>

                    <tr class="lt_sign">
                        <th>
                            <p class="m_t3">
                                论坛签名：
                            </p>
                        </th>
                        <td>
                            <label input="userInfo">{{$sign}}</label>
                        </td>
                    </tr>
                    
                    @if (session('msg'))
                    <tr>
                        <th>
                            <td style="color:red;font-size: 13px" id="msg">
                                {{ session('msg') }}
                            </td>
                        </th>
                        @endif
                    </tr>
                </table>
            </div>
        </div>
   
</div>
<script>
    setTimeout(function(){
        msg.style.display = "none";
    },3000)
</script>


@endsection