﻿var global_html_pool=[];var global_script_pool=[];var global_script_src_pool=[];var global_lock_pool=[];var innerhtml_lock=null;var document_buffer="";function set_innerHTML(obj_id,html,time){if(innerhtml_lock==null){innerhtml_lock=obj_id}else{if(typeof(time)=="undefined"){global_lock_pool[obj_id+"_html"]=html;window.setTimeout("set_innerHTML('"+obj_id+"', global_lock_pool['"+obj_id+"_html']);",10);return}else{if(innerhtml_lock!=obj_id){global_lock_pool[obj_id+"_html"]=html;window.setTimeout("set_innerHTML('"+obj_id+"', global_lock_pool['"+obj_id+"_html'], "+time+");",10);return}}}function get_script_id(){return"script_"+(new Date()).getTime().toString(36)+Math.floor(Math.random()*100000000).toString(36)}document_buffer="";document.write=function(str){document_buffer+=str};document.writeln=function(str){document_buffer+=str+"\n"};global_html_pool=[];var scripts=[];html=html.split(/<\/script>/i);for(var i=0;i<html.length;i++){global_html_pool[i]=html[i].replace(/<script[\s\S]*$/ig,"");scripts[i]={text:"",src:""};scripts[i].text=html[i].substr(global_html_pool[i].length);scripts[i].src=scripts[i].text.substr(0,scripts[i].text.indexOf(">")+1);scripts[i].src=scripts[i].src.match(/src\s*=\s*(\"([^\"]*)\"|\'([^\']*)\'|([^\s]*)[\s>])/i);if(scripts[i].src){if(scripts[i].src[2]){scripts[i].src=scripts[i].src[2]}else{if(scripts[i].src[3]){scripts[i].src=scripts[i].src[3]}else{if(scripts[i].src[4]){scripts[i].src=scripts[i].src[4]}else{scripts[i].src=""}}}scripts[i].text=""}else{scripts[i].src="";scripts[i].text=scripts[i].text.substr(scripts[i].text.indexOf(">")+1);scripts[i].text=scripts[i].text.replace(/^\s*<\!--\s*/g,"")}}var s;if(typeof(time)=="undefined"){s=0}else{s=time}var script,add_script,remove_script;for(var i=0;i<scripts.length;i++){var add_html="document_buffer += global_html_pool["+i+"];\n";add_html+="document.getElementById('"+obj_id+"').innerHTML = document_buffer;\n";script=document.createElement("script");if(scripts[i].src){script.src=scripts[i].src;if(typeof(global_script_src_pool[script.src])=="undefined"){global_script_src_pool[script.src]=true;
        s+=2000}else{s+=10}}else{script.text=scripts[i].text;s+=10}script.defer=true;script.type="text/javascript";script.id=get_script_id();global_script_pool[script.id]=script;add_script=add_html;add_script+="document.getElementsByTagName('head').item(0)";add_script+=".appendChild(global_script_pool['"+script.id+"']);\n";window.setTimeout(add_script,s);remove_script="document.getElementsByTagName('head').item(0)";remove_script+=".removeChild(document.getElementById('"+script.id+"'));\n";remove_script+="delete global_script_pool['"+script.id+"'];\n";window.setTimeout(remove_script,s+10000)}var end_script="if (document_buffer.match(/<\\/script>/i)) {\n";end_script+="set_innerHTML('"+obj_id+"', document_buffer, "+s+");\n";end_script+="}\n";end_script+="else {\n";end_script+="document.getElementById('"+obj_id+"').innerHTML = document_buffer;\n";end_script+="innerhtml_lock = null;\n";end_script+="}";window.setTimeout(end_script,s)};
    if(typeof(Sou)=="undefined"){Sou={}}(function(){var ie=!!(window.attachEvent&&!window.opera);var wk=/webkit\/(\d+)/i.test(navigator.userAgent)&&(RegExp.$1<525);var fn=[];var run=function(){for(var i=0;i<fn.length;i++){fn[i]()}};var d=document;d.ready=function(f){if(!ie&&!wk&&d.addEventListener){return d.addEventListener("DOMContentLoaded",f,false)}if(fn.push(f)>1){return}if(ie){(function(){try{d.documentElement.doScroll("left");run()}catch(err){setTimeout(arguments.callee,0)}})()}else{if(wk){var t=setInterval(function(){if(/^(loaded|complete)$/.test(d.readyState)){clearInterval(t),run()}},0)}}}})();if(typeof(Sou.Ajax)=="undefined"){Sou.Ajax={}}Sou.Ajax.lastScript;Sou.Ajax.h=document.getElementsByTagName("head")[0];Sou.Ajax.loadScript=function(url){var f=document.createElement("script");var d=new Date().getTime();f.type="text/javascript";f.id=d;f.src=url;Sou.Ajax.h.appendChild(f);if(Sou.Ajax.lastScript&&Sou.Ajax.g(Sou.Ajax.lastScript)){Sou.Ajax.g(Sou.Ajax.lastScript).parentNode.removeChild(Sou.Ajax.g(Sou.Ajax.lastScript))}Sou.Ajax.lastScript=d};Sou.Ajax.loadScript=function(url,isRemove){var f=document.createElement("script");var d=new Date().getTime();f.type="text/javascript";f.id=d;f.src=url;Sou.Ajax.h.appendChild(f);if(Sou.Ajax.lastScript&&Sou.Ajax.g(Sou.Ajax.lastScript)&&isRemove){Sou.Ajax.g(Sou.Ajax.lastScript).parentNode.removeChild(Sou.Ajax.g(Sou.Ajax.lastScript))}Sou.Ajax.lastScript=d};Sou.Ajax.g=function(x){return document.getElementById(x)};if(typeof(Sou.Autocomplate)=="undefined"){Sou.Autocomplate={}}Sou.Autocomplate.tipNum=0;Sou.Autocomplate.AddAutocomplate=function(obj){var keyword="";if(obj){if(obj.attributes["id"].value=="otherSearch"){Sou.Autocomplate.isheader=2}else{Sou.Autocomplate.isheader=1}keyword=obj.value}var tip=document.getElementById("autocomplateTip");var timeOut;var isIE=navigator.userAgent.indexOf("MSIE")!=-1&&!window.opera;function getData(e){e=e||window.event;if(e.keyCode!=38&&e.keyCode!=40){tipNum=0;try{if(obj.attributes["id"].value=="otherSearch"){Sou.Autocomplate.isheader=2
    }else{Sou.Autocomplate.isheader=1}Sou.Ajax.loadScript("http://sou.autohome.com.cn/Api/Suggest/search?plat=pc&chl=luntan&q="+escape(obj.value),true)}catch(e){}}}function move(e){e=e||window.event;if(e.keyCode==13){tip.style.display="none"}if(e.keyCode==38||e.keyCode==40){if(tip.style.display!="none"){var maxli=tip.getElementsByTagName("li").length;var maxseries=tip.getElementsByTagName("dd").length;var max=maxli+maxseries;if(e.keyCode==38){tipNum--;if(tipNum<=0){tipNum=max}}if(e.keyCode==40){tipNum++;if(tipNum>max){tipNum=1}}var current=tip.getElementsByTagName("a")[tipNum-1];for(var i=0;i<max;i++){tip.getElementsByTagName("a")[i].style.backgroundColor=""}current.style.backgroundColor="#e7f0f9";obj.value=current.title}}}if(obj){obj.onkeyup=getData;obj.onkeydown=move}};Sou.Autocomplate.summitform=function(keyword,type,seriesid,clubtype){document.getElementById("otherSearch").value=keyword;if(type==1){(new Image()).src="http://sou.autohome.com.cn/stats/TipWordSouLog.ashx?word="+keyword+"&type=10";window.open("http://sou.autohome.com.cn/Api/TipWordSearchLogs/add?word="+keyword+"&seriesid="+seriesid+"&clubtype="+clubtype+"&type=10")}else{var souAction=document.getElementById("headQueryForm").action;var souParams=new Array();souParams.push("q="+escape(Sou.Ajax.g("otherSearch").value));souParams.push("entry="+Sou.Ajax.g("souEntry").value);souParams.push("class="+Sou.Ajax.g("souClass").value);souParams.push("ClassId="+Sou.Ajax.g("souClassId").value);souParams.push("order="+Sou.Ajax.g("souOrder").value);souParams.push("time="+Sou.Ajax.g("souTime").value);souAction=souAction+"&"+souParams.join("&");window.open(souAction)}};Sou.Autocomplate.isheader=1;Sou.Autocomplate.bindAutocomplate=function(json){!function(){function a(a){var b=this.os={},c=this.browser={},d=a.match(/Web[kK]it[\/]{0,1}([\d.]+)/),e=a.match(/(Android);?[\s\/]+([\d.]+)?/),f=a.match(/(iPad).*OS\s([\d_]+)/),g=a.match(/(iPod)(.*OS\s([\d_]+))?/),h=!f&&a.match(/(iPhone\sOS)\s([\d_]+)/),i=a.match(/(webOS|hpwOS)[\s\/]([\d.]+)/),j=i&&a.match(/TouchPad/),k=a.match(/Kindle\/([\d.]+)/),l=a.match(/Silk\/([\d._]+)/),m=a.match(/(BlackBerry).*Version\/([\d.]+)/),n=a.match(/(BB10).*Version\/([\d.]+)/),o=a.match(/(RIM\sTablet\sOS)\s([\d.]+)/),p=a.match(/PlayBook/),q=a.match(/Chrome\/([\d.]+)/)||a.match(/CriOS\/([\d.]+)/),r=a.match(/Firefox\/([\d.]+)/),s=a.match(/MSIE\s([\d.]+)/),t=d&&a.match(/Mobile\//)&&!q,u=a.match(/(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/)&&!q;
        (c.webkit=!!d)&&(c.version=d[1]),e&&(b.android=!0,b.version=e[2]),h&&!g&&(b.ios=b.iphone=!0,b.version=h[2].replace(/_/g,".")),f&&(b.ios=b.ipad=!0,b.version=f[2].replace(/_/g,".")),g&&(b.ios=b.ipod=!0,b.version=g[3]?g[3].replace(/_/g,"."):null),i&&(b.webos=!0,b.version=i[2]),j&&(b.touchpad=!0),m&&(b.blackberry=!0,b.version=m[2]),n&&(b.bb10=!0,b.version=n[2]),o&&(b.rimtabletos=!0,b.version=o[2]),p&&(c.playbook=!0),k&&(b.kindle=!0,b.version=k[1]),l&&(c.silk=!0,c.version=l[1]),!l&&b.android&&a.match(/Kindle Fire/)&&(c.silk=!0),q&&(c.chrome=!0,c.version=q[1]),r&&(c.firefox=!0,c.version=r[1]),s&&(c.ie=!0,c.version=s[1]),t&&(a.match(/Safari/)||b.ios)&&(c.safari=!0),u&&(c.webview=!0),b.tablet=!!(f||p||e&&!a.match(/Mobile/)||r&&a.match(/Tablet/)||s&&!a.match(/Phone/)&&a.match(/Touch/)),b.phone=!(b.tablet||b.ipod||!(e||h||i||m||n||q&&a.match(/Android/)||q&&a.match(/CriOS\/([\d.]+)/)||r&&a.match(/Mobile/)||s&&a.match(/Touch/)))}a.call(window,navigator.userAgent)}();var tip=document.getElementById("autocomplateTip");if(Sou.Autocomplate.isheader==2){tip=document.getElementById("seachtishibox")}if(json.length>0){var arrKey=json.split(",");var strHtml='<ul class="search-pop-letter">';var strSeriesHtml="";var strSeries="";for(var i=0;i<arrKey.length;i++){var keyword=document.getElementById("otherSearch");var show=arrKey[i].indexOf(keyword)>-1?arrKey[i].substring(0,arrKey[i].indexOf(keyword)+keyword.length)+"<strong>"+arrKey[i].substring(arrKey[i].indexOf(keyword)+keyword.length)+"</strong>":arrKey[i];var arrSeriesKey=arrKey[i].toString().split(":");if(arrSeriesKey.length>0&&arrSeriesKey[1]!=null){}else{strHtml+='<li><a href="javascript:void(0);" target="_self" onclick="Sou.Autocomplate.summitform(\''+arrKey[i]+"',0,'','')\" title=\""+arrKey[i]+'">'+show+"</a></li>"}}if(strHtml!='<ul class="search-pop-letter">'){strHtml+="</ul>"}else{strHtml=""}strSeries+="</dl>";if(strSeries!="</dl>"){strSeriesHtml+=strSeries}else{strSeriesHtml=""}strHtml+=strSeriesHtml;tip.innerHTML=strHtml;tip.style.display="block"
    }else{tip.style.display="none"}};document.onclick=function(e){e=e||window.event;var dom=e.srcElement||e.target;var objword=document.getElementById("autocomplateTip");if(objword!=null){if(dom.id!="autocomplateTip"&&document.getElementById("autocomplateTip").style.display=="block"){document.getElementById("autocomplateTip").style.display="none"}}};
    function ReqHeader(){this.urls=["/ajax/AllBBS","/ajax/SeariesBBS","/ajax/areaBBS","/ajax/ThemeBBS","/ajax/MotorBBS"];this.urlDoMain="http://club.autohome.com.cn";this.cluvView=undefined}var findHtml="";var brandHtml="";var areaHtml="";var themeHtml="";var motorHtml="";var AutoScrollHeig=document.body.scrollHeight;var AutoCompletiondegree=0;var AutoCompletionSenda=false;var AutoCompletionSendb=false;var AutoCompletionSendc=false;var AutoUserId=0;var AutoIsOpenHtml=true;ReqHeader.prototype={_this:this,Show:function(){var right_login=document.getElementById("right_login");var right_unlogin=document.getElementById("right_unlogin");var clubUserShow=ReqHeader.GetCookies("clubUserShow");if(clubUserShow==null){right_login.style.display="none";right_unlogin.style.display=""}else{ReqHeader.getHeadMessage();right_login.style.display="";right_unlogin.style.display="none";var clubUser=String(clubUserShow).split("|");document.getElementById("LoginName").innerHTML=clubUser[3];AutoUserId=clubUser[0]}var indexPage_A=document.getElementById("indexPage_Li");ReqHeader.bind(indexPage_A,"mouseover",this.SetHtmlover,["indexPage_A","indexPage_Div"]);ReqHeader.bind(indexPage_A,"mouseout",this.SetHtmlout,["indexPage_A","indexPage_Div"]);var square_li=document.getElementById("square_li");ReqHeader.bind(square_li,"mouseover",this.SetHtmlover,["head_Square","html_Square"]);ReqHeader.bind(square_li,"mouseout",this.SetHtmlout,["head_Square","html_Square"]);var app_li=document.getElementById("app_li");ReqHeader.bind(app_li,"mouseover",this.SetHtmlover,["head_Application","html_Application"]);ReqHeader.bind(app_li,"mouseout",this.SetHtmlout,["head_Application","html_Application"]);var messageLi=document.getElementById("messageLi");ReqHeader.bind(messageLi,"mouseover",this.SetHtmlover,["messageA","messageDiv"]);ReqHeader.bind(messageLi,"mouseout",this.SetHtmlout,["messageA","messageDiv"]);var setting_li=document.getElementById("setting_li");ReqHeader.bind(setting_li,"mouseover",this.SetHtmlover,["head_Setting","html_Setting"]);
        ReqHeader.bind(setting_li,"mouseout",this.SetHtmlout,["head_Setting","html_Setting"]);var showClubView_out=document.getElementById("btn_otherclub");ReqHeader.bind(showClubView_out,"click",this.cluvFun);var closeView=document.getElementById("closeView");ReqHeader.bind(closeView,"click",this.ClubCloseView);this.init();Sou.Autocomplate.AddAutocomplate(document.getElementById("headsearch"));document.ready(function(){window.onscroll=function(){var AutoScrollHeig=document.body.scrollHeight;var t=document.documentElement.scrollTop||document.body.scrollTop;var l=document.documentElement.clientHeight;t=parseInt(t,10)+parseInt(l,10);ReqHeader.Aleng=(t/AutoScrollHeig)*100;ReqHeader.Aleng=parseInt(ReqHeader.Aleng,10);AutoIsOpenHtml=true;if(!AutoCompletionSenda){if((t-AutoScrollHeig*0.3)>0){console.info("30");ReqHeader.Aleng=30;ReqHeader.GetJsonP();AutoCompletionSenda=true}}if(!AutoCompletionSendb){if((t-AutoScrollHeig*0.5)>0){console.info("50");ReqHeader.Aleng=50;ReqHeader.GetJsonP();AutoCompletionSendb=true}}if(!AutoCompletionSendc){if((t-AutoScrollHeig*0.8)>0){console.info("80");ReqHeader.Aleng=80;ReqHeader.GetJsonP();AutoCompletionSendc=true}}}})},ClubCloseView:function(evt){if(document.getElementById("clubViewDiv")){document.getElementById("clubViewDiv").style.display="none"}if(document.getElementById("AutodisShow")){document.getElementById("AutodisShow").style.display="none"}},SetHtmlover:function(evt,parme){var indexPage_Div=document.getElementById(""+parme[1]+"");if(indexPage_Div!=undefined){indexPage_Div.style.display=""}document.getElementById(""+parme[0]+"").setAttribute("class","cur")},SetHtmlout:function(evt,parme){var indexPage_Div=document.getElementById(""+parme[1]+"");if(indexPage_Div!=undefined){indexPage_Div.style.display="none"}document.getElementById(""+parme[0]+"").setAttribute("class","")},cluvFun:function(evt){var v=document.getElementById("AutodisShow");var t=document.getElementById("clubViewDiv");ReqHeader.prototype.openView();ReqHeader.prototype.changeTab(0);
        if(t){if(t.style.display=="none"){if(this.cluvView==undefined){this.cluvView=new ReqHeader();t.style.display="";if(v){v.style.display=""}}else{t.style.display="";if(v){v.style.display=""}}}var otherBtn=document.getElementById("otherBtn");if(otherBtn){ReqHeader.bind(otherBtn,"click",ReqHeader.search)}}},ClubFun:function(evt,tabin){var self=this;var tabIndex=tabin;new ReqHeader.prototype.changeTab(tabIndex);new ReqHeader.prototype.showView(new ReqHeader().urlDoMain+new ReqHeader().urls[tabIndex],tabIndex)},init:function(){var self=this;var tab0=document.getElementById("tab0");ReqHeader.bind(tab0,"click",this.ClubFun,0);var tab1=document.getElementById("tab1");ReqHeader.bind(tab1,"click",this.ClubFun,1);var tab2=document.getElementById("tab2");ReqHeader.bind(tab2,"click",this.ClubFun,2);var tab3=document.getElementById("tab3");ReqHeader.bind(tab3,"click",this.ClubFun,3);var tab4=document.getElementById("tab4");ReqHeader.bind(tab4,"click",this.ClubFun,4)},openView:function(){var self=new ReqHeader();self.changeTab(0)},showView:function(url,tabIndex){var self=new ReqHeader();if(document.getElementById("clubViewContent")){document.getElementById("clubViewContent").innerHTML=""}switch(tabIndex){case 0:break;case 1:break;case 2:self.getAjaxData(self.urlDoMain+self.urls[tabIndex],tabIndex);break;case 3:self.getAjaxData(self.urlDoMain+self.urls[tabIndex],tabIndex);break;case 4:self.getAjaxData(self.urlDoMain+self.urls[tabIndex],tabIndex);break;default:self.getAjaxData(self.urlDoMain+self.urls[tabIndex],tabIndex);break}},changeTab:function(tabIndex){for(var i=0;i<=4;i++){if(document.getElementById("tab"+i)){document.getElementById("tab"+i).className=""}}if(document.getElementById("tab"+tabIndex)){document.getElementById("tab"+tabIndex).className="cur"}},getAjaxData:function(url,tabIndex){var self=this;var CbData=ReqHeader.AjaxJsonP(url,tabIndex)}};ReqHeader.bind=function(target,typ,func,parm){if(target==null){return}var i=target;if(target.jquery==undefined){target=target}else{target=target[0]
    }var fn=func;fn=function(e){func.call(this,target,parm)};if(target.addEventListener){target.addEventListener(typ,fn,false)}else{if(target.attachEvent){target.attachEvent("on"+typ,fn)}else{target["on"+typ]=func}}};ReqHeader.GetCookies=function(name,defval){var nameEq=name+"=";var ca=document.cookie.split(";");for(var i=0;i<ca.length;i++){var c=ca[i];while(c.charAt(0)==" "){c=c.substring(1,c.length)}if(c.indexOf(nameEq)==0){return decodeURIComponent(c.substring(nameEq.length,c.length))}}return typeof defval=="undefined"?null:defval};ReqHeader.loginout=function(){$.ajax({url:loginoutUrl,dataType:"script",type:"GET",cache:false,success:function(){if(autologinout.success=="1"){$.ajax({url:loginoutCheUrl,dataType:"script",type:"GET",cache:false,success:function(){if(cheloginout.success=="1"){window.location.reload()}}})}}})};ReqHeader.search=function(){var q=document.getElementById("headsearch").value;var classId=document.getElementById("souClass").value;var url="http://sou.autohome.com.cn/luntan?entry=40&q="+escape(q)+"&class="+classId;window.open(url)};ReqHeader.showlogin=function(v){window.location.href="http://account.autohome.com.cn/?backurl="+window.location.href};ReqHeader.Aleng=0;ReqHeader.GetJsonP=function(){if(!AutoIsOpenHtml){return false}if(AutoUserId==0){return false}var url="http://msg.autohome.com.cn/clubalert?uid="+AutoUserId+"&callback=AjaxCallBackMessage&Aleng="+ReqHeader.Aleng;var v=document.getElementById("AuScrJsonpId");if(v){v.parentNode.removeChild(v)}var script=document.createElement("script");script.setAttribute("src",url);script.setAttribute("id","AuScrJsonpId");document.getElementsByTagName("head")[0].appendChild(script);window["AjaxCallBackMessage"]=function(data){var json=data;var elKey={"NewLetter":"sx","NewReply":"hf","NewComment":"pl","NewNotice":"tz","NewFollowers":"fs","commentreply":"cr","order":"dd"};var c=0;var el;var f=false;for(var key in elKey){if(key=="UserId"){continue}var elTop=document.getElementById(elKey[key]);el=document.getElementById(elKey[key]+"0");
        if(!elTop&&!el){continue}var val=json[key]||0;el.parentNode.style.display="none";elTop.parentNode.style.display="none";if(val>0){elTop.parentNode.getElementsByTagName("span")[0].innerHTML=(val>99?"99+":val);elTop.parentNode.style.display="block"}else{f=true;el.parentNode.style.display="block"}c+=val}el=document.getElementById("xi");if(el){el.innerHTML=(c>99?"99<i>+</i>":c>0?c:"");if(c>0){el.style.display="block"}else{el.style.display="none"}}if(f&&c>0){document.getElementsByClassName("t_info")[0].getElementsByTagName("ins")[0].style.display="block"}else{document.getElementsByClassName("t_info")[0].getElementsByTagName("ins")[0].style.display="none"}}};ReqHeader.AjaxJsonP=function(url,tabIndex){var self=new ReqHeader();var callback=("Jsonp_"+Math.random()).replace(".","");if(String(url).indexOf("?")>0){url=url+"&callback="+callback}else{url=url+"?callback="+callback}var script=document.createElement("script");script.setAttribute("src",url);document.getElementsByTagName("head")[0].appendChild(script);var v=document.getElementById("clubViewContent");window[callback]=function(data){switch(tabIndex){case 0:findHtml=data.html;if(v){set_innerHTML("clubViewContent",findHtml);setTimeout(function(){Sou.Autocomplate.AddAutocomplate(document.getElementById("otherSearch"))},1000)}document.getElementsByTagName("head")[0].removeChild(script);break;case 1:brandHtml=data.html;if(v){set_innerHTML("clubViewContent",brandHtml)}ReqHeader.loadScript(document,"http://x.autoimg.cn/Space/Scripts/Common/jquery-1.6.1.js?tv="+Math.random(),null,function(){ReqHeader.loadScript(document,"http://x.autoimg.cn/club/v1Content/js/jquery.scrollTo.js",null,function(){var pane=$(".pf_cont");var abclist=$(".pf_brand h3 a");abclist.click(function(){var lang=$(this).attr("lang");abclist.removeClass("cur");$(this).addClass("cur");pane.scrollTo($("h4[lang='"+lang+"']",pane),300)});$(".backtop:first").hide();$(".backtop").click(function(){pane.scrollTo(0,300)})})});document.getElementsByTagName("head")[0].removeChild(script);
        break;case 2:areaHtml=data.html;if(v){set_innerHTML("clubViewContent",areaHtml)}document.getElementsByTagName("head")[0].removeChild(script);break;case 3:themeHtml=data.html;if(v){set_innerHTML("clubViewContent",themeHtml)}document.getElementsByTagName("head")[0].removeChild(script);break;case 4:motorHtml=data.html;if(v){set_innerHTML("clubViewContent",motorHtml)}document.getElementsByTagName("head")[0].removeChild(script);break;default:if(v){v.innerHTML=self.getAjaxData(url)}document.getElementsByTagName("head")[0].removeChild(script);break}}};ReqHeader.loadScript=function(d,u,c,cb){if(!(window.$&&window.$.scrollTo)){if(typeof(d)!="undefined"){var __script=d.createElement("script");__script.type="text/javascript";__script.setAttribute("defer","defer");if(__script.readyState){__script.onreadystatechange=function(){if(__script.readyState=="loaded"||__script.readyState=="complete"){__script.onreadystatechange=null;if(cb){cb()}}}}else{__script.onload=function(){if(cb){cb()}}}if(u){__script.src=u}if(c){__script.text=c}d.getElementsByTagName("head")[0].appendChild(__script)}}else{if(cb){cb()}}};ReqHeader.getHeadMessage=function(){if(AutoUserId==0){var clubUserShow=ReqHeader.GetCookies("clubUserShow");if(clubUserShow){var clubUser=String(clubUserShow).split("|");AutoUserId=clubUser[0]}}setTimeout(ReqHeader.GetJsonP,100);setInterval(ReqHeader.GetJsonP,20000);ReqHeader.GetIsOpen()};ReqHeader.GetIsOpen=function(){if(window.attachEvent){document.onfocusin=ReqHeader.openFun;document.onfocusout=ReqHeader.closeFun}else{window.onfocus=ReqHeader.openFun;window.onblur=ReqHeader.closeFun}};ReqHeader.openFun=function(){AutoIsOpenHtml=true};ReqHeader.closeFun=function(){AutoIsOpenHtml=false};document.ready=function(callback){if(document.addEventListener){document.addEventListener("DOMContentLoaded",function(){document.removeEventListener("DOMContentLoaded",arguments.callee,false);callback()},false)}else{if(document.attachEvent){document.attachEvent("onreadytstatechange",function(){if(document.readyState=="complete"){document.detachEvent("onreadystatechange",arguments.callee);
        callback()}})}else{if(document.lastChild==document.body){callback()}}}};


    var loginoutUrl = 'http://account.autohome.com.cn/login/logoutjson?backvar=autologinout';
    var loginoutCheUrl = 'http://account.che168.com/login/logoutjson?backvar=cheloginout';
    var headMsgUrl = '/ajax/base/getheadmessage';
    var nickName = '';
    //对移动端单独做的处理
    var pform = navigator.platform.toLowerCase();
    if ((pform.indexOf("win32") == -1 && pform.indexOf("win64") == -1 && pform.indexOf("windows") == -1) && pform.indexOf("macintel") == -1) {
        document.getElementById("public_top").style.position = "absolute";
    }
    var reqHeader = new ReqHeader();

    reqHeader.Show();

    $ && $(document).ready(function () {
        $("#t_checkLogin").click(function () {
            var me = this;
            var isLogin = autohome && autohome.loginUser && autohome.loginUser.isLogin;
            if (isLogin) {
                $(me).attr("href", "http://i.autohome.com.cn");
            }
            else {
                $(me).attr("target", "");
                ReqHeader.showlogin();
            }
            return true;
        });
    });