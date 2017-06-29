@extends('admin.public.layout')

@section('plugin')
    <script src="{{asset('/js/admin/jquery.js')}}"></script>
@endsection
@section('main-content')
    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="#">规则管理</a>
                </li>


                <li class="active">添加规则</li>
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

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <form action="/admin/authrule/insert" method="post">
                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            {{csrf_field()}}
                            <tr>
                                <th class="center" style="width:100px;">
                                    <label>
                                        <input type="checkbox" class="ace" id="ischeck" />
                                        <span class="lbl"></span>
                                    </label>
                                </th>
                                <th style="width:200px;">控制器</th>
                                <th>方法</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"  />
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td class="hidden-480">后台基本操作</td>
                                <td class="hidden-480">
                                    <label><input type="checkbox" class="ace" name="Index/person" value="后台个人中心"><span class="lbl"> 后台个人中心</span></label>
                                    <label><input type="checkbox" class="ace" name="Index/dateTime" value="后台日历"><span class="lbl"> 后台日历</span></label>

                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"  />
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td class="hidden-480">用户操作管理</td>
                                <td class="hidden-480">
                                    <label><input type="checkbox" class="ace" name="User/index" value="查看用户"><span class="lbl"> 查看用户</span></label>
                                    <label><input type="checkbox" class="ace" name="User/add" value="添加用户页面"><span class="lbl"> 添加用户页面</span></label>
                                    <label><input type="checkbox" class="ace" name="User/insert" value="执行添加用户"><span class="lbl"> 执行添加用户</span></label>
                                    <label><input type="checkbox" class="ace" name="User/mod" value="用户修改页面"><span class="lbl"> 用户修改页面</span></label>
                                    <label><input type="checkbox" class="ace" name="User/update" value="执行用户修改"><span class="lbl"> 执行用户修改</span></label>
                                    <label><input type="checkbox" class="ace" name="User/del" value="删除用户"><span class="lbl"> 删除用户</span></label>
                                    <label><input type="checkbox" class="ace" name="User/setGroup" value="设置用户组"><span class="lbl"> 设置用户组</span></label>
                                    <label><input type="checkbox" class="ace" name="User/updateGroup" value="执行修改用户组"><span class="lbl"> 执行修改用户组</span></label>
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"  />
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td class="hidden-480">权限操作管理</td>
                                <td class="hidden-480">
                                    <label><input type="checkbox" class="ace" name="UserGroup/members" value="查看会员组权限"><span class="lbl"> 查看会员组权限</span></label>
                                    <label><input type="checkbox" class="ace" name="UserGroup/defaults" value="查看默认组权限"><span class="lbl"> 查看默认组权限</span></label>
                                    <label><input type="checkbox" class="ace" name="UserGroup/systems" value="查看管理组权限"><span class="lbl"> 查看管理组权限</span></label>
                                    <label><input type="checkbox" class="ace" name="UserGroup/insert" value="添加会员组权限"><span class="lbl"> 添加会员组权限</span></label>
                                    <label><input type="checkbox" class="ace" name="UserGroup/mod" value="用户组权限页面"><span class="lbl"> 用户组权限页面</span></label>
                                    <label><input type="checkbox" class="ace" name="UserGroup/update" value="执行用户组权限修改"><span class="lbl"> 执行用户组权限修改</span></label>
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"  />
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td class="hidden-480">管理组操作管理</td>
                                <td class="hidden-480">
                                    <label><input type="checkbox" class="ace" name="AuthGroup/index" value="查看管理组列表"><span class="lbl"> 查看管理组列表</span></label>
                                    <label><input type="checkbox" class="ace" name="AuthGroup/add" value="添加管理组页面"><span class="lbl"> 添加管理组页面</span></label>
                                    <label><input type="checkbox" class="ace" name="AuthGroup/insert" value="执行添加管理组"><span class="lbl"> 执行添加管理组</span></label>
                                    <label><input type="checkbox" class="ace" name="AuthGroup/mod" value="修改管理组页面"><span class="lbl"> 修改管理组页面</span></label>
                                    <label><input type="checkbox" class="ace" name="AuthGroup/update" value="执行修改管理组"><span class="lbl"> 执行修改管理组</span></label>
                                    <label><input type="checkbox" class="ace" name="AuthGroup/del" value="删除管理组"><span class="lbl"> 删除管理组</span></label>
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"  />
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td class="hidden-480">规则操作管理</td>
                                <td class="hidden-480">
                                    <label><input type="checkbox" class="ace" name="AuthRule/index" value="添加规则列表页面"><span class="lbl"> 添加规则列表页面</span></label>
                                    <label><input type="checkbox" class="ace" name="AuthRule/insert" value="执行添加规则"><span class="lbl"> 执行添加规则</span></label>
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"  />
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td class="hidden-480">导航操作管理</td>
                                <td class="hidden-480">
                                    <label><input type="checkbox" class="ace" name="Nav/index" value="导航栏目浏览"><span class="lbl"> 导航栏目浏览</span></label>
                                    <label><input type="checkbox" class="ace" name="Nav/add" value="添加导航栏目页面"><span class="lbl"> 添加导航栏目页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Nav/insert" value="执行添加导航栏目"><span class="lbl"> 执行添加导航栏目</span></label>
                                    <label><input type="checkbox" class="ace" name="Nav/mod" value="修改导航栏目页面"><span class="lbl"> 修改导航栏目页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Nav/update" value="执行修改导航栏目"><span class="lbl"> 执行修改导航栏目</span></label>
                                    <label><input type="checkbox" class="ace" name="Nav/del" value="删除导航栏目"><span class="lbl"> 删除导航栏目</span></label>
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"  />
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td class="hidden-480">版块操作管理</td>
                                <td class="hidden-480">
                                    <label><input type="checkbox" class="ace" name="Type/index" value="版块列表页"><span class="lbl"> 版块列表页</span></label>
                                    <label><input type="checkbox" class="ace" name="Type/add1" value="添加根版块页面"><span class="lbl"> 添加根版块页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Type/add2" value="添加子版块页面"><span class="lbl"> 添加子版块页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Type/insert1" value="执行添加根版块"><span class="lbl"> 执行添加根版块</span></label>
                                    <label><input type="checkbox" class="ace" name="Type/insert2" value="执行添加子版块"><span class="lbl"> 执行添加子版块</span></label>
                                    <label><input type="checkbox" class="ace" name="Type/mod" value="修改版块页面"><span class="lbl"> 修改版块页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Type/update" value="执行修改版块"><span class="lbl"> 执行修改版块</span></label>
                                    <label><input type="checkbox" class="ace" name="Type/del" value="删除板块"><span class="lbl"> 删除板块</span></label>
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"  />
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td class="hidden-480">帖子操作管理</td>
                                <td class="hidden-480">
                                    <label><input type="checkbox" class="ace" name="Card/index" value="帖子列表页"><span class="lbl"> 帖子列表页</span></label>
                                    <label><input type="checkbox" class="ace" name="Card/mod" value="修改帖子页面"><span class="lbl"> 修改帖子页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Card/update" value="执行修改帖子状态"><span class="lbl"> 执行修改帖子状态</span></label>
                                    <label><input type="checkbox" class="ace" name="Card/del" value="删除帖子"><span class="lbl"> 删除帖子</span></label>
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"  />
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td class="hidden-480">回复操作管理</td>
                                <td class="hidden-480">
                                    <label><input type="checkbox" class="ace" name="Comment/index" value="浏览回复信息页"><span class="lbl"> 浏览回复信息页</span></label>
                                    <label><input type="checkbox" class="ace" name="Comment/mod" value="修改回复信息页面"><span class="lbl"> 修改回复信息页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Comment/update" value="执行修改回复"><span class="lbl"> 执行修改回复</span></label>
                                    <label><input type="checkbox" class="ace" name="Comment/del" value="删除回复"><span class="lbl"> 删除回复</span></label>
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"  />
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td class="hidden-480">主题操作管理</td>
                                <td class="hidden-480">
                                    <label><input type="checkbox" class="ace" name="Verify/index" value="查看帖子主题信息"><span class="lbl"> 查看帖子主题信息</span></label>
                                    <label><input type="checkbox" class="ace" name="Verify/mod" value="处理帖子页面"><span class="lbl"> 处理帖子页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Verify/update" value="执行处理帖子"><span class="lbl"> 执行处理帖子</span></label>
                                </td>
                            </tr>

                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"  />
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td class="hidden-480">数据统计操作管理</td>
                                <td class="hidden-480">
                                    <label><input type="checkbox" class="ace" name="Total/index" value="浏览数据信息页面"><span class="lbl"> 浏览数据信息页面</span></label>
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"  />
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td class="hidden-480">敏感词操作管理</td>
                                <td class="hidden-480">
                                    <label><input type="checkbox" class="ace" name="Filter/index" value="浏览敏感词信息页面"><span class="lbl"> 浏览敏感词信息页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Filter/mod" value="修改敏感词页面"><span class="lbl"> 修改敏感词页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Filter/add" value="添加敏感词页面"><span class="lbl"> 添加敏感词页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Filter/insert" value="执行添加敏感词"><span class="lbl"> 执行添加敏感词</span></label>
                                    <label><input type="checkbox" class="ace" name="Filter/update" value="执行修改敏感词"><span class="lbl"> 执行修改敏感词</span></label>
                                    <label><input type="checkbox" class="ace" name="Filter/del" value="删除敏感词"><span class="lbl"> 删除敏感词</span></label>
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"  />
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td class="hidden-480">举报操作管理</td>
                                <td class="hidden-480">
                                    <label><input type="checkbox" class="ace" name="Inform/index1" value="浏览举报帖子页面"><span class="lbl"> 浏览举报帖子页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Inform/index2" value="浏览举报评论页面"><span class="lbl"> 浏览举报评论页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Inform/editCard" value="修改被举报的帖子"><span class="lbl"> 修改被举报的帖子</span></label>
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"  />
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td class="hidden-480">置顶操作管理</td>
                                <td class="hidden-480">
                                    <label><input type="checkbox" class="ace" name="Cardtop/index" value="浏览置顶信息页面"><span class="lbl"> 浏览置顶信息页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Cardtop/update" value="撤销置顶操作流程"><span class="lbl"> 撤销置顶操作流程</span></label>
                                </td>
                            </tr>
                            {{--<tr>--}}
                                {{--<td class="center">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" class="ace"  />--}}
                                        {{--<span class="lbl"></span>--}}
                                    {{--</label>--}}
                                {{--</td>--}}
                                {{--<td class="hidden-480">精华操作管理</td>--}}
                                {{--<td class="hidden-480">--}}
                                    {{--<label><input type="checkbox" class="ace" name="Essence/index" value="浏览精华信息页面"><span class="lbl"> 浏览精华信息页面</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Essence/update" value="撤销精华操作流程"><span class="lbl"> 撤销精华操作流程</span></label>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td class="center">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" class="ace"  />--}}
                                        {{--<span class="lbl"></span>--}}
                                    {{--</label>--}}
                                {{--</td>--}}
                                {{--<td class="hidden-480">友情链接操作管理</td>--}}
                                {{--<td class="hidden-480">--}}
                                    {{--<label><input type="checkbox" class="ace" name="Sharelikes/index" value="浏览友情链接页面"><span class="lbl"> 浏览友情链接页面</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Sharelikes/add" value="添加友情链接页面"><span class="lbl"> 添加友情链接页面</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Sharelikes/insert" value="执行添加友情链接"><span class="lbl"> 执行添加友情链接</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Sharelikes/mod" value="修改友情链接页面"><span class="lbl"> 修改友情链接页面</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Sharelikes/update" value="执行修改友情链接"><span class="lbl"> 执行修改友情链接</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Sharelikes/del" value="删除友情链接"><span class="lbl"> 删除友情链接</span></label>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td class="center">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" class="ace"  />--}}
                                        {{--<span class="lbl"></span>--}}
                                    {{--</label>--}}
                                {{--</td>--}}
                                {{--<td class="hidden-480">公告操作管理</td>--}}
                                {{--<td class="hidden-480">--}}
                                    {{--<label><input type="checkbox" class="ace" name="Announce/index" value="浏览公告信息页面"><span class="lbl"> 浏览公告信息页面</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Announce/add" value="添加公告页面"><span class="lbl"> 添加公告页面</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Announce/insert" value="执行添加公告"><span class="lbl"> 执行添加公告</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Announce/mod" value="修改公告页面"><span class="lbl"> 修改公告页面</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Announce/ueditor" value="编辑器"><span class="lbl"> 编辑器</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Announce/update" value="执行修改公告"><span class="lbl"> 执行修改公告</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Announce/del" value="删除公告"><span class="lbl"> 删除公告</span></label>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td class="center">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" class="ace"  />--}}
                                        {{--<span class="lbl"></span>--}}
                                    {{--</label>--}}
                                {{--</td>--}}
                                {{--<td class="hidden-480">勋章操作管理</td>--}}
                                {{--<td class="hidden-480">--}}
                                    {{--<label><input type="checkbox" class="ace" name="Medalinfo/index" value="浏览勋章信息页面"><span class="lbl"> 浏览勋章信息页面</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Medalinfo/add" value="添加勋章页面"><span class="lbl"> 添加勋章页面</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Medalinfo/insert" value="执行添加勋章"><span class="lbl"> 执行添加勋章</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Medalinfo/mod" value="修改勋章页面"><span class="lbl"> 修改勋章页面</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Medalinfo/update" value="执行修改勋章"><span class="lbl"> 执行修改勋章</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Medalinfo/del" value="删除勋章"><span class="lbl"> 删除勋章</span></label>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"  />
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td class="hidden-480">信息操作管理</td>
                                <td class="hidden-480">
                                    <label><input type="checkbox" class="ace" name="Message/index" value="浏览信息页面"><span class="lbl"> 浏览信息页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Message/add" value="添加信息页面"><span class="lbl"> 添加信息页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Message/ueditor" value="信息编辑器"><span class="lbl"> 信息编辑器</span></label>
                                    <label><input type="checkbox" class="ace" name="Message/insert" value="执行添加信息"><span class="lbl"> 执行添加信息</span></label>
                                    <label><input type="checkbox" class="ace" name="Message/del" value="删除信息"><span class="lbl"> 删除信息</span></label>
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <label>
                                        <input type="checkbox" class="ace"  />
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td class="hidden-480">积分操作管理</td>
                                <td class="hidden-480">
                                    <label><input type="checkbox" class="ace" name="Point/index" value="浏览积分页面"><span class="lbl"> 浏览积分页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Point/add" value="添加积分页面"><span class="lbl"> 添加积分页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Point/insert" value="执行添加积分"><span class="lbl"> 执行添加积分</span></label>
                                    <label><input type="checkbox" class="ace" name="Point/mod" value="修改积分页面"><span class="lbl"> 修改积分页面</span></label>
                                    <label><input type="checkbox" class="ace" name="Point/update" value="执行修改积分"><span class="lbl"> 执行修改积分</span></label>
                                    <label><input type="checkbox" class="ace" name="Point/del" value="删除积分"><span class="lbl"> 删除积分</span></label>
                                </td>
                            </tr>
                            {{--<tr>--}}
                                {{--<td class="center">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" class="ace"  />--}}
                                        {{--<span class="lbl"></span>--}}
                                    {{--</label>--}}
                                {{--</td>--}}
                                {{--<td class="hidden-480">广告操作管理</td>--}}
                                {{--<td class="hidden-480">--}}
                                    {{--<label><input type="checkbox" class="ace" name="Ads/index" value="浏览广告页面"><span class="lbl"> 浏览广告页面</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Ads/add" value="添加广告页面"><span class="lbl"> 添加广告页面</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Ads/ueditor" value="信息编辑器"><span class="lbl"> 广告编辑器</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Ads/insert" value="执行添加广告"><span class="lbl"> 执行添加广告</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Ads/mod" value="执行修改广告页面"><span class="lbl"> 执行修改广告页面</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Ads/update" value="执行修改广告"><span class="lbl"> 执行修改广告</span></label>--}}
                                    {{--<label><input type="checkbox" class="ace" name="Ads/del" value="删除广告"><span class="lbl"> 删除广告</span></label>--}}
                                {{--</td>--}}
                            </tr>
                            </tbody>
                            <tr>
                                <td colspan="3">
                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">


                                            <button class="btn btn-info" type="submit">
                                                <i class="icon-ok bigger-110"></i>
                                                添加
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" type="reset">
                                                <i class="icon-undo bigger-110"></i>
                                                重置
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection
@section('js')
    <script type="text/javascript">

        var aces = document.getElementsByClassName("ace");
        var len = aces.length;
        aces[0].onclick = function(){
            for(var i = 1; i < len; i++){
                aces[i].checked = aces[0].checked;
            }
        }
    </script>
@endsection
