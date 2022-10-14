<?php
require "../settings/conexion.php";

$persona = [
    'dni' => $_POST["dni"],
    'nombre' => $_POST["nombre"],
    'apellido' => $_POST["apellido"],
    'email' => $_POST['email'],
    'fechadenacimiento' => $_POST['fechadenacimiento'],
    'telefono' => $_POST['telefono']
];

/**
 * @param array $persona
 * @return int $idPersona
 */
function crearPersona($persona){

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
                                $persona ['dni'],
                                $persona ['nombre'],
                                $persona ['apellido'],
                                $persona ['email'],
                                $persona ['fechadenacimiento'],
                                $persona ['telefono']);
        if ($consulta->execute()){
            $idPersona = $consulta->insert_id;
            $consulta->free_result();
        }
    //cerrar conexion
    //return de id persona
    return $idPersona;
    }
}
?>