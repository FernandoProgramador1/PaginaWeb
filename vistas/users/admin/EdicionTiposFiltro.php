<?php
require_once("modelos/model_filtroPadre.php");
?>

<div class="container p-5 justify-content-center bg-dark-subtle">

<!-- Titulo de la vista -->
    <h1 class="text-center">Edicion de tipos de filtro</h1>
    <!-- Titulo de la vista -->

    <?php 
        if((!empty($dtfiltropadrewhere)) && (isset($dtfiltropadrewhere))){
    ?>
        <form method="post" action="index.php?page=EdicionFiltroP&actionfp=update&IdFp=<?php echo $IdFp ?>" enctype="multipart/form-data">
    <?php
        }else{
    ?>
        <form method="post" action="index.php?page=EdicionFiltroP&actionfp=insert" enctype="multipart/form-data">
    <?php
        }

        if(isset($dtfiltropadrewhere)){
            foreach($dtfiltropadrewhere as $rows):
    ?>
            <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                <!-- <h3 class="text-center"></h3> -->
                <div class="form-floating m-3">
                    <input id="DescripcionFiltro" name="DescripcionFiltro" class="form-control" value="<?php echo $rows['DescripcionFiltro'] ?>" type="text" placeholder="Nombre del tipo de filtro" required/>
                    <label for="DescripcionFiltro">Nombre del tipo de filtro</label>
                </div>
            </div>
            <div class="container ms-auto me-auto mt-4">
                <button type="submit" class="btn btn-success btn-lg">Enviar tipo de filtro</button>
            </div>
    <?php
            endforeach;
        }else{
    ?>
            <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                <!-- <h3 class="text-center"></h3> -->
                <div class="form-floating m-3">
                    <input id="DescripcionFiltro" name="DescripcionFiltro" class="form-control" type="text" placeholder="Nombre del tipo de filtro" required/>
                    <label for="DescripcionFiltro">Nombre del tipo de filtro</label>
                </div>
            </div>
            <div class="container ms-auto me-auto mt-4">
                <button type="submit" class="btn btn-success btn-lg">Enviar tipo de filtro</button>
            </div>
    <?php
        }
    ?>