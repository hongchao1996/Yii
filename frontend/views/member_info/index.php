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
  <title>账户设置</title> 
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
      <img id="logoImg" class="header-logo-img" src="images/104003_medias_20141215_20141215logo.jpg?v=635542641034400000" style="width: 300px;height:80px;" /> 
     </div> 
     <div class="dl_rightit"> 
      <div class="isApplyDetail" > 
       <div class="isLogin" > 
       <?php
           $session = \Yii::$app->session;
           $mysession = $session->get('smister_array');
          foreach ($mysession as $key => $value) {
            $name = $value['username'];
          }
       ?>
        <span id="topUserEmail" class="pad3" title=""><span class="userShortName"></span><?=$name?> ，欢迎您！</span> 
        <span class="pad3"><a href="?r=index/index">招聘首页</a></span> 
        <em class="dl_header_line dl_padtb05">|</em> 
        <span class="isUserCenter"> <span class="pad3"><a href="?r=member_apply/index">个人中心</a></span> <em class="dl_header_line dl_padtb05">|</em> </span> 
        <span class="pad3"><a href="?r=login/tuichu">退出</a></span> 
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
       .area-title {
	        height:20px;
	        border-bottom:solid 1px #D3DAE2
        }
        .area-title .label {
	        display:inline-block;
	        border-bottom:solid 1px #3887BC;
	        padding:0 3px 0 3px
        }
        .account-settings .area {
	        padding:10px 10px 10px 10px
        }
        .base-info,.we-chat-bind {
	        margin:10px 20px 10px 30px;
	        padding:10px;
	        position:relative
        }
        .release-relation-weChat {
	        display:inline-block;
	        float:right
        }
        .text {
	        padding:10px 0 5px 10px
        }
        .relation-user {
	        color:#879900;
	        display:inline-block;
	        margin-left:10px
        }
        .td1 {
	        width:15%;
	        text-align:right;
	        padding-right:20px
        }
        .td2 {
	        width:59%
        }
        .td3 {
	        width:25%;
	        text-align:right
        }
        .btn {
	        color:#06C;
	        margin-left:15px;
	        cursor:pointer;
            z-index:99;
        }
        .base-info .btn {
            float:right;
        }
        .user-name-label {
            margin-right:20px
        }
        input.user-name {
	        width:260px;
            height:20px;
            line-height:20px;
        }
        table.user-info-table td {
	        padding-top:5px;
	        padding-bottom:5px
        }
        input.confirm-password,input.new-password,input.original-password {
	         width:200px;
            height:20px;
            line-height:20px;
        }
        .err-msg {
	        color:#F17F7F;
	        margin-left:10px;
	        position:absolute;
        }
        .err-msg.err-message-name {
	        white-space:nowrap;
	        position:absolute
        }
        .password-pattern-note {
	        color:#AAA;
        }
        .is-not-null {
	        color:#F17F7F;
	        width:10px;
	        display:inline-flex;
        }
        .we-chart-img {
	        height:200px
        }
        .dl_dialog1 {
            -moz-border-radius: none;
            -webkit-border-radius: none;
            -o-border-radius: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            -o-box-shadow: none;
        }
    </style> 
    <style type="text/css">
        .pop-container{box-shadow:4px 3px 10px rgba(0,0,0,.3),-4px -3px 10px rgba(0,0,0,.3);-moz-box-shadow:4px 3px 10px rgba(0,0,0,.3),-4px -3px 10px rgba(0,0,0,.3);-webkit-box-shadow:4px 3px 10px rgba(0,0,0,.3),-4px -3px 10px rgba(0,0,0,.3);-o-box-shadow:4px 3px 10px rgba(0,0,0,.3),-4px -3px 10px rgba(0,0,0,.3);background-color:#fff;-webkit-border-radius:8px}.pop-header{background-color:#4290C1;color:#fff;border-top-left-radius:8px;border-top-right-radius:8px;padding:7px}.pop-content{height:70px;border-bottom:solid 1px #ccc;text-align:center;vertical-align:middle}.pop-text{margin-top:33px}.pop-bottom{text-align:right;padding:7px 10px 7px 10px}.pop-cancel,.pop-submit{padding:5px 13px 5px 13px;background-color:#CCC;margin-left:10px;margin-right:12px;cursor:pointer}.simplemodal-overlay{background-color:#000}
    </style> 
    <script type="text/javascript">

        // author: zhangyue@beisen.com
        (function () { 
            var context = this;
            //安全验证：服务端代码返回的是一个input的标签：只能应用于原生form提交
            //对于ajax来说不适用，但是没有颗粒度更小的方式去获取安全码
            //这里通过jquery去生成html标签然后取name和value的方式得到安全码
            //这种方式比较波折
            this.securityTag = $('<input type="hidden" id="_RequestValidateToken" name="_RequestValidateToken" value="-280539596" >');
            //所有错误提示的信息统一管理
            this.errMsgMap = {
                correctNamePattern:     '请输入正确的邮箱'
                , typeOriginalPwd:      '请输入原始密码'
                , typeNewPwd:           '请输入新密码'
                , correctConfirmPwd:    '两次输入的密码不一致'
                , correctPattern:       '您输入的密码不符合规范'
                , isNotNull:            '必填'
            };
            this.ajax = function (urlKey, data, fn, config) {
                //所有ajax提交的url统一管理
                var urlMap = {
                    editPwd:                     '/Portal/Account/EditPwd'
                    , getUserInfo:               '/User/Account/GetUserInfo'
                    , editName:                  '/Portal/Account/EditUserName'
                    , getBindPortalUserStatus:   '/Portal/WechatAccount/GetWechatBindLoginStatus'
                    , unBindPortalUser:          '/Portal/WechatAccount/UnBindPortalUser'
                    , wechatBindImage:           '/Portal/WechatAccount/WechatBindImage'
                    , checkBindPortalUser:       '/Portal/WechatAccount/CheckBindPortalUser'
                    , getWechatUserInfoByUserId: '/Portal/WechatAccount/GetWechatUserInfoByUserId'
                };
                var url = urlKey ? urlMap[urlKey] : '';
                if (!url) {
                    throw new Error('url is null or empty string or undefined in ajax-function');
                    return false;
                }
                if (!data) {
                    throw new Error('data is null or undefined in ajax-function');
                    return false;
                }
                var defaultData = {};
                //取安全标签中的id和value塞入data中
                //提交请求时，部分请求需要安全验证，如果无验证则会报 ERR:500
                defaultData[context.securityTag.attr('id')] = context.securityTag.val();
                $.extend(data, defaultData);
                $.ajax({
                    url: url
                    //如果用户传入config并且有type则使用，默认为post
                    , type: config ? (config.type || 'post') : 'post'
                    , data: data
                    , cache: false
                    , success: function (resp) {
                        //把ajax提交的data传回去，如果有需要这里这以做filter
                        fn ? fn(data, resp) : null;
                    }
                    , error: function (msgObj) {
                        //统一处理ajax服务器端的错误，输出错误信息
                        //console.log('error message:');
                        //console.info(msgObj);
                        throw new Error("ajax:" + url);
                    }
                })
            }

            //Eventor最终会合model，view合并
            this.Eventor = function () {
                this.listenors = {};
            }
            this.Eventor.prototype = {
                listening: function (listenObj, eventName, fn) {
                    var self = this;
                    self.setListenor(eventName, fn);
                }
                , setListenor: function (eventName, fn) {
                    var self = this;
                    self.listenors[eventName] = fn;
                }
                , trigger: function (eventName) {
                    var self = this;
                    if (!self.listenors[eventName]) return;
                    var args = Array.prototype.slice.call(arguments);
                    //去掉参数数组里的第一个参数：eventName
                    args.shift();
                    self.listenors[eventName].apply(self, args);//这里的self是view
                }
            }

            this.Model = function (map) {
                context.Eventor.apply(this, arguments);
                this.attribute = map || {};
            } 
            this.Model.prototype = {
                set: function (map) {
                    var self = this;
                    $.each(map, function (key, value) {
                        var oldValue = self.attribute[key];
                        var newMap = {};
                        newMap[key] = value;
                        //查看监听器里面有木有监听事件，如果有则执行
                        if (self.listentors[key]) {
                            //执行监听事件时，传入更改前的值，然后传出新map值
                            listentors[key](oldValue, newMap)
                        }
                    })
                }
                , get: function (key) {
                    return this.attribute[key]
                }
            }
            $.extend(this.Model.prototype, new this.Eventor());

            this.Base = function (options) {
                context.Eventor.apply(this, arguments);
                this.model = options ? (options.model || {}) : {};
            };
            this.Base.prototype = {
                template: ''
                , model: {}
                , ui: {}
                , tagName: ''
                , className: ''
                , initialize: function () { }
                , events: function () { }
                , replace: function () {
                    var self = this;
                    var dataHtml = self._isFunction(self.template) ? self.template() : self.template;
                    for (key in self.model) {
                        var rex = new RegExp('\\<\\%=\\s*?' + key + '\\s*?\\>', "ig");
                        dataHtml = dataHtml.replace(rex, self.model[key])
                    }
                    return dataHtml
                }
                , translateUi: function () {
                    var self = this;
                    var aliveUi = {};
                    $.each(self.ui, function (key, val) {
                        aliveUi[key] = self.$el.find(val) || null
                    });
                    self.oriUi = self.ui;
                    self.ui = aliveUi
                }
                , wrapHtml: function () {
                    var wrapHtmlFront = "<" + this.tagName + " class='" + this.className + "'>";
                    var wrapHtmlEnd = "</" + this.tagName + ">";
                    return [wrapHtmlFront, this.replace(), wrapHtmlEnd].join('')
                }
                , render: function () {
                    this.initialize();
                    var dataHtml = this.replace();
                    var template_wraped = this.wrapHtml();
                    this.$el = $(template_wraped);
                    this.translateUi();
                    this.onRender();
                    this.bindEvents();
                    return this;
                }
                , show: function (view) {
                    var self = this;
                    view.render();
                    self.$el.parent().empty().append(view.$el);
                    //避免内存泄露，每次覆盖新元素的之后，把上一次的view清空
                    self = null;
                }
                //只可以应付简单的事件
                , bindEvents: function () {
                    var self = this;
                    self.events = self.events() || {};
                    $.each(self.events, function (fnAndSelector, fnName) {
                        //事件名和cssSelector以空格隔开
                        var fs = fnAndSelector.split(' ');
                        var bindEventName = fs[0];
                        var bindSelector = fs[1];
                        $el.on(bindEventName, bindSelector, function () {
                            //默认的this指针指向view
                            if (self[fnName]) {
                                self[fnName].apply(self, arguments);
                            }
                            else {
                                throw new Error('Have no function to implement which name is "' + fnName + '"');
                            }
                        })
                    });
                }
                 , _isFunction: function (obj) {
                     return !!(obj && obj.constructor && obj.call && obj.apply)
                 }
                , onRender: function () { }
            };
            $.extend(this.Base.prototype, new this.Eventor());

            this.UserBaseInfoView = function () {
                context.Base.apply(this, arguments);
            }
            this.UserBaseInfoView.prototype = new this.Base();
            this.UserBaseInfoView.prototype.tagName = 'table';
            this.UserBaseInfoView.prototype.className = 'user-info-table';
            this.UserBaseInfoView.prototype.onRender = function () {
                var self = this;
                var trs = self.$el.find('tr');
                $.each(trs, function (stateTr, tr) {
                    var tds = tr ? $(tr).find('td') : [];
                    $.each(tds, function (stateTd, td) {
                        $(td).addClass('td' + (stateTd + 1))
                    })
                });
            };
            this.UserBaseInfoView.prototype.showErrMeg = function (msgArr,uiFindFn,config) {
                var self = this;
                //错误信息的清楚等待时间
                var clearTime = 2000;
                //setTimeout指针的字符串前缀
                var pointerPrefix = 'errPointer';
                //默认的错误信息对象中key的后缀，约定view.ui中显示错误信息的tag的selector为默认的属性key加后缀
                var defaultErrUiSuffix = 'ErrMsg';
                var config = config || {};
                $.each(msgArr, function (state, msgMap) {
                    $.each(msgMap, function (uiKey, msg) {
                        //通过错误信息对象的key去找msg，通常情况下key后面有一个默认的后缀，如果传入了uiFindFn则key为函数返回值
                        var uiKey = uiFindFn ? uiFindFn(uiKey) : uiKey + defaultErrUiSuffix;
                        self.ui[uiKey].html(msg);
                        //setTimeout的指针保存为view对象的属性
                        if (!config.persist) {
                            if (!self[pointerPrefix + uiKey]) {
                                self[pointerPrefix + uiKey] = setTimeout(function () {
                                    self.ui[uiKey].html('');
                                    self[pointerPrefix + uiKey] = null
                                }, clearTime);
                            }
                        }
                    });//msgMap
                });//msgArr
            };

            //查看用户名的表单
            this.UserName = function (options) {
                context.UserBaseInfoView.apply(this, arguments);
                this.template = "<div class='text'><span class='user-name-label'>用户名：</span><span class='userName'><\%=userName></span>" +
                    "<span class='modify-user-password btn'>修改密码</span><span class='modify-user-name btn'>修改用户名</span></div>";
                this.ui = { userNameEdit: '.modify-user-name', userPassEdit: '.modify-user-password' };
                this.bindEvents = function () {
                    var self = this;
                    self.ui.userNameEdit.bind('click', function () {
                        var userNameEditor = new context.UserNameEditor({ model: self.model });
                        self.show(userNameEditor)
                    });
                    self.ui.userPassEdit.bind('click', function () {
                        var userPassEditor = new context.UserPassEditor({ model: self.model });
                        self.show(userPassEditor)
                    })
                }
            }
            this.UserName.prototype = new this.UserBaseInfoView();

            //修改用户名的表单
            this.UserNameEditor = function (options) {
                context.UserBaseInfoView.apply(this, arguments);
                this.template = "<div class='text'><span class='user-name-label'>用户名：</span>" +
                    "<input type='text' class='user-name' value='<\%=userName>' /><span class='err-msg err-message-name'></span>" +
                    "<span class='username-cancel btn'>取消</span><span class='username-submit btn'>确定</span></div>";
                this.ui = {
                    submit: '.username-submit'
                    , cancel: '.username-cancel'
                    , userNameErrMsg: '.err-message-name'
                    , userName: '.user-name'
                };
                this.bindEvents = function () {
                    var self = this;
                    self.ui.userName.bind('blur', function (e) {
                        var check = true;
                        var email = self.ui.userName.val();
                        if (!email) {
                            self.showErrMeg([{ 'userName': context.errMsgMap.isNotNull }], null, { persist: true });
                            check = false
                        }
                        else if (!/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i.test(email)) {
                            self.showErrMeg([{ 'userName': context.errMsgMap.correctNamePattern }], null, { persist: true });
                            check = false
                        }
                        else {
                            self.ui.userNameErrMsg.html('')
                        }
                        $(e.target).data('validate', check);
                    })
                    self.ui.submit.bind('click', function () {
                        //如果用户点击了修改用户名但是没有修改（没有触发任何input框的blur，这时候validate是未定义），则跳出
                        if (self.ui.userName.data('validate') != undefined && !self.ui.userName.data('validate')) return;
                        var email = self.ui.userName.val();
                        if (email === self.model.userName) {
                            var userName = new context.UserName({ model: self.model });
                            self.show(userName);
                            return
                        }
                        context.ajax('editName', { 'userName': email }, function (submitData, resp) {
                            var respMap = { success: 'Success', fieldErrors: 'FieldErrors' };
                            var fieldMap = { errMsg: 'ErrorMessage', fieldName: 'FieldName' };
                            var success = (resp && resp[respMap.success]) || false;
                            if (success) {
                                var userName = new context.UserName({ model: submitData });
                                self.show(userName);
                                //修改也页面Header的用户名, userNameText是改变header中用户名的函数
                                (window.loginHeaderView && window.loginHeaderView.userNameText) ? window.loginHeaderView.userNameText(submitData.userName) : null;
                            }
                            else {
                                //格式化错误信息提示对象为showErrMeg可用的数据结构
                                var errMsgArr = resp[respMap.fieldErrors].map(function (field) {
                                    var rMap = {};
                                    rMap[field[fieldMap.fieldName]] = field[fieldMap.errMsg];
                                    return rMap
                                });
                                self.showErrMeg(errMsgArr, null, { persist: true })
                            }
                        });
                    });
                    self.ui.cancel.bind('click', function () {
                        var userName = new context.UserName({ model: self.model });
                        self.show(userName)
                    })
                }
            }
            this.UserNameEditor.prototype = new this.UserBaseInfoView();

            //修改用户密码的表单
            this.UserPassEditor = function (options) {
                context.UserBaseInfoView.apply(this, arguments);
                this.template = function(){
                    var template = "<tr><td>用户名：</td>" +
                    "<td><span class='userName'><\%=userName></span></td><td><span class='pass-edit-cancel btn'>取消</span><span class='pass-edit-submit btn'>确认</span></td></tr>";
                    if (!window.userInfo.firstLogin) {
                        template += "<tr><td><span class='is-not-null'>*</span>旧密码：</td><td><input type='password' class='original-password' /><span class='err-msg err-message-original'></span></td><td></td></tr>";
                        //"<tr><td></td><td class='password-pattern-note'>第三方授权登录首次修改密码，旧密码不必填写</td><td></td></tr>";
                    }
                    else {
                        template += "<tr><td><span class='is-not-null'>*</span>旧密码：</td><td><input type='password' class='original-password' /><span class='err-msg err-message-original'></span></td><td></td></tr>";
                    }
                    template +=
                    "<tr><td><span class='is-not-null'>*</span>新密码：</td><td><input type='password' class='new-password' /><span class='err-msg err-message-new'></span></td><td></td></tr>" +
                    "<tr><td><span class='is-not-null'>*</span>确认密码：</td><td><input type='password' class='confirm-password' /><span class='err-msg err-message-confirm'></span></td><td></td></tr>" +
                    "<tr><td></td><td class='password-pattern-note'>密码长度6-30，允许英文、数字、特殊字符，区分大小写</td><td></td></tr>";
                    return template;
                }
                this.ui = {
                    submit:         '.pass-edit-submit'
                    , userName:     '.userName'
                    , cancel:       '.pass-edit-cancel'
                    , newPass:      '.new-password'
                    , confirmPass:  '.confirm-password'
                    , originalPass: '.original-password'
                    , errOri:       '.err-message-original'
                    , errNew:       '.err-message-new'
                    , errCom:       '.err-message-confirm'
                };
              
                this.onRender = function () {
                    var self = this;
                    context.UserBaseInfoView.prototype.onRender.apply(self, []);
                }
                this.pwdPattern = function (pwd) {
                    return (pwd && (pwd.length < 6 || pwd.length > 30 || /[\u4E00-\u9FA5]/ig.test(pwd))) ? false : true;
                }
                this.bindEvents = function () {
                    var self = this;
                    self.ui.originalPass.bind('blur', function (e) {
                        var status = true;
                        var target = $(e.target);
                        var value = target.val();
                        var errObj = {};
                        var uiKey = 'errOri';
                        if (!value) {
                            errObj[uiKey] = context.errMsgMap.isNotNull;
                            self.showErrMeg([errObj], function (key) { return key }, { persist: true });
                            status = false;
                        }
                        else if (!self.pwdPattern(value)) {
                            var errObj = {};
                            errObj[uiKey] = context.errMsgMap.correctPattern;
                            self.showErrMeg([errObj], function (key) { return key }, { persist: true });
                            status = false;
                        } else {
                            self.ui[uiKey].html(''); //self.placeNoteElement().oldPassword
                        }
                        target.data('validate', status);
                    });
                    self.ui.newPass.bind('blur', function (e) {
                        var status = true;
                        var target = $(e.target);
                        var value = target.val();
                        var errObj = {};
                        var uiKey = 'errNew';
                        if (!value) {
                            errObj[uiKey] = context.errMsgMap.isNotNull;
                            self.showErrMeg([errObj], function (key) { return key }, { persist: true });
                            status = false;
                        }
                        else if (value && !self.pwdPattern(value)) {
                            errObj[uiKey] = context.errMsgMap.correctPattern;
                            self.showErrMeg([errObj], function (key) { return key }, { persist: true });
                            status = false;
                        }
                        else if (value !== self.ui.confirmPass.val()) {
                            self.ui[uiKey].html('');
                            self.showErrMeg([{ 'errCom': context.errMsgMap.correctConfirmPwd }], function (key) { return key }, { persist: true });
                        }
                        else {
                            self.ui[uiKey].html('')
                        }
                        target.data('validate', status);
                    });
                    self.ui.confirmPass.bind('blur', function (e) {
                        var status = true;
                        var target = $(e.target);
                        var value = target.val();
                        var errObj = {};
                        var uiKey = 'errCom';
                        if( value !== self.ui.newPass.val() ){
                            errObj[uiKey] = context.errMsgMap.correctConfirmPwd;
                            self.showErrMeg([errObj], function (key) { return key }, { persist: true });
                            status = false;
                        }
                        else {
                            self.ui[uiKey].html('')
                        }
                        target.data('validate', status);
                    });
                    self.ui.submit.bind('click', function () {
                        var check = true;
                        var errMsgArr = [];
                        var originalPwd = self.ui.originalPass.val();
                        var newPwd = self.ui.newPass.val();
                        var confirmPwd = self.ui.confirmPass.val();
                        var status = {
                            'ori': window.userInfo.firstLogin? true: self.ui.originalPass.data('validate')
                            , 'new': self.ui.newPass.data('validate')
                            , 'con': self.ui.confirmPass.data('validate')
                        };
                        //判断是否已通过验证，旧密码不做判断
                        if (!status.ori || !status['new'] || !status.con) {//!status.ori ||
                            status.ori === undefined ? self.ui.errOri.html(context.errMsgMap.isNotNull) : null; //
                            status['new'] === undefined ? self.ui.errNew.html(context.errMsgMap.isNotNull): null;
                            status.con === undefined ? self.ui.errCom.html(context.errMsgMap.isNotNull): null;
                            return;
                        }
                        context.ajax('editPwd', { oldPwd: originalPwd, Password: newPwd, ConfirmPassword: confirmPwd }, function (submitData, resp) {
                            var respMap = { success: 'Success', fieldErrors: 'FieldErrors' };
                            var fieldMap = { errMsg: 'ErrorMessage', fieldName: 'FieldName' };
                            var success = (resp && resp[respMap.success]) || false;
                            if (success) {
                                var userName = new context.UserName({ model: { userName: self.ui.userName.text() } });
                                self.show(userName);
                                //修改完密码后，就不属于第一次登陆了，以后的修改密码操作需要有旧密码框
                                window.userInfo.firstLogin = false;
                            }
                            else {
                                //格式化错误信息提示对象为showErrMeg可用的数据结构
                                var errMsgArr = resp[respMap.fieldErrors].map(function (field) {
                                    var rMap = {};
                                    rMap[field[fieldMap.fieldName]] = field[fieldMap.errMsg];
                                    return rMap
                                });
                                self.showErrMeg(errMsgArr, function (key) {
                                    switch (key) {
                                        case 'oldPwd': return 'errOri';
                                        case 'Password': return 'errNew';
                                        case 'ConfirmPassword': return 'errCom';
                                    }
                                }, { persist: true })
                            }
                        });
                    });
                    self.ui.cancel.bind('click', function () {
                        var userName = new context.UserName({ model: self.model });
                        self.show(userName)
                    })
                }
            }
            this.UserPassEditor.prototype = new this.UserBaseInfoView();

            this.WeChartView = function () {
                context.Base.apply(this, arguments);
            }
            this.WeChartView.prototype = new this.Base();
            this.WeChartView.prototype.tagName = 'div';
            this.WeChartView.prototype.className = 'we-chart-container';
            this.WeChartView.prototype.onRender = function () {
                var self = this;
                var trs = self.$el.find('tr');
                $.each(trs, function (stateTr, tr) {
                    var tds = tr ? $(tr).find('td') : [];
                    $.each(tds, function (stateTd, td) {
                        $(td).addClass('td' + (stateTd + 1))
                    })
                });
            }
             
            this.WeChartBindView = function (options) {
                context.WeChartView.apply(this, arguments);
                this.template = '<div class="text">您的账号已绑定微信号<span class="relation-user"><\%=weChartName></span>' +
                    '<span class="release-relation-weChat btn">解除绑定</span></div>' +
                    '<div class="text">您可以进入微信公众号，随时查询申请状态。</div>';
                this.ui = {
                    unRelease: '.release-relation-weChat'
                }
                this.bindEvents = function () {
                    var self = this;
                    self.ui.unRelease.bind('click', function () {
                        var maxhas = [
                            '<div class="dl_dialog1">',
                               '	<div class="dl_dialog_wrap">',
                               '        <div class="dl_dialog_icowarn"><span>您确认要解除绑定么？</span></div>',
                               '	<div class="dl_dialog_btn">',
                               ' <a href="javascript:void(0);" class="dl_btn_grey1 ok" id="okbtn2"><span>确定</span></a>',
                               ' <a href="javascript:void(0);" class="dl_btn_grey1 ok" id="cancelBtn"><span>取消</span></a>',
                               '		<div>',
                               '	</div>',
                               '</div>'
                        ].join("");
                        $.modal(maxhas, {
                            containerCss: {
                                backgroundColor: "transparent",
                                borderColor: "transparent",
                                padding: 0,
                                width: '360px'
                            },
                            onShow: function (popView) {
                                popView.container.find("#okbtn2").bind("click", function () {
                                    //解除绑定 
                                    context.ajax('unBindPortalUser', {}, function (isUnBindSuccess) {
                                        if (Boolean(isUnBindSuccess)) {
                                            var weChartUnBindView = new context.WeChartUnBindView({ model: {} });
                                            self.show(weChartUnBindView);
                                            $.modal.close();
                                        }
                                        else {//接触绑定失败后控制台报错不做任何操作，几乎不可能出现解绑失败的情况
                                            throw new Erro('ERROR: unbind portal user')
                                        }
                                    });
                                });
                                popView.container.find("#cancelBtn").bind("click", function () {
                                    $.modal.close();
                                });
                            }
                        });
                    })
                }
            }
            this.WeChartBindView.prototype = new this.WeChartView();

            this.WeChartUnBindView = function (options) {
                context.WeChartView.apply(this, arguments);
                this.template = '<div class="text">用微信“扫一扫”绑定，使用微信登录、查询应聘状态、接受微信通知</div>';
                this.ui = {}
                this.bindEvents = function () { }
                this.onRender = function () {
                    var self = this;
                    //取二维码的src添加到页面里
                    context.ajax('wechatBindImage', {}, function (data, ImgResp) {
                        //防止url相同的image请求被ie11缓存，这里加了一个随机数
                        var imgSrc = ImgResp.Model + ('&v=' + Math.random());
                        var weChartImgHtml = '<img class="we-chart-img" src="' + imgSrc + '">';
                        self.$el.append($(weChartImgHtml));
                        //循环，查看是否已扫秒注册成功
                        (function circulation() {
                            setTimeout(function () {
                                context.ajax('getBindPortalUserStatus', {}, function (data, isBind) {
                                    if (Boolean(isBind)) {
                                        //绑定成功后取微信名
                                        context.ajax('getWechatUserInfoByUserId', {}, function (data, userInfoResp) {
                                            var userNameTem = new WeChartBindView({ model: { weChartName: userInfoResp.Model.NickName||'null' } });
                                            self.show(userNameTem)
                                        })
                                    }
                                    else { //false:未通过扫描，继续请求
                                        circulation()
                                    }
                                })
                            }, 2000);
                        })()
                    }, { type: 'get' });
                }
            }
            this.WeChartUnBindView.prototype = new this.WeChartView();

            this.MainWeChartView = function () {
                this.onRender = function () {
                    var self = this;
                    context.ajax('checkBindPortalUser', {}, function (submitData, isBind) {
                        if (Boolean(isBind)) {
                            //绑定成功后取微信名
                            context.ajax('getWechatUserInfoByUserId', {}, function (data, userInfoResp) {
                                var userNameTem = new WeChartBindView({ model: { weChartName: userInfoResp.Model.NickName || 'null' } });
                                self.show(userNameTem)
                            })
                        }
                        else {
                            var weUnbindView = new context.WeChartUnBindView();
                            self.show(weUnbindView)
                        }
                    });//context.ajax
                };//onRender
            }
            this.MainWeChartView.prototype = new this.WeChartView();
        }).apply(window.userSetting, []);

        $(document).ready(function () {

            var userNameTem = new UserName({ model: { userName: window.userInfo.name } });
            userNameTem.render();
            $(".base-info").append(userNameTem.$el);

            //判断是否显示微信
            var weChartDisplay = "False".toLowerCase()=="true"? true: false;
            weChartDisplay = weChartDisplay ? Boolean(weChartDisplay) : false;
            if (weChartDisplay) {
                var userNameTem = new MainWeChartView();
                userNameTem.render();
                $(".we-chat-bind").append(userNameTem.$el);
            }
        })
    </script> 
    <div class="dl_bigwrap dl_gray_bg clearfix"> 
     <div class="leftmenu"> 
      <div class="dl_greyline_bg"> 
      </div> 
      <ul class="dl_menulist clearfix"> 
       <li> <a href="<?php echo Url::toRoute(['member_apply/index'])?>" class="apply">我的申请</a> </li> 
       <li> <a href="<?php echo Url::toRoute(['member_resume/index'])?>" class="profile">我的简历</a> </li> 
       <li> <a href="<?php echo Url::toRoute(['member_collect/index'])?>" class="shoucang">已收藏职位</a> </li> 
       <!--<li 
         >
        
       <a href="/Portal/Account/EditPwd" class="changepwd">修改密码</a>
        
    </li--> 
       <li class="selected settingchoose"> <span class="dl_menuchose">账户设置</span> </li> 
      </ul> 
     </div> 
     <div class="rightcontent"> 
      <h3 class="dl_bigtit"> <span class="dl_postit">账户设置</span> </h3> 
      <div class="account-settings"> 
       <div class="area"> 
        <div class="area-title"> 
         <div class="label">
          账户信息
         </div> 
        </div> 
       </div> 
       <div class="area wechart">



        <span></span>


        
        <div class="we-chat-bind"></div> 
       </div> 
       <script type="text/javascript"> //判断是否显示微信，为了使页面不闪动，放到dom加载完成的后面接着执行代码
                      ("False".toLowerCase() == "true" ? true : false) ? null : $(".wechart.area").css('display');
                  </script> 
      </div> 
     </div> 
    </div> 
    <!--简历内容 e--> 
   </div> 
   <div class="dl_footer"> 
    <p>&copy;2015&nbsp;北京大生知行科技有限公司51talk&nbsp;&nbsp;京ICP备05051632号 京公网安备110108002767号 &nbsp;&nbsp;帮助热线：4006506886</p> 
   </div> 
  </div>  
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