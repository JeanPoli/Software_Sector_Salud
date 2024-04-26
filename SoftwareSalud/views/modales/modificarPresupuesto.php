 <!-- Modal -->
 <div class="modal fade" id="actualizaPresupuesto" tabindex="-1" aria-labelledby="actualizaPresupuesto" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="actualizaPresupuesto">Actualizar Presupuestos o Saldos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="../controller/actualizarPresupuesto.php">
            
            
            <?php
                            
                $sql= $conexion->query("select * from Presupuesto Where Id=1");
                $consulta = $sql->fetchAll(PDO::FETCH_OBJ);
                foreach($consulta as $presupuesto){
            ?>
            
                <div class="mb-3">
                    <label for="pre" class="form-label">Presupuesto</label>
                    <input type="text" class="form-control" name="pre" id="pre" value="<?php echo $presupuesto->presupuesto;?>" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="saldo" class="form-label">Saldo</label>
                    <input type="text" class="form-control" name="saldo" id="saldo" value="<?php echo $presupuesto->saldo;?>" autocomplete="off">
                </div>
            

            <?php } ?>

          <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>