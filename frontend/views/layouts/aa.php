<?php

use yii\helpers\Url;

?>
<div class="header"> 
   <div class="headercontain"> 
    <div class="logo"> 
     <img src="images/104003_medias_20141215_20141215logo.jpg?v=635542641034400000" /> 
    </div> 
    <!--module:login begin--> 
    <div class="bs-module"> 
     <div class="login-link "> 
      <div class="login-hearder"> 

	<?php 
	 $session = \Yii::$app->session;
	 $mysession = $session->get('smister_array');
	 if(!empty($mysession)){
	 	foreach ($mysession as $key => $value) {
	 	if($value['id']){
	 		$name = $value['username'];
			echo '<ul class="header-login"> 
        <li class="welcome"><span><span class="userName" style="float:none"></span>'.$name.'，欢迎您！</span></li> 
        <li class="PortalIndex"><a href="'.Url::toRoute(['member_apply/index']).'"><span>个人中心</span></a></li> 
        <li class="LogoutUrl"><a href="'.Url::toRoute(['login/tuichu']).'"><span>退出</span></a></li> 
       </ul>';
	 	}
	 }
	 }else{
	 		echo '<ul class="header-unLogin"> 
        <li><a class="loginlink" href="'.Url::toRoute(['login/login']).'"> <span>登录</span> </a></li> 
        <li><a class="reglink" href="'.Url::toRoute(['register/reg']).'"><span> 注册</span></a></li> 
       </ul>';
	 	}
	 
	?>  


       

        
      </div> 
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
     </div> 
    </div> 
    <!--module:login end-->
    <!--module:internalrecommend begin--> 
    <div class="bs-module"> 
     <div class="internalrecommend-default "> 
      <div class="internaldiv"> 
       <a class="internal" href="http://neitui.zhiye.com/51talk" target="_blank">内部推荐专区</a> 
      </div> 
     </div> 
    </div> 
    <!--module:internalrecommend end--> 
   </div> 
  </div> 
  <div class="nav"> 
   <!--module:menu begin--> 



   <div class="bs-module"> 
    <div class="menu-simple "> 
     <ul id="portalmenu"> 
     <!-- current -->
      <li><a target="_self" href="?r=index/index" class="">首页</a> </li> 
      <li><a target="_self" href="?r=jobs/index" class="">全部职位</a> </li> 
      <li><a target="_self" href="social.html" class="">社会招聘</a> </li> 
      <li><a target="_self" href="jobs.html" class="">校园招聘</a> </li> 
      <li><a target="_self" href="jobs.html" class="">实习生招聘</a> </li> 
      <li><a target="_self" href="about.html" class="">公司介绍</a> </li> 
      <li><a target="_self" href="?r=qiye/index" class="">我是企业用户</a> </li> 
     </ul> 
    </div> 
   </div> 




   <!--module:menu end--> 
  </div> 
  <div class="pictureturn"> 
   <!--module:imageslider begin--> 
   <div class="bs-module"> 
    <div class="imageslider-default "> 
     <div class="flexslider"> 
      <ul class="slides"> 
       <li> <img src="images/104003_medias_2015923_201592317513947.jpg" /> </li> 
      </ul> 
     </div> 
     <script type="text/javascript">
    $(document).ready(function(){
        $('.flexslider').flexslider({ animation: "fade", directionNav: false, slideshowSpeed: 5000 });
    });
</script> 
    </div> 
   </div> 
   <!--module:imageslider end--> 
  </div> 

<?php echo $content?>


<div class="footer">
   <span> &copy;2015&nbsp;&nbsp;51talk&nbsp;&nbsp;京ICP备05051632号 京公网安备110108002767号 &nbsp;Powered by&nbsp;<a href="http://www.beisen.com" class="footerlogo" target="_blank"></a> </span> 
  </div>  
