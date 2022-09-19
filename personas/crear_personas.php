<?php
require "conexion.php";

$dni = $_POST["dni"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST['email'];
$fechadenacimiento = $_POST['fechadenacimiento'];
$telefono = $_POST['telefono'];

$errores = [];
if(is_null($dni)){
    $errores['dni'] = 'El campo dni es obligatorio, no debe quedar vacío';
}
if(is_null($nombre)){
    $errores['nombre'] = 'El campo bombre es obligatorio, no debe quedar vacío';
}
if(is_null($apellido)){
    $errores['apellido'] = 'El campo apellido es obligatorio, no debe quedar vacío';
}
if(is_null($email)){
    $errores['email'] = 'El campo email es obligatorio, no debe quedar vacío';
}

if($errores != []){
    $params = '';
    foreach ($errores as $key => $value) {
        $params .= "{$key}={$value}";
    }
    header("location: /personas/crear.html?{$params}");
}

$enlace = conectabd();

$sql = "INSERT INTO 
        personas(dni,
        nombre,
        apellido,
        email,
        fecha_nac,
        telefono) 
        VALUES
        (?,?,?,?,?,?)";
if ($consulta = $enlace->prepare($sql)) {
    $consulta->bind_param('isssss',
                            $dni,
                            $nombre,
                            $apellido,
                            $email,
                            $fechadenacimiento,
                            $telefono);

    if ($consulta->execute()){
        $idPersona = $consulta->insert_id;
        $consulta->free_result();
//cerrar conexion
//return de id persona
        if ($idPersona) {//compruebo que hay un id//
            $sqlcliente = "INSERT INTO 
                            clientes (persona_id) 
                            VALUES (?)";

            if($consulta2 = $enlace->prepare($sqlcliente)){
                $consulta2->bind_param('i',$idPersona);

                if ($consulta2->execute()) {
                    $idCliente = $consulta2->insert_id;
                    $enlace->close();
                    header("location: /cliente/perfil.php?id={$idCliente}");
                    exit;
                }
            }
        }    
        echo "Operacion Exitosa";
    } else {
        echo "fallo la operacion";
    }
} else{
    echo "no preparado";
}
$enlace->close();

// print_r($_POST);
?>