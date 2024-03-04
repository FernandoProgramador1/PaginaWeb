<!-- Navbar lateral start-->

<?php
require_once("modelos/model_publicidad.php");
?>

<title>SSETCO | Agregar Imágen de Publicidad</title>

<div class="container p-5 justify-content-center bg-dark-subtle">

    <?php
    if ((!empty($dtpublicidadwhere)) && (isset($dtpublicidadwhere))) {
    ?>
        <form method="post" action="index.php?page=EdicionPublicidad&actioncpubli=update&IdPub=<?php echo $IdPub ?>" enctype="multipart/form-data">
        <?php
    } else {
        ?>
            <form method="post" action="index.php?page=EdicionPublicidad&actioncpubli=insert" enctype="multipart/form-data">
                <?php
            }

            if (isset($dtpublicidadwhere)) {
                foreach ($dtpublicidadwhere as $rows) :
                ?>
                    <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                        <h3 class="text-center">Imagen de publicidad</h3>
                        <div class="form form-group m-3">
                            <input id="Archivo" name="Archivo" class="form-control form-control-lg" type="file" placeholder="Imagen para publicidad" onchange="myimg()" required />
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
                // }

                endforeach;
            } else if (!isset($dtpublicidadwhere)) {
                ?>
                <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                    <h3 class="text-center">Imagen de publicidad</h3>
                    <div class="form form-group m-3">
                        <input id="Archivo" name="Archivo" class="form-control form-control-lg" type="file" placeholder="Imagen para publicidad" onchange="myimg()" required />
                    </div>
                </div>
                <div class="card border-0 justify-content-center m-5 rounded-1 ms-auto me-4 bg-white">
                    <div class=" img-thumbnail rounded ms-auto me-auto mt-auto mb-auto">
                        <img id="muestra" src="" alt="Aqui se muestra la imagen seleccionada" style="max-width:400px;max-height:300px;" />
                    </div>
                </div>

                <div class="container ms-auto me-auto mt-4">
                    <button type="submit" class="btn btn-success btn-lg">Enviar</button>
                </div>
            <?php
                // }
            }
            ?>
            </form>
</div>