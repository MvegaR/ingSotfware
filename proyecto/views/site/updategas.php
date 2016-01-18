<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\Estadogasto;

?>

<a href="<?= Url::toRoute("site/formu") ?>">Ir a la lista de gastos</a>

<h1>Cambiar estado gasto con id <?= Html::encode($_GET["ID_GASTO"]) ?></h1>

<h3><?= $msg ?></h3>
<div class="form-group">
<?php $form = ActiveForm::begin([
    "method" => "post",
    'enableClientValidation' => true,
]);
?>

<?= $form->field($model, "ID_GASTO")->input("hidden")->label(false) ?>


 <?=  $form -> field($model, "estadogasto") -> dropDownList(ArrayHelper::Map(Estadogasto::find()->all(), "ID_ESTADO_GASTO", "ESTADO_GASTO"))?>   
</div>


<?= Html::submitButton("Cambiar Estado", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>

