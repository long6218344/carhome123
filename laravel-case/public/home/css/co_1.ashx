/* Append File:/as/css-2.0.5/global/autoshow-debug.css */
@charset "gb2312";

/* 
	@名称:autoshow.
	@功能:重置浏览器默认样式
*/

/* 防止用户自定义背景颜色对网页的影响，添加让用户可以自定义字体 */
html{
	color:#333333;background:#fff;
	-webkit-text-size-adjust:100%;
    -ms-text-size-adjust:100%;
}

/* 内外边距通常让各个浏览器样式的表现位置不同 */
body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,code,form,fieldset,legend,input,textarea,p,blockquote,th,td,hr,button,article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section {
	margin:0;padding:0;
}

/* 重设 HTML5 标签, IE 需要在 js 中 createElement(TAG) */
article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section { 
    display:block;
}

/* HTML5 媒体文件跟 img 保持一致 */
audio,canvas,video {
    display:inline-block;*display:inline;*zoom: 1;
}

/* 要注意表单元素并不继承父级 font 的问题 */
body, button, input, select, textarea{
	font:12px/1.5 "\5B8B\4F53",arial,tahoma,sans-serif;
} 
input,select,textarea{
	font-size:100%;
	outline:none;
}

/* 去掉各Table  cell 的边距并让其边重合 */
table{
	border-collapse:collapse;border-spacing:0;
}

/* IE bug fixed: th 不继承 text-align*/
th{
	text-align:inherit;
}

/* 去除默认边框 */
fieldset,img{
	border:0;
}

/* ie6 7 8(q) bug 显示为行内表现 */
iframe{
	display:block;
}

/* 去掉 firefox 下此元素的边框 */
abbr,acronym{
	border:0;font-variant:normal;
}

/* 一致的 del 样式 */
del {
	text-decoration:line-through;
}

address,caption,cite,code,dfn,em,th,var {
	font-style:normal;
	font-weight:500;
}

/* 去掉列表前的标识, li 会继承 */
ol,ul {
	list-style:none;
}

/* 对齐是排版最重要的因素, 别让什么都居中 */
caption,th {
	text-align:left;
}

/* 来自yahoo, 让标题都自定义, 适应多个系统应用 */
h1,h2,h3,h4,h5,h6 {
	font-size:100%;
	font-weight:500;
}

q:before,q:after {
	content:'';
}

/* 统一上标和下标 */
sub, sup {
    font-size:75%; line-height: 0; position: relative; vertical-align: baseline;
}
sup {top: -0.5em;}
sub {bottom: -0.25em;}


/* 链接样式 */
a{
    color:#3B5998; 
	outline:none;
}
a:hover {
    color:#d60000;
	text-decoration:underline;
}

a.redlink:link,a.redlink:visited{ color:#d60000;}

a.blacklink:link,a.blacklink:visited{ color:#333333;}

a.redlink:hover,a.blacklink:hover{color:#d60000;text-decoration:underline;}

/* 字体颜色 */
.red{ color:#d60000;}

/* 默认不显示下划线，保持页面简洁 */
ins,a {
	text-decoration:none;
}

/* 清理浮动 */
.fn-clear:after {
	visibility:hidden;
	display:block;
	font-size:0;
	content:" ";
	clear:both;
	height:0;
}
.fn-clear {
	zoom:1; /* for IE6 IE7 */
}

/* 隐藏, 通常用来与 JS 配合 */
body .fn-hide {
	display:none;
}

/* 设置内联, 减少浮动带来的bug */
.fn-left,.fn-right {
	display:inline;
}
.fn-left {
	float:left;
}
.fn-right {
	float:right;
}

.fn-fontsize12{ font-size:12px;}
.fn-fontsize14{ font-size:14px;}


/* 
	@名称: grid
	@功能: (40+10)*20= 990栅格系统 grid=(50*n)-10
*/
.content{width:990px;margin:0 auto;}
.content .row:after{display:block;height:0;clear:both;visibility:hidden;font-size:0;content:" ";}
.content .row{margin-right:-10px;padding-bottom:10px;clear:both;zoom:1;}
.content [class="row"]{margin-right:0px;}
.content .row [class*="column"]{margin:0 0 0 10px;float:left;}
.content [class*="column"]:first-child{margin-left:0px;}
.content .column{float:left;margin:0 10px 0 0; min-height:1px; overflow:hidden;}
.grid-1{width:40px;}
.grid-2{width:90px;}
.grid-3{width:140px;}
.grid-4{width:190px;}
.grid-5{width:240px;}
.grid-6{width:290px;}
.grid-7{width:340px;}
.grid-8{width:390px;}
.grid-9{width:440px;}
.grid-10{width:490px;}
.grid-11{width:540px;}
.grid-12{width:590px;}
.grid-13{width:640px;}
.grid-14{width:690px;}
.grid-15{width:740px;}
.grid-16{width:790px;}
.grid-17{width:840px;}
.grid-18{width:890px;}
.grid-19{width:940px;}
.grid-20{width:990px;}

/* 
	@名称: grid
	@功能: 响应栅格系统待续...
*/
/* Append File:/as/css-2.0.5/public/btn-debug.css */
/* CSS Document */

/**
 * @name: btn
 * @overview: 按钮
 * @require: button
 * @author: 赵思源
 * @review: 王文君2013.4.23
*/

/* 默认按钮 */
.btn, .btn:link, .btn:visited{font-family:"\5B8B\4F53";display:inline-block;color:#3b5b98; border:1px solid #ccd3e4;background-color:#fafbfc;cursor:pointer;outline:none; overflow:hidden; text-align:center; vertical-align:middle;}
.btn img{ text-align:center; vertical-align:middle;}
.btn:hover{background-color:#f0f0f0; text-decoration:none;}
.btn:active{background-color:#d0d0d0;}

/* 按钮大小样式 */
.btn{height:32px;line-height:32px; padding:0 20px;font-size:14px; font-weight:bold;}
.btn-mini{ height:20px;line-height:20px; padding:0 10px; font-size:12px; font-weight:100;}
.btn-small{ height:24px;line-height:24px; padding:0 15px; font-size:12px;font-weight:100;}
.btn-large{ height:45px;line-height:45px; padding:0 25px; font-size:14px; font-weight:bold;}
/* 橙色按钮 */
.btn-orange, .btn-orange:link, .btn-orange:visited{color:#fff; border:1px solid #cc5f00; background-color:#ff7700;}
.btn-orange:hover{color:#fff;background-color:#ff9900;}
.btn-orange:active{color:#fff;background-color:#f65d00;}
/* 蓝色按钮 */
.btn-blue, .btn-blue:link, .btn-blue:visited{ color:#fff; border:1px solid #00194d; background-color:#3b5998;}
.btn-blue:hover{color:#fff;background-color:#5577bb;}
.btn-blue:active{color:#fff;background-color:#29447e;}

/* 不可点击按钮 */
.btn-disabled, .btn-disabled:link, .btn-disabled:visited, .btn-disabled:hover, .btn-disabled:active{ color:#999999; text-decoration:none; border:1px solid #d0d0d0; background-color:#efefef; cursor:default;}










/* Append File:/as/css-2.0.5/public/icon-debug.css */
/* CSS Document */

/**
 * @name: icon
 * @overview: 图标
 * @author: 王文君2013.4.23
 * @review: 王文君2013.6.25/王文君2013.7.9/王文君2013.7.10
 * @update: 添加新icon规范-赵思源(2013-11-13)
 * @update: icon颜色class名称修改-赵思源(2013-11-14)
 * @update: icon升级，增加png24跟png8两种格式，增加产品库icon，整合10x10 icon-赵思源(2013-12-25)
 * @update: 修改"售多地"命名，增加小号"少量""充足"icon-赵思源(2014-01-08)
 * @update: 增加icon20，增加分享5个图标-谢君(2014-12-12)
*/

.icon, .icon16, .icon12, .icon10, .score, .score b{ display:inline-block; background:url(../images/icon-20141212.png) no-repeat; _background:url(../images/icon-png8-20141212.png) no-repeat; overflow:hidden;}
.icon20{ width:20px; height:20px;}
.icon16{ width:16px; height:16px;}
.icon12{ width:12px; height:12px;}
.icon10{ width:10px; height:10px;}
/*20像素icon*/
.icon20-weixin1{background-position:0 -640px;}
.icon20-weixin2{background-position:-20px -640px;}
.icon20-weibo1{background-position:-40px -640px;}
.icon20-weibo2{background-position:-60px -640px;}
.icon20-friend1{background-position:0 -660px;}
.icon20-friend2{background-position:-20px -660px;}
.icon20-qzone1{background-position:-40px -660px;}
.icon20-qzone2{background-position:-60px -660px;}
.icon20-qq1{background-position:0 -680px;}
.icon20-qq2{background-position:-20px -680px;}
/*16像素icon*/
.icon16-exc{ background-position:0 0;}
.icon16-ok{ background-position:-20px 0;}
.icon16-no{ background-position:-40px 0;}
.icon16-warn{ background-position:-40px -40px;}

.icon16-star1{ background-position:0 -20px;}
.icon16-star2{ background-position:-20px -20px;}
.icon16-star3{ background-position:-40px -20px;}
.icon16-star4{ background-position:-60px -20px;}

.icon16-king1{ background-position:0 -40px;}
.icon16-king2{ background-position:-20px -40px;}
.icon16-crown1{ background-position:-40px -100px;}
.icon16-crown2{ background-position:-60px -100px;}

.icon16-apple{ background-position:0px -60px;}
.icon16-apple:hover{ background-position:-20px -60px;}
.icon16-android{ background-position:0px -80px;}
.icon16-android:hover{ background-position:-20px -80px;}
.icon16-window{ background-position:0px -100px;}
.icon16-window:hover{ background-position:-20px -100px;}
.icon16-phone{ background-position:0px -120px;}
.icon16-phone:hover{ background-position:-20px -120px;}

.icon16-watch{ background-position:0px -260px;}
.icon16-watch:hover{ background-position:-20px -260px;}
.iog16-watch{ background-position:-40px -260px;}
.icon16-search1{ background-position:-20px -280px;}
.icon16-search2{ background-position:0px -280px;}

.icon16-top{ background-position:0px -300px;}
.icon16-top:hover{ background-position:-20px -300px;}
.iog16-top{ background-position:-40px -300px;}
.iwt16-top{ background-position:-60px -300px;}
.icon16-img{ background-position:0px -200px;}
.icon16-img:hover{ background-position:-20px -200px;}

.icon16-left{ background-position:0px -220px;}
.icon16-left:hover{ background-position:-20px -220px;}
.iog16-left{ background-position:-40px -220px;}
.iwt16-left{ background-position:-60px -220px;}
.icon16-rmb{ background-position:-40px -120px;}

.icon16-right{ background-position:0px -240px;}
.icon16-right:hover{ background-position:-20px -240px;}
.iog16-right{ background-position:-40px -240px;}
.iwt16-right{ background-position:-60px -240px;}
.icon16-zhuan{ background-position:-60px -80px;}

.icon16-time{ background-position:-60px -60px;}
.icon16-calendar{ background-position:0px -140px;}
.icon16-calendar:hover{ background-position:-20px -140px;}
.iog16-calendar{ background-position:-40px -140px;}
.iwt16-calendar{ background-position:-60px -140px;}

.icon16-car{ background-position:0px -160px;}
.icon16-car:hover{ background-position:-20px -160px;}
.iog16-car{ background-position:-40px -160px;}
.iwt16-car{ background-position:-60px -160px;}
.icon16-kb{ background-position:-40px -80px;}

.icon16-date{ background-position:0px -340px;}
.icon16-date:hover{ background-position:-20px -340px;}
.iog16-date{ background-position:-40px -340px;}
.iwt16-date{ background-position:-60px -340px;}
.icon16-open{ background-position:-40px -320px;}

.icon16-infor{ background-position:0px -360px;}
.icon16-infor:hover{ background-position:-20px -360px;}
.iog16-infor{ background-position:-40px -360px;}
.iwt16-infor{ background-position:-60px -360px;}
.icon16-pack{ background-position:-60px -320px;}

.icon16-share{ background-position:0px -380px;}
.icon16-share:hover{ background-position:-20px -380px;}
.iog16-share{ background-position:-40px -380px;}
.iwt16-share{ background-position:-60px -380px;}
.icon16-rainbow{ background-position:-60px -120px;}

.icon16-findcar{ background-position:0px -400px;}
.icon16-findcar:hover{ background-position:-20px -400px;}
.iog16-findcar{ background-position:-40px -400px;}
.iwt16-findcar{ background-position:-60px -400px;}

.icon16-forward{ background-position:0px -420px;}
.icon16-forward:hover{ background-position:-20px -420px;}
.iog16-forward{ background-position:-40px -420px;}
.iwt16-forward{ background-position:-60px -420px;}

.icon16-book1{ background-position:0px -460px;}
.icon16-book1:hover{ background-position:-20px -460px;}
.iog16-book1{ background-position:-40px -460px;}
.iwt16-book1{ background-position:-60px -460px;}

.icon16-book2{ background-position:0px -500px;}
.icon16-book2:hover{ background-position:-20px -500px;}
.iog16-book2{ background-position:-40px -500px;}
.iwt16-book2{ background-position:-60px -500px;}

.icon16-list{ background-position:0px -520px;}
.icon16-list:hover{ background-position:-20px -520px;}
.iog16-list{ background-position:-40px -520px;}
.iwt16-list{ background-position:-60px -520px;}

.icon16-array{ background-position:0px -540px;}
.icon16-array:hover{ background-position:-20px -540px;}
.iog16-array{ background-position:-40px -540px;}
.iwt16-array{ background-position:-60px -540px;}

.icon16-book3{ background-position:0px -480px;}
.icon16-book3:hover{ background-position:-20px -480px;}
.iog16-book3{ background-position:-40px -480px;}
.iwt16-book3{ background-position:-60px -480px;}

.icon16-club{ background-position:0px -440px;}
.icon16-club:hover{ background-position:-20px -440px;}
.iog16-club{ background-position:-40px -440px;}
.iwt16-club{ background-position:-60px -440px;}

.icon16-load{ background-position:0px -560px;}
.icon16-load:hover{ background-position:-20px -560px;}
.iog16-load{ background-position:-40px -560px;}
.iwt16-load{ background-position:-60px -560px;}

.icon16-zoom{ background-position:0px -580px;}
.icon16-zoom:hover{ background-position:-20px -580px;}
.iog16-zoom{ background-position:-40px -580px;}
.iwt16-zoom{ background-position:-60px -580px;}

.icon16-narrow{ background-position:0px -600px;}
.icon16-narrow:hover{ background-position:-20px -600px;}
.iog16-narrow{ background-position:-40px -600px;}
.iwt16-narrow{ background-position:-60px -600px;}

.icon16-cutbimg{ background-position:0px -620px;}
.icon16-cutbimg:hover{ background-position:-20px -620px;}
.iog16-cutbimg{ background-position:-40px -620px;}
.iwt16-cutbimg{ background-position:-60px -620px;}


.icon16-v{ background-position:-40px -60px;}
.icon16-vblue{ background-position:0px -320px;}
.icon16-vorange{ background-position:-20px -320px;}

.icon16-close{ background-position:-20px -180px;}
.icon16-close:hover{ background-position:0px -180px; cursor:pointer; background-color:#3B5998;}
.icon16-close2{ background-position:-40px -180px;}
.icon16-close2:hover{ background-position:0px -180px; cursor:pointer; background-color:#ff6600;}
/*12像素icon*/
.icon12-exc{ background-position:-80px 0;}
.icon12-ok{ background-position:-100px 0;}
.icon12-no{ background-position:-120px 0;}
.icon12-askmark1{ background-position:-140px -200px;}

.icon12-star1{ background-position:-80px -20px;}
.icon12-star2{ background-position:-100px -20px;}
.icon12-star3{ background-position:-120px -20px;}
.icon12-askmark2{ background-position:-120px -200px;}

.icon12-down2{ background-position:-80px -60px;}
.icon12-down2:hover{ background-position:-100px -60px;}
.icon12-down{ background-position:-80px -40px;}
.icon12-up{ background-position:-100px -40px;}
.icon12-correct{ background-position:-120px -40px;}

.icon12-man{ background-position:-80px -300px;}
.icon12-woman{ background-position:-100px -300px;}
.icon12-fire{ background-position:-80px -280px;}
.icon12-fire2{ background-position:-100px -280px;}

.icon12-array1{ background-position:-80px -380px;}
.icon12-array2{ background-position:-100px -380px;}
.icon12-crown1{ background-position:-120px -380px;}
.icon12-crown2{ background-position:-140px -380px;}

.icon12-repeat{ background-position:-80px -80px;}
.icon12-repeat:hover{ background-position:-100px -80px;}
.iog12-repeat{ background-position:-120px -80px;}
.iwt12-repeat{ background-position:-140px -80px;}
.icon12-rmb{ background-position:-80px -340px;}

.icon12-plus{ background-position:-80px -100px;}
.icon12-plus:hover{ background-position:-100px -100px;}
.iog12-plus{ background-position:-120px -100px;}
.iwt12-plus{ background-position:-140px -100px;}
.icon12-fast{ background-position:-100px -340px;}

.icon12-minus{ background-position:-80px -120px;}
.icon12-minus:hover{ background-position:-100px -120px;}
.iog12-minus{ background-position:-120px -120px;}
.iwt12-minus{ background-position:-140px -120px;}
.icon12-mark{ background-position:-120px -340px;}

.icon12-refresh{ background-position:-80px -140px;}
.icon12-refresh:hover{ background-position:-100px -140px;}
.iog12-refresh{ background-position:-120px -140px;}
.iwt12-refresh{ background-position:-140px -140px;}
.icon12-brands{ background-position:-140px -340px;}

.icon12-thumbs{ background-position:-80px -160px;}
.icon12-thumbs:hover{ background-position:-100px -160px;}
.iog12-thumbs{ background-position:-120px -160px;}
.iwt12-thumbs{ background-position:-140px -160px;}
.icon12-eye{ background-position:-120px -280px;}

.icon12-car{ background-position:-80px -180px;}
.icon12-car:hover{ background-position:-100px -180px;}
.iog12-car{ background-position:-120px -180px;}
.iwt12-car{ background-position:-140px -180px;}
.icon12-video{ background-position:-140px -300px;}

.icon12-mail{ background-position:-80px -240px;}
.icon12-mail:hover{ background-position:-100px -240px;}
.iog12-mail{ background-position:-120px -240px;}
.iwt12-mail{ background-position:-140px -240px;}
.icon12-play{ background-position:-120px -300px;}

.icon12-calendar{ background-position:-80px -220px;}
.icon12-calendar:hover{ background-position:-100px -220px;}
.iog12-calendar{ background-position:-120px -220px;}
.iwt12-calendar{ background-position:-140px -220px;}
.icon12-phone{ background-position:-80px -200px;}
.icon12-phone:hover{ background-position:-100px -200px;}

.icon12-time{ background-position:-80px -260px;}
.iog12-time{ background-position:-100px -260px;}
.iwt12-time{ background-position:-120px -260px;}

.icon12-infor{ background-position:-80px -360px;}
.iog12-infor{ background-position:-100px -360px;}
.iwt12-infor{ background-position:-120px -360px;}

.icon12-ting{ background-position:-80px -320px;}
.icon12-yu{ background-position:-100px -320px;}
.icon12-xin{ background-position:-120px -320px;}
.icon12-cu{ background-position:-320px -340px;}

.icon12-close{ background-position:-100px -400px;}
.icon12-close:hover{ background-position:-140px -400px; cursor:pointer; background-color:#3B5998;}
.icon12-close2{ background-position:-120px -400px;}
.icon12-close2:hover{ background-position:-140px -400px; cursor:pointer; background-color:#ff6600;}
/*10像素icon*/
.icon10-yhl{ background-position:-160px -20px;}
.icon10-yhr{ background-position:-180px -20px;}
.icon10-open{ background-position:-200px 0px;}
.icon10-pack{ background-position:-180px 0px;}

.icon10-left{ background-position:-160px -100px;}
.icon10-left:hover{ background-position:-180px -100px;}
.icon10-right{ background-position:-160px -80px;}
.icon10-right:hover{ background-position:-180px -80px;}
.icon10-left2{ background-position:-200px -80px;}
.icon10-right2{ background-position:-200px -100px;}

.icon10-top{ background-position:-160px -40px;}
.icon10-top:hover{ background-position:-180px -40px;}
.icon10-down1{ background-position:-160px -60px;}
.icon10-down1:hover{ background-position:-180px -60px;}
.icon10-left3{ background-position:-200px -60px;}
.icon10-left3:hover{ background-position:-220px -60px;}
.icon10-right3{ background-position:-200px -40px;}
.icon10-right3:hover{ background-position:-220px -40px;}

.icon10-top2{ background-position:-160px -180px;}
.icon10-top2:hover{ background-position:-180px -180px;}
.icon10-top3{ background-position:-200px -180px;}
.icon10-down2{ background-position:-160px -140px;}
.icon10-down2:hover{ background-position:-180px -140px;}
.icon10-down3{ background-position:-200px -140px;}

.icon10-wright{ background-position:-160px -120px;}
.icon10-wright:hover{ background-position:-180px -120px;}
.icon10-plus{ background-position:-160px -160px;}
.icon10-plus:hover{ background-position:-180px -160px;}

.icon10-rmb1{ background-position:-200px -20px;}
.icon10-rmb2{ background-position:-220px -20px;}
.icon10-gotop{ background-position:-220px 0px;}
.icon10-close{ background-position:-160px 0px;}
/*【新】 10像素icon*/
.icon10-yhl{ background-position:-160px -20px;}
.icon10-yhr{ background-position:-180px -20px;}
.icon10-open{ background-position:-200px 0px;}
.icon10-pack{ background-position:-180px 0px;}

.icon10-jtr1{ background-position:-160px -240px;}
.icon10-jtr1:hover{ background-position:-180px -240px;}
.iog10-jtr1{ background-position:-200px -240px;}
.iwt10-jtr1{ background-position:-220px -240px;}

.icon10-jtl1{ background-position:-160px -260px;}
.icon10-jtl1:hover{ background-position:-180px -260px;}
.iog10-jtl1{ background-position:-200px -260px;}
.iwt10-jtl1{ background-position:-220px -260px;}

.icon10-jtr2{ background-position:-160px -280px;}
.icon10-jtr2:hover{ background-position:-180px -280px;}
.iog10-jtr2{ background-position:-200px -280px;}
.iwt10-jtr2{ background-position:-220px -280px;}

.icon10-jtl2{ background-position:-160px -300px;}
.icon10-jtl2:hover{ background-position:-180px -300px;}
.iog10-jtl2{ background-position:-200px -300px;}
.iwt10-jtl2{ background-position:-220px -300px;}

.icon10-sjt{ background-position:-160px -320px;}
.icon10-sjt:hover{ background-position:-180px -320px;}
.iog10-sjt{ background-position:-200px -320px;}
.iwt10-sjt{ background-position:-220px -320px;}

.icon10-sjb{ background-position:-160px -340px;}
.icon10-sjb:hover{ background-position:-180px -340px;}
.iog10-sjb{ background-position:-200px -340px;}
.iwt10-sjb{ background-position:-220px -340px;}

.icon10-sjr{ background-position:-160px -360px;}
.icon10-sjr:hover{ background-position:-180px -360px;}
.iog10-sjr{ background-position:-200px -360px;}
.iwt10-sjr{ background-position:-220px -360px;}

.icon10-sjl{ background-position:-160px -380px;}
.icon10-sjl:hover{ background-position:-180px -380px;}
.iog10-sjl{ background-position:-200px -380px;}
.iwt10-sjl{ background-position:-220px -380px;}
.icon10-pull{ background-position:-180px -460px;}

.icon10-up{ background-position:-160px -400px;}
.icon10-up:hover{ background-position:-180px -400px;}
.iog10-up{ background-position:-200px -400px;}
.iwt10-up{ background-position:-220px -400px;}

.icon10-down{ background-position:-160px -420px;}
.icon10-down:hover{ background-position:-180px -420px;}
.iog10-down{ background-position:-200px -420px;}
.iwt10-down{ background-position:-220px -420px;}

/*特殊icon*/
.icon-24h1{ width:32px; height:12px; background-position:-240px 0px;}
.icon-24h2{ width:20px; height:12px; background-position:-280px 0px;}
.icon-cz{ width:54px; height:18px; background-position:-240px -120px;}
.icon-sl{ width:54px; height:18px; background-position:-240px -140px;}

.icon-sales{ width:28px; height:14px; background-position:-240px -100px;}
.icon-booking{ width:28px; height:14px; background-position:-280px -100px;}
.icon-hd{ width:28px; height:14px; background-position:-240px -300px;}
.icon-jz{ width:28px; height:14px; background-position:-300px -120px;}

.icon-jseason{ width:37px; height:12px;background-position:-240px -160px;}
.icon-wseason{ width:37px; height:12px;background-position:-280px -160px;}
.icon-stopsale{ width:26px; height:12px;background-position:-240px -340px;}
.icon-staysale{ width:26px; height:12px;background-position:-280px -340px;}

.icon-stillsale{ width:50px; height:12px;background-position:-280px -360px;}
.icon-newcar{ width:26px; height:12px;background-position:-240px -320px;}
.icon-scz{ width:26px; height:12px;background-position:-240px -380px;}
.icon-ssl{ width:26px; height:12px;background-position:-240px -360px;}

.icon-saleqg, .icon-salebp, .icon-salebc, .icon-saledc{ width:32px; height:12px;}
.icon-saleqg{ background-position:-240px -180px;}
.icon-salebp{ background-position:-280px -180px;}
.icon-salebc{ background-position:-240px -200px;}
.icon-saledc{ background-position:-280px -200px;}

.icon-gy, .icon-cp, .icon-dy{ width:21px; height:13px;}
.icon-gy{ background-position:-240px -400px;}
.icon-cp{ background-position:-240px -420px;}
.icon-dy{ background-position:-240px -440px;}

.icon-js{ width:26px; height:12px;background-position:-240px -460px;}
.icon-bt{ width:26px; height:12px;background-position:-240px -480px;}
.icon-sellcar{ width:20px; height:17px; background-position:-280px -320px;}

.icon-place{ width:20px; height:20px; background-position:-280px -300px;}
.igy-anchor{ width:18px; height:26px; background-position:-280px -380px;}
.ird-anchor{ width:18px; height:26px; background-position:-280px -420px;}
.ibl-anchor{ width:18px; height:26px; background-position:-280px -460px;}




/* Append File:/as/css-2.0.5/public/form-debug.css */
/* CSS Document */

/**
 * @name: 表单控件
 * @overview: 表单控件
 * @require: form
 * @review: 王文君 2013.05.08/王文君2013.8.4
 * @update  2013.8.8 刘山 - 修复禁用状态下，鼠标移入箭头响应 
*/

input,select{display:inline-block;}
.form-text,.form-textarea{border:1px solid #ccd3e4;background-color:#fff;vertical-align:middle;font-size:12px;outline:0 none;}
.form-text{width:228px;height:22px;line-height:22px;padding:0 5px; color:#999;}
.form-textarea{width:528px;height:78px;line-height:22px;padding:5px;resize:none;color:#999;}
label{text-align:left;min-height:16px;line-height:16px;vertical-align:middle;font-size:14px;}
label input{margin-right:3px;-moz-position:relative;-moz-top:1px;position:relative;top:1px;}
select{min-width:125px;height:22px;line-height:22px;border:solid 1px #abadb3;background-color:#fff;padding:1px;font-size:12px;}

.textareabox{width:540px;}
.form-text-active{border:1px solid #7692cd;color:#333;}
.form-text-visited{border:1px solid #ccd3e4;color:#333;}
.form-text-warnimg{border:1px solid #d60000;color:#333;}
.form-textarea-active{border:1px solid #7692cd;color:#333;}
.form-textarea-visited{border:1px solid #ccd3e4;color:#333;}
.form-textarea-warnimg{border:1px solid #d60000;color:#333;}
.textareabox .textareabox-submitbar{clear:both;overflow:hidden;padding:10px 0;color:#999999;}
.textareabox .textareabox-submitbar .textareabox-submit{display:inline-block;width:88px;height:30px;line-height:30px;text-align:center;font-size:14px;}
.textareabox .textareabox-submitbar .fontred{color:#d60000;}

.select{font-size:12px;position:relative;max-width:260px;cursor:pointer;}
.select .icon10-down1{-webkit-transition:-webkit-transform .2s ease-in;-moz-transition:-moz-transform .2s ease-in;-o-transition:-o-transform .2s ease-in;transition:transform 0.2s ease-out 0s;-moz-transform:rotate(0deg);-webkit-transform:rotate(0deg);-o-transform:rotate(0deg);transform:rotate(0deg);}
.active .icon10-down1{-webkit-transition:-webkit-transform .2s ease-in;-moz-transition:-moz-transform .2s ease-in;-o-transition:-o-transform .2s ease-in;transition:transform 0.2s ease-out 0s;-moz-transform:rotate(180deg);-webkit-transform:rotate(180deg);-o-transform:rotate(180deg);transform:rotate(180deg);}

.select-selected{width:99%;height:22px;line-height:138px;border:solid 1px #ccd3e4;background-color:#fff;color:#666;position:relative;overflow:hidden;z-index:100;}
.select-selected:hover{background-color:#fafbfc;border:solid 1px #7892cd;cursor:pointer;}
.select-selected span{float:left;line-height:22px;padding-left:5px;margin-right:20px;}
.select-selected .icon10-down1{background-position:-180px -60px;position:absolute;right:6px;top:6px;}
.select:hover .select-selected{border:solid 1px #7892cd;}
.select-option{position:absolute;z-index:200;top:24px;left:0;width:98%;background:url(../images/shadow_bg.png) repeat scroll 0 0 transparent;padding:2px;display:none;}
.select-option dl{max-height:250px;_height:250px;border:solid 1px #ccd3e4;background-color:#fff;color:#666666;overflow-y:auto;overflow-x:hidden;}
.select-option dl dd,.select-option dl dt{height:24px;line-height:24px;border-top:dotted 1px #ccd3e4;padding:0;}
.select-option dl dd{cursor:pointer;overflow:hidden;clear:both;}
.select-option dl dd:first-child,.select-option dl dt:first-child{border-top:none;}
.select-option dl dd a{display:block;padding:0 10px 0 27px;color:#666666;}
.select-option dl dd a:link,.select-option dl dd a:visited{text-decoration:none;}
.select-option dl dd:hover,.select-option dl dd a:hover,.select-option dl dd.current,.select-option dl dd.current a{color:#3b5998;background-color:#f2f5f8;}
.select-option dl dd b{display:inline-block;width:25px;text-align:center;font-family:Arial,Helvetica,sans-serif;float:left;}
.select-option dl dd span{float:right;color:#d60000;padding-right:10px;}
.select-option dl dt{font-size:14px;font-weight:bold;text-align:left;padding:0 10px;}
.select-option dl dt.carzt{text-align:center;color:#333;}
.select-option-cx dl dd a{padding:0 10px 0 10px;_width:auto;}
.select-disabled .select-selected,.select-disabled .select-selected:hover{border:solid 1px #ccd3e4;color:#999999;background-color:#fff;cursor:default;}
.select-disabled .icon10-down1{background-position:-160px -60px;}
.select-disabled .select-selected:hover .icon10-down1{transform:none;-webkit-transform:none;background-position:-160px -60px;}


/* Append File:/as/css-2.0.5/public/pop-debug.css */
/* CSS Document */

/**
 * @name: 气泡浮层
 * @overview: 气泡浮层
 * @require: pop
 * @author: 赵思源
 * @review: 王文君2013.4.19
*/

/* 一类气泡浮层 */
.pop{position:absolute; padding:2px; background:url(../images/shadow_bg.png) repeat; z-index:1000; font-size:12px;}
.pop01{ width:486px; }
.pop02{width:336px;}
.pop .pop-arrow{ display:inline-block;overflow:hidden; position:absolute; z-index:2;background:url(../images/layer_arrow24.png) no-repeat;_background:url(../images/layer_arrow8.png) no-repeat;}
.pop .pop-top,.pop .pop-bottom{width:15px; height:11px;}
.pop .pop-content{position:relative; z-index:1; border:1px solid #ccd3e4; background-color:#FFFFFF;}
.pop .pop-left,.pop .pop-right{width:11px; height:15px;}
.pop .pop-content h3,.pop .pop-content .pop-content-bottom{height:28px; line-height:28px;padding:0 8px; font-size:12px; background-color:#fafbfc;overflow:hidden;}
.pop .pop-content h3{border-bottom:1px solid #ccd3e4;}
.pop .pop-content .pop-content-bottom{ border-top:1px solid #ccd3e4;}
.pop .pop-close{display:inline-block; width:16px; height:16px; padding:4px;position:absolute;top:1px; right:3px; background-color:#fff;}
.pop [class="pop-close"]{top:0px; right:0px; }
.pop h3 a.pop-close{ width:16px; height:16px; line-height:16px; padding:6px;border-left:1px solid #ccd3e4;background-color:#fafbfc;}
.pop h3 a.pop-close:hover,.pop .pop-close:hover{ background-color:#3b5998;}
.pop h3 a.pop-close:hover i,.pop .pop-close:hover i{background-position:0px -180px;}
.pop .pop-content .pop-content-info{ padding:10px; min-height:100px;}
.pop .pop-arrow .pop-arrow-shadow{ filter:alpha(opacity=10); -moz-opacity:0.1; opacity:0.1;}
.pop .pop-arrow .pop-arrow-shadow, .pop .pop-arrow .pop-arrow-border, .pop .pop-arrow .pop-arrow-background{ overflow:hidden; position:absolute; font-size:12pt;}

/* 上 */
.pop01 .pop-top{ bottom:-8px; left:40px; background-position:0 -10px;}

/* 下 */
.pop01 .pop-bottom{ top:-8px; left:40px; background-position:0 0px;}

/* 左 */
.pop .pop-left{ top:46%; right:-8px; background-position:-30px -29px;}

/* 右 */
.pop .pop-right{ top:46%; left:-8px; background-position:-20px -29px;}

/* 样式二的箭头 */
/* 上 */
.pop02 .pop-top{ bottom:-8px; left:40px; background-position:0 -10px;}

/* 下 */
.pop02 .pop-bottom{ top:-8px; left:40px; background-position:0 -26px;}

/* Append File:/as/css-2.0.5/public/gotop-debug.css */
/* CSS Document */

/**
 * @name: 返回顶部
 * @require: gotop
 * @author: 王文君
 * @update: 增加收藏按钮、删除蓝色返回顶部-赵思源(2013-11-13)
*/

/* 返回顶部按钮 */
.gotop02{ width:50px; padding-top:1px; font-size:12px;text-align:center; background-color:#fafbfc; text-decoration:none; position:absolute;z-index:100;}
.gotop-opacity{ margin-left:auto; left:auto; right:10px; filter:alpha(opacity=80); -moz-opacity:0.8; opacity:0.8;}
.gotop02 a.gotop02-con{ display:inline-block; width:48px; height:38px; overflow:hidden;position:relative; margin-top:-1px;border:solid 1px #ccd3e4;color:#fff; font-size:12px; text-decoration:none; line-height:18px; float:left;}
.gotop02 a.gotop02-con i{ position:relative; left:0px; top:10px;}
.gotop02 a.gotop02-con span{ display:inline-block; width:30px; height:32px;text-align:center; padding: 3px 10px; line-height:16px; position:absolute; left:-1px; top:0;cursor:pointer;}
.gotop02 a.gotop02-con:hover{ color:#fff; background-color:#5577bb;border:solid 1px #5577bb;}
.gotop02 a.gotop02-con:hover i,.gotop02 a.gotop02-con span{ display:none;background-image:none;}
.gotop02 a.gotop02-con:hover span,.gotop02 a.gotop02-con i{ display:inline-block;}
/* Append File:/as/css-2.0.5/infor/search-debug.css */
/* CSS Document */

/**
 * @name:搜索框
 * @require: text
 * @author: 赵思源
 * @review:王文君2013.4.24
*/

.search{position:relative; background-color:#fff;}
.search .search-box{line-height:normal;float:left;border:1px solid #ccd3e4;border-right:none;background-color:#FFFFFF;overflow:hidden;box-shadow: 1px 1px 1px 0 #EAEAEA inset;}
.search-active .search-box{ border:1px solid #7692cd;border-right:none; overflow:hidden;}
.search input.search-text{border:0; color:#999999;outline:0 none;background-color:#fff;}

.search01{width:340px; height:30px;}
.search01 .search-box{ width:259px; height:28px; position:relative;}
.search01 .search-box .icon16-search2{ position:absolute; z-index:200; left:5px; top:6px;}
.search01 input.search-text{ width:229px; height:22px; line-height:22px;  padding:0 5px; margin:3px 0 0 20px; font-size:14px; }
.search01 .btn{ width:38px; height:28px; line-height:28px;float:left;}

.search02{width:290px; height:24px;}
.search02 .search-box{ width:239px; height:22px;}
.search02 input.search-text{ width:225px; height:18px; line-height:18px; padding:0 5px; margin:2px;font-size:12px;}
.search02 .btn{ width:16px; height:16px;padding:3px 16px; float:left;}

[class="search search01 search-active"] input.search-text{ width:249px;}
[class="search search02 search-active"] input.search-text{ width:229px;}
.search-active input.search-text{ color:#333333; margin-left:0px;}
.search-active .icon16-search2{ display:none;}


.search-pop{ width:338px; position:absolute; top:29px; left:0; z-index:1000; clear:both; border:1px solid #cccccc; background-color:#FFFFFF; display:none;font-family:"\5B8B\4F53"; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);}
.search-pop .search-pop-letter{ padding:5px 0; overflow:hidden;}
.search-pop .search-pop-letter li{ height:22px; line-height:22px;}
.search-pop .search-pop-letter li a{ display:block; height:22px; padding:0 8px; font-size:14px;}
.search-pop .search-pop-letter li a:link, .search-pop .search-pop-letter li a:visited{ color:#000000; text-decoration:none; background-color:#FFFFFF;}
.search-pop .search-pop-letter li a:hover{ color:#000000; text-decoration:none; background-color:#f2f5f8;}
.search-pop .search-pop-direct{ height:24px; line-height:24px; color:#6d6e71; font-size:12px; padding-left:8px;}
.search-pop-direct i.icon12-down2{ position:relative; top:6px; float:left; margin-right:2px;}
.search-pop .search-pop-cars{ overflow:hidden;}
.search-pop .search-pop-cars dd{ height:30px; line-height:30px; overflow:hidden;border-top:1px dotted #cccccc; clear:both;}
.search-pop-cars dd a{ display:block; height:30px; padding:0 7px; font-size:14px;}
.search-pop .search-pop-cars dd a:link, .search-pop .search-pop-cars dd a:visited{text-decoration:none; background-color:#fff;}
.search-pop .search-pop-cars dd a:hover{ color:#3B5998;text-decoration:none; background-color:#f9f9f9;}
.search-pop .search-pop-cars dd .name{ float:left; font-weight:100; cursor:pointer; font-weight:bold;}
.search-pop .search-pop-cars dd .price{ color:#d60000; font-size:12px;float:right;}
.search-pop .search-pop-cars dd i.icon10-right{ float:right;position:relative; top:11px; right:-3px; visibility:hidden;}
.search-pop .search-pop-cars dd i.icon12-yu,.search-pop .search-pop-cars dd i.icon12-ting{ position:relative; top:9px; margin-right:3px; float:right;}
.search-pop .search-pop-cars dd a:hover i.icon10-right{visibility:visible;}













/* Append File:/as/css-2.0.5/public/tip-debug.css */
/* CSS Document */

/**
 * @name: 提示浮层
 * @overview: 提示浮层
 * @require: tip
 * @author: 赵思源
 * @review: 王文君2013.4.19
*/

/* 一类提示浮层 */
.tip{ min-width:50px;max-width:250px;position:absolute;z-index:100; padding:2px; background:url(../images/shadow_bg.png) repeat; font-size:12px; float:left;}
.tip .tip-content{ position:relative; z-index:1; border:1px solid #ccd3e4; background-color:#FFFFFF; padding:5px; line-height:18px; font-size:12px;}
.tip-orange .tip-content{ border:1px solid #ff7700; background-color:#fffbe2;}
.tip .tip-arrow{display:inline-block;overflow:hidden; position:absolute; z-index:2;background:url(../images/layer_arrow24.png) no-repeat;_background:url(../images/layer_arrow8.png) no-repeat;}
.tip .tip-top,.tip .tip-bottom{width:15px; height:11px;}
.tip .tip-left,.tip .tip-right{width:11px; height:15px;}

/* 上 */
.tip .tip-top{bottom:-8px; left:43%; background-position:0 -36px;}
.tip-orange .tip-top{background-position:-46px -36px;}

/* 下 */
.tip .tip-bottom{top:-8px; left:43%; background-position:0 -26px;}
.tip-orange .tip-bottom{background-position:-46px -26px;}

/* 左 */
.tip .tip-left{top:30%; right:-8px; background-position:-30px -29px;}
.tip-orange .tip-left{background-position:-76px -29px;}

/* 右 */
.tip .tip-right{top:30%; left:-8px; background-position:-20px -29px;}
.tip-orange .tip-right{background-position:-66px -29px;}

/* Execute Time:1ms, Create Time:2017/4/12 18:33:57 */
