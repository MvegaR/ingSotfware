<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;
$this->title = 'Editar usuario';
$this->params['breadcrumbs'][] = $this->title;
?>

<a href="<?= Url::toRoute("usuario/view") ?>" > Ver lista de usuarios.</a>

<h1>Editar usuario con id <?= Html::encode($_GET["id_usuario"]) ?> </h1>

<h3> <?= $msg ?> </h3>

<?php
	$form = ActiveForm::begin(["method" => "post",
    'enableClientValidation' => true,]
);
?>

<?= $form -> field($models, "id_usuario") -> input("hidden") -> label(false); ?>

<?= $form -> field($models, "nombre_usuario") -> input("text"); ?>

<?= $form -> field($models, "id_departamento") -> input("text"); ?>

<?= $form -> field($models, "rol") -> input("text"); ?>

<?= $form -> field($models, "email") -> input("email"); ?>

<?= $form -> field($models, "password") -> input("password"); ?>

<?= $form -> field($models, "password_repeat") -> input("password"); ?>

<?= $form -> field($models, 'reCaptcha')->widget(ReCaptcha::className()) ?>


<?= Html::submitButton("Editar usuario", ["class" => "btn btn-primary"]);?>

<?php $form -> end(); ?>