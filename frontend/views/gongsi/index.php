<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
  <link type="text/css" rel="stylesheet" href="mycss/frontmodule.css" /> 
  <link type="text/css" rel="stylesheet" href="mycss/5_themes_default_style.css?v=0.0.0.9" front="css" /> 
  <link type="text/css" rel="stylesheet" href="mycss/5_themes_default_easydropdown.css?v=0.0.0.9" front="css" /> 
  <link type="text/css" rel="stylesheet" href="mycss/5_themes_default_flexslider.css?v=0.0.0.9" front="css" /> 
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
  <script type="text/javascript" src="js/5_themes_default_jquery191.js?v=0.0.0.9"></script> 
  <script type="text/javascript" src="js/5_themes_default_jqueryeasydropdownmin.js?v=0.0.0.9"></script> 
  <script type="text/javascript" src="js/5_themes_default_jqueryflexslidermin.js?v=0.0.0.9"></script> 
  <script type="text/javascript" src="js/5_themes_default_demo.js?v=0.0.0.9"></script> 
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
  <title>动态详情</title> 
 </head> 
 <body> 
  
    
  </div> 
  <div class="contain"> 
   <div class="clearfix containtext"> 
    <div class="dongtaitext bodertop"> 
     <!--module:newsdetail begin--> 
     <div class="bs-module"> 
      <div class="newsdetail-newdefault "> 
       <div class="parttitleline"></div> 
       <div class="parttitle">
        <span class="dongtaiico"></span> 
        <div class="wordtitle">
            <?=$list[0]['title']?>
        </div> 
       </div> 
       <div class="zhaopintext"> 
        <p></p>
        <p><span style="font-size: medium; font-family: 微软雅黑; color: #000080;"><strong><?=$list[0]['jieshou3']?></strong></span></p> 
        <p><strong><br /></strong></p> 
        <p><span style="font-family: 微软雅黑; font-size: small;"><strong><?=$list[0]['zhwei_name']?></strong></span></p> 
        <p><span style="font-size: small; font-family: 微软雅黑;"><strong><?=$list[0]['jieshao2']?></strong></span></p> 
        <p>&nbsp;</p> 
        <p><span style="font-family: 微软雅黑; font-size: small;"><strong>您需要掌握的技能</strong></span></p> 
        <p><span style="font-size: small; font-family: 微软雅黑;"><strong><?=$list[0]['yaoqie']?></strong></span></p>
       </div> 
       <div class="fenxiangdao clearfix"> 
        <div class="shareto" style="float: left; margin-left: 20px; margin-bottom: 20px">
         <b>分享到:</b>
        </div> 
        <div style="float: left" class="jiathis_style"> 
         <a class="jiathis_button_email">&nbsp;</a> 
         <a class="jiathis_button_tqq">&nbsp;</a> 
         <a class="jiathis_button_qzone">&nbsp;</a> 
         <a class="jiathis_button_xiaoyou">&nbsp;</a> 
         <a class="jiathis_button_tsina">&nbsp;</a> 
         <a class="jiathis_button_renren">&nbsp;</a> 
        </div> 
       </div> 
       <script type="text/javascript" src="js/jia.js" charset="utf-8"></script> 
       <div class="job_list"> 
        <div> 
         <div class="detail" style="text-align: left;">
          <b>感觉我们还可以:</b>
         </div> 
         <div style="text-align: left; margin-bottom: 150px; width: 576px"> 
          <span style="display: inline-block;width: 1200px; font-size:small";> <a title="Android开发工程师" class="blue1" href="?r=gongsi/adds&id=<?=$list[0]['id']?>" style="font-size:50px">发放您的简历给我们</a> </span> 
       
          <?php if(!empty($list1) && $list1[0]['status']==4){
                      echo '<a href="javascript:void(0)">已收藏</a>';
                  }else{
                      echo '<a class="blue1" href="?r=gongsi/cang&id='.$list[0]["id"].'"> 收藏</a>';
          }?> 

         </div> 
        </div> 
       </div> 
      </div> 
     </div> 
     <!--module:newsdetail end--> 
    </div> 
    <div class="zhaopindongtai bodertop"> 
     <!--module:newslist begin--> 
     <div class="bs-module"> 
      <div class="newslist-newsimple "> 
       <div class="parttitleline"></div> 
       <div class="parttitle">
        <span class="dongtaiico"></span>
        <div class="wordtitle">
         招聘动态
        </div>
       </div> 
       <a href="news.html" class="morelinks">更多&gt;&gt;</a> 
       <div class="dongtailinks"> 
        <ul> 
         <li><a href="news_detail.html?110000085" title="51Talk最嗨实习岗来啦~快来一起嗨" target="_blank">51Talk最嗨实习岗来...</a></li> 
        </ul> 
       </div> 
      </div> 
     </div> 
     <!--module:newslist end--> 
    </div> 
   </div> 
  </div> 
   
  <script type="text/javascript">
        require([
            vstr('${st}/${version}/cmsportal/skin/js/baiduStatistics.js')

		]);
    </script><script type="text/javascript">
    $(function(){
    _splash('zhiye_contentpage',0,104003,'new.zhiye.com');
    });
    </script>
 </body>
</html>