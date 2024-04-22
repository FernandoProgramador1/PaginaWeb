<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Web | Agregar Aviso de Privacidad - Términos y Condiciones</title>
</head>

<body>
    <div class="privacy-container container mt-4">
        <div class="form-container">
            <h1 class="edicionProd-heading">Agregar Aviso de Privacidad y Términos y Condiciones</h1>
            <form action="tu_ruta_de_guardado.php" method="post">
                <div class="form-floating form-group form-group-custom">
                    <textarea id="privacy-policy" name="privacy_policy" class="form-control form-control-custom privacy-textarea" required placeholder="Aviso de Privacidad: "></textarea>
                    <label for="privacy-policy">Aviso de Privacidad:</label>
                </div>

                <div class="form-floating form-group form-group-custom">
                    <textarea id="terms-conditions" name="terms_conditions" class="form-control form-control-custom privacy-textarea" required placeholder="Términos y Condiciones"></textarea>
                    <label for="terms-conditions">Términos y Condiciones: </label>
                </div>

                <div class="button-container">
                    <button type="submit" class="btn btn-primary btn-success-custom">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>