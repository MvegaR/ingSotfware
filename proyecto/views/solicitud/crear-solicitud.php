<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TipoViaje;

$this->title = 'Crear Solicitud';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="content">
<h2><strong>Formulario para la creacion de solicitud de viaje</strong></h2>
<?php $form = ActiveForm::begin([
    "method" => "post",
 'enableClientValidation' => true,
]);
?>
    <div class="form-group">
        <label class="col-sm-2 control-label">Tipos de viaje Disponibles: </label>
        <div class="col-sm-10">
            <table class="table">
                <tr>
                    <td><strong>ID</strong></td>
                    <td><strong>Tipo</strong></td>
                    <td><strong>Monto Maximo</strong></td>
                </tr>
                <?php foreach ($tipos as $row): ?>
                <tr>
                    <td><?php echo $row['ID_TIPO_DE_VIAJE']; ?></td>
                    <td><?php echo $row['NOMBRE_TIPO_DE_VIAJE']; ?></td>
                    <td>$<?php echo $row['MONTO_MAXIMO']; ?></td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
    <h3>Datos del Viaje</h3>
    <label class="col-sm-2 control-label">Tipo de Viaje: </label>
    <div class="form-group">
       <div class="col-sm-10">
	<?= $form -> field($model, "idtipoviaje") -> dropDownList(
			ArrayHelper::Map(TipoViaje::find() -> all(), "ID_TIPO_DE_VIAJE", "NOMBRE_TIPO_DE_VIAJE" )
			)->label(false);
	?>
       </div>
    </div>
    <label class="col-sm-2 control-label">Fecha de Inicio: </label>
    <div class="form-group">
       <div class="col-sm-10">
        <?= $form->field($model, "fechai")->textInput(array('placeholder' => 'Formato: 2015-12-02'))->label(false) ?>
       </div>
    </div>
    <label class="col-sm-2 control-label">Fecha de Termino: </label>
    <div class="form-group">
       <div class="col-sm-10">
        <?= $form->field($model, "fechat")->textInput(array('placeholder' => 'Formato: 2015-12-02'))->label(false) ?>
       </div>
    </div>
    <label class="col-sm-2 control-label">Origen: </label>
    <div class="form-group">
       <div class="col-sm-10">
        <?= $form->field($model, "origen")->textInput(array('placeholder' => 'Donde empezara su viaje'))->label(false) ?>   
       </div>
    </div>
    <label class="col-sm-2 control-label">Descripcion o Detalle: </label>
    <div class="form-group">
       <div class="col-sm-10">
        <?= $form->field($model, "cuerpo")->textarea(array('placeholder' => 'Describa su viaje en detalle'))->label(false); ?>  
       </div> 
    </div>

    <h3>Datos del Destino</h3>
        <div class="form-group">
            <label class="col-sm-2 control-label"><strong>Destino(s):</strong></label>
            <div class="col-sm-10">
                <table class="table">
                    <tr><td><strong>Incluir</strong></td><td><strong>Pais</strong></td><td><strong>Ciudad</strong></td><td><strong>Medio de Transporte</strong></td><td><strong>Duracion en Dias</td></tr>
                    <?php $model->check1 = 1; ?>
                    <tr><td><?= $form->field($model, 'check1')->checkbox(array('label'=>'','disabled'=>false)) ?></td><td><?= $form->field($model, "pais1")->textInput(array('placeholder' => 'Chile...'))->label(false) ?></td><td><?= $form->field($model, "ciudad1")->textInput(array('placeholder' => 'Concepcion...'))->label(false) ?></td><td><?= $form->field($model, "transporte1")->textInput(array('placeholder' => 'AutoBus...'))->label(false) ?></td><td><?= $form->field($model, "duracion1")->textInput(array('placeholder' => 'Solo numeros: 3'))->label(false) ?></td></tr>
                    <tr><td><?= $form->field($model, 'check2')->checkbox(array('label'=>'','disabled'=>false)) ?></td><td><?= $form->field($model, "pais2")->input("text")->label(false) ?></td><td><?= $form->field($model, "ciudad2")->input("text")->label(false) ?></td><td><?= $form->field($model, "transporte2")->input("text")->label(false) ?></td><td><?= $form->field($model, "duracion2")->input("number")->label(false) ?></td></tr>
                    <tr><td><?= $form->field($model, 'check3')->checkbox(array('label'=>'','disabled'=>false)) ?></td><td><?= $form->field($model, "pais3")->input("text")->label(false) ?></td><td><?= $form->field($model, "ciudad3")->input("text")->label(false) ?></td><td><?= $form->field($model, "transporte3")->input("text")->label(false) ?></td><td><?= $form->field($model, "duracion3")->input("number")->label(false) ?></td></tr>
                    <tr><td><?= $form->field($model, 'check4')->checkbox(array('label'=>'','disabled'=>false)) ?></td><td><?= $form->field($model, "pais4")->input("text")->label(false) ?></td><td><?= $form->field($model, "ciudad4")->input("text")->label(false) ?></td><td><?= $form->field($model, "transporte4")->input("text")->label(false) ?></td><td><?= $form->field($model, "duracion4")->input("number")->label(false) ?></td></tr>
                    <tr><td><?= $form->field($model, 'check5')->checkbox(array('label'=>'','disabled'=>false)) ?></td><td><?= $form->field($model, "pais5")->input("text")->label(false) ?></td><td><?= $form->field($model, "ciudad5")->input("text")->label(false) ?></td><td><?= $form->field($model, "transporte5")->input("text")->label(false) ?></td><td><?= $form->field($model, "duracion5")->input("number")->label(false) ?></td></tr>
                </table>
            </div>
        </div>

<?= Html::submitButton("Enviar", ["class" => "btn btn-primary"]) ?>
<a class="btn btn-default" href="<?= Url::toRoute("/solicitud") ?>">Cancelar</a>

<?php $form->end() ?>
</div>

