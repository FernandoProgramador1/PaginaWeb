<?php

require_once("recursos/config/db.php");
require_once("controladores/controller_mision.php");

$mision = new Misiones();
$mision->setTable("Misiones");
$mision->setView('');

$mision->setKey('IdMision');

$mision->setColumns('DescripcionMision');

if ((!empty($_GET['IdMi'])) && (isset($_GET['IdMi']))) {
    $IdMi = $_GET['IdMi'];
    $dtmisionwhere = $mision->getWhere($IdMi);
} else {
    $IdMi = null;
    $dtmisionwhere = null;
}
$dtmision = $mision->getAll();

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if ((!empty($_GET['actionmis'])) && (isset($_GET['actionmis']))) {
    $action = $_GET['actionmis'];

    if ($action === 'insert') {

        // INSERTAMOS LA MARCA EN LA BASE DE DATOS 
        $desc = "" . $_POST['DescripcionMision'] . "";

        $mision->insertMision($desc);

        echo '<script>location.replace("index.php?page=Nosotros&ins=Ok");</script>';
    } elseif ($action === 'update') {

        // INSERTAMOS LA MARCA EN LA BASE DE DATOS 
        $desc = "" . $_POST['DescripcionMision'] . "";

        $mision->updateMision($IdMi, $desc);

        echo '<script>location.replace("index.php?page=Nosotros&upd=Ok");</script>';
    } elseif ($action === 'delete') {
        $mision->deleteMision($IdMi);
        echo '<script>location.replace("index.php?page=Nosotros&del=Ok");</script>';
    }
}
