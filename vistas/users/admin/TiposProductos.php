<?php

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

<title>SSETCO | Tipos de Productos</title>

<div class="container shadow p-5 justify-content-center bg-dark-subtle mt-4">

    <!-- Titulo de la vista -->
    <h1 class="text-center">Tipos de productos</h1>
    <!-- Titulo de la vista -->

    <a href="index.php?page=EdicionTiposProductos" class="btn btn-success btn-sm mb-3 ms-5">
        Agregar un nuevo tipo de producto
    </a>

    <div class="row">
        <div class="col-md-12">
            <div class="container table-responsive justify-content-center p-0 border table-scroll" style="max-height:500px;max-width:900px;">
                <table class="table table-hover table-bordered overflow-auto table-responsive-sm m-0 break-word">
                    <thead class="table-dark sticky-top z-0">
                        <tr class="text-center">
                            <th scope="col">Tipo de producto</th>
                            <th scope="col" colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dttipoproducto as $rows) : ?>
                            <tr class="text-center">
                                <td><?php echo htmlspecialchars($rows['DescripcionTipoProducto']); ?></td>
                                <td>
                                    <a href="index.php?page=EdicionTiposProductos&IdTp=<?php echo $rows['IdTipoProducto']; ?>" class="btn btn-primary btn-sm">
                                        Editar
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?page=TiposProductos&actiontp=delete&IdTp=<?php echo $rows['IdTipoProducto']; ?>" onclick="return confirm('¿Estás seguro de eliminar este contacto?');" class="btn btn-danger btn-sm">
                                        Borrar
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>