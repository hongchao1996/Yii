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
  <title>职位申请 - 2个人履历</title> 
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
   <?php $this->beginBody() ?>

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
          <li class="profile" onclick="BSGlobal.navigate(1);" style="cursor: pointer;"><a href="?r=apply_resume" onclick="BSGlobal.navigate(1);"><span class="dl_grey3">2个人履历</span></a></li> 
          <li class="greyarrow"></li> 
          <li class="greysubmit" onclick="BSGlobal.navigate(4);" style="cursor: pointer;"><a href="?r=apply_review" onclick="BSGlobal.navigate(4);"><span class="dl_grey2">3预览/提交</span></a></li> 
         </ul> </td> 
       </tr> 
      </tbody>
     </table> 
    </div> 
    <div> 
     <style type="text/css">
    .redBorder,.form_container li textarea.redBorder,
    .form_part li input.redBorder{border: red 1px solid;}
    .eduinfo .form_container span.preview_text {
        width:450px;
    }
    .eduinfo .form_container span.start_date {
        width:80px;
    }
    .eduinfo .form_container span.end_date {
        width:70px;
    }
</style> 
     <div class="dl_bacwrap dl_new_error_wrap"> 
      <div class="mainwrap"> 
       <h3 class="dl_bigtit"> <span class="dl_postit">个人履历</span> <span class="dl_padl20">请在执行下一步前将必填项填写完毕并保存</span> </h3> 
       <br /> 


<?php 
        use yii\widgets\ActiveForm;
        $form = ActiveForm::begin([
          'id' => 'login-form',
          'options' => ['class' => 'form-horizontal'],
          'action'=>['apply_info/add_du'],
          'method'=>'post'
        ])

       ?>
       <div class="dl_educationwrap mainContainer"> 
        <a name="教育背景"></a> 
        <div class="dl_greyline_bg"> 
         <span class="dl_menutit "><span style="color:red;">*</span>教育背景</span> 
            <div class="form_part"> 
              <div class="form_part_container columnone">



               <ul> 
                <li>
                    <select name="jiaoyu_id" id="RecruitmentPortalPersonProfile_YearsOfWork" class="mul_select"> 
                        <option value="">请选择</option>
                        <?php foreach ($list as $key => $value): ?>
                          <option value="<?=$value['id']?>"><?=$value['jiaoyu']?></option>
                        <?php endforeach ?>
                    </select></li> 
               </ul> 




              </div> 
              <div class="clear"></div> 
              </div> 
              </div> 
              <div class="dl_basicborder" > 
              <div class="eduhistory_drmmbnew pos_realitive"> 
              <div id="resumeitems" class="eduinfo rightcontent_edrmmb"> 
              <div class="form_container" id="RecruitmentPortal.Education"> 
              <div class="form_part"> 
              <div class="form_part_container columnone">  
              </div> 
              <div class="clear"></div> 
              </div> 
              <div class="form_part"> 
              <div class="form_part_container columnone"> 
              </div> 
              <div class="clear"></div> 
              </div> 
              </div> 
              </div> 
              </div> 
              <div class="dl_borderdashed"></div>  
              </div> 
              <div class="dl_mgtop10"> 
              <a name="addItem" href="#this" class="dl_add_ico blue">继续添加</a> 
              </div> 
              </div> 
              <div class="dl_educationwrap mainContainer"> 
              <a name="工作经验"></a> 
              <div class="dl_greyline_bg"> 
              <span class="dl_menutit "><span style="color:red;">*</span>工作经验</span> 
              <span class="dl_padl20 errmsg new_pop_error" id="errorMsg_6" ></span> 
              </div> 
              <div class="dl_basicborder" "> 
              <div class="eduhistory_drmmbnew pos_realitive"> 
              <div id="resumeitems" class="eduinfo rightcontent_edrmmb"> 
              <div class="form_container" id="RecruitmentPortal.Experience"> 
              <div class="form_part"> 
              <div class="form_part_container columnone"> 
                   <ul> 
                    <li><label class="current label_required">名称：</label> <input   name="com_name" id="60601b31-bd84-40c5-bc95-c119924339726101161011" value="" /> </li> 
                    <li><label class="current label_required">职位名称：</label> <input  name="zhi_name" id="ddfb579e-9ab6-4591-8556-1163fb1dc9916101161011" value="" /> </li> 
                   </ul> 
              </div> 
              <div class="clear"></div> 
              </div> 
              <div class="form_part"> 
             
              <div class="clear"></div> 
              </div> 
              <div class="form_part"> 
              <div class="form_part_container columnone"> 
                   <ul> 
                    <li><label class="current label_required">工作职责：</label> <textarea class="textarea mul_textarea" rows="6" name="job_zhize" cols="60"></textarea> </li> 
                   </ul> 
              </div> 
              <div class="clear"></div> 
              </div> 
              </div> 
              </div> 
              </div> 
              <div class="dl_borderdashed"></div> 
              </div> 
              <div class="dl_mgtop10"> 
              <a name="addItem" href="#this" class="dl_add_ico blue">继续添加</a> 
              </div> 
              </div> 
              <div class="dl_educationwrap mainContainer"> 
              <a name="语言能力"></a> 
              <div class="dl_greyline_bg"> 
              <span class="dl_menutit ">语言能力</span> 
              <span class="dl_padl20 errmsg new_pop_error" id="errorMsg_4" ></span> 
              </div> 
              <div class="dl_basicborder" > 
              <div class="eduhistory_drmmbnew pos_realitive"> 
              <div id="resumeitems" class="eduinfo rightcontent_edrmmb"> 
              <div class="form_container" id="RecruitmentPortal.Lang"> 
              <div class="form_part"> 
              <div class="form_part_container columnone">


                   <ul> 
                    <li><select name="yuyan" id="RecruitmentPortalPersonProfile_YearsOfWork" class="mul_select"> 
                        <option value="">请选择</option>
                        <option value="精通四国语言">精通四国语言</option>
                        <option value="精通五国语言">精通五国语言</option>
                        <option value="精通六国语言">精通六国语言</option>
                        <option value="精通七国语言">精通七国语言</option>
                        <option value="精通八国语言">精通八国语言</option>
                    </select></li> 
                   </ul>


              </div> 
              </div> 
              </div> 
              </div> 
              </div> 
              <div class="dl_borderdashed"></div>  
              </div> 
              <div class="dl_mgtop10"> 
              <a name="addItem" href="#this" class="dl_add_ico blue">继续添加</a> 
              </div> 
              </div> 
              <div class="dl_bd_btm"></div> 
              <div class="dl_cen_txt dl_htline32 dl_padt15"> 
              <span class="dl_btn_lev dl_ft14_grey dl_padr10"><a name="btnPre" href="?r=apply_info/gai"><b>上一步</b></a></span>
                            <input type="submit" value='下一步' />
 
              </div> 
              </div> 
              </div> 
              </div> 
     <?php ActiveForm::end() ?>
     <?php $this->endBody() ?>

 </body>
</html>
<?php $this->endPage() ?>
