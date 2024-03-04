<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .productos-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        }

        .productos-filter-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
            background-color: #b50b09;
            padding: 20px 25px;
            border-radius: 12px;
            align-items: center;
            color: #f9f9f9;
        }

        .productos-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
        }

        .productos-item {
            background-color: #f9f9f9;
            border: none;
            padding: 25px;
            border-radius: 12px;
            transition: transform .2s ease, box-shadow .2s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .productos-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .productos-image {
            max-width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333;
        }

        p {
            margin-bottom: 15px;
            font-size: 16px;
            color: #666;
        }

        p:last-child {
            font-weight: 600;
            color: #003366;
        }

        .productos-pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .productos-pagination a {
            padding: 10px 20px;
            margin: 0 5px;
            background-color: #fff;
            border: 1px solid #003366;
            text-decoration: none;
            color: #003366;
            border-radius: 25px;
            transition: background-color 0.2s ease;
        }

        .productos-pagination a:hover {
            background-color: #003366;
            color: #f9f9f9;
        }

        select {
            padding: 8px 16px;
            padding-right: 30px;
            border-radius: 8px;
            border: 1px solid #d0d0d0;
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
            font-size: 16px;
            outline: none;
            transition: box-shadow .2s ease, transform .2s ease;
            appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23666" viewBox="0 0 20 20" width="20" height="20" xmlns="http://www.w3.org/2000/svg"><path d="M5.293 9.293a1 1 0 011.414 0L10 12.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>');
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: 50%;
        }

        select:hover {
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        }

        select:focus {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.12);
            transform: scale(1.02);
        }
    </style>
</head>

<body>
    <div class="productos-container">
        <div class="productos-filter-bar">
            <div>
                Mostrando:
                <select>
                    <option value="10">10 productos</option>
                    <option value="20">20 productos</option>
                    <option value="50">50 productos</option>
                </select>
            </div>
            <div>
                Filtrar por:
                <select>
                    <option value="">Prueba 1</option>
                    <option value="">Prueba 2</option>
                    <option value="">Prueba 3</option>
                </select>
            </div>
        </div>

        <div class="productos-grid">
            <!-- Repite el siguiente bloque para cada producto -->
            <div class="productos-item">
                <img class="productos-image" src="https://th.bing.com/th/id/OIP.t9WmuJxpJBS6ZxxFaG0tMwHaFS?pid=ImgDet&rs=1" alt="Producto">
                <h2>Nombre del Producto</h2>
                <p>Descripción breve del producto.</p>
                <p>Precio: $xx.xx</p>
            </div>
            <!-- Agrega más bloques de producto aquí si lo deseas -->
        </div>

        <div class="productos-pagination">
            <a href="#">Anterior</a>
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">Siguiente</a>
        </div>
    </div>
</body>

</html>