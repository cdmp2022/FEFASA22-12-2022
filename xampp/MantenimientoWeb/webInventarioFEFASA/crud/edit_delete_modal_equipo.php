<!-- Editar -->
<div class="modal fade bd-example-modal-lg" id="edit_<?php echo $row['codigoActivo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            	 <center><h4 class="modal-title" id="myModalLabel">Editar miembro</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="../crud/equipos/edit.php?id=<?php echo $row['codigoActivo']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Tipo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="tipo" value="<?php echo $row['tipo']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Marca:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="marca" value="<?php echo $row['marca']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Modelo:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="modelo" value="<?php echo $row['modelo']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Procesador:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="procesador" value="<?php echo $row['procesador']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Memoria:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="mRam" value="<?php echo $row['mRam']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Almacenamiento:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="almacenamiento" value="<?php echo $row['almacenamiento']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Cables:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cables" value="<?php echo $row['cables']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Estado:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="estado" value="<?php echo $row['estado']; ?>">
					</div>
				</div>

				
					<center>
						<img onclick="profileToggle()" class="img-thumbnail" src="../multimedia/pc/<?php echo $row['img']; ?>" alt="">
					</center>
				

				

				
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
				<a href="foto.php?codigoActivo=<?php echo $row['codigoActivo']; ?>" class="btn btn-info"> Foto</a>			
				<button type="submit" name="edit" class="btn btn-success"><span class="fa fa-check"></span> Actualizar</button>

			</form>
            </div>

        </div>
    </div>
</div>

<!-- Eliminar -->
<div class="modal fade bd-example-modal-lg" id="delete_<?php echo $row['codigoActivo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Borrar Equipo</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">¿Estas seguro en borrar los datos de?</p>
				<h2 class="text-center">SKU:<?php echo $row['codigoActivo'].' - serviceTag:'.$row['serviceTag']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
                <a href="../crud/equipos/delete.php?id=<?php echo $row['codigoActivo']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>
            </div>

        </div>
    </div>
</div>
