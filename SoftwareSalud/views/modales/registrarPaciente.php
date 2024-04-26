 <!-- Modal -->
 <div class="modal fade" id="registrarPaciente" tabindex="-1" aria-labelledby="registrarPaciente" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="registrarPaciente">Registrar Paciente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="../controller/insertarPaciente.php">

          
          <div class="mb-3">
            <label for="id" class="form-label">Identificación</label>
            <input type="text" class="form-control" name="id" id="id" autocomplete="off" required>
          </div>
          <div class="mb-3">
            <label for="Nombre" class="form-label">Paciente</label>
            <input type="text" class="form-control" name="Nombre" id="Nombre" autocomplete="off" required>
          </div>
          <div class="mb-3">
            <label for="fecha" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="fecha" id="fecha" autocomplete="off" required>
          </div>
          <div class="mb-3">
            <label for="Genero" class="form-label">Genero</label>
            <select class="form-select" aria-label="Default select example" name="Genero" id="Genero">
              <option value="Femenino">Femenino</option>
              <option value="Masculino">Masculino</option>
              <option value="Otro">Otro</option>         
            </select>
          </div>
          <div class="mb-3">
            <label for="direccion" class="form-label">Direccion</label>
            <input type="text" class="form-control" name="direccion" id="direccion" autocomplete="off" required>
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="text" class="form-control" name="telefono" id="telefono" autocomplete="off" required>
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