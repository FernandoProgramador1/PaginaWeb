<?php
require_once("modelos/model_mision.php");
require_once("modelos/model_vision.php");
require_once("modelos/model_valores.php");
require_once("modelos/model_quienessomos.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fafafa;
            color: #333;
        }

        .nosotros-container {
            max-width: 1100px;
            margin: 80px auto;
            padding: 50px 70px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .nosotros-header {
            text-align: center;
            padding: 50px;
            border-radius: 10px;
            margin-bottom: 50px;
            background-color: #e6e6e6;
        }

        .nosotros-header h1 {
            font-size: 3.5em;
            margin-bottom: 25px;
        }

        .nosotros-header p {
            font-size: 1.2em;
            color: #666;
            max-width: 750px;
            margin: 0 auto;
            text-align: justify;
            line-height: 1.7;
        }

        .nosotros-section {
            margin-top: 70px;
            margin-bottom: 70px;
            padding: 50px;
            border-radius: 10px;
            background-color: #f4f4f4;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            position: relative;
            text-align: center;
        }

        .nosotros-container .nosotros-section:first-child {
            margin-top: 0;
        }

        .nosotros-section ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }

        .nosotros-section li {
            margin-bottom: 10px;
        }

        .nosotros-section::before,
        .nosotros-section::after {
            content: "";
            position: absolute;
            top: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, transparent 0%, #5A9 25%, #5A9 75%, transparent 100%);
            pointer-events: none;
        }

        .nosotros-section::before {
            left: 0;
        }

        .nosotros-section::after {
            right: 0;
        }

        .nosotros-section h2 {
            font-size: 2.5em;
            margin-bottom: 30px;
            color: #444;
            position: relative;
            display: inline-block;
        }

        .nosotros-section h2::after {
            content: "";
            width: 100px;
            height: 4px;
            background-color: #5A9;
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
            transition: width 0.3s, background-color 0.3s;
        }

        .nosotros-section:hover h2::after {
            width: 130px;
            background-color: #477;
        }

        .nosotros-section p {
            font-size: 1.1em;
            color: #555;
            line-height: 1.8;
            text-align: justify;
            max-width: 800px;
            margin: 0 auto;
        }

        .nosotros-strong {
            color: #5A9;
            font-weight: 600;
        }

        /* Efecto de transición */
        .nosotros-section {
            opacity: 0.95;
            transform: translateY(3px);
            transition: transform 0.2s ease, opacity 0.2s ease;
        }

        .nosotros-section:hover {
            transform: translateY(0);
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="nosotros-container">
        <div class="nosotros-header">
            <h1>Sobre Nosotros</h1>
            <p>
            <?php 
                    foreach (array_reverse($dtqsomos) as $row):
                        echo $row["DescripcionQuienes"];
                    endforeach;
                ?>
            </p>
        </div>

        <div class="nosotros-section">
            <h2>Misión</h2>
            <p>
                <?php 
                    foreach (array_reverse($dtmision) as $row):
                            echo $row["DescripcionMision"];
                    endforeach;
                ?>
            </p>
        </div>

        <div class="nosotros-section">
            <h2>Visión</h2>
            <p>
                <?php 
                    foreach (array_reverse($dtvision) as $row):
                            echo $row["DescripcionVision"];
                    endforeach;
                ?>
            </p>
        </div>

        <div class="nosotros-section">
            <h2>Valores</h2>
            <p>
                <?php 
                    foreach (array_reverse($dtvalores) as $row):
                            echo $row["DescripcionValores"];
                    endforeach;
                ?>
            </p>
            <!-- <ul>
                <li><span class="nosotros-strong">Valor 1:</span> [Descripción del valor]</li>
                <li><span class="nosotros-strong">Valor 2:</span> [Descripción del valor]</li>
                <li><span class="nosotros-strong">Valor 3:</span> [Descripción del valor]</li>
                <li><span class="nosotros-strong">Valor 4:</span> [Descripción del valor]</li>
                <li><span class="nosotros-strong">Valor 5:</span> [Descripción del valor]</li>
            </ul> -->
        </div>
    </div>
</body>

</html>