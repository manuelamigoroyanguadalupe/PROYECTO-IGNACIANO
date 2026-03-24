<?php
session_start();
include 'configdb.php';

$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
$conexion->set_charset("utf8");

$puesto = $_POST["puesto"];
$contrasena = $_POST["contrasena"];

$sql = "SELECT puesto FROM alumnos 
        WHERE puesto='$puesto' 
        AND contrasena='$contrasena'";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0){
    $fila = $resultado->fetch_assoc();

    $_SESSION['puesto'] = $fila["puesto"];

    header("Location: home.html");
    exit();

} else {
    echo "Usuario o contraseña incorrectos<br>";
    echo '<a href="ini_ses.html">Volver</a>';
}

$conexion->close();
?>
