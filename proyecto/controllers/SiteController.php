<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\db\Connection;

use mPDF; //Para el PDF!!!!!!!!!!!!!!!!!!

class SiteController extends Controller
{
	
	public function actionSaludar(){
		$saludar = "Hola mundo";
		return $this->render("saludar", ["saludar" => $saludar]);
	}

	public function actionPdf(){
        $mpdf = new mPDF;
        
       	$connection = new \yii\db\Connection(Yii::$app->db);
       	$connection->open();
       	$sql = "Select * from usuario";
       	$command=$connection->createCommand($sql);
       	$dataReader=$command->query();
       	$str = "<table> <tbody>";
       	foreach($dataReader as $row) { 
       		$str = $str."<tr>";
       		foreach ($row as $col) {
       			$str= $str."<td>".$col."</td>";
       		}
       		$str = $str."</tr>";
       	}
       	$str = $str."</tbody></table>";
       	
        $mpdf->WriteHTML($str);
        $mpdf->Output();
        $connection->close();
        exit;
	}
	
	
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
