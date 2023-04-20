<?php
require "../settings/conexion.php";

$dni = $_POST['dni'];

$sql = "SELECT
            personas.id,
            personas.nombre,
            personas.apellido,
            personas.dni,
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
        ";

$enlace = conectabd();

if ($consulta = $enlace->prepare($sql)) {
    $consulta->bind_param(
                        'i',
                        $dni,
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
            $_SESSION ['cliente_id'] = $fila['cliente_id'];
            header(alert("Presente registrado"));
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