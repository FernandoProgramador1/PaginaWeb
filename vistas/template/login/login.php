<?php
include_once("modelos/model_login.php");
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Iniciar Sesión</title>

<div class="justify-content-center d-flex mt-5 mb-5">
    <div class="login-container">
        <div class="login-logo-container">
            <img src="recursos/img/LOGO-SSETCO.jpeg" alt="Logo" style="max-height:50px !important; max-width:100px !important;" />
        </div>
        <form action="loginProcess.php" method="post">
            <div class="login-input-group">
                <span class="login-icon"><img src="recursos/iconos/usuario.svg"></span>
                <input type="text" name="username" placeholder="Usuario" class="login-input">
            </div>
            <div class="login-input-group">
                <span class="login-icon"><img src="recursos/iconos/pass.svg"></span>
                <input type="password" name="password" placeholder="Contraseña" class="login-input">
            </div>
            <button type="submit" class="login-button">Entrar</button>
        </form>
    </div>
</div>