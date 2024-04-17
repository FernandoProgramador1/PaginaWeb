<?php

require_once("recursos/config/db.php");
require_once("controladores/controller_configuraciones.php");

$config = new Configuraciones();
$config->setTable("Configuraciones");
$config->setView('');

$config->setKey('CampoKey');

$config->setColumns('Descripcion');

$Contacto = array('Direccion', 'CodigoPostal', 'Ciudad','Estado','Telefono', 'Correo');
$Nosotros = array('Mision','Vision','Valores','Somos');
if ((!empty($_GET['CampoKey'])) && (isset($_GET['CampoKey']))) {
    $CampoKey = $_GET['CampoKey'];
    $dtcontactowhere = $config->getWhere($CampoKey);
} else {
    $CampoKey = null;
    $dtcontactowhere = null;
}
$dtcontactos = $config->getAll();

// DEFINE LA ACCION A REALIZAR: INSERT, UPDATE Y DELETE
if ((!empty($_GET['actioncon'])) && (isset($_GET['actioncon']))) {
    $actioncon = $_GET['actioncon'];

    $Values = array();

    if($actioncon === 'contacto'){

        $Values[] = "" . $_POST['Direccion'] . "";
        $Values[] = "" . $_POST['CodigoPostal'] . "";
        $Values[] = "" . $_POST['Ciudad'] . "";
        $Values[] = "" . $_POST['Estado'] . "";
        $Values[] = "" . $_POST['Telefono'] . "";
        $Values[] = "" . $_POST['Correo'] . "";

        for($i=0;$i < count($Contacto); $i++){
            $exist = $config->getWhere($Contacto[$i]);
            if($Contacto[$i] === $exist[0]["CampoKey"]){
                $val = $config->column[0] ."='". $Values[$i] ."'";
                $config->updateConfiguracion($Contacto[$i], $val);
            }else{
                $config->values[] = "'" . $Contacto[$i] . "'";
                $config->values[] = "'" . $Values[$i] . "'";
                $config->insertConfiguracion();
                $config->values = array();
            }
            $exist = array();
        }
        echo '<script>location.replace("index.php?page=InfoContacto");</script>';
    }else if($actioncon === 'nosotros'){

        $Values[] = "" . $_POST['Mision'] . "";
        $Values[] = "" . $_POST['Vision'] . "";
        $Values[] = "" . $_POST['Valores'] . "";
        $Values[] = "" . $_POST['Somos'] . "";

        for($i=0;$i < count($Nosotros); $i++){
            $exist = $config->getWhere($Nosotros[$i]);
            if($Nosotros[$i] === $exist[0]["CampoKey"]){
                $val = $config->column[0] ."='". $Values[$i] ."'";
                $config->updateConfiguracion($Nosotros[$i], $val);
            }else{
                $config->values[] = "'" . $Nosotros[$i] . "'";
                $config->values[] = "'" . $Values[$i] . "'";
                $config->insertConfiguracion();
                $config->values = array();
            }
            $exist = array();
        }

        echo '<script>location.replace("index.php?page=NosotrosAdmin");</script>';
    }
}
