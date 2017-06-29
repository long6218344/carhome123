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
            </ul>
            <div class="dynD">
            </div>
            <p class="subdyn2 p_l15 m_t15">
                <a href="{{url('user/show')}}">基本信息</a>
                <a href="{{url('user/edit')}}">修改信息</a>
                <strong>修改密码</strong>
                <a href="{{url('user/icon')}}">修改头像</a>
            </p>

            <div class="hint">注：密码复杂度越高,您的账户越安全,请时常更新密码以免出现隐患。</div>

        <div>
            <form action="{{url('user/editpwd')}}" method="post">
            {{  csrf_field() }}
                <table class="baseInfo fcolor_8">
                    <tr>
                        <th>原密码：
                        </th>
                        <td>
                            <input type="password" id="oldpwd" name="oldpwd" class="i" value="{{old('oldpwd')}}">
                            @if(Session::has('flash_message'))
                                    <span style="color:red;font-size:12px" >
                                            {{Session::get('flash_message')}}    
                                    </span>  
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>新密码：
                        </th>
                        <td>
                            <input type="password" id="newpwd" name="newpwd" class="i" value="{{old('newpwd')}}">
                            @if ($errors->has('newpwd')) 
                                <span style="color:red;font-size: 12px">密码需字母和数字组合,在6~15字之内</span>
                            @endif
                            </td>
                        </td>
                    </tr>
                    <tr>
                        <th>确认密码：
                        </th>
                        <td>
                            <input type="password" id="prepwd" name="prepwd" class="i" value="{{old('prepwd')}}">@if ($errors->has('prepwd')) 
                                <span style="color:red;font-size: 12px">与新密码不一致</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
   
</div>

<script>
  
</script>  

<script>
   $(function(){
    $('input').blur(function(){
        $("form span").hide();
    })
   })
    
    
</script>

@endsection