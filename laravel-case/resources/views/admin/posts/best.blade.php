@extends('admin/public/layout')
@section('main-content')
    <script src="../js/jquery-1.8.3.min.js"></script>
    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="#">后台主页</a>
                </li>

                <li>
                    <a href="#">帖子管理</a>
                </li>
                <li class="active">精品贴管理</li>
            </ul><!-- .breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form  method="get" action="{{url('/admin/thread/select')}}">
                {{ csrf_field() }}
                <span class="input-icon">
									<input type="text" placeholder="Search ..." name="search" class="nav-search-input"
                                           id="nav-search-input" autocomplete="off"/>

									<i class="icon-search nav-search-icon"></i>
									<button class="btn btn-xs btn-info" type="submit">搜索</button>
								</span>
                </form>
            </div><!-- #nav-search -->
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    帖子管理
                    <small>
                        <i class="icon-double-angle-right"></i>
                        精品贴管理
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
                                        <th>TID</th>
                                        <th>所属版块(FID)</th>
                                        <th>作者</th>
                                        <th>作者id</th>
                                        <th>帖子标题</th>
                                        {{--<th>精华帖</th>--}}
                                        {{--<th>置顶帖</th>--}}
                                        {{--<th>点击数(次)</th>--}}
                                        {{--<th>回复数(次)</th>--}}
                                        {{--<th>发帖时间</th>--}}
                                        {{--<th>最后回复时间</th>--}}
                                        {{--<th>状态</th>--}}
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    @if(!($result[0] == null))
                                    @foreach( $result as $k => $v )
                                            <tr>
                                                <td class="center">
                                                    <label>
                                                        <input type="checkbox" class="ace"/>
                                                        <span class="lbl"></span>
                                                    </label>
                                                </td>


                                                <td>{{$v->tid}}</td>
                                                <td>{{$v->name}}({{$v->fid}})</td>
                                                <td>{{$v->tauthor}}</td>
                                                <td>{{$v->tauthorid}}</td>
                                                <td>{{$v->title}}</td>
                                                <td>
                                                    @if (($v->best) === 1)
                                                        <a href="{{url('/admin/thread/edit')}}/{{$v->tid}}/best/0/{{$v->fid}}">取消加精</a>
                                                    @else
                                                        <a href="{{url('/admin/thread/edit')}}/{{$v->tid}}/best/1/{{$v->fid}}">否</a>
                                                    @endif
                                                {{--<td>--}}
                                                    {{--@if (($v->top) === 1)--}}
                                                        {{--<a href="{{url('/admin/thread/edit')}}/{{$v->tid}}/top/0">是</a>--}}
                                                    {{--@else--}}
                                                        {{--<a href="{{url('/admin/thread/edit')}}/{{$v->tid}}/top/1">否</a>--}}
                                                    {{--@endif--}}
                                                {{--</td>--}}
                                                {{--<td>{{$v->clicknumber}}</td>--}}
                                                {{--<td>{{$v->renumber}}</td>--}}
                                                {{--<td>{{$v->tdateline}}</td>--}}
                                                {{--<td>{{$v->replies}}</td>--}}
                                                {{--<td>--}}
                                                    {{--@if (($v->tstatus) === 0)--}}
                                                        {{--<a href="{{url('/admin/thread/edit')}}/{{$v->tid}}/tstatus/1">开放</a>--}}
                                                    {{--@else--}}
                                                        {{--<a href="{{url('/admin/thread/edit')}}/{{$v->tid}}/tstatus/0">禁用</a>--}}
                                                    {{--@endif--}}
                                                {{--</td>--}}
                                                {{--<td><a href="{{url('/admin/thread/delete')}}/{{$v->tid}}">删</a></td>--}}
                                                |<button class="btnclick" name={{$v->tid}}/{{$v->fid}} >删除</button></td>
                                            </tr>


                                    @endforeach
                                    @else
                                        <tr class="center">
                                            <td>暂无待处理帖子</td>
                                            </tr>
                                     @endif
{{--{{var_dump($result)}}{{die}}--}}

                                </table>
                                {{ $result->links() }}
                            </div><!-- /.table-responsive -->
                        </div><!-- /span -->
                    </div><!-- /row -->

                    <div class="hr hr-18 dotted hr-double"></div>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

    <script>


        $(function(){
            $('.btnclick').click(function(){
                var id = $(this).attr("name");
                var path = '{{url('/admin/thread/delete')}}/'+id;
//                console.log(path);
                $.ajax({
                    type: 'get',
                    url: path,
                    success: function (){
                        alert('删除成功!');
//                        console.log(path);
                    },
                    error: function (){
                        alert('删除出现错误!');
//                        console.log(path);
                    }
                });
            })
        })
    </script>



@endsection