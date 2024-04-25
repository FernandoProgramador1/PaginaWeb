<?php
include_once ("modelos/model_publicaciones.php");
include_once ("modelos/model_sistemas.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Web</title>
</head>

<body>

    <section id="carruselPrincipal">
        <div id="carruselHome" class="carousel slide" data-bs-ride="true">
            <div class="carousel-inner">
                <?php
                $count = 0;
                foreach ($dtpublicaciones as $row):
                    if ($row['Clave'] == "Carrusel") {
                        ?>
                        <div class="carousel-item <?php echo ($count == 0 ? "active" : "") ?> carruselImg">
                            <img src="data:<?php echo $row['TipoArchivoPub'] ?>;base64,<?php echo (base64_encode($row['ArchivoPub'])) ?>"
                                alt="<?php echo $row['Clave'] . $row['IdPublicacion'] ?>">
                        </div>
                        <?php
                        $count++;
                    }
                endforeach;
                ?>
                <!-- <div class="carousel-item carruselImg">
                    <img src="https://placehold.co/600x400" alt="PlaceholderImg">
                </div>
                <div class="carousel-item carruselImg">
                    <img src="https://placehold.co/600x400" alt="PlaceholderImg">
                </div> -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carruselHome" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carruselHome" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section id="carruselSecundario" class="container-fluid">
        <div id="carruselSoftware" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner p-3">
                <?php
                $lista = array_chunk($dtsisviews, 4);
                for ($i = 0; $i < count($lista); $i++) {
                    $active = $i == 0 ? "active" : "";
                    ?>
                    <div class="carousel-item <?php echo $active ?>">
                        <div class="d-flex">
                            <?php
                            foreach ($lista[$i] as $row):
                                $Id = (!empty($row["IdSistema"]) ? $row["IdSistema"] : "");
                                $Nombre = (!empty($row["NombreSistema"]) ? $row["NombreSistema"] : "");
                                $TpFileSis = (!empty($row["Tipo"]) ? $row["Tipo"] : "");
                                $FileSis = (!empty($row["Archivo"]) ? $row["Archivo"] : "");
                                ?>
                                <img src="data:<?php echo $TpFileSis ?>;base64,<?php echo (base64_encode($FileSis)) ?>"
                                    alt="<?php echo $Nombre ?>">
                                <?php
                            endforeach;
                            ?>
                            <!-- <img src="recursos\img\ASPEL-ICONO-VERT_SAE.webp" alt="Software 2">
                            <img src="https://placehold.co/300x200" alt="Software 3">
                            <img src="https://placehold.co/300x200" alt="Software 4"> -->
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carruselSoftware" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carruselSoftware" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

</body>

</html>