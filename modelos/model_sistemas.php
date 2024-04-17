<?php

require_once("recursos/config/db.php");
require_once("controladores/controller_sistemas.php");
require_once("modelos/model_archivos.php");

$sistema = new Sistemas();
$sistema->setTable("Sistemas");
$sistema->setView('view_sistemas');

$sistema->setKey('IdSistema');

$sistema->setColumns('Nombre');
$sistema->setColumns('Descripcion');
$sistema->setColumns('IdArchivo');

if ((!empty($_GET['IdSistema'])) && (isset($_GET['IdSistema']))) {
    $IdSistema = $_GET['IdSistema'];
    $dtsistemawhere = $sistema->getWhere($IdSistema);
    $dtviewsistema = $sistema->getWhereview($IdSistema);
} else if ((!empty($_POST['IdSistema'])) && (isset($_POST['IdSistema']))) {
    $IdSistema = $_POST['IdSistema'];
    $dtsistemawhere = $sistema->getWhere($IdSistema);
    $dtviewsistema = $sistema->getWhereview($IdSistema);
} else {
    $IdSistema = null;
    $dtsistemawhere = null;
    $dtviewsistema = null;
    $dtsistemas = $sistema->getAll();
    $dtsisviews = $sistema->getView();
}

$dir_doc = "recursos/Archivos/";

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if ((!empty($_GET['actionsist'])) && (isset($_GET['actionsist']))) {
    $actionsist = $_GET['actionsist'];

    if ($actionsist === 'insert') {

        $sistema->values[] = "'" . $_POST['Nombre'] . "'";
        $sistema->values[] = "'" . $_POST['Descripcion'] . "'";
        $sistema->values[] = $Idfile;

        $sistema->insertSistema();

        echo '<script>location.replace("index.php?page=SistemasAdmin&ins=Ok");</script>';

    } elseif ($actionsist === 'update') {

        foreach ($dtsistemawhere as $rowid):
            $IdArchivoSist = $rowid['IdArchivo'];
        endforeach;

        $sistema->values[] = "" . $_POST['Nombre'] . "";
        $sistema->values[] = "" . $_POST['Descripcion'] . "";

        if($Idfile !== 0){
            $sistema->values[] = $Idfile;
        }else{
            $sistema->values[] = $Idfile;
        }

        $sistema->updateSistema($IdSistema);
        
        echo '<script>location.replace("index.php?page=SistemasAdmin&upd=Ok");</script>';

    } elseif ($actionsist === 'delete') {
        $sistema->deleteSistema($IdSistema);
        echo '<script>location.replace("index.php?page=SistemasAdmin&del=Ok");</script>';
    }
}
