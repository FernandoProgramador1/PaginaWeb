<!-- Navbar lateral start-->

<?php
require_once("modelos/model_vision.php");

?>
<!-- Navbar lateral start-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Visión</title>
</head>

<body class="mision-body">
    <div class="mision-container container">
        <form method="post" action="" enctype="multipart/form-data">
            <h3>Publicación para "Visión"</h3>
            <div>
                <textarea id="DescripcionMision" name="DescripcionMision" class="form-control mision-textarea" placeholder="Visión"></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-mision">Enviar</button>
        </form>
    </div>
</body>

</html>