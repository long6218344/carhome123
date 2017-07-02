@extends('/user/index')
@section('block')

<div id="rightContainer">
   
        <div class="classification favoriteBg">
            <p>
            <h3>账户设置</h3>
            </p>

            <ul class="dynNav m_t27">
                <li><a href="{{url('user/show')}}">个人资料</a></li>
                <li class="current"><a href="{{url('user/secret')}}">隐私设置</a></li>
            </ul>
            <div class="dynD">
            </div>
            <div class="secret" style="padding:10px;">
                <p style="margin-bottom: 10px;font-color:#ccc">
                    <strong>谁能给我发私信</strong></p>
                <p class="secret">
                   <input class="d" type="radio" id="message_all" name="message" value="1" {{ ($secret == 1) ? 'checked' : '' }}>
                   <label for="message_all" class="lbTxt">任何人(默认)</label></p>
                <p class="secret">
                    <input class="d"  type="radio" id="message_friend" name="message" value="2" {{ ($secret == 2) ? 'checked' : '' }}>
                    <label for="message_friend" class="lbTxt">仅好友 (互相关注)</label>
                </p>
                <p class="m_t20"><a class="iPost" id="iPost" href="javascript:void(0);" onclick="change()">保存设置</a></p>
         
            </div>

    </div>
   
</div>

<script>
    var m = document.getElementsByName("message");
    function change(){
    for(var i=0; i<m.length; i ++){
        if(m[i].checked){
            var a = m[i].value;
            $.ajax({
                url:"{{url('user/secretsetting')}}/"+a,
                type:'get',
                dataType: 'json',
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function( a ) {
                    alert('保存成功');
                },
                error:function(){
                    
                    alert('并没有改动');
                }
            });
        }
    }
  }
</script>  

@endsection