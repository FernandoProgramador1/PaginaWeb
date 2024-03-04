<!-- Navbar lateral start-->

<?php
require_once("modelos/model_carrusel.php");
?>

<div class="container p-5 justify-content-center bg-dark-subtle">

    <?php 
    if((!empty($dtcarruselwhere)) && (isset($dtcarruselwhere))){
        ?>
            <form method="post" action="index.php?page=EdicionImgCarrusel&actioncar=update&IdK=<?php echo $IdK ?>" enctype="multipart/form-data">
        <?php
    }else{
        ?>
            <form method="post" action="index.php?page=EdicionImgCarrusel&actioncar=insert" enctype="multipart/form-data">
        <?php
    }
    
    if(isset($dtcarruselwhere)){
        foreach($dtcarruselwhere as $rows):
                ?>
                    <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                        <h3 class="text-center">Imagen del carrusel</h3>
                        <div class="form form-group m-3">
                            <input id="Archivo" name="Archivo" class="form-control form-control-lg" type="file" placeholder="Inserte una imagen de logo" onchange="myimg()" required />
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
    }else if(!isset($dtcarruselwhere)){
                ?>
                    <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
                        <h3 class="text-center">Imagen del carrusel</h3>
                        <div class="form form-group m-3">
                            <input id="Archivo" name="Archivo" class="form-control form-control-lg" type="file" placeholder="Inserte una imagen de logo" onchange="myimg()" required />
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

