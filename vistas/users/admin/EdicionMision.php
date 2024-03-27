<!-- Navbar lateral start-->

<?php
require_once("modelos/model_mision.php");

?>
<title>Editar Misión</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<div class="container p-5 justify-content-center bg-dark-subtle">

    <?php
    if ((!empty($dtmisionwhere)) && (isset($dtmisionwhere))) {
    ?>
        <form method="post" action="index.php?page=EdicionMision&actionmis=update&IdMi=<?php echo $IdMi ?>" enctype="multipart/form-data">
        <?php
    } else {
        ?>
            <form method="post" action="index.php?page=EdicionMision&actionmis=insert" enctype="multipart/form-data">
                <?php
            }

            if (isset($dtmisionwhere)) {
                foreach ($dtmisionwhere as $rows) :
                ?>
                    <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                        <h3 class="text-center">Publicacion para "Misión"</h3>
                        <div class="form-floating m-3">
                            <textarea id="DescripcionMision" name="DescripcionMision" class="form-control" value="<?php echo $rows['DescripcionMision'] ?>" rows="4" placeholder="Descripcion" style="height: 300px;"><?php echo $rows['DescripcionMision'] ?></textarea>
                            <label for="DescripcionMision">Parrafo</label>
                        </div>
                    </div>
                    <div class="container ms-auto me-auto mt-4">
                        <button type="submit" class="btn btn-success btn-lg">Enviar</button>
                    </div>
                <?php
                endforeach;
            } else if (!isset($dtmisionwhere)) {
                ?>
                <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                    <h3 class="text-center">Publicacion para "Misión"</h3>
                    <div class="form-floating m-3">
                        <textarea id="DescripcionMision" name="DescripcionMision" class="form-control" rows="4" placeholder="Descripcion" style="height: 300px;"></textarea>
                        <label for="DescripcionMision">Parrafo</label>
                    </div>
                </div>
                <div class="container ms-auto me-auto mt-4">
                    <button type="submit" class="btn btn-success btn-lg">Enviar</button>
                </div>
            <?php
            }
            ?>
            </form>
</div>