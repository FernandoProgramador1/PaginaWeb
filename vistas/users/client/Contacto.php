<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
</head>

<body>

    <header class="contacto-header">
        <h1>Contacto</h1>
    </header>

    <div class="contacto-form-container container">
        <form id="contacto-form">
            <h2>Contacta con nosotros</h2>
            <div class="contacto-form-group">
                <label for="name" class="contacto-label">Nombre Completo:</label>
                <input type="text" id="name" name="name" class="contacto-input" required>
            </div>
            <div class="contacto-form-group">
                <label for="email" class="contacto-label">Correo Electrónico:</label>
                <input type="email" id="email" name="email" class="contacto-input" required>
            </div>
            <div class="contacto-form-group">
                <label for="subject" class="contacto-label">Asunto:</label>
                <input type="text" id="subject" name="subject" class="contacto-input" required>
            </div>
            <div class="contacto-form-group">
                <label for="message" class="contacto-label">Mensaje:</label>
                <textarea id="message" name="message" class="contacto-textarea" required></textarea>
            </div>
            <button type="submit" class="contacto-button">Enviar</button>
        </form>
    </div>

</body>

</html>