<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'action'=>['hello/show'],
    'method'=>'post'
])//设置表单提交方式提交地址等 

?>
<?= $form->field($model, 'username')->textInput(['style'=>'width:520px'])->label('姓名')->hint('请输入账号');?>
<?= $form->field($model, 'password')->passwordInput(['style'=>'width:520px'])->label('密码')->hint('请输入密码');?>
<?= $form->field($model, 'email')->input('email',['style'=>'width:520px'])->label('邮箱')->hint('请输入邮箱');?>
<?=$form->field($model, 'address')->dropDownList(['1'=>'北京','2'=>'上海','3'=>'河南'], ['prompt'=>'请选择','style'=>'width:120px'])->label('地址')->hint('选择地址');?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
