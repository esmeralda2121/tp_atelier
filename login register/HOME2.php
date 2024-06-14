<?php
session_start();

// Verificar si la sesión no está iniciada
if (!isset($_SESSION['correoE'])) {
    // Si la sesión no está iniciada, redirigir al usuario a la página de inicio de sesión
    echo '
        <script> 
        alert("Por favor, debes iniciar sesión");
        window.location = "index.php";
        </script>
    ';
    exit;
}

// Si la sesión está iniciada, mostrar el contenido de la página
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar">
    <a class="navbar-brand mx-auto" href="#">
        <img src="imagenes/klipartz.com.png" alt="Logo" height="70">
    </a>
    <div class="container-fluid">
        <a class="navbar-brand" href="php/cerrar_sesion.php">Cerrar Sesión</a>
    </div>
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="2.php" id="HOME2-link">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="usuarios-link">Usuarios</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Productos</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" id="listaprodu-link" href="#">Lista de productos</a></li>
                        <li><a class="dropdown-item" id="cargap-link" href="#">Carga de productos</a></li>
                        <li><hr class="dropdown-divider"></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Proveedores</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" id="listaprovee-link" href="#">Lista de proveedores</a></li>
                        <li><a class="dropdown-item" id="cargaprov-link" href="#">Carga de proveedores</a></li>
                        <li><hr class="dropdown-divider"></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Clientes</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" id="listacliente-link" href="#">Lista de Clientes</a></li>
                        <li><a class="dropdown-item" id="cargacliente-link" href="#">Cargar de Clientes</a></li>
                        <li><hr class="dropdown-divider"></li>
                    </ul>
                </li>
            </ul>   
        </div>
    </div>
</nav>

<div class="container mt-5 pt-5" id="workspace">
    <link rel="stylesheet" href="estilos.css">
    
    <div id="carouselExampleDark" class="carousel carousel-dark slide mx-auto" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="imagenes/pxfuel3.jpg" class="d-block w-100" alt="Imagen 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-uppercase fw-bold">Imagen 1</h5>
                    <p class="fs-5">
                        <span style="background-color: rgba(255, 255, 255, 0.5); padding: 5px;">Descripción de la Imagen 1</span>
                    </p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="imagenes/descarga11.jpg" class="d-block w-100" alt="Imagen 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-uppercase fw-bold">Imagen 2</h5>
                    <p class="fs-5">
                        <span style="background-color: rgba(255, 255, 255, 0.5); padding: 5px;">Descripción de la Imagen 2</span>
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="imagenes/descarga11.jpg" class="d-block w-100" alt="Imagen 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-uppercase fw-bold">Imagen 3</h5>
                    <p class="fs-5">
                        <span style="background-color: rgba(255, 255, 255, 0.5); padding: 5px;">Descripción de la Imagen 3</span>
                    </p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Example of dynamically loading content via jQuery (ensure these files exist)
        $("#HOME2-link").click(function () {
            $.get("2.php", function (data) {
                $("#workspace").html(data);
            });
        });

        $("#usuarios-link").click(function () {
            $.get("usuarios/index.php", function (data) {
                $("#workspace").html(data);
            });
        });

        $("#listaprodu-link").click(function () {
            $.get("listaprodu/index.php", function (data) {
                $("#workspace").html(data);
            });
        });

        $("#cargap-link").click(function () {
            $.get("cargap/index.php", function (data) {
                $("#workspace").html(data);
            });
        });

        $("#listaprovee-link").click(function () {
            $.get("listaprovee/index.php", function (data) {
                $("#workspace").html(data);
            });
        });

        $("#cargaprov-link").click(function () {
            $.get("cargaprov/index.php", function (data) {
                $("#workspace").html(data);
            });
        });

        $("#listacliente-link").click(function () {
            $.get("listacliente/index.php", function (data) {
                $("#workspace").html(data);
            });
        });

        $("#cargacliente-link").click(function () {
            $.get("cargacliente/index.php", function (data) {
                $("#workspace").html(data);
            });
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
