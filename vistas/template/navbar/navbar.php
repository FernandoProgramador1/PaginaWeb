<?php
require_once('modelos/model_contactos.php');
require_once("modelos/model_mision.php");
require_once("modelos/model_vision.php");
require_once("modelos/model_valores.php");
require_once("modelos/model_quienessomos.php");
require_once("modelos/model_carrusel.php");
require_once("modelos/model_publicidad.php");
require_once("modelos/model_marcas.php");

// require_once('modelos/model_publicaciones.php');
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recursos/lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="recursos/CSS/login.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="recursos/CSS/productos.css" type="text/css">
    <link rel="stylesheet" href="recursos/CSS/nav.css" type="text/css">
    <link rel="stylesheet" href="recursos/CSS/home.css" type="text/css">
    <link rel="stylesheet" href="recursos/CSS/nosotros.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="recursos/css/footer.css">
    <link rel="stylesheet" type="text/css" href="recursos/css/contacto.css">
    <link rel="stylesheet" type="text/css" href="recursos/css/sistemas.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <nav class="navbar navbar-expand-custom navbar-mainbg">
        <a class="navbar-brand navbar-logo" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <div class="hori-selector">
                    <div class="left"></div>
                    <div class="right"></div>
                </div>
                <li class="nav-item <?php echo (!isset($_GET['page']) || $_GET['page'] == '' ? 'active' : ''); ?>">
                    <a class="nav-link" href="index.php?page="><i class="fa fa-home"></i>Inicio</a>
                </li>
                <li class="nav-item <?php if (isset($_GET['page']) && $_GET['page'] == 'Productos') echo 'active'; ?>">
                    <a class="nav-link" href="index.php?page=Productos"><i class="fa fa-tag"></i>Productos</a>
                </li>
                <li class="nav-item <?php if (isset($_GET['page']) && $_GET['page'] == 'Contacto') echo 'active'; ?>">
                    <a class="nav-link" href="index.php?page=Contacto"><i class="fa fa-envelope"></i>Contacto</a>
                </li>
                <li class="nav-item <?php if (isset($_GET['page']) && $_GET['page'] == 'Nosotros') echo 'active'; ?>">
                    <a class="nav-link" href="index.php?page=Nosotros"><i class="fa fa-users"></i>Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="fa fa-cogs"></i>Servicios</a>
                </li>
                <li class="nav-item <?php if (isset($_GET['page']) && $_GET['page'] == 'Sistemas') echo 'active'; ?>">
                    <a class="nav-link" href="index.php?page=Sistemas"><i class="fa fa-desktop"></i>Sistemas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);"><i class="fas fa-question-circle"></i>Preguntas Frecuentes</a>
                </li>
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) : ?>
                    <!-- Boton para el menu de admin -->
                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDark" aria-controls="offcanvasDark">Menu Admin</button>
                    <!-- Fin del boton para el menu de admin -->
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <!-- Menu de admin -->
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDark" aria-labelledby="offcanvasDarkLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkLabel">Menu para administrar la pagina</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvasDark" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav me-auto">
                <?php
                if ((!empty($dtcontactos)) && (isset($dtcontactos))) {
                    $cc = 0;
                    foreach ($dtcontactos as $contac) :
                        if ($cc == 0) {
                            if ((!empty($contac['IdContacto'])) && (isset($contac['IdContacto']))) {
                                echo '<li class="nav-item"><a class="nav-link" href="index.php?page=InfoContacto&IdC=' . $contac["IdContacto"] . '">Información de contacto</a></li>';
                            } else {
                                echo '<li class="nav-item"><a class="nav-link" href="index.php?page=InfoContacto">Información de contacto</a></li>';
                            }
                        }
                        $cc++;
                    endforeach;
                } else {
                    echo '<li class="nav-item"><a class="nav-link" href="index.php?page=InfoContacto">Información de contacto</a></li>';
                }
                ?>
                <?php
                if ((!empty($dtmision)) && (isset($dtmision))) {
                    $cc = 0;
                    foreach ($dtmision as $mis) :
                        if ($cc == 0) {
                ?>
                            <li class="nav-item"><a class="nav-link" href="index.php?page=EdicionMision&IdMi=<?php echo $mis["IdMision"] ?>">Edicion de Mision</a></li>
                <?php
                        }
                        $cc++;
                    endforeach;
                } else {
                    echo '<li class="nav-item"><a class="nav-link" href="index.php?page=EdicionMision">Edicion de Mision</a></li>';
                }
                ?>
                <?php
                if ((!empty($dtvision)) && (isset($dtvision))) {
                    $cc = 0;
                    foreach ($dtvision as $vis) :
                        if ($cc == 0) {
                ?>
                            <li class="nav-item"><a class="nav-link" href="index.php?page=EdicionVision&IdVi=<?php echo $vis["IdVision"] ?>">Edicion de Vision</a></li>
                <?php
                        }
                        $cc++;
                    endforeach;
                } else {
                    echo '<li class="nav-item"><a class="nav-link" href="index.php?page=EdicionVision">Edicion de Vision</a></li>';
                }
                ?>

                <?php
                if ((!empty($dtvalores)) && (isset($dtvalores))) {
                    $cc = 0;
                    foreach ($dtvalores as $val) :
                        if ($cc == 0) {
                ?>
                            <li class="nav-item"><a class="nav-link" href="index.php?page=EdicionValores&IdVa=<?php echo $val["IdValores"] ?>">Edicion de Valores</a></li>
                <?php
                        }
                        $cc++;
                    endforeach;
                } else {
                    echo '<li class="nav-item"><a class="nav-link" href="index.php?page=EdicionValores">Edicion de Valores</a></li>';
                }
                ?>

                <?php
                if ((!empty($dtqsomos)) && (isset($dtqsomos))) {
                    $cc = 0;
                    foreach ($dtqsomos as $qs) :
                        if ($cc == 0) {
                ?>
                            <li class="nav-item"><a class="nav-link" href="index.php?page=EdicionQuienesSomos&IdQ=<?php echo $qs["IdQuienes"] ?>">Edicion de ¿Quienes Somos?</a></li>
                <?php
                        }
                        $cc++;
                    endforeach;
                } else {
                    echo '<li class="nav-item"><a class="nav-link" href="index.php?page=EdicionQuienesSomos">Edicion de ¿Quienes Somos?</a></li>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=ImgCarrusel">Edicion Imagenes del carrusel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=Publicidades">Edicion Imagenes de publicidad</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=ProductosAdmin">Edicion de Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=MarcasAdmin">Edicion de Marcas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=TiposProductos">Edicion de tipos de productos</a>
                </li>
                <?php
                if ($_SESSION != null) {
                    if ($_SESSION['loggedin'] == true) {
                        echo '<li class="nav-item mt-5"><a class="nav-link" href="cerrar.php">Cerrar Sesión</a></li>';
                    }
                }
                ?>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="#">CONTACTO</a> -->
                </li>
            </ul>
        </div>
    </div>
    <!-- Menu de admin -->


</body>

</html>