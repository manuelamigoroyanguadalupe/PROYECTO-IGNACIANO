<?php
session_start();
require_once 'conexion.php';

// 🔒 Validar sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: ini_ses.html");
    exit();
}

// 🔹 Obtener el equipo del usuario logueado (receptor)
$usuario = $_SESSION['usuario'];
$stmt = $conexion->prepare("SELECT equipo FROM alumnos WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();
$fila = $result->fetch_assoc();

if (!$fila) {
    die("Error: usuario no encontrado");
}

$idUsuario = str_pad($fila['equipo'], 2, "0", STR_PAD_LEFT);

// 🔹 Obtener todos los agradecimientos que le llegan
$sql = "SELECT 
            a.mensaje,
            em.nombreJesuita,
            em.infoJesuita,
            rec.nombre AS nombreReceptor
        FROM agradecimientos a
        JOIN alumnos em ON a.idEmisor = em.equipo
        JOIN alumnos rec ON a.idReceptor = rec.equipo
        WHERE a.idReceptor = ?
        ORDER BY a.fecha_hora DESC";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $idUsuario);
$stmt->execute();
$resultado = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agradecimientos</title>
    <link rel="stylesheet" href="proyecto.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>

<body>


<br><br>

<?php
if ($resultado->num_rows === 0) {
    echo "<p>No has recibido ningún agradecimiento todavía.</p>";
} else {
    while ($fila = $resultado->fetch_assoc()) {
        $mensaje = $fila["mensaje"];
        $jesuita = $fila["nombreJesuita"];
        $infoJesuita = $fila["infoJesuita"];
        $receptor = $fila["nombreReceptor"];
        ?>
        
        <div class="contenedor">  
            <div class="izquierda">
                <img src="./imagenes/jesuita1.jpg" alt="Jesuita">
                <p>Has recibido un agradecimiento</p>
            </div>

            <div class="derecha">
                <h2>Para: <?php echo $receptor; ?></h2>

                <h3>Mensaje recibido:</h3>
                <div class="mensaje">
                    <?php echo $mensaje; ?>
                </div>

                <h3>Jesuita:</h3>
                <p><?php echo $jesuita; ?></p>

                <p><?php echo $infoJesuita; ?></p>
            </div>
        </div>
        <br>

        <?php
    }
}
?>

</body>
</html>
