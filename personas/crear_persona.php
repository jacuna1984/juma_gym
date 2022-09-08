<?php
require "conexion.php";
$mysql=conectabd();
$dni=$_POST ["dni"];
$password=$_POST ["password"];
$nombre=$_POST ["nombre"];
$apellido=$_POST ["apellido"];
$sql="insert into personas(dni,password,nombre,apellido) values($dni,$password,'{$nombre}','{$apellido}')";
$resultado=$mysql->query($sql);
/* echo $sql; */
print_r($_POST);