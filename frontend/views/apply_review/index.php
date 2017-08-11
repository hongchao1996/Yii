<?php
use yii\helpers\Url;
use yii\captcha\Captcha;
use yii\helpers\Html;

$this->context->layout = false;
frontend\assets\AppAsset::register($this)
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
  <title>职位申请 - 预览</title> 
  <script type="text/javascript">
        try {
            top.location.hostname;
            if (top.location.hostname != window.location.hostname) {
                top.location.href = window.location.href;
            }
        }
        catch (e) {
            top.location.href = window.location.href;
        }
    </script> 
  <!--通用样式Css和脚本--> 
  <script type="text/javascript">var $bs_vars={'st':'http://stnew.beisen.com/','version':'2015.09.17.001','constSite':'http://const.tms.beisen.com'};function vstr(str) {
         if (typeof ($bs_vars) == 'undefine')
             return str;
         var result = str;
         for (var v in $bs_vars) {
             var regex = new RegExp('\\$\\{' + v.toString() + '\\}|\\{' + v.toString() + '\\}', 'igm');
             result = result.replace(regex, $bs_vars[v]);
         }
         return result;
     };</script> 
  <!--引用静态文件:requirejs--> 
  <script type="text/javascript" src="js/require.js"></script> 
  <!--引用静态文件:skin_default--> 
  <link href="mycss/common.css" rel="stylesheet" type="text/css" />
  <link href="mycss/templateform.css" rel="stylesheet" type="text/css" />
  <link href="mycss/controls.css" rel="stylesheet" type="text/css" />
  <link href="mycss/default.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="js/base_new.js"></script>
  <script type="text/javascript" src="js/widgetnew.js?v=3"></script>
  <script type="text/javascript" src="js/common.js"></script>
  <script type="text/javascript" src="js/bsdialog.js"></script>
  <script type="text/javascript" src="js/common.js"></script>
  <script type="text/javascript" src="js/controls.js"></script>
  <script type="text/javascript" src="js/underscore.js"></script>
  <script type="text/javascript" src="js/school-select-v2.js?v=6"></script>
  <link href="mycss/school-select-v2.css" rel="stylesheet" type="text/css" /> 
  <!--引用静态文件:skin_new_css--> 
  <link href="mycss/main.css" rel="stylesheet" type="text/css" /> 
  <!--引用静态文件:new_dialog_js--> 
  <script type="text/javascript" src="js/dialog_js.js"></script> 
  <!--产品头部CSS和脚本--> 
  <script src="js/WdatePicker.js"></script> 
  <script type="text/javascript">
       window.PERF_START=new Date;
       function _splash(page, uid, tid, pid){
        uid =  uid || 0;  // 这里是用户ID
        tid =  tid || 0;   // 这里是租户ID
        pid =  pid || 'unknown';  // 这里是项目标识
        var now = new Date;
        var start = window.PERF_START || now;
        var diff = now - start;
        var rand = Math.round(Math.random()*1000000);
        var url= document.location.protocol+'//opsapi.beisen.com/opsapi/AddLog?appName='+pid+'&label=%5Bsplash%5D%20'+page+'&uid='+uid+'&tid='+tid+'&time='+diff+'&type=1&sid='+rand+'&step=0';
        var img = new Image;
        img.src = url;
    }
    </script> 
  <!--引用静态文件:front_css--> 
  <link href="mycss/front.css" rel="stylesheet" type="text/css" />  
  <style type="text/css">
          .checkbox_list {float: left;width: 450px;}
          .form_container ul li span.start_date {width: 80px;}
          .form_container ul li span.end_date {width: 70px;}
          .dl_logo img {
              width: auto!important;
              height: 40px!important;
              margin: 16px 0 0 30px!important;
            }
    </style> 
    <script type="text/javascript">
 $.post("ajax.php", {type:"1"}, function(data) {
                var loginView = $(".login-hearder .header-login");
                var unLoginView = $(".login-hearder .header-unLogin");
                if (data.name != '') {
                    loginView.find('.userName').text(data.name);
                    loginView.show()
                }
                else {
                    unLoginView.show()
                }
            }, "json")
     </script>
  <script type="text/javascript" id="user-info-header">


        

        $(document).ready(function () {
            var isApplyDetail = "False".toLowerCase() == 'true' ? true : false;
            //先获取用户的基本信息，这里的ajax是同步等待
            if (!isApplyDetail) {
                var userInfo = window.userInfo;
                var detailView = $(".dl_rightit .isApplyDetail");
                var loginView = $(".dl_rightit .isLogin");
                var unLoginView = $(".dl_rightit .unLogin");
                detailView.show();
                //头部对外公开的口，可以修改用户名
                window.loginHeaderView = {
                    userNameText: function (text) {
                        var shortText = text && text.length > 20 ? text.substring(0, 20) : text;
                        loginView.find('.userShortName').text(shortText);
                        loginView.find('#topUserEmail').attr('title', text);
                    }
                };
                if (userInfo.isLogin) {
                    loginView.show();
                    loginView.find('.userShortName').text(userInfo.shortName);
                    loginView.find('#topUserEmail').attr('title', userInfo.name);
                }
                else {
                    unLoginView.show();
                }
            }
        })

        var UserPrompt = function (options) {
            this.paramMap = {
                targetSelector: 'targetSelector'
                , promptText: 'promptText'
            }
            this.floater = {
                tag: options[this.paramMap.targetSelector]
                , position: {}
                , size: {}
            };
            this.promptText = '您尚未设置密码，请点这里修改吧！';//options[this.paramMap.promptText] || '';
            this.ui = {
                close: ".user-prompt-closeBtn"
            };
            this.initialize();
        };
        UserPrompt.prototype = {
            initialize: function () {
                var self = this;
                if ($(self.floater.tag).length < 1) return;

                self.getFloater();
                self.makeView();
                self.attachCss()
                self.aliveUi();
                self.bindEvents();
            }
            , render: function () {
                var self = this;
                self.$el.appendTo($('body'));
            }
            , show: function () {
                var self = this;
                if ($(self.floater.tag).length < 1) return;
                //控制所有子页面的show，如果用户第一次登陆才可以show
                //这里没有在子页面去判断是否show是因为单价太高，一共有3个子页面，不好维护
                if (window.userInfo.firstLogin) self.render();
            }
            , hide: function () {
                var self = this;
                $el.remove();
            }
            , getFloater: function () {
                var self = this;
                self.floater.tag = $(self.floater.tag) || $('body');
                self.floater.position = self.floater.tag.position();
                self.floater.size = {
                    'height': self.floater.tag.height()
                    , 'width': self.floater.tag.width()
                }
            }
            , makeView: function () {
                var self = this;
                self.$el = $("<div class='user-prompt-user-firstIn'>" +
                                 "<div class='user-prompt-action-container'>" +
                                    "<span class='user-prompt-closeBtn' title='close'></span>" +
                                 "</div>" +
                                 "<div class='user-prompt-content'>" + self.promptText + "</div>" +
                             "</div>");
            }
            , attachCss: function () {
                var self = this;
                //这里的0.9和4是写死的数，为了调整位置
                self.$el.css({
                    'top': (self.floater.position.top + self.floater.size.height) + 'px' // + 15
                    , 'left': (self.floater.position.left - self.floater.size.width / 4) + 'px'//+ self.floater.size.width / 2
                });
            }
            , aliveUi: function () {
                var self = this;
                var aliveUi = {};
                $.each(self.ui, function (key, value) {
                    aliveUi[key] = self.$el.find(value) || null;
                });
                self.ui = aliveUi;
            }
            , bindEvents: function () {
                var self = this;
                self.ui.close.bind('click', function () {
                    self.$el.remove()
                })
            }
        };


    </script> 
 </head> 
 <body> 
  <div class="bs_deliver"> 
   <div class="dl_header_border"> 
    <div class="dl_header clearfix"> 
     <div class="dl_logo"> 
      <img id="logoImg" class="header-logo-img" src="images/104003_medias_20141215_20141215logo.jpg?v=635542641034400000" style="width: 300px;height:80px;display: none;" /> 
     </div> 
     <div class="dl_rightit"> 
      <div class="isApplyDetail" style="display:none"> 
       <div class="isLogin" style="display:none"> 
        <span id="topUserEmail" class="pad3" title=""><span class="userShortName"></span>，欢迎您！</span> 
        <span class="pad3"><a href="index.html">招聘首页</a></span> 
        <em class="dl_header_line dl_padtb05">|</em> 
        <span class="isUserCenter" style="display:none"> <span class="pad3"><a href="member_apply.html">个人中心</a></span> <em class="dl_header_line dl_padtb05">|</em> </span> 
        <span class="pad3"><a href="/Portal/Account/Logout">退出</a></span> 
       </div> 
       <div class="unLogin" style="display:none"> 
        <span class="pad3"><a href="index.html">招聘首页</a></span> 
        <em class="dl_header_line dl_padtb05">|</em> 
        <span class="pad3"><a href="/Portal/Account/Login">登录</a></span> 
        <em class="dl_header_line dl_padtb05">|</em> 
        <span class="pad3"><a href="/Portal/Account/Register">注册</a></span> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
   <div class="dl_content dl_gray_bg"> 
    <!----> 
    <!--申请职位 s--> 
    <!--申请职位 e--> 
    <!--我的简历 s--> 
    <!--简历内容 s--> 
    <style type="text/css">
        .code
        {
            clear: both;
            padding-left: 80px;
        }

            .code .code_add
            {
                text-decoration: none;
                margin-left: 0;
            }

            .code a.code_add:hover
            {
                text-decoration: underline;
            }

        .form_container .form_part ul.code_list
        {
            padding-left: 0;
        }

        .form_container li a.code_del
        {
            text-decoration: none;
            padding-left: 40px;
        }

            .form_container li a.code_del:hover
            {
                text-decoration: underline;
            }

        .code_type
        {
            width: 180px;
        }

        .code_dialog
        {
            padding: 30px 40px;
        }

        div.code_dialog_btn
        {
            margin-top: 0;
            height: 32px;
        }

        span.code_error_pop
        {
            margin-top: 5px;
            width: auto;
            height: 20px;
            visibility: hidden;
        }

        .code_dialog #btnClse
        {
            margin-left: 50px;
        }

        .code_dialog .dl_dialog_btn
        {
            padding-top: 20px;
            margin-top: 10px;
        }

        .code_type_outer
        {
            text-align: center;
        }

        .code_dialog a.dl_btn_grey1 span
        {
            padding: 0 16px 0 0;
        }

        .code_dialog a.dl_btn_grey1
        {
            padding-left: 16px;
        }

        .code_title
        {
            margin-bottom: 10px;
            color: #333;
        }
    </style> 
    <div class="dl_liucheng dl_top_table"> 
     <h3 class="applypos"> <span>申请职位：</span><span class="dl_positionname"><strong style="font-weight: bold;">PTD 助教总监</strong> </span> </h3> 
     <table align="center" class="dl_top_ico"> 
      <tbody>
       <tr> 
        <td align="center"> 
         <ul class="dl_picliu"> 
          <li class="bluebasic" onclick="BSGlobal.navigate(0);" style="cursor: pointer;"><a href="?r=apply_info" onclick="BSGlobal.navigate(0);"><span class="dl_grey2">1基本信息</span></a></li> 
          <li class="bluearrow"></li> 
          <li class="blueprofile" onclick="BSGlobal.navigate(1);" style="cursor: pointer;"><a href="?r=apply_resume" onclick="BSGlobal.navigate(1);"><span class="dl_grey2">2个人履历</span></a></li> 
          <li class="bluearrow"></li> 
          <li class="submit" onclick="BSGlobal.navigate(4);" style="cursor: pointer;"><a href="?r=apply_review" onclick="BSGlobal.navigate(4);"><span class="dl_grey3">3预览/提交</span></a></li> 
         </ul> </td> 
       </tr> 
      </tbody>
     </table> 
    </div> 
    <div> 
     <style type="text/css">
    *html .rsmcnt_rlrw ul li pre
    {
        width: 250px;
        overflow: hidden;
        word-wrap: normal;
        float: none;
        margin-left: 100px;
    }
    li a span.dl_grey3{ font-size: 14px;}

    .s_info
    {
        padding-top: 22px;
    }
</style> 
     <div class="dl_bacwrap"> 
      <div class="mainwrap"> 
       <h3 class="dl_bigtit"> <span class="dl_postit">预览提交</span> <span class="dl_padl10"> 您的简历已经符合投递要求，请确认是否投递,确认投递后返回首页，可在个人中心查看 </span> </h3> 
       <div class="litwrap s_info"> 
        <div class="dl_educationwrap"> 
         <div class="rsm_wrap clearfix"> 
          <style type="text/css">
    /*left*/
    .clearfix{zoom:1}
    .clearfix::after {
        display: block;clear: both;content:'\20'
    }
    .rsminfo_lrw {
        position: relative;
        padding-top: 8px;
        color: #666666;
    }

     .rsminfo_lrw label {
            float: left;
            display: inline-block;
            width: 100px;
			padding-right: 10px;
            text-align: right;
			line-height:24px;
        }

    .rsminfotlt_rlrw {
        font-size: 14px;
        font-weight: bold;
        display: inline-block;
        border-bottom: 1px solid #3787bd;
        height: 36px;
        line-height: 36px;

    }

    .rsminfocnt_rlrw {
        border-top: 1px solid #d4dae2;
    }

    .rsminfocnt_rlrw ul.rsmtop{
        padding:10px;
    }

    .rsminfocnt_rlrw ul li {
        overflow: hidden;
        float: none;
    }

    .baselft_rrlrw {
        float: left;
    }

        .baselft_rrlrw ul li span {
            width: 135px;
            display: inline-block;
            float: left;
            overflow: hidden;
            white-space: normal;
             word-wrap: break-word;
        }
        .baselft_rrlrw ul li pre {
            width: 390px;
            float: left;
            /*white-space: normal;*/
            word-wrap: break-word;
            line-height: 25px;

        }
	.rsminfocnt_rlrw .rsmcnt_rlrw pre {
		white-space: pre-wrap;
	}

    .infophoto_rrlrw {
        width: 120px;
        height: 140px;
        float: right;
    }

    .infophoto {
        float: right;
    }
    .infor_wrap{ width: 500px;display:block}
    .infor_wrap_tit{ width: 500px;display:block}
    .rsmcnt_rlrw ul li pre {
        float: left;
        width: 460px;
        line-height: 25px;
        /*white-space: normal;*/
         word-wrap: break-word;
    }

    .rsmcnt_rlrw {
        padding-left: 20px;
		padding-right: 20px;
		padding-top: 10px;
    }

    .infotop_rlrw span {
        font-weight: bold;
        padding-right: 10px;
        width: 180px;
        display: inline-block;
        white-space: normal;
        word-wrap: break-word;
        vertical-align: top;
    }
     .infotop_rlrw span.datespan {
         width: 140px;

     }

     .infotop_rlrw span.deptspan {
         width: 110px;
     }

      .infotop_rlrw span.lastspan {
         width: 110px;
     }

     .info_tit span {
         width: 145px;display: block;float: left;padding-right: 5px;
     }

     .rsminfo_family .rsmcnt_rlrw{
         float: left;
         display: inline;
     }

     .rsminfo_family .rsmcnt_rlrw ul li pre{
         width: 200px;
     }
    .bodastop {
        border-top: 1px dashed #ccc;
        margin-top: 10px;
        padding-top: 15px;
    }

    .padtop10 {
        padding-top: 10px;
    }

    .padbttom10 {
        padding-bottom: 10px;
    }

    .floatleft {
        float: left;
    }

    .floatright {
        float: right;
    }

    .color9a {
        color: #9a9a9a;
    }

    /*rigth*/
    .rgtrsmct_rw {
        float: left;
        width: 300px;
    }
     .rsminfo_family ul li{
         width: 350px;
         float: left;
         display: inline;
     }
	     .clearfix1{zoom:1}
    .profilewidth{width:530px;}
    .clearfix1:after{display:block;clear:both;content:'\20'}
</style> 
          <style type="text/css" media="print">
    body{color: #000; font-family: "\5B8B\4F53", "\5FAE\8F6F\96C5\9ED1", "\9ED1\4F53",  Arial ;font-size: 16px;line-height: 1.65;}
    .sexagedegree_indidt{line-height:20px;}
    .rsminfotlt_rlrw {
        font-size: 18px;
    }

    .rsmcnt_rlrw{
        padding-left: 10px;
        padding-right: 10px;
    }
    /*.baselft_rrlrw {*/
        /*width: 600px;*/
    /*}*/
    .rsminfo_lrw label {
        width: 120px;

    }
    .baselft_rrlrw ul li span{
        width: 150px;
    }

    .infotop_rlrw span.datespan{
        width: 200px;
    }
    .info_tit span{
        width: 140px;
    }

    .info_tit span.edulevel{
        width: 205px;
    }

    .info_tit span.datespan{
        width: 205px;;
    }

    .rsminfo_family .rsmcnt_rlrw{
        float: left;
        display: inline;
    }

    .rsminfo_family ul li{
        width: 350px;
        float: left;
        display: inline;
    }

    .rsminfo_family .rsmcnt_rlrw ul li pre{
        width: 200px;
    }
    /*.rsminfo_lrw label{*/
        /*width: 180px;*/
    /*}*/
	.profilewidth{width:600px;}
</style> 
          <div id="resumeBody" class="lftrsmct_rw "> 
          </div> 
          <script type="text/template" id="personinfo">
        <%
            var items=Items[0].Items;
            var dict={}; var c1= [];var c2= [];
            var except = "IDPhoto";
            for(var i=0;i<items.length;i++){
                dict[items[i].Name]=items[i];
                if(IsExceptField(except,items[i].Name))
                    continue;
                    
                if(items[i].ControlType == "2")
                	c1.push(items[i]);
                else
                	c2.push(items[i]);

               // if(IsDoubleColumn(items[i])){
               //     c2.push(items[i]);
              //  }
              //  else{
              //      c1.push(items[i]);
              //  }
            }
        %>
            <!--个人信息-->
            <div class="rsminfo_lrw" id="CVItemlist_1">
                <span class="rsminfotlt_rlrw"><%=Label%>
                </span>
                <div class="rsminfocnt_rlrw clearfix">
                    <div class="baselft_rrlrw padtop10 profilewidth">
                        <ul>
                        <%
                        for(var i=0;i<c2.length;i=i+2){
                        if(i<c2.length){
					    var mObj = c2[i];
                        var mObj2 = ((i+1)<c2.length) ? c2[i+1] : null;
                        %>
                        <li class="clearfix1">
                                <label><%=mObj.Label%>：</label>
                                <span style="line-height:24px;"><%=mObj.Value%></span>
                                <%if(mObj2){%><label><%= mObj2 ? mObj2.Label : ""%>：</label>
                                <span style="line-height:24px;"><%= mObj2 ? mObj2.Value : ""%></span><%}%>
                        </li>
					    <%}}%>
                        <%for(var j=0;j<c1.length;j++){
                                var sObj = c1[j];
                               %>
                         <li class="clearfix1">
                                <label><%=sObj.Label%>：</label>
                                <pre style="line-height:24px;"><%=sObj.Value%></pre>
                         </li>
					   <%}%>
                    </ul>
                     <!--   <a href="javascript:void(0)" class="floatright">编辑个人信息
                        </a>-->
                    </div>
                    <%if(dict.IDPhoto){%>
                    <img  src="<%=dict.IDPhoto.Value%>"  class="infophoto_rrlrw padtop10" />
                    <%}%>
                    
                </div>
            </div>
    </script> 
          <script type="text/template" id="education">
<div class="rsminfo_lrw">
	<span class="rsminfotlt_rlrw">
		<%=Label%>
	</span>
	<div class="rsminfocnt_rlrw">
    <div class="rsmcnt_rlrw">
    <%for(var i=0;i<Items.length;i++){%>
        <%
            var model = Items[i];
            if(model.IsAllText){
        %>
            <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre>
        <%
            }
            else
            {
   
            var items=model.Items;
            
            var dict={}; var c1= [];var c2= [];
            var except = "SchoolName,EducationLevel,MajorName,StartDate,EndDate";
            for(var j=0;j<items.length;j++){
                dict[items[j].Name]=items[j];
                
                if(IsExceptField(except,items[j].Name))
                    continue;
            
                c1.push(items[j]);
            }
            var isShowItem = (dict.StartDate && dict.EndDate) || dict.SchoolName || dict.MajorName || dict.EducationLevel;
        %>
			<%if(isShowItem){ %>
			<div class="info_tit clearfix infotop_rlrw <%if(i != 0){%>bodastop<%}%>">
				<% if(dict.StartDate && dict.EndDate){%><span class="datespan"><%=getShortDate(dict.StartDate.Value)%>—<%=getShortDate(dict.EndDate.Value)%></span><%}%>
                <%if(dict.SchoolName){%><span><%=dict.SchoolName.Value%></span><%}%>
				<%if(dict.MajorName){%><span><%=dict.MajorName.Value%> </span><%}%>
				<%if(dict.EducationLevel){%><span class="edulevel"><%=dict.EducationLevel.Value%></span><%}%>
			</div>
			<%}%>
			<ul>
                <%for(var j=0;j<c1.length;j++){
                var sObj = c1[j];
            %>
				<li>
					<label><%=sObj.Label%>：</label>
                    <pre><%=sObj.Value%></pre>
				</li>
                <%}%>
			</ul>
		
        <%}}%>
    </div>
    </div>

    </script> 
          <!--培训经历--> 
          <script type="text/template" id="train">
<div class="rsminfo_lrw">
	<span class="rsminfotlt_rlrw">
		<%=Label%>
	</span>
	<div class="rsminfocnt_rlrw">
    <div class="rsmcnt_rlrw">
    <%for(var i=0;i<Items.length;i++){%>
        <%
            var model = Items[i];
            if(model.IsAllText){
        %>
            <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre>
        <%
            }
            else
            {
   
            var items=model.Items;
            
            var dict={}; var c1= [];var c2= [];
            var except = "TrainStartDate,TrainEndDate,OrgName,CourseName";
            for(var j=0;j<items.length;j++){
                dict[items[j].Name]=items[j];
                if(IsExceptField(except,items[j].Name))
                    continue;
            
                c1.push(items[j]);
            }
        %>
			<div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>">
				<% if(dict.TrainStartDate && dict.TrainEndDate){%><span class="datespan"><%=getShortDate(dict.TrainStartDate.Value)%>—<%=getShortDate(dict.TrainEndDate.Value)%></span><%}%>
                <%if(dict.OrgName){%><span><%=dict.OrgName.Value%></span><%}%>
				<%if(dict.CourseName){%><span><%=dict.CourseName.Value%> </span><%}%>
			</div>
			<ul>
                <%for(var j=0;j<c1.length;j++){
                var sObj = c1[j];
            %>
				<li>
					<label><%=sObj.Label%>：</label>
                    <pre><%=sObj.Value%></pre>
				</li>
                <%}%>
			</ul>
        <%}}%>
    </div>
    </div>
    </script> 
          <!-- 在校实践 schoolPractice--> 
          <script type="text/template" id="schoolPractice">
<div class="rsminfo_lrw">
	<span class="rsminfotlt_rlrw">
		<%=Label%>
	</span>
	<div class="rsminfocnt_rlrw">
    <div class="rsmcnt_rlrw">
    <%for(var i=0;i<Items.length;i++){%>
        <%
            var model = Items[i];
            if(model.IsAllText){
        %>
            <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre>
        <%
            }
            else
            {
   
            var items=model.Items;
            
            var dict={}; var c1= [];var c2= [];
            var except = "PracticeStartDateTime,PracticeEndDateTime,PracticeName";
            for(var j=0;j<items.length;j++){
                dict[items[j].Name]=items[j];
                if(IsExceptField(except,items[j].Name))
                    continue;
            
                c1.push(items[j]);
            }
        %>
			<div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>">
				<% if(dict.PracticeStartDateTime && dict.PracticeEndDateTime){%><span class="datespan"><%=getShortDate(dict.PracticeStartDateTime.Value)%>—<%=getShortDate(dict.PracticeEndDateTime.Value)%></span><%}%>
                <%if(dict.PracticeName){%><span><%=dict.PracticeName.Value%></span><%}%>
			</div>
			<ul>
                <%for(var j=0;j<c1.length;j++){
                var sObj = c1[j];
            %>
				<li>
					<label><%=sObj.Label%>：</label>
                    <pre><%=sObj.Value%></pre>
				</li>
                <%}%>
			</ul>
        <%}}%>
    </div>
    </div>
    </script> 
          <!-- 在校职务 SchoolCadre --> 
          <script type="text/template" id="schoolCadre">
<div class="rsminfo_lrw">
	<span class="rsminfotlt_rlrw">
		<%=Label%>
	</span>
	<div class="rsminfocnt_rlrw">
    <div class="rsmcnt_rlrw">
    <%for(var i=0;i<Items.length;i++){%>
        <%
            var model = Items[i];
            if(model.IsAllText){
        %>
            <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre>
        <%
            }
            else
            {
   
            var items=model.Items;
            
            var dict={}; var c1= [];var c2= [];
            var except = "CadreStartDateTime,CadreEndDateTime,CadreName";
            for(var j=0;j<items.length;j++){
                dict[items[j].Name]=items[j];
                if(IsExceptField(except,items[j].Name))
                    continue;
            
                c1.push(items[j]);
            }
        %>
			<div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>">
				<% if(dict.CadreStartDateTime && dict.CadreEndDateTime){%><span class="datespan"><%=getShortDate(dict.CadreStartDateTime.Value)%>—<%=getShortDate(dict.CadreEndDateTime.Value)%></span><%}%>
                <%if(dict.CadreName){%><span><%=dict.CadreName.Value%></span><%}%>
			</div>
			<ul>
                <%for(var j=0;j<c1.length;j++){
                var sObj = c1[j];
            %>
				<li>
					<label><%=sObj.Label%>：</label>
                    <pre><%=sObj.Value%></pre>
				</li>
                <%}%>
			</ul>
        <%}}%>
    </div>
    </div>
    </div>
    </script> 
          <!-- 有子对象单行 --> 
          <script type="text/template" id="commontpl">
            <div class="rsminfo_lrw" >
                <span class="rsminfotlt_rlrw"><%=Label%>
                </span>
                <div class="rsminfocnt_rlrw clearfix">
            <% for(var i=0;i<Items.length;i++){%>
                <%
                    var model = Items[i];
                    var items=model.Items;
                    if(model.IsAllText){
                %>
                <div class="rsmcnt_rlrw"><div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre></div>
                <%
                    }
                    else{

                    var dict={}; var c1= [];var c2= [];
                    var except = "";
                    for(var j=0;j<items.length;j++){
                        dict[items[j].Name]=items[j];
                        if(IsExceptField(except,items[j].Name))
                            continue;

                        c1.push(items[j]);
                    }
                %>
            <div class="rsmcnt_rlrw"><div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div>
                        <ul>
                        <%
                        for(var k=0;k<c1.length;k++){
					    var mObj = c1[k];
                        %>
                        <li>
                                <label><%=mObj.Label%>：</label>
                                <pre><%=mObj.Value%></pre>
                        </li>
					    <%}%>
                    </ul>
                    </div>
                <%}}%>   
                </div>
            </div>
    </script> 
          <script type="text/template" id="lang">
              <div class="rsminfo_lrw">
				<span class="rsminfotlt_rlrw">
					<%=Label%>
				</span>
				<div class="rsminfocnt_rlrw  clearfix">
                    <div class="baselft_rrlrw padtop10">
						<ul>
                    <%for(var i=0;i<Items.length;i++){
                        if(Items[i].IsAllText){
                     %>
                    <pre><%= Items[i].BlockText%></pre>
                    <%
                        }
                        else{
                        var items=Items[i].Items;
                        var dict={}; var c1= [];var c2= [];
                        var except = "OtherLanguage";
                        //var except = "";
                        for(var j=0;j<items.length;j++){
                            dict[items[j].Name]=items[j];
       
                            if(IsExceptField(except,items[j].Name))
                                continue;
                            
                            if(IsDoubleColumn(items[j])){
                                c2.push(items[j]);
                            }
                            else{
                                c1.push(items[j]);
                            }
                        }
                    %>
					
                    <%for(var k=0;k<c2.length;k=k+2){
        
                        if(k<c2.length){
                            var sObj = c2[k];
                            
                            var sObj2 = ((k+1)<c2.length) ? c2[k+1] : null;
                            
                        %>
							<li>
								<label><%=sObj.Label%>：</label><span><%=sObj.Value%></span>
                                <%if(sObj2){%><label><%= sObj2 ? sObj2.Label : ""%>：</label>
                                <span><%= sObj2 ? sObj2.Value : ""%></span><%}%>
							</li>
                        <%}}%>
                        <%for(var k=0;k<c1.length;k++){
                                var sObj = c1[k];
                               %>
                         <li>
                                <label><%=sObj.Label%>：</label>
                                <span><%=sObj.Value%></span>
                         </li>
                        <%}%>
						
                <%}}%>
                        </ul>
				    </div>
				</div>
			</div>
    </script> 
          <!--工作经验--> 
          <script type="text/template" id="experience">
  <div class="rsminfo_lrw">
	<span class="rsminfotlt_rlrw">
		<%=Label%>
	</span>
	<div class="rsminfocnt_rlrw">
    <div class="rsmcnt_rlrw">
    <%for(var i=0;i<Items.length;i++){%>
        <%
            var model = Items[i];
            if(model.IsAllText){
        %>
            <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre>
        <%
            }
            else
            {
                var items=Items[i].Items;
                var dict={}; var c1= [];var c2= [];
                var except = "CompanyName,JobTitle,StartDate,EndDate,department";
                for(var j=0;j<items.length;j++){
                    dict[items[j].Name]=items[j];
                    if(IsExceptField(except,items[j].Name))
                        continue;

                   c1.push(items[j]);
                }
        %>
			<div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>">
				<% if(dict.StartDate && dict.EndDate){%><span class="datespan"><%=getShortDate(dict.StartDate.Value)%>—<%=getShortDate(dict.EndDate.Value)%></span><%}%>
                <%if(dict.CompanyName){%><span><%=dict.CompanyName.Value%></span><%}%>
				<%if(dict.department){%><span class="deptspan"><%=dict.department.Value%> </span><%}%>
				<%if(dict.JobTitle){%><span class="lastspan"><%=dict.JobTitle.Value%></span><%}%>
			</div>
			<ul>
                <%for(var j=0;j<c1.length;j++){
                var sObj = c1[j];
            %>
				<li>
					<label><%=sObj.Label%>：</label>
                    <pre><%=sObj.Value%></pre>
				</li>
                <%}%>
			</ul>
        <%}}%>
    </div>
    </div>
    </script> 
          <!--实习经验--> 
          <script type="text/template" id="practiceExp">
  <div class="rsminfo_lrw">
	<span class="rsminfotlt_rlrw">
		<%=Label%>
	</span>
	<div class="rsminfocnt_rlrw">
    <div class="rsmcnt_rlrw">
    <%for(var i=0;i<Items.length;i++){%>
        <%
            var model = Items[i];
            if(model.IsAllText){
        %>
            <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre>
        <%
            }
            else
            {
                var items=Items[i].Items;
                var dict={}; var c1= [];var c2= [];
                var except = "PracticeStartDate,PracticeEndDate,PracticeCompanyName";
                for(var j=0;j<items.length;j++){
                    dict[items[j].Name]=items[j];
                    if(IsExceptField(except,items[j].Name))
                        continue;

                   c1.push(items[j]);
                }
        %>
			<div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>">
				<% if(dict.PracticeStartDate && dict.PracticeEndDate){%><span class="datespan"><%=getShortDate(dict.PracticeStartDate.Value)%>—<%=getShortDate(dict.PracticeEndDate.Value)%></span><%}%>
                <%if(dict.PracticeCompanyName){%><span><%=dict.PracticeCompanyName.Value%></span><%}%>
			</div>
			<ul>
                <%for(var j=0;j<c1.length;j++){
                var sObj = c1[j];
            %>
				<li>
					<label><%=sObj.Label%>：</label>
                    <pre><%=sObj.Value%></pre>
				</li>
                <%}%>
			</ul>
        <%}}%>
    </div>
    </div>
    </script> 
          <!-- 无子对象单行 --> 
          <script type="text/template" id="commontpl2">
        <div class="rsminfo_lrw">
			<span class="rsminfotlt_rlrw">
				<%=Label%>
			</span>
			<div class="rsminfocnt_rlrw">
				<div class="rsmcnt_rlrw">
					<ul>
                <%var fObj = Items[0];%>
                <%for(var j=0;j<fObj.Items.length;j++){%>
                    <%var sObj = fObj.Items[j];%>
                        <li>
							<label><%=sObj.Label%>：</label>
							<pre><%=sObj.Value%></pre>
						</li>
                <%}%>
					</ul>
				</div>
			</div>
		</div>
    </script> 
          <!-- 家庭情况模板 --> 
          <script type="text/template" id="Family">
        <div class="rsminfo_lrw rsminfo_family clearfix1" >
                <span class="rsminfotlt_rlrw"><%=Label%>
                </span>
            <div class="rsminfocnt_rlrw clearfix">
                <% for(var i=0;i<Items.length;i++){%>
                <%
                var model = Items[i];
                var items=model.Items;
                if(model.IsAllText){
                %>
                <div class="rsmcnt_rlrw"><div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre></div>
                <%
                }
                else{

                var dict={}; var c1= [];var c2= [];
                var except = "";
                for(var j=0;j<items.length;j++){
                dict[items[j].Name]=items[j];
                if(IsExceptField(except,items[j].Name))
                continue;

                c1.push(items[j]);
                }
                %>
                <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div>
                    <ul class="<%if(i == 0){%>rsmtop<%}%> clearfix">
                        <%
                        for(var k=0;k<c1.length;k++){
                        var mObj = c1[k];
                        %>
                        <li>
                            <label><%=mObj.Label%>：</label>
                            <pre><%=mObj.Value%></pre>
                        </li>
                        <%}%>
                    </ul>
                
                <%}}%>
            </div>
        </div>
    </script> 
          <script type="text/template" id="question">
         <div class="rsminfo_lrw">
			<span class="rsminfotlt_rlrw">
				<%=Label%>
			</span>
			<div class="rsminfocnt_rlrw">
                <%var fObj = Items[0];%>
                <%for(var j=0;j<fObj.Items.length;j++){
                    var sObj = fObj.Items[j];%>

                    <div class="rsmcnt_rlrw">
			            <div class="infor_wrap infotop_rlrw <%if(j != 0){%>bodastop<%}%>">
				            <%=(j + 1)%>.<%=sObj.Label%>
			            </div>
			            <ul class="infor_wrap_tit">
                           <%=sObj.Value%>
			            </ul>
		            </div>
                <%}%>
			</div>
		</div>
    </script> 
          <script type="text/template" id="project">
   <div class="rsminfo_lrw">
	<span class="rsminfotlt_rlrw">
		<%=Label%>
	</span>
	<div class="rsminfocnt_rlrw">
    <div class="rsmcnt_rlrw">
    <%for(var i=0;i<Items.length;i++){%>
        <%
            var model = Items[i];
            if(model.IsAllText){
        %>
            <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre>
        <%
            }
            else
            {
                var items=Items[i].Items;
                var dict={}; var c1= [];var c2= [];
                var except = "ProjectName,StartDate,EndDatE,EndDate";
                for(var j=0;j<items.length;j++){
                    dict[items[j].Name]=items[j];
                    if(IsExceptField(except,items[j].Name))
                        continue;

                    c1.push(items[j]);
                }
        %>
			<div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>">
				<%if(dict.StartDate && dict.EndDate){%><span class="datespan"><%=getShortDate(dict.StartDate.Value)%>—<%=getShortDate(dict.EndDate.Value)%></span><%}%>
				<%if(dict.ProjectName){%><span><%=dict.ProjectName.Value%></span><%}%>
			</div>
			<ul>
                <%for(var j=0;j<c1.length;j++){
                var sObj = c1[j];
            %>
				<li>
					<label><%=sObj.Label%>：</label>
                    <pre><%=sObj.Value%></pre>
				</li>
                <%}%>
			</ul>
        <%}}%>
    </div>
    </div>
    </script> 
          <script type="text/template" id="teammanager">
        <div class="rsminfo_lrw">
	<span class="rsminfotlt_rlrw">
		<%=Label%>
	</span>
	<div class="rsminfocnt_rlrw">
    <div class="rsmcnt_rlrw">
    <%for(var i=0;i<Items.length;i++){%>
        <%
            var model = Items[i];
            if(model.IsAllText){
        %>
            <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre>
        <%
            }
            else
            {
                var items=Items[i].Items;
                var dict={}; var c1= [];var c2= [];
                //var except = "CompanyName,DirectUnderlingCount,ReportToCN";
                var except = "CompanyName";
                for(var j=0;j<items.length;j++){
                    dict[items[j].Name]=items[j];
                    if(IsExceptField(except,items[j].Name))
                        continue;

                    c1.push(items[j]);
                }
        %>
			<div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>">
				<span><%=dict.CompanyName.Value%></span>
            <!--    <%if(dict.DirectUnderlingCount){%><span><%=dict.DirectUnderlingCount.Value%>人</span><%}%>
                <%if(dict.ReportToCN){%><span><%=dict.ReportToCN.Value%></span><%}%>-->
			</div>
			<ul>
                <%for(var j=0;j<c1.length;j++){
                var sObj = c1[j];
            %>
				<li>
					<label><%=sObj.Label%>：</label>
                    <pre><%=sObj.Value%></pre>
				</li>
                <%}%>
			</ul>
        <%}}%>
    </div>
    </div>
    </script> 
          <script type="text/template" id="attachments">
       <div class="rsminfo_lrw">
			<span class="rsminfotlt_rlrw">
				<%=Label%>
			</span>
			<div class="rsminfocnt_rlrw">
               <div class="rsmcnt_rlrw">
                   <ul>
                <%var fObj = Items[0];%>
                <%for(var j=0;j<fObj.Items.length;j++){
                    var sObj = fObj.Items[j];
                %>
                <li>
					<label><%=sObj.Label%>：</label>
                    <pre><%=sObj.Value%></pre>
				</li>
                <%}%>
                    </ul>
                </div>
			</div>
		</div>
    </script> 
         
        <div class="dl_bd_btm"></div> 
        <div class="dl_cen_txt dl_htline32 dl_padt15"> 
         <span class="dl_btn_lev dl_ft14_grey dl_padr10" style=""><a name="btnPre" href="?r=apply_info/shang"><b>上一步</b></a></span> 
         <a name="btnSave" href="?r=index/index" class="dl_btn_blue1"> <span>提交申请</span> </a> 
        </div> 
       </div> 
      </div> 
     </div> 
     
    
   <div class="dl_footer"> 
    <p>&copy;2015&nbsp;北京大生知行科技有限公司51talk&nbsp;&nbsp;京ICP备05051632号 京公网安备110108002767号 &nbsp;&nbsp;帮助热线：4006506886</p> 
   </div> 
  </div>  
  

 </body>
</html>