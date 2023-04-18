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
            clientes.id as cliente_id,
            clientes.persona_id
        from
            personas
        left join
            clientes 
            ON 
            clientes.persona_id = personas.id
        where
            dni = ? 
            AND
            clientes.password = ?     
        ";

$enlace = conectabd();

if ($consulta = $enlace->prepare($sql)) {
    $consulta->bind_param(
                        'is',
                        $dni,
                        $password,
                    );
    if ($consulta->execute()){
        $cliente = $consulta->get_result();
        $fila = $cliente -> fetch_assoc() ;           
        
        if (count($fila)>0){
            session_start();
            $_SESSION ['id'] = $fila['id'];
            $_SESSION ['nombre'] = $fila['nombre'];
            $_SESSION ['apellido'] = $fila['apellido'];
            $_SESSION ['dni'] = $fila['dni'];
            $_SESSION ['email'] = $fila['email'];
            $_SESSION ['cliente_id'] = $fila['cliente_id'];  
            header("location: ../cliente/perfil.php?id={$_SESSION ['cliente_id']}");
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