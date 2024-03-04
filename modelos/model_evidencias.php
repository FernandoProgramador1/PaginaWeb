<?php

require_once('recursos/config/db.php');
require_once('controladores/controller_archivos.php');
require_once('controladores/controller_evidencias.php');

class EvidenciasModel extends Evidencias
{

    private $conArc;
    public  $lastidupd;
    public  $fidUpd;

    public function __construct()
    {
        $conArc = new Archivos();
        $this->lstid = $conArc->lastId();
    }

    public function uploadFile($fname, $ftype, $fsize, $file)
    {
        // SUBIR ARCHIVOS
        $dir_doc = "recursos/Archivos/";
        $uploadOk = 1;

        $dir_file = $dir_doc . basename($fname);   //  ATRAPA EL ARCHIVO
        $typefile = strtolower(pathinfo($dir_file, PATHINFO_EXTENSION)); //  OBTIENE LA INFORMACION DEL ARCHIVO COMO: RUTA, NOMBRE Y EXTENSION

        //  VERIFICA EL TAMAÑO DEL ARCHIVO
        if ($fsize > 5000000) {
            $uploadOk = 0;
        }

        //  MUEVE EL ARCHIVO AL SERVIDOR SOLO CUANDO TODOS LOS FILTROS ANTERIORES SEAN CORRECTOS
        if ($uploadOk == 0) {
            // $errorfile = 'Error en el tipo de archivo, deben ser "PNG, JPG ó JPEG"';
            $errorfile = 0;
            return $errorfile;
        } else {

            // $fch_r = date('Y-m-d');     //OBTIENE LA FECHA ACTUAL

            $gestor     =   fopen($file, "r");
            $content    = fread($gestor, $fsize);
            $dtarchivo  = addslashes($content);
            fclose($gestor);

            return $dtarchivo;
        }
    }

    public function comprobarType($type)
    {
        if ($type == 'image/jpg') {
            $typeresult = ".jpg";
            return $typeresult;
        } else {
            $typeresult = ".jpeg";
            return $typeresult;
        }
    }
}

$evidencia = new Evidencias ();
$evidencia->setTable("Evidencias");
$evidencia->setView('view_Servicios');

$evidencia->setKey('IdEvidencia');

$evidencia->setColumns('Descripcion');
$evidencia->setColumns('Archivo');
$evidencia->setColumns('MimeType');
$evidencia->setColumns('IdServicio');

// $fch_r = date('Y-m-d');     //OBTIENE LA FECHA ACTUAL

if ((!empty($_GET['IdE'])) && (isset($_GET['IdE'])))  {
    $IdE = $_GET['IdE'];
    $dteviwhere = $evidencia->getWhere($IdE);
}else{
    $IdE = null;
    $dteviwhere = null;
}

$dtevidencias = $evidencia->getView();

if ((!empty($_POST['Servicio'])) && (isset($_POST['Servicio'])))  {
    $Servicio = $_POST['Servicio'];
    $dtserviciowhere = $evidencia->getWhereServicio($Servicio);
}else{
    $dtserviciowhere = null;
}

if ((!empty($_GET['Servicio'])) && (isset($_GET['Servicio']))) {
    $Servicio = $_GET['Servicio'];
    $dtserviciowhere = $evidencia->getWhereServicio($Servicio);
}else{

    $dtserviciowhere = null;
}

$dir_doc = "recursos/Archivos/";

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if((!empty($_GET['actionevi'])) && (isset($_GET['actionevi']))) {
    $action = $_GET['actionevi'];
    if($action === 'insert') {
        // COMPROBAMOS QUE TODOS LOS ARCHIVOS HAYAN SIDO CORRECTOS
        //VERIFICA QUE $_FILES NO ESTE VACIO Y QUE SI CONTENGA ALGUN OBJETO
        if (!empty($_FILES['Archivo'])) {

            $archivoname = $_FILES['Archivo']['name'];
            $archivotype = $_FILES['Archivo']['type'];
            $archivosize = $_FILES['Archivo']['size'];
            $archivofile = $_FILES['Archivo']['tmp_name'];

            $upload = new EvidenciasModel();
            $arch = $upload->uploadFile($archivoname, $archivotype, $archivosize, $archivofile);

            // COMPROBAMOS QUE TODOS LOS ARCHIVOS HAYAN SIDO CORRECTOS
            if ($arch == 0) {
                echo '<script>location.replace("index.php?page=EdicionCatalogos&form=' . $form . '")</script>';
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

                $descrip = "". $_POST['Descripcion'] ."";
                $idserv = "". $_POST['IdServicio'] ."";

                $evidencia->insertEvidencia($descrip, $dtfile, $filetype, $idserv);

                // BORRA LOS ARCHIVOS QUE SE GUARDARON TEMPORALMENTE EN EL SERVIDOR
                unlink($rtfile);

                echo '<script>location.replace("index.php?page=EvidenciasServicios&ins=Ok");</script>';
            }
        } else {
            echo '<script>location.replace("index.php?page=EdicionEvidencias&IdE='. $IdE .'")</script>';
        }
    }else if($action === 'update'){
        
        //VERIFICA QUE $_FILES NO ESTE VACIO Y QUE SI CONTENGA ALGUN OBJETO
        if (!empty($_FILES['Archivo'])) {

            $archivoname = $_FILES['Archivo']['name'];
            $archivotype = $_FILES['Archivo']['type'];
            $archivosize = $_FILES['Archivo']['size'];
            $archivofile = $_FILES['Archivo']['tmp_name'];
            
            if((isset($archivofile)) && ($archivofile != "")){
                $upload = new EvidenciasModel();
                $arch = $upload->uploadFile($archivoname, $archivotype, $archivosize, $archivofile);
            }else{
                $arch = 0;
            }
            // COMPROBAMOS QUE TODOS LOS ARCHIVOS HAYAN SIDO CORRECTOS
            if (($arch == 0) && (isset($_POST['Descripcion']))) {
                $dtfile = null;
                $filetype = null;
                $descrip = "". $_POST['Descripcion'] ."";
                
                if(isset($_POST['IdServicio'])){
                    $idserv = "". $_POST['IdServicio'] ."";                    
                
                    $evidencia->updateEvidencia($IdE,$descrip, $dtfile, $filetype,$idserv);
                
                echo '<script>location.replace("index.php?page=EvidenciasServicios&upd=Ok");</script>';
                
                }else{
                    $dtfile = null;
                    $filetype = null;
    
                    foreach($dteviwhere as $temp):
                        $idserv = $temp["IdServicio"];
                    endforeach;

                    $evidencia->updateEvidencia($IdE,$descrip, $dtfile, $filetype,$idserv);
                
                echo '<script>location.replace("index.php?page=EvidenciasServicios&upd=Ok");</script>';
                }
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

                $descrip = "". $_POST['Descripcion'] ."";
                if(isset($_POST['IdServicio'])){
                    $idserv = "". $_POST['IdServicio'] ."";                    
                
                    $evidencia->updateEvidencia($IdE,$descrip, $dtfile, $filetype,$idserv);
                
                }else{    
                    foreach($dteviwhere as $temp):
                        $idserv = $temp["IdServicio"];
                    endforeach;

                    $evidencia->updateEvidencia($IdE,$descrip, $dtfile, $filetype,$idserv);
                
                }
                // BORRA LOS ARCHIVOS QUE SE GUARDARON TEMPORALMENTE EN EL SERVIDOR
                unlink($rtfile);

                echo '<script>location.replace("index.php?page=EvidenciasServicios&upd=Ok");</script>';
            }
        } else {
            echo '<script>location.replace("index.php?page=EdicionEvidencias&IdE='. $IdE .'")</script>';
        }

    }else if($action === 'delete')   {
        $evidencia->deleteEvidencia($IdE);
        echo '<script>location.replace("index.php?page=EvidenciasServicios&del=Ok");</script>';
    } 
}
