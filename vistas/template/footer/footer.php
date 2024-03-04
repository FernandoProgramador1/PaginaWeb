<?php
require_once('modelos/model_contactos.php');
?>

<footer id="Contacto" class="footer-bg pt-1 pb-1 mt-5">
    <div class="footer-container">
        <div class="row">

            <!-- Logo de la Empresa -->
            <div class="col-lg-3 col-md-3">
                <img src="recursos/img/LOGO-SSETCO.jpeg" alt="Logo" class="footer-logo" />
            </div>

            <!-- Menú -->
            <div class="col-lg-3 col-md-3">
                <h5 class="footer-title text-uppercase">Menú</h5>
                <ul class="list-unstyled footer-menu"> <!-- Agregado una clase "footer-menu" al ul -->
                    <li><a href="index.php" class="footer-link">Inicio</a></li>
                    <li><a href="index.php?page=Productos" class="footer-link">Productos</a></li>
                    <li><a href="index.php?page=Nosotros" class="footer-link">Nosotros</a></li>
                    <!-- <li><a href="#" class="footer-link">Contacto</a></li> -->
                </ul>
            </div>
            <?php
            foreach ($dtcontactos as $row) :
            ?>
                <!-- Contacto directo -->
                <div class="col-lg-3 col-md-3">
                    <h5 class="footer-title text-uppercase">Contacto</h5>
                    <p><a href="mailto<?php echo $row["Correo"] ?>" class="footer-link"><?php echo $row["Correo"] ?></a></p>
                    <p><a href="tel:+<?php echo $row["Telefono"] ?>" class="footer-link">+<?php echo $row["Telefono"] ?></a></p>
                </div>
                <!-- Redes Sociales -->
                <div class="col-lg-3 col-md-3">
                    <h5 class="footer-title text-uppercase">Dirección</h5>
                    <ul class="list-unstyled footer-menu"> <!-- Agregado una clase "footer-menu" al ul -->
                        <li><a href="#" class="footer-link"><?php echo $row["Ciudad"] . ", " . $row["Estado"] . ", " . $row["CodigoP"] ?></a></li>
                        <!-- <li><a href="#" class="footer-link">Nosotros</a></li>
                    <li><a href="#" class="footer-link">Contacto</a></li> -->
                    </ul>
                </div>
            <?php
            endforeach;
            ?>

            <?php
            if ((!empty($dtcontactos)) && (isset($dtcontactos))) {
                foreach ($dtcontactos as $contac) :
            ?>
                    <a href="https://wa.me/1<?php echo $contac["Telefono"] ?>" class="whatsapp" target="_blank"> <i class="fab fa-whatsapp footer-i whatsapp-icon"></i></a>
            <?php
                endforeach;
            }
            ?>

        </div>
    </div>
</footer>

<script src="recursos/lib/jquery/dist/jquery.js"></script>
<script src="recursos/lib/jquery/dist/jquery.min.js"></script>
<script src="recursos/lib/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="recursos/lib/jquery-validation-unobtrusive/jquery.validate.unobtrusive.min.js"></script>
<script src="recursos/JS/site.js"></script>

<script src="recursos/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->