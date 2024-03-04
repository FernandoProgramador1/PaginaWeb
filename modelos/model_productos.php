<?php

require_once("recursos/config/db.php");
require_once("controladores/controller_productos.php");



$productos = new Productos();
$productos->setTable("Productos");
$productos->setView('view_productos');

$productos->setKey('IdProducto');

$productos->setColumns('NombreProducto');
$productos->setColumns('DetallesProducto');
$productos->setColumns('CantidadMedida');
$productos->setColumns('Archivo');
$productos->setColumns('MimeType');
$productos->setColumns('IdMarca');
$productos->setColumns('IdTipoProducto');

if ((!empty($_GET['IdProd'])) && (isset($_GET['IdProd']))) {
    $IdProd = $_GET['IdProd'];
    $dtproductowhere = $productos->getWhere($IdProd);
} else {
    $IdProd = null;
    $dtproductowhere = null;
}

$dtproducto = $productos->getAll();
$dtviewproducto = $productos->getView();
$dir_doc = "recursos/Archivos/";

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if ((!empty($_GET['actionprod'])) && (isset($_GET['actionprod']))) {
    $action = $_GET['actionprod'];

    if ($action === 'insert') {

        //VERIFICA QUE $_FILES NO ESTE VACIO Y QUE SI CONTENGA ALGUN OBJETO
        if (!empty($_FILES['Archivo']) && isset($_FILES['Archivo'])) {
            $archivoname = $_FILES['Archivo']['name'];
            $archivotype = $_FILES['Archivo']['type'];
            $archivosize = $_FILES['Archivo']['size'];
            $archivofile = $_FILES['Archivo']['tmp_name'];

            $upload = new ProductoModel();
            $arch = $upload->uploadFile($archivoname, $archivotype, $archivosize, $archivofile);

            // COMPROBAMOS QUE TODOS LOS ARCHIVOS HAYAN SIDO CORRECTOS
            if ($arch == 0) {
                header('Location: index.php?page=EdicionProductos');
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
                $nameProd = "". $_POST["NombreProducto"] ."";
                $details = "". $_POST["DetallesProducto"] ."";
                $cantProd = "". $_POST["CantidadMedida"] ."";
                $marcaProd = "". $_POST["IdMarca"] ."";
                $tpProd = "". $_POST["IdTipoProducto"] ."";

                $productos->insertProducto($nameProd,$details,$cantProd,$dtfile, $filetype, $marcaProd, $tpProd);
                // BORRA LOS ARCHIVOS QUE SE GUARDARON TEMPORALMENTE EN EL SERVIDOR
                unlink($rtfile);

                echo '<script>location.replace("index.php?page=ProductosAdmin&ins=Ok");</script>';
            }
        } else {
            header('Location: index.php?page=EdicionProductos');
        }
    } else if ($action === 'update') {

        //VERIFICA QUE $_FILES NO ESTE VACIO Y QUE SI CONTENGA ALGUN OBJETO
        if (!empty($_FILES['Archivo']['tmp_name'])) {

            $archivoname = $_FILES['Archivo']['name'];
            $archivotype = $_FILES['Archivo']['type'];
            $archivosize = $_FILES['Archivo']['size'];
            $archivofile = $_FILES['Archivo']['tmp_name'];

            if(!empty($archivofile) && isset($archivosize)) {
                $upload = new ProductoModel();
                $arch = $upload->uploadFile($archivoname, $archivotype, $archivosize, $archivofile);

                // COMPROBAMOS QUE TODOS LOS ARCHIVOS HAYAN SIDO CORRECTOS
                if ($arch == 0) {
                    header('Location: index.php?page=EdicionProductos');
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

                    $nameProd = "". $_POST["NombreProducto"] ."";
                    $details = "". $_POST["DetallesProducto"] ."";
                    $cantProd = "". $_POST["CantidadMedida"] ."";
                    if((isset($_POST['IdMarca'])) && (isset($_POST['IdTipoProducto']))){
                        $marcaProd = "". $_POST['IdMarca'] ."";                    
                        $tpProd = "". $_POST['IdTipoProducto'] ."";   
                    
                        $productos->updateProducto($IdProd, $nameProd,$details,$cantProd, $dtfile, $filetype, $marcaProd, $tpProd);
                                        // BORRA LOS ARCHIVOS QUE SE GUARDARON TEMPORALMENTE EN EL SERVIDOR
                                        unlink($rtfile);
                    echo '<script>location.replace("index.php?page=ProductosAdmin&upd=Ok");</script>';
                    }elseif((isset($_POST['IdMarca'])) && (!isset($_POST['IdTipoProducto']))){
                        foreach($dtproductowhere as $temp):
                            $tpProd = $temp["IdTipoProducto"];
                        endforeach;
        
                        $marcaProd = "". $_POST['IdMarca'] ."";                    
        
                        $productos->updateProducto($IdProd, $nameProd,$details,$cantProd, $dtfile, $filetype, $marcaProd, $tpProd);
                                        // BORRA LOS ARCHIVOS QUE SE GUARDARON TEMPORALMENTE EN EL SERVIDOR
                                        unlink($rtfile);
                        echo '<script>location.replace("index.php?page=ProductosAdmin&upd=Ok");</script>';
                    }elseif((!isset($_POST['IdMarca'])) && (isset($_POST['IdTipoProducto']))){
                        foreach($dtproductowhere as $temp):
                            $marcaProd = $temp["IdMarca"];
                        endforeach;
        
                        $tpProd = "". $_POST['IdTipoProducto'] ."";   
                    
                        $productos->updateProducto($IdProd, $nameProd,$details,$cantProd, $dtfile, $filetype, $marcaProd, $tpProd);
                    // BORRA LOS ARCHIVOS QUE SE GUARDARON TEMPORALMENTE EN EL SERVIDOR
                    unlink($rtfile);                    
                    echo '<script>location.replace("index.php?page=ProductosAdmin&upd=Ok");</script>';
                    }else{
                        
                        foreach($dtproductowhere as $temp):
                            $marcaProd = $temp["IdMarca"];
                            $tpProd = $temp["IdTipoProducto"];
                        endforeach;
        
                        $productos->updateProducto($IdProd, $nameProd,$details,$cantProd, $dtfile, $filetype, $marcaProd, $tpProd);
                    // BORRA LOS ARCHIVOS QUE SE GUARDARON TEMPORALMENTE EN EL SERVIDOR
                    unlink($rtfile);

                        echo '<script>location.replace("index.php?page=ProductosAdmin&upd=Ok");</script>';
                    }

                    // echo '<script>location.replace("index.php?page=ProductosAdmin&upd=Ok");</script>';
                }
            }
        }else{
            $nameProd = "". $_POST["NombreProducto"] ."";
            $details = "". $_POST["DetallesProducto"] ."";
            $cantProd = "". $_POST["CantidadMedida"] ."";
            $dtfile = null;
            $filetype = null;
            if((isset($_POST['IdMarca'])) && (isset($_POST['IdTipoProducto']))){
                $marcaProd = "". $_POST['IdMarca'] ."";                    
                $tpProd = "". $_POST['IdTipoProducto'] ."";   
            
                $productos->updateProducto($IdProd, $nameProd,$details,$cantProd, $dtfile, $filetype, $marcaProd, $tpProd);
            
                echo '<script>location.replace("index.php?page=ProductosAdmin&upd=Ok");</script>';

            }elseif((isset($_POST['IdMarca'])) && (!isset($_POST['IdTipoProducto']))){
                foreach($dtproductowhere as $temp):
                    $tpProd = $temp["IdTipoProducto"];
                endforeach;

                $marcaProd = "". $_POST['IdMarca'] ."";                    

                $productos->updateProducto($IdProd, $nameProd,$details,$cantProd, $dtfile, $filetype, $marcaProd, $tpProd);
            
                echo '<script>location.replace("index.php?page=ProductosAdmin&upd=Ok");</script>';

            }elseif((!isset($_POST['IdMarca'])) && (isset($_POST['IdTipoProducto']))){
                foreach($dtproductowhere as $temp):
                    $marcaProd = $temp["IdMarca"];
                endforeach;

                $tpProd = "". $_POST['IdTipoProducto'] ."";   
            
                $productos->updateProducto($IdProd, $nameProd,$details,$cantProd, $dtfile, $filetype, $marcaProd, $tpProd);
            
                echo '<script>location.replace("index.php?page=ProductosAdmin&upd=Ok");</script>';

            }else{
                
                foreach($dtproductowhere as $temp):
                    $marcaProd = $temp["IdMarca"];
                    $tpProd = $temp["IdTipoProducto"];
                endforeach;

                $productos->updateProducto($IdProd, $nameProd,$details,$cantProd, $dtfile, $filetype, $marcaProd, $tpProd);
            
                echo '<script>location.replace("index.php?page=ProductosAdmin&upd=Ok");</script>';
            }
            // echo '<script>location.replace("index.php?page=ProductosAdmin&upd=Ok");</script>';
        }
    } elseif ($action === 'delete') {
        $productos->deleteProducto($IdProd);
        echo '<script>location.replace("index.php?page=ProductosAdmin&del=Ok");</script>';
    }
}
