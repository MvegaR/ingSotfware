<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Crear Tipo de Viaje';
$this->params['breadcrumbs'][] = $this->title;

?>

<h1>Crear Tipo de Viaje</h1>
<h3><?= $msg ?></h3>
<?php $form = ActiveForm::begin([
    "method" => "post",
 'enableClientValidation' => true,
]);
?>

<div class="form-group">
 <?= $form->field($model, "nombre_tipo_viaje")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "monto_maximo")->input("text") ?>   
</div>

<?= Html::submitButton("Crear", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>