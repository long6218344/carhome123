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
                    广告管理
                    <small>
                        <i class="icon-double-angle-right"></i>
                        广告列表
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <a href="{{url('/admin/adver/addshow')}}"><button class="btn btn-success">新增广告</button></a>
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>广告名称</td>
                                        <td>有效时间</td>
                                        <td>广告内容</td>
                                        <td>广告图片</td>
                                        <td>广告连接</td>
                                        <td>广告类型</td>
                                        <td>操作</td>

                                    </tr>
                                    </thead>


                                    @foreach($list as $v)

                                    <tbody>
                                    <tr style="text-align: center; vertical-align: middle" >

                                        <td>{{$v->id}}</td>
                                        <td>{{$v->name}}</td>
                                        <td>{{$v->time}}</td>
                                        <td>{{$v->details}}</td>
                                        <td><img src="{{asset($v->picture)}}" width="100" alt=""></td>
                                        <td>{{$v->url}}</td>
                                        <td>{{$v->adclass}}</td>
                                        <td>
                                            <button onclick="del({{$v->id}})" class="btn btn-danger">删除</button>
                                            <a href="{{url('/admin/adver/editshow/'.$v->id)}}"><button class="btn btn-success">编辑</button></a>

                                        </td>

                                    </tr>
                                    </tbody>

                                    @endforeach

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


    </script>



    <script type="text/javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch (e) {
        }
    </script>

    <script src="{{asset('/js/home/jquery-1.8.3.min.js')}}"></script>

    <script>


        /**
         * 删除ajax
         * @param $id
         */
        function del($id) {
            //得到值
            var id = $id;
            $.ajax({
                type: 'get',
                url: '{{url('/admin/adver/delete')}}/'+ id,
                data: id, //发送请求数据
                success: function (data){



                    if(data == 1)
                    {
                       location.reload();
                       alert('删除成功')
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
