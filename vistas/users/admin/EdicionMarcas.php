<?php
require_once("modelos/model_marcas.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSETCO | Editar Marcas</title>
    <style>
        .EdicionMarcas-body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
        }

        .EdicionMarcas-container {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 25px;
            width: 100%;
            max-width: 850px;
            margin-top: 50px;
        }

        .EdicionMarcas-heading {
            color: #4A154B;
            margin-bottom: 30px;
        }

        .form-group-EdicionMarcas {
            margin: 20px 0;
        }

        .form-control-EdicionMarcas {
            padding: 10px;
            border-radius: 5px;
            border: 2px solid #D3BCC0;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .btn-EdicionMarcas {
            background: #4A154B;
            color: white;
            border: none;
            padding: 15px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 18px;
            display: block;
            margin: 20px auto;
            text-align: center;
            width: 200px;
        }

        .btn-EdicionMarcas:hover {
            background: #36103B;
        }

        .img-thumbnail {
            border: 2px solid #D3BCC0;
            border-radius: 5px;
            max-width: 400px;
            max-height: 300px;
            display: block;
            margin: 20px auto;
        }
    </style>
</head>

<body class="EdicionMarcas-body">
    <div class="container EdicionMarcas-container">
        <h1 class="text-center EdicionMarcas-heading">Edición de marcas</h1>
        <!-- Aquí comienza el formulario -->
        <form method="post" action="index.php?page=EdicionMarcas&actionmarc=update&IdM=<?php echo $IdM ?>" enctype="multipart/form-data">
            <div class="form-group form-group-EdicionMarcas">
                <input id="Archivo" name="Archivo" class="form-control form-control-EdicionMarcas form-control-lg" type="file" onchange="myimg()" required />
                <img id="muestra" src="" alt="Imagen seleccionada" class="img-thumbnail" />
            </div>
            <div class="form-floating m-3">
                <input id="Nombre" name="Nombre" class="form-control form-control-EdicionMarcas" type="text" placeholder="Nombre de la marca" required />
                <label for="Nombre">Nombre de la marca</label>
            </div>
            <div class="button-container">
                <button type="submit" class="btn btn-success btn-success-custom">Enviar</button>
                <a href="index.php?page=MarcasAdmin" class="btn btn-success btn-success-custom">Volver</a>
            </div>
        </form>
    </div>
    <script>
        function myimg() {
            var input = document.getElementById('Archivo');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('muestra').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>