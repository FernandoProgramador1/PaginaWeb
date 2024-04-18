<?php
session_start();
require_once("recursos/config/db.php");
require_once("vistas/template/navbar/navbar.php");
require_once("controladores/controller_login.php");

if ((!empty($_GET['page'])) || (isset($_GET['page']))) {
    $page = $_GET['page'];
} else {
    $page = "";
}

if (!empty($_GET['p']) && is_numeric($_GET['p'])) {
    $currentPage = intval($_GET['p']);
} else {
    $currentPage = 1;
}

switch ($page) {

        //------------------- ADMIN ----------------------

        //------------------- SERVICIOS ----------------------
    case "EdicionSistemas":
        include_once("vistas/users/admin/Sistemas/EdicionSistemas.php");
        break;
    case "SistemasAdmin":
        include_once("vistas/users/admin/Sistemas/Sistemas.php");
        break;
        //------------------- SERVICIOS ----------------------

        //------------------- SERVICIOS ----------------------
    case "EdicionServicios":
        include_once("vistas/users/admin/Servicios/EdicionServicios.php");
        break;
    case "ServiciosAdmin":
        include_once("vistas/users/admin/Servicios/Servicios.php");
        break;
        //------------------- SERVICIOS ----------------------

        //------------------- PUBLICACIONES ----------------------
    case "ImgCarrusel":
        include_once("vistas/users/admin/Publicaciones/ImgCarrusel.php");
        break;
    case "Publicidades":
        include_once("vistas/users/admin/Publicaciones/Publicidades.php");
        break;
    case "EdicionImgCarrusel":
        include_once("vistas/users/admin/Publicaciones/EdicionImgCarrusel.php");
        break;
    case "EdicionPublicidad":
        include_once("vistas/users/admin/Publicaciones/EdicionPublicidad.php");
        break;
        //------------------- PUBLICACIONES ----------------------

        //------------------- CONFIGURABLES ----------------------
    case "InfoContacto":
        include("vistas/users/admin/Configuraciones/EdicionFooter.php");
        break;
    case "NosotrosAdmin":
        include_once("vistas/users/admin/Configuraciones/NosotrosAdmin.php");
        break;
        //------------------- CONFIGURABLES ----------------------

        //------------------- PRODUCTOS ----------------------
    case "EdicionProductos":
        include_once("vistas/users/admin/Productos/EdicionProductos.php");
        break;
    case "ProductosAdmin":
        include_once("vistas/users/admin/Productos/Productos.php");
        break;
        //------------------- PRODUCTOS ----------------------

        //------------------- PREGUNTAS FRECUENTES ----------------------
    case "PreguntasFrecuentes":
        include_once("vistas/users/admin/PreguntasFrecuentes/PreguntasFrecuentes.php");
        break;
    case "PreguntasAdmin":
        include_once("vistas/users/admin/PreguntasFrecuentes/EdicionPreguntasFrecuentes.php");
        break;
        //------------------- PREGUNTAS FRECUENTES ----------------------

        //------------------- LOGIN ----------------------
    case "Login":
        include_once("vistas/template/login/login.php");
        break;
        //------------------- LOGIN ----------------------

        //------------------- ADMIN ----------------------

        /*------------------------------------------------------------------------------------------------------------------------------------*/

        //------------------- CLIENTE ----------------------

        //------------------- PRODUCTOS ----------------------
    case "Productos":
        include_once("vistas/users/client/Productos.php");
        break;
        //------------------- PRODUCTOS ----------------------

        //------------------- SISTEMAS ----------------------
    case "Sistemas":
        include_once("vistas/users/client/Sistemas.php");
        break;
    case "DetalleSistema":
        include_once("vistas/users/client/DetalleSistema.php");
        break;
        //------------------- SISTEMAS ----------------------

        //------------------- CONTACTO ----------------------
    case "Contacto":
        include_once("vistas/users/client/Contacto.php");
        break;
        //------------------- CONTACTO ----------------------

        //------------------- NOSOTROS ----------------------
    case "Nosotros":
        include_once("vistas/users/client/Nosotros.php");
        break;
        //------------------- NOSOTROS ----------------------

        //------------------- PREGUNTAS ----------------------
    case "PreguntasFrecuentes":
        include_once("vistas/users/client/PreguntasFrecuentes.php");
        break;
        //------------------- PREGUNTAS ----------------------

        //------------------- HOME ----------------------

    default:
        include_once('vistas/home/Home.php');
        break;
        //------------------- HOME ----------------------

        //------------------- CLIENTE ----------------------

}

require_once("vistas/template/footer/footer.php");
