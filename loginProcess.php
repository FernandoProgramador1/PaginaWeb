<?php
include_once('controladores/controller_login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; // Asegúrate de usar hashing en el modelo

    $controller = new UsuarioController();
    $error = $controller->loginUser($username, $password);

    if ($error) {
        // Mostrar el error en la página de inicio de sesión o usar una sesión para almacenar el mensaje de error.
        header("Location: index.php?Login&error=" . urlencode($error));
    }
}
?>