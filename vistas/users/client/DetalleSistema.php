<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web | Detalle Sistema</title>
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

        <section class="sistemaDetalle-gallery custom-section detalleSis">
            <h2 class="detallesHeading">Galería</h2>
            <p>Capturas de pantalla y otras imágenes del software.</p>

            <div class="container text-center my-3">
                <div class="row mx-auto my-auto justify-content-center">
                    <div id="recipeCarousel" class="carousel slide detalleSis" data-bs-ride="carousel">
                        <div class="carousel-inner detalleSis" role="listbox">
                            <div class="carousel-item active detalleSis">
                                <div class="col-md-3 detalleSis">
                                    <div class="card detalleSis">
                                        <div class="card-img detalleSis">
                                            <img src="https://placehold.co/700x500" class="img-fluid detalleSis">
                                        </div>
                                        <div class="card-img-overlay detalleSis">Slide 1</div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item detalleSis">
                                <div class="col-md-3 detalleSis">
                                    <div class="card detalleSis">
                                        <div class="card-img detalleSis">
                                            <img src="https://placehold.co/700x500" class="img-fluid detalleSis">
                                        </div>
                                        <div class="card-img-overlay detalleSis">Slide 2</div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item detalleSis">
                                <div class="col-md-3 detalleSis">
                                    <div class="card detalleSis">
                                        <div class="card-img detalleSis">
                                            <img src="https://placehold.co/700x500" class="img-fluid detalleSis">
                                        </div>
                                        <div class="card-img-overlay detalleSis">Slide 3</div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item detalleSis">
                                <div class="col-md-3 detalleSis">
                                    <div class="card detalleSis">
                                        <div class="card-img detalleSis">
                                            <img src="https://placehold.co/700x500" class="img-fluid detalleSis">
                                        </div>
                                        <div class="card-img-overlay detalleSis">Slide 4</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev bg-transparent w-aut detalleSis" href="#recipeCarousel" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next bg-transparent w-aut detalleSis" href="#recipeCarousel" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>

</html>