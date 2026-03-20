<?php
  //Necesitar hacer include o require del archivo que tiene la conexión
  function conectar(){
	$conexion = new mysqli("1daw.esvirgua.com", "01@1daw.esvirgua.com	", "P.5axu-kb-@~NEck", "user1daw_BD1-01");
	$conexion->set_charset("utf8"); 
    return $conexion;
  }
  
  //Función para mostrar filas de una tabla
  function mostrar_alumnos(){ 
	//Conecta con la base de datos y crea el objeto $conexión.
	$conexion=conectar();  
	
	//Ejecuta la consulta sql
	$sql='select * from alumnos;';    //limit 3 //Te enseña 3 filas
	$resultado=$conexion->query($sql);	
	
    
    for(i=0;i<3;i++){
	//Extrae cada una fila del resultado de la consulta
	$fila=$resultado->fetch_array();
                //Ejemplo que muestra un campo
            echo '<p>';
            echo 'Id alumno: '.$fila["id_alumno"];
            echo 'Nombre alumno: '.$fila["nombre"];  
            echo '</p>';
    }
    
  }
 ?>