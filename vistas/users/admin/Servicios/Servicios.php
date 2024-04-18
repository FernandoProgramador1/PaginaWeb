<?php

require_once("modelos/model_servicios.php");

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

<title>SSETCO | Servicios</title>

<!-- Navbar lateral end-->

<div class="container shadow p-5 justify-content-center bg-dark-subtle mt-4">

    <!-- Titulo de la vista -->
    <h1 class="text-center">Servicios</h1>
    <!-- Titulo de la vista -->

    <a href="index.php?page=EdicionServicios" class="btn btn-success btn-lg ms-5">
        Agregar una nueva servicio
    </a>

    <div class="container mt-3 p-3 bg-white overflow-auto table-scroll rounded" style="max-height:600px;">
        <div class="row row-cols-1 row-cols-md-5 g-4">
            <?php
            foreach ($dtservview as $rows) :
            ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="data:<?php echo $rows['Tipo'] ?>;base64,<?php echo (base64_encode($rows['Archivo'])) ?>" alt="<?php echo $rows['Descripcion'] ?>" class="card-img-top" />
                        <div class="card-body overflow-auto shadow">
                            <h5 class="card-title"><?php echo $rows['NombreServicio'] ?></h5>
                            <div class="d-inline-flex">
                                <a href="index.php?page=EdicionServicios&IdServicio=<?php echo $rows['IdServicio'] ?>" class="btn btn-success btn-sm">
                                    Actualizar
                                </a>
                            </div>
                            <div class="d-inline-flex">
                                <a href="index.php?page=ServiciosAdmin&IdServicio=<?php echo $rows['IdServicio'] ?>&actionserv=delete" class="btn btn-danger btn-sm">
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