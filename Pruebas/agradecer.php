<?php

require 'configdb.php';

function conectar(){
    $conexion=new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);
    $conexion->set_charset("utf8");
    return $conexion;
}

function selectmultiple(){
    $conexion=conectar();
    $sql="select puesto,nombre from alumnos;";
    $resultado=$conexion->query($sql);
    while($fila=$resultado->fetch_array()){
        echo '<option value="'.$fila["puesto"].'">'.$fila["nombre"].'</option>';
    }
    $conexion->close();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <link rel="stylesheet" href="proyecto.css" type="text/css">
    <title>Agradecer</title>

<!--Links para fuentes de google-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&display=swap" rel="stylesheet"><title>Document</title>
</head>
<body>
    <header>
        <h1>AGRADECE EN COMPAÑIA</h1>
        <img src="./imagenes/fot1.png" alt="Logo EVG">
    </header>
        <nav>                
                <a href="home.html">Home</a>
                <a href="agradecer.php">Agradecer</a>
                <a href="agradecimientos.html">Agradecimientos</a>
                <a href="ini_ses.html">Cerrar sesión</a>
        </nav>
    
    <form method="post" action="mostrar_datos.php">
        <h2>Para: </h2>
            <select name="usuariosselect" id="usuariosselect">
                <?php
                    selectmultiple();
                ?>
               
            </select><br><br>
            <label for="mensaje">Mensaje de agradecimiento:</label><br>
            <textarea id="mensaje" name="mensaje" rows="13" cols="109" required></textarea><br><br>
            
            <div class="info">
                <h4>¿Cómo funciona?</h4>
                <p>1. Elige compañero</p>
                <p>2. Escribe mensaje</p>
                <p>3. Se envía anónimo</p>
            </div>
            <p>Recuerda que tu mensaje de agradecimiento será anónimo, así que siéntete libre de expresar tu gratitud de manera sincera y positiva. ¡Tu compañero/a se lo agradecerá mucho!</p>
            <input type="submit" value="Enviar">
        </fieldset>
        
           
    </form>
</body>
</html>
