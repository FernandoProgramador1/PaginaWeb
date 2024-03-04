<?php
require_once('modelos/model_contactos.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSetco - Editar Datos de contacto</title>
    <!-- Enlace a Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        .card {
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .card-header {
            background-color: #343a40;
            color: #ffffff;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 25px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title text-center">Editar datos de contacto</h2>
            </div>
            <div class="card-body rounded">
                <?php
                $isEdit = (!empty($dtcontactowhere)) && (isset($dtcontactowhere));
                $formAction = $isEdit ? "index.php?page=InfoContacto&actioncon=update&IdC=$IdC" : "index.php?page=InfoContacto&actioncon=insert";
                if ($isEdit) {
                    foreach ($dtcontactowhere as $row) :
                        $correo = $isEdit ? $row["Correo"] : "";
                        $direccion = $isEdit ? $row["Direccion"] : "";
                        $estado = $isEdit ? $row["Estado"] : "";
                        $ciudad = $isEdit ? $row["Ciudad"] : "";
                        $codigoP = $isEdit ? $row["CodigoP"] : "";
                        $telefono = $isEdit ? $row["Telefono"] : "";
                    endforeach;
                } else {
                    $correo = $isEdit ? $row["Correo"] : "";
                    $direccion = $isEdit ? $row["Direccion"] : "";
                    $estado = $isEdit ? $row["Estado"] : "";
                    $ciudad = $isEdit ? $row["Ciudad"] : "";
                    $codigoP = $isEdit ? $row["CodigoP"] : "";
                    $telefono = $isEdit ? $row["Telefono"] : "";
                }
                ?>
                <form method="post" action="<?php echo $formAction ?>" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="email" class="form-label">Correo Electrónico:</label>
                            <input name="Correo" type="email" class="form-control" id="email" value="<?php echo $correo ?>" required>
                        </div>
                        <div class="col">
                            <label for="state" class="form-label">Dirección:</label>
                            <input name="Direccion" type="text" class="form-control" id="state" value="<?php echo $direccion ?>" required>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="state" class="form-label">Estado:</label>
                            <input name="Estado" type="text" class="form-control" id="state" value="<?php echo $estado ?>" required>
                        </div>
                        <div class="col">
                            <label for="city" class="form-label">Ciudad:</label>
                            <input name="Ciudad" type="text" class="form-control" id="city" value="<?php echo $ciudad ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="zipcode" class="form-label">Código Postal:</label>
                            <input name="CodigoP" type="text" class="form-control" id="zipcode" value="<?php echo $codigoP ?>" required>
                        </div>
                        <div class="col">
                            <label for="phone" class="form-label">Teléfono:</label>
                            <input name="Telefono" type="tel" class="form-control" id="phone" value="<?php echo $telefono ?>" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary rounded">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bibliotecas JS de terceros -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script> -->
</body>

</html>