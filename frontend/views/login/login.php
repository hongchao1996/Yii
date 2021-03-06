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
  <title>注册</title> 
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
    <div class="dl_content"> 
     <div class="map"> 
      <div class="dl_lit-wrap dl_padr30 width553 clearfix"> 
       <!-- <form id="registForm" method="post" action="<?php// echo Url::toRoute(['register/register_do'])?>">  -->
       <?php 
        use yii\widgets\ActiveForm;
        $form = ActiveForm::begin([
          'id' => 'login-form',
          'options' => ['class' => 'form-horizontal'],
          'action'=>['login/login_do'],
          'method'=>'post'
        ])

       ?>
        <input type="hidden" id="returnurl" name="returnurl" value="" /> 
        <div class="dl_loginleft dl_padr0"> 
         <h3 class="dl_tit_green">登录</h3> 
         <ul class="dl_error_wrap15"> 
          <li class="clearfix"> 
              <span class="dl_form_left">用户</span> 
              <span class="dl_form_right"> 
              <?= $form->field($model, 'username')->textInput(['class'=>'dl_textinp'])->label('')?> 
              </span>
          </li> 
          <li class="clearfix"> 
              <span class="dl_form_left">密码</span> 
              <span class="dl_form_right"> 
              <?= $form->field($model, 'password')->textInput(['class'=>'dl_textinp'])->label('')?> 
              </span>
               </li> 
         
          <li class="clearfix"> 
              <span class="dl_form_left">验证码</span> 
              <div class="validate_content validatecode_info" style="display: inline-block; margin-left: 0px;"> 
              <span class="validate_bac"> <?= $form->field($model, 'verifyCode')->textInput(['class'=>'dl_textinp'])->label('') ?>
              </span> 
              <?=Captcha::widget(['name'=>'captchaimg','captchaAction'=>'site/captcha',
              'imageOptions'=>['id'=>'captchaimg', 'style'=>'cursor:pointer;margin-left:25px;'],'template'=>'{image}']);?>
           </div> 
          </li>

           <li class="clearfix"> 
              <span class="dl_form_left">七天免登陆</span> 
              <span class="dl_form_right"> 
              <?= $form->field($model,'status')->checkbox(['1'=>'七天免登陆'])->label('') ?>

              </span>
               </li> 

         </ul> 
         <div class="next"> 
          <div class="dl_padl40">
           <a href="javascript:void(0);" class="dl_btn_green1" id="submitbutton"><span>登录</span></a>

          </div> 
         </div> 
        </div> 
       <!-- </form>  -->
       <?php ActiveForm::end() ?>
       <div class="dl_loginright width170"> 
        <div class="dl_register">
         <span class="noaccount">没有账号？</span>
         <a href="<?php echo Url::toRoute(['register/reg'])?>">点击注册</a>
        </div> 
        <h3 class="dl_otherchoice">使用其他账号登录：</h3> 
        <div class="dl_logos"> 
         <a class="dl_sinalogo dl_grey1 sina" href="javascript:void(0)" url="/User/OAuth/OAuthIndex?snstype=sina_connect_v2&amp;returnurl=http%3a%2f%2f51talk.zhiye.com%2fPortal%2fAccount%2fRegister&amp;host=51talk.zhiye.com&amp;portalid=104003">微博</a> 
         <a class="dl_qqlogo dl_grey1 qq" href="javascript:void(0)" url="/User/OAuth/OAuthIndex?snstype=qzone_login&amp;returnurl=http%3a%2f%2f51talk.zhiye.com%2fPortal%2fAccount%2fRegister&amp;host=51talk.zhiye.com&amp;portalid=104003">QQ</a> 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
    <script type="text/javascript" src="js/jquery.validate.unobtrusive.js"></script> 
    <script type="text/javascript" src="js/jquery.form.min.js"></script> 
    <script language="javascript" type="text/javascript">
        function getImgSrc() {
            document.getElementById('imgcode').src = 'http://' + window.location.hostname + '/User/Account/GetValidateCode?=' + new Date().getTime();
        };
        getImgSrc()

        $('.change_validate').click(function () {
            getImgSrc();
        });
        $(function () {
            function OpenTips() {
                var html = ['<div class="dl_dialog1">',
                                       '     <div class="dl_dialog_wrap">',
                                       '       <div class="dl_tocenter">',
                                       '<span class="dl_dialog_icook dl_ft14_grey2"><b>注册成功!</b>',
                                       '</span>',
                                       '</div>',
                                       '     <div class="dl_dialog_btn">',
                                      
                                       '              <div>',
                                       '     </div>',
                                       '</div>'].join("");
                // $("#submitbtn").click(function () {
                $.modal(html, {
                    containerCss: {
                        backgroundColor: "transparent",
                        borderColor: "transparent",
                        padding: 0,
                        width: '135px'
                    },
                    onClose:function() {
                        $.modal.close();
                        location.reload();
                    }
                });
                function a() {
                    $.modal.close();
                }

                setTimeout(a, 2000);
                
                // });
            } ;
            var form = $('#registForm').ajaxForm({
                dataType: 'json',
                beforeSerialize: function ($form, options) {
                    var jsonResultHidden = form.find('input:hidden[name=JsonResult]').val(true);
                    if (!jsonResultHidden.length) {
                        jsonResultHidden = $('<input type="hidden" name="JsonResult" value="true"/>').appendTo(form);
                    }
                },
                success: function (response, textStatus) {
                    if (response.Success) {
                        if (response.RedirectUrl) {
                            if (window.location.href != response.RedirectUrl) {
                                OpenTips();
                                window.location.href = response.RedirectUrl;       
                            } else {
                                OpenTips();
                                window.location.href = '/';
                            }
                        } else {
                            window.location.href = '/';
                        }
                    } else {
                        var msgStr = '';
                        for (var i = 0; i < response.Messages.length; i++) {
                            msgStr += response.Messages[i] + '\r\n';
                        }

                        var validator = form.validate();
                        //var errors = [];
                        for (var i = 0; i < response.FieldErrors.length; i++) {
                            var obj = {};
                            obj[response.FieldErrors[i].FieldName] = response.FieldErrors[i].ErrorMessage;
                            validator.showErrors(obj);
                        }
                        getImgSrc();
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) { alert('error'); }
            });

            //$("#UserName").click(function() {
            //    if ($(this).val() == '请输入电子邮箱') {
            //        $(this).val("");
            //    }
            //});
            
            //$("#UserName").blur(function () {
            //    if ($(this).val() == '') {
            //        $(this).val("请输入电子邮箱");
            //    }
            //});
            $("#Checkid").click(function () {
                
                if ($("#Checkid").is(":checked")) {
                    $("#submitbutton").show();
                    $("#unsubmitbutton").hide();
                } else {
                    $("#submitbutton").hide();
                    $("#unsubmitbutton").show();
                }
            });
            
            $("#UserName").blur(function () {//失去焦点时触发
                var userName = $("#UserName").val();
                
                //判断是否符合邮箱格式，别的地方已经做得错误信息提示，木有找到位置，其实是想统一处理的
               
                if (userName != "" && userName != "请输入电子邮箱" && /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i.test(userName)) {
                    $.post("RegisterValidate", { "userName": userName }, function(data) {
                        if (data) {
                            $(".validate").show();
                        } else {

                        }
                    }, "json");
                } else {
                    $("#UserName").addClass("dl_dftgrey");
                }
            });
            $("#UserName").focus(function () {
                if ($("span[data-valmsg-for='UserName']").length > 0 || $("span[data-valmsg-for='UserName']").html() != "") {
                    $(".validate").hide();
                }
           
            });
        });
    </script> 
    <!--简历内容 e--> 
   </div> 
   <div class="dl_footer"> 
    <p>&copy;2015&nbsp;北京大生知行科技有限公司51talk&nbsp;&nbsp;京ICP备05051632号 京公网安备110108002767号 &nbsp;&nbsp;帮助热线：4006506886</p> 
   </div> 
  </div>  
  <script language="javascript" type="text/javascript">
        $(".sina,.qq").click(function () {
            var url = $(this).attr("url");
            window.open(url, 'newwindow', 'height=600, width=800, top=200, left=300, toolbar=no, menubar=no, scrollbars=no, resizable=yes,location=no, status=no');
        });
        $("#submitbutton").click(function () {
            $("form").submit();
        });
        $(function () {

            $(".dl_textinp").blur(function () {
                var node = $(this);
                var nodeVal = node.val();
                var nodeDefault = node.attr("defaultValue");
                if (nodeVal == "") {
                    node.val(nodeDefault);
                    //node.addClass("dl_dftgrey");
                }
                var info = node.attr("info");
                if (info && info != "") {
                    var name = node.attr("name");
                    node.parents("span").find('span[data-valmsg-for="' + name + '"]').show();
                    node.parents("span").find("span[name='inputinfo']").remove();
                }
            });

            //$(".dl_textinp").click(function () {
            //    alert("ssss");
            //    var node = $(this);
            //    var info = node.attr("info");
            //    if (info && info != "") {
            //        var name = node.attr("name");
            //        node.parents("span").find('span[data-valmsg-for="' + name + '"]').hide();
            //        $("<span name='inputinfo' class='dl_ft14_grey' style='margin-left:15px;display:block;font-size:5px;'>" + info + "</span>").insertAfter(node);
                   
            //    }
            //});

            $(".dl_textinp").focus(function () {
                var node = $(this);
                var nodeVal = node.val();
                var nodeDefault = node.attr("defaultValue");
                if (nodeVal == nodeDefault) {
                    node.val("");
                    node.removeClass("dl_dftgrey");
                }
                var info = node.attr("info");
                if (info && info != "") {
                    var name = node.attr("name");
                    //var display = node.parents("span").find('span[data-valmsg-for="' + name + '"]').css("display");
                    //if (display == "inline-block" || display == "block")
                    //    return;
                    if (node.parents("span").find('span[name="inputinfo"]').length == 0) {
                        node.parents("span").find('span[data-valmsg-for="' + name + '"]').hide();
                        $("<span name='inputinfo' class='dl_ft14_grey' style='margin-left:15px;display:inline-block;font-size:12px;'>" + info + "</span>").insertAfter(node);
                    }
                }
            });
        });
    </script> 
  <script language="javascript" type="text/javascript">

        function SetCss() {
            var win = window.location.href;
            if (win.indexOf("Apply") != -1) {
                $("#myapply a").addClass("current");
            }
            else if (win.indexOf("ResumeItem") != -1) {
                $("#myresume a").addClass("current");
            }
            else if (win.indexOf("EditPwd") != -1) {
                $("#changepwd a").addClass("current");
            }
        }
        SetCss();

        $(function () {

            setInterval(function () {
                try {
                    DrawImage($("#logoImg"), '350', '80');
                } catch (e) {
                }
            }, 100);
        });

        function DrawImage(ImgD, FitWidth, FitHeight) {
            var image = new Image();

            image.src = $(ImgD).attr("src");

            if (image.width > 0 && image.height > 0) {
                if (image.width / image.height >= FitWidth / FitHeight) {
                    if (image.width > FitWidth) {
                        $(ImgD).css("width", FitWidth);
                        $(ImgD).css("height", (image.height * FitWidth) / image.width);
                    } else {
                        $(ImgD).css("width", image.width);
                        $(ImgD).css("height", image.height);
                    }
                } else {
                    if (image.height > FitHeight) {
                        $(ImgD).css("height", FitHeight);
                        $(ImgD).css("width", (image.width * FitHeight) / image.height);
                    } else {
                        $(ImgD).css("width", image.width);
                        $(ImgD).css("height", image.height);
                    }
                }
                $(ImgD).show();
            }
        }
    </script>  
    <?php $this->endBody() ?>

 </body>
</html>
<?php $this->endPage() ?>
