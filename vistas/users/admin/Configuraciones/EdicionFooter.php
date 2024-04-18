<?php
// require_once('modelos/model_contactos.php');
require_once('modelos/model_configuraciones.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web | Editar Datos de contacto</title>
</head>

<body>
    <div class="contacto-footer-container container">
        <?php
        $Direccion = "";
        $CodigoPostal = "";
        $Ciudad = "";
        $Estado = "";
        $Telefono = "";
        $Correo = "";

        foreach ($dtcontactos as $row) :
            switch ($row["CampoKey"]) {
                case "Direccion":
                    $Direccion = $row["Descripcion"];
                    break;
                case "CodigoPostal":
                    $CodigoPostal = $row["Descripcion"];
                    break;
                case "Ciudad":
                    $Ciudad = $row["Descripcion"];
                    break;
                case "Estado":
                    $Estado = $row["Descripcion"];
                    break;
                case "Telefono":
                    $Telefono = $row["Descripcion"];
                    break;
                case "Correo":
                    $Correo = $row["Descripcion"];
                    break;
            }
        endforeach;
        ?>
        <form id="contacto-footer" method="post" action="index.php?page=InfoContacto&actioncon=contacto" enctype="multipart/form-data" class="was-validated">
            <h2>Editar datos de contacto (footer).</h2>
            <div class="contacto-footer-group">
                <label for="email" class="contactoFooter-label">Correo Electrónico:</label>
                <input type="email" id="email" name="Correo" value="<?php echo $Correo ?>" class="contactoFooter-input" required>
            </div>
            <div class="contacto-form-group">
                <label for="address" class="contactoFooter-label">Dirección:</label>
                <input type="text" id="address" name="Direccion" value="<?php echo $Direccion ?>" class="contactoFooter-input" required>
            </div>
            <div class="contacto-form-group">
                <label for="state" class="contactoFooter-label">Estado:</label>
                <input type="text" id="state" name="Estado" value="<?php echo $Estado ?>" class="contactoFooter-input" required>
            </div>
            <div class="contacto-form-group">
                <label for="city" class="contactoFooter-label">Ciudad:</label>
                <input type="text" id="city" name="Ciudad" value="<?php echo $Ciudad ?>" class="contactoFooter-input" required>
            </div>
            <div class="contacto-form-group">
                <label for="zipcode" class="contactoFooter-label">Código Postal:</label>
                <input type="text" id="zipcode" name="CodigoPostal" value="<?php echo $CodigoPostal ?>" class="contactoFooter-input" required pattern="\d{5}" maxlength="5" title="Ingrese un código postal de 5 dígitos.">
            </div>
            <div class="contacto-form-group">
                <label for="phone" class="contactoFooter-label">Teléfono:</label>
                <input type="tel" id="phone" name="Telefono" value="<?php echo $Telefono ?>" class="contactoFooter-input" required>
            </div>
            <button type="submit" class="contactoFooter-button">Enviar</button>
        </form>
    </div>
</body>

</html>