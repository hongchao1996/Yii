<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'action'=>['login/login_do'],
    'method'=>'post'
])
?>
<center>
<table>
<tr><td>
<?= $form->field($model,'username')->textInput(['style'=>'width:400px'])->label('名字')->hint('请输入用户名')?>
</td></tr><tr><td>
<?= $form->field($model,'password')->passwordInput(['style'=>'width:400px'])->label('密码')->hint('请输入密码')?>
</td></tr>

<tr><td>
<?= $form->field($model, 'verifyCode')->textInput(['class'=>'dl_textinp'])->label('') ?>
            <?=Captcha::widget(['name'=>'captchaimg','captchaAction'=>'site/captcha',
    'imageOptions'=>['id'=>'captchaimg', 'style'=>'cursor:pointer;margin-left:25px;'],'template'=>'{image}']);?>
</td></tr>

<tr><td>
<?= $form->field($model,'status')->checkbox(['1'=>'七天免登陆'])->hint('七天免登陆')?>
</td></tr><tr><td>
	<div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('登录', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    </td></tr>
    </table>
    </center>
<?php ActiveForm::end() ?>
