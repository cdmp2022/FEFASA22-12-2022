<!-- Agregar Nuevo -->
<div class="modal fade bd-example-modal-lg" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Agregar Equipo</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
                 
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="../crud/equipos/add.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Codigo Activo:</label>
					</div>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="codigoActivo">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Etiqueta de servicio:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="serviceTag">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">tipo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="tipo">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Marca:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="marca">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Modelo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="modelo">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Procesador:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="procesador">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Memoria:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="mRam">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Almacenamiento:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="almacenamiento">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Cables:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cables">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Estado:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="estado">
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
