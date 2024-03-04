<?php

require_once("recursos/config/db.php");
require_once("controladores/controller_valores.php");

$valores = new Valores();
$valores->setTable("Valores");
$valores->setView('');

$valores->setKey('IdValores');

$valores->setColumns('DescripcionValores');

if ((!empty($_GET['IdVa'])) && (isset($_GET['IdVa']))) {
    $IdVa = $_GET['IdVa'];
    $dtvaloreswhere = $valores->getWhere($IdVa);
} else {
    $IdVa = null;
    $dtvaloreswhere = null;
}
$dtvalores = $valores->getAll();

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if ((!empty($_GET['actionval'])) && (isset($_GET['actionval']))) {
    $action = $_GET['actionval'];

    if ($action === 'insert') {

        // INSERTAMOS LA MARCA EN LA BASE DE DATOS 
        $desc = "" . $_POST['DescripcionValores'] . "";

        $valores->insertValores($desc);

        echo '<script>location.replace("index.php?page=Nosotros&ins=Ok");</script>';
    } elseif ($action === 'update') {

        // INSERTAMOS LA MARCA EN LA BASE DE DATOS 
        $desc = "" . $_POST['DescripcionValores'] . "";

        $valores->updateValores($IdVa, $desc);

        echo '<script>location.replace("index.php?page=Nosotros&upd=Ok");</script>';
    } elseif ($action === 'delete') {
        $valores->deleteValores($IdVa);
        echo '<script>location.replace("index.php?page=Nosotros&del=Ok");</script>';
    }
}
