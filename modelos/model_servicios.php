<?php

require_once("recursos/config/db.php");
require_once("controladores/controller_servicios.php");
require_once("modelos/model_evidencias.php");


$servicio = new Servicios();
$servicio->setTable("Servicios");
$servicio->setView('');

$servicio->setKey('IdServicio');

$servicio->setColumns('Servicio');
$servicio->setColumns('Descripcion');

if ((!empty($_GET['IdS'])) && (isset($_GET['IdS']))) {
    $IdS = $_GET['IdS'];
    $dtserviciowhere = $servicio->getWhere($IdS);
} else {
    $IdS = null;
    $dtserviciowhere = null;
}

$dtservicio = $servicio->getAll();

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if ((!empty($_GET['actionserv'])) && (isset($_GET['actionserv']))) {
    $action = $_GET['actionserv'];

    if ($action === 'insert') {

        $service = "" . $_POST['Servicio'] . "";
        $descript = "" . $_POST['Descripcion'] . "";

        $servicio->insertServicio($service, $descript);

        echo '<script>location.replace("index.php?page=ServiciosAdmin&ins=Ok");</script>';

    } elseif ($action === 'update') {

        $service = "" . $_POST['Servicio'] . "";
        $descript = "" . $_POST['Descripcion'] . "";

        $servicio->updateServicio($IdS, $service, $descript);

        echo '<script>location.replace("index.php?page=ServiciosAdmin&upd=Ok");</script>';
    } elseif ($action === 'delete') {
        $evidencia->deleteEvidenciaWhere($IdS);
        $servicio->deleteServicio($IdS);

        echo '<script>location.replace("index.php?page=ServiciosAdmin&del=Ok");</script>';
    }
}