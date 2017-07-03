
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
                    <i class="icon-home home-icon"> </i>
                    <a href="#">IP地址查询</a>
                </li>

                <li>
                    <a href="#">IP地址</a>
                </li>
                <li class="active"></li>
            </ul><!-- .breadcrumb -->


        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    IP地址查询
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
                            <p style="font-size:16px;">本机ip</p>
                            <ul style="list-style: none">
                                <li> &nbsp; &nbsp;{{$list->remark}}</li>
                                <br>
                                <li> &nbsp; &nbsp;{{$list->ip}}</li>

                            </ul>

                            <div style="margin: 10px 0 0 0;">
                                <form action="{{url('/admin/selectip')}}" method="post">
                                    {{ csrf_field() }}


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">输入ip</label>
                                            <input type="text" class="form-control"  name="ip" >
                                        </div>

                                        <button style="margin-left: 900px;margin-top: 30px;" type="submit" class="btn btn-primary btn-lg">Submit</button>



                                </form>


                            </div>





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

    </script>



    <script type="text/javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch (e) {
        }
    </script>

    <script src="{{asset('/js/home/jquery-1.8.3.min.js')}}"></script>

    <script>




        //增加一级分类
        function add() {

            //得到值
            var onename = document.getElementById('one_name').value;


            $.ajax({
                type: 'get',
                url: '{{url('/admin/selectip/')}}/'+ onename,
                data: onename,
                success: function (data){

                  alert(data);
                }

            });

        }

    </script>


@endsection
