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

            <li class="current"><a href="{{url('user/myword')}}" target="_top">我的主帖</a></li>
            <li ><a href="{{url('user/get')}}" target="_top">收到的回复</a></li>
            <li ><a href="{{url('user/reply')}}" target="_top">发出的回复</a></li>
            <!-- <li ><a href="#">好友的帖子</a></li> -->
        </div>

        <div class='subdyn2'>
            <strong id="allword" style="cursor:pointer"><a href="{{url('user/myword')}}" >全部帖子</a></strong>
            <strong id="niceword" style="cursor:pointer;"><a href="{{url('user/niceword')}}"></a>精华帖</strong>
        </div>
        <div class='showmyword' id='nicewords' style="">
        @if($num1 == 0)
            <p style="margin-left:50px">您还没有发表过精华帖</p>
        @else
            <table>

                <tr style="background-color: #F2F5F8;">
                    <th>精华帖标题</th>
                    <th>点击次数</th>
                    <th>回复次数</th>
                    <th>操作</th>
                    <th>发表时间</th>
                </tr>
                @foreach ($info1 as $word1)
                    <tr>
                        <td><a href="{{url('home/post/'.$word1->tid)}}">{{$word1->title}}</a></td>
                        <td>{{$word1->clicknumber}}</td>
                        <td>{{$word1->renumber}}</td>

                        <td><a href="{{url('home/post/'.$word1->tid)}}">查看</a></td>
                        <td>{{$word1->tdateline}}</td>
                    </tr>
                @endforeach
                
            </table>

            {{ $info1->links() }}
        @endif
        </div>
        

    </div>
</div>
<script>
    $(document).ready(function(){
        $('#dynNav2 li').click(function(){
            $(this).addClass('current').siblings('li').removeClass('current');
        });
    })

</script>
@endsection