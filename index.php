<?php
session_start();
require_once("recursos/config/db.php");
require_once("vistas/template/navbar/navbar.php");
require_once("controladores/controller_login.php");

if ((!empty($_GET['page']))  ||  (isset($_GET['page']))) {
    $page = $_GET['page'];
} else {
    $page = "";
}

if (!empty($_GET['p']) && is_numeric($_GET['p'])) {
    $currentPage = intval($_GET['p']);
} else {
    $currentPage = 1; // Página predeterminada
}

switch ($page) {
    case "EdicionTiposProductos":
        include_once("vistas/users/admin/EdicionTiposProductos.php");
        break;
    case "TiposProductos":
        include_once("vistas/users/admin/TiposProductos.php");
        break;
    case "EdicionMarcas":
        include_once("vistas/users/admin/EdicionMarcas.php");
        break;
    case "MarcasAdmin":
        include_once("vistas/users/admin/Marcas.php");
        break;
    case "ImgCarrusel":
        include_once("vistas/users/admin/ImgCarrusel.php");
        break;
    case "Publicidades":
        include_once("vistas/users/admin/Publicidades.php");
        break;
    case "Nosotros":
        include_once("vistas/users/client/Nosotros.php");
        break;
    case "EdicionMision":
        include_once("vistas/users/admin/EdicionMision.php");
        break;
    case "EdicionVision":
        include_once("vistas/users/admin/EdicionVision.php");
        break;
    case "EdicionValores":
        include_once("vistas/users/admin/EdicionValores.php");
        break;
    case "EdicionQuienesSomos":
        include_once("vistas/users/admin/EdicionQuienesSomos.php");
        break;
    case "EdicionImgCarrusel":
        include_once("vistas/users/admin/EdicionImgCarrusel.php");
        break;
    case "EdicionPublicidad":
        include_once("vistas/users/admin/EdicionPublicidad.php");
        break;
    case "EdicionProductos":
        include_once("vistas/users/admin/EdicionProductos.php");
        break;
    case "ProductosAdmin":
        include_once("vistas/users/admin/Productos.php");
        break;
    case "InfoContacto":
        include("vistas/users/admin/EdicionFooter.php");
        break;
    case "Productos":
        include_once("vistas/users/client/Productos.php");
        break;
    case "Login":
        include_once("vistas/template/login/login.php");
        break;
    case "Contacto":
        include_once("vistas/users/client/Contacto.php");
        break;
    case "Sistemas":
        include_once("vistas/users/client/Sistemas.php");
        break;
    default:
        include_once('vistas/home/Home.php');
        break;
}

require_once("vistas/template/footer/footer.php");
