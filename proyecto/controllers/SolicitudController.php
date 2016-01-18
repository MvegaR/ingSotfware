<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Solicitud;
use app\models\Viaje;
use app\models\TipoViaje;
use app\models\SolicitudMet;
use app\models\Destino;
use yii\helpers\Html;

class SolicitudController extends Controller{

    public function actionIndex(){
        PermisosController::permisoDocenteDirectorDecano();
    	$tablesolicitud = new Solicitud;
        $msg = null;
        $modelsolicitud = $tablesolicitud->find()->where(['ID_USUARIO' => Yii::$app -> user -> identity -> ID_USUARIO])->all();
    	return $this->render('index', ['model' => $modelsolicitud, 'msg' => $msg]);
    }


    public function actionBorrarSolicitud()
    {
        PermisosController::permisoDocenteDirectorDecano();
        $msg = null;
        if(Yii::$app->request->post())
        {
            $ID_SOLICITUD = Html::encode($_POST["ID_SOLICITUD"]);
            $ID_VIAJE = Html::encode($_POST["ID_VIAJE"]);
            if((int) $ID_SOLICITUD)
            {
                if(Solicitud::deleteAll("ID_SOLICITUD=:ID_SOLICITUD", [":ID_SOLICITUD" => $ID_SOLICITUD]) &&
                                   Destino::deleteAll("ID_VIAJE=:ID_VIAJE", [":ID_VIAJE" => $ID_VIAJE]) &&
                                   Viaje::deleteAll("ID_VIAJE=:ID_VIAJE", [":ID_VIAJE" => $ID_VIAJE]))
                {
                    
                    $msg = '<div class="alert alert-success" role="alert"><strong>Eliminada!</strong> Solicitud eliminada correctamente.</div>';
                }
                else
                {
                    $msg = '<div class="alert alert-danger" role="alert"><strong>Error!</strong> La solicitud no se elimino.</div>';
                }
            }
            else
            {
                $msg = '<div class="alert alert-danger" role="alert"><strong>Error!</strong>La solicitud no se elimino.</div>';
            }
        }
        $tablesolicitud = new Solicitud;
        $modelsolicitud = $tablesolicitud->find()->where(['ID_USUARIO' => 1])->all();
        return $this->render('index', ['model' => $modelsolicitud, 'msg' => $msg]);
    }



    public function actionDetalle(){
        PermisosController::permisoDocenteDirectorDecano();
        if (Yii::$app->request->get("ID_SOLICITUD")){
            $ID_SOLICITUD = Html::encode($_GET["ID_SOLICITUD"]);
	    if ((int) $ID_SOLICITUD){
                $modelsolicitud = Solicitud::findOne($ID_SOLICITUD);
                $modelviaje = Viaje::findOne($modelsolicitud->ID_VIAJE);
                $tabladestino = new Destino;
                $modeldestino = $tabladestino->find()->where(['ID_VIAJE' => $modelsolicitud->ID_VIAJE])->all();
 /*return $this->render('saluda',['dato' => $modelsolicitud]);*/
                return $this->render('detalle', ['modelsolicitud' => $modelsolicitud, 'modelviaje' => $modelviaje, 'modeldestino' => $modeldestino]);
            }
	    else{
		    return $this->redirect(["/solicitud"]);
	    }

        }
        else return $this->redirect(["/solicitud"]);
    }

    public function actionCrear(){
        PermisosController::permisoDocenteDirectorDecano();
        $model = new SolicitudMet;
        if($model->load(Yii::$app->request->post())){
            $tableviaje = new Viaje;
            $tableviaje->ORIGEN_VIAJE = $model->origen;
            $tableviaje->FECHA_INICIO_DIRECCION = $model->anhoi.'-'.$model->mesi.'-'.$model->diai.' '.'00:'.'00:'.'01';
            $tableviaje->FECHA_TERMINO_DIRECCION = $model->anhot.'-'.$model->mest.'-'.$model->diat.' '.'23:'.'59:'.'59';
            $tableviaje->insert();
            $ultimoidviaje = solicitudMet::ultimoID();
            if($model->check1 == 1){
                $tabledestino = new Destino;
                $tabledestino->ID_VIAJE = $ultimoidviaje;
                $tabledestino->DURACION_VIAJE_DIAS = $model->duracion1;
                $tabledestino->MEDIO_DE_TRANSPORTE = $model->transporte1;
                $tabledestino->CIUDAD_DESTINO = $model->ciudad1;
                $tabledestino->PAIS_DESTINO = $model->pais1;
                $tabledestino->insert();
            }else{
                $viaje = Viaje::find()->where(['ID_VIAJE' => $ultimoidviaje])->one();
                $viaje->delete();
                $tablesolicitud = new Solicitud;
                $msg = '<div class="alert alert-warning" role="alert"><strong>ERROR!</strong> No se envi&#243; la solicitud, ingrese datos v&#225;lidos.</div>';
                $modelsolicitud = $tablesolicitud->find()->where(['ID_USUARIO' => Yii::$app -> user -> identity -> ID_USUARIO])->all();
    	        return $this->render('index', ['model' => $modelsolicitud, 'msg' => $msg]);
            }
            if($model->check2 == 1){
                if($model->duracion2 != null && $model->transporte2 != null && $model->ciudad2 != null && $model->pais2 != null){
                    $tabledestino2 = new Destino;
                    $tabledestino2->ID_VIAJE = $ultimoidviaje;
                    $tabledestino2->DURACION_VIAJE_DIAS = $model->duracion2;
                    $tabledestino2->MEDIO_DE_TRANSPORTE = $model->transporte2;
                    $tabledestino2->CIUDAD_DESTINO = $model->ciudad2;
                    $tabledestino2->PAIS_DESTINO = $model->pais2;
                    $tabledestino2->insert();
                }else{
                    Destino::deleteAll("ID_VIAJE=".$ultimoidviaje);
                    $viaje = Viaje::find()->where(['ID_VIAJE' => $ultimoidviaje])->one();
                    $viaje->delete();
                    $tablesolicitud = new Solicitud;
                    $msg = '<div class="alert alert-danger" role="alert"><strong>ERROR!</strong> No se envi&#243; la solicitud, ingrese datos v&#225;lidos.</div>';
                    $modelsolicitud = $tablesolicitud->find()->where(['ID_USUARIO' => Yii::$app -> user -> identity -> ID_USUARIO])->all();
    	            return $this->render('index', ['model' => $modelsolicitud, 'msg' => $msg]);
                }
            }
            if($model->check3 == 1){
                if($model->duracion3 != null && $model->transporte3 != null && $model->ciudad3 != null && $model->pais3 != null){
                    $tabledestino3 = new Destino;
                    $tabledestino3->ID_VIAJE = $ultimoidviaje;
                    $tabledestino3->DURACION_VIAJE_DIAS = $model->duracion3;
                    $tabledestino3->MEDIO_DE_TRANSPORTE = $model->transporte3;
                    $tabledestino3->CIUDAD_DESTINO = $model->ciudad3;
                    $tabledestino3->PAIS_DESTINO = $model->pais3;
                    $tabledestino3->insert();
                }else{
                    Destino::deleteAll("ID_VIAJE=".$ultimoidviaje);
                    $viaje = Viaje::find()->where(['ID_VIAJE' => $ultimoidviaje])->one();
                    $viaje->delete();
                    $tablesolicitud = new Solicitud;
                    $msg = '<div class="alert alert-danger" role="alert"><strong>ERROR!</strong> No se envi&#243; la solicitud, ingrese datos v&#225;lidos.</div>';
                    $modelsolicitud = $tablesolicitud->find()->where(['ID_USUARIO' => Yii::$app -> user -> identity -> ID_USUARIO])->all();
    	            return $this->render('index', ['model' => $modelsolicitud, 'msg' => $msg]);
                }
            }
            if($model->check4 == 1){
                if($model->duracion4 != null && $model->transporte4 != null && $model->ciudad4 != null && $model->pais4 != null){
                    $tabledestino4 = new Destino;
                    $tabledestino4->ID_VIAJE = $ultimoidviaje;
                    $tabledestino4->DURACION_VIAJE_DIAS = $model->duracion4;
                    $tabledestino4->MEDIO_DE_TRANSPORTE = $model->transporte4;
                    $tabledestino4->CIUDAD_DESTINO = $model->ciudad4;
                    $tabledestino4->PAIS_DESTINO = $model->pais4;
                    $tabledestino4->insert();
                }else{
                    Destino::deleteAll("ID_VIAJE=".$ultimoidviaje);
                    $viaje = Viaje::find()->where(['ID_VIAJE' => $ultimoidviaje])->one();
                    $viaje->delete();
                    $tablesolicitud = new Solicitud;
                    $msg = '<div class="alert alert-danger" role="alert"><strong>ERROR!</strong> No se envi&#243; la solicitud, ingrese datos v&#225;lidos.</div>';
                    $modelsolicitud = $tablesolicitud->find()->where(['ID_USUARIO' => Yii::$app -> user -> identity -> ID_USUARIO])->all();
    	            return $this->render('index', ['model' => $modelsolicitud, 'msg' => $msg]);
                }
            }
            if($model->check5 == 1){
                if($model->duracion5 != null && $model->transporte5 != null && $model->ciudad5 != null && $model->pais5 != null){
                    $tabledestino5 = new Destino;
                    $tabledestino5->ID_VIAJE = $ultimoidviaje;
                    $tabledestino5->DURACION_VIAJE_DIAS = $model->duracion5;
                    $tabledestino5->MEDIO_DE_TRANSPORTE = $model->transporte5;
                    $tabledestino5->CIUDAD_DESTINO = $model->ciudad5;
                    $tabledestino5->PAIS_DESTINO = $model->pais5;
                    $tabledestino5->insert();
                }else{
                    Destino::deleteAll("ID_VIAJE=".$ultimoidviaje);
                    $viaje = Viaje::find()->where(['ID_VIAJE' => $ultimoidviaje])->one();
                    $viaje->delete();
                    $tablesolicitud = new Solicitud;
                    $msg = '<div class="alert alert-danger" role="alert"><strong>ERROR!</strong> No se envi&#243; la solicitud, ingrese datos v&#225;lidos.</div>';
                    $modelsolicitud = $tablesolicitud->find()->where(['ID_USUARIO' => 1])->all();
    	            return $this->render('index', ['model' => $modelsolicitud, 'msg' => $msg]);
                }
            }
            $tablesolicitud = new Solicitud;
            $tablesolicitud->ID_USUARIO = Yii::$app -> user -> identity -> ID_USUARIO;
            $tablesolicitud->ID_TIPO_DE_VIAJE = $model->idtipoviaje;
            $tablesolicitud->ID_VIAJE = $ultimoidviaje;
            $tablesolicitud->FECHA_SOLICITUD = date("Y-m-d H:i:s");
            $tablesolicitud->ID_ESTADO = 1;
            $tablesolicitud->CUERPO_SOLICITUD = $model->cuerpo;
            $tablesolicitud->insert();
    	    $tablesolicitud = new Solicitud;
            $msg = '<div class="alert alert-success" role="alert"><strong>Enviada!</strong> Solicitud enviada.</div>';
            $modelsolicitud = $tablesolicitud->find()->where(['ID_USUARIO' => Yii::$app -> user -> identity -> ID_USUARIO])->all();
    	    return $this->render('index', ['model' => $modelsolicitud, 'msg' => $msg]);
    	}else{
            $msg = null;
    	    $tablesolicitud = new TipoViaje;
            $modeltipos = $tablesolicitud->find()->all();
    	    return $this->render('crear-solicitud',['model' => $model, 'tipos' => $modeltipos, 'msg' => $msg]);
    	}
    }

}