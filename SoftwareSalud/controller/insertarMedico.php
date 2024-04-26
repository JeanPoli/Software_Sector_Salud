<?php

    include '../model/conexion.php';


    if (!isset($_POST['id']) || !isset($_POST['nombre']) || !isset($_POST['especialidad']) || !isset($_POST['telefono'])) {
        exit();
    }

    $identificacion= $_POST['id'];
    $medico= $_POST['nombre'];
    $especialidad= $_POST['especialidad'];
    $telefono= $_POST['telefono'];

    
    try {
        $sql = $conexion->prepare("INSERT INTO Medico (ID_Medico,Nombre,Especialidad,Telefono) VALUES(?,?,?,?)");
        $resultado= $sql->execute([$identificacion,$medico,$especialidad,$telefono]);

        if ($resultado) {
            echo '<script language="javascript">
            alert("Dato ingresado correctamente");
            window.location.href="../views/medicos.php"</script>';
        }else{
            echo '<script language="javascript">
            alert("Se genero un error inesperado");
            window.location.href="../views/medicos.php"</script>';
        }
        

    } catch (PDOException $e) {

        echo "Error ingresando el registro " . $e->getMessage();
    }
    


?>