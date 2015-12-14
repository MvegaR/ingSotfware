<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;

$this -> title = "Crear departamento";
$this -> params['breadcrumbs'][] = ["label" => "Lista de usuarios", "url" => ["usuario/view"]];
$this -> params['breadcrumbs'][] = ["label" => "Lista de departamentos", "url" => ["usuario/viewdep"]];
$this->params['breadcrumbs'][] = $this->title;

?>

<a href="<?= Url::toRoute("usuario/viewdep") ?>">Ver lista de departamentos</a>

<h5><?= $msg ?></h5>

<h1>Crear departamento</h1>

<?php $form = ActiveForm::begin([
	"method" => "post", "enableClientValidation" => true,
	]);
?>

<?= $form -> field($model, "NOMBRE_DEPARTAMENTO") -> input("text"); ?>
<?= $form->field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>
<?= Html::submitButton("Crear departamento",["class" => "btn btn-primary"]); ?>



<?php $form -> end(); ?>