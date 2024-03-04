<?php

require_once("recursos/config/db.php");
require_once("controladores/controller_quienessomos.php");

$qsomos = new QSomos();
$qsomos->setTable("QuienesSomos");
$qsomos->setView('');

$qsomos->setKey('IdQuienes');

$qsomos->setColumns('DescripcionQuienes');

if ((!empty($_GET['IdQ'])) && (isset($_GET['IdQ']))) {
    $IdQ = $_GET['IdQ'];
    $dtqsomoswhere = $qsomos->getWhere($IdQ);
} else {
    $IdQ = null;
    $dtqsomoswhere = null;
}
$dtqsomos = $qsomos->getAll();

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if ((!empty($_GET['actionqs'])) && (isset($_GET['actionqs']))) {
    $action = $_GET['actionqs'];

    if ($action === 'insert') {

        // INSERTAMOS LA MARCA EN LA BASE DE DATOS 
        $desc = "" . $_POST['DescripcionQuienes'] . "";

        $qsomos->insertQSomos($desc);

        echo '<script>location.replace("index.php?page=Nosotros&ins=Ok");</script>';
    } elseif ($action === 'update') {

        // INSERTAMOS LA MARCA EN LA BASE DE DATOS 
        $desc = "" . $_POST['DescripcionQuienes'] . "";

        $qsomos->updateQSomos($IdQ, $desc);

        echo '<script>location.replace("index.php?page=Nosotros&upd=Ok");</script>';
    } elseif ($action === 'delete') {
        $qsomos->deleteQSomos($IdQ);
        echo '<script>location.replace("index.php?page=Nosotros&del=Ok");</script>';
    }
}
