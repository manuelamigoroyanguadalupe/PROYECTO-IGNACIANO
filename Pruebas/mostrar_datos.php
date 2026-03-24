<?php
session_start();

require 'configdb.php';

function conectar(){
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
    $conexion->set_charset("utf8");
    return $conexion;
}

$id_remitente = $_SESSION['puesto'];
$id_destinatario = $_POST['usuariosselect'];
$mensaje = $_POST['mensaje'];

$conexion = conectar();


$sql_insert = "INSERT INTO agradecimientos (id_remitente, id_destinatario, mensaje)
               VALUES ($id_remitente, $id_destinatario, '$mensaje')";
$conexion->query($sql_insert);


$sql = "SELECT nombre FROM alumnos WHERE puesto = $id_destinatario";
$resultado = $conexion->query($sql);

$nombre = $resultado->fetch_assoc()['nombre'];

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Autor">
    <link rel="stylesheet" href="proyecto.css" type="text/css">
    <title>Home</title>

<!--Links para fuentes de google-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&display=swap" rel="stylesheet">
</head>
<body>


    <p>Mensaje enviado correctamente</p>
    <br>
    <a href="agradecer.php">Volver</a>

</body>
</html>
