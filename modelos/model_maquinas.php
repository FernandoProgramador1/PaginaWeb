<?php

require_once("recursos/config/db.php");
require_once("controladores/controller_maquinas.php");

$maquinaria = new Maquinas();
$maquinaria->setTable("Maquinas");
$maquinaria->setView('');

$maquinaria->setKey('IdMaquinaria');

$maquinaria->setColumns('Descripcion');
$maquinaria->setColumns('Archivo');
$maquinaria->setColumns('MimeType');

if ((!empty($_GET['IdQ'])) && (isset($_GET['IdQ']))) {
    $IdQ = $_GET['IdQ'];
    $dtmaquinawhere = $maquinaria->getWhere($IdQ);
} else {
    $IdQ = null;
    $dtmaquinawhere = null;
}
$dtmaquinas = $maquinaria->getAll();

$dir_doc = "recursos/Archivos/";

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if ((!empty($_GET['actionmaq'])) && (isset($_GET['actionmaq']))) {
    $action = $_GET['actionmaq'];

    if ($action === 'insert') {

        //VERIFICA QUE $_FILES NO ESTE VACIO Y QUE SI CONTENGA ALGUN OBJETO
        if (!empty($_FILES['Archivo'])) {

            $archivoname = $_FILES['Archivo']['name'];
            $archivotype = $_FILES['Archivo']['type'];
            $archivosize = $_FILES['Archivo']['size'];
            $archivofile = $_FILES['Archivo']['tmp_name'];

            $upload = new MaquinasModel();
            $arch = $upload->uploadFile($archivoname, $archivotype, $archivosize, $archivofile);

            // COMPROBAMOS QUE TODOS LOS ARCHIVOS HAYAN SIDO CORRECTOS
            if ($arch == 0) {
                header('Location: index.php?page=EdicionMaquinaria');
            } else {

                //  MOVEMOS EL ARCHIVO A UNA RUTA DEL SERVIDOR LOCAL DE MANERA TEMPORAL

                $dir_file = $dir_doc . basename($archivoname);   //  ATRAPA EL ARCHIVO
                $typefile = strtolower(pathinfo($dir_file, PATHINFO_EXTENSION)); //  OBTIENE LA INFORMACION DEL ARCHIVO COMO: RUTA, NOMBRE Y EXTENSION

                $rtfile = $dir_doc . "Archivo_" . $archivoname . $typefile;
                move_uploaded_file($archivofile, $rtfile);

                $gestor = fopen($rtfile, "r");
                $filesize = filesize($rtfile);
                $content = fread($gestor, $filesize);
                $dtfile = addslashes($content);
                fclose($gestor);

                $filetype = mime_content_type($rtfile);

                // INSERTAMOS LA MARCA EN LA BASE DE DATOS 

                $namemarc = "" . $_POST['Descripcion'] . "";

                $maquinaria->insertMaquinaria($namemarc, $dtfile, $filetype);

                // BORRA LOS ARCHIVOS QUE SE GUARDARON TEMPORALMENTE EN EL SERVIDOR
                unlink($rtfile);

                echo '<script>location.replace("index.php?page=Maquinas&ins=Ok");</script>';
            }
        } else {
            header('Location: index.php?page=EdicionMaquinaria&IdQ=' . $IdQ . '');
        }
    } elseif ($action === 'update') {

        //VERIFICA QUE $_FILES NO ESTE VACIO Y QUE SI CONTENGA ALGUN OBJETO
        if (!empty($_FILES['Archivo']['tmp_name'])) {

            $archivoname = $_FILES['Archivo']['name'];
            $archivotype = $_FILES['Archivo']['type'];
            $archivosize = $_FILES['Archivo']['size'];
            $archivofile = $_FILES['Archivo']['tmp_name'];

            $upload = new MaquinasModel();
            $arch = $upload->uploadFile($archivoname, $archivotype, $archivosize, $archivofile);

            // COMPROBAMOS QUE TODOS LOS ARCHIVOS HAYAN SIDO CORRECTOS
            if ($arch == 0) {
                header('Location: index.php?page=EdicionMaquinaria');
            } else {

                //  MOVEMOS EL ARCHIVO A UNA RUTA DEL SERVIDOR LOCAL DE MANERA TEMPORAL

                $dir_file = $dir_doc . basename($archivoname);   //  ATRAPA EL ARCHIVO
                $typefile = strtolower(pathinfo($dir_file, PATHINFO_EXTENSION)); //  OBTIENE LA INFORMACION DEL ARCHIVO COMO: RUTA, NOMBRE Y EXTENSION

                $rtfile = $dir_doc . "Archivo_" . $archivoname . $typefile;
                move_uploaded_file($archivofile, $rtfile);

                $gestor = fopen($rtfile, "r");
                $filesize = filesize($rtfile);
                $content = fread($gestor, $filesize);
                $dtfile = addslashes($content);
                fclose($gestor);

                $filetype = mime_content_type($rtfile);

                // INSERTAMOS LA MARCA EN LA BASE DE DATOS 

                $namemarc = "" . $_POST['Descripcion'] . "";

                $maquinaria->updateMaquinaria($IdC, $namemarc, $dtfile, $filetype);

                // BORRA LOS ARCHIVOS QUE SE GUARDARON TEMPORALMENTE EN EL SERVIDOR
                unlink($rtfile);

                echo '<script>location.replace("index.php?page=Maquinas&upd=Ok");</script>';
            }
        } else {
            $dtfile = null;
            $filetype = null;

            $namemarc = "" . $_POST['Descripcion'] . "";

            $maquinaria->updateMaquinaria($IdQ, $namemarc, $dtfile, $filetype);
        
            echo '<script>location.replace("index.php?page=Maquinas&upd=Ok");</script>';
        }
    } elseif ($action === 'delete') {
        $maquinaria->deleteMaquinaria($IdQ);
        echo '<script>location.replace("index.php?page=Maquinas&del=Ok");</script>';
    }
}
