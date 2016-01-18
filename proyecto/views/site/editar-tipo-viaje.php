<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'Editar Tipo de Viaje';
$this->params['breadcrumbs'][] = ["label" => "Lista de Tipos de Viaje", "url" => ["site/ver-t-viaje"]];
$this->params['breadcrumbs'][] = $this->title;


?>

<h1>Editar Tipo de Viaje</h1>

<h3><?= $msg ?></h3>

<?php $form = ActiveForm::begin([
    "method" => "post",
    'enableClientValidation' => true,
]);
?>

<?= $form->field($model, "id_tipo_viaje")->input("hidden")->label(false) ?>

<div class="form-group">
 <?= $form->field($model, "nombre_tipo_viaje")->input("text")->label("Nombre del Tipo de Viaje:"); ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "monto_maximo")->input("text")->label("Monto M&#225;ximo:"); ?>   
</div>

<?= Html::submitButton("Editar", ["class" => "btn btn-primary"]) ?>
<a class="btn btn-default" href="<?= Url::toRoute("site/ver-t-viaje") ?>">Cancelar</a>
<?php $form->end() ?>

