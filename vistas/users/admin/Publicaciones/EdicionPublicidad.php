<!-- Navbar lateral start-->

<?php
require_once ("modelos/model_publicaciones.php");
require_once ("modelos/model_sistemas.php");
require_once ("modelos/model_servicios.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Imágen de Publicidad</title>
</head>

<body>
    <div class="container edicionCarr-container">
        <?php
        $Id = "";
        $Clave = "";
        $Descripcion = "";
        $TpFilePub = "";
        $FilePub = "";
        $IdFile = "";
        // $NServicio = "";
        // $FileServ = "";
        
        if (isset($dtpubwhere)) {
            foreach ($dtpubwhere as $row):
                $Id = $row["IdPublicacion"];
                $Clave = $row["Clave"];
                $Descripcion = $row["DescripcionPublicacion"];
                $TpFilePub = $row["TipoArchivoPub"];
                $FilePub = $row["ArchivoPub"];
                $IdFile = $row["IdArchivo"];
            endforeach;
        }

        $actionP = "";
        $actionF = "";
        $actionP = (!empty($Id) && isset($Id)) ? "update" : "insert";
        $actionF = (!empty($IdFile) && isset($IdFile)) ? "update" : "insert";

        $action = "index.php?page=EdicionPublicidad&actionpub=$actionP&actionfile=$actionF&IdPublicacion=$Id";
        ?>
        <form method="post" action="<?php echo $action ?>" enctype="multipart/form-data">
            <h3 class="edicionCarr-heading">Imagen de Publicidad</h3>
            <div class="form-group form-groupCustom">
                <input id="Archivo" name="Archivo" class="form-control form-control-lg customForm-control-lg"
                    type="file" onchange="myimg()" required />
            </div>
            <h4 class="edicionCarr-heading">Titulo</h4>
            <div class="form-group form-groupCustom">
                <input id="Titulo" name="Titulo" class="form-control form-control-lg customForm-control-lg"
                    type="text" required />
            </div>
            <h4 class="edicionCarr-heading">Descripcion</h4>
            <div class="form-group form-groupCustom">
                <textarea id="Descripcion" name="Descripcion" class="form-control form-control-lg customForm-control-lg"
                    type="text" required></textarea>
            </div>
            <h4 class="edicionCarr-heading">Servicios</h4>
            <div class="form-group form-groupCustom">
                <select id="IdServicio" name="IdServicio" class="form-control form-control-lg customForm-control-lg">
                    <?php
                    foreach ($dtservicio as $row):
                        ?>
                        <option value="<?php echo $row["IdServicio"] ?>"><?php echo $row["Nombre"] ?></option>
                        <?php
                    endforeach;
                    ?>
                </select>
            </div>
            <h4 class="edicionCarr-heading">Sistemas</h4>
            <div class="form-group form-groupCustom">
                <select id="IdSistema" name="IdSistema" class="form-control form-control-lg customForm-control-lg">
                    <?php
                    foreach ($dtsistemas as $row):
                        ?>
                        <option value="<?php echo $row["IdSistema"] ?>"><?php echo $row["Nombre"] ?></option>
                        <?php
                    endforeach;
                    ?>
                </select>
            </div>

            <div class="z-1n opacity-0">
                <input id="CampoKey" name="CampoKey" value="<?php echo $Clave ?>" hidden readonly />
                <input id="IdArchivo" name="IdArchivo" value="<?php echo $IdFile ?>" hidden readonly />
            </div>

            <div class="card edicionCarr-card">
                <img id="muestra" src="data:<?php echo $TpFilePub ?>;base64,<?php echo (base64_encode($FilePub)) ?>"
                    alt="<?php echo !empty($Descripcion) && isset($Descripcion) ? $Descripcion : "Aqui se muestra la imagen seleccionada" ?>" class="img-thumbnail" style="max-width:400px; max-height:300px;" />
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-success btn-success-custom">Enviar</button>
                <a href="index.php?page=Publicidades" class="btn btn-success btn-success-custom">Volver</a>
            </div>
        </form>
    </div>
    <script>
        function myimg() {
            var input = document.getElementById('Archivo');
            var fileReader = new FileReader();
            fileReader.readAsDataURL(input.files[0]);
            fileReader.onload = function (e) {
                document.getElementById('muestra').src = e.target.result;
            };
        }
    </script>
</body>

</html>