<?php

    require_once '../model/conexion.php';
    require_once 'menu.php';
    require_once 'modales/registrarConsulta.php';
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial Clinico</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap4.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    

</head>
<body>


    <div class="container text-center">
        <div class="row m-4">
            
            
            <div class="col">
                <div class="row col mb-4">
                    <h2 class="text-danger">Historia Clinica Pacientes</h2>
                </div>
                
                <div class="row col-12">
                    <table id="tableHistoria" class="table">
                        <thead>
                            <tr class="text-center">
                            <th scope="col" class="text-center">Cedula</th>
                            <th scope="col" class="text-center">Paciente</th>
                            <th scope="col" class="text-center">Condición del Paciente</th>
                            <th scope="col" class="text-center">Resultados Medicos</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            
                            $sql= $conexion->query("select HM.*,P.Nombre AS paciente
                            from HistorialMedico HM INNER JOIN Paciente P ON HM.ID_Paciente=P.ID_Paciente
                            where HM.CondicionMedica<>'' AND HM.ResultadoMedico<>'' ORDER BY ID_HistoriaClinica DESC
                            ");
                            $historias = $sql->fetchAll(PDO::FETCH_OBJ);
                            #print_r($consultas);
                            foreach($historias as $historia){
                        ?>

                            <tr>
                            <td scope="row" class="text-center"><?php echo $historia->ID_Paciente;?></td>
                            <td scope="row" class="text-center"><?php echo $historia->paciente;?></td>
                            <td scope="row" class="text-center"><?php echo $historia->CondicionMedica;?></td>
                            <td scope="row" class="text-justify"><?php echo $historia->ResultadoMedico;?></td>

                                                         
                            </tr>
                        <?php }?>  
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap4.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableHistoria').DataTable();
        });

    </script>

</body>
</html>