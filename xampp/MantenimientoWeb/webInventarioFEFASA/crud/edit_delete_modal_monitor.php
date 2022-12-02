<!-- Editar -->
<div class="modal fade bd-example-modal-lg" id="edit_<?php echo $row['serie']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            	 <center><h4 class="modal-title" id="myModalLabel">Editar Monitor</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="../crud/monitor/edit.php?id=<?php echo $row['serie']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Serie:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="serie" value="<?php echo $row['serie']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Modelo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="modeloMonitor" value="<?php echo $row['modeloMonitor']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Tipo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="tipoMonitor" value="<?php echo $row['tipoMonitor']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Cables:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cablesMonitor" value="<?php echo $row['cablesMonitor']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Equipos / Perifericos:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="otrosEquiposPerifericos" value="<?php echo $row['otrosEquiposPerifericos']; ?>">
					</div>
				</div>
				

				
					<center>
						<img onclick="profileToggle()" class="img-thumbnail" src="../multimedia/monitor/<?php echo $row['img']; ?>" alt="">
					</center>
				

				

				
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
				<a href="fotoMonitor.php?serie=<?php echo $row['serie'];?>" class="btn btn-info"> Foto</a>			
				<button type="submit" name="edit" class="btn btn-success"><span class="fa fa-check"></span> Actualizar</button>

			</form>
            </div>

        </div>
    </div>
</div>

<!-- Eliminar -->
<div class="modal fade bd-example-modal-lg" id="delete_<?php echo $row['serie']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Borrar Equipo</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Estas seguro en borrar los datos de?</p>
				<h2 class="text-center">Serie: <?php echo $row['serie'].' - Modelo: '.$row['modeloMonitor']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <a href="../crud/monitor/delete.php?id=<?php echo $row['serie']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>
            </div>

        </div>
    </div>
</div>
