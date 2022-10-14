<?php
require "./personas/crear_personas.php";

$idPersona = crearPersonas($datos);

if ($idPersona) {//compruebo que hay un id//
    $sqlpersonal = "INSERT INTO 
                    personal (persona_id) 
                    VALUES (?)";
    if($consulta = $enlace->prepare($sqlpersonal)){
        $consulta->bind_param('i',$idPersona);
        if ($consulta->execute()) {
            $idPersonal = $consulta->insert_id;
            $enlace->close();
            header("location: /personal/perfil.php?id={$idPersonal}");
            exit;
        }
    }
}else{
        echo "fallo la operacion";
}else{
echo "no preparado";
}
$enlace->close();