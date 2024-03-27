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
</head>

<body>
    <div class="productos-container">
        <form action="index.php?page=Productos" method="POST">
            <!-- Barra de filtros y ordenamiento -->
            <div class="productos-filter-bar">
                <div class="productos-showing">
                </div>
                <div class="productos-ordering">
                </div>
                <div class="productos-search-container">
                    <input name="page" value="Productos" hidden>
                    <input name="searchProducto" type="text" class="producto-input" placeholder="Buscar producto...">
                    <button class="producto-button">Buscar</button>
                </div>
            </div>

            <!-- Contenido principal: Filtros y productos -->
            <div class="productos-content">
                <!-- Columna de filtros -->
                <div class="productos-filters">
                    <!-- Filtro por categoría -->
                    <div class="filter-section">
                        <div class="filter-title">Tipos de productos</div>
                        <select name="tipoProducto" class="producto-select">
                            <option value="">Todas</option>
                            <?php
                            foreach ($dttipoproducto as $tp) :
                            ?>
                                <option value="<?php echo $tp['IdTipoProducto'] ?>"><?php echo $tp['DescripcionTipoProducto'] ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>

                    <!-- Filtro por marca -->
                    <div class="filter-section">
                        <div class="filter-title">Marca</div>
                        <select name="marcaProducto" class="producto-select">
                            <option value="">Todas</option>
                            <?php
                            foreach ($dtmarca as $marc) :
                            ?>
                                <option value="<?php echo $marc['IdMarca'] ?>"><?php echo $marc['Nombre'] ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>

                    <div class="filter-section">
                        <button type="submit" class="btn btn-primary btn-sm">Filtrar</button>
                    </div>
                </div>

                <!-- Grid de productos -->
                <div class="productos-grid">
                    <?php
                    if (!empty($_POST["searchProducto"])) {
                        $search = $_POST["searchProducto"];
                    } else {
                        $search = "";
                    }

                    if (!empty($_POST["tipoProducto"])) {
                        $tpProducto = $_POST["tipoProducto"];
                    } else {
                        $tpProducto = null;
                    }

                    if (!empty($_POST["marcaProducto"])) {
                        $marcaProducto = $_POST["marcaProducto"];
                    } else {
                        $marcaProducto = null;
                    }

                    $counter = 0; // Para contar los productos mostrados
                    $filteredProducts = array();
                    foreach ($dtproducto as $rows) {
                        if (stripos($rows["DetallesProducto"], $search) !== false || stripos($rows["NombreProducto"], $search) !== false) {
                            if ($tpProducto != null) {
                                if ($rows["IdTipoProducto"] === $tpProducto) {
                                    if ($marcaProducto != null) {
                                        if ($rows["IdMarca"] === $marcaProducto) {
                                            $filteredProducts[] = $rows;
                                        }
                                    } else {
                                        $filteredProducts[] = $rows;
                                    }
                                }
                            } elseif ($marcaProducto != null) {
                                if ($rows["IdMarca"] === $marcaProducto) {
                                    $filteredProducts[] = $rows;
                                }
                            } else {
                                $filteredProducts[] = $rows;
                            }
                        }
                    }

                    // Si el número de productos filtrados es igual o inferior a 12, establece el número total de páginas en 1
                    $totalFilteredProducts = count($filteredProducts);
                    if ($totalFilteredProducts <= $productsPerPage) {
                        $totalPages = 1;
                    } else {
                        $totalPages = ceil($totalFilteredProducts / $productsPerPage);
                    }

                    foreach ($filteredProducts as $product) {
                        if ($counter >= $startIndex && $counter < $endIndex) {
                    ?>
                            <!-- Producto -->
                            <div class="productos-item">
                                <img src="data:<?php echo $product['MimeType'] ?>;base64,<?php echo (base64_encode($product['Archivo'])) ?>" alt="<?php echo $product['NombreProducto'] . '_' . $product["IdProducto"] ?>" class="productos-image">
                                <h2 class="producto-title"><?php echo $product['NombreProducto'] ?></h2>
                                <p class="producto-description"><?php echo $product['DetallesProducto'] ?></p>
                                <p class="producto-price">Precio: <?php echo $product['CantidadMedida'] ?></p>
                            </div>
                    <?php
                        }
                        $counter++;
                    }
                    ?>
                </div>
            </div>

            <!-- Mostrar la paginación solo si hay más de una página -->
            <?php
            if ($totalPages > 1) {
                echo '<div class="productos-pagination">';
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<a href="index.php?page=Productos&p=' . $i . '" class="producto-pagination-link">' . $i . '</a>';
                }
                echo '</div>';
            }
            ?>
        </form>
    </div>
</body>

</html>