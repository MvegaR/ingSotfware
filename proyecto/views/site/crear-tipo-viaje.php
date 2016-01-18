<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


$this->title = 'Crear Tipo de Viaje';
$this->params['breadcrumbs'][] = ["label" => "Lista de Tipos de Viaje", "url" => ["site/ver-t-viaje"]];
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
 <?= $form->field($model, "nombre_tipo_viaje")->input("text")->label("Nombre del Tipo de Viaje:"); ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "monto_maximo")->input("text")->label("Monto M&#225;ximo:"); ?>   
</div>

<?= Html::submitButton("Crear", ["class" => "btn btn-primary"]) ?>
<a class="btn btn-default" href="<?= Url::toRoute("site/ver-t-viaje") ?>">Cancelar</a>

<?php $form->end() ?>