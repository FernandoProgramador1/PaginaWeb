<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSETCO - Consultoría en Higiene y Seguridad Industrial</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
</head>

<body onload="valSel('IdMarca'),valSel('IdTipoProducto')">
    <header>
        <h1>Consultoría en Higiene y Seguridad Industrial.</h1>
    </header>

    <!-- Contenido Principal -->
    <div class="container">


        <!-- Llamada a la Acción (CTA) -->
        <!-- <div class="cta">
            <p>¿Quieres saber más? <a href="contacto.html">Contáctanos</a></p>
        </div> -->

        <!-- Carrusel -->
        <div class="carousel">
            <?php
            $j = 0;
            foreach ($dtcarrusel as $imgCar) :
            ?>
                <img src="data:<?php echo $imgCar['MimeType'] ?>;base64,<?php echo (base64_encode($imgCar['Archivo'])) ?>" style="object-fit:contain;" alt="<?php echo $imgCar['IdCarrusel'] ?>">
            <?php
                $j++;
            endforeach;
            ?>
        </div>

        <!-- Sección de Introducción -->
        <p></p>

        <hr class="mt-5 mb-5">
        <!-- Servicios -->
        <h2 class="text-center mb-1">Servicios</h2>
        <div class="services mt-2">
            <div class="service rounded">
                <h3 class="text-center">Equipamiento</h3>
                <p style="text-align:justify"> Ofrecemos una amplia gama de equipos de seguridad industrial para cumplir con normativas y garantizar la seguridad en el trabajo.</p>
            </div>
            <div class="service rounded">
                <h3 class="text-center">Mantenimiento</h3>
                <p style="text-align:justify">Mantenemos tus equipos industriales en óptimas condiciones a través de inspecciones, reparaciones y reemplazos de piezas desgastadas.</p>
            </div>
            <div class="service rounded">
                <h3 class="text-center">Capacitaciones</h3>
                <p style="text-align:justify">Impartimos cursos de seguridad industrial y ofrecemos consultoría en higiene y seguridad para prepararte en protección civil y salud laboral.</p>
            </div>
        </div>

        <hr class="mt-5 mb-5">
        <!-- Publicidad -->
        <div class="advertisement rounded">
            <h2>¡Descubre nuestros servicios de seguridad industrial!</h2>
            <?php
            $j = 0;
            foreach ($dtpublicidad as $publi) :
            ?>
                <img src="data:<?php echo $publi['MimeType'] ?>;base64,<?php echo (base64_encode($publi['Archivo'])) ?>" style="object-fit:contain;" alt="<?php echo $publi['IdPublicidad'] ?>">
            <?php
                $j++;
            endforeach;
            ?>

            <!-- <img src="https://3.bp.blogspot.com/-dD4VzxGnp5c/XGdDmXArdCI/AAAAAAAAD-E/_jkN-3DThK8iwNJ9x-QEbRgzgiHT9APmQCLcBGAs/s1600/mecanico.jpg" alt="Imagen 4">
            <img src="https://3.bp.blogspot.com/-dD4VzxGnp5c/XGdDmXArdCI/AAAAAAAAD-E/_jkN-3DThK8iwNJ9x-QEbRgzgiHT9APmQCLcBGAs/s1600/mecanico.jpg" alt="Imagen 5">
            <img src="https://3.bp.blogspot.com/-dD4VzxGnp5c/XGdDmXArdCI/AAAAAAAAD-E/_jkN-3DThK8iwNJ9x-QEbRgzgiHT9APmQCLcBGAs/s1600/mecanico.jpg" alt="Imagen 6">
            <img src="https://th.bing.com/th/id/OIP.tjCV6b4RKtOLCEXQoKnftAHaE8?pid=ImgDet&rs=1" alt="Imagen 7">
            <img src="https://th.bing.com/th/id/OIP.tjCV6b4RKtOLCEXQoKnftAHaE8?pid=ImgDet&rs=1" alt="Imagen 8">
            <img src="https://th.bing.com/th/id/OIP.tjCV6b4RKtOLCEXQoKnftAHaE8?pid=ImgDet&rs=1" alt="Imagen 9"> -->
            <p>Contáctanos hoy para obtener más información.</p>
        </div>

        <hr class="mt-5 mb-5">
        <!-- Publicidad -->
        <div class="advertisement rounded">
            <h2>¡Descubre las marcas que manejamos!</h2>
            <?php
            $j = 0;
            foreach ($dtmarca as $marc) :
            ?>
                <img src="data:<?php echo $marc['MimeType'] ?>;base64,<?php echo (base64_encode($marc['Archivo'])) ?>" style="object-fit:contain;" alt="<?php echo $marc["Nombre"] . $marc['IdMarca'] ?>">
            <?php
                $j++;
            endforeach;
            ?>

            <!-- <img src="https://3.bp.blogspot.com/-dD4VzxGnp5c/XGdDmXArdCI/AAAAAAAAD-E/_jkN-3DThK8iwNJ9x-QEbRgzgiHT9APmQCLcBGAs/s1600/mecanico.jpg" alt="Imagen 4">
            <img src="https://3.bp.blogspot.com/-dD4VzxGnp5c/XGdDmXArdCI/AAAAAAAAD-E/_jkN-3DThK8iwNJ9x-QEbRgzgiHT9APmQCLcBGAs/s1600/mecanico.jpg" alt="Imagen 5">
            <img src="https://3.bp.blogspot.com/-dD4VzxGnp5c/XGdDmXArdCI/AAAAAAAAD-E/_jkN-3DThK8iwNJ9x-QEbRgzgiHT9APmQCLcBGAs/s1600/mecanico.jpg" alt="Imagen 6">
            <img src="https://th.bing.com/th/id/OIP.tjCV6b4RKtOLCEXQoKnftAHaE8?pid=ImgDet&rs=1" alt="Imagen 7">
            <img src="https://th.bing.com/th/id/OIP.tjCV6b4RKtOLCEXQoKnftAHaE8?pid=ImgDet&rs=1" alt="Imagen 8">
            <img src="https://th.bing.com/th/id/OIP.tjCV6b4RKtOLCEXQoKnftAHaE8?pid=ImgDet&rs=1" alt="Imagen 9"> -->
            <p></p>
        </div>

        <!-- Modal para las imágenes de publicidad -->
        <div id="adModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="modalAdImage">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        // Inicializar el carrusel
        $('.carousel').slick();

        // Obtener las imágenes de publicidad
        const adImages = document.querySelectorAll(".advertisement img");

        // Obtener el modal de publicidad y su contenido
        const adModal = document.getElementById("adModal");
        const modalAdImage = document.getElementById("modalAdImage");

        // Recorrer las imágenes de publicidad y agregar un evento de clic a cada una
        adImages.forEach((image, index) => {
            image.addEventListener("click", () => {
                adModal.style.display = "block"; // Mostrar el modal
                modalAdImage.src = image.src; // Establecer la imagen en el modal
            });
        });

        // Cerrar el modal cuando se hace clic en la "x"
        const close = document.querySelector(".close");
        close.addEventListener("click", () => {
            adModal.style.display = "none";
        });

        // Cerrar el modal cuando se hace clic fuera del contenido del modal
        window.addEventListener("click", (event) => {
            if (event.target === adModal) {
                adModal.style.display = "none";
            }
        });
    </script>
</body>

</html>