<?php

    include '../model/conexion.php';


    if (!isset($_POST['id']) || !isset($_POST['Nombre']) || !isset($_POST['fecha']) || !isset($_POST['Genero']) || !isset($_POST['direccion']) || !isset($_POST['telefono'])) {
        exit();
    }

    $identificacion= $_POST['id'];
    $paciente= $_POST['Nombre'];
    $fecha= $_POST['fecha'];
    $Genero= $_POST['Genero'];
    $direccion= $_POST['direccion'];
    $telefono= $_POST['telefono'];

    
    try {
        $sql = $conexion->prepare("INSERT INTO Paciente (ID_Paciente,Nombre,Fecha_Nacimiento,Genero,Direccion,Telefono) VALUES(?,?,?,?,?,?)");
        $resultado= $sql->execute([$identificacion,$paciente,$fecha,$Genero,$direccion,$telefono]);

        if ($resultado) {
            echo '<script language="javascript">
            alert("Dato ingresado correctamente");
            window.location.href="../views/pacientes.php"</script>';
        }else{
            echo '<script language="javascript">
            alert("Se genero un error inesperado");
            window.location.href="../views/pacientes.php"</script>';
        }
        

    } catch (PDOException $e) {

        echo "Error ingresando el registro " . $e->getMessage();
    }
    


?>