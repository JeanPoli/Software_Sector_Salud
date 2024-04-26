 <!-- Modal -->
 <div class="modal fade" id="registrarMedico" tabindex="-1" aria-labelledby="registrarMedico" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="registrarMedico">Registrar Medico</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="../controller/insertarMedico.php">

          
          <div class="mb-3">
            <label for="id" class="form-label">Identificación</label>
            <input type="text" class="form-control" name="id" id="id" autocomplete="off" required>
          </div>
          <div class="mb-3">
            <label for="nombre" class="form-label">Medico</label>
            <input type="text" class="form-control" name="nombre" id="nombre" autocomplete="off" required>
          </div>
          <div class="mb-3">
            <label for="especialidad" class="form-label">Especialidad</label>
            <input type="text" class="form-control" name="especialidad" id="especialidad" autocomplete="off" required>
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