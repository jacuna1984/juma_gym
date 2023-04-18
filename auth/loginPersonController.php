<?php
require "../settings/conexion.php";

$dni = $_POST['dni'];
$password = $_POST['password'];

$sql = "SELECT
            personas.id,
            personas.nombre,
            personas.apellido,
            personas.dni,
            personas.email,
            personal.id as personal_id,
            personal.persona_id            
        from
            personas
        left join
            personal 
            ON 
            personal.persona_id = personas.id
        where
            dni = ? 
            AND
            personal.password = ?     
        ";

$enlace = conectabd();

if ($consulta = $enlace->prepare($sql)) {
    $consulta->bind_param(
                        'is',
                        $dni,
                        $password,
                    );
    if ($consulta->execute()){
        $personal = $consulta->get_result();
        $fila = $personal -> fetch_assoc() ;           
        
        if (count($fila)>0){
            session_start();
            $_SESSION ['id'] = $fila['id'];
            $_SESSION ['nombre'] = $fila['nombre'];
            $_SESSION ['apellido'] = $fila['apellido'];
            $_SESSION ['dni'] = $fila['dni'];
            $_SESSION ['email'] = $fila['email'];
            $_SESSION ['personal_id'] = $fila['personal_id'];  
            header("location: ../personal/perfil.php?id={$_SESSION ['personal_id']}");
            exit;
        }        
        // $consulta->free_result();
    } else {
        echo "fallo";
    }
}
else {
    echo "no está preparado";
}
$enlace->close();
