@extends('/user/index')
@section('block')

<div id="rightContainer">
                
    <div class="right">
        <div id="fans" class="content">
            <div class="upstatus">
                <h3>
                    我的好友</h3>
            </div>
            <div class="m_t25">
                <ul class="dynNav">
                    <li class="current">关注</li>
                    <li><a href="{{url('user/follow')}}">
                        粉丝</a></li>
                    <li><a href="{{url('user/bothfriend')}}">
                        互相关注</a></li>
                </ul>
                <div class="dynD">
                </div>
                <div id="dynamic">
                @if($info == null)
                    <p class="subdyn2">
                        <strong>你还没有关注的好友</strong></p>
                @else  
                    <p class="subdyn2">
                        <strong>你已关注了{{count($info)}}人</strong></p>
                    <div id="dynamicList">
                        <ul class="duList2" id="ulList">
                            @foreach($friend as $k)
                            <li id="cc{{$k->uid}}">
                                <div class="userHead2">
                                    @if($k->icon == null)
                                    <a href=""><img src="{{asset('image/home/head_120X120.gif')}}" alt="" width="50px" height="50px"></a>
                                    @else
                                    <a href=""><img src="{{asset($k->icon)}}" alt="" width="50" height="50px"></a>
                                    @endif
                                    
                                    <a class="private" href="{{url('/home/message-write/1/'.$k->uid)}}" >
                                        私信</a>
                                </div>
                                <div class="duRight">
                                    <p>
                                        <a href="{{url('person/'.$k->uid)}}" target="_blank">{{$k->username}}</a>
                                        <a href="http://club.autohome.com.cn/bbs/carOwnerCamp.html" target="_blank" class="sign"></a>
                                        <span class="m_r22">&nbsp;</span>
                                        @if($k->sex == 1)
                                        <span class="man"></span>
                                        @else
                                        <span class="woman"></span>
                                        @endif
                                        <span>{{$k->address}}</span>
                                    </p>
                                    <p>
                                        关注&nbsp;&nbsp;<a href="">{{$k->views}}</a>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;粉丝&nbsp;&nbsp;<a href="">{{$k->fans}}</a></p>
                                    <p>
                                        
                                        爱车：<a href="">奇瑞A3</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        关注的车：
                                        <a href="">
                                            宝马3系</a></p>
                                </div>
                                <div class="hasFcPos">
                                    
                                    
                                    <span class="hadFc">已关注</span>
                                    <br />
                                    <a href="javascript:void(0)" id="a{{$k->uid}}" style="display:none" onclick="RemoveFollower({{$k->uid}})" class="cancelFocus3">取消关注</a>
                                </div>
                            </li>
                            @endforeach
                            
                        </ul>
                        <!--分页开始-->
                       
                        <!--分页结束-->
                    </div>
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
                                <a href="{{url('person/'.$user->uid)}}"><img src="{{asset('image/home/head_120X120.gif')}}" alt="" width="50px" height="50px"></a>
                                @else

                                <a href="{{url('person/'.$user->uid)}}"><img src="{{asset($user->icon)}}" alt="" width="50px" height="50px"></a>
                                @endif
                                <!-- <a href=""><img src="{{url($user->icon)}}"></a> -->
                            </div>
                            <p>
                                <a href="{{url('person/'.$user->uid)}}"><strong>
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
<script>
    $(function(){
        $("#ulList li").each(function(){
            var ad = $(this).attr("id");
            var id = ad.slice(2);
            $(this).mouseover(function(){                          
                   $("#a"+id).show();
            }).mouseout(function(){             
                     $("#a"+id).hide();
            });  
        }); 

    });
   
    function RemoveFollower(id){

        var id = id;
        $.ajax({
            url:"{{url('user/fans')}}/"+id,
            type:'get',
            dataType: 'json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function( id ) {
                // console.log(id);
                    var sel = $('#cc'+id);
                    sel.remove();
            }
        });
    }

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