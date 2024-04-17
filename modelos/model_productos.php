<?php

require_once ("recursos/config/db.php");
require_once ("controladores/controller_productos.php");
require_once("modelos/model_archivos.php");


$productos = new Productos();
$productos->setTable("Productos");
$productos->setView('view_productos');

$productos->setKey('IdProducto');

$productos->setColumns('NombreProducto');
$productos->setColumns('Descripcion');
$productos->setColumns('IdArchivo');

if ((!empty($_GET['IdProducto'])) && (isset($_GET['IdProducto']))) {
    $IdProducto = $_GET['IdProducto'];
    $dtproductowhere = $productos->getWhere($IdProducto);
    $dtviewproducto = $productos->getWhereview($IdProducto);
} else if ((!empty($_POST['IdProducto'])) && (isset($_POST['IdProducto']))) {
    $IdProducto = $_POST['IdProducto'];
    $dtproductowhere = $productos->getWhere($IdProducto);
    $dtviewproducto = $productos->getWhereview($IdProducto);
} else {
    $IdProducto = null;
    $dtproductowhere = null;
    $dtproductos = $productos->getAll();
    $dtprodsview = $productos->getView();
}

$dir_doc = "recursos/Archivos/";

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if ((!empty($_GET['actionprod'])) && (isset($_GET['actionprod']))) {
    $action = $_GET['actionprod'];

    if ($action === 'insert') {

        // INSERTAMOS LA MARCA EN LA BASE DE DATOS 
        $productos->values[] = "'" . $_POST["NombreProducto"] . "'";
        $productos->values[] = "'" . $_POST["Descripcion"] . "'";
        $productos->values[] = $Idfile;

        $productos->insertProducto();

        echo '<script>location.replace("index.php?page=ProductosAdmin&ins=Ok");</script>';
    } else if ($action === 'update') {

        foreach ($dtproductowhere as $temp):
            $IdArchvioProd = $temp["IdArchivo"];
        endforeach;

        $productos->values[] = "" . $_POST["NombreProducto"] . "";
        $productos->values[] = "" . $_POST["Descripcion"] . "";

        if($Idfile !== "NULL"){
            $productos->values[] = $Idfile;
        }else{
            $productos->values[] = $IdArchivoServ;
        }

        $productos->updateProducto($IdProducto);

        echo '<script>location.replace("index.php?page=ProductosAdmin&upd=Ok");</script>';


    } elseif ($action === 'delete') {
        $productos->deleteProducto($IdProducto);
        echo '<script>location.replace("index.php?page=ProductosAdmin&del=Ok");</script>';
    }
}
