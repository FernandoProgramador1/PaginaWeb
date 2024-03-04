<?php

require_once("modelos/model_marcas.php");

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

<title>SSETCO | Marcas</title>

<!-- Navbar lateral start-->

<!-- <div class="offcanvas offcanvas-start text-bg-white" id="demo">
    <div class="offcanvas-header">
        <h1 class="offcanvas-title">Filtros</h1>
        <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <span class="text-muted fs-6 mb-4">De clic en Marcas para ver los filtros</span>
        <form method="post" action="index.php?page=Publicaciones">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link" href="" type="button" data-bs-toggle="collapse" data-bs-target="#seccion" aria-expanded="false" aria-controls="seccion">
                        Marcas
                    </a>
                    <div class="collapse mb-4" id="seccion">
                        <select name="Seccion" class="form-select form-select-sm">
                            <option selected disabled hidden>Seleccione una Marca</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-sm">Filtrar</button>
                </li>
            </ul>
        </form>
    </div>
</div> -->

<!-- Navbar lateral end-->

<div class="container shadow p-5 justify-content-center bg-dark-subtle mt-4">

    <!-- Titulo de la vista -->
    <h1 class="text-center">Marcas</h1>
    <!-- Titulo de la vista -->
    <!-- Boton del navbar lateral -->
    <!-- <button class="btn btn-primary btn-lg d-relative m-4" tabindex="-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
        Filtrar productos
    </button> -->
    <!-- Boton del navbar lateral -->

    <a href="index.php?page=EdicionMarcas" class="btn btn-success btn-lg ms-5">
        Agregar una nueva marca
    </a>

    <div class="container mt-3 p-3 bg-white overflow-auto table-scroll rounded" style="max-height:600px;">
        <div class="row row-cols-1 row-cols-md-5 g-4">
            <?php
            foreach ($dtmarca as $rows) :
            ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="data:<?php echo $rows['MimeType'] ?>;base64,<?php echo (base64_encode($rows['Archivo'])) ?>" alt="" class="card-img-top" />
                        <div class="card-body overflow-auto shadow">
                            <h5 class="card-title"><?php echo $rows['Nombre'] ?></h5>
                            <div class="d-inline-flex">
                                <a href="index.php?page=EdicionMarcas&IdM=<?php echo $rows['IdMarca'] ?>" class="btn btn-success btn-sm">
                                    Actualizar
                                </a>
                            </div>
                            <div class="d-inline-flex">
                                <a href="index.php?page=MarcasAdmin&IdM=<?php echo $rows['IdMarca'] ?>&actionmarc=delete" class="btn btn-danger btn-sm">
                                    Eliminar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</div>