@extends('admin/public/layout')
@section('main-content')
    <script src="../js/jquery-1.8.3.min.js"></script>
    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="">评论管理</a>
                </li>

                <li>
                    <a href="">评论管理</a>
                </li>
                <li class="active">评论管理</li>
            </ul><!-- .breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input"
                                           id="nav-search-input" autocomplete="off"/>
									<i class="icon-search nav-search-icon"></i>
									<button class="btn btn-xs btn-info">搜索</button>
								</span>
                </form>
            </div><!-- #nav-search -->
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    评论管理
                    <small>
                        <i class="icon-double-angle-right"></i>
                        评论管理
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="center">
                                            <label>
                                                <input type="checkbox" class="ace"/>
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>PID</th>
                                        <th>所属版块(FID)</th>
                                        <th>所属帖子(TID)</th>
                                        <th>RID</th>
                                        <th>作者</th>
                                        <th>作者id</th>
                                        {{--<th>标题</th>--}}
                                        <th>内容</th>
                                        {{--<th>置顶帖</th>--}}

                                        {{--<th>回复数(次)</th>--}}
                                        <th>发帖时间</th>
                                        {{--<th>内容</th>--}}
                                        <th>发帖人ip</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>

                                    @foreach( $result as $k => $v )
                                        <tr>
                                            <td class="center">
                                                <label>
                                                    <input type="checkbox" class="ace"/>
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>


                                            <td>{{$v->pid}}</td>
                                            <td>{{$v->name}}({{$v->fid}})</td>
                                            <td>{{$v->title}}({{$v->tid}})</td>
                                            <td>{{$v->rid}}</td>
                                            <td>{{$v->rauthor}}</td>
                                            <td>{{$v->rauthorid}}</td>
                                            {{--<td>{{$v->rtitle}}</td>--}}
                                            <td>{{$v->rmessage}}</td>
                                            <td>{{$v->rdateline}}</td>
                                            <td>{{$v->rauthorip}}</td>
                                            {{--<td><a href="{{url('/admin/thread/delete')}}/{{$v->tid}}">删</a></td>--}}
                                            <td><button class="btnclick" name={{$v->rid}}>删</button></td>
                                        </tr>


                                    @endforeach


                                </table>
                            </div><!-- /.table-responsive -->
                        </div><!-- /span -->
                    </div><!-- /row -->

                    <div class="hr hr-18 dotted hr-double"></div>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

    <script>

        //        var tid = document.getElementById("btn").getAttribute("name");

        $(function(){
            $('.btnclick').click(function(){
                var rid = $(this).attr("name");
                var path = '{{url('/admin/reply/delete')}}/'+rid;
                console.log(path);
                $.ajax({
                    type: 'get',
                    url: path,
                    success: function (){
                        alert('AJAX请求成功!');
                    },
                    error: function (){
                        alert('AJAX请求出现错误!');
                    }
                });
            })
        })
    </script>



@endsection