<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web | Agregar Funciones</title>
    <style>

    </style>
</head>

<body>
    <div class="edicionProd-container container">
        <h1 class="text-center edicionProd-heading">Agregar Funciones (Sistemas)</h1>
        <form enctype="multipart/form-data" id="formulario">
            <div id="inputContainer">
                <div class="input-group function-input-group">
                    <div class="form-floating form-group form-group-custom function-form-group-custom">
                        <input type="text" name="funcion[]" class="form-control form-control-custom function-form-control-custom function-form" value="" required>
                        <label class="function-label">Nombre de la Función</label>
                    </div>
                    <!-- Agregamos el campo para la descripción de la función -->
                    <div class="form-floating form-group form-group-custom function-form-group-custom">
                        <textarea name="descripcion[]" class="form-control form-control-custom function-form-control-custom function-form" required></textarea>
                        <label class="function-label">Descripción de la Función</label>
                    </div>
                    <!-- Fin del campo para la descripción de la función -->
                    <button type="button" onclick="eliminarInput(this)" class="contacto-button function-delete-btn">Eliminar</button>
                </div>
            </div>
            <button type="button" onclick="agregarInput()" class="function-btn">Agregar Más</button>
        </form>
    </div>

    <script>
        function agregarInput() {
            var container = document.getElementById('inputContainer');
            var newInputGroup = document.createElement('div');
            newInputGroup.className = 'input-group function-input-group';
            newInputGroup.innerHTML = `
                <div class="form-floating form-group form-group-custom function-form-group-custom">
                    <input type="text" name="funcion[]" class="form-control form-control-custom function-form-control-custom function-form" value="" required>
                    <label class="function-label">Nombre de la Función</label>
                </div>
                <!-- Agregamos el campo para la descripción de la función -->
                <div class="form-floating form-group form-group-custom function-form-group-custom">
                    <textarea name="descripcion[]" class="form-control form-control-custom function-form-control-custom function-form" required></textarea>
                    <label class="function-label">Descripción de la Función</label>
                </div>
                <!-- Fin del campo para la descripción de la función -->
                <button type="button" onclick="eliminarInput(this)" class="contacto-button function-delete-btn">Eliminar</button>
            `;
            container.appendChild(newInputGroup);
        }

        function eliminarInput(btn) {
            var container = document.getElementById('inputContainer');
            var inputGroup = btn.parentElement;
            container.removeChild(inputGroup);
        }
    </script>
</body>

</html>