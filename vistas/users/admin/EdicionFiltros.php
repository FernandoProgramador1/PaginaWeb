<?php
require_once("modelos/model_filtroPadre.php");
require_once("modelos/model_filtroHijo.php");
?>

<div class="container p-5 justify-content-center bg-dark-subtle">

<!-- Titulo de la vista -->
    <h1 class="text-center">Edicion de opciones de filtros</h1>
    <!-- Titulo de la vista -->

    <?php 
        if((!empty($dtfiltrohijowhere)) && (isset($dtfiltrohijowhere))){
    ?>
        <form method="post" action="index.php?page=EdicionFiltros&actionfh=update&IdFh=<?php echo $IdFh ?>" enctype="multipart/form-data" class="was-validated">
    <?php
        }else{
    ?>
        <form method="post" action="index.php?page=EdicionFiltros&actionfh=insert" enctype="multipart/form-data" class="was-validated">
    <?php
        }

        if(isset($dtfiltrohijowhere)){
            foreach($dtfiltrohijowhere as $rows):
    ?>
            <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                <!-- <h3 class="text-center"></h3> -->
                <div class="form-floating m-3">
                    <select id="IdFiltroPadre" name="IdFiltroPadre" class="form-select" value="<?php echo $rows['IdFiltroPadre'] ?>" type="text" placeholder="Tipo de filtro" required>
                        <option selected disabled hidden>Seleccione un tipo de filtro</option>
                        <?php
                        if(isset($dtfiltropadre)){
                            foreach($dtfiltropadre as $rowmfp):
                        ?>
                            <option value="<?php echo $rowmfp['IdFiltroPadre'] ?>"><?php echo $rowmfp['DescripcionFiltro'] ?></option>
                        <?php
                            endforeach;
                        }
                        ?>
                    </select>
                    <label for="IdFiltroPadre">Tipo de filtro</label>
                </div>
                <div class="form-floating m-3">
                    <input id="DescripcionFiltro" name="DescripcionFiltro" class="form-control" value="<?php echo $rows['DescripcionFiltro'] ?>" type="text" placeholder="Caracteristica de la opcione de filtro" required/>
                    <label for="DescripcionFiltro">Opción del filtro</label>
                </div>
            </div>
            <div class="container ms-auto me-auto mt-4">
                <button type="submit" class="btn btn-success btn-lg">Enviar opción de filtro</button>
            </div>
    <?php
            endforeach;
        }else{
    ?>
            <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                <!-- <h3 class="text-center"></h3> -->
                <div class="form-floating m-3">
                    <select id="IdFiltroPadre" name="IdFiltroPadre" class="form-select" value="<?php echo $rows['IdFiltroPadre'] ?>" type="text" placeholder="Tipo de filtro" required>
                        <option selected disabled hidden>Seleccione una marca</option>
                        <?php
                        if(isset($dtfiltropadre)){
                            foreach($dtfiltropadre as $rowmfp):
                        ?>
                            <option value="<?php echo $rowmfp['IdFiltroPadre'] ?>"><?php echo $rowmfp['DescripcionFiltro'] ?></option>
                        <?php
                            endforeach;
                        }
                        ?>
                    </select>
                    <label for="IdFiltroPadre">Tipo de filtro</label>
                </div>
                <div class="form-floating m-3">
                    <input id="DescripcionFiltro" name="DescripcionFiltro" class="form-control" type="text" placeholder="Caracteristica de la opcione de filtro" required/>
                    <label for="DescripcionFiltro">Opción del filtro</label>
                </div>
            </div>
            <div class="container ms-auto me-auto mt-4">
                <button type="submit" class="btn btn-success btn-lg">Enviar opción de filtro</button>
            </div>
    <?php
        }
    ?>