<?php

session_start();
include 'conexion_be.php';

$correoE = $_POST['correoE'];
$contrasena = $_POST['contrasena'];

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correoE = '$correoE' AND contrasena = '$contrasena'");

if (mysqli_num_rows($validar_login) > 0) {
    $_SESSION['correoE'] = $correoE;
    header("Location: ../HOME2.php");
    exit;
} else {
    echo '
    <script>
    alert("Usuario no existe o las credenciales son incorrectas, por favor verifique los datos introducidos");
    window.location = "../index.php";
    </script>
    ';
    exit;
}
