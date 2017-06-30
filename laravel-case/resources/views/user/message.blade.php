@extends('/user/index')
@section('block')

<div id="rightContainer">
    <div class="container" style="width:800px">


        <div style="padding:20px;">

            <p style="margin-bottom:10px">私信</p>

            <span> <a href="{{url('/home/message-write/2/'.$_SESSION['uid'])}}" class="btn-sm btn-primary">我的私信</a> |
                <a href="{{url('/home/message-write/1')}}" class="btn-sm btn-primary">写私信</a> </span> 
                <span><button onclick="shuaxin()" style="width:56px;height:24px;border:none;border-radius: 3px;background-color: #337ab7;color:#fff;margin-left: 50px" >刷新</button></span>

             @if($jd == 1)
                     <form style="margin-top: 30px;" action="{{url('/home/message/write')}}" method="post" style="width: 70%">
                     {{ csrf_field() }}
                     <div class="form-group">
                         <label for="exampleInputEmail1">发送给</label>
                         <input type="text" class="form-control" name="user" id="input" style="height:20px" value="{{$toname}}">
                         <span id="sp"></span>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">标题</label>
                         <input type="text" class="form-control" name="head" id="input" style="height:20px">
                         @if ($errors->has('head')) 
                             <span style="color:red">标题不能为空!</span>
                         @endif
                     </div>
                     <div class="form-group">
                         <label for="exampleInputPassword1">内容</label>
                         <textarea  class="form-control" rows="3" name="details" maxlength="300" onkeyup="ck(this)"></textarea>
                         @if ($errors->has('details')) 
                             <p style="color:red">内容不能为空!</p>
                         @endif
                         <span>还可以输入</span><span id="span" style="color:red;font-size:30px">300</span><span>字的内容</span>
                     </div>


                     <input type="hidden" value="{{$_SESSION['uid']}}" name="id">


                     <button type="submit" class="btn-sm btn-primary btn-lg" style="border:none">发送</button>
                 </form>

                     @elseif($jd == 2)

                     <table id="sample-table-1"  style="margin-top: 30px;width: 90%;">
                         <thead>
                         @if(count($list) == 0)
                         <p style="padding:10px">你还没有发送或接收过私信,快和好友互动吧...</p>
                         @else
                         
                         <tr style="text-align: center;border-bottom: 1px solid #ccc">

                             <th>发送人</th>
                             <th>接收人</th>
                             <th>发送时间</th>
                             <th>信件标题</th>
                             <th>操作</th>

                         </tr>
                         </thead>

                         @foreach($list  as $V => $a)
                           
                            <tbody>
                            <tr style="text-align: center; vertical-align: middle;border-bottom: 1px solid #ccc" >
                            @if($a->seperson == $_SESSION['username'])
                                <td>我</td>
                            @else
                                <td>{{$a->seperson}}</td>
                            @endif
                            
                            @if($a->reperson == $_SESSION['username'])
                                <td>我</td>
                            @else
                                <td>{{$a->reperson}}</td>
                            @endif
                                <td>{{$a->time}}</td>
                                <td>{{$a->head}}</td>
                                <td>
                                    <button onclick="read({{$a->id}})" class="btn-xs btn-success">查看详情</button>
                                    <button onclick="del({{$a->id}})" class="btn-xs btn-danger">删除</button>
                                </td>
                            </tr>
                            </tbody>

                         @endforeach
                        @endif
                     </table>
                     {{ $list->links() }}


                    @endif

             </div>



         </div>

         <script src="{{asset('/js/home/jquery-1.8.3.min.js')}}"></script>

         <script>


             // 检测输入字数
             var ts = document.getElementById('span');
             num = 300; // 限制总数
             function ck(obj){
                 // console.log(obj.value.length);
                 var n = obj.value;// 输入字符串内容
                 var lengths = num - n.length;// 剩余长度
                 console.log(lengths);
                 ts.innerHTML =lengths;//输出显示字数

             }

             var input = document.getElementById('input');
             input.onblur = function ()
             {

                 var onename = input.value;

                 $.ajax({
                 type: 'get',
                 url: '{{url('/home/message/detection')}}/'+ onename,

                 success: function (data){

                     if(data == 1)
                     {
                        var sp = document.getElementById('sp');
                        sp.innerHTML = '你输入的用户并不存在';
                        sp.style.color = 'red';

                     }
                     else
                     {
                         var sp = document.getElementById('sp');
                         sp.innerHTML = '你输入的用户存在';
                         sp.style.color = 'green';


                     }
                 }

                 });
             }

             /***
              * 读取私信详情
              * @param $id
              */
             function read($id)
             {
                 $.ajax({
                     type: 'get',
                     url: '{{url('/home/message/read')}}/'+ $id,

                     success: function (data){
                            alert(data);
                     }
                 });
             }



             /***
              * 删除私信
              * @param $id
              */
             function del($id)
             {
                 $.ajax({
                     type: 'get',
                     url: '{{url('/home/message/delete')}}/'+ $id,

                     success: function (data){

                         if(data == 1)
                         {
                             location.reload()
                             alert('已删除')
                         }
                     }
                 });
             }


             function shuaxin()
             {
                location.reload()
             }



         </script>





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('js/bootstrap/bootstrap.min.css')}}js/bootstrap.min.js"></script>
</div>


@endsection