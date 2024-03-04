<!-- Navbar lateral start-->

<?php
require_once("modelos/model_quienessomos.php");
?>
<title>SSETCO | Editar ¿Quiénes Somos?</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Navbar lateral end-->

<div class="container p-5 justify-content-center bg-dark-subtle">

    <?php
    if ((!empty($dtqsomoswhere)) && (isset($dtqsomoswhere))) {
    ?>
        <form method="post" action="index.php?page=EdicionQuienesSomos&actionqs=update&IdQ=<?php echo $IdQ ?>" enctype="multipart/form-data">
        <?php
    } else {
        ?>
            <form method="post" action="index.php?page=EdicionQuienesSomos&actionqs=insert" enctype="multipart/form-data">
                <?php
            }

            if (isset($dtqsomoswhere)) {
                foreach ($dtqsomoswhere as $rows) :
                ?>
                    <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                        <h3 class="text-center">Publicacion para "¿Quienes somos?"</h3>
                        <div class="form-floating m-3">
                            <textarea id="DescripcionQuienes" name="DescripcionQuienes" class="form-control" value="<?php echo $rows['DescripcionQuienes'] ?>" rows="4" placeholder="Descripcion" style="height: 300px;"><?php echo $rows['DescripcionQuienes'] ?></textarea>
                            <label for="DescripcionQuienes">Parrafo</label>
                        </div>
                    </div>
                    <div class="container ms-auto me-auto mt-4">
                        <button type="submit" class="btn btn-success btn-lg">Enviar</button>
                    </div>
                <?php
                endforeach;
            } else if (!isset($dtqsomoswhere)) {
                ?>
                <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                    <h3 class="text-center">Publicacion para "¿Quienes somos?"</h3>
                    <div class="form-floating m-3">
                        <textarea id="DescripcionQuienes" name="DescripcionQuienes" class="form-control" rows="4" placeholder="Descripcion" style="height: 300px;"></textarea>
                        <label for="DescripcionQuienes">Parrafo</label>
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