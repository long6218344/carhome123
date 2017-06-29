@extends('/admin/public/layout')
<link rel="stylesheet" href="{{asset('/css/bootstrap/bootstrap.min.css')}}">
@section('main-content')
    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="#">后台主页</a>
                </li>

                <li>
                    <a href="#">用户管理</a>
                </li>
                <li class="active">用户列表</li>
            </ul><!-- .breadcrumb -->


        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    分类管理
                    <small>
                        <i class="icon-double-angle-right"></i>
                        用户列表
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">


                                    <label for="exampleInputEmail1">分类名</label>
                                    <input type="text" class="form-control"  id="one_name" >
                                    <button class="btn btn-success" onclick="add()" >确认新增一级分类</button>




                                <script>


                                </script>


                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Name</td>
                                        <td>Pid</td>
                                        <td>Path</td>
                                        <td>Display</td>
                                        <td>Action</td>

                                    </tr>
                                    </thead>

                                    <tbody>




                                        @if(empty($sid))

                                         @foreach($list as $v)


                                        <tr id="tr1" style="border:1px solid #ccc;">
                                            <td>{{$v->id}}</td>
                                            <td>{{$v->name}}</td>
                                            <td>{{$v->pid}}</td>
                                            <td>{{$v->path}}</td>
                                            @if($v->display == 0)
                                                <td id="{{$v->id}}"><button onclick="disnone({{$v->id}})" class="btn btn-success">显示</button></td>
                                            @else
                                                <td id="{{$v->id}}"><button onclick="disblock({{$v->id}})" class="btn btn-success">隐藏</button></td>
                                            @endif
                                            <td>
                                                <a href="{{url('/admin/classify/editShow/'.$v->id)}}"><button  class="btn btn-warning">编辑</button></a>
                                                <button onclick="del({{$v->id}})" class="btn btn-warning" id="bt1">删除</button>
                                                <a href="{{url('/admin/classify/sonindex/'.$v->id)}}"><button  class="btn btn-warning">查看子分类</button></a>
                                                <a href="{{url('/admin/classify/sonclassshow/'.$v->id)}}"><button  class="btn btn-warning">添加子分类</button></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                        @else

                                            @foreach($list as $v)


                                                <tr id="tr1" style="border:1px solid #ccc;">
                                                <td>{{$v->id}}</td>
                                                <td>{{$v->name}}</td>
                                                <td>{{$v->pid}}</td>
                                                <td>{{$v->path}}</td>
                                                @if($v->display == 0)
                                                    <td id="{{$v->id}}"><button onclick="disnone({{$v->id}})" class="btn btn-success">显示</button></td>
                                                @else
                                                    <td id="{{$v->id}}"><button onclick="disblock({{$v->id}})" class="btn btn-success">隐藏</button></td>
                                                @endif
                                                <td>
                                                    <a href="{{url('/admin/classify/editShow/'.$v->id)}}"><button  class="btn btn-warning">编辑</button></a>
                                                    <a href="#"> <button onclick="del({{$v->id}})" class="btn btn-warning" id="{{$v->id}}">删除</button></a>
                                                    <a href="{{url('/admin/classify/sonindex/'.$v->id)}}"><button  class="btn btn-warning">查看子分类</button></a>
                                                    <a href="{{url('/admin/classify/sonclassshow/'.$v->id)}}"><button  class="btn btn-warning">添加子分类</button></a>
                                                </td>

                                            </tr>
                                            @endforeach

                                        @endif

                                    </tbody>
                                </table>
                                {{ $list->links() }}
                            </div><!-- /.table-responsive -->
                        </div><!-- /span -->
                    </div><!-- /row -->

                    <div class="hr hr-18 dotted hr-double"></div>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->



    <script src="{{asset('/js/home/jquery-1.8.3.min.js')}}"></script>

    <script>




        //增加一级分类
        function add() {

            //得到值
            var onename = document.getElementById('one_name').value;


            $.ajax({
                type: 'get',
                 url: '{{url('/admin/classify/addone')}}/'+ onename,
                data: onename,
                success: function (data){

                    location.reload()
                }

            });

        }




        /**
         * 删除ajax
         * @param $id
         */
        function del($id) {


            //得到值
            var id = $id;

            $.ajax({
                type: 'get',
                url: '{{url('/admin/classify/delete')}}/'+ id,
                data: id, //发送请求数据
                success: function (data){


                    if(data == 1)
                    {

                        location.reload()

                    }
                    else if(data == 2)
                    {
                        alert('请删除子类');
                    }

                }

            });

        }



        /**
         * 隐藏
         */
        function disnone($id)
        {
            //得到值

            var id = $id;



            $.ajax({
                type: 'get',
                url: '{{url('/admin/classify/disnone')}}/'+ id,
                success: function (data){

                    if(data == 1)
                    {
                        var bt = document.getElementById(id);
                        bt.innerHTML = '<button onclick="disblock('+id+')" class="btn btn-success">隐藏</button>';
                    }

                }

            });
        }



        /**
         * 显示
         */
        function disblock($id)
        {
            //得到值

            var id = $id;



            $.ajax({
                type: 'get',
                url: '{{url('/admin/classify/disblock')}}/'+ id,
                success: function (data){

                    if(data == 1)
                    {
                        var bt = document.getElementById(id);
                        bt.innerHTML = '<button onclick="disnone('+ id +')" class="btn btn-success">显示</button>';
                    }

                }

            });
        }

    </script>



    <script type="text/javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch (e) {
        }
    </script>


@endsection
