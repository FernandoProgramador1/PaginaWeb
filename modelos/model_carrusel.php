<?php

require_once("recursos/config/db.php");
require_once("controladores/controller_carrusel.php");



$carrusel = new Carruseles();
$carrusel->setTable("Carruseles");
$carrusel->setView('');

$carrusel->setKey('IdCarrusel');

$carrusel->setColumns('Archivo');
$carrusel->setColumns('MimeType');

if ((!empty($_GET['IdK'])) && (isset($_GET['IdK']))) {
    $IdK = $_GET['IdK'];
    $dtcarruselwhere = $carrusel->getWhere($IdK);
} else {
    $IdK = null;
    $dtcarruselwhere = null;
}
$dtcarrusel = $carrusel->getAll();

$dir_doc = "recursos/Archivos/";

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if ((!empty($_GET['actioncar'])) && (isset($_GET['actioncar']))) {
    $action = $_GET['actioncar'];

    if ($action === 'insert') {

        //VERIFICA QUE $_FILES NO ESTE VACIO Y QUE SI CONTENGA ALGUN OBJETO
        if (!empty($_FILES['Archivo']) && isset($_FILES['Archivo'])) {
            $archivoname = $_FILES['Archivo']['name'];
            $archivotype = $_FILES['Archivo']['type'];
            $archivosize = $_FILES['Archivo']['size'];
            $archivofile = $_FILES['Archivo']['tmp_name'];

            $upload = new CarruselModel();
            $arch = $upload->uploadFile($archivoname, $archivotype, $archivosize, $archivofile);

            // COMPROBAMOS QUE TODOS LOS ARCHIVOS HAYAN SIDO CORRECTOS
            if ($arch == 0) {
                header('Location: index.php?page=EdicionImgCarrusel');
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

                $carrusel->insertCarrusel($dtfile, $filetype);
                // BORRA LOS ARCHIVOS QUE SE GUARDARON TEMPORALMENTE EN EL SERVIDOR
                unlink($rtfile);

                echo '<script>location.replace("index.php?page=ImgCarrusel&ins=Ok");</script>';
            }
        } else {
            header('Location: index.php?page=EdicionImgCarrusel');
        }
    } elseif ($action === 'update') {

        //VERIFICA QUE $_FILES NO ESTE VACIO Y QUE SI CONTENGA ALGUN OBJETO
        if (!empty($_FILES['Archivo']['tmp_name'])) {

            $archivoname = $_FILES['Archivo']['name'];
            $archivotype = $_FILES['Archivo']['type'];
            $archivosize = $_FILES['Archivo']['size'];
            $archivofile = $_FILES['Archivo']['tmp_name'];

            $upload = new CarruselModel();
            $arch = $upload->uploadFile($archivoname, $archivotype, $archivosize, $archivofile);

            // COMPROBAMOS QUE TODOS LOS ARCHIVOS HAYAN SIDO CORRECTOS
            if ($arch == 0) {
                header('Location: index.php?page=EdicionImgCarrusel');
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
                $carrusel->updateCarrusel($IdK, $dtfile, $filetype);
                
                // BORRA LOS ARCHIVOS QUE SE GUARDARON TEMPORALMENTE EN EL SERVIDOR
                unlink($rtfile);

                echo '<script>location.replace("index.php?page=ImgCarrusel&upd=Ok");</script>';
            }
        } else {
            echo '<script>alert("Inserte un archivo");</script>';
        }
    } elseif ($action === 'delete') {
        $carrusel->deleteCarrusel($IdK);
        echo '<script>location.replace("index.php?page=ImgCarrusel&del=Ok");</script>';
    }
}
