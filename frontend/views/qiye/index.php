<?php
use yii\helpers\Url;
use yii\captcha\Captcha;
use yii\helpers\Html;

$this->context->layout = false;
frontend\assets\AppAsset::register($this)
?>  
<html>
    <body>
        <?php $this->beginBody() ?>
            <center>
              <table border='20 '>
                <th style='font-size:20px' style.color='#699'><font></font>申请人名字</th>   
                <th style='font-size:20px '>申请专业</th>
                <th style='font-size:20px'>期望薪资</th>
                <th style='font-size:20px'>面试时间</th>
                <th style='font-size:20px'>他的电话</th>
                <th style='font-size:20px'>查看详细简历</th>
                <th style='font-size:20px'>忽略此信息</th>
                <?php foreach ($list as $key => $val): ?>
                  <tr>
                    <td style='font-size:15px'><?=$val['username']?></td>
                    <td style='font-size:15px'><?=$val['now_job']?></td>
                    <td style='font-size:15px'><?=$val['qi_y_money']?></td>
                    <td style='font-size:15px'><?=$val['d_date']?></td>
                    <td style='font-size:15px'><?=$val['phone']?></td>
                    <td>
                      <?php if($list[0]['status']==0){
                              echo '<a href="javascript:void(0)" class="kan">点击查看</a>';
                            }elseif($list[0]['status']==2){
                              echo '<a href="javascript:void(0)">以拒绝</a>';
                            }else{
                              echo '<a href="javascript:void(0)">已查看,感觉不错,通知他面试时间 </a>';
                      }?>                                                   
                    </td>
                    <td>  
                      <?php if($list[0]['status']==2){
                                echo '<a href="javascript:void(0)">以礼貌的拒绝了他</a>';
                            }else{
                                echo '<a href="?r=qiye/gai&id='.$val['id'].'">它不合适</a></td>';
                      }?>
                  </td>
                </tr>
              <?php endforeach ?>
            </table>
          <a href="">发布简历</a>
        <table class='table'></table>
      </center>                       
    <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>
<script>
    $(function(){
      $('.kan').click(function(){
         $.ajax({
          url:'?r=qiye/kan',
          type:'get',
          dataType:'json',
          success:function(data){
            var str = '';
            str = '<table border>';
            str += '<th>名字</th>';
            str += '<th>出生日期</th>';
            str += '<th>现在职业</th>';
            str += '<th>现在的工作</th>';
            str += '<th>联系电话</th>';
            str += '<th>期待的薪资</th>';
            str += '<th>可以面试的时间</th>';
            str += '<th>邮箱</th>';
            str += '<th>操作</th>';
            $.each(data,function(k, v){
              str += '<tr>';
              str+= '<td>'+v.username+'</td>';
              str+= '<td>'+v.c_date+'</td>';
              str+= '<td>'+v.now_zhiye+'</td>';
              str+= '<td>'+v.now_job+'</td>';
              str+= '<td>'+v.phone+'</td>';
              str+= '<td>'+v.qi_y_money+'</td>';
              str+= '<td>'+v.d_date+'</td>';
              str+= '<td>'+v.email+'</td>'; 
              str+= '<td><a href="">感觉不错，通知他面试时间</a></td>';
              str += '</tr>';
            });
            str += '</table>';
            $('.table').html(str);
          }
         });
      });
    });
</script>