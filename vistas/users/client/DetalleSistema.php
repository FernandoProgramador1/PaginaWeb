<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web | Detalle Sistema</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="detalleSis-body">
    <header>
        <h1>Nombre del Sistema</h1>
    </header>

    <div class="container custom-container">
        <section class="sistemaDetalle-details custom-section">

            <div class="texto-container">
                <h2 class="detallesHeading">Detalles</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, ex, aut autem earum quos laborum asperiores obcaecati qui ut incidunt, nulla iure odit. Reiciendis nobis modi animi aspernatur itaque ducimus!</p>
            </div>
            <div class="logoSistema-container">
                <img src="recursos\img\ASPEL-ICONO-VERT_COI-1.webp" alt="Logo del sistema" class="logoSistema">
            </div>
        </section>

        <section class="sistemaDetalle-functions custom-section">
            <h2 class="detallesHeading">Funciones</h2>
            <ul class="detalleList">
                <li>
                    <div class="question">
                        <span class="function-name">Función 1</span>
                        <span class="toggle-icon"><i class="fas fa-chevron-right"></i></span>
                    </div>
                    <div class="answer">
                        Información detallada sobre la Función 1.
                    </div>
                </li>
                <li>
                    <div class="question">
                        <span class="function-name">Función 2</span>
                        <span class="toggle-icon"><i class="fas fa-chevron-right"></i></span>
                    </div>
                    <div class="answer">
                        Información detallada sobre la Función 2.
                    </div>
                </li>
                <li>
                    <div class="question">
                        <span class="function-name">Función 3</span>
                        <span class="toggle-icon"><i class="fas fa-chevron-right"></i></span>
                    </div>
                    <div class="answer">
                        Información detallada sobre la Función 3.
                    </div>
                </li>
            </ul>
        </section>

        <section class="sistemaDetalle-requirements custom-section">
            <h2 class="detallesHeading">Requisitos del Sistema</h2>
            <p>Detalles sobre los requisitos de hardware y software.</p>
        </section>

        <section class="sistemaDetalle-faq custom-section">
            <h2 class="detallesHeading">Preguntas Frecuentes</h2>
            <ul class="detalleList">
                <li>
                    <div class="question">
                        ¿Pregunta 1?
                        <span class="toggle-icon"><i class="fa-solid fa-chevron-right"></i></span>
                    </div>
                    <div class="answer">
                        Respuesta a la Pregunta 1.
                    </div>
                </li>
                <li>
                    <div class="question">
                        ¿Pregunta 2?
                        <span class="toggle-icon"><i class="fa-solid fa-chevron-right"></i></span>
                    </div>
                    <div class="answer">
                        Respuesta a la Pregunta 2.
                    </div>
                </li>
                <li>
                    <div class="question">
                        ¿Pregunta 3?
                        <span class="toggle-icon"><i class="fa-solid fa-chevron-right"></i></span>
                    </div>
                    <div class="answer">
                        Respuesta a la Pregunta 3.
                    </div>
                </li>
            </ul>
        </section>

        <section class="sistemaDetalle-gallery custom-section">
            <h2 class="detallesHeading">Galería</h2>
            <p>Capturas de pantalla y otras imágenes del software.</p>
        </section>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var functionQuestions = document.querySelectorAll('.sistemaDetalle-functions .question');
            var faqQuestions = document.querySelectorAll('.sistemaDetalle-faq .question');

            functionQuestions.forEach(function(question) {
                question.addEventListener('click', function() {
                    var answer = this.nextElementSibling;
                    var toggleIcon = this.querySelector('.toggle-icon i');

                    if (answer.classList.contains('active')) {
                        answer.classList.remove('active');
                        toggleIcon.classList.remove('rotated');
                    } else {

                        answer.classList.add('active');
                        toggleIcon.classList.toggle('rotated');
                    }
                });
            });

            faqQuestions.forEach(function(question) {
                question.addEventListener('click', function() {
                    var answer = this.nextElementSibling;
                    var toggleIcon = this.querySelector('.toggle-icon i');

                    if (answer.classList.contains('active')) {
                        answer.classList.remove('active');
                        toggleIcon.classList.remove('rotated');
                    } else {

                        answer.classList.add('active');
                        toggleIcon.classList.toggle('rotated');
                    }
                });
            });
        });
    </script>

</body>

</html>