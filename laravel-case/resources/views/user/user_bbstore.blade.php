@extends('/user/index')
@section('block')

<div id="rightContainer">
   
        <div class="classification favoriteBg">
            
            <p>我的收藏</p>
            <br>
            <div class="dynD"></div>
            <div class="dynNav m_t27">
                <li ><a href="{{url('user/store')}}">帖子</a></li>
                <li class="current"><a href="{{url('user/forum')}}">论坛</a></li>
            </div>
            <div class="dynD"></div>
            <div id="userstore">
            <p style='padding:10px'>收藏论坛功能尚未开放.请绕行....谢谢</p>
            <!-- @if($list == null)
                <p>你还没有收藏的论坛</p>
            @else
                <div class="coll-list-box" style="margin-top: 10px;">
                        @foreach($list as $k)
                            @foreach($k as $n)
                            <div id="{{$n->fid}}">
                                <p style="border:none;width:280px">论坛:&nbsp;
                                    <a href="{{url('home/blog/'.$n->fid)}}" target="_blank" >{{$n->name}}</a>&nbsp;&nbsp;
                                <a href="javascript:void(0)" class="coll-btn"  onclick="cancel({{$n->fid}})">取消收藏</a>
                                </p>
                            </div>
                            @endforeach
                            @endforeach
                            
                </div>
            @endif
            </div> -->

        </div>
   
</div>
<script>
    function cancel(id){
            var id = id;
            $.ajax({
                url:"{{url('user/cancelbbs')}}/"+id,
                type:'get',
                dataType: 'json',
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function( id ) {
                    // console.log(id);
                        var sel = $('#'+id);
                        sel.remove();
                }
            });
    }

</script>


@endsection