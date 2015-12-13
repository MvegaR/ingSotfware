<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;
$this->title = 'Editar usuario';
$this -> params['breadcrumbs'][] = ["label" => "Lista de usuarios", "url" => ["usuario/view"]];
$this->params['breadcrumbs'][] = $this->title;
?>

<a href="<?= Url::toRoute("usuario/view") ?>" > Ver lista de usuarios.</a>

<h3> <?= $msg ?> </h3>

<h1>Editar usuario con id <?= Html::encode($_GET["id_usuario"]) ?> </h1>

<?php
	$form = ActiveForm::begin(["method" => "post",
    'enableClientValidation' => true,]
);
?>

<?= $form -> field($model, "id_usuario") -> input("hidden") -> label(false); ?>

<?= $form -> field($model, "nombre_usuario") -> input("text"); ?>

<?= $form -> field($model, "id_departamento") -> input("text"); ?>

<?= $form -> field($model, "rol") -> input("text"); ?>

<?= $form -> field($model, "email") -> input("email"); ?>

<?= $form -> field($model, "password") -> input("password"); ?>

<?= $form -> field($model, "password_repeat") -> input("password"); ?>

<?= $form -> field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>


<?= Html::submitButton("Editar usuario", ["class" => "btn btn-primary"]);?>

<?php $form -> end(); ?>