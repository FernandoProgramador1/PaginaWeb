<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web | Lista de Preguntas Frecuentes</title>
    <!-- Incluye tus archivos de estilos si es necesario -->
</head>

<body>
    <div class="edicionProd-container container">
        <!-- Título de la vista -->
        <h1 class="edicionProd-heading text-center">Lista de Preguntas Frecuentes</h1>
        <a href="index.php?page=PreguntasAdmin" class="btn btn-primary service-btn btn-carruselImg btn-lg d-relative">
            Agregar nueva pregunta
        </a>
        <!-- Campo de selección para filtrar las preguntas frecuentes -->
        <div class="form-floating form-group form-group-custom mb-3">
            <select id="filter" name="filter" class="form-select form-select-custom" onchange="filterFAQs()">
                <option value="" hidden selected disabled>Todas las categorías</option>
                <!-- Opciones de categorías (puedes agregar más según sea necesario) -->
                <option value="categoria1">Categoría 1</option>
                <option value="categoria2">Categoría 2</option>
                <!-- Más opciones de categorías -->
            </select>
            <label for="filter">Filtrar por categoría</label>
        </div>


        <!-- Tabla para mostrar las preguntas frecuentes -->
        <div class="table-responsive">

            <table id="faqTable" class="table table-striped">
                <thead>
                    <tr>
                        <th class="faq-th">ID</th>
                        <th class="faq-th">Pregunta</th>
                        <th class="faq-th">Respuesta</th>
                        <th class="faq-th">Categoría</th>
                        <th class="faq-th">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí se mostrarán las preguntas frecuentes -->
                    <!-- Ejemplo de fila -->
                    <tr data-category="categoria1">
                        <td>1</td>
                        <td>¿Qué es Lorem Ipsum?</td>
                        <td>Lorem ipsum es el texto que se usa habitualmente en diseño gráfico en demostraciones de tipografías o de borradores de diseño para probar el diseño visual antes de insertar el texto final.</td>
                        <td>Categoria1</td>
                        <td>
                            <!-- Botones alineados -->
                            <button class="btn btn-faq btn-primary btn-sm me-2">Actualizar</button>
                            <button class="btn btn-faq btn-danger btn-sm">Eliminar</button>
                        </td>
                    </tr>
                    <!-- Más filas con preguntas frecuentes -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Script para filtrar preguntas frecuentes -->
    <script>
        function filterFAQs() {
            const filterValue = document.getElementById('filter').value.toLowerCase();
            const table = document.getElementById('faqTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const row = rows[i];
                const category = row.getAttribute('data-category');

                if (filterValue === '' || category === filterValue) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }
    </script>
</body>

</html>