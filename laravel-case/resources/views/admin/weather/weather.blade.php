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


                            <!DOCTYPE html>
                            <html>
                            <head>
                                <!--
                                <meta name="viewport"
                                    content="initial-scale=1.0, width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes"
                                    charset="UTF-8" http-equiv="Content-Type" />
                                    -->
                                <meta name="viewport"
                                      content="initial-scale=0.8, width=470, height=424, minimum-scale=0.6, maximum-scale=1.0, user-scalable=yes"
                                      charset="UTF-8" http-equiv="Content-Type" />
                                <title>天气预报</title>
                                <link type="text/css" rel="stylesheet" href="{{asset('/css/weather.css')}}" />
                                <script type="text/javascript">
                                    <!--
                                    function disTip(tipId,disValue){
                                        document.getElementById(tipId).style.display=disValue;
                                    }
                                    function clkTip(tipObj){
                                        tipObj.style.display='none';
                                    }

                                    //-->
                                </script>
                            </head>
                            <body>

                            <div class="op_weather4_twoicon_container_div">

                                <div class="op_weather4_twoicon" style="height: 424px;">
                                    <a weath-eff="[]" weath-bg="cloudy" target="_blank"
                                       class="op_weather4_twoicon_today OP_LOG_LINK">
                                        <p class="op_weather4_twoicon_date">{{$list->result->city}}    &nbsp;&nbsp;&nbsp;&nbsp;{{$list->result->week}} {{$list->result->date}}</p>
                                        <div
                                                style="background: url(http://www.baidu.com/aladdin/img/new_weath/bigicon/3.png); *background: none; *filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src=http://www.baidu.com/aladdin/img/new_weath/bigicon/{{$list->result->img}}.png)"
                                                class="op_weather4_twoicon_icon"></div>

                                        <p class="op_weather4_twoicon_temp">
                                            {{$list->result->temphigh}} ~ {{$list->result->templow}}<sup>℃</sup>
                                        </p>
                                        <p class="op_weather4_twoicon_weath">{{$list->result->winddirect}}</p>


                                        <!--PM标准0-35优，35-75良，75-115轻度污染，115-150中度污染，150-250重度污染，250及以上严重污染-->
                                        <!--background 优良(绿色)，轻度中度污染(橙色)，严重污染(红色)-->

                                    </a> <a weath-eff="{&quot;halo&quot;:1}" weath-bg="daytime"
                                            target="_blank" style="left: 188px"
                                            class="op_weather4_twoicon_day OP_LOG_LINK">













                                    </a>

                                    <!--阴天-->
                                    <div bg-name="cloudy" class="op_weather4_twoicon_bg" style="display:none;background-image:-webkit-linear-gradient(top,#485663,#a1b8ca);background-image:-moz-linear-gradient(top,#485663,#a1b8ca);background-image:-o-linear-gradient(top,#485663,#a1b8ca);background-image:-ms-linear-gradient(top,#485663,#a1b8ca);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr=#485663,EndColorStr=#a1b8ca); z-index: 0.01; opacity: 1; height: 424px;">
                                    </div>


                                    <!--晴天-->
                                    <div bg-name="daytime" class="op_weather4_twoicon_bg" style=";background-image:-webkit-linear-gradient(top,#0d68bc,#72ade0);background-image:-moz-linear-gradient(top,#0d68bc,#72ade0);background-image:-o-linear-gradient(top,#0d68bc,#72ade0);background-image:-ms-linear-gradient(top,#0d68bc,#72ade0);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr=#0d68bc,EndColorStr=#72ade0); z-index: 2; opacity: 1; height: 700px;">
                                    </div>

                                </div>


                                <div class="op_weather4_xiala">
                                    <div style="display: block;" class="op_weather4_xltabcontent">
                                        <div class="op_weather4_xltab c-clearfix">
                                            <ul>
                                                <li data-click="{fm:'beha'}"
                                                    class="OP_LOG_BTN op_weather4_xlactive"><span
                                                            class="op_weather4_xlfilter">相关指数</span></li>
                                            </ul>
                                        </div>
                                        <div style="display: block;" class="op_weather4_xlcon">
                                            <ul class="op_weather4_xltop c-clearfix">
                                                <li class="op_weather4_xlzs"
                                                    onmouseout="disTip('tip_chuanyi','none');"
                                                    onmouseover="disTip('tip_chuanyi','block');"
                                                    style="position: relative; z-index: 6;"><div
                                                            class="op_weather4_xlzstit">穿衣：较冷</div>
                                                    <div class="op_weather4_xltip" id="tip_chuanyi" onclick="clkTip(this);"
                                                         style="width: 200px; top: 27px; left: 0px; z-index: 1000; display: none;">
                                                        <span class="op_weather4_xlico" style="left: 35px;"></span>
                                                        <div class="op_weather4_xlcont">
                                                            <div class="op_weather4_xltiptitle">穿衣指数：较冷</div>
                                                            <div class="op_weather4_xltipcontent"> </div>
                                                        </div>
                                                    </div></li>
                                                <li class="op_weather4_xlzs"
                                                    onmouseout="disTip('tip_xiche','none');"
                                                    onmouseover="disTip('tip_xiche','block');"
                                                    style="position: relative; z-index: 5;"><div
                                                            class="op_weather4_xlzstit">洗车：较适宜</div>
                                                    <div class="op_weather4_xltip" id="tip_xiche" onclick="clkTip(this);"
                                                         style="width: 200px; top: 27px; left: 0px; z-index: 1000; display: none;">
                                                        <span class="op_weather4_xlico" style="left: 35px;"></span>
                                                        <div class="op_weather4_xlcont">
                                                            <div class="op_weather4_xltiptitle">洗车指数：较适宜</div>
                                                            <div class="op_weather4_xltipcontent">较适宜洗车，未来一天无雨，风力较小，擦洗一新的汽车至少能保持一天。</div>
                                                        </div>
                                                    </div></li>
                                                <li class="op_weather4_xlzs"
                                                    onmouseout="disTip('tip_lvyou','none');"
                                                    onmouseover="disTip('tip_lvyou','block');"
                                                    style="position: relative; z-index: 4;"><div
                                                            class="op_weather4_xlzstit">旅游：适宜</div>
                                                    <div class="op_weather4_xltip" id="tip_lvyou" onclick="clkTip(this);"
                                                         style="width: 200px; top: 27px; left: 0px; z-index: 1000; display: none;">
                                                        <span class="op_weather4_xlico" style="left: 35px;"></span>
                                                        <div class="op_weather4_xlcont">
                                                            <div class="op_weather4_xltiptitle">旅游指数：适宜</div>
                                                            <div class="op_weather4_xltipcontent">天气较好，温度适宜，总体来说还是好天气哦，这样的天气适宜旅游，您可以尽情地享受大自然的风光。</div>
                                                        </div>
                                                    </div></li>
                                                <li class="op_weather4_xlzs"
                                                    onmouseout="disTip('tip_ganmao','none');"
                                                    onmouseover="disTip('tip_ganmao','block');"
                                                    style="position: relative; z-index: 3;"><div
                                                            class="op_weather4_xlzstit">感冒：较易发</div>
                                                    <div class="op_weather4_xltip" id="tip_ganmao" onclick="clkTip(this);"
                                                         style="width: 200px; top: 27px; left: 0px; z-index: 1000; display: none;">
                                                        <span class="op_weather4_xlico" style="left: 35px;"></span>
                                                        <div class="op_weather4_xlcont">
                                                            <div class="op_weather4_xltiptitle">感冒指数：较易发</div>
                                                            <div class="op_weather4_xltipcontent">昼夜温差较大，较易发生感冒，请适当增减衣服。体质较弱的朋友请注意防护。</div>
                                                        </div>
                                                    </div></li>
                                                <li class="op_weather4_xlzs op_weather4_xlbornone"
                                                    onmouseout="disTip('tip_yundong','none');"
                                                    onmouseover="disTip('tip_yundong','block');"
                                                    style="position: relative; z-index: 2;"><div
                                                            class="op_weather4_xlzstit">运动：较不宜</div>
                                                    <div class="op_weather4_xltip" id="tip_yundong" onclick="clkTip(this);"
                                                         style="width: 200px; top: 27px; left: 0px; z-index: 1000; display: none;">
                                                        <span class="op_weather4_xlico" style="left: 35px;"></span>
                                                        <div class="op_weather4_xlcont">
                                                            <div class="op_weather4_xltiptitle">运动指数：较不宜</div>
                                                            <div class="op_weather4_xltipcontent">阴天，且天气寒冷，推荐您在室内进行低强度运动；若坚持户外运动，请选择合适的运动并注意保暖。</div>
                                                        </div>
                                                    </div></li>
                                                <li class="op_weather4_xlzs op_weather4_xlbornone"
                                                    onmouseout="disTip('tip_ziwaixian','none');"
                                                    onmouseover="disTip('tip_ziwaixian','block');"
                                                    style="position: relative; z-index: 1;"><div
                                                            class="op_weather4_xlzstit">紫外线强度：最弱</div>
                                                    <div class="op_weather4_xltip" id="tip_ziwaixian" onclick="clkTip(this);"
                                                         style="width: 200px; top: 27px; left: 0px; z-index: 1000; display: none;">
                                                        <span class="op_weather4_xlico" style="left: 35px;"></span>
                                                        <div class="op_weather4_xlcont">
                                                            <div class="op_weather4_xltiptitle">紫外线强度指数：最弱</div>
                                                            <div class="op_weather4_xltipcontent">属弱紫外线辐射天气，无需特别防护。若长期在户外，建议涂擦SPF在8-12之间的防晒护肤品。</div>
                                                        </div>
                                                    </div></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            </body>
                            </html>





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

    <script src="{{asset('/js/home/jquery-1.8.3.min.js')}}"></script>

    <script>


    </script>



    <script type="text/javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch (e) {
        }
    </script>




@endsection
