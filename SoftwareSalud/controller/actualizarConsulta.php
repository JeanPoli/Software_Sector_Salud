<?php

    include '../model/conexion.php';


    if (!isset($_POST['diagnostico']) || !isset($_POST['resultado'])) {
        exit();
    }

    $diagnostico= $_POST['diagnostico'];
    $resultado= $_POST['resultado'];
    $id=$_POST['id'];
    $paciente=$_POST['paciente'];


    
    try {

        $sqlConsulta = $conexion->prepare("UPDATE ConsultasClinicas SET DiagnosticoPaciente = ? , ResultadosConsulta = ? WHERE Cod_Consulta=?");
        $sqlHistoria = $conexion->prepare("INSERT INTO HistorialMedico (ID_Paciente,CondicionMedica,ResultadoMedico) VALUES(?,?,?)");
        $resultadoConsulta= $sqlConsulta->execute([$diagnostico,$resultado,$id]);

        if ($diagnostico!=NULL && $resultado!=NULL) {
            $resultadoHistoria= $sqlHistoria->execute([$paciente,$diagnostico,$resultado]);
        }
        

        if ($resultadoConsulta) {
            echo '<script language="javascript">
            alert("Datos actualizados correctamente");
            window.location.href="../views/consultasClinicas.php"</script>';
        }else{
            echo '<script language="javascript">
            alert("Se genero un error inesperado");
            window.location.href="../views/consultasClinicas.php"</script>';
        }
        

    } catch (PDOException $e) {

        echo "Error actualizando el registro " . $e->getMessage();
    }
    


?>