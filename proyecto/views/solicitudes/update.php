<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Estadosolicitud;



$this->title = 'Detalles';
$this -> params['breadcrumbs'][] = ["label" => "Lista de solicitudes", "url" => ["/solicitudes/view"]];
$this->params['breadcrumbs'][] = $this->title;
?>

<a href="<?= Url::toRoute("solicitudes/view") ?>" > Ver lista de solicitudes.</a>

<h5> <?= $msg ?> </h5>

<?php
	$form = ActiveForm::begin(["method" => "post",
    'enableClientValidation' => true,]
);
?>
<?= $form -> field($model, "ID_ESTADO") -> dropDownList(ArrayHelper::Map(Estadosolicitud::find()->all(), "ID_ESTADO", "ESTADO"))  ?>

<?= Html::submitButton("Guardar Cambio", ["class" => "btn btn-primary"]);?>

<?php $form -> end(); ?>
