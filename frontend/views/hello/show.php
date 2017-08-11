<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;?>

<h1>展示</h1><ul>

<table border='1'>
<?php foreach ($list as $country): ?>    
	<tr>
		<td><?= $country->id?></td>
        <td><?= $country->username ?></td> 
        <td><?= $country->password ?></td>
        <td><?= $country->email ?></td>
        <td><?= $country->address ?></td>
        <td><a href="<?php echo Url::toRoute(['hello/del','id'=>$country->id])?>">删除</a></td>
        <td><a href="<?php echo Url::toRoute(['hello/upl','id'=>$country->id])?>">修改</a></td>
    </tr>
<?php endforeach; ?>
  </table>      
<?= LinkPager::widget(['pagination' => $pagination]) ?>
