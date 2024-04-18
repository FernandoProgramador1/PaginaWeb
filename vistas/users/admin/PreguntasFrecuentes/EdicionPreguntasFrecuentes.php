<?php
require_once("modelos/model_sistemas.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web | Edición de Preguntas Frecuentes</title>
</head>

<body>
    <div class="edicionProd-container container">
        <!-- Título de la vista -->
        <h1 class="edicionProd-heading text-center">Edición de Preguntas Frecuentes</h1>

        <!-- Formulario para subir preguntas frecuentes -->
        <form method="post" action="index.php?page=FAQAdmin&action=guardar" enctype="multipart/form-data">

            <div class="form-group form-group-custom">
                <div class="form-floating form-group-custom">
                    <textarea id="Pregunta" name="Pregunta" class="form-control form-control-custom" rows="4" placeholder="Escribe la pregunta" style="resize: none; min-height: 60px" required></textarea>
                    <label for="Pregunta">Pregunta</label>
                </div>
                <div class="form-floating form-group-custom">
                    <textarea id="Respuesta" name="Respuesta" class="form-control form-control-custom" rows="6" placeholder="Escribe la respuesta" style="resize: none; min-height: 90px" required></textarea>
                    <label for="Respuesta">Respuesta</label>
                </div>
            </div>

            <div class="form-floating form-group form-group-custom">
                <select id="IdSistema" name="IdSistema" class="form-select form-select-custom">
                    <option value="" disabled selected hidden>Selecciona un sistema</option>
                    <?php
                    foreach ($dtsistemas as $row) {
                        echo '<option value="' . $row["IdSistema"] . '">' . $row["Nombre"] . '</option>';
                    }
                    ?>
                </select>
                <label for="IdSistema">Sistema</label>
            </div>

            <div style="display: none;">
                <input id="IdFAQ" name="IdFAQ" value="" hidden readonly />
            </div>

            <div class="button-container">
                <button type="submit" class="btn btn-success btn-success-custom">Enviar</button>
                <a href="index.php?page=PreguntasFrecuentes" class="btn btn-success btn-success-custom">Volver</a>
            </div>
        </form>
    </div>

</body>

</html>