<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use kartik\password\PasswordInput;

$this->title = 'Signup';

?>
<div class="col-md-6">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">SignUP</h3>    
        </div>
        <div class="box-body">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->widget(
                        PasswordInput::classname()
                    );?>

                    <?= $form->field($model, 'reCaptcha')->widget(
                        \himiklab\yii2\recaptcha\ReCaptcha::className(),
                        ['siteKey' => '6LcT6ygUAAAAAPWANN-ZC2lMf5yc47vzbq93C9vk']
                    ) ?>
                    <?php /* = $form->field($model, 'password_repeat')->passwordInput()*/ ?>
                    


                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
