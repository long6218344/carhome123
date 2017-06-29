
    @extends('/admin/public/layout')
    <link rel="stylesheet" href="{{asset('/css/bootstrap/bootstrap.min.css')}}">
    <link href="{{asset('/css/zui.sexy/zui.min.css')}}" rel="stylesheet">
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
                        <a href="#"></a>
                    </li>

                    <li>
                        <a href="#"></a>
                    </li>
                    <li class="active"></li>
                </ul><!-- .breadcrumb -->


            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>

                        <small>
                            <i class="icon-double-angle-right"></i>

                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <div class="row">
                            <div class="col-xs-12">


                                <nav class="navbar navbar-default" role="navigation">
                                    <ul class="nav navbar-nav nav-justified">
                                        <li><a href="{{url('/admin/calendar')}}">刷新</a></li>
                                    </ul>
                                </nav>

                                <ul >
                                    @foreach($list as $v)

                                        <div style="margin: auto;width: 98%;">
                                            <li style="float: left;list-style: none;margin: 20px 20px 5px 5px ;">
                                                <a href="{{$v->url}}">
                                                    <p><img src="{{$v->thumbnail_pic_s}}" width="300"></p>
                                                    <p>{{$v->title}}</p>
                                                    <p>{{$v->date}}</p>

                                                </a>
                                            </li>

                                        </div>
                                    @endforeach
                                </ul>


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
