 <!-- Modal -->
<div class="modal fade" id="registrarConsulta" tabindex="-1" aria-labelledby="registrarConsulta" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="registrarConsulta">Citar Proxima Consulta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="../controller/insertarConsulta.php">

          <div class="mb-3">
            <label for="paciente" class="form-label">Paciente a Diagnosticar</label>
            <select class="form-control" name="paciente" id="selectPaciente" multiple aria-label="Multiple select example" style="width: 100%;">
              <?php
                            
                $sql= $conexion->query("select * from Paciente order by Nombre asc");
                $pacientes = $sql->fetchAll(PDO::FETCH_OBJ);
                #print_r($consultas);
                foreach($pacientes as $paciente){
              ?>
                <option value="<?php echo $paciente->ID_Paciente;?>"><?php echo $paciente->Nombre;?></option>  

              <?php
                }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="medico" class="form-label">Medico que Realiza la Consulta</label>
            <select class="form-control" name="medico" id="medico" multiple aria-label="Multiple select example" style="width: 100%;">
              <?php
                            
                $sql= $conexion->query("select * from Medico order by Especialidad asc");
                $medicos = $sql->fetchAll(PDO::FETCH_OBJ);
                #print_r($consultas);
                foreach($medicos as $medico){
              ?>
                <option value="<?php echo $medico->ID_Medico;?>"><?php echo $medico->Nombre;?> - <?php echo $medico->Especialidad;?></option>  

              <?php
                }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="fecha" class="form-label">Fecha para la Proxima Consulta</label>
            <input type="datetime-local" class="form-control" name="fecha" id="fecha" autocomplete="off" required>
          </div>
          

          <button type="submit" class="btn btn-primary">Registrar</button>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>