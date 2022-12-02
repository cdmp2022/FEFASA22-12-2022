<!-- Agregar Nuevo -->
<div class="modal fade bd-example-modal-lg" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Agregar Monitor</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
                 
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="../crud/monitor/add.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Serie:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="serie">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Tipo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="tipoMonitor">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Modelo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="modeloMonitor">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">cables:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cablesMonitor">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Otros Equipos / Perifericos:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="otrosEquiposPerifericos">
					</div>
				</div>
            </div> 
			</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
					<button type="submit" name="add" class="btn btn-primary"><span class="fa fa-save"></span> Guardar</a>
				</div>
			</form>

        </div>
    </div>
</div>
