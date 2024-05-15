<?php
include_once("modelos/model_sistemas.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web | Sistemas</title>
</head>

<body>
    <header>
        <h1>Sistemas</h1>
    </header>

    <section id="sistemasSection">
        <div class="container">
            <h2>Nuestros Sistemas</h2>
        </div>
        <div id="sistemasContainer" class="container">
            <?php
            foreach ($dtsisviews as $row) :
            ?>
                <div class="sistema">
                    <a href="index.php?page=DetalleSistema&IdDetSis=<?php echo $row['IdSistema'] ?>">
                        <img src="data:<?php echo $row['Tipo'] ?>;base64,<?php echo (base64_encode($row['Archivo'])) ?>" alt="<?php echo $row['NombreSistema'] ?>" />
                    </a>
                    <h3><?php echo $row['NombreSistema'] ?></h3>
                    <p><?php echo $row['Descripcion'] ?></p>
                    <a href="index.php?page=DetalleSistema&IdDetSis=<?php echo $row['IdSistema'] ?>" class="btn sistema-btn">Ver detalles</a>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </section>

</body>

</html>