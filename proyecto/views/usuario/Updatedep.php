<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;
use yii\helpers\ArrayHelper;
use app\models\DepartamentoTabla;
$this->title = 'Editar departamento';
$this -> params['breadcrumbs'][] = ["label" => "Lista de departamentos", "url" => ["usuario/viewdep"]];
$this->params['breadcrumbs'][] = $this->title;
?>

<a href="<?= Url::toRoute("usuario/viewdep") ?>" > Ver lista de departamentos.</a>

<h5> <?= $msg ?> </h5>

<h1>Editar departamento con id <?= Html::encode($_GET["id_departamento"]) ?> </h1>

<?php
	$form = ActiveForm::begin(["method" => "post",
    'enableClientValidation' => true,]
);
?>

<?= $form -> field($model, "ID_DEPARTAMENTO") -> input("hidden") -> label(false); ?>
<?= $form -> field($model, "NOMBRE_DEPARTAMENTO") -> input("text"); ?>

<?= $form -> field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>


<?= Html::submitButton("Editar departamento", ["class" => "btn btn-primary"]);?>

<?php $form -> end(); ?>