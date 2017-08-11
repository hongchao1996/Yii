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
  <title>职位申请 - 基本信息</title> 
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
  <script type="text/javascript" id="user-info-header">


        var makeUserInfo = function (resp) {
            var self = this;
            var userInfoKey = 'userInfo';
            self[userInfoKey] = {};
            self[userInfoKey].name = resp.Model.Email;
            self[userInfoKey].shortName = (self[userInfoKey].name && self[userInfoKey].name.length > 20) ? self[userInfoKey].name.substring(0, 20) : self[userInfoKey].name;
            self[userInfoKey].isLogin = resp.Success;
            self[userInfoKey].firstLogin = resp.Model.ThFirstLogin;
            return self[userInfoKey]
        }

        $.ajax({
            url: 'ajax.php?v=' + Math.random()
            , data: {}
            , async: false
            , type: 'post'
            , success: function (resp) {
                //配置用户基本信息
                makeUserInfo.apply(window, [resp]);
            }//success
            , error: function () {
                throw new Error('ERROR: get user info')
            }
        });//ajax

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
          <li class="basic" onclick="BSGlobal.navigate(0);" style="cursor: pointer;"><a href="?r=apply_info" onclick="BSGlobal.navigate(0);"><span class="dl_grey3">1基本信息</span></a></li> 
          <li class="greyarrow"></li> 
          <li class="greyprofile" ><a href="?r=apply_resume/index"><span class="dl_grey2">2个人履历</span></a></li> 
          <li class="greyarrow"></li> 
          <li class="greysubmit" style="cursor: pointer;"><a href="?r=apply_review" onclick="BSGlobal.navigate(4);"><span class="dl_grey2">3预览/提交</span></a></li> 
         </ul> </td> 
       </tr> 
      </tbody>
     </table> 
    </div> 
    <div> 
     <style type="text/css">
  *html .dl_myleftform .form_container{ width: 490px;overflow: hidden}
  *html .dl_myleftform .form_container .form_part .columntwo ul{ width: 360px;overflow: hidden;}
  *html .dl_myleftform .form_container ul li{ width: 360px;overflow: hidden}
  /* .dl_myleftform .form_container li label{width: 100px}*/
*html .dl_myleftform .form_container ul li span.preview_text{ width: 220px;overflow: hidden;}
*html .dl_myleftform .form_container ul li textarea.textarea{ width: 200px;}
*html .form_container li span.desc
{
    
	margin-right:-3px;
	position:relative;
}
   .redBorder,.form_container li textarea.redBorder,
    .form_part li input.redBorder{border: red 1px solid;}

</style> 
     <div class="dl_bacwrap dl_new_error_wrap"> 
      <div class="mainwrap"> 
       <br /> 
       <h3 class="dl_bigtit"> <span class="dl_postit">基本信息</span> <span class="dl_padl20"></span> </h3> 
       <br /> 
       <a name="个人信息"></a> 
       <div class="dl_greyline_bg"> 
        <span class="dl_menutit">个人信息</span> 
       </div> 



       <!-- <form method="post"  enctype="multipart/form-data" action="?r=apply_info/add_do"> 

 -->
      <?php 
        use yii\widgets\ActiveForm;
        $form = ActiveForm::begin([
          'id' => 'login-form',
          'options' => ['class' => 'form-horizontal'],
          'action'=>['apply_info/add_do'],
          'method'=>'post'
        ])

       ?>

        <div class="clearfix"> 
         <div class="dl_myleftform"> 
        
          
          <div class="form_container" id="RecruitmentPortal.PersonProfile"> 
           <h2 class="form_title"> <strong>个人信息</strong> <span class="tab"></span> </h2> 
             <div class="form_part"> 
            <div class="form_part_container columnone"> 
             <ul> 
              <li>
              <label class="current label_required">姓名：</label>
               <input class="{required:true,messages:&quot;请填写姓名&quot;} mul_input" name="username" id="4c037148-140a-4c2b-b87a-b97609215d7011" value="" /></li> 
              <li><label class="current label_required">性别：</label> 
               <div class="radio_list"> 
                <input type="radio" name="sex" value="0" /> 
                <label class="radio_label">男</label> 
                <input type="radio" name="sex" value="1" /> 
                <label class="radio_label">女</label> 
               </div> </li> 
              <li><label class="current label_required">出生日期：</label> <input class="mul_input Wdate" name="c_date" id="436ab7a4-67a1-4819-a238-d5d34eb0717611" value="" /> <span class="desc"></span> </li> 
              <li><label class="current label_required">邮箱：</label> <input class="{required:true,messages:&quot;请填写邮箱&quot;} mul_input" name="email" id="67a5c587-4f90-4ae7-819f-eb3dba9ea39911" value="" /> <span class="desc"></span> </li> 
              <li><label class="current label_required">手机号：</label> <input class="{required:true,messages:'请填写手机号'} mul_input " name="phone" id="acb9b67f-9643-41fb-a7fe-5ff8d742ccdf11" value="" /> </li> 
             </ul> 
            </div> 
            <div class="clear"></div> 
           </div> 
           <div class="form_part"> 
            <div class="form_part_container columnone"> 
             <ul> 
              <li>
              <label class="current label_required">工作年限：</label> 
              <select name="job_date" id="RecruitmentPortalPersonProfile_YearsOfWork" class="mul_select"> 
                  <option value="">请选择</option>
                    <?php foreach ($list1 as $key => $value): ?>
                        <option value="<?=$value['id']?>"><?=$value['job_time']?></option>
                    <?php endforeach ?>
              </select> </li> 
              <li>
               </ul> </li> 
             </ul> 
            </div> 
            <div class="clear"></div> 
           </div> 
          </div> 
         </div> 
         <div id="imgContainer" class="dl_myrightfile" style="display: none;"> 
          <img id="idPhoto" style="width:120px;height:140px;" src="images/upfile.jpg" /> 
          <br /> 
          <a class="blue" id="idPhotoUploadBtn" href="###">上传照片</a> 
          <span id="idPhotoerrinfo" class="new_pop_error" style="display:none;"></span> 
          <ul id="idPhotowarninfo" class="warninfo"> 
          </ul> 
         </div> 
        </div> 
      <!--  </form>  -->
       <a name="求职意向"></a> 
       <div class="dl_greyline_bg"> 
        <span class="dl_menutit">求职意向</span> 
       </div> 



       <!-- <form method="post" id="0738c88a-d372-4401-a39d-782141723d86" name="0738c88a-d372-4401-a39d-782141723d86" class="formPart" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem"> 
 -->


        <div class="clearfix"> 
         <div class="dl_myleftform"> 
         
          <div class="form_container" id="RecruitmentPortal.Objective"> 
           <h2 class="form_title"> <strong>求职意向</strong> <span class="tab"></span> </h2> 
           <div class="form_part"> 
            <div class="form_part_container columnone"> 
             <ul> 
              <li><label>现从事行业：</label> <input class="mul_input industry" name="now_job" id="ef3f9faf-97c6-432b-9c6b-0b0b66c5c4271212_txt" value="" /> </li> 
              <li><label>现从事职业：</label> <input type="text"  id="RecruitmentPortalObjective_CurrJobCategory_Id" name='now_zhiye' />  </li> 
              <li><label>现工作城市：</label> 

               <select name="job_city" class="jobs"> 
                  <option value="">请选择</option>
                    <?php foreach ($list2 as $key => $value): ?>
                        <option value="<?=$value['region_id']?>"><?=$value['region_name']?></option>
                    <?php endforeach ?>
              </select> </li> 

              </li> 
              <li>
              <label>现月薪(税前)：</label>
               <select name="now_money" id="RecruitmentPortalObjective_CurrSalary" class="mul_select"> 
                    <option value="">请选择</option>
                 <?php foreach ($list as $key => $value): ?>
                      <option value="<?=$value['id']?>"><?=$value['yue']?></option>
                    <?php endforeach ?>   
               </select> </li> 
              <li><label class="current label_required">期望从事行业：</label> <input class="mul_input industry" name="qi_job" id="e5688d4a-bad3-48fb-842e-0ae7df7036d51212_txt" value="" />  </li> 
              <li><label class="current">期望从事职业：</label> <input type="text"  name='qi_zhiye' id="RecruitmentPortalObjective_ExpectJobCategory_Id" />  </li> 
              <li><label class="current label_required">期望工作城市：</label> <input name="qi_city" id="bdb0be18-1b30-4001-817e-34807ab4d94b1212_txt" value="" />  </li> 
              <li>
              <label>期望月薪(税前)：</label> 
              <select name="qi_y_money" id="RecruitmentPortalObjective_ExpectSalary" class="mul_select"> 
                  <option value="">请选择</option>
                 <?php foreach ($list as $key => $value): ?>
                      <option value="<?=$value['id']?>"><?=$value['yue']?></option>
                    <?php endforeach ?>
              </select> </li> 
              <li><label>到岗时间：</label> 

                  <select name="d_date" id="RecruitmentPortalObjective_EntrantDate" class="mul_select"> 
                      <option value="">请选择</option> <option value="1">一周内</option> 
                      <option value="一个月内">一个月内</option> 
                      <option value="三个月内">三个月内</option> 
                      <option value="三个月以上">三个月以上</option> 
                      <option value="面议">面议</option>
                  </select> </li> 
             </ul> 
            </div> 
            <div class="clear"></div> 
           </div> 
          </div> 
         </div> 
        </div> 
                <!-- <a  class="dl_btn_grey1"><span>保存并下一步</span></a>  -->
                <input type="submit" class="dl_btn_grey1" value='提交' />
               <!-- <div class="dl_padl40"> -->
<!--            <a href="javascript:void(0);" class="dl_btn_green1" id="submitbutton"><span>登录</span></a>
 -->
          </div> 
<?php ActiveForm::end() ?>
       <!-- </form>  -->
       <!-- <div class="dl_bd_btm"></div> 
       <div class="dl_subbtn dl_htline32"> 
        <span class="dl_btn_lev dl_ft14_grey dl_padr10"><a name="btnCancel" href="#this"><b>取消</b></a></span> 
        <a name="btnSave" href="#this" class="dl_btn_grey1"><span>保存并下一步</span></a> 
       </div> 
       <div class="error_show" style="text-align:center;padding-top:10px;display:none">
        <span class="new_pop_error" style="width:auto;font-weight:bold">部分内容未填写完整，请完善。</span>
       </div> 
      </div>  -->
     </div>  
     <?php $this->endBody() ?>
 </body>
</html>
<?php $this->endPage() ?>
<script>
    $(function(){

      $('.jobs').change(function(){
          $('.jobss').remove();
          $('.jobsss').remove();
          var id = $(this).val();
          $.ajax({
            type:'get',
            url:'?r=apply_info/register',
            data:'id='+id,
            dataType:'json',
            success:function(data){
                var str = '';
                str += '<select name="job_city" class="jobss">' 
                str += '<option value="">请选择</option>'
                $.each(data,function(k,v){ 
                    str += '<option value='+v.region_id+'>'+v.region_name+'</option>'
                });
                str += '</select>'
              $('.jobs').after(str);
             
            }
          });
      });


      $(document).on('change','.jobss',function(){
          var id = $(this).val();
          $.ajax({
            type:'get',
            url:'?r=apply_info/register',
            data:'id='+id,
            dataType:'json',
            success:function(data){
                var str = '';
                str += '<select name="job_city" class="jobsss">' 
                str += '<option value="">请选择</option>'
                $.each(data,function(k,v){ 
                    str += '<option value='+v.region_id+'>'+v.region_name+'</option>'
                });
                str += '</select>'
              $('.jobss').after(str);
             
            }
          });
      });
    });
</script>
