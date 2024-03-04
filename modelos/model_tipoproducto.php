<?php

require_once("recursos/config/db.php");
require_once("controladores/controller_tipoproducto.php");

$tipoproducto = new TiposProductos();
$tipoproducto->setTable("TiposProductos");
$tipoproducto->setView('');

$tipoproducto->setKey('IdTipoProducto');

$tipoproducto->setColumns('DescripcionTipoProducto');

if ((!empty($_GET['IdTp'])) && (isset($_GET['IdTp']))) {
    $IdTp = $_GET['IdTp'];
    $dttipoproductowhere = $tipoproducto->getWhere($IdTp);
} else {
    $IdTp = null;
    $dttipoproductowhere = null;
}
$dttipoproducto = $tipoproducto->getAll();

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if ((!empty($_GET['actiontp'])) && (isset($_GET['actiontp']))) {
    $action = $_GET['actiontp'];

    if ($action === 'insert') {

        // INSERTAMOS LA MARCA EN LA BASE DE DATOS 
        $desTipoProd = "" . $_POST['DescripcionTipoProducto'] . "";

        $tipoproducto->insertTipoProducto($desTipoProd);

        echo '<script>location.replace("index.php?page=TiposProductos&ins=Ok");</script>';
    } elseif ($action === 'update') {

        // INSERTAMOS LA MARCA EN LA BASE DE DATOS 
        $idfiltroP = "" . $_POST["IdFiltroPadre"];
        $desTipoProd = "" . $_POST['DescripcionTipoProducto'] . "";

        $tipoproducto->updateTipoProducto($IdTp, $desTipoProd);

        echo '<script>location.replace("index.php?page=TiposProductos&upd=Ok");</script>';
    } elseif ($action === 'delete') {
        $tipoproducto->deleteTipoProducto($IdTp);
        echo '<script>location.replace("index.php?page=TiposProductos&del=Ok");</script>';
    }
}
