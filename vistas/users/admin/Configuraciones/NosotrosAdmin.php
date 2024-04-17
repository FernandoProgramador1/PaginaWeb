<!-- Navbar lateral start-->

<?php
require_once("modelos/model_configuraciones.php");
?>

<div class="container p-5 justify-content-center bg-dark-subtle">

    <!-- Titulo de la vista -->
    <!-- <h1 class="text-center">Edicion de pagina</h1> -->
    <!-- Titulo de la vista -->

    <form method="post" action="index.php?page=NosotrosAdmin&actioncon=nosotros"
        enctype="multipart/form-data">
        <?php

        $Somos = "";
        $Mision = "";
        $Vision = "";
        $Valores = "";

        foreach ($dtcontactos as $row):
            switch ($row["CampoKey"]) {
                case "Somos":
                    $Somos = $row["Descripcion"];
                    break;
                case "Mision":
                    $Mision = $row["Descripcion"];
                    break;
                case "Vision":
                    $Vision = $row["Descripcion"];
                    break;
                case "Valores":
                    $Valores = $row["Descripcion"];
                    break;
            }
        endforeach;
        ?>

        <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
            <h3 class="text-center">Publicacion para "Nosotros"</h3>
            <div class="form-floating m-3">
                <textarea id="Somos" name="Somos" class="form-control" rows="10"
                    placeholder="¿Quienes Somos?"><?php echo $Somos ?></textarea>
                <label for="Somos">¿Quienes Somos?</label>
            </div>
            <div class="form-floating m-3">
                <textarea id="Mision" name="Mision" class="form-control" rows="4"
                    placeholder="Mision" ><?php echo $Mision ?></textarea>
                <label for="Mision">Mision</label>
            </div>
            <div class="form-floating m-3">
                <textarea id="Vision" name="Vision" class="form-control" rows="4"
                    placeholder="Vision" ><?php echo $Vision ?></textarea>
                <label for="Vision">Vision</label>
            </div>
            <div class="form-floating m-3">
                <textarea id="Valores" name="Valores" class="form-control" rows="4"
                    placeholder="Valores" ><?php echo $Valores ?></textarea>
                <label for="Valores">Valores</label>
            </div>
        </div>
        <div class="container ms-auto me-auto mt-4">
            <button type="submit" class="btn btn-success btn-lg">Guardar</button>
        </div>
    </form>
</div>