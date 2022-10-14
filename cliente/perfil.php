<?php
require "../settings/conexion.php";
$enlace = conectabd();

$idCliente = $_GET['id'];
$sql = "SELECT 
        personas.id,
        personas.dni,
        personas.nombre, 
        personas.apellido, 
        personas.email, 
        personas.fecha_nac, 
        personas.telefono,
        clientes.persona_id,
        clientes.id
        FROM
        clientes
        LEFT JOIN
        personas
        ON
        personas.id = clientes.persona_id
        WHERE
        clientes.id = ?
        ";

    if ($consulta = $enlace->prepare($sql)) {
        $consulta->bind_param('i',$idCliente);
        if ($consulta->execute()) {
            $resultado = $consulta->get_result();
            $perfil = $resultado->fetch_assoc();            
        } else{
            echo"no ejecutado";
        }
    } else{
        echo "no preparado";
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/estilo/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Perfil</title>
</head>
<body>
    <h1 class="title_perfil"> Perfil </h1>

<div class="card" style="width: 18rem;">
    <img src="img\logojuma.jpeg" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Cliente</h5>
        <p class="card-text">Miembro de Jumagim, desempeñando tareas de tonificación para una mejor salud del cuerpo.</p>
    </div>
    <ul class="list-group list-group-flush">
        <dl>
            <dt>Nombre</dt>
            <dd class="name1"> <?php echo $perfil['dni']; ?> </dd>
            <dd class="name1"> <?php echo $perfil['nombre']; ?> </dd>
            <dd class="name1"> <?php echo $perfil['apellido']; ?> </dd>
            <dd class="name1"> <?php echo $perfil['fecha_nac']; ?> </dd>
        </dl>        
    </ul>
    <div class="card-body">
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
    </div>
    <a class="btn btn-primary" href="../index.html" role="button" name="main">
                    Regresar a Principal</a>
</div>
</body>
</html>