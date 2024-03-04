<?php
require_once("modelos/model_tipoproducto.php");
?>

<title>SSETCO | Editar Productos</title>

<div class="container p-5 justify-content-center bg-dark-subtle mt-4">

    <!-- Titulo de la vista -->
    <h1 class="text-center">Edicion de tipos de productos</h1>
    <!-- Titulo de la vista -->

    <?php
    if ((!empty($dttipoproductowhere)) && (isset($dttipoproductowhere))) {
    ?>
        <form method="post" action="index.php?page=EdicionTiposProductos&actiontp=update&IdTp=<?php echo $IdFp ?>" enctype="multipart/form-data">
        <?php
    } else {
        ?>
            <form method="post" action="index.php?page=EdicionTiposProductos&actiontp=insert" enctype="multipart/form-data">
                <?php
            }

            if (isset($dttipoproductowhere)) {
                foreach ($dttipoproductowhere as $rows) :
                ?>
                    <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                        <!-- <h3 class="text-center"></h3> -->
                        <div class="form-floating m-3">
                            <input id="DescripcionTipoProducto" name="DescripcionTipoProducto" class="form-control" value="<?php echo $rows['DescripcionTipoProducto'] ?>" type="text" placeholder="Nombre del tipo de filtro" required />
                            <label for="DescripcionTipoProducto">Nombre del tipo de producto</label>
                        </div>
                    </div>
                    <div class="container ms-auto me-auto mt-4">
                        <button type="submit" class="btn btn-success btn-lg">Enviar tipo de producto</button>
                    </div>
                <?php
                endforeach;
            } else {
                ?>
                <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                    <!-- <h3 class="text-center"></h3> -->
                    <div class="form-floating m-3">
                        <input id="DescripcionTipoProducto" name="DescripcionTipoProducto" class="form-control" type="text" placeholder="Nombre del tipo de filtro" required />
                        <label for="DescripcionTipoProducto">Nombre del tipo de producto</label>
                    </div>
                </div>
                <div class="container ms-auto me-auto mt-4">
                    <button type="submit" class="btn btn-success btn-lg">Enviar tipo de producto</button>
                </div>
            <?php
            }
            ?>
</div>