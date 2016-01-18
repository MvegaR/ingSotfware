<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\Viaje;
use yii\helpers\ArrayHelper;
?>

<a href="<?= Url::toRoute("site/view") ?>">Ir a la lista de gastos</a>

<h1>Editar gasto con ID <?= Html::encode($_GET["ID_GASTO"]) ?></h1>

<h3><?= $msg ?></h3>

<?php $form = ActiveForm::begin([
    "method" => "post",
    'enableClientValidation' => true,
]);
?>

<?= $form->field($model, "ID_GASTO")->input("hidden")->label(false) ?> 

<div class="form-group"> 
<?= $form -> field($model, "id_viaje") -> dropDownList(ArrayHelper::Map(Viaje::findBySql("SELECT DISTINCT J.*
										FROM VIAJE J, USUARIO U, SOLICITUD_DE_VIAJE S
										WHERE J.ID_VIAJE = S.ID_VIAJE
										AND S.ID_USUARIO =".Yii::$app -> user -> identity -> ID_USUARIO) -> all(), "ID_VIAJE", "ID_VIAJE")); ?>
</div>

<div class="form-group">
 <?= $form->field($model, "fechagasto")->input("datetime-local")->label("Fecha del Gasto") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "nombregasto")->input("text")->label("Nombre del Gasto") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "montogasto")->input("text")->label("Monto del Gasto") ?>   
</div>



<?= Html::submitButton("Actualizar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>
