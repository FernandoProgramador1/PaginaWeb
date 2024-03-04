<?php

require_once("recursos/config/db.php");
require_once("controladores/controller_filtroPadre.php");

$filtropadre = new FiltroPadre();
$filtropadre->setTable("FiltrosPadres");
$filtropadre->setView('');

$filtropadre->setKey('IdFiltroPadre');

$filtropadre->setColumns('DescripcionFiltro');

if ((!empty($_GET['IdFp'])) && (isset($_GET['IdFp']))) {
    $IdFp = $_GET['IdFp'];
    $dtfiltropadrewhere = $filtropadre->getWhere($IdFp);
} else {
    $IdFp = null;
    $dtfiltropadrewhere = null;
}
$dtfiltropadre = $filtropadre->getAll();

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if ((!empty($_GET['actionfp'])) && (isset($_GET['actionfp']))) {
    $action = $_GET['actionfp'];

    if ($action === 'insert') {

        // INSERTAMOS LA MARCA EN LA BASE DE DATOS 

        $filtroP = "" . $_POST['DescripcionFiltro'] . "";

        $filtropadre->insertFiltroPadre($filtroP);

        echo '<script>location.replace("index.php?page=FiltrosPadres&ins=Ok");</script>';
    } elseif ($action === 'update') {

        // INSERTAMOS LA MARCA EN LA BASE DE DATOS 

        $filtroP = "" . $_POST['DescripcionFiltro'] . "";

        $filtropadre->updateFiltroPadre($IdFp, $filtroP);

        echo '<script>location.replace("index.php?page=FiltrosPadres&upd=Ok");</script>';
    } elseif ($action === 'delete') {
        $filtropadre->deleteFiltroPadre($filtroP);
        echo '<script>location.replace("index.php?page=FiltrosPadres&del=Ok");</script>';
    }
}
