<?php
require '../assets/icon/iconcheck.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilo/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../cliente/css/estilo.css">
    <link rel="stylesheet" href="../assets/icon/fontawesome-free-6.2.0-web/css/all.css">
    <link rel="stylesheet" href="../assets/icon/fontawesome-free-6.2.0-web/webfonts/fa-brands-400.ttf">
    <title>Menú Cliente</title>
</head>
<body>
    <!-- Sidebar -->
        <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Offcanvas dark navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Altas
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="#">Cliente</a></li>
                <li><a class="dropdown-item" href="#">Profesor</a></li>
                <li><a class="dropdown-item" href="#">Administrador</a></li>
                <li>
                    <!-- <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                </ul>
            </li>
            </ul>
            <form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
            </form>
        </div>
        </div>
    </div>
    </nav>
    <!-- fin-Sidebar -->

    <!--Tarjetas-->
    <div class="title-cards">
        <h2>JUMA GYM<i class="fa-solid fa-check"></i></h2>
    </div>
    <div class="container-card">   
        <div class="card1">
            <picture class="img1">
                <img src="https://i.pinimg.com/474x/84/7a/31/847a31f901d1364b525aa2cf191769ab.jpg">
            </picture>
                <div class="contenido-card">
                    <h3>Asistencias</h3>
                </div>
        </div> 
        <div class="card2">
            <picture class="img2">
                <img src="https://i.pinimg.com/474x/da/f6/28/daf62862e296262dae7af14e12f71681.jpg">
            </picture>
                <div class="contenido-card">
                    <h3>Rutinas</h3>	
                </div>
        </div>
        <div class="card3">
            <picture class="img3">
                <img src="https://i.pinimg.com/474x/ce/f9/7a/cef97a7a78d6928b52d20a881a2d31ed.jpg">
            </picture>
                <div class="contenido-card">
                    <h3>Cuotas</h3>            
                </div>
        </div>
    </div>
    <!--/Tarjetas-->
    <!-- <script src="../estilo/bootstrap-5.2.0-dist/js/bootstrap.min.js"></script> -->
    <script src="../estilo/bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>