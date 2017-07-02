@extends('/user/index')
@section('block')

<div id="rightContainer">
    <div class="right">
        <div id="newsfeed" class="content">
            <div class="qa-m-title" style="line-height: 30px;font-weight: bold;color: #666666;">好友动态</div>
            <!--站内动态开始-->
            <div id="dynamic" style="margin-top:10px">
                <ul class="dynNav">
                    <li class="current"><a href="{{url('user/allfeeds')}}">全部动态</a></li>
                    <li><a href="{{url('user/newsfeed')}}">我的动态</a></li>
                    <!-- <li>猜你喜欢</li> -->
                </ul>
                <div class="dynD">
                </div>
                <div id="dynamicList">
                    @if($news == null)
                    <p style="padding:10px">没有好动动态</p>
                    @else
                    <ul class="duList" id="duList">
                        @foreach($news as $n)
                            @if ($n == null)
                                    @continue
                            @endif
                        @foreach($n as $k)
                        <li>
                            <div class="dLeft">
                            @if ($k->icon == null)
                                <span class="floatRight icon_wz6">
                                    <a href=""><img src="{{asset('image/home/head_120X120.gif')}}" alt="" width="50px" height="50px"></a>
                                </span>
                            @else
                                <span class="floatRight icon_wz6">
                                    <a href=""><img src="{{asset($k->icon)}}" alt="" width="50px" height="50px"></a>
                                </span>
                            @endif
                            </div>
                            <div class="dRight">
                                <p class="m_t_3 f14  lh22">
                                    <a href="{{url('person/'.$k->pauthorid)}}" target="_blank">{{$k->username}}</a>&nbsp;&nbsp;发表了帖子
                                </p>
                                <p class=" f14 fcolor_1 lh22">
                                    《<a href="{{url('home/post/'.$k->tid)}}" target="_blank">{{$k->ptitle}}</a>》
                                </p>
                                <p class="f14 fcolor_11 lh22">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{str_limit($k->pmessage, $limit = 200, $end = '····')}}&nbsp;&nbsp;<a href="{{url('home/post/'.$k->tid)}}" target="_blank">查看全部&gt;&gt;</a></p>
                                
                                <p class="fcolor_12">{{$k->pdateline}}</p>
                            </div>
                        </li>
                        @endforeach
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
        <div id="sidebar" class="sidebar">
            <div class="model">
                <div class="mList_tt">
                可能感兴趣的人</div>
                    <ul class="mList_3" id="ul_interested">
                    @foreach($random as $user)
                        <li class="" style="display: " id="d{{$user->uid}}">
                            <div class="mList_3_head">
                                @if($user->icon == null)
                                <a href="{{url('person/'.$user->uid)}}" target="_blank"><img src="{{asset('image/home/head_120X120.gif')}}" alt="" width="50px" height="50px"></a>
                                @else
                                <a href="{{url('person/'.$user->uid)}}"><img src="{{asset($user->icon)}}" alt="" width="50" height="50px"></a>
                                @endif
                            </div>
                            <p>
                                <a href="{{url('person/'.$user->uid)}}" target="_blank"><strong>
                                    {{$user->username}}</strong></a><a target="_blank" href="#" class="sign"></a></p>
                            <!-- <p class="fcolor_13">他也关注了...</p> -->
                            
                             <span id="c{{$user->uid}}" class="addFc spanlink" onclick="AddInsetedFollow({{$user->uid}},this)">
                                加关注</span>
                            
                            
                             <span id="b{{$user->uid}}" class="hadFc spanlink" style="display:none">
                                    已关注</span>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $("#ulList li").each(function(){
            var id = $(this).attr("id");
            $(this).mouseover(function(){                          
                   $("#a"+id).show();
            }).mouseout(function(){             
                     $("#a"+id).hide();
            });  
        }); 

    });
   
    function AddInsetedFollow(uid,obj){
        var uid = uid;
        $.ajax({
            url:"{{url('user/addfans')}}/"+uid,
            type:'get',
            dataType: 'json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function( uid ) {
                // console.log(id);
                var bb = $('#b'+uid);
                var cc = $('#c'+uid);
                var aa = $("#d"+uid);
                cc.hide(50);
                bb.show();
                aa.delay(500).fadeOut();
            }
        });
    }


</script>


@endsection