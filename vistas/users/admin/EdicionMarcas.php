<?php
require_once("modelos/model_marcas.php");
?>

<title>SSETCO | Editar Marcas</title>

<div class="container p-5 justify-content-center bg-dark-subtle mt-4">

    <!-- Titulo de la vista -->
    <h1 class="text-center">Edicion de marcas</h1>
    <!-- Titulo de la vista -->

    <?php
    if ((!empty($dtmarcawhere)) && (isset($dtmarcawhere))) {
    ?>
        <form method="post" action="index.php?page=EdicionMarcas&actionmarc=update&IdM=<?php echo $IdM ?>" enctype="multipart/form-data">
        <?php
    } else {
        ?>
            <form method="post" action="index.php?page=EdicionMarcas&actionmarc=insert" enctype="multipart/form-data">
                <?php
            }

            if (isset($dtmarcawhere)) {
                foreach ($dtmarcawhere as $rows) :
                ?>
                    <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                        <!-- <h3 class="text-center"></h3> -->
                        <div class="form form-group m-3">
                            <input id="Archivo" name="Archivo" class="form-control form-control-lg" type="file" placeholder="Inserte el logo una marca" onchange="myimg()" />
                        </div>
                        <div class="form-floating m-3">
                            <input id="Nombre" name="Nombre" class="form-control" value="<?php echo $rows['Nombre'] ?>" type="text" placeholder="Nombre de la marca" required />
                            <label for="Nombre">Nombre de la marca</label>
                        </div>
                    </div>
                    <div class="card border-0 justify-content-center m-5 rounded-1 ms-1 me-4 bg-white">
                        <div class=" img-thumbnail rounded ms-auto me-auto mt-auto mb-auto">
                            <img id="muestra" src="" alt="Aqui se muestra la imagen seleccionada" style="max-width:400px;max-height:300px;" />
                        </div>
                    </div>
                    <div class="container ms-auto me-auto mt-4">
                        <button type="submit" class="btn btn-success btn-lg">Enviar Marca/button>
                    </div>
                <?php
                endforeach;
            } else {
                ?>
                <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                    <!-- <h3 class="text-center"></h3> -->
                    <div class="form form-group m-3">
                        <input id="Archivo" name="Archivo" class="form-control form-control-lg" type="file" placeholder="Inserte el logo una marca" onchange="myimg()" required />
                    </div>
                    <div class="form-floating m-3">
                        <input id="Nombre" name="Nombre" class="form-control" type="text" placeholder="Nombre de la marca" required />
                        <label for="Nombre">Nombre de la marca</label>
                    </div>
                </div>
                <div class="card border-0 justify-content-center m-5 rounded-1 ms-1 me-4 bg-white">
                    <div class=" img-thumbnail rounded ms-auto me-auto mt-auto mb-auto">
                        <img id="muestra" src="" alt="Aqui se muestra la imagen seleccionada" style="max-width:400px;max-height:300px;" />
                    </div>
                </div>

                <div class="container ms-auto me-auto mt-4">
                    <button type="submit" class="btn btn-success btn-lg">Enviar Marca</button>
                </div>
            <?php
            }
            ?>
            </form>
        </form>
</div>