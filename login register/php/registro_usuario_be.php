<?php

include 'conexion_be.php'; 

// Obtener y sanitizar los datos de entrada
$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$correoE = mysqli_real_escape_string($conexion, $_POST['correoE']);
$usuario_ = mysqli_real_escape_string($conexion, $_POST['usuario_']);
$contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);

// Convertir correo y usuario a minúsculas para comparaciones insensibles a mayúsculas
$correoE = strtolower($correoE);
$usuario_ = strtolower($usuario_);

// Verificar que la conexión a la base de datos sea exitosa
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Verificar que el correo o el usuario no se repitan en la base de datos
$verificar = mysqli_query($conexion, "SELECT * FROM usuarios WHERE LOWER(correoE)='$correoE' OR LOWER(usuario_)='$usuario_'");

if (!$verificar) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

if (mysqli_num_rows($verificar) > 0) {
    echo '
        <script>
        alert("Este correo o usuario ya están registrados, intenta con otros diferentes");
        window.location.href = "../index.php";
        </script>
    ';
    exit();
}

// Insertar el nuevo usuario en la base de datos
$query = "INSERT INTO usuarios (nombre, correoE, usuario_, contrasena) 
          VALUES ('$nombre', '$correoE', '$usuario_', '$contrasena')";

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
        <script> 
            alert("Usuario almacenado exitosamente");
            window.location.href = "../index.php";
        </script>
    ';
} else {
    echo '
        <script> 
            alert("Inténtalo de nuevo, usuario no almacenado");
            window.location.href = "../index.php";
        </script>
    ';
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
