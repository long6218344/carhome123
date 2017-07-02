@extends('/user/index')
@section('block')

<div id="rightContainer">
   
        <div class="classification favoriteBg">
            
            <p>我的收藏</p>
            <br>
            <div class="dynD"></div>
            <div class="dynNav m_t27">
                <li class="current"><a href="#">帖子</a></li>
                <li><a href="{{url('user/forum')}}">论坛</a></li>
            </div>
            <div class="dynD"></div>
            <div id="userstore">
            @if($list == null)
                <p style="margin-top: 10px">你还没有收藏的帖子</p>
            @else
                <!-- <div class="dynD"></div> -->

                <div class="coll-list-box" style="margin-top: 10px;">
                        <ul id="">
                        @foreach($list as $k)
                            @foreach($k as $n)
                            <li id="{{$n->thid}}">
                                <div class="coll-list-con">
                                    <div class="coll-list-pic">
                                        标题:《<a href="" >{{str_limit($n->ptitle, $limit = 15, $end = '····')}}</a>》
                                    </div>
                                    <p class="p-height">
                                        <a href="{{url('home/post/'.$n->thid)}}" target="_blank" >{{str_limit($n->pmessage, $limit = 35, $end = '····')}}</a>
                                    </p>
                                    
                                </div>
                                <div class="coll-list-btn">
                                    <span>{{date('Y-m-d',$n->time)}}</span>
                                    <a href="javascript:void(0)" class="coll-btn"  onclick="del({{$n->thid}})">取消收藏</a>
                                </div>
                            </li>
                            @endforeach
                            @endforeach
                            
                        </ul>
                    </div>
                    @endif
            </div>

        </div>
   
</div>
<script>
    function del(id){
            var id = id;
            $.ajax({
                url:"{{url('user/notstore')}}/"+id,
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