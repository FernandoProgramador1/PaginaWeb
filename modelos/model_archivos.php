<?php

require_once("recursos/config/db.php");
require_once("controladores/controller_archivos.php");


$archivo = new Archivos ();
$archivo->setTable("Archivos");
$archivo->setView('');

$archivo->setKey('IdArchivo');

$archivo->setColumns('Archivo');
$archivo->setColumns('MimeType');
$archivo->setColumns('Descripcion');

$dtarc = $archivo->getAll();

if((!empty($_GET['Id'])) && (isset($_GET['Id']))) {
    $Id = $_GET['Id'];
    $dtarchwhere = $archivo->getWhere($Id);
}else{
    $Id = "";
}

$dir_doc = "recursos/Archivos/";

// $fch_r = date('Y-m-d');     //OBTIENE LA FECHA ACTUAL

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if((!empty($_GET['actionfile'])) && (isset($_GET['actionfile']))) {
    $action = $_GET['actionfile'];

    if($action === 'insert') {

        //VERIFICA QUE $_FILES NO ESTE VACIO Y QUE SI CONTENGA ALGUN OBJETO
        if(!empty($_FILES['Archivo']))  { 
            
            $archivoname = $_FILES['Archivo']['name'];
            $archivotype = $_FILES['Archivo']['type'];
            $archivosize = $_FILES['Archivo']['size'];
            $archivofile = $_FILES['Archivo']['tmp_name'];
            
            $upload = new ArchivosModel();
            $arch = $upload->uploadFile($archivoname,$archivotype,$archivosize,$archivofile);

            // COMPROBAMOS QUE TODOS LOS ARCHIVOS HAYAN SIDO CORRECTOS
            if($arch == 0)  {
                header('Location: index.php?page=Catalogos&form='. $form .'');
            }else{

                //  MOVEMOS EL ARCHIVO A UNA RUTA DEL SERVIDOR LOCAL DE MANERA TEMPORAL

                $dir_file = $dir_doc . basename($archivoname);   //  ATRAPA EL ARCHIVO
                $typefile = strtolower(pathinfo($dir_file,PATHINFO_EXTENSION)); //  OBTIENE LA INFORMACION DEL ARCHIVO COMO: RUTA, NOMBRE Y EXTENSION

                $rtfile = $dir_doc . "Archivo_" . $archivoname . $typefile; 
                move_uploaded_file($archivofile,$rtfile);

                $gestor = fopen($rtfile, "r");
                $filesize = filesize($rtfile);
                $content = fread($gestor, $filesize);
                $dtfile = addslashes($content);
                fclose($gestor);

                $filetype = mime_content_type($rtfile);

                // INSERTAMOS EL ARCHIVO EN LA BASE DE DATOS 
                $archivo->insertArchivo($dtfile,$filetype,$archivoname);
                $idfile = $archivo->lastId();

                // BORRA LOS ARCHIVOS QUE SE GUARDARON TEMPORALMENTE EN EL SERVIDOR
                unlink($rtfile);
            }
        }else{
            header('Location: index.php?page=EdicionImgCarrusel&Id='. $Id .'');
        }
    }
}

?>