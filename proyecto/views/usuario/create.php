<?php

use yii\helpers\HTML;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Crear usuario';
$this->params['breadcrumbs'][] = $this->title;

?>

<a href="<?= Url::toRoute("usuario/view")?>">Ver lista de usuarios.</a>

<h1> Crear Usuario </h1>

<h3> <?= $msg ?></h3>

<?php
	$form = ActiveForm::begin(
		["method" => "post",
		 "enableClientValidation" => true,]
		);

?>

	<?= $form -> field($models, "nombre_usuario") -> input("text"); ?>

	<?= $form -> field($models, "id_departamento") -> input("text"); ?>

	<?= $form -> field($models, "rol") -> input("text"); ?>

	<?= $form -> field($models, "email") -> input("email"); ?>

	<?= $form -> field($models, "password") -> input("password"); ?>

	<?= $form -> field($models, "password_repeat") -> input("password"); ?>


<?= Html::submitButton("Crear usuario", ["class" => "btn btn-primary"]);?>

<?php $form -> end(); ?>