<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\ROL;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php

    function guest(){
        return [
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
             
                ['label' => 'Iniciar sesión', 'url' => ['/site/login']],
        ],
    ];
    }

    function administrador(){
        return [
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Gestión usuarios', 'url' => ['/usuario/view']],
            ['label' => 'Gestión Tipos Viaje', 'url' => ['/site/ver-t-viaje']],
                [
                    'label' => 'Salir (' . Yii::$app->user->identity->NOMBRE_USUARIO . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ];
    }

    function decano(){
        return [
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Realizar solicitud', 'url' => ['/solicitud/index']],
            ['label' => 'Gestion de gastos', 'url' => ['/site/view']],
            ['label' => 'Evaluar solicitudes', 'url' => ['/solicitudes/view']],
                [
                    'label' => 'Salir (' . Yii::$app->user->identity->NOMBRE_USUARIO . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ];
    }

    function director(){
        return [
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Realizar solicitud', 'url' => ['/solicitud/index']],
             ['label' => 'Gestion de gastos', 'url' => ['/site/view']],
            ['label' => 'Evaluar solicitudes', 'url' => ['/solicitudes/view']],
                [
                    'label' => 'Salir (' . Yii::$app->user->identity->NOMBRE_USUARIO . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ];
    }

    function docente(){
        return [
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            ['label' => 'Realizar solicitud', 'url' => ['/solicitud/index']],
            ['label' => 'Gestion de gastos', 'url' => ['/site/view']],
           
                [
                    'label' => 'Salir (' . Yii::$app->user->identity->NOMBRE_USUARIO . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ];
    }



    NavBar::begin([
        'brandLabel' => 'ICINF3',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $rol = "Guest";
    if(! Yii::$app->user->isGuest)
        $rol = (ROL::findOne(Yii::$app -> user -> identity -> ID_ROL) -> ROL);
    
    if($rol == "Guest")
        echo Nav::widget(guest());
    else if($rol == "Administrador")
        echo Nav::widget(administrador());
    else if($rol == "Decano")
        echo Nav::widget(decano());
    else if($rol == "Director")
        echo Nav::widget(director());
    else if($rol == "Docente")
        echo Nav::widget(docente());
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Proyecto Ing. Software Grupo 3 ICINF<?= date('Y') ?></p>

        <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
