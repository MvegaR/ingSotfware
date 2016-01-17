<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\db\Connection;
use app\models\SolicitudTabla;
use app\models\DetalleDestinoTabla;
use app\models\DetalleViajeTabla;
use app\models\UsuarioTabla;
use app\models\SolicitudFormulario;
use yii\helpers\Html;




class SolicitudesController extends controller {
 public function actionView() {
   $tabla= new SolicitudTabla();
   return $this -> render("view", ["model" => $tabla -> find() -> all()] );
 }


  public function actionDetalle(){

        if (Yii::$app->request->get("ID_SOLICITUD")){
            $ID_SOLICITUD = Html::encode($_GET["ID_SOLICITUD"]);
      if ((int) $ID_SOLICITUD){

                $modelsolicitud = SolicitudTabla::findOne($ID_SOLICITUD);
                $modelviaje = DetalleViajeTabla::findOne($modelsolicitud->ID_VIAJE);
                $modelusuario = UsuarioTabla::findOne($modelsolicitud->ID_USUARIO);
                $tabladestino = new DetalleDestinoTabla;
                $modeldestino = $tabladestino->find()->where(['ID_VIAJE' => $modelviaje->ID_VIAJE])->all();
                return $this->render('detalle', ['modelusuario'=>$modelusuario, 'modelsolicitud' => $modelsolicitud, 'modelviaje' => $modelviaje, 'modeldestino' => $modeldestino]);
            
            }
      }
    }

  public function actionUpdate(){
    $model = new SolicitudFormulario();
    $msg = null;

    if($model -> load(Yii::$app->request->post())){
      if($model -> validate()){
        $modelsolicitud = SolicitudFormulario::findOne($_GET["ID_SOLICITUD"]);
        if($modelsolicitud){
          $modelsolicitud-> ID_ESTADO = $model -> ID_ESTADO;
          }

          if($modelsolicitud -> update()){
            $msg = '<div class="alert alert-success" role="alert">Estado actualizado correctamente.</div>';
          }else{
            $msg = '<div class="alert alert-danger" role="alert">Error al actualizar o no existen cambios</div>';
          }
        }else{
          $msg = '<div class="alert alert-warning" role="alert">Estado no encontrado.</div>';
        }

      }

     if (Yii::$app->request->get("ID_SOLICITUD")){
            $ID_SOLICITUD = Html::encode($_GET["ID_SOLICITUD"]);
      if ((int) $ID_SOLICITUD){
                $modelsolicitud = SolicitudTabla::findOne($ID_SOLICITUD);
                if ($modelsolicitud) {
                  $model -> ID_ESTADO = $modelsolicitud -> ID_ESTADO;  
                }
                else{
                       $msg = "Tabla no encontrada";
                       return $this->redirect(["solicitudes/view"]);
                     }
       }else{
                $msg = "ID no valido";
                 return $this->redirect(["solicitudes/view"]);
            }
     }else{
      return $this->redirect(["solicitudes/view"]);
    }
      return $this -> render("update", ["model" => $model,  "msg" => $msg]);
   }






}