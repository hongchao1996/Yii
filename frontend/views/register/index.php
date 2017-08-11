<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['enctype' => 'multipart/form-data'],
    'action'=>['register/register_do'],
    'method'=>'post'
])
?>
<center>
<table>
<tr><td>
<?= $form->field($model,'username')->textInput(['style'=>'width:400px'])->label('名字')->hint('请输入')?>
</td></tr><tr><td>
<?= $form->field($model,'password')->passwordInput(['style'=>'width:400px'])->label('密码')->hint('请输入')?>
</td></tr><tr><td>
<?= $form->field($model,'qpassword')->passwordInput(['style'=>'width:400px'])->label('确认密码')?>
</td></tr><tr><td>
<?= $form->field($model,'email')->textInput(['style'=>'width:400px'])->label('邮箱')->hint('请输入')?>
</td></tr><tr><td>
<?= $form->field($model, 'file[]')->fileInput(['multiple' => true])->label('头像') ?>
</td></tr><tr><td>
	<div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('注册', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    </td></tr>
    </table>
    </center>
<?php ActiveForm::end() ?>
