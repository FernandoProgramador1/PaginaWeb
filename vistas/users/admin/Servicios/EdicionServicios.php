<?php
require_once ("modelos/model_servicios.php");
?>

<title>Web | Editar Servicio</title>

<div class="container p-5 justify-content-center bg-dark-subtle mt-4">

    <!-- Titulo de la vista -->
    <h1 class="text-center">Edicion de Servicio</h1>
    <!-- Titulo de la vista -->

    <?php
    $Id = "";
    $Nombre = "";
    $Descripcion = "";
    $TpFileSer = "";
    $FileSer = "";
    $IdFile = "";

    if (isset($dtviewservicio)) {
        foreach ($dtviewservicio as $row):
            $Id = $row["IdServicio"];
            $Nombre = $row["NombreServicio"];
            $Descripcion = $row["Descripcion"];
            $TpFileSer = $row["Tipo"];
            $FileSer = $row["Archivo"];
            $IdFile = $row["IdArchivo"];
        endforeach;
    }

    $actionS = "";
    $actionF = "";
    $actionS = (!empty($Id) && isset($Id)) ? "update" : "insert";
    $actionF = (!empty($IdFile) && isset($IdFile)) ? "update" : "insert";

    $action = "index.php?page=EdicionServicios&actionserv=$actionS&actionfile=$actionF";
    ?>
    <form method="post" action="<?php echo $action ?>" enctype="multipart/form-data">
        <div class="container-sm justify-content-center rounded-1 ms-auto me-auto p-2 bg-white">
            <!-- <h3 class="text-center"></h3> -->
            <div class="form form-group m-3">
                <input id="Archivo" name="Archivo" class="form-control form-control-lg" type="file"
                    placeholder="Inserte el logo del servicio" onchange="myimg()" />
            </div>
            <div class="form-floating m-3">
                <input id="Nombre" name="Nombre" class="form-control" value="<?php echo $Nombre ?>" type="text"
                    placeholder="Nombre del servicio" required />
                <label for="Nombre">Nombre del servicio</label>
            </div>
            <div class="form-floating m-3">
                <textarea id="Descripcion" name="Descripcion" class="form-control" rows="4"
                    placeholder="Inserte la descripcion del servicio"><?php echo $Descripcion ?></textarea>
                <label for="Descripcion">Descripción</label>
            </div>
        </div>

        <div class="z-1n opacity-0">
            <input id="IdServicio" name="IdServicio" value="<?php echo $Id ?>" hidden readonly />
            <input id="IdArchivo" name="IdArchivo" value="<?php echo $IdFile ?>" hidden readonly />
        </div>

        <div class="card border-0 justify-content-center m-5 rounded-1 ms-1 me-4 bg-white">
            <div class=" img-thumbnail rounded ms-auto me-auto mt-auto mb-auto">
                <img id="muestra"
                    src="data:<?php echo $TpFileSer ?>;base64,<?php echo (base64_encode($FileSer)) ?>"
                    alt="Aqui se muestra la imagen seleccionada" style="max-width:400px;max-height:300px;" />
            </div>
        </div>
        <div class="container ms-auto me-auto mt-4">
            <button type="submit" class="btn btn-success btn-lg">Enviar Servicio</button>
        </div>
    </form>
</div>