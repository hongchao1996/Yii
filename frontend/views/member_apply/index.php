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
  <title>我的申请列表</title> 
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
        .dl_dialog_wrap span.new_pop_error {
            background: none;
            padding-left: 0px;
            color: #F17F7F;
            font-size: 12px;
            width: 260px;
        }

        .wish_container {
            width: 400px;
            margin-left: 15px;
            margin-right: 15px;
            margin-top: 10px;
        }

            .wish_container span.wish_err {
                margin-left: 130px;
            }

        .tit {
            width: 100px;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            padding-top: 10px;
        }

        .wish_container tr td select {
            width: 150px;
        }

        .wish_ct {
            max-height: 130px;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .dl_listposition .detail li {
            width: 144px;
        }

            .dl_listposition .detail li.testResult {
                width: 250px;
            }

            .dl_listposition .detail li a {
                padding-right: 5px;
            }

            .dl_listposition .detail li span {
                padding-right: 5px;
            }
    </style> 
    <script type="text/javascript">

        $(document).ready(function(){
        
            var promptView = new UserPrompt({
                targetSelector: 'a.accountSettings'
                , promptText: '在账户设置中，可以改用户名和密码啦！'
            });
            promptView.show();
        })
    </script> 
    <div class="dl_bigwrap dl_gray_bg clearfix"> 
     <div class="leftmenu"> 
      <div class="dl_greyline_bg"> 
       <span class="dl_menutit">个人中心</span> 
      </div> 
      <ul class="dl_menulist clearfix"> 
       <li class="selected applychoose"> <span class="dl_menuchose">我的申请</span> </li> 
       <li> <a href="<?php echo Url::toRoute(['member_resume/index'])?>" class="profile">我的简历</a> </li> 
       <li> <a href="<?php echo Url::toRoute(['member_collect/index'])?>" class="shoucang">已收藏职位</a> </li> 
       <!--<li 
         >
        
       <a href="/Portal/Account/EditPwd" class="changepwd">修改密码</a>
        
    </li--> 
       <li> <a href="<?php echo Url::toRoute(['member_info/index'])?>" class="accountSettings">账户设置</a> </li> 
      </ul> 
     </div> 
     <div class="rightcontent"> 
      <h3 class="dl_bigtit"><span class="dl_postit">我的申请</span> <!-- <span class="dl_mglft10">你还可以申请<span>2</span>个社招职位</span> --></h3> 
      <li class="result"> </li> 
      <div class="dl_mgtop20"> 
       <div class="dl_greyline_bg"> 
       
       </div> 
      </div> 
      <div class="dl_listposition dl_mgtop10"> 
          <table>
              <th>公司名称</th>
              <th>薪资要求</th>
              <th>公司地址</th>
              <th>申请时间</th>
              <th>申请状态</th>
              <th>操作</th>
              <?php foreach ($list as $key => $val): ?>
                
                    <tr>
                        <td><?=$val['com_name']?></td>
                        <td><?=$val['money']?></td>
                        <td><?=$val['didian']?></td>
                        <td><?=$val['dates']?></td>
                        <td><?php if($val['status']==0){
                          echo '等待查看';
                          }elseif($val['status']==1){
                            echo '已查看，请留意提示信息';
                            }else{
                              echo '对不起，您不符合我们公司的要求，谢谢';
                              }?></td>
                        <td><?php if($val['status']==0){
                          echo '<a href="javascript:void(0)">暂时无法删除</a>';
                          }else{
                              echo "<a href='?r=qiye/del&id='>删除</a>";
                              }?></td>
                    </tr>
              <?php endforeach ?>
          </table>
      </div> 
      <!-- 修改校招志愿 --> 
      <div class="tableNew" name="editform" style="display: none;"> 
       <div style="margin-bottom: 15px;">
        <span class="dl_postit">修改校招志愿</span>
       </div> 
       <div class="wish_ct"> 
        <table class="wish_container"> 
        </table> 
       </div> 
       <div class="wish_container">
        <span name="wishError" class="new_pop_error wish_err" style="display: none;"></span>
       </div> 
       <div class="wish_container">
       
       </div> 
      </div> 
      <div class="dl_bd_btm dl_padt15"></div> 
      <div class="dl_more blue dl_ft14">
       <b><a href="?r=jobs/index">查看更多职位&gt;&gt;</a></b>
      </div> 
      <input id="proId" type="hidden" /> 
     </div> 
    </div> 
    <!--简历内容 e--> 
   </div> 
   <div class="dl_footer"> 
    <p>&copy;2015&nbsp;北京大生知行科技有限公司51talk&nbsp;&nbsp;京ICP备05051632号 京公网安备110108002767号 &nbsp;&nbsp;帮助热线：4006506886</p> 
   </div> 
  </div>  
  <script language="javascript" type="text/javascript" src="js/json2.js"></script> 
  <script language="javascript" type="text/javascript">
        $(function () {
            BSGlobal.pt = function (pro, data) { //构造函数
                this.pro = pro || "beisen";
                this.data = data || {};
                this.init = function () {
                    this.initPage();
                };
                this.init.apply(this, arguments); //当前对象调用this.init方法,方法中的this指向其它对象.
            };

            BSGlobal.pt.prototype = {
                initPage: function () {
                    var that = this;
                    var htmlContent = $("div[name='editform']").html();
                    var editHtml = ['<div class="dl_dialog12 wishDia">',
                        '	<div class="dl_dialog_wrap dl_pad20">',
                        '       <div >' + htmlContent + '</div>',

                        '	</div>',
                          '	<div class="dl_dialog_btn dl_dialog_grey">',
                        ' <a href="###" class="dl_btn_blue1" id="btnSetWish"><span>确定</span></a>',
                        '	<a href="###" class="dl_btn_grey1 dl_mglft10 simplemodal-close"  id="btnClse"><span>取消</span></a>',
                        '</div>',

                        '<div>'
                    ].join("");

                    var html = ['<div class="dl_dialog1 ">',
                        '	<div class="dl_dialog_wrap">',
                        '       <div class="dl_dialog_icoqa"><span>确认是否放弃正在进行中的申请?</span></div>',
                        '	<div class="dl_dialog_btn">',
                        ' <a href="javascript:void(0);" class="dl_btn_grey1" id="btnSure"><span>确定</span></a>',
                        '	<a href="javascript:void(0);" class="dl_btn_grey1 dl_mglft10 simplemodal-close"  id="btnClse"><span>取消</span></a>',
                        '		<div>',
                        '	</div>',
                        '</div>'].join("");
                    $(".drop").click(function () {
                        $("#proId").val($(this).attr("newId"));
                        $.modal(html, {
                            containerCss: {
                                backgroundColor: "transparent",
                                borderColor: "transparent",
                                padding: 0
                            }
                        });
                    });

                    $(".resign_apply").click(function () {
                        var t = $(this);
                        var ctml = ['<div class="dl_dialog1 ">',
                        '	<div class="dl_dialog_wrap">',
                        '       <div class="dl_dialog_icoqa"><span>确定要撤销申请吗？ 如果确定，请在下面填写撤销原因</span></div>',
                        '       <div><textarea onpropertychange="if(value.length>100) value=value.substr(0,100)" class="resign_reason" style="width:311px;height:70px;resize:none;margin-top:5px;" maxlength="100"></textarea></div>',
                        '	<div class="dl_dialog_btn">',
                        ' <a href="javascript:void(0);" class="dl_btn_grey1" id="btnResignSure" jid="' + t.attr("jid") + ' " pid="' + t.attr("pid") + '"applyId="' + t.attr("applyId") + '"wishtype="' + t.attr("wishtype") + '"><span>确定</span></a>',
                        '	<a href="javascript:void(0);" class="dl_btn_grey1 dl_mglft10 simplemodal-close"  id="btnClse"><span>取消</span></a>',
                        '		<div>',
                        '	</div>',
                        '</div>'].join("");
                        $.modal(ctml, {
                            containerCss: {
                                backgroundColor: "transparent",
                                borderColor: "transparent",
                                padding: 0
                            }
                        });
                    });

                    $("#wish").click(function () {
                        
                        if (that.data.isUseNewWish) {
                            
                            window.location.href= that.data.newWishUrl;
                        } else {
                            $.modal(editHtml, {
                                containerCss: {
                                    backgroundColor: "transparent",
                                    borderColor: "transparent",
                                    padding: 0
                                }
                            });
                        }

                    });

                    $(".comeon").click(function () {
                        var allowApplyCount = $(this).attr("allowapplycount");
                        var allowReApply = $(this).attr("allowreapply");
                        var applyCount = $(this).attr("applycount");

                        if (applyCount > 0) {
                            if (allowReApply.toLowerCase() == "false") {
                                that.showMsgDialog("您之前已经成功申请过该职位，请不要重复申请！");
                                return;
                            }
                        } else {
                            if (allowApplyCount < 1) {
                                that.showMsgDialog("您已经达到最大的职位申请数量");
                                return;
                            }
                        }

                        window.location = $(this).attr("url");
                    });

                    $("#btnSure").live("click", function () {
                        var newId = $("#proId").val();
                        $.post("CancelMyApply", { "id": newId }, function (data) {
                            if (data) {
                                window.location.reload();
                            }
                        }, "json");
                        $.modal.close();

                    });
                    $("#btnResignSure").live("click", function () {
                        var reason = $("textarea.resign_reason").val();
                        //撤销原因弹窗确定
                        var t = $(this);
                        var jobId = t.attr("jid");
                        var personId = t.attr("pid");
                        var applyId = t.attr("applyId");
                        var wishtype = t.attr("wishtype");
                        $.ajax({
                            url: "/Portal/Apply/CancelMyCompleteApply",
                            type: "POSt",
                            data: { personId: personId, jobId: jobId, reson: reason, applyId: applyId,wishType:wishtype },
                            success: function () {
                                $.modal.close();
                                window.location.reload();
                            }
                        });
                        $.modal.close();
                    });

                    $("#btnSetWish").live("click", function () {
                        var dialog = $(this).parents(".wishDia");
                        var models = [];

                        $("span[name='wishError']").html("志愿不符合规范");

                        var items = dialog.find("tr");

                        items.each(function () {

                            var item = $(this);
                            var id = item.attr("phaseid");
                            var applyId = item.attr("apply");
                            var wishType = item.find("select[name='wishType']").val(); //.attr("wishType");
                            var jobId = item.attr("jobid");
                            var jobAdId = item.attr("jobadid");

                            models.push({
                                "WishType": wishType, "Id": id, "ApplyId": applyId
                                , "JobId": jobId, "JobAdId": jobAdId
                            });

                        });

                        if (!that.checkWishForm(this)) {
                            return;
                        }

                        var postData = JSON.stringify(models);

                        $.ajax({
                            url: that.data.setWishUrl,
                            type: 'post',
                            dataType: 'json',
                            contentType: 'application/json; charset=utf-8',
                            data: postData,
                            success: function (data) {
                                $.modal.close();
                                window.location.reload();
                            },
                            complete: function () {

                            }
                        });

                    });

                    this.initTestResultList();
                }
                , checkWishForm: function (saveBtn) {
                    var dialog = $(saveBtn).parents(".wishDia");

                    var items = dialog.find("tr");

                    var fiWishCount = 0;
                    var seWishCount = 0;
                    var thWishCount = 0;
                    var foWishCount = 0;
                    var itemCount = items.length;

                    items.each(function () {

                        var item = $(this);
                        var wishType = item.find("select[name='wishType']").val(); //.attr("wishType");

                        switch (parseInt(wishType)) {
                            case 1:
                                fiWishCount++;
                                break;
                            case 2:
                                seWishCount++;
                                break;
                            case 3:
                                thWishCount++;
                                break;
                            case 99:
                                foWishCount++;
                                break;
                        }
                    });

                    if (itemCount == 0) {
                        $("span[name='wishError']").html("未投递职位，不能设置志愿").show();
                        return false;
                    }
                    if (fiWishCount == 0 && seWishCount == 0 && thWishCount == 0 && foWishCount == 0) {
                        $("span[name='wishError']").show();
                        return false;
                    }

                    if (fiWishCount > 1) {
                        $("span[name='wishError']").show();
                        return false;
                    }
                    if (seWishCount > 1) {
                        $("span[name='wishError']").show();
                        return false;

                    }
                    if (thWishCount > 1) {
                        $("span[name='wishError']").show();
                        return false;

                    }
                    if (itemCount == 1) {
                        if (fiWishCount == 0) {
                            $("span[name='wishError']").show();
                            return false;
                        }
                        if (seWishCount > 1 || thWishCount > 1 || foWishCount > 1) {
                            $("span[name='wishError']").show();
                            return false;
                        }
                    }
                    else if (itemCount == 2) {
                        if (fiWishCount == 0) {
                            $("span[name='wishError']").show();
                            return false;
                        }
                        if (seWishCount == 0) {
                            $("span[name='wishError']").show();
                            return false;
                        }
                        if (thWishCount > 1 || foWishCount > 1) {
                            $("span[name='wishError']").show();
                            return false;
                        }
                    }
                    else if (itemCount == 3) {
                        if (fiWishCount == 0) {
                            $("span[name='wishError']").show();
                            return false;
                        }
                        if (seWishCount == 0) {
                            $("span[name='wishError']").show();
                            return false;
                        }
                        if (thWishCount == 0) {
                            $("span[name='wishError']").show();
                            return false;
                        }
                        if (foWishCount > 1) {
                            $("span[name='wishError']").show();
                            return false;
                        }
                    }
                    else if (itemCount > 3) {
                        if (fiWishCount == 0) {
                            $("span[name='wishError']").show();
                            return false;
                        }
                        if (seWishCount == 0) {
                            $("span[name='wishError']").show();
                            return false;
                        }
                        if (thWishCount == 0) {
                            $("span[name='wishError']").show();
                            return false;
                        }
                        if (foWishCount == 0) {
                            alert(foWishCount);
                            $("span[name='wishError']").show();
                            return false;
                        }
                    }

                    $("span[name='wishError']").html("").hide();

                    return true;
                }
                , showMsgDialog: function (msg) {
                    var htmlError = ['<div class="dl_dialog1">',
                        '     <div class="dl_dialog_wrap">',
                        '       <div class="dl_tocenter">',
                        '<span class="dl_dialog_icook dl_ft14_grey2"><b>' + msg + '</b>',
                        '</span>',
                        '</div>',
                        '     <div class="dl_dialog_btn">',
                        ' <span class="dl_green1"></span>',
                        '              <div>',
                        '     </div>',
                        '</div>'].join("");
                    $.modal(htmlError, {
                        containerCss: {
                            backgroundColor: "transparent",
                            borderColor: "transparent",
                            padding: 0
                        }
                    });


                    function a() {
                        $.modal.close();
                    }
                    setTimeout(a, 2000);
                }
                , initTestResultList: function () {
                    $.ajax({
                        url: this.data.getInvitedTestJobIdsUrl,
                        type: "post",
                        data: null,
                        dataType: "json",
                        contentType: 'application/json; charset=utf-8',
                        success: function (result) {
                            if (!result.IsAllowAutoTest)
                                return;
                            if (null != result.JobIds && result.JobIds.length > 0)
                                for (var i = 0; i < result.JobIds.length; i++) {
                                    var currentJobApply = $(".testResult[jobid='" + result.JobIds[i] +"'][personid='" + result.PersonIds[i] +"']");
                                    if (currentJobApply.length > 0) {
                                        currentJobApply.prepend("<a href='javascript:void(0);' onclick='showTest(" + currentJobApply.attr("id") + ");'>查看测评</a>");
                                    }
                                }
                        },
                        complete: function () {
                        }
                    });
                }
            };
        });

        function showTest(applyId) {
            //获取单条申请的参数
            var postArray = [];
            postArray.push({ "JobId": $("#" + applyId).attr("jobid"), "PersonId": $("#" + applyId).attr("personid"), "Id": applyId });
            var postData = JSON.stringify(postArray);
            //获取单条申请的测评结果并显示
            $.ajax({
                url: BSGlobal.data.getTestsUrl,
                type: 'post',
                data: postData,
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                success: function (result) {
                    showTestDetail(result.data[0]);
                },
                complete: function () {

                }
            });
        }

        function showTestDetail(data) {
            //var self = $(this);
            //var data = self.data("data");
            var tests = data.CmsUserInviteTestList;
            var testLstHtml = [];
            testLstHtml.push('<div class="dl_dialog1" style="width: 300px;padding-left: 50px;padding-right: 50px">');
            testLstHtml.push('<div class="dl_dialog_wrap">');

            //if (tests.Key) {
            //    testLstHtml.push('<div><span style="color:#666666;line-height:30px">您的测评已完成。</span></div>');
            //}
            //else
            if (tests.Value != null && tests.Value.length > 0) {
                testLstHtml.push('<div><span style="color:#aaa;line-height:30px">您的测评邀请已经发送到您的个人信息中填写的邮箱，也可以通过邮箱的链接进行测评</span></div>');
                testLstHtml.push('<div>');
                testLstHtml.push('<ul style="margin-top: 20px">');
                if (tests.Value) {
                    for (var j = 0; j < tests.Value.length; j++) {
                        var test = tests.Value[j];

                        testLstHtml.push('<li class="clearfix"><span style="float: right;line-height:30px;">');
                        if ((test.State == 1 || test.State == 2) && test.TestUrl != '') {
                            testLstHtml.push('<a href="' + test.TestUrl + '">' + test.StateStr + '</a>');
                        } else if (test.TestUrl != '') {
                            testLstHtml.push(test.StateStr);
                        }
                        testLstHtml.push('</span><span>');
                        testLstHtml.push(test.AvtivityName);
                        testLstHtml.push('</span></li>');
                    }
                }
                testLstHtml.push('</ul>');
                testLstHtml.push('</div>');
            }
            else {
                testLstHtml.push('<div><span style="color:red;line-height:30px">数据出现异常，请联系管理员处理。</span></div>');
            }


            testLstHtml.push('<div class="dl_dialog_btn">');
            testLstHtml.push('<a href="javascript:void(0);" class="dl_btn_grey1 dl_mglft10 simplemodal-close" id="btnClse"><span>取消</span></a>');
            testLstHtml.push('</div></div></div>');

            $.modal(testLstHtml.join(""), {
                containerCss: {
                    backgroundColor: "transparent",
                    borderColor: "transparent",
                    padding: 0
                }
            });
        }

    </script> 
  <script language="javascript" type="text/javascript">
        $(function () {
            BSGlobal.data = {
                setWishUrl: '/Portal/Apply/UpdateWishByBatch',
                getTestsUrl: '/Portal/Apply/GetTests',
                
                isUseNewWish:false,
                newWishUrl:'/Portal/Apply/ChangeWish',

                getInvitedTestJobIdsUrl: '/Portal/Apply/GetInvitedTestJobIds'
            };
            BSGlobal.page = new BSGlobal.pt("CmsPortal", BSGlobal.data);
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
 </body>
</html>