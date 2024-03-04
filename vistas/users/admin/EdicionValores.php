<!-- Navbar lateral start-->

<?php
require_once("modelos/model_valores.php");
?>
<title>SSETCO | Editar Valores</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Navbar lateral end-->

<div class="container p-5 justify-content-center bg-dark-subtle">

    <?php
    if ((!empty($dtvaloreswhere)) && (isset($dtvaloreswhere))) {
    ?>
        <form method="post" action="index.php?page=EdicionValores&actionval=update&IdVa=<?php echo $IdVa ?>" enctype="multipart/form-data">
        <?php
    } else {
        ?>
            <form method="post" action="index.php?page=EdicionValores&actionval=insert" enctype="multipart/form-data">
                <?php
            }

            if (isset($dtvaloreswhere)) {
                foreach ($dtvaloreswhere as $rows) :
                ?>
                    <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                        <h3 class="text-center">Publicacion para "Valores"</h3>
                        <div class="form-floating m-3">
                            <textarea id="DescripcionValores" name="DescripcionValores" class="form-control" value="<?php echo $rows['DescripcionValores'] ?>" rows="4" placeholder="Descripcion" style="height: 300px;"><?php echo $rows['DescripcionValores'] ?></textarea>
                            <label for="DescripcionValores">Parrafo</label>
                        </div>
                    </div>
                    <div class="container ms-auto me-auto mt-4">
                        <button type="submit" class="btn btn-success btn-lg">Enviar</button>
                    </div>
                <?php
                endforeach;
            } else if (!isset($dtvaloreswhere)) {
                ?>
                <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                    <h3 class="text-center">Publicacion para "Valores"</h3>
                    <div class="form-floating m-3">
                        <textarea id="DescripcionValores" name="DescripcionValores" class="form-control" rows="4" placeholder="Descripcion" style="height: 300px;"></textarea>
                        <label for="DescripcionValores">Parrafo</label>
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