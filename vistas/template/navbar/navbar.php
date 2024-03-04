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
    <link rel="stylesheet" href="recursos/CSS/productos.css" type="text/css">
    <link rel="stylesheet" href="recursos/CSS/nav.css" type="text/css">
    <link rel="stylesheet" href="recursos/CSS/home.css" type="text/css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="recursos/css/footer.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="recursos/img/LOGO-SSETCO.jpeg" alt="Logo" style="max-height:100px !important; max-width:150px !important;" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?page=">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="#">MI CUENTA</a> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="index.php?page=Productos" id="navbarDropdown" role="button" aria-expanded="false">
                            PRODUCTOS
                        </a>
                        <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Producto 1</a></li>
                            <li><a class="dropdown-item" href="#">Producto 2</a></li>
                        </ul> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=Nosotros">NOSOTROS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Contacto">CONTACTO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="recursos/Archivos/Catalogo Equipo de Seguridad 2023.pdf" download>CATALOGO</a>
                    </li>

                </ul>
                <!-- <form class="d-flex me-2">
                    <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Buscar">
                    <button class="btn btn-outline-light" type="submit">Buscar</button>
                </form> -->

                <?php
                if ($_SESSION != null) {
                    if ($_SESSION['loggedin'] == true) {
                ?>

                        <!-- Boton para el menu de admin -->
                        <butt!on class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDark" aria-controls="offcanvasDark">Menu Admin</button>
                            <!-- Boton para el menu de admin -->
                    <?php
                    }
                }
                    ?>
            </div>
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