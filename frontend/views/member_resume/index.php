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
  <title>我的简历</title> 
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
    <script type="text/javascript">

        $(document).ready(function () {

            var promptview = new UserPrompt({
                targetSelector: 'a.accountsettings'
                , promptText: '在账户设置中，可以改用户名和密码啦！'
            });
            promptview.show();
        })
    </script> 
    <div class="dl_bigwrap dl_heightagain clearfix dl_grey_bc"> 
     <div class="leftmenu"> 
      <div class="dl_greyline_bg"> 
       <span class="dl_menutit">个人中心</span> 
      </div> 
      <ul class="dl_menulist clearfix"> 
       <ul class="dl_menulist clearfix"> 
        <li> <a href="<?php echo Url::toRoute(['member_apply/index'])?>" class="apply">我的申请</a> </li> 
        <li class="selected profilechoose"> <span class="dl_menuchose">我的简历</span> </li> 
        <li> <a href="<?php echo Url::toRoute(['member_collect/index'])?>" class="shoucang">已收藏职位</a> </li> 
        <!--<li 
         >
        
       <a href="/Portal/Account/EditPwd" class="changepwd">修改密码</a>
        
    </li--> 
        <li> <a href="<?php echo Url::toRoute(['member_info/index'])?>" class="accountSettings">账户设置</a> </li> 
       </ul> 
      </ul> 
     </div> 
     <div class="rightcontent dl_height1 dl_new_error_wrap"> 
      <h3 class="dl_bigtit"><span class="dl_postit">我的简历</span></h3> 
      <div class="dl_importprofile"> 
       <a class="import dl_import" href="?r=apply_info/index">添加简历</a>
       <a class="import dl_import" href="?r=member_resume/xiazai">下载简历</a>
       <a id="previewBtn" class="look" target="preview" href="/Portal/Resume/PreviewResume?applyform=e725c9e8-01eb-42ca-8321-eee7569f5301" style="">预览简历</a> 
      </div> 
      <style type="text/css">
    *html .dl_myleftform .form_container {
        width: 490px;
        overflow: hidden;
    }

        *html .dl_myleftform .form_container .form_part .columntwo ul {
            width: 360px;
            overflow: hidden;
        }

        *html .dl_myleftform .form_container ul li {
            width: 360px;
            overflow: hidden;
        }
            /* .dl_myleftform .form_container li label{width: 100px}*/
            *html .dl_myleftform .form_container ul li span.preview_text {
                width: 220px;
                overflow: hidden;
            }

    .form_container li textarea {
        border: 1px solid #c1d5df;
        float: left;
        height: 100px;
        margin-right: 5px;
        padding: 3px;
        width: 300px;
    }
</style> 
      <div class="dl_basicinfo"> 
       <div class="dl_greyline_bg">
        <span class="dl_menutit ">个人信息</span>
       </div> 
       <div class="dl_basicborder mainContainer "> 
        <form method="post" id="cd7c7714-b39a-43a0-9c7e-f7382f04f5cd" name="cd7c7714-b39a-43a0-9c7e-f7382f04f5cd" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem"> 
         <div class="clearfix"> 
          <div id="resumeitems" name="singleedit" class="dl_myleftform" style="display:none;;"> 
           
           <div class="form_container" id="RecruitmentPortal.PersonProfile"> 
            <h2 class="form_title"> <strong>个人信息</strong> <span class="tab"></span> </h2> 
            <div class="form_part"> 
             <div class="form_part_container columnone"> 
             
             </div> 
             <div class="clear"></div> 
            </div> 
           </div> 
          </div> 
          <div name="singleview" class="dl_myleftform" style=""> 
           <div class="form_container" id="RecruitmentPortal.PersonProfile"> 
            <div class="form_part"> 
             <div class="form_part_container columnone"> 
              <ul> 
               <li><label>姓名：</label> <span class="preview_text"><?=$list[0]['username']?></span> </li> 
               <li><label>邮箱：</label> <span class="preview_text"><?=$list[0]['email']?></span> </li> 
               <li><label>手机号：</label> <span class="preview_text"><?=$list[0]['phone']?></span> </li> 
               <li><label>出生日期：</label> <span class="preview_text"><?=$list[0]['c_date']?></span> </li> 
               <li><label>性别：</label> <span name="RecruitmentPortalPersonProfile_gender_span" class="preview_text">
                    <?php if($list[0]['sex']==0){
                      echo '男';
                      }else{echo '女';}?>
               </span> </li> 
               <li><label>现居住地：</label> <span class="preview_text"><?=$list[0]['qi_city']?></span> </li> 
              </ul> 
             </div> 
             <div class="clear"></div> 
            </div> 
            <div class="form_part"> 
             <div class="form_part_container columntwo"> 
              <ul> 
               <li><label>最高学历：</label><span><?=$list2[0]['jiaoyu']?></span></li>  
              </ul> 
             </div> 
             <div class="clear"></div> 
            </div> 
            <div class="form_part"> 
             <div class="form_part_container columnone"> 
              <ul> 
               <li><label>民族：</label><span>汉</span> </li> 
               <li><label>自我评价：</label> <span class="preview_text"><?=$list2[0]['job_zhize']?></span> </li> 
              </ul> 
             </div> 
             <div class="clear"></div> 
            </div> 
           </div> 
          </div> 
          <div class="dl_myrightfile"> 
           <div style="width: 118px; margin-left: 12px"> 
         
    <a name="btnSingleEdit" href="javascript:void(0)" class="dl_mglft10" style="float: right; padding-bottom: 10px;">编辑</a> 


           </div> 
           <img id="idPhoto" style="width: 120px; height: 140px; padding-top: 10px; display: none;" src="images/upfile.jpg" /> 
           <br /> 
          
           <ul id="idPhotowarninfo" class="warninfo" style="display:none;"> 
           </ul> 
          </div> 
         </div> 
        </form> 
        <input type="hidden" class="viewName" value="201307040448453721" /> 
       </div> 
      </div> 
      <style type="text/css">
    *html .dl_myleftform .form_container {
        width: 490px;
        overflow: hidden;
    }

        *html .dl_myleftform .form_container .form_part .columntwo ul {
            width: 360px;
            overflow: hidden;
        }

        *html .dl_myleftform .form_container ul li {
            width: 360px;
            overflow: hidden;
        }
            /* .dl_myleftform .form_container li label{width: 100px}*/
            *html .dl_myleftform .form_container ul li span.preview_text {
                width: 220px;
                overflow: hidden;
            }

    .form_container li textarea {
        border: 1px solid #c1d5df;
        float: left;
        height: 100px;
        margin-right: 5px;
        padding: 3px;
        width: 300px;
    }
</style> 
      <div class="dl_basicinfo"> 
       <div class="dl_greyline_bg">
        <span class="dl_menutit ">求职意向</span>
       </div> 
       <div class="dl_basicborder mainContainer "> 
        <form method="post" id="fdfa1ef1-0a89-4bf9-8500-674c5e233e3f" name="fdfa1ef1-0a89-4bf9-8500-674c5e233e3f" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem"> 
         <div class="clearfix"> 
          <div id="resumeitems" name="singleedit" class="dl_myleftform" style="display:none;;"> 
           <input type="hidden" name="oId" id="Hidden1" value="f09d29a6-3c52-4237-bcd5-ecaddf83c9de" /> 
           <input type="hidden" name="jId" id="Hidden4" value="-1" /> 
           <input type="hidden" name="mId" id="Hidden5" value="1" /> 
           <input name="_objectDataID" type="hidden" value="OGJjNjNiM2UtZDYzZC00MTZiLThjMWYtOTkwNzIyODJlZTNmJGYwOWQyOWE2LTNjNTItNDIzNy1iY2Q1LWVjYWRkZjgzYzlkZQ==" />
           <input name="_metaObjID" type="hidden" value="OGJjNjNiM2UtZDYzZC00MTZiLThjMWYtOTkwNzIyODJlZTNm" />
           <input name="_viewName" type="hidden" value="T2JqZWN0aXZlVmlldw==" />
           <input name="_version" type="hidden" value="MjAxMzA3MDQwNDQ4NDU2MDkx" />
           <input name="_formIndex" type="hidden" value="11" />
           <div class="form_container" id="RecruitmentPortal.Objective"> 
            <h2 class="form_title"> <strong>求职意向</strong> <span class="tab"></span> </h2> 
            <div class="form_part"> 
             <div class="form_part_container columnone"> 
              
             </div> 
             <div class="clear"></div> 
            </div> 
           </div> 
          </div> 
          <div name="singleview" class="dl_myleftform" style=""> 
           <div class="form_container" id="RecruitmentPortal.Objective"> 
            <h2 class="form_title"> <strong>求职意向</strong> <span class="tab"></span> </h2> 
            <div class="form_part"> 
             <div class="form_part_container columnone"> 
              <ul> 
               <li><label>现从事职业：</label> <span class="preview_text"><?=$list[0]['now_zhiye']?></span> </li> 
               <li><label>求职状态：</label> </li> 
               <li><label>期望从事职业：</label><span><?=$list[0]['qi_zhiye']?></span></li> 
               <li><label>现月薪(税前)：</label><span><?=$list[0]['yue']?></span> </li> 
               <li><label>期望月薪(税前)：</label> <span><?=$list[0]['qi_y_money']?></span></li> 
              </ul> 
             </div> 
             <div class="clear"></div> 
            </div> 
           </div> 
          </div> 
          <div class="dl_myrightfile"> 
           <div style="width: 118px; margin-left: 12px"> 
      
    <a name="btnSingleEdit" href="javascript:void(0)" class="dl_mglft10" style="float: right; padding-bottom: 10px;">编辑</a>


           </div> 
          </div> 
         </div> 
        </form> 
        <input type="hidden" class="viewName" value="201307040448456091" /> 
       </div> 
      </div> 
      <div class="dl_educationwrap mainContainer" style="padding: 0px 20px;"> 
       <div class="dl_greyline_bg"> 
        <span class="dl_menutit">教育背景</span> 
       </div> 
       <div class="dl_basicborder" style="display: none;"> 
        <form method="post" id="emptyFrom_7" name="emptyFrom_7" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem" style="display: none;"> 
         <div class="eduhistory_drmmbnew pos_realitive"> 
          <div class="dl_delupd blue deletelink_edrmmb pos_absolute dl_right0" style="width: 660px;">
           <a name="delItem" href="javascript:void(0)">删除</a> 
           <a name="editItem" href="javascript:void(0)" class="dl_mglft10">编辑</a>
          </div> 
          <div id="resumeitems" class="eduinfo rightcontent_edrmmb"> 
           <input type="hidden" name="oId" id="oId" value="" /> 
           <input type="hidden" name="jId" id="jId" value="-1" /> 
           <input type="hidden" name="mId" id="mId" value="7" /> 
           <div class="form_container" id="RecruitmentPortal.Education"> 
            <h2 class="form_title"> <strong>教育背景</strong> <span class="tab"></span> </h2> 
            <div class="form_part"> 
             <div class="form_part_container columnone"> 
             
             </div> 
             <div class="clear"></div> 
            </div> 
           </div> 
          </div> 
         </div> 
         <div class="dl_borderdashed"></div> 
        </form> 
       </div> 
       <div class="dl_basicborder"> 
        <form method="post" id="10655b54-ca89-4bd0-a9a9-b65600e0174a" name="10655b54-ca89-4bd0-a9a9-b65600e0174a" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem"> 
         <div class="eduhistory_drmmbnew pos_realitive"> 
          <div class="dl_delupd blue deletelink_edrmmb pos_absolute dl_right0" style="width: 150px;"> 
        
          </div> 
          <div id="resumeitems" class="eduinfo rightcontent_edrmmb"> 
           <input type="hidden" name="oId" id="Hidden7" value="39cc3186-545a-4cc9-8b9e-74c80a398ad8" /> 
           <input type="hidden" name="jId" id="Hidden8" value="-1" /> 
           <input type="hidden" name="mId" id="Hidden9" value="7" /> 
           <div class="form_container" id="RecruitmentPortal.Education"> 
            <h2 class="form_title"> <strong>教育背景</strong> <span class="tab"></span> </h2> 
            <div class="form_part"> 
             <div class="form_part_container columnone"> 
               
             </div> 
             <div class="clear"></div> 
            </div> 
           </div> 
          </div> 
         </div> 
         <div class="dl_borderdashed"></div> 
        </form> 
       </div> 
       <div class="dl_basicborder"> 
        <form method="post" id="fa8a475a-1e60-4402-bc67-15bd75bcde7f" name="fa8a475a-1e60-4402-bc67-15bd75bcde7f" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem"> 
         <div class="eduhistory_drmmbnew pos_realitive"> 
          <div class="dl_delupd blue deletelink_edrmmb pos_absolute dl_right0" style="width: 150px;"> 
           <a name="delItem" href="javascript:void(0)">删除</a> 
           <a name="editItem" href="javascript:void(0)" class="dl_mglft10">编辑</a> 
          </div> 
          <div id="resumeitems" class="eduinfo rightcontent_edrmmb"> 
           <input type="hidden" name="oId" id="Hidden7" value="fa3b9143-da17-4a66-9c22-69b6702cc1d0" /> 
           <input type="hidden" name="jId" id="Hidden8" value="-1" /> 
           <input type="hidden" name="mId" id="Hidden9" value="7" /> 
           <div class="form_container" id="RecruitmentPortal.Education"> 
            <div class="form_part"> 
             <div class="form_part_container columnone"> 
              <ul> 
               <li><label>学校名称：</label> <span class="preview_text"></span> </li> 
              </ul> 
             </div> 
             <div class="clear"></div> 
            </div> 
            <div class="form_part"> 
             <div class="form_part_container columnone"> 
              <ul> 
               <li> <label> 时间：</label> <span class="preview_text start_date"> </span> <span class="preview_text end_date">  </span> </li> 
              </ul> 
             </div> 
             <div class="clear"></div> 
            </div> 
            <div class="form_part"> 
             <div class="form_part_container columnone"> 
              <ul> 
               <li><label>学历：</label> <span class="preview_text"><?=$list2[0]['jiaoyu']?></span> </li> 
               <li><label>学位：</label> <span class="preview_text"></span> </li> 
               <li><label>专业名称：</label> <span class="preview_text"></span> </li> 
               <li><label>专业描述：</label> <span class="preview_text"></span> </li> 
              </ul> 
             </div> 
             <div class="clear"></div> 
            </div> 
           </div> 
          </div> 
         </div> 
         <div class="dl_borderdashed"></div> 
        </form> 
       </div> 
       <input type="hidden" class="viewName" value="201307040448456411" /> 
       <div class="dl_mgtop10"> 
        <a name="addItem" href="#this" class="dl_add_ico blue">继续添加</a> 
       </div> 
      </div> 
      <div class="dl_educationwrap mainContainer" style="padding: 0px 20px;"> 
       <div class="dl_greyline_bg"> 
        <span class="dl_menutit">工作经验</span> 
       </div> 
       <div class="dl_basicborder" style="display: none;"> 
        <form method="post" id="emptyFrom_6" name="emptyFrom_6" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem" style="display: none;"> 
         <div class="eduhistory_drmmbnew pos_realitive"> 
          <div class="dl_delupd blue deletelink_edrmmb pos_absolute dl_right0" style="width: 660px;">
           <a name="delItem" href="javascript:void(0)">删除</a> 
           <a name="editItem" href="javascript:void(0)" class="dl_mglft10">编辑</a>
          </div> 
          <div id="resumeitems" class="eduinfo rightcontent_edrmmb"> 
           <input type="hidden" name="oId" id="oId" value="" /> 
           <input type="hidden" name="jId" id="jId" value="-1" /> 
           <input type="hidden" name="mId" id="mId" value="6" /> 
           <div class="form_container" id="RecruitmentPortal.Experience"> 
            <div class="form_part"> 
             <div class="form_part_container columnone"> 
              
             </div> 
             <div class="clear"></div> 
            </div> 
           </div> 
          </div> 
         </div> 
         <div class="dl_borderdashed"></div> 
        </form> 
       </div> 
       <div class="dl_basicborder"> 
        <form method="post" id="1015a315-3343-4c51-9d11-3c90e10bc8b8" name="1015a315-3343-4c51-9d11-3c90e10bc8b8" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem"> 
         <div class="eduhistory_drmmbnew pos_realitive"> 
          <div class="dl_delupd blue deletelink_edrmmb pos_absolute dl_right0" style="width: 150px;"> 
           <a name="delItem" href="javascript:void(0)">删除</a> 
           <a name="editItem" href="javascript:void(0)" class="dl_mglft10">编辑</a> 
          </div> 
          <div id="resumeitems" class="eduinfo rightcontent_edrmmb"> 
           <input type="hidden" name="oId" id="Hidden7" value="30d193ad-9915-4786-8d84-8191f9bc6c89" /> 
           <input type="hidden" name="jId" id="Hidden8" value="-1" /> 
           <input type="hidden" name="mId" id="Hidden9" value="6" /> 
           <div class="form_container" id="RecruitmentPortal.Experience"> 
            <h2 class="form_title"> <strong>工作经验</strong> <span class="tab"></span> </h2> 
            <div class="form_part"> 
             <div class="form_part_container columnone"> 
              <ul> 
               <li><label>单位名称：</label> <span class="preview_text"><?=$list2[0]['com_name']?></span> </li> 
              </ul> 
             </div> 
             <div class="clear"></div> 
            </div> 
            <div class="form_part"> 
             <div class="form_part_container columnone"> 
              <ul> 
               <li> <label> 工作时间：</label> <span class="preview_text start_date"> </span> <span class="preview_text end_date">  </span> </li> 
              </ul> 
             </div> 
             <div class="clear"></div> 
            </div> 
            <div class="form_part"> 
             <div class="form_part_container columnone"> 
              <ul> 
               <li><label>职位名称：</label> <span class="preview_text"><?=$list2[0]['zhi_name']?></span> </li> 
               <li><label>工作地点：</label> <span class="preview_text"></span> </li> 
               <li><label>工作职责：</label> <span class="preview_text"><?=$list2[0]['job_zhize']?></span> </li> 
               <li><label>部门：</label> <span class="preview_text"></span> </li> 
              </ul> 
             </div> 
             <div class="clear"></div> 
            </div> 
           </div> 
          </div> 
         </div> 
         <div class="dl_borderdashed"></div> 
        </form> 
       </div> 
       <input type="hidden" class="viewName" value="201307040448456801" /> 
       <div class="dl_mgtop10"> 
        <a name="addItem" href="#this" class="dl_add_ico blue">继续添加</a> 
       </div> 
      </div> 
      <div class="dl_educationwrap mainContainer" style="padding: 0px 20px;"> 
       <div class="dl_greyline_bg"> 
        <span class="dl_menutit">语言能力</span> 
       </div> 
       
        
         <div class="eduhistory_drmmbnew pos_realitive"> 
          <div class="dl_delupd blue deletelink_edrmmb pos_absolute dl_right0" style="width: 660px;">
           <a name="delItem" href="javascript:void(0)">删除</a> 
           <a name="editItem" href="javascript:void(0)" class="dl_mglft10">编辑</a>
          </div> 
          <div id="resumeitems" class="eduinfo rightcontent_edrmmb"> 
           
           <div class="form_container" id="RecruitmentPortal.Lang"> 
            <div class="form_part"> 
             <div class="form_part_container columnone"> 
              <ul> 
               <li><label>精通语言</label> <span class="preview_text"><?=$list2[0]['yuyan']?></span> </li> 
              </ul> 

             </div> 
             <div class="clear"></div> 
            </div> 
           </div> 
          </div> 
         </div> 
         <div class="dl_borderdashed"></div> 
        </form> 
       </div> 
       <div class="dl_mgtop10"> 
        <a name="addItem" href="#this" class="dl_add_ico blue">继续添加</a> 
       </div> 
      </div> 
     </div> 
    </div> 
    <!--简历内容 e--> 
   </div> 
   <div class="dl_footer"> 
    <p>&copy;2015&nbsp;北京大生知行科技有限公司51talk&nbsp;&nbsp;京ICP备05051632号 京公网安备110108002767号 &nbsp;&nbsp;帮助热线：4006506886</p> 
   </div> 
  </div>  
 
 </body>
</html>