<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>

<a href="<?= Url::toRoute("site/formu") ?>">Ir a la lista de gastos</a>

<h1>Cambiar estado gasto con id <?= Html::encode($_GET["ID_GASTO"]) ?></h1>

<h3><?= $msg ?></h3>

<?php $form = ActiveForm::begin([
    "method" => "post",
    'enableClientValidation' => true,
]);
?>

<?= $form->field($model, "ID_GASTO")->input("hidden")->label(false) ?>

<div class="form-group">
 <?= $form->field($model, "estadogasto")->input("number")->label("ID Estado Gasto") ?>   
</div>


<?= Html::submitButton("Cambiar Estado", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>

