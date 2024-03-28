<?php
require_once('modelos/model_contactos.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Datos de contacto</title>
</head>

<body>
    <div class="contacto-footer-container container">
        <form id="contacto-footer">
            <h2>Editar datos de contacto (footer).</h2>
            <div class="contacto-footer-group">
                <label for="email" class="contactoFooter-label">Correo Electrónico:</label>
                <input type="email" id="email" name="email" class="contactoFooter-input" required>
            </div>
            <div class="contacto-form-group">
                <label for="address" class="contactoFooter-label">Dirección:</label>
                <input type="text" id="address" name="address" class="contactoFooter-input" required>
            </div>
            <div class="contacto-form-group">
                <label for="state" class="contactoFooter-label">Estado:</label>
                <input type="text" id="state" name="state" class="contactoFooter-input" required>
            </div>
            <div class="contacto-form-group">
                <label for="city" class="contactoFooter-label">Ciudad:</label>
                <input type="text" id="city" name="city" class="contactoFooter-input" required>
            </div>
            <div class="contacto-form-group">
                <label for="zipcode" class="contactoFooter-label">Código Postal:</label>
                <input type="text" id="zipcode" name="zipcode" class="contactoFooter-input" required>
            </div>
            <div class="contacto-form-group">
                <label for="phone" class="contactoFooter-label">Teléfono:</label>
                <input type="tel" id="phone" name="phone" class="contactoFooter-input" required>
            </div>
            <button type="submit" class="contactoFooter-button">Enviar</button>
        </form>
    </div>
</body>

</html>