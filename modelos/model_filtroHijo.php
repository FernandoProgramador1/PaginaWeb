<?php

require_once("recursos/config/db.php");
require_once("controladores/controller_filtroHijo.php");

$filtrohijo = new FiltroHijo();
$filtrohijo->setTable("FiltrosHijos");
$filtrohijo->setView('view_filtros');

$filtrohijo->setKey('IdFiltroHijo');

$filtrohijo->setColumns('DescripcionFiltro');
$filtrohijo->setColumns('IdFiltroPadre');

if ((!empty($_GET['IdFh'])) && (isset($_GET['IdFh']))) {
    $IdFh = $_GET['IdFh'];
    $dtfiltrohijowhere = $filtrohijo->getWhere($IdFh);
} else {
    $IdFh = null;
    $dtfiltrohijowhere = null;
}
$dtfiltrohijo = $filtrohijo->getView();

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if ((!empty($_GET['actionfh'])) && (isset($_GET['actionfh']))) {
    $action = $_GET['actionfh'];

    if ($action === 'insert') {

        // INSERTAMOS LA MARCA EN LA BASE DE DATOS 
        $idfiltroP = "" . $_POST["IdFiltroPadre"];
        $filtroH = "" . $_POST['DescripcionFiltro'] . "";

        $filtrohijo->insertFiltroHijo($filtroH, $idfiltroP);

        echo '<script>location.replace("index.php?page=Filtros&ins=Ok");</script>';
    } elseif ($action === 'update') {

        // INSERTAMOS LA MARCA EN LA BASE DE DATOS 
        $idfiltroP = "" . $_POST["IdFiltroPadre"];
        $filtroH = "" . $_POST['DescripcionFiltro'] . "";

        $filtrohijo->updateFiltroHijo($IdFh, $filtroH, $idfiltroP);

        echo '<script>location.replace("index.php?page=Filtros&upd=Ok");</script>';
    } elseif ($action === 'delete') {
        $filtrohijo->deleteFiltroHijo($filtroH);
        echo '<script>location.replace("index.php?page=Filtros&del=Ok");</script>';
    }
}
