<?php

require_once("recursos/config/db.php");
require_once("controladores/controller_contactos.php");

$contacto = new Contactos();
$contacto->setTable("Contactos");
$contacto->setView('');

$contacto->setKey('IdContacto');

$contacto->setColumns('Correo');
$contacto->setColumns('Direccion');
$contacto->setColumns('CodigoP');
$contacto->setColumns('Ciudad');
$contacto->setColumns('Estado');
$contacto->setColumns('Telefono');

if ((!empty($_GET['IdC'])) && (isset($_GET['IdC']))) {
    $IdC = $_GET['IdC'];
    $dtcontactowhere = $contacto->getWhere($IdC);
} else {
    $IdC = null;
    $dtcontactowhere = null;
}
$dtcontactos = $contacto->getAll();

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if ((!empty($_GET['actioncon'])) && (isset($_GET['actioncon']))) {
    $action = $_GET['actioncon'];

    if ($action === 'insert') {

        // INSERTAMOS LA MARCA EN LA BASE DE DATOS 

        $correo = "" . $_POST['Correo'] . "";
        $direccion = "" . $_POST['Direccion'] . "";
        $codigo = "" . $_POST['CodigoP'] . "";
        $ciudad = "" . $_POST['Ciudad'] . "";
        $estado = "" . $_POST['Estado'] . "";
        $telefono = "" . $_POST['Telefono'] . "";

        $contacto->insertContacto($correo,$direccion,$codigo,$ciudad,$estado,$telefono);

        echo '<script>location.replace("index.php?paga=InfoContacto&ins=Ok");</script>';
        
    } elseif ($action === 'update') {

    // INSERTAMOS LA MARCA EN LA BASE DE DATOS 

    $correo = "" . $_POST['Correo'] . "";
    $direccion = "" . $_POST['Direccion'] . "";
    $codigo = "" . $_POST['CodigoP'] . "";
    $ciudad = "" . $_POST['Ciudad'] . "";
    $estado = "" . $_POST['Estado'] . "";
    $telefono = "" . $_POST['Telefono'] . "";

        $contacto->updateContacto($IdC,$correo,$direccion,$codigo,$ciudad,$estado,$telefono);

        echo '<script>location.replace("index.php?page=InfoContacto&upd=Ok&IdC='. $IdC .'");</script>';
            
    } elseif ($action === 'delete') {
        $contacto->deleteContacto($IdC);
        echo '<script>location.replace("index.php?page=InfoContacto&del=Ok");</script>';
    }
}
