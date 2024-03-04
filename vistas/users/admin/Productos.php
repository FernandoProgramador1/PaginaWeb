<?php
require_once("modelos/model_productos.php");
require_once("modelos/model_marcas.php");
require_once("modelos/model_tipoproducto.php");

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
<title>SSETCO | Agregar productos</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<div class="container shadow p-5 justify-content-center bg-dark-subtle mt-4">

    <!-- Titulo de la vista -->
    <h1 class="text-center">Productos</h1>
    <!-- Titulo de la vista -->
    <!-- Boton del navbar lateral -->
    <a class="btn btn-primary btn-lg d-relative m-4" href="index.php?page=EdicionProductos">
        Agregar producto
    </a>
    <!-- Boton del navbar lateral -->

    <div class="container mt-3 p-3 bg-white overflow-auto table-scroll rounded" style="max-height:600px;">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            foreach ($dtproducto as $rows) :
            ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="data:<?php echo $rows['MimeType'] ?>;base64,<?php echo (base64_encode($rows['Archivo'])) ?>" alt="" class="card-img-top" />
                        <div class="card-body overflow-auto shadow">
                            <h6><?php echo $rows['NombreProducto'] ?></h6>
                            <p class="mt-2"><?php echo $rows['DetallesProducto'] ?></p>
                            <p class="">Precio: <?php echo $rows['CantidadMedida'] ?></p>
                            <?php
                            foreach ($dtmarca as $marc) :
                                if ($marc["IdMarca"] === $rows["IdMarca"]) {
                            ?>
                                    <p class="">Marca:<span class="text-muted"><?php echo $marc['Nombre'] ?></span></p>
                            <?php
                                }
                            endforeach;
                            ?>
                            <?php
                            foreach ($dttipoproducto as $tp) :
                                if ($tp["IdTipoProducto"] === $rows["IdTipoProducto"]) {
                            ?>
                                    <p class="">Tipo de producto: <span class="text-muted"><?php echo $tp['DescripcionTipoProducto'] ?></span></p>
                            <?php
                                }
                            endforeach;
                            ?>
                            <div class="d-inline-flex">
                                <a href="index.php?page=EdicionProductos&IdProd=<?php echo $rows['IdProducto'] ?>" class="btn btn-success btn-sm">
                                    Actualizar
                                </a>
                            </div>
                            <div class="d-inline-flex">
                                <a href="index.php?page=ProductosAdmin&IdProd=<?php echo $rows['IdProducto'] ?>&actionprod=delete" class="btn btn-danger btn-sm">
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