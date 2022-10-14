<?php
require "./personas/crear_personas.php";

$idPersona = crearPersonas($datos);

if ($idPersona) {//compruebo que hay un id//
    $sqlcliente = "INSERT INTO 
                    clientes (persona_id) 
                    VALUES (?)";
    if($consulta = $enlace->prepare($sqlcliente)){
        $consulta->bind_param('i',$idPersona);
        if ($consulta->execute()) {
            $idCliente = $consulta->insert_id;
            $enlace->close();
            header("location: /cliente/perfil.php?id={$idCliente}");
            exit;
        }
    }
}else{
        echo "fallo la operacion";
}else{
echo "no preparado";
}
$enlace->close();