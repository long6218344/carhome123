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
                <a href="{{url('user/password')}}">修改密码</a>
                <strong>修改头像</strong>
            </p>
            <!-- <div class="hint">注：密码复杂度越高,您的账户越安全,请时常更新密码以免出现隐患。</div> -->

        <div>
        <br>
        <p style="margin-left:60px;font-size: 13px;color:blue">选择你所喜欢的照片:</p>
            <form  action="{{url('user/editicon')}}" method="post" enctype="multipart/form-data" id="icon_form">
            {{  csrf_field() }}
                <table class="baseInfo fcolor_8">
                    <tr>
                        <th>请选择文件:
                        </th>
                        <td>
                             <input type="file" id="file" name="myfile" class="i" >
                             <input type="submit" value="修改头像" >
                        </td>
                    </tr>
                    
                
                   
                </table>
            </form>

        </div>
    </div>
   
</div>

<script>
  
</script>  

@endsection