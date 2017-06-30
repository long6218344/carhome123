@extends('admin.public.layout')

@section('main-content')
    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="__APP__">后台主页</a>
                </li>

                <li>
                    <a href="#">权限管理</a>
                </li>
                <li class="active">权限列表</li>
            </ul><!-- .breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
                </form>
            </div><!-- #nav-search -->
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    用户组权限
                    <small>
                        <i class="icon-double-angle-right"></i>
                        用户权限
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <form action="/admin/powergroupupdate" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="gid" value="{{$info->gid}}" />
                                    {{csrf_field()}}
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th colspan="2" align="left">基本权限</th>
                                        </tr>
                                        </thead>
                                        <thead>
                                        <tr>
                                            <th colspan="2" align="left">用户组设置</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>用户组头衔</td>
                                            <td><input type="text" name="groupname" size="40" value="{{$info->groupname}}" /></td>
                                        </tr>
                                        <tr>
                                            <td>用户组图标</td>
                                            <td><input type="file" name="groupicon" size="40" /><img height="20px" src="{{url(asset($info->groupicon))}}"></td>
                                        </tr>
                                        <tr>
                                            <td>升级点数</td>
                                            <td><input type="text" name="points" size="40" value="{{$info->points}}" /></td>
                                        </tr>
                                        </tbody>
                                        <thead>
                                        <tr>
                                            <th colspan="2" align="left">基本权限</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--<tr>--}}
                                            {{--<td>站点访问</td>--}}
                                            {{--<td><input type="radio" name="allow_visit" value="1" {{$info->allow_visit ? 'checked' : ''}} />开启　　--}}
                                                {{--　　　　　　　--}}
                                                {{--<input type="radio" name="allow_visit" value="0" {{$info->allow_visit ? '' : 'checked'}} />关闭--}}
                                                {{--　　　　　　　　　　　--}}
                                                {{--<span style="color:#ddd;font-size:12px;">关闭后，用户将不能访问站点的任何页面</span>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        <tr>
                                            <td>使用举报</td>
                                            <td><input type="radio" name="use_inform" value="1" {{$info->use_inform ? 'checked' : ''}} />开启　　
                                                　　　　　　　
                                                <input type="radio" name="use_inform" value="0" {{$info->use_inform ? '' : 'checked'}} />关闭
                                                　　　　　　　　　　　
                                        </tr>
                                        <tr>
                                            <td>查看用户IP</td>
                                            <td><input type="radio" name="look_user_ip" value="1" {{$info->look_user_ip ? 'checked' : ''}} />开启　　
                                                　　　　　　　
                                                <input type="radio" name="look_user_ip" value="0" {{$info->look_user_ip ? '' : 'checked'}} />关闭
                                                　　　　　　　　　　　
                                        </tr>
                                        </tbody>
                                        <thead>
                                        <tr>
                                            <th colspan="2" align="left">内容发布设置</th>
                                        </tr>
                                        </thead>
                                        {{--<tbody>--}}
                                        {{--<tr>--}}
                                            {{--<td>允许上传</td>--}}
                                            {{--<td><input type="radio" name="allow_upload" value="1" {{$info->allow_upload ? 'checked' : ''}} />开启　　--}}
                                                {{--　　　　　　　--}}
                                                {{--<input type="radio" name="allow_upload" value="0" {{$info->allow_upload ? '' : 'checked'}} />关闭--}}
                                                {{--　　　　　　　　　　　--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>允许下载</td>--}}
                                            {{--<td><input type="radio" name="allow_download" value="1" {{$info->allow_download ? 'checked' : ''}} />开启　　--}}
                                                {{--　　　　　　　--}}
                                                {{--<input type="radio" name="allow_download" value="0" {{$info->allow_download ? '' : 'checked'}} />关闭--}}
                                                {{--　　　　　　　　　　　--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}
                                        <thead>
                                        <tr>
                                            <th colspan="2" align="left">消息</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>发送消息</td>
                                            <td><input type="radio" name="message_allow_send" value="1" {{$info->message_allow_send ? 'checked' : ''}} />开启　　
                                                　　　　　　　
                                                <input type="radio" name="message_allow_send" value="0" {{$info->message_allow_send ? '' : 'checked'}} />关闭
                                                　　　　　　　　　　　
                                                <span style="color:#ddd;font-size:12px;">开启后，用户才有权限发送站内消息</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>每日发送消息条数</td>
                                            <td><input type="text" name="message_max_send" size="40" value="{{$info->message_max_send}}"/>
                                                　　　　　
                                                <span style="color:#ddd;font-size:12px;">设置用户每天允许发送多少条消息</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                        {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<th colspan="2" align="left">提醒设置</th>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody>--}}
                                        {{--<tr>--}}
                                            {{--<td>提醒功能</td>--}}
                                            {{--<td><input type="radio" name="remind_open" value="1" {{$info->remind_open ? 'checked' : ''}} />开启　　--}}
                                                {{--　　　　　　　--}}
                                                {{--<input type="radio" name="remind_open" value="0" {{$info->remind_open ? '' : 'checked'}} />关闭--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}
                                        <thead>
                                        <tr>
                                            <th colspan="2" align="left">论坛权限</th>
                                        </tr>
                                        </thead>
                                        <thead>
                                        <tr>
                                            <th colspan="2" align="left">帖子权限</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>浏览帖子</td>
                                            <td><input type="radio" name="allow_read" value="1" {{$info->allow_read ? 'checked' : ''}} />开启　　
                                                　　　　　　　
                                                <input type="radio" name="allow_read" value="0" {{$info->allow_read ? '' : 'checked'}} />关闭
                                                　　　　　　　　　　　
                                                <span style="color:#ddd;font-size:12px;">开启后，用户可以浏览帖子</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>发表帖子</td>
                                            <td><input type="radio" name="allow_post" value="1" {{$info->allow_post ? 'checked' : ''}} />开启　　
                                                　　　　　　　
                                                <input type="radio" name="allow_post" value="0" {{$info->allow_post ? '' : 'checked'}} />关闭
                                                　　　　　　　　　　　
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>发表回复</td>
                                            <td><input type="radio" name="allow_reply" value="1" {{$info->allow_reply ? 'checked' : ''}} />开启　　
                                                　　　　　　　
                                                <input type="radio" name="allow_reply" value="0" {{$info->allow_reply ? '' : 'checked'}} />关闭
                                                　　　　　　　　　　　
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>帖子审核</td>
                                            <td><input type="radio" name="post_check" value="1" {{$info->post_check ? 'checked' : ''}} />开启　　
                                                　　　　　　　
                                                <input type="radio" name="post_check" value="0" {{$info->post_check ? '' : 'checked'}} />关闭
                                                　　　　　　　　　　　
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>每次发表帖子数</td>
                                            <td><input type="text" name="post_max_num" size="40" value="{{$info->post_max_num}}"/>
                                                　　　　　
                                                <span style="color:#ddd;font-size:12px;">设置用户每天允许发表帖子数目</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                        {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<th colspan="2" align="left">投票设置</th>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody>--}}
                                        {{--<tr>--}}
                                            {{--<td>发布投票</td>--}}
                                            {{--<td><input type="radio" name="allow_add_vote" value="1" {{$info->allow_add_vote ? 'checked' : ''}} />开启　　--}}
                                                {{--　　　　　　　--}}
                                                {{--<input type="radio" name="allow_add_vote" value="0" {{$info->allow_add_vote ? '' : 'checked'}} />关闭--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>参与投票</td>--}}
                                            {{--<td><input type="radio" name="allow_participate_vote" value="1" {{$info->allow_participate_vote ? 'checked' : ''}} />开启　　--}}
                                                {{--　　　　　　　--}}
                                                {{--<input type="radio" name="allow_participate_vote" value="0" {{$info->allow_participate_vote ? '' : 'checked'}} />关闭--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>查看投票人员</td>--}}
                                            {{--<td><input type="radio" name="look_user_ip" value="1" {{$info->look_user_ip ? 'checked' : ''}} />开启　　--}}
                                                {{--　　　　　　　--}}
                                                {{--<input type="radio" name="look_user_ip" value="0" {{$info->look_user_ip ? '' : 'checked'}} />关闭--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}
                                        <div style="position:fixed;top:700px;width:100%;height:40px;background-color:#ddd;line-height:40px;padding-left:30px;">
                                            <button type="submit" class="btn btn-xs btn-info">提交</button>
                                        </div>
                                    </table>
                                </form>
                            </div><!-- /.table-responsive -->
                        </div><!-- /span -->
                    </div><!-- /row -->

                    <div class="hr hr-18 dotted hr-double"></div>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->
    {{--@if(!empty(session('error')))--}}
        {{--<script>--}}
            {{--alert('{{session('error')}}');--}}
        {{--</script>--}}
    {{--@endif--}}
@endsection