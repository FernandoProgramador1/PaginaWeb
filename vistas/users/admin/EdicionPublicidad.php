<!-- Navbar lateral start-->

<?php
require_once("modelos/model_publicidad.php");
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
        <form method="post" action="<!-- Su acción aquí -->" enctype="multipart/form-data">
            <h3 class="edicionCarr-heading">Imagen de Publicidad</h3>
            <div class="form-group form-groupCustom">
                <input id="Archivo" name="Archivo" class="form-control form-control-lg customForm-control-lg" type="file" onchange="myimg()" required />
            </div>
            <div class="card edicionCarr-card">
                <img id="muestra" src="" alt="Aqui se muestra la imagen seleccionada" class="img-thumbnail" style="max-width:400px; max-height:300px;" />
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
            fileReader.onload = function(e) {
                document.getElementById('muestra').src = e.target.result;
            };
        }
    </script>
</body>

</html>