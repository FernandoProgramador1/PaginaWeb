<?php
require_once("modelos/model_productos.php");
require_once("modelos/model_tipoproducto.php");
require_once("modelos/model_marcas.php");

$productsPerPage = 12; // Número de productos por página

if (isset($_GET['p']) && is_numeric($_GET['p'])) {
    $currentPage = intval($_GET['p']);
} else {
    $currentPage = 1; // Página predeterminada
}

$startIndex = ($currentPage - 1) * $productsPerPage;
$endIndex = $startIndex + $productsPerPage;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="prod-body">
    <div class="productos-container">
        <!-- Barra de búsqueda y filtros -->
        <div class="productos-filter-bar">
            <input type="text" class="producto-input" placeholder="Buscar producto...">
            <button class="producto-button">Buscar</button>
        </div>

        <!-- Grid de productos -->
        <div class="productos-grid">
            <!-- Ejemplo de producto -->
            <div class="producto-item">
                <img src="recursos\img\ASPEL-ICONO-VERT_COI-1.webp" alt="Producto" class="producto-image">
                <div class="producto-info">
                    <h2 class="producto-title">Nombre del Producto</h2>
                    <p class="producto-description">Descripción corta del producto...</p>
                    <p class="producto-price">Precio: $XX.XX</p>
                </div>
            </div>
            <div class="producto-item">
                <img src="recursos\img\ASPEL-ICONO-VERT_COI-1.webp" alt="Producto" class="producto-image">
                <div class="producto-info">
                    <h2 class="producto-title">Nombre del Producto</h2>
                    <p class="producto-description">Descripción corta del producto...</p>
                    <p class="producto-price">Precio: $XX.XX</p>
                </div>
            </div>
            <div class="producto-item">
                <img src="recursos\img\ASPEL-ICONO-VERT_COI-1.webp" alt="Producto" class="producto-image">
                <div class="producto-info">
                    <h2 class="producto-title">Nombre del Producto</h2>
                    <p class="producto-description">Descripción corta del producto...</p>
                    <p class="producto-price">Precio: $XX.XX</p>
                </div>
            </div>
            <div class="producto-item">
                <img src="recursos\img\ASPEL-ICONO-VERT_COI-1.webp" alt="Producto" class="producto-image">
                <div class="producto-info">
                    <h2 class="producto-title">Nombre del Producto</h2>
                    <p class="producto-description">Descripción corta del producto...</p>
                    <p class="producto-price">Precio: $XX.XX</p>
                </div>
            </div>
            <div class="producto-item">
                <img src="recursos\img\ASPEL-ICONO-VERT_COI-1.webp" alt="Producto" class="producto-image">
                <div class="producto-info">
                    <h2 class="producto-title">Nombre del Producto</h2>
                    <p class="producto-description">Descripción corta del producto...</p>
                    <p class="producto-price">Precio: $XX.XX</p>
                </div>
            </div>
            <div class="producto-item">
                <img src="recursos\img\ASPEL-ICONO-VERT_COI-1.webp" alt="Producto" class="producto-image">
                <div class="producto-info">
                    <h2 class="producto-title">Nombre del Producto</h2>
                    <p class="producto-description">Descripción corta del producto...</p>
                    <p class="producto-price">Precio: $XX.XX</p>
                </div>
            </div>
            <!-- Repetir la estructura anterior para cada producto -->
        </div>
    </div>
</body>

</html>