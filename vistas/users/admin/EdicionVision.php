<!-- Navbar lateral start-->

<?php
require_once("modelos/model_vision.php");

?>
<title>SSETCO | Editar Visión</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Navbar lateral end-->

<div class="container p-5 justify-content-center bg-dark-subtle">

    <?php
    if ((!empty($dtvisionwhere)) && (isset($dtvisionwhere))) {
    ?>
        <form method="post" action="index.php?page=EdicionVision&actionvis=update&IdVi=<?php echo $IdVi ?>" enctype="multipart/form-data">
        <?php
    } else {
        ?>
            <form method="post" action="index.php?page=EdicionVision&actionvis=insert" enctype="multipart/form-data">
                <?php
            }

            if (isset($dtvisionwhere)) {
                foreach ($dtvisionwhere as $rows) :
                ?>
                    <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                        <h3 class="text-center">Publicacion para "Vision"</h3>
                        <div class="form-floating m-3">
                            <textarea id="DescripcionVision" name="DescripcionVision" class="form-control" value="<?php echo $rows['DescripcionVision'] ?>" rows="4" placeholder="Descripcion" style="height: 300px;"><?php echo $rows['DescripcionVision'] ?></textarea>
                            <label for="DescripcionVision">Parrafo</label>
                        </div>
                    </div>
                    <div class="container ms-auto me-auto mt-4">
                        <button type="submit" class="btn btn-success btn-lg">Enviar</button>
                    </div>
                <?php
                endforeach;
            } else if (!isset($dtvisionwhere)) {
                ?>
                <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                    <h3 class="text-center">Publicacion para "Vision"</h3>
                    <div class="form-floating m-3">
                        <textarea id="DescripcionVision" name="DescripcionVision" class="form-control" rows="4" placeholder="Descripcion" style="height: 300px;"></textarea>
                        <label for="DescripcionVision">Parrafo</label>
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