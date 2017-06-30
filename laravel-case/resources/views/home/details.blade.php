@extends('/home.public.layout')

@section('main-content')

    <div style="width: 80%;margin: auto;;">

        <div class="read_pages_wrap cc" style="margin: 20px 20px 20px 20px;">
            <a rel="nofollow" href="{{url('/home/reply/'.$post[0]->tid)}}" data-referer="true" class="btn_replay J_qlogin_trigger">回复</a>
            <div class="pages" style="margin-right:3px;"><a href="{{url('/home/blog/'.$post[0]->fid)}}" class="pages_pre" rel="nofollow">« 返回版块页</a></div>

        </div>
        <div class="floor cc J_read_floor" id="read_0">
            <table width="100%" style="table-layout:fixed;" class="floor_table">
                <tbody><tr>
                    <td rowspan="2" class="floor_left">
                        <div class="floor_info">
                            <!--头像-->
                            <div class="face">
                                <a href="http://www.phpwind.net/u/658925" class="J_user_card_show" data-uid="658925" target="_blank"><img src="file:///D:/%E9%98%B2%E7%AB%99%E5%B0%8F%E5%B7%A5%E5%85%B7/www.phpwind.net/picture/658925_middle.jpg" class="J_avatar" data-type="middle" alt="phpwind"></a>
                            </div>
                            <!--用户名-->
                            <div class="name">
                                <span class="man_unol" title="离线"></span><a href="http://www.phpwind.net/u/658925" class="J_user_card_show mr5" data-uid="658925">{{$post[0]->pauthor}}</a>
                            </div>
                            <!--等级-->
                            <div class="level">
                                <div>管理员</div>
                                <img src="picture/20.gif" alt="管理员">
                            </div>
                            <!--相关数据-->
                            <ul class="cc integral">
                                <li><em>发帖数</em><a href="http://www.phpwind.net/index.php?m=space&amp;c=thread&amp;uid=658925" target="_blank">340</a></li>
                                <li><em>铜币</em><span title="8597两">8597两</span></li>
                                <li><em>威望</em><span title="6551点">6551点</span></li>
                                <li><em>贡献</em><span title="3659点">3659点</span></li>
                                <li><em>注册日期</em><span>2006-03-23</span></li>
                                <li><em>最后登录</em><span>2017-02-13</span></li>
                            </ul>
                            <!--发私信加关注-->
                            <div class="operate cc">
                                <a rel="nofollow" href="http://www.phpwind.net/index.php?m=my&amp;c=follow&amp;a=add" data-uid="658925" class="follow J_read_follow J_qlogin_trigger">加关注</a>
                                <a rel="nofollow" href="http://www.phpwind.net/index.php?m=message&amp;c=message&amp;a=pop&amp;username=phpwind" class="message J_send_msg_pop J_qlogin_trigger" data-name="phpwind">写私信</a>
                            </div>

                            <div class="medal">
                                <ul class="cc">
                                    <li><a rel="nofollow" href="http://www.phpwind.net/index.php?m=medal"><img src="picture/ce5d3069e47447e.gif" title="社区明星" width="30" height="30" alt="社区明星"></a></li>
                                </ul>
                            </div>

                            <!--广告位-->

                            <!--信息栏结束-->
                        </div>
                    </td>
                    <td class="box_wrap floor_right">
                        <div class="fl"><div class="floor_arrow"><em></em><span></span></div></div>
                        <div class="floor_title cc">
                            <div class="post_num">
                                <span class="hits">阅读：<em>{{$post[0]->clicknumber}}</em></span><span class="replies">回复：<em id="topicRepliesNum">{{$post[0]->renumber}}</em></span>
                            </div>
                            <h1 id="J_post_title">{{$post[0]->title}}</h1>
                            <span class="floor_honor posts_icon">
					<i class="icon_headtopic_1" title="置顶"></i><i class="icon_topichot" title="热门"></i>				</span>
                        </div>
                        <div class="c"></div>
                        <div class="floor_top_tips cc">
                            <div style="position:relative;"><span class="lou J_floor_copy" title="复制此楼地址"></span>

                                <span class="fl">{{$post[0]->tdateline}}	</span>
                            </div>
                            <div id="J_read_main">
                                <div id="J_read_tag_wrap" class="read_tag_list">
                                </div>
                                <!--=========话题编辑=========-->
                                <div id="J_read_tag_edit" class="mb10 cc" style="display:none;">
                                    <form id="J_read_tag_form" action="http://www.phpwind.net/index.php?m=tag&amp;a=editReadTag&amp;tid=3709782" method="post">
                                        <div class="user_select_input J_user_tag_wrap fl mr10">
                                            <ul class="fl J_user_tag_ul"></ul>
                                            <input class="J_user_tag_input" data-name="tagnames[]" type="text">
                                        </div>
                                        <button id="J_read_tag_sub" class="btn btn_submit">保存</button>
                                        <input type="hidden" name="csrf_token" value="8573eeaee7bcfd3e"><input type="hidden" name="csrf_token" value="8573eeaee7bcfd3e"></form>
                                </div>
                                <div class="fr">
                                    <!--开始右侧广告位-->

                                    <!--结束右侧广告位-->
                                </div>
                                <div class="editor_content">


                                    <p>{{$post[0]->pmessage}}</p>



                                </div>


                <tr>
                    <td class="box_wrap floor_bottom" valign="bottom">

                        <style>
                            /*评分列表*/
                            .read_mark_list{
                            }
                            .read_mark_list .hd{
                                padding:8px 10px 7px;
                                height:18px;
                                background:#f4f4f4;
                                border-bottom:1px solid #e4e4e4;
                            }
                            .a_mark_manage{
                                float:right;
                            }
                            .read_mark_list li{
                                overflow:hidden;
                                padding:7px 10px;
                                border-bottom:1px dotted #e4e4e4;
                            }
                            .read_mark_list li div.face,
                            .read_mark_list li div.name,
                            .read_mark_list li div.num,
                            .read_mark_list li div.detail,
                            .read_mark_list li div.time,
                            .read_mark_list li div.checkbox{
                                float:left;
                                line-height:30px;
                                height:30px;
                                overflow:hidden;
                                white-space:nowrap;
                                text-overflow:ellipsis;
                                -ms-text-overflow:ellipsis;
                            }
                            .read_mark_list li div.face{
                                width:35px;
                            }
                            .read_mark_list li div.name{
                                width:80px;
                            }
                            .read_mark_list li div.num{
                                width:90px;
                            }
                            .read_mark_list li div.time{
                                float:right;
                                width:100px;
                                text-align:right;
                                color:#999;
                            }
                            .read_mark_list li div.detail{
                                width:400px;
                            }
                        </style>
                        <div class="read_mark_list">
                            <form class="J_marklist_form" action="" method="post">
                                <div class="hd">共<strong class="b org">13</strong>条评分，
                                    铜币&nbsp;<strong class="b org">+17</strong>
                                    威望&nbsp;<strong class="b org">+12</strong>
                                </div>

                                //评论区
                                <ul>
                                    <li class="cc">
                                        <div class="face"><a href="" target="_blank" class="J_user_card_show face" data-uid="2378741"><img class="J_avatar" src="{{asset('home/picture/2378741_small.jpg')}}" data-type="small" alt="zdmai007" width="30" height="30"></a></div>
                                        <div class="name"><a href="http://www.phpwind.net/u/2378741" target="_blank" class="J_user_card_show face" data-uid="2378741">zdmai007</a></div>
                                        <div class="num">威望&nbsp;<strong class="org b">+5</strong></div>
                                        <div class="detail">精彩分享！！！</div>
                                        <div class="time">2016-11-19 14:58</div>
                                    </li>


                                </ul>




                                <div class="read_appbtn_wrap">
                                    <a role="button" rel="nofollow" href="" data-tid="3709782" data-pid="0" data-fid="163" class="icon_read_like J_like_btn J_qlogin_trigger" data-role="main" data-typeid="1" data-fromid="3709782">
                                        <span>喜欢</span><em class="J_like_count">29</em>
                                    </a>



                                    <style>
                                        /*评分按钮*/
                                        .read_appbtn_wrap{
                                            height:30px;
                                            padding:20px 0;
                                            position:relative;
                                        }
                                        .icon_read_like{
                                            margin:0;
                                            position:absolute;
                                            left:50%;
                                            margin-left:-120px;
                                        }
                                        .icon_read_mark{
                                            left:50%;
                                            margin-left:5px;
                                            position:absolute;
                                            width:115px;
                                            height:25px;
                                            background:url(images/icon_read_mark.png) no-repeat;
                                            display:block;
                                            line-height:25px;
                                            cursor:pointer;
                                            overflow:hidden;
                                        }
                                        .icon_read_mark span{
                                            float:left;
                                            display:block;
                                            width:0;
                                            height:0;
                                            overflow:hidden;
                                            font:0/0 Arial;
                                            padding:0;
                                            margin:0;
                                        }
                                        .icon_read_mark em{
                                            float:right;
                                            width:47px;
                                            height:25px;
                                            color:#3982c2;
                                            text-align:center;
                                            font-weight:700;
                                            text-indent:0;
                                            overflow:hidden;
                                            display:block;
                                        }
                                        .icon_read_mark:hover{
                                            filter:alpha(opacity=90);
                                            -moz-opacity:0.9;
                                            opacity:0.9;
                                            text-decoration:none;
                                        }
                                    </style>

                                    <script>
                                        Wind.ready('global.js', function(){
                                            Wind.js('http://www.phpwind.net/themes/extres/mark/js/mark.min.js?v=' + GV.JS_VERSION);
                                        });
                                    </script>

                                </div>
                                <div style="" id="J_read_like_list" class="read_like_list cc">


                                </div>



                                <script type="text/javascript">
                                    var jiathis_config = {data_track_clickback:'true'};
                                </script>
                                <script type="text/javascript" src="{{asset('/home/js/jia.js&#10;')}}" charset="utf-8"></script>

                                <div class="floor_bottom_tips cc">
								<span class="fr">
									</span>
                                    <a rel="nofollow" href="#floor_reply" data-hash="floor_reply" class="a_reply" id="J_readreply_main">回复</a>
                                </div>
                                <div style="display:none;" class="J_reply_wrap" id="J_reply_wrap_0"><div class="pop_loading"></div></div>
                    </td>
                </tr>
                </tbody></table>
        </div>



        @foreach( $reply as $k => $v )

            <div class="design_layout_ct"><div class="design_layout_3_1_left J_layout_item"><div id="J_mod_190" style="" data-id="190" data-model="image" class="mod_box J_mod_box"><a href="http://click.aliyun.com/m/4095/" target="_blank"><img src="picture/tb1glvklvxxxxxpxvxxasup.pxx-900-90.jpg"></a></div></div><div class="design_layout_3_1_right J_layout_item"><div id="J_mod_191" style="" data-id="191" data-model="image" class="mod_box J_mod_box"><a href="http://market.aliyun.com/products/55586021/cmjz000388.html?spm=5176.9000004.0.0.ZQBEbS" target="_blank"><img src="picture/aaced9a54f1e9d0.jpg"></a></div></div></div>



            <div class="floor cc J_read_floor" id="read_20546433">
                <table width="100%" style="table-layout:fixed;" class="floor_table">
                    <tbody>
                    <tr>
                        <td rowspan="2" class="floor_left">
                            <div class="floor_info">
                                <!--头像-->
                                <div class="face">
                                    <a href="http://www.phpwind.net/u/1791908" class="J_user_card_show" data-uid="1791908" target="_blank"><img src="file:///D:/%E9%98%B2%E7%AB%99%E5%B0%8F%E5%B7%A5%E5%85%B7/www.phpwind.net/picture/1791908_middle.jpg" class="J_avatar" data-type="middle" alt="cbrook"></a>
                                </div>
                                <!--用户名-->
                                <div class="name">
                                    <span class="man_unol" title="离线"></span><a href="http://www.phpwind.net/u/1791908" class="J_user_card_show mr5" data-uid="1791908">{{$v->rauthor}}</a>
                                </div>
                                <!--等级-->
                                <div class="level">
                                    <div>五星会员</div>
                                    <img src="picture/8.gif" alt="五星会员">
                                </div>
                                <!--相关数据-->
                                <ul class="cc integral">
                                    <li><em>发帖数</em><a href="http://www.phpwind.net/index.php?m=space&amp;c=thread&amp;uid=1791908" target="_blank">11732</a></li>
                                    <li><em>铜币</em><span title="5684两">5684两</span></li>
                                    <li><em>威望</em><span title="11048点">11048点</span></li>
                                    <li><em>贡献</em><span title="689点">689点</span></li>
                                    <li><em>注册日期</em><span>2008-12-27</span></li>
                                    <li><em>最后登录</em><span>2016-06-18</span></li>
                                    <li><em>来自ip:</em><span>{{$v->rauthorip}}</span></li>
                                </ul>
                                <!--发私信加关注-->
                                <div class="operate cc">
                                    <a rel="nofollow" href="http://www.phpwind.net/index.php?m=my&amp;c=follow&amp;a=add" data-uid="1791908" class="follow J_read_follow J_qlogin_trigger">加关注</a>
                                    <a rel="nofollow" href="http://www.phpwind.net/index.php?m=message&amp;c=message&amp;a=pop&amp;username=cbrook" class="message J_send_msg_pop J_qlogin_trigger" data-name="cbrook">写私信</a>
                                </div>

                                <div class="medal">
                                    <ul class="cc">
                                        <li><a rel="nofollow" href="http://www.phpwind.net/index.php?m=medal"><img src="picture/3fb3d652528a728.gif" title="社区居民" width="30" height="30" alt="社区居民"></a></li>
                                        <li><a rel="nofollow" href="http://www.phpwind.net/index.php?m=medal"><img src="picture/0b4c6bde77be92b.gif" title="忠实会员" width="30" height="30" alt="忠实会员"></a></li>
                                        <li><a rel="nofollow" href="http://www.phpwind.net/index.php?m=medal"><img src="picture/7cb66654c529db7.gif" title="最爱沙发" width="30" height="30" alt="最爱沙发"></a></li>
                                        <li><a rel="nofollow" href="http://www.phpwind.net/index.php?m=medal"><img src="picture/ce5d3069e47447e.gif" title="社区明星" width="30" height="30" alt="社区明星"></a></li>
                                    </ul>
                                </div>

                                <!--广告位-->

                                <!--信息栏结束-->
                            </div>
                        </td>
                        <td class="box_wrap floor_right">
                            <div class="fl"><div class="floor_arrow"><em></em><span></span></div></div>
                            <div class="c"></div>
                            <div class="floor_top_tips cc">
                                <div style="position:relative;"><span class="lou J_floor_copy" title="复制此楼地址" data-hash="read_20546433">1<sup>#</sup></span></div>
                                <span class="fl">发布于：{{$v->rdateline}}				</span>
                            </div>
                            <div id="J_read_main">
                                <div class="fr">
                                    <!--开始右侧广告位-->

                                    <!--结束右侧广告位-->
                                </div>
                                <div class="editor_content">
                                    {{$v->rmessage}}				</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="box_wrap floor_bottom" valign="bottom">
                            <div id="app_read_floor_1"></div>
                            <div class="signature" style="max-height:100px;maxHeight:100px;"><table width="100%"><tbody><tr><td><a href="http://www.uyulu.cn " target="_blank">情感语录</a><a href="http://www.740c.com " target="_blank">内涵笑话</a><br><a href="http://www.xghmzx.com " target="_blank">孝感华美整形</a><br><a href="http://www.xghmyy.com " target="_blank">孝感双眼皮</a></td></tr></tbody></table>

                            </div>

                            <div class="floor_bottom_tips cc">
                        <span class="fr">
									</span>
                                <a rel="nofollow" href="http://www.phpwind.net/index.php?c=post&amp;a=fastreply&amp;tid=3709782&amp;pid=20546433" data-pid="20546433" class="a_reply J_read_reply" data-topped="false">回复<span style="display:none">(0)</span></a>
                                <a rel="nofollow" href="http://www.phpwind.net/index.php?m=like&amp;c=mylike&amp;a=doLike" data-tid="3709782" data-pid="20546433" data-fid="163" class="a_like J_like_btn J_qlogin_trigger" data-typeid="2" data-fromid="20546433">喜欢</a><span style="">(<a class="J_like_user_btn a_like_num" data-pid="20546433" href="http://www.phpwind.net/index.php?m=like&amp;c=like&amp;a=getLast&amp;typeid=2&amp;fromid=20546433">1</a>)</span>


                                &nbsp;&nbsp;&nbsp;&nbsp;<a role="button" rel="nofollow" href="#" data-pid="20546433" data-uri="http://www.phpwind.net/index.php?m=app&amp;a=mark&amp;tid=3709782&amp;pid=20546433&amp;app=mark" class="J_plugin_read_mark" id=""><span>评分</span></a>
                                <script>
                                    Wind.ready('global.js', function(){
                                        Wind.js('http://www.phpwind.net/themes/extres/mark/js/mark.min.js?v=' + GV.JS_VERSION);
                                    });
                                </script>

                            </div>
                            <div style="display:none;" class="J_reply_wrap" id="J_reply_wrap_20546433"><div class="pop_loading"></div></div>
                        </td>
                    </tr>
                    </tbody></table>
            </div>

        @endforeach

        <div class="read_pages_wrap cc" id="floor_reply">
            {{--<a rel="nofollow" href="http://www.phpwind.net/index.php?c=post&amp;fid=163" id="J_read_post_btn" class="btn_post J_qlogin_trigger">发帖</a>--}}
            <!-- 锁定时间 -->
            <a rel="nofollow" href="{{url('/home/reply/'.$post[0]->tid)}}" data-referer="true" class="btn_replay J_qlogin_trigger">回复</a>
            <div class="J_page_wrap" data-key="true">
                <div class="pages" style="margin-right:3px;"><a href="{{url('/home/blog/'.$post[0]->fid)}}" class="pages_pre" rel="nofollow">« 返回版块页</a></div>

            </div>
        </div>
    </div>
</div>
@endsection