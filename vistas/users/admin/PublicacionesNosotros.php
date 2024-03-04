<?php
require_once("modelos/model_archivos.php");
require_once("modelos/model_publicaciones.php");

if (isset($_GET['ins'])) {
    if ($_GET['ins'] == "Ok") {
        echo '<script>alert("Se inserto correctamente");</script>';
    }
} elseif (isset($_GET['upd'])) {
    if ($_GET['upd'] == "Ok") {
        echo '<script>alert("Se actualizo correctamente");</script>';
    }
} elseif (isset($_GET['del'])) {
    if ($_GET['del'] == "Ok") {
        echo '<script>alert("Se elimino correctamente");</script>';
    }
}

?>

<title>SSP - Editar Contenido "Sobre Nosotros"</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<div class="container shadow p-5 justify-content-center bg-dark-subtle">

    <!-- Titulo de la vista -->
    <h1 class="text-center">Contenido en "Nosotros"</h1>
    <!-- Titulo de la vista -->
    <!-- Boton del navbar lateral -->
    <?php

    if ($publicacion->getViewCount("Mision") == '1') {
        echo '<a class="btn btn-primary btn-lg d-relative m-4" href="index.php?page=EdicionMision">
            Agregar Misión
            </a>';
    }

    if ($publicacion->getViewCount("Vision") == '1') {
        echo '<a class="btn btn-primary btn-lg d-relative m-4" href="index.php?page=EdicionVision">
            Agregar Vision
            </a>';
    }

    if ($publicacion->getViewCount("Valores") == '1') {
        echo '<a class="btn btn-primary btn-lg d-relative m-4" href="index.php?page=EdicionValores">
            Agregar Valores
            </a>';
    }

    if ($publicacion->getViewCount("QuienesSomos") == '1') {
        echo '<a class="btn btn-primary btn-lg d-relative m-4" href="index.php?page=EdicionQuienesSomos">
            Agregar ¿Quiénes Somos?
            </a>';
    }

    ?>
    <!-- Boton del navbar lateral -->

    <div class="container mt-3 p-3 bg-white overflow-auto table-scroll rounded" style="max-height:600px;">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            foreach ($dtpub as $rows) :
                if ($rows["Seccion"] === "Mision" || $rows["Seccion"] === "Vision" || $rows["Seccion"] === "Valores" || $rows["Seccion"] === "QuienesSomos") {
            ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="data:<?php echo $rows['MimeType'] ?>;base64,<?php echo (base64_encode($rows['Archivo'])) ?>" alt="" class="card-img-top" />
                            <div class="card-body overflow-auto shadow">
                                <h5 class="card-title">
                                    <?php 
                                    if ($rows["Seccion"] === "Mision") {
                                        echo $rows['Seccion'];
                                    } elseif ($rows["Seccion"] === "Vision") {
                                        echo $rows['Seccion'];
                                    } elseif ($rows["Seccion"] === "Valores") {
                                        echo $rows['Seccion'];
                                    } elseif ($rows["Seccion"] === "QuienesSomos") {
                                        echo $rows['Seccion'];
                                    }
                                    ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $rows['Principal'] ?><br />
                                    <?php echo $rows['Secundario'] ?>
                                </p>
                                <div class="d-inline-flex">
                                    <?php
                                    if ($rows["Seccion"] === "Mision") {
                                    ?>
                                        <a href="index.php?page=EdicionMision&Id=<?php echo $rows['IdPublic'] ?>&form=<?php echo $Seccion ?>" class="btn btn-success btn-sm">
                                            Actualizar
                                        </a>
                                    <?php } elseif ($rows["Seccion"] === "Vision") { ?>
                                        <a href="index.php?page=EdicionVision&Id=<?php echo $rows['IdPublic'] ?>&form=<?php echo $Seccion ?>" class="btn btn-success btn-sm">
                                            Actualizar
                                        </a>
                                    <?php } elseif ($rows["Seccion"] === "Valores") { ?>
                                        <a href="index.php?page=EdicionValores&Id=<?php echo $rows['IdPublic'] ?>&form=<?php echo $Seccion ?>" class="btn btn-success btn-sm">
                                            Actualizar
                                        </a>
                                    <?php } elseif ($rows["Seccion"] === "QuienesSomos") {?>
                                        <a href="index.php?page=EdicionQuienesSomos&Id=<?php echo $rows['IdPublic'] ?>&form=<?php echo $Seccion ?>" class="btn btn-success btn-sm">
                                            Actualizar
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="d-inline-flex">
                                    <a href="index.php?page=PublicacionesNosotros&Id=<?php echo $rows['IdPublic'] ?>&actionpub=delete&Seccion=<?php echo $Seccion ?>" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            endforeach;
            ?>
        </div>
    </div>
</div>