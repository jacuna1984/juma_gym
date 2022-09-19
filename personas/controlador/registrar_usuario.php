<?php
if (!empty($_POST["registro"])) {
    if (empty($_POST["dni"]) or empty($_POST["nombre"]) or empty($_POST["apellido"]) or empty($_POST["email"])) {
        echo 'los campos dni o nombre o apellido o email están vacíos';
    }
}
?>