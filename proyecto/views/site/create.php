<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<a href="<?=Url::toRoute("site/view")?>">Ir a lista completa de gastos</a>

<h1>Crear Gasto</h1>
<h3><?= $msg ?></h3>
<?php $form = ActiveForm::begin([
    "method" => "post",
 'enableClientValidation' => true,
]);
?>

<div class="form-group">
 <?=$form->field($model, "id_viaje")->input("text")->label("ID del Viaje") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "nombregasto")->input("text")->label("Nombre del Gasto") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "fechagasto")->textInput(array('placeholder' => '0000-00-00 00:00:00'))->label("Fecha del Gasto"); ?> 
</div>

<div class="form-group">
 <?= $form->field($model, "montogasto")->input("text")->label("Monto del Gasto") ?>   
</div>


<?= Html::submitButton("Crear gasto", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?> 