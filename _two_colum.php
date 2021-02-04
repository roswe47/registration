<?php

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\User $model
 * @var dektrium\user\Module $module
 */

use dektrium\user\models\User;
use dektrium\user\Module;
use dektrium\user\widgets\Connect;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\captcha\Captcha;
use yii\helpers\Html;
use dektrium\passfield;
use yii\web\View;

?>

<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>

        <div class="panel-body">

            <?php $form = ActiveForm::begin([
                'id' => 'registration-form',
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
            ]) ?>

            <div class="col-md-12 form-register">

                <div class="row form-register-fields">

                    <div class="col-md-9">

                        <?= $form->field($model, 'email')->textInput(['placeholder' => \Yii::t('user', 'Электронная почта')]) ?>

                        <?= $form->field($model, 'username')->textInput(['placeholder' => \Yii::t('user', 'Имя пользователя')]) ?>

                    </div>

                    <div class="col-md-9">

                        <p>Сгенирировать</p>

                        <?= \dektrium\passfield\Passfield::widget([

                            'name'   => '', // the input name
                            'id' => "myInput"      // passfield configuration
                        ]) ?>

                        <button onclick="myFunction()">скопировать</button>

                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => \Yii::t('user', 'Пароль')]) ?>

                        <?php if ($module->enableGeneratingPassword === false): ?>
                            <?= $form->field($model, 'password2')->passwordInput(['placeholder' => \Yii::t('user', 'Повторите пароль')]) ?>
                        <?php endif ?>

                    </div>

                </div>

                <?php if(Yii::$app->getModule('userextended')->captcha): ?>

                    <div class="row form-register-captcha">

                        <div class="col-md-8">

                            <?= $form->field($model, 'captcha')->widget(Captcha::class, [
                                'captchaAction' => ['/site/captcha'],
                                'options' => ['class' => 'form-control'],
                                'template' => '<div class="row"><div class="col-md-6">{input}</div><div class="col-md-6">{image}</div></div>',

                            ]) ?>

                        </div>

                    </div>

                <?php endif ?>

                <?php if(Yii::$app->getModule('userextended')->terms): ?>

                    <div class="row form-register-terms">

                        <div class="col-md-8">

                            <?//= \Yii::t('userextended', 'Нажимая «согласен», вы соглашаетесь с Условиями, изложенными на этом сайте.') ?>

                        </div>

                    </div>

                <?php endif ?>

                <div class="row form-register-buttons">

                    <center>   <div class="col-md-7.5">

                            <?= Html::submitButton(\Yii::t('userextended', 'Зарегистрироваться'), ['class' => 'btn btn-success btn-block btn-lg']) ?>

                        </div></center>
                </div>

                <div class="row social-login-button">

                    <p>  <div class="col-md-12 col-md-offset-1">

                        <div class='text-center'>   <?= Connect::widget([
                                'baseAuthUrl' => ['/user/security/auth'],

                            ]) ?>

                           </div>
                       </div>
                    </p>
                </div>
            </div>
        </div>

        <?php ActiveForm::end() ?>

    </div>

</div>

</div>

