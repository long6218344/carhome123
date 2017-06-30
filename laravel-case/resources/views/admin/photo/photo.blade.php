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
                    <a href="#">相册管理</a>
                </li>
                <li class="active">相册列表</li>
            </ul><!-- .breadcrumb -->


        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    相册管理
                    <small>
                        <i class="icon-double-angle-right"></i>
                        相册列表
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="row">
                        <div class="col-xs-12">


                            <div class="table-responsive">



                                <div class="row-fluid">

                                     <span> {{ $list->links() }} </span>

                                    @foreach($list as $v)
                                    <ul class="ace-thumbnails">
                                        <li>
                                            <a href="" title="Photo Title" data-rel="colorbox">
                                                <img alt="150x150" src="{{asset($v->picture)}}" width="250" />
                                                 <div class="tags">
													<span class="label-holder">
														<span class="label label-info">{{$v->details}}</span>
													</span>

                                                    <span class="label-holder">
														<span class="label label-danger">carrhome123</span>
													</span>
                                                </div>
                                            </a>

                                            <div class="tools">


                                                <a href="{{url('/admin/photo/editshow/'.$v->id)}}">
                                                   <span>改</span>
                                                </a>

                                                <a href="">
                                                    <span  onclick="del({{$v->id}})">删</span>
                                                </a>
                                            </div>
                                        </li>

                                    </ul>

                                    @endforeach

                                </div>



                            </div><!-- /.table-responsive -->
                        </div><!-- /span -->
                    </div><!-- /row -->

                    <div class="hr hr-18 dotted hr-double"></div>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->







    <script type="text/javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch (e) {
        }
    </script>

    <script src="{{asset('/js/jquery-1.8.3.min.js')}}"></script>

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
                url: '{{url('/admin/photo/delete')}}/'+ id,
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
