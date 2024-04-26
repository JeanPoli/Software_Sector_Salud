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
    <title>Consultas Clinicas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</head>
<body>


    <div class="container text-center">
        <div class="row m-4">
            <div class="col-2 ">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrarConsulta">
                    Registrar Consulta
                </button>
            </div>
            
            <div class="col">
                <div class="row col mb-4">
                    <h2 class="text-danger">Consultas Clinicas</h2>
                </div>
                
                <div class="row col">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                            <th scope="col">Codigo</th>
                            <th scope="col">Paciente</th>
                            <th scope="col">Medico Que Atiende</th>
                            <th scope="col">Fecha Consulta</th>
                            <th scope="col">Diagnosticos del Paciente</th>
                            <th scope="col">Resultados del Paciente</th>
                            <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                            
                            $sql= $conexion->query("select CC.*,P.Nombre AS paciente ,M.Nombre AS medico 
                            from ConsultasClinicas CC INNER JOIN Paciente P ON CC.ID_Paciente=P.ID_Paciente
                            INNER JOIN Medico M ON CC.ID_Medico=M.ID_Medico ");
                            $consultas = $sql->fetchAll(PDO::FETCH_OBJ);
                            #print_r($consultas);
                            foreach($consultas as $consulta){
                        ?>

                            <tr class="text-center">
                            <th scope="row">CON<?php echo $consulta->Cod_Consulta;?></th>
                            <td scope="row"><?php echo $consulta->paciente;?></td>
                            <td scope="row"><?php echo $consulta->medico;?></td>
                            <td scope="row"><?php echo $consulta->Fecha;?></td>
                            <td scope="row" class="" id="modDiagData<?php echo $consulta->Cod_Consulta;?>">
                                <?php 
                                    if ($consulta->DiagnosticoPaciente===NULL) {
                                        echo "-- Por Definir --";
                                    }else{
                                        echo $consulta->DiagnosticoPaciente;
                                    }
                                    
                                ?>
                            </td>
                            <td scope="row" class="" id="modResData<?php echo $consulta->Cod_Consulta;?>">
                                <?php 
                                    if ($consulta->ResultadosConsulta===NULL) {
                                        echo "-- Por Definir --";
                                    }else{
                                        echo $consulta->ResultadosConsulta;
                                    }
                                    
                                ?>
                            </td>

                                <?php 
                                    $textoDiag='';
                                    $textoRes='';
                                    if ($consulta->DiagnosticoPaciente!==NULL) {
                                        $textoDiag=$consulta->DiagnosticoPaciente;
                                    }

                                    if ($consulta->ResultadosConsulta!==NULL) {
                                        $textoRes=$consulta->ResultadosConsulta;
                                    }
                                        
                                ?>
                            <form method="post" action="../controller/actualizarConsulta.php">

                                <input type="hidden" name="id" value="<?php echo $consulta->Cod_Consulta;?>">
                                <input type="hidden" name="paciente" value="<?php echo $consulta->ID_Paciente;?>">

                                <td scope="row" class="d-none" id="regDiagData<?php echo $consulta->Cod_Consulta;?>">
                                    <textarea class="form-control h-100" rows="10" name="diagnostico" id="floatingTextarea"><?php echo $textoDiag?></textarea>

                                </td>

                                <td scope="row" class="d-none" id="regResData<?php echo $consulta->Cod_Consulta;?>">
                                    <textarea class="form-control h-100" rows="10" name="resultado" id="floatingTextarea"><?php echo $textoRes?></textarea>

                                </td>

                                <td class="d-none" id="save<?php echo $consulta->Cod_Consulta;?>">
                                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                </td>
                            
                            </form>

                            <td class="d-none" id="cancel<?php echo $consulta->Cod_Consulta;?>">
                                <a href="#<?php echo $consulta->Cod_Consulta;?>"  class="btn btn-danger" onclick="regResult(<?php echo $consulta->Cod_Consulta;?>)">Cancelar</a>
                            </td>

                            <td id="reg<?php echo $consulta->Cod_Consulta;?>">
                                <a href="#<?php echo $consulta->Cod_Consulta;?>"  onclick="regResult(<?php echo $consulta->Cod_Consulta;?>)" class="btn btn-warning">Registrar Resultados</a>
                            </td>
                            <td id="del<?php echo $consulta->Cod_Consulta;?>">
                                <a href="#<?php echo $consulta->Cod_Consulta;?>"  class="btn btn-danger">Eliminar</a>
                            </td>
                            
                            </tr>
                        <?php }?>  
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        
    </div>


    <script>
        // Obtener el elemento de entrada de fecha y hora
        let inputFechaHora = document.getElementById('fecha');
        // Obtener la fecha y hora actual en el formato YYYY-MM-DDTHH:MM
        let fechaHoraActual = new Date().toISOString().slice(0, 16);

        // Establecer el valor mínimo del campo de entrada de fecha y hora
        inputFechaHora.min = fechaHoraActual;

        // MODIFICAR REGISTROS
        
        function regResult(id){
            let registrarDiag= document.getElementById("regDiagData"+id);
            let registrarRes= document.getElementById("regResData"+id);
            let consultarDiag= document.getElementById("modDiagData"+id);
            let consultarRes= document.getElementById("modResData"+id);
            let save= document.getElementById("save"+id);
            let cancel= document.getElementById("cancel"+id);
            let reg= document.getElementById("reg"+id);
            let del= document.getElementById("del"+id);

            if (consultarDiag.classList.contains("d-none") && consultarRes.classList.contains("d-none")) {
                registrarDiag.classList.add("d-none");
                registrarRes.classList.add("d-none");
                save.classList.add("d-none");
                cancel.classList.add("d-none");
                consultarDiag.classList.remove("d-none");
                consultarRes.classList.remove("d-none");
                reg.classList.remove("d-none");
                del.classList.remove("d-none");
            } else {
                registrarDiag.classList.remove("d-none");
                registrarRes.classList.remove("d-none");
                save.classList.remove("d-none");
                cancel.classList.remove("d-none");
                consultarDiag.classList.add("d-none");
                consultarRes.classList.add("d-none");
                reg.classList.add("d-none");
                del.classList.add("d-none");
            }
            console.log(id);
        }

    </script>

</body>
</html>