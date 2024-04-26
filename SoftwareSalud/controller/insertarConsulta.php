<?php

    include '../model/conexion.php';


    if (!isset($_POST['paciente']) || !isset($_POST['medico']) || !isset($_POST['fecha'])) {
        exit();
    }

    $paciente= $_POST['paciente'];
    $medico= $_POST['medico'];
    $fecha= $_POST['fecha'];

    
    try {
        $sql = $conexion->prepare("INSERT INTO ConsultasClinicas (ID_Paciente,ID_Medico,Fecha) VALUES(?,?,?)");
        $resultado= $sql->execute([$paciente,$medico,$fecha]);

        if ($resultado) {
            echo '<script language="javascript">
            alert("Dato ingresado correctamente");
            window.location.href="../views/consultasClinicas.php"</script>';
        }else{
            echo '<script language="javascript">
            alert("Se genero un error inesperado");
            window.location.href="../views/consultasClinicas.php"</script>';
        }
        

    } catch (PDOException $e) {

        echo "Error ingresando el registro " . $e->getMessage();
    }
    


?>