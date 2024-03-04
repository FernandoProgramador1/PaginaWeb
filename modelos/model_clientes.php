<?php

require_once("recursos/config/db.php");
require_once("controladores/controller_clientes.php");

$cliente = new Clientes();
$cliente->setTable("Clientes");
$cliente->setView('');

$cliente->setKey('IdCliente');

$cliente->setColumns('Descripcion');
$cliente->setColumns('UrlCliente');
$cliente->setColumns('Archivo');
$cliente->setColumns('MimeType');

if ((!empty($_GET['IdC'])) && (isset($_GET['IdC']))) {
    $IdC = $_GET['IdC'];
    $dtclientewhere = $cliente->getWhere($IdC);
} else {
    $IdC = null;
    $dtclientewhere = null;
}
$dtclientes = $cliente->getAll();

$dir_doc = "recursos/Archivos/";

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if ((!empty($_GET['actionclie'])) && (isset($_GET['actionclie']))) {
    $action = $_GET['actionclie'];

    if ($action === 'insert') {

        //VERIFICA QUE $_FILES NO ESTE VACIO Y QUE SI CONTENGA ALGUN OBJETO
        if (!empty($_FILES['Archivo'])) {

            $archivoname = $_FILES['Archivo']['name'];
            $archivotype = $_FILES['Archivo']['type'];
            $archivosize = $_FILES['Archivo']['size'];
            $archivofile = $_FILES['Archivo']['tmp_name'];

            $upload = new ClientesModel();
            $arch = $upload->uploadFile($archivoname, $archivotype, $archivosize, $archivofile);

            // COMPROBAMOS QUE TODOS LOS ARCHIVOS HAYAN SIDO CORRECTOS
            if ($arch == 0) {
                header('Location: index.php?page=EdicionClientes');
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
                $pageclient = "" . $_POST['UrlCliente'] . "";

                $cliente->insertCliente($namemarc, $pageclient, $dtfile, $filetype);

                // BORRA LOS ARCHIVOS QUE SE GUARDARON TEMPORALMENTE EN EL SERVIDOR
                unlink($rtfile);

                echo '<script>location.replace("index.php?page=Clientes&ins=Ok");</script>';
            }
        } else {
            header('Location: index.php?page=EdicionClientes&Id=' . $Id . '');
        }
    } elseif ($action === 'update') {

        //VERIFICA QUE $_FILES NO ESTE VACIO Y QUE SI CONTENGA ALGUN OBJETO
        if (!empty($_FILES['Archivo']['tmp_name'])) {

            $archivoname = $_FILES['Archivo']['name'];
            $archivotype = $_FILES['Archivo']['type'];
            $archivosize = $_FILES['Archivo']['size'];
            $archivofile = $_FILES['Archivo']['tmp_name'];

            $upload = new ClientesModel();
            $arch = $upload->uploadFile($archivoname, $archivotype, $archivosize, $archivofile);

            // COMPROBAMOS QUE TODOS LOS ARCHIVOS HAYAN SIDO CORRECTOS
            if ($arch == 0) {
                header('Location: index.php?page=EdicionClientes');
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
                $pageclient = "" . $_POST['UrlCliente'] . "";

                $cliente->updateCliente($IdC, $namemarc, $pageclient, $dtfile, $filetype);

                // BORRA LOS ARCHIVOS QUE SE GUARDARON TEMPORALMENTE EN EL SERVIDOR
                unlink($rtfile);

                echo '<script>location.replace("index.php?page=Clientes&upd=Ok");</script>';
            }
        } else {
            $dtfile = null;
            $filetype = null;

            $namemarc = "" . $_POST['Descripcion'] . "";
            $pageclient = "" . $_POST['UrlCliente'] . "";

            $dtclientewhere = $cliente->getWhere($IdC);

            $cliente->updateCliente($IdC, $namemarc, $pageclient, $dtfile, $filetype);
        
            echo '<script>location.replace("index.php?page=Clientes&upd=Ok");</script>';
        }
    } elseif ($action === 'delete') {
        $cliente->deleteCliente($IdC);
        echo '<script>location.replace("index.php?page=Clientes&del=Ok");</script>';
    }
}
