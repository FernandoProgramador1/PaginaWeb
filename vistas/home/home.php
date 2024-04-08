<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Web</title>
</head>

<body>
    <header>
        <h1>Encabezado.</h1>
    </header>

    <section id="carruselPrincipal">
        <div id="carruselHome" class="carousel slide" data-bs-ride="true">
            <div class="carousel-inner">
                <div class="carousel-item active carruselImg">
                    <img src="https://placehold.co/600x400" alt="PlaceholderImg">
                </div>
                <div class="carousel-item carruselImg">
                    <img src="https://placehold.co/600x400" alt="PlaceholderImg">
                </div>
                <div class="carousel-item carruselImg">
                    <img src="https://placehold.co/600x400" alt="PlaceholderImg">
                </div>
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
                <div class="carousel-item active">
                    <div class="d-flex">
                        <img src="recursos\img\ASPEL-ICONO-VERT_COI-1.webp" alt="Software 1">
                        <img src="recursos\img\ASPEL-ICONO-VERT_SAE.webp" alt="Software 2">
                        <img src="https://placehold.co/300x200" alt="Software 3">
                        <img src="https://placehold.co/300x200" alt="Software 4">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex">
                        <img src="https://placehold.co/300x200" alt="Software 1">
                        <img src="https://placehold.co/300x200" alt="Software 2">
                        <img src="https://placehold.co/300x200" alt="Software 3">
                        <img src="https://placehold.co/300x200" alt="Software 4">
                    </div>
                </div>
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