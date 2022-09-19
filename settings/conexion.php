<?php
require "credenciales.php";

function conectabd(){
    $enlace = new mysqli(DB_HOST,DB_USER, DB_PASS, DB_NAME,DB_PORT);
    mysqli_set_charset($enlace,"utf8");
        if($enlace->connect_error){
            die("error de conexion: ".$enlace->connect_error);
        }
        return $enlace;
}

?>
