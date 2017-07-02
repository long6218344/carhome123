@extends('home/public/layout')
@section('main-content')
	<div class="content" style="margin:0 auto">

	    <div class="leftside">
            <div class="left index-left" id="left">
                @if($user->icon == null)
                <div class="userHead" id="userHead">
                    
                <img src="{{asset('image/home/head_120X120.gif')}}" alt=""></a>

                </div>    
                @else
                <div class="userHead" id="userHead">
                <img src="{{asset($user->icon)}}" alt="" width="120"></a>
                </div>    
                @endif
                <p class="nickname" style="font-size: 15px">{{$user->username}}</p>
                <p style="text-align: center">关注&nbsp;&nbsp;<a href="">{{$user->views}}</a>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;粉丝&nbsp;&nbsp;<a href="">{{$user->fans}}</a></p></p>
                @if($_SESSION) 
                <a href="{{url('/home/message-write/1/'.$id)}}" style="display:block;text-align: center">给他发私信</a>
                @endif
				
        	</div>
		</div>
        <div id="rightContainer">
            <div class="right">
                <div id="newsfeed" class="content">
                    <div class="qa-m-title" style="line-height: 30px;font-weight: bold;color: #666666;">他的动态</div>
                    <!--站内动态开始-->
                    <div id="dynamic" style="margin-top:10px">
                        <ul class="dynNav">
                            <li class="current">全部动态</li>
                        </ul>
                        <div class="dynD">
                        </div>
                        <div id="dynamicList">
                           <ul class="duList" id="duList">
                           	@foreach($user1 as $k)
                               <li>
                                   <div class="dRight">
                                       <p class="m_t_3 f14  lh22">
                                           &nbsp;&nbsp;他发表的帖子
                                       </p>
                                       <p class=" f14 fcolor_1 lh22">
                                           《<a href="{{url('home/post/'.$k->tid)}}" target="_blank">{{$k->ptitle}}</a>》
                                       </p>
                                       <p class="f14 fcolor_11 lh22">
                                           &nbsp;&nbsp;&nbsp;&nbsp;{{str_limit($k->pmessage, $limit=35 , $end='....')}}&nbsp;&nbsp;&nbsp;<a href="{{url('home/post/'.$k->tid)}}" target="_blank">查看全部&gt;&gt;</a></p>
                                       
                                       <p class="fcolor_12">{{$k->pdateline}}</p>
                                   </div>
                               </li>
                               @endforeach
                           </ul>
                           {{$user1->links()}}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

	   

	    <div class="clear" style="clear:both"></div>
	    </div>
	</div>

	<script>
	   
	</script>

@endsection