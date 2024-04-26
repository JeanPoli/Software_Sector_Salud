<?php 
    $servidor='localhost';
    $usuario= 'root';
    $pass='';

    try {
        $conexion= new PDO("mysql:host=$servidor;dbname=SoftwareSalud_DB",$usuario,$pass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        #echo "Conexion establecida correctamente";
    } catch (PDOException $e) {
        echo "La conexión ha fallado: " . $e->getMessage();
    }
 
    
?>