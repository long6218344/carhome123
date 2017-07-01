@extends('/user/index')
@section('block')
	<div class="rightside">

	    <div class="user-center">
	        <h1 class="user-name"><b>{{$user->username}}</b>
	            <i class="icon16 icon16-vorange" style="display:none;"></i>
	            <a href="" data-toggle="help" class="i-card card-common" data-target="53144230">
	                <img src="{{asset('./image/home/card_1_26X16.png')}}"></a>
	            <em>|</em>
	            @if($user->sex == 1)
	            <span class="man"></span>
	            @else
	            <span class="woman"></span>
	            @endif
	        </h1>
	        <div class="user-lv">
	            <a href="{{url('user/show')}}" class="edit"><i></i>编辑个人信息 </a>
	            <!-- start 用户身份 -->
	            <span class="user-id" id="levelName" style="display: none;"></span>
	            <a href="" class="moderator-jifen" id="moderatorPoints" style="display: none;"></a>

	            <a href="{{url('user/friend')}}" class="state-mes">关注&nbsp;&nbsp;<span>{{$user->views}}</span></a>
	            <a href="{{url('user/follow')}}" class="state-mes">粉丝&nbsp;&nbsp;<span>{{$user->fans}}</span></a>
	            <a href="{{url('user/user_point')}}" class="state-mes">积分&nbsp;&nbsp;<span>{{$user->credits}}</span></a>
	        </div>
	        <div class="user-state">
	            <div class="user-con">

	                <a href="{{url('user/word')}}">精华帖 <span id="jhtopicCount">{{$num1}}</span></a><a href="{{url('user/myword')}}" class="last-span">主帖 <span id="topicCount">{{$num}}</span></a>

	            </div>
	        </div>
	        <!-- start 等级tip -->
	        <div class="lv-tips fn-hide" id="userIntegral_span" style="display: none;">
	        </div>
	        <!-- end 等级tip -->
	    </div>

	    <!-- start 中心区域 -->
	    <div class="center" appsort="0">

	        <div class="i-box i-friend" id="i-friend" appsort="4" appkey="3" appisload="false" style="display: none;">
	            <div class="center-content">
	                <div class="title">
	                    <h3><a href="">好友动态</a></h3>
	                    <a class="icon12 icon12-close" target-id="#i-friend"></a>

	                </div>

	                <div class="i-box-content" id="noFollowingData" style="display: none;">
	                    <p>
	                        您的好友还没有产生动态，看看其他人吧~</p>
	                </div>



	                <div class="i-info-box" id="followingData" style="display: none;">
	                </div>
	                <div class="i-more" id="toMoreData" style="display: none;">
	                    <a href="">查看全部好友动态&gt;&gt;</a>
	                </div>

	            </div>
	        </div>

	        <!-- start 我的论坛 有主帖和回复 -->
	        <div class="my-club" id="my-club" appsort="5" appkey="6" style="display:none;">
	            <div class="tab tab02 center-content">
	                <div class="tab-nav">
	                    <h3 class="tab-title"><a href="">我的论坛</a></h3>
	                    <ul id="myTopicOnClick">
	                        <li class="current"><a href="javascript:void(0);" appisload="false" data-target="#tab-17" tabid="1" data-toggle="tab" id="myTopicTab">我的主帖</a></li>
	                        <li><a href="javascript:void(0);" data-target="#tab-12" appisload="false" data-toggle="tab" tabid="2" id="myReplysTab">我发出的回复</a></li>
	                    </ul>

	                    <a class="icon12 icon12-close" target-id="#my-club"></a>

	                </div>
	                <div class="tab-content">
	                    <div id="tab-17" class="tab-content-item current">
	                        <!-- start 我的主帖 无主帖 -->
	                        <div class="my-club-no-txt" defaultmytopic="myTopic" style="display:none;">您还没有发过帖子，去论坛发帖和大家交流吧。 <a href="" target="_blank">找论坛</a></div>
	                        <div class="my-club-no-01" defaultmytopic="myTopic" style="display:none;">或者看看大家都在聊什么~</div>
	                        <!-- start 我的主帖 有主帖 -->
	                        <ul class="my-club-con my-club-has" id="myTopicListData">

	                        </ul>
	                        <!-- end 我的主帖 无主帖 -->
	                        <div class="more" id="myTopicMore"><a href="http://i.autohome.com.cn/53144230/club/topic?pvareaid=104133">查看全部主帖&gt;&gt;</a></div>
	                        <!-- end 我的主帖 有主帖 -->
	                    </div>
	                    <div id="tab-12" class="tab-content-item">
	                        <!-- start 无回复 -->
	                        <div class="my-club-no-txt my-club-no-txt-02" defaultmyreplys="myReplys">您还没有回复过论坛内容，看看大家都在聊什么吧。</div>
	                        <!-- start 有回复 -->
	                        <ul class="my-ans-con" id="myReplysListData">
	                        </ul>
	                        <!-- end 无回复 -->
	                        <div class="more" id="myReplysMore"><a href="http://i.autohome.com.cn/53144230/club/sendreply?pvareaid=100202">查看全部回复&gt;&gt;</a></div>
	                        <!-- end 有回复 -->
	                    </div>
	                </div>
	            </div>
	        </div>
	        <!--口碑开始  -->
	        <div class="i-box i-koubei" appsort="7" appkey="7" appisload="false" id="i-koubei" style="display: none;">
	            <div class="tab tab02">
	                <div class="tab-nav">
	                    <h3 class="tab-title"><a href="http://i.autohome.com.cn/apps/koubei?pvareaid=100205">口碑</a></h3>
	                    <ul>
	                        <li class="current"><a data-toggle="tab" data-target="#tab-17-03" href="javascript:void(0);" id="kbeiId">我的口碑</a></li>

	                    </ul>
	                    <a target-id="#i-koubei" class="icon12 icon12-close"></a>
	                </div>
	                <div class="tab-content">
	                    <!-- 我的口碑内容 -->
	                    <div class="tab-content-item current" id="tab-17-03"><div class="none-koubei"><p>您还没有发布口碑，现在点评即可获得<em>万里通积分</em></p><a class="btn" target="_blank" href="http://k.autohome.com.cn/form/carinput/add#pvareaid=102518">发表点评</a></div></div>
	                    <!-- 我发出的口碑回复内容 -->
	                    <div class="tab-content-item mes-review-con" id="tab-17-04">
	                        <p class="no-koubei-reply">您还没有回复过他人口碑。</p>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <!--口碑结束-->

	        <div class="mes-remind" id="mes-remind" appsort="1" appkey="2" appisload="false" style="">
	            <div class="tab tab02 center-content">
	                <div class="tab-nav">
	                    <h3 class="tab-title">消息阅读</h3>
	                    <ul>
	                       <!--  <li class="current" tabid="7"><a href="javascript:void(0);" data-target="#tab-7" data-toggle="tab">论坛回复 <em></em></a></li> -->
	                        <li class="current" tabid="8"><a href="javascript:void(0);" data-target="#tab-8" data-toggle="tab">评论回复 <em></em></a></li>
	                        <li class="" tabid="9"><a href="javascript:void(0);" data-target="#tab-9" data-toggle="tab">粉丝关注 <em></em></a></li>
	                        <li class="" tabid="10"><a href="javascript:void(0);" data-target="#tab-10" data-toggle="tab">系统消息<em></em></a></li>
	                        <li class="" tabid="11"><a href="javascript:void(0);" data-target="#tab-11" data-toggle="tab">私信 <em></em></a></li>
	                    </ul>

	                </div>


	                <div class="tab-content mes-remind-content" id="ureply">
	                    <!-- 评论回复内容 -->
	                    @if($user1 == null)
	                    <div id="tab-8" class="tab-content-item mes-review-con current" appisload="false"><p class="no-mes">还没有人针对您的评论进行回复~</p></div>
	                    @else
	                    <div id="tab-8" class="tab-content-item mes-review-con current" appisload="false" >
	                    	<p>最近的一条回复消息是:</p>
	                    	<p class="no-mes" >
	                    		<a href="" style="font-size: 18px">{{$user1->rauthor}}</a>&nbsp;在:&nbsp;<a href="{{url('home/post/'.$user1->tid)}}">《{{$user1->title}}</a>》中给你回复:<i><a href="{{url('home/post/'.$user1->tid)}}" style="color:#666"><b>{{str_limit($user1->rmessage, $limit = 35, $end='....')}}</b></a></i>
	                    	</p>
	                    	<span><i>{{$user1->rdateline}}</i></span>
	                    </div>
	                    @endif
	                    <!-- 粉丝信息内容 -->
	                    @if($info == null)
	                    <div id="tab-9" class="tab-content-item mes-fans-con" appisload="false"><p class="no-mes">最近没有新的粉丝~</p></div>
	                    @else
	                    <div id="tab-9" class="tab-content-item mes-fans-con" appisload="false">
	                    	<p>最近一条好友关注消息:</p>
	                    	<p class="no-mes">
	                    		<a href="" style="font-size: 18px">{{$user2->username}}</a>&nbsp;&nbsp; 在<span><i>{{date('Y-m-d H:m',$info->time)}}</i></span>&nbsp;&nbsp;关注了你
	                    	</p>
	                    	
	                    </div>

	                    @endif
	                    <!--系统消息-->
	                    <div id="tab-10" class="tab-content-item mes-system-con" appisload="true">
	                        <ul>
	                            <li><i class="icon icon-horn"></i><div>欢迎您加入汽车之家！想受万人瞩目,并拥有独一无二的特权吗？家家助你一臂之力，快与我一起穿梭捷径之门&gt;&gt;同时家家还奖励您一个现金红包，<a href="">快来领取吧&gt;&gt;卍…</a></div><span>2017-06-15 14:47</span></li></ul>
	                        <div class="more"><a href="">查看全部系统消息&gt;&gt;</a></div>
	                    </div>
	                    <!-- 私信内容 -->
	                    @if($user3 == null)
	                    <div class="tab-content-item mes-letter-con"> <p class="no-mes">您还未收到他人发送的私信~</p></div>
	                    @else
	                    <div class="tab-content-item mes-letter-con">
	                    	<p>最近的一条好友私信消息:</p> 
	                    	<p class="no-mes">
	                    		<a href="" style="font-size: 18px">{{$user3->seperson}}</a>&nbsp;&nbsp; 在<span><i>{{date('Y-m-d H:m',$user3->time)}}</i></span>&nbsp;&nbsp;给你发了一封标题为《<a href="{{url('/home/message-write/2/'.$_SESSION['uid'])}}" style="font-size: 18px">{{$user3->head}}</a>》的私信
	                    	</p>
	                    </div>
	                    @endif
	                    <!-- <div id="tab-11" class="tab-content-item mes-letter-con " appisload="false"><p class="no-mes">您还未收到他人发送的私信~</p></div> -->
	                </div>
	            </div>
	        </div>

	        <div class="collect" id="collect" appsort="2" appkey="5" appisload="false" style="">
	            <div class="tab tab02 center-content">
	                <div class="tab-nav">
	                    <h3 class="tab-title"><a href="">我的收藏</a></h3>
	                    <ul id="favoritesOnClick">
	                        <li class="current"><a href="javascript:void(0);" data-target="#tab-13" id="clubTab" appisload="true" data-toggle="tab" tabid="8">收藏的论坛</a></li>
	                        <li><a href="javascript:void(0);" data-target="#tab-15" data-toggle="tab" id="topicTab" appisload="true" tabid="1">收藏的帖子</a></li>
	                        
	                    </ul>
	                </div>
	                <div class="tab-content" id='ustore'>
	                    <div id="tab-13" class="tab-content-item current" >
	                        <!-- start 无收藏论坛 -->
	                        <div class="find-club" defaultfavorites="club" >
	                            <span>您还没有收藏论坛，去找论坛进行收藏~</span>
	                            <a href="{{url('/')}}" target="_blank">找论坛</a>
	                        </div>
	                        <!-- end 无收藏论坛 -->
	                        <!-- start 有收藏论坛 -->
	                        <div class="collect-club-list collect-club-no" id="clubFavoritesList">
	                            <p>或者看看这些热门内容吧</p>
	                            <dl>
	                                <dt><a href="" target="_blank">
	                                        <img src="{{asset('image/home/120_200042.jpg')}}" width="120" height="90" defaultimg="image">
	                                    </a>
	                                </dt>
	                                <dd><a href="{{url('home/blog/9')}}" target="_blank">宝马论坛</a>
	                                </dd>
	                            </dl>
	                            <dl>
	                                <dt><a href="" target="_blank">
	                                        <img src="{{asset('image/home/s_201302251823083624136.jpg')}}" width="120" height="90" defaultimg="image">
	                                    </a>
	                                </dt>
	                                <dd><a href="{{url('home/blog/2')}}" target="_blank">奥迪论坛</a>
	                                </dd>
	                            </dl>
	                            <dl>
	                                <dt><a href="" target="_blank">
	                                        <img src="{{asset('image/home/s_20140806072335496497111.jpg')}}" width="120" height="90" defaultimg="image">
	                                    </a>
	                                </dt>
	                                <dd><a href="{{url('home/blog/4')}}" target="_blank">阿斯顿马丁</a>
	                                </dd>
	                            </dl>
	                            <dl class="last-dl"><dt><a href="" target="_blank">
	                                        <img src="{{asset('image/home/s_201006301947123003343.jpg')}}" width="120" height="90" defaultimg="image">
	                                    </a>
	                                </dt>
	                                <dd><a href="{{url('home/blog/7')}}" target="_blank">本田论坛</a>
	                                </dd>
	                            </dl>
	                        </div>

	                        <div class="more" id="clubFavoritesMore" style="display: none;">
	                            <a href="#">查看全部收藏的论坛&gt;&gt;</a>
	                        </div>
	                        <!-- end 有收藏论坛 -->
	                    </div>
	                    <div id="tab-14" class="tab-content-item" >
	                        <!-- start 无收藏论坛 -->
							@if($info1 == null)
	                        <div class="find-club" defaultfavorites="club" style="">
	                            <span>您还没有收藏帖子~</span>
	                            <a href="{{url('/')}}" target="_blank">找帖子</a>
	                        </div>
	                        @else
	                        <div class="" style="">
	                    		<p>最新收藏的一则帖子:</p>
	                           
	                                <div class="coll-list-pic">
                                        标题:《<a href="{{url('home/post/'.$user4->tid)}}" style="font-size: 16px" >{{str_limit($user4->ptitle, $limit = 15, $end = '····')}}</a>》
                                    </div>
                                    <p class="p-height">
                                        内容简要:<span style="font-size: 20px"><i>{{str_limit($user4->pmessage, $limit = 35, $end = '····')}}</i></span>
                                    </p>
                                    <span>{{date('Y-m-d H:i',$info1->time)}}</span>
	                            	<p style="margin-top: 10px">
	                            		<a href="{{url('/')}}">去看更多精彩帖子>>>>></a>
	                            	</p>
	                            <!-- <a href="{{url('/')}}" target="_blank">找帖子</a> -->
	                        </div>
	                        @endif
	                    </div>
	                    
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- end 中心区域 -->
	    <!-- start 我的应用 -->

	    <div class="app-box">
	        <div class="app-box-content" style="position: static; top: 0px;">
	            <!--签到-->
	            <div class="sign-box" id="usersignInfo">
	                <h3><strong>每日签到</strong><i class="icon12 icon12-askmark1" data-toggle="tip" data-title="连续签到30天可额外获得500万里通积分奖励" data-placement="top" data-offset="0,10"></i><span class="count">连续签到<b id="continuationSign">1</b>天</span></h3>

	                <div class="handle"><i class="i-icon icon-calendar"></i><span>签到</span></div>

	            </div>
	        </div>

	    </div>
	</div>

	<script>
	    $(document).ready(function(){
	        $('#mes-remind li').click(function(){
	            var index = $(this).index();
	            $(this).addClass('current').siblings().removeClass('current');
	            $('#ureply > div').eq(index).addClass('current').siblings().removeClass('current');

	        });
	        $('#favoritesOnClick li').click(function(){
	            var index = $(this).index();
	            $(this).addClass('current').siblings().removeClass('current');
	            $('#ustore > div').eq(index).addClass('current').siblings().removeClass('current');

	        })
	    })
	</script>

@endsection