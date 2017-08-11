<?php

use yii\widgets\LinkPager;?>

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
  <link type="text/css" rel="stylesheet" href="mycss/frontmodule.css" /> 
  <link type="text/css" rel="stylesheet" href="mycss/5_themes_default_style.css?v=0.0.0.9" front="css" /> 
  <link type="text/css" rel="stylesheet" href="mycss/5_themes_default_flexslider.css?v=0.0.0.9" front="css" /> 
  <link type="text/css" rel="stylesheet" href="mycss/5_themes_default_jqueryuicore.css?v=0.0.0.9" front="css" /> 
  <link type="text/css" rel="stylesheet" href="mycss/5_themes_default_jqueryuiselectmenu.css?v=0.0.0.9" front="css" /> 
  <link type="text/css" rel="stylesheet" href="mycss/5_themes_default_jqueryuitheme.css?v=0.0.0.9" front="css" /> 
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
  <script type="text/javascript" src="js/5_themes_default_jqueryflexslidermin.js?v=0.0.0.9"></script> 
  <script type="text/javascript" src="js/5_themes_default_jqueryuicore1.js?v=0.0.0.9"></script> 
  <script type="text/javascript" src="js/5_themes_default_jqueryuiposition.js?v=0.0.0.9"></script> 
  <script type="text/javascript" src="js/5_themes_default_jqueryuiwidget.js?v=0.0.0.9"></script> 
  <script type="text/javascript" src="js/5_themes_default_jqueryuiselectmenu1.js?v=0.0.0.9"></script> 
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
  <title>全部职位</title> 
 </head> 
 <body> 
  
   <!--module:menu end--> 
  </div> 
  <div class="pictureplace"> 
   <!-- <div class="pictureplacecenter"> 
    <img src="images/commonbanner.jpg?v=634507909375300000" /> 
   </div> --> 
  </div> 
  <div class="contain joblist clearfix"> 
   <div class="containsidebar"> 
    <!--module:positioncategory begin--> 
    <div class="bs-module"> 
     <div class="positioncategory-smallfresh "> 
      <div class="zhiweifenlei bodertop"> 
       <div class="parttitleline"></div> 
       <div class="parttitle height0">
        <span class="fenleiico"></span>
        <div class="wordtitle lh0" title="职位类型">
         职位类型
        </div>
       </div> 
       <div class="fenleilist"> 
        <ul class="firstlist clearfix"> 
         <li><a href="jobs.html?p=1^20#jlt" constval="20" title="北京"></a></li> 
         <li><a href="jobs.html?p=1^9#jlt" constval="9" title="上海"></a></li> 
        </ul> 
       </div> 
      </div> 
     </div> 
    </div> 
    <!--module:positioncategory end--> 
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
   <div class="clearfix sousuocontain fl"> 
    <!--module:positionsearch begin--> 
    <div class="bs-module"> 
     <div class="positionsearch-smallfresh "> 
      <a name="jlt"></a> 
      <div class="zhiweisousuo bodertop"> 
       <div class="parttitleline"></div> 
       <div class="parttitle"> 
        <span class="serchico"></span> 
        <div class="wordtitle">
         职位搜索
        </div> 
       </div> 
       <div class="serchcontain"> 
        <input type="hidden" name="p" value="" id="jobAdClassHidden" />
        <input type="hidden" name="p" value="" id="jobAdClassHidden" />
        <input type="hidden" name="p" value="" id="jobAdClassHidden" />
        <input type="hidden" name="p" value="" id="jobAdClassHidden" />
        <input type="hidden" name="p" value="" id="jobAdClassHidden" />
        <input type="hidden" name="p" value="" id="jobAdClassHidden" />
        <table class="jobserch"> 
         <tbody>
          <tr class="serchjob"> 
           <td class="listtitle">工作地点：</td> 
           <td> 
            <ul class="workplace"> 
             <span class="selectall"><span class="shuxian"></span><a href="jobs.html?r=&amp;p=&amp;c=-1&amp;d=&amp;k=#jlt" class="chooseon" title="全部">全部</a></span> 
             <li> <span class="shuxian"></span> <a href="jobs.html?r=&amp;p=&amp;c=1&amp;d=&amp;k=#jlt" title="全国">全国</a> </li> 
             <li> <span class="shuxian"></span> <a href="jobs.html?r=&amp;p=&amp;c=1100&amp;d=&amp;k=#jlt" title="北京市">北京市</a> </li> 
             <li> <span class="shuxian"></span> <a href="jobs.html?r=&amp;p=&amp;c=1103&amp;d=&amp;k=#jlt" title="海淀区">海淀区</a> </li> 
             <li> <span class="shuxian"></span> <a href="jobs.html?r=&amp;p=&amp;c=3100&amp;d=&amp;k=#jlt" title="上海市">上海市</a> </li> 
             <li> <span class="shuxian"></span> <a href="jobs.html?r=&amp;p=&amp;c=3102&amp;d=&amp;k=#jlt" title="徐汇区">徐汇区</a> </li> 
             <li> <span class="shuxian"></span> <a href="jobs.html?r=&amp;p=&amp;c=8100&amp;d=&amp;k=#jlt" title="香港">香港</a> </li> 
            </ul> </td> 
          </tr> 
          <input type="hidden" name="p" value="" id="jobAdClassHidden" /> 
          <input type="hidden" name="p" value="" id="jobAdClassHidden" /> 
          <tr class="serchjob"> 
           <td class="listtitle" title="职位类型">职位类型：</td> 
           <td> 
            <ul class="workplace"> 
             <span class="selectall"><span class="shuxian"></span><a href="jobs.html?r=&amp;p=1^-1&amp;c=&amp;d=&amp;k=#jlt" class="chooseon" title="全部">全部</a></span> 
             <li> <span class="shuxian"></span> <a href="jobs.html?r=&amp;p=1^20&amp;c=&amp;d=&amp;k=#jlt" title="北京">北京</a> </li> 
             <li> <span class="shuxian"></span> <a href="jobs.html?r=&amp;p=1^9&amp;c=&amp;d=&amp;k=#jlt" title="上海">上海</a> </li> 
            </ul> </td> 
          </tr> 
          <tr class="serchjob"> 
           <td class="listtitle">发布时间：</td> 
           <td> 
            <ul class="workplace"> 
             <span class="selectall"><span class="shuxian"></span><a href="jobs.html?r=&amp;p=&amp;c=&amp;d=-1&amp;k=#jlt" class="chooseon">全部</a></span> 
             <li> <span class="shuxian"></span> <a href="jobs.html?r=&amp;p=&amp;c=&amp;d=3&amp;k=#jlt" title="三天内">三天内</a> </li> 
             <li> <span class="shuxian"></span> <a href="jobs.html?r=&amp;p=&amp;c=&amp;d=7&amp;k=#jlt" title="一周内">一周内</a> </li> 
             <li> <span class="shuxian"></span> <a href="jobs.html?r=&amp;p=&amp;c=&amp;d=30&amp;k=#jlt" title="一个月内">一个月内</a> </li> 
             <li> <span class="shuxian"></span> <a href="jobs.html?r=&amp;p=&amp;c=&amp;d=90&amp;k=#jlt" title="三个月内">三个月内</a> </li> 
             <li> <span class="shuxian"></span> <a href="jobs.html?r=&amp;p=&amp;c=&amp;d=180&amp;k=#jlt" title="半年内">半年内</a> </li> 
            </ul> </td> 
          </tr> 
          <input type="hidden" name="p" value="" id="jobAdClassHidden" /> 
          <tr class="serchjob"> 
           <td class="listtitle">招聘类别：</td> 
           <td> 
            <ul class="workplace"> 
             <span class="selectall"><span class="shuxian"></span><a href="jobs.html?r=-1&amp;p=&amp;c=&amp;d=&amp;k=#jlt" class="chooseon">全部</a></span> 
             <li> <span class="shuxian"></span> <a href="jobs.html?r=1&amp;p=&amp;c=&amp;d=&amp;k=#jlt" title="社会招聘">社会招聘</a> </li> 
             <li> <span class="shuxian"></span> <a href="jobs.html?r=2&amp;p=&amp;c=&amp;d=&amp;k=#jlt" title="校园招聘">校园招聘</a> </li> 
             <li> <span class="shuxian"></span> <a href="jobs.html?r=3&amp;p=&amp;c=&amp;d=&amp;k=#jlt" title="实习生招聘">实习生招聘</a> </li> 
            </ul> </td> 
          </tr> 
          <input type="hidden" name="p" value="" id="jobAdClassHidden" /> 
          <input type="hidden" name="p" value="" id="jobAdClassHidden" /> 
          <tr class="serchjob"> 
           <td class="listtitle"></td> 
           <td> <input type="text" class="serchinput" maxlength="50" id="k" name="k" /><span class="serchbtn"><a href="javascript:void(0)" id="searchlink">搜索</a></span></td> 
          </tr> 
          <input type="hidden" name="p" value="" id="jobAdClassHidden" /> 
         </tbody>
        </table> 
       </div> 
      </div> 
      <script type="text/javascript">
    function GetParam(key) {
        return (document.location.search.match(new RegExp("(?:^\\?|&)" + key + "=(.*?)(?=&|$)")) || ['', null])[1];
    }

    function myHTMLEnCode(str) {
        var s = "";
        if (str.length == 0) return "";
        s = str.replace(/&/g, "&");
        s = s.replace(/</g, "<");
        s = s.replace(/>/g, ">");
        s = s.replace(/ /g, "&nbsp;");
        s = s.replace(/\'/g, "&#39;");
  
        s = s.replace(/\n/g, "<br>");
        return s;
    }

    function myHTMLDeCode(str) {
        var s = "";
        if (str.length == 0) return "";
        s = str.replace(/&/g, "&");
        s = s.replace(/</g, "<");
        s = s.replace(/>/g, ">");
        s = s.replace(/&nbsp;/g, " ");
        s = s.replace(/&#39;/g, "\'");
        s = s.replace(/"/g, "\"");
        s = s.replace(/<br>/g, "\n");
        return s;
    }

    var defaultText = "请输入关键字";

    $(document).ready(function () {
        $("input[name='keyword']").click(function () {
            $(this).val("");
        });

        var keyWord = GetParam("k");

        if (keyWord != null) {
            keyWord = decodeURIComponent(keyWord);
            keyWord = myHTMLDeCode(keyWord);

            $("input[name='k']").val(keyWord);
        }

        $("#searchlink").click(function () {
            var r = GetParam("r");
            r = (r == null ? -1 : r);
            var p = GetParam("p");
            p = (p == null ? "" : p);
            var c = GetParam("c");
            c = (c == null ? "" : c);
            var d = GetParam("d");
            d = (d == null ? "" : d);
            var k = $("input[name='k']").val();

            if (k == defaultText)
                k = "";

            k = myHTMLEnCode(k);
            k = encodeURIComponent($.trim(k));
            location.href = "jobs.html" + "?r=" + r + "&p=" + p + "&c=" + c + "&d=" + d + "&k=" + k + '#jlt';
        });

        var keyStr = $("#k").val();
        if (!keyStr || keyStr == "") {
            $("#k").css("color", "#d2cece");
            $("#k").val(defaultText);
        }

        $("#k").focus(function () {
            var v = $(this).val();
            if (v == defaultText) {
                $(this).val("");
                $(this).css("color", "");
            }
        });

        $("#k").blur(function () {
            var v = $(this).val();
            if (!v || v == "") {
                $(this).val(defaultText);
                $(this).css("color", "#d2cece");
            }
        });

    });
</script> 
     </div> 
    </div> 
    <!--module:positionsearch end--> 
    <!--module:positionlist begin--> 
    <div class="bs-module"> 
     <div class="positionlist-newtemplate "> 
      <div class="clearfix tablecontain"> 
       <table class="listtable"> 
        <thead> 
         <tr class="tabletitle"> 
          <th class="tableleft">&nbsp;&nbsp;公司名称</th> 
          <th class="tableleft" title="职位类型">职位类型</th> 
          <th class="tableleft">工作地点</th> 
          <th class="tableleft">发布时间</th> 
         </tr> 
        </thead> 
        <tbody>
          <?php foreach ($list as $key => $val): ?>
             <tr> 
                <td class="tableleft joblsttitle"> <a title="业务培训总监/区域培训总监 /销售运 营总监" jobadid="620025388" href="?r=gongsi/index&id=<?=$val['id']?>"><?=$val['com_name']?> </a> </td> 
                <td class="tableleft joblsttitle" title="业务部"><?=$val['zhwei_name']?></td> 
                <td title="" class="tableleft joblsttitle"><?=$val['didian']?></td> 
                <td class="tableleft joblsttitle"><?=$val['dates']?></td> 
            </tr> 
          <?php endforeach ?>
        
        
        </tbody>
       </table> 
       <?= LinkPager::widget(['pagination' => $pagination]) ?>

<!--        <span class="tablenote">共<?=$list1?>条记录</span> 
 -->       
        
       </div> 
      </div> 
      <script type="text/javascript">

    //职位学历映射
    var jobAdEduMap = {
        //        "244858631" : "高职高专",
        //        "996726632" : "大学本科",
        //        "208199123" : "硕士研究生",
        //        "214287756": "博士研究生"

        "244858631": "高职高专",
        "996726632": "大学本科",
        "208199123": "硕士研究生",
        "214287756": "博士研究生"
    }

    //获取locationUrl判定是否需要获取额外添加的列
    var url = window.location.href;

    if (url.indexOf("cnnp.zhiye.com") > 0) {//域名
        //获取列表第一列职位广告ID
        var ids = [];
        var jobTitles = $(".joblsttitle a ");
        //循环获取HREF提取JobId
        for (var i = 0; i < jobTitles.length; i++) {
            //            var id = jobTitles[i].pathname.split("/")[2];
            //            //点击标签后该Url携带其他条件，再次过滤
            //            if (id.indexOf("?")) {
            //                id = id.split("?")[0];
            //            }
            var id = $(jobTitles[i]).attr("jobadid");
            ids.push(parseInt(id));
        }

        //判定列表中存在数据
        if (ids.length > 0) {
            $.ajax({
                url: "/Extensions/Widget/GetJobAdditional",
                data: {
                    jobAdIds: ids.toString(),
                    additionalKeys: "extA9000_102054_949224493" //extA900_100102_2063773255
                },
                type: "POST",
                dataType: 'json'
            }).done(function (resp) {
                //添加学历列
                $(".listtable thead .tabletitle th:eq(2)").before('<th class="tableleft">学历</th>');
                var htmlMap = [];
                for (var i = 0; i < ids.length; i++) {
                    var map = { jobadid: ids[i], eduName: '' };
                    for (var j = 0; j < resp.length; j++) {

                        if (ids[i] == parseInt(resp[j].JobAdId)) {
                            map.eduName = jobAdEduMap[resp[j].AdditionaList[0].AdditionaValue];
                        }
                    }
                    htmlMap.push(map);
                }
                for (var o = 0; o < htmlMap.length; o++) {
                    $(".joblsttitle a[jobadid='" + (htmlMap[o].jobadid || '') + "'] ").parent().parent().find("td:eq(2)").before('<td class="tableleft joblsttitle" title="' + htmlMap[o].eduName + '">' + htmlMap[o].eduName + '</td>');
                }
            });
        }
    }
</script> 
     </div> 
    </div> 
    <!--module:positionlist end-->
    <!--module:deliverystoredb begin--> 
    <div class="bs-module"> 
     <div class="deliverystoredb-default "> 
     </div> 
    </div> 
    <!--module:deliverystoredb end--> 
   </div> 
  </div> 
   
  <script type="text/javascript">
        require([
            vstr('${st}/${version}/cmsportal/skin/js/baiduStatistics.js')

		]);
    </script>
  <script type="text/javascript">
    $(function(){
    _splash('zhiye_contentpage',0,104003,'new.zhiye.com');
    });
    </script>
 </body>
</html>