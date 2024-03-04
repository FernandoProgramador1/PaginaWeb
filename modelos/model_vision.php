<?php

require_once("recursos/config/db.php");
require_once("controladores/controller_vision.php");

$vision = new Visiones();
$vision->setTable("Visiones");
$vision->setView('');

$vision->setKey('IdVision');

$vision->setColumns('DescripcionVision');

if ((!empty($_GET['IdVi'])) && (isset($_GET['IdVi']))) {
    $IdVi = $_GET['IdVi'];
    $dtvisionwhere = $vision->getWhere($IdVi);
} else {
    $IdVi = null;
    $dtvisionwhere = null;
}
$dtvision = $vision->getAll();

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if ((!empty($_GET['actionvis'])) && (isset($_GET['actionvis']))) {
    $action = $_GET['actionvis'];

    if ($action === 'insert') {

        // INSERTAMOS LA MARCA EN LA BASE DE DATOS 
        $desc = "" . $_POST['DescripcionVision'] . "";

        $vision->insertVision($desc);

        echo '<script>location.replace("index.php?page=Nosotros&ins=Ok");</script>';
    } elseif ($action === 'update') {

        // INSERTAMOS LA MARCA EN LA BASE DE DATOS 
        $desc = "" . $_POST['DescripcionVision'] . "";

        $vision->updateVision($IdVi, $desc);

        echo '<script>location.replace("index.php?page=Nosotros&upd=Ok");</script>';
    } elseif ($action === 'delete') {
        $vision->deleteVision($IdVi);
        echo '<script>location.replace("index.php?page=Nosotros&del=Ok");</script>';
    }
}
