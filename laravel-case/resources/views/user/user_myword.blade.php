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
                        <strong>最后登录时间:</strong>
                        <span>222</span>
                    </li>
                </div>
            </div>
            <div class="cl_m_item">
                <li>
                    <strong>帖子数:</strong>
                    <a href="">{{$num1}}篇精华帖</a> /
                    <a href="">{{$num}}篇帖子</a>
                </li>
                <li>
                    <strong>关注的车:</strong>
                    <a href="">000</a>
                </li>
            </div>
        </div>
        <div class="dynNav2" id="dynNav2">
            <li class="current"><a href="#" target="_top">我的主帖</a></li>
            <li ><a href="#" target="_top">收到的回复</a></li>
            <li ><a href="#" target="_top">发出的回复</a></li>
            <li ><a href="#">好友的帖子</a></li>
        </div>

        <div class='subdyn2'>
            <strong id="allword" style="cursor:pointer">全部帖子</strong>
            <strong id="niceword" style="cursor:pointer;color:#3b5998">精华帖</strong>
            <!-- <a href="#">问答帖</a> -->
        </div>
        <div class='showmyword' id='showmyword'>
        @if($num == 0)
            <p style="margin-left:50px">您还没有发表过帖子</p>
        @else
            <table>
                <tr>
                    <th>标题</th>
                    <th>点击次数</th>
                    <th>回复次数</th>
                    <th>发表时间</th>
                </tr>
                @foreach ($info as $word)
                    <tr>
                        <td><a href="#">{{$word->title}}</a></td>
                        <td>{{$word->clicknumber}}</td>
                        <td>{{$word->renumber}}</td>
                        <td>{{$word->tdateline}}</td>
                    </tr>
                @endforeach
                
            </table>
            {{ $info->links() }}
        @endif
        </div>

        <div class='showmyword' id='nicewords' style="display:none">
        @if($num1 == 0)
            <p style="margin-left:50px">您还没有发表过精华帖</p>
        @else
            <table>
                <tr>
                    <th>精华帖标题</th>
                    <th>点击次数</th>
                    <th>回复次数</th>
                    <th>发表时间</th>
                </tr>
                @foreach ($info1 as $word1)
                    <tr>
                        <td><a href="#">{{$word1->title}}</a></td>
                        <td>{{$word1->clicknumber}}</td>
                        <td>{{$word1->renumber}}</td>
                        <td>{{$word1->tdateline}}</td>
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