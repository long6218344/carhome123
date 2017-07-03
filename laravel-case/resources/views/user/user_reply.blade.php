@extends('user/index')
@section('block')
<div id="rightContainer">
    <div class="classification ">
        <p>
            <a href="{{url('user/index')}}" class="floatRight">论坛首页</a>
            <strong>我的论坛</strong>
        </p>
        <div class="cl_m m_t27" style="width:760px">
            <div class="cl_m_item">
                <div>
                    <li>
                        <strong>注册时间:</strong>
                        <span>{{date('Y-m-d',$regdate)}}</span>
                    </li>
                    <li>
                        <strong>积分:</strong>
                        <span>{{$credits}}</span>
                    </li>
                </div>
            </div>
            <div class="cl_m_item">
                <li>
                    <strong>帖子数:</strong>
                    <a href="">{{$num1}}篇精华帖</a> /
                    <a href="">{{$num}}篇帖子</a>
                </li>
            </div>
        </div>
        <div class="dynNav2" id="dynNav2">
            <li ><a href="{{url('user/myword')}}" target="_top">我的主帖</a></li>
            <li ><a href="{{url('user/get')}}" target="_top">收到的回复</a></li>
            <li class="current"><a href="{{url('user/reply')}}" target="_top">发出的回复</a></li>
            <!-- <li ><a href="#">好友的帖子</a></li> -->
        </div>

        <div class='showmyword' id='showmyword'>
        @if($n == 0)
            <p style="margin-left:50px">您还没有发表过回复</p>
        @else
            <p style="margin-left:50px;margin-bottom:20px">您一共发表过<b style="color:blue">{{$n}}</b>条回复</p>
            <table id="reply">
                <tr style="background-color: #F2F5F8;">
                    <th style="width:40%">帖子回复</th>
                    <th >点击次数</th>
                    <th >回复次数</th>
                    <th >操作</th>
                    <th>回复时间</th>
                </tr>
                @foreach ($info as $word)
                    <tr>
                        <td style="text-align: left;width:38%;white-space:nowrap;overflow:hide;">
                            <div style="margin-left: 50px">
                            <p>在:
                            《<a href="{{url('home/post/'.$word->tid)}}">{{$word->title}}</a>》</p>
                            <p>回复:
                            <a href="{{url('home/post/'.$word->tid)}}">{{str_limit($word->rmessage, $limit = 20, $end = '····')}}</a></p>
                            </div>
                            </td>
                        <td>{{$word->clicknumber}}</td>
                        <td>{{$word->renumber}}</td>
                        <td><a href="{{url('home/post/'.$word->tid)}}">编辑</a></td>
                        <td>{{$word->tdateline}}</td>
                    </tr>
                @endforeach
                
            </table>
            {{ $info->links() }}
        @endif
        </div>

       
        

    </div>
</div>
<script>
    $(document).ready(function(){
        $('#dynNav2 li').click(function(){
            $(this).addClass('current').siblings('li').removeClass('current');
        });
        // 帖子选项卡
        $('#niceword').click(function(){
            $(this).css('color','');
            $("#allword").css('color','#3b5998');
            $("#showmyword").hide();
            $("#nicewords").show();
        });
        $('#allword').click(function(){
            $(this).css('color','');
            $("#niceword").css('color','#3b5998');
            $("#nicewords").hide();
            $("#showmyword").show();
        });
    })

</script>
@endsection