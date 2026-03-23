<?php

require 'configdb.php';

function conectar(){
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
    $conexion->set_charset("utf8");
    return $conexion;
}

// Recoger datos del formulario
$puesto = $_POST['usuariosselect'];
$mensaje = $_POST['mensaje'];

// Conectar para obtener el nombre del alumno seleccionado
$conexion = conectar();

$sql = "SELECT nombre FROM alumnos WHERE puesto = '$puesto'";
$resultado = $conexion->query($sql);

$fila = $resultado->fetch_assoc();
$nombre = $fila['nombre'];

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


    <p>Para:<?php echo $nombre; ?></p>

    <p>Mensaje:<?php echo $mensaje; ?></p>
    

    <br>
    <a href="agradecer.php">Volver</a>

</body>
</html>