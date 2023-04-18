<?php
require "../settings/conexion.php";
$enlace = conectabd();

$idPersonal = $_GET['id'];
$sql = "SELECT 
        personas.id,
        personas.dni,
        personas.nombre,
        personas.apellido,
        personas.email,
        personas.fecha_nac,
        personas.telefono,
        personal.persona_id,
        personal.id
        FROM
        personal
        LEFT JOIN
        personas
        ON
        personas.id = personal.persona_id
        WHERE
        personal.id = ?
        ";

    if ($consulta = $enlace->prepare($sql)) {
        $consulta->bind_param('i',$idPersonal);
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
    <title>Perfil Personal</title>
</head>
<body>
    <div class="closesession">
        <ul class="nav nav-pills justify-content-end">
        <h1 class="title_perfil"> Perfil </h1>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Cerrar Sesión</a>
            </li>
        </ul>
    </div>

<div class="card" style="width: 18rem;">
    <img src="img\logojuma.jpeg" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Personal</h5>
        <p class="card-text">Miembro de Jumagim, desempeñando tareas de control y asesoramiento a los clientes.</p>
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
    <div class="logout">
        <a class="btn btn-primary" href="../auth/logout.php" name="logout">
                    Cerrar Sesión</a>
    </div>
</div>
</body>
</html>