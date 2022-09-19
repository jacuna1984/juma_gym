<?php
function conectabd(){
    $servidor="localhost";
    $usuario="root";
    $pass="";
    $bdname="jumagim";
    $conecta=mysqli_connect($servidor, $usuario, $pass, $bdname);
    mysqli_set_charset($conecta,"utf8");
    if(!$conecta){
        die("error de conexion");
    }
    return $conecta;
}
?>


   <!--  /* $host = 'localhost';
    $dbname = 'jumagim';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        echo "La conexión a $dbname del $host fue satisfactorio.";
    } catch (PDOException $pe) {
        die("No es posible la conexion a $dbname :" . $pe->getMessage());
    } */
 -->

