<?php
require_once("modelos/model_productos.php");
require_once("modelos/model_marcas.php");
require_once("modelos/model_tipoproducto.php");
?>

<title>SSETCO | Edición de Productos</title>

<div class="container p-5 justify-content-center bg-dark-subtle mt-4">

    <!-- Titulo de la vista -->
    <h1 class="text-center">Edicion de productos</h1>
    <!-- Titulo de la vista -->

    <?php
    if ((!empty($dtproductowhere)) && (isset($dtproductowhere))) {
    ?>
        <form method="post" action="index.php?page=EdicionProductos&actionprod=update&IdProd=<?php echo $IdProd ?>" enctype="multipart/form-data">
        <?php
    } else {
        ?>
            <form method="post" action="index.php?page=EdicionProductos&actionprod=insert" enctype="multipart/form-data">
                <?php
            }

            if (isset($dtproductowhere)) {
                foreach ($dtproductowhere as $rows) :
                ?>
                    <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                        <div class="form form-group m-3">
                            <input id="Archivo" name="Archivo" class="form-control form-control-lg" type="file" placeholder="Inserte una imagen de producto" onchange="myimg()" />
                        </div>
                        <div class="form-floating m-3">
                            <input id="NombreProducto" name="NombreProducto" class="form-control" value="<?php echo $rows['NombreProducto'] ?>" type="text" placeholder="NombreProducto del producto" required />
                            <label for="NombreProducto">Nombre del producto</label>
                        </div>
                        <div class="form-floating m-3">
                            <input id="DetallesProducto" name="DetallesProducto" class="form-control" value="<?php echo $rows['DetallesProducto'] ?>" type="text" placeholder="DetallesProducto del producto" required />
                            <label for="DetallesProducto">Detalles del producto</label>
                        </div>
                        <div class="form-floating m-3">
                            <input id="CantidadMedida" name="CantidadMedida" class="form-control" value="<?php echo $rows['CantidadMedida'] ?>" type="text" placeholder="CantidadMedida del producto" required />
                            <label for="CantidadMedida">Precio del producto</label>
                        </div>
                        <div class="form-floating m-3">
                            <select id="IdMarca" name="IdMarca" class="form-select" value="<?php echo $rows['IdMarca'] ?>" type="text" placeholder="Marca del producto" required>
                                <option selected disabled hidden>Seleccione una marca</option>
                                <?php
                                if (isset($dtmarca)) {
                                    foreach ($dtmarca as $rowmarca) :
                                ?>
                                        <option value="<?php echo $rowmarca['IdMarca'] ?>"><?php echo $rowmarca['Nombre'] ?></option>
                                <?php
                                    endforeach;
                                }
                                ?>
                            </select>
                            <label for="IdMarca">Marca del producto</label>
                        </div>
                        <div class="form-floating m-3">
                            <select id="IdTipoProducto" name="IdTipoProducto" class="form-select" value="<?php echo $rows['IdTipoProducto'] ?>" type="text" placeholder="Tipo de herramienta" required>
                                <option selected disabled hidden>Seleccione un tipo de producto</option>
                                <?php
                                if (isset($dttipoproducto)) {
                                    foreach ($dttipoproducto as $rowher) :
                                ?>
                                        <option value="<?php echo $rowher['IdTipoProducto'] ?>"><?php echo $rowher['DescripcionTipoProducto'] ?></option>
                                <?php
                                    endforeach;
                                }
                                ?>
                            </select>
                            <label for="IdTipoProducto">Tipo de producto</label>
                        </div>
                    </div>
                    <div class="card border-0 justify-content-center m-5 rounded-1 ms-1 me-4 bg-white">
                        <div class=" img-thumbnail rounded ms-auto me-auto mt-auto mb-auto">
                            <img id="muestra" src="" alt="Aqui se muestra la imagen seleccionada" style="max-width:400px;max-height:300px;" />
                        </div>
                    </div>
                    <div class="container ms-auto me-auto mt-4">
                        <button type="submit" class="btn btn-success btn-lg">Enviar</button>
                    </div>
                <?php
                endforeach;
            } else {
                ?>
                <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                    <div class="form form-group m-3">
                        <input id="Archivo" name="Archivo" class="form-control form-control-lg" type="file" placeholder="Inserte una imagen de producto" onchange="myimg()" required />
                    </div>
                    <div class="form-floating m-3">
                        <input id="NombreProducto" name="NombreProducto" class="form-control" type="text" placeholder="NombreProducto del producto" required />
                        <label for="NombreProducto">Nombre del producto</label>
                    </div>
                    <div class="form-floating m-3">
                        <input id="DetallesProducto" name="DetallesProducto" class="form-control" type="text" placeholder="DetallesProducto del producto" required />
                        <label for="DetallesProducto">Detalles del producto</label>
                    </div>
                    <div class="form-floating m-3">
                        <input id="CantidadMedida" name="CantidadMedida" class="form-control" type="text" placeholder="CantidadMedida del producto" />
                        <label for="CantidadMedida">Precio del producto</label>
                    </div>
                    <div class="form-floating m-3">
                        <select id="IdMarca" name="IdMarca" class="form-select" type="text" placeholder="Marca del producto" required>
                            <option selected disabled hidden>Seleccione una marca</option>
                            <?php
                            if (isset($dtmarca)) {
                                foreach ($dtmarca as $rowmarca) :
                            ?>
                                    <option value="<?php echo $rowmarca['IdMarca'] ?>"><?php echo $rowmarca['Nombre'] ?></option>
                            <?php
                                endforeach;
                            }
                            ?>
                        </select>
                        <label for="IdMarca">Marca del producto</label>
                    </div>
                    <div class="form-floating m-3">
                        <select id="IdTipoProducto" name="IdTipoProducto" class="form-select" type="text" placeholder="Tipo de herramienta" required>
                            <option selected disabled hidden>Seleccione un tipo de producto</option>
                            <?php
                            if (isset($dttipoproducto)) {
                                foreach ($dttipoproducto as $rowher) :
                            ?>
                                    <option value="<?php echo $rowher['IdTipoProducto'] ?>"><?php echo $rowher['DescripcionTipoProducto'] ?></option>
                            <?php
                                endforeach;
                            }
                            ?>
                        </select>
                        <label for="IdMarca">Tipo de producto</label>
                    </div>
                </div>
                <div class="card border-0 justify-content-center m-5 rounded-1 ms-1 me-4 bg-white">
                    <div class=" img-thumbnail rounded ms-auto me-auto mt-auto mb-auto">
                        <img id="muestra" src="" alt="Aqui se muestra la imagen seleccionada" style="max-width:400px;max-height:300px;" />
                    </div>
                </div>
                <div class="container ms-auto me-auto mt-4">
                    <button type="submit" class="btn btn-success btn-lg">Enviar</button>
                </div>
            <?php
            }
            ?>
</div>