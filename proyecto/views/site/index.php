<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Declaración y solicitud de viajes';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Grupo 3 ICINF</h1>

        <p class="lead">Sistema administrativo web de rendición de gastos de viaje para los departamentos de la Universidad del Bío-Bío</p>

        
    </div>
    <div class="list-group-item center">
<a href="<?= Url::toRoute("site/view") ?>" class="list-group-item">Ver lista gastos. (Ramón)</a><br>
<a href="<?= Url::toRoute("usuario/view") ?>" class="list-group-item">Ver lista de usuarios. (Marcos)</a><br>
<a href="<?= Url::toRoute("usuario/viewdep") ?>" class="list-group-item">Ver lista de departamentos. (Marcos)</a><br>
<a href="<?= Url::toRoute("site/ver-t-viaje") ?>" class="list-group-item">Lista de tipo de viaje. (Raúl)</a><br>
<a href="<?= Url::toRoute("solicitud/index") ?>" class="list-group-item">Ver lista solicitudes como docente. (Raúl)</a><br>
<a href="<?= Url::toRoute("solicitudes/view") ?>" class="list-group-item" > Ver solicitudes como evaluador. (Pablo)</a><br>
</div>
   <?php echo""; /* <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div> */?>
</div>
