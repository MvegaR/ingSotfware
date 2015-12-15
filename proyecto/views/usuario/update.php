<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;
use yii\helpers\ArrayHelper;
use app\models\DepartamentoTabla;
$this->title = 'Editar usuario';
$this -> params['breadcrumbs'][] = ["label" => "Lista de usuarios", "url" => ["usuario/view"]];
$this->params['breadcrumbs'][] = $this->title;
?>

<a href="<?= Url::toRoute("usuario/view") ?>" > Ver lista de usuarios.</a>

<h5> <?= $msg ?> </h5>

<h1>Editar usuario con id <?= Html::encode($_GET["id_usuario"]) ?> </h1>

<?php
	$form = ActiveForm::begin(["method" => "post",
    'enableClientValidation' => true,]
);
?>

<?= $form -> field($model, "id_usuario") -> input("hidden") -> label(false); ?>

<?= $form -> field($model, "NOMBRE_USUARIO") -> input("text"); ?>

<?= $form -> field($model, "id_departamento") -> dropDownList(
			ArrayHelper::Map(DepartamentoTabla::find() -> all(),"ID_DEPARTAMENTO", "NOMBRE_DEPARTAMENTO" ), ["prompt" => "Sin informar"] 
		);?>

<?= $form -> field($model, "rol") -> dropDownList(["docente" => "Docente","decano" => "Decano", "director" => "Director", "administrador" => "Admnistrador",]) ?>

<?= $form -> field($model, "EMAIL") -> input("email"); ?>

<?= $form -> field($model, "password") -> input("password"); ?>

<?= $form -> field($model, "password_repeat") -> input("password"); ?>

<?= $form -> field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>


<?= Html::submitButton("Editar usuario", ["class" => "btn btn-primary"]);?>

<?php $form -> end(); ?>