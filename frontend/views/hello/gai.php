<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'action'=>['hello/gaile'],
    'method'=>'post'
])//设置表单提交方式提交地址等 
?>
<?= $form->field($model, 'username')->textInput(['style'=>'width:520px','value'=>$list['username']])->label('姓名')->hint('请输入账号');?>
<?= $form->field($model, 'email')->input('email',['style'=>'width:520px','value'=>$list['email']])->label('邮箱')->hint('请输入邮箱');?>
<?= $form->field($model, 'id')->HiddenInput(['style'=>'width:520px','value'=>$list['id']]);?>

<?=$form->field($model, 'address')->dropDownList(['1'=>'北京','2'=>'上海','3'=>'河南'], ['prompt'=>$list['address'],'style'=>'width:120px'])->label('地址')->hint('选择地址');?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('确认修改', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
