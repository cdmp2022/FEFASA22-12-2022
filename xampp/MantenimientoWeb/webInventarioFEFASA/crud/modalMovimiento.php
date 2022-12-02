<!-- Agregar Nuevo -->
<div class="modal fade bd-example-modal-lg" id="edit_<?php echo $row['codMovimiento']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
			<form method="POST" class="formulario" name="enviar">
    <?php
	$codMovimientor= $row['codMovimiento']; 
                        try{	
                            $sql = "SELECT * FROM farajinventario.vermovimientossalida where codMovimiento= '$codMovimientor'";
                            foreach ($db->query($sql) as $row) {

                              $getIdentidad= $row['identidad'];
                              $getCodProducto= $row['codActivo'];
                              $descripcionProducto;
                              $imgProducto="";
                              ?>
      <fieldset>
			<legend>Datos del Movimiento</legend>
      <div class="contenedor-campos"> 
				<div class="campo">
					
						<label class="control-label" style="position:relative; top:7px;">Codigo de Movimiento: <?php echo $row['codMovimiento']; ?></label>
					
				</div>
				
				<div class="campo">					
						<label class="control-label" style="position:relative; top:7px;">Fecha de entrega: <?php echo $row['fechaMovimiento']; ?></label>													
				</div>

				<div class="campo">		
						<label class="control-label" style="position:relative; top:7px;">Motivo: <?php echo $row['motivo']; ?></label>				
				</div>

				<div class="campo">					
						<label class="control-label" style="position:relative; top:7px;">Lugar: <?php echo $row['lugar']; ?></label>
				</div>
			
        <div class="contenedorImg">
                    <div class="campo">	
                        <label class="control-label" style="position:relative; top:7px;">Firma IT:</label>
                        <img class="imgVer" src="<?php echo $row['firmaIT'];?>" alt="">
                    </div>
                    <div class="campo">
                        <label class="control-label" style="position:relative; top:7px;">Firma del Usuario:</label>
                        <img class="imgVer"src="<?php echo $row['firmaUsuario'];?>" alt="">
                    </div>

                    <div class="campo">	
                        <label class="control-label" style="position:relative; top:7px;">Comprobación:</label>
                        <img class="imgVer" src="../multimedia/comprobacion/example.jpg" alt="">
                    </div>    
        </div>
      </div>

        <?php
                        }
                      }
                      catch(PDOException $e){
                        echo "There is some problem in connection: " . $e->getMessage();
                      }

                      //cerrar conexión
                      $database->close();

        ?>


                        <?php
                        try{	
                            $sql = "SELECT * FROM farajinventario.tusuario where identidad= '$getIdentidad'";
                            foreach ($db->query($sql) as $row) {
                              ?>

				<legend>Datos del Usuario</legend>
        <div class="contenedor-campos"> 
				<div class="campo">		
						<label class="control-label" style="position:relative; top:7px;">Identidad: <?php echo $row['identidad'];?></label>
				</div>
				<div class="campo">	
						<label class="control-label" style="position:relative; top:7px;">Nombre: <?php echo $row['nombre'];?> <?php echo $row['apellido'];?></label>
				</div>
				<div class="campo">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Información de trabajo: <?php echo $row['area'];?>, Centro: <?php echo $row['centro'];?></label>
				</div>
        <?php
                        }
                      }
                      catch(PDOException $e){
                        echo "There is some problem in connection: " . $e->getMessage();
                      }

                      //cerrar conexión
                      $database->close();

        ?>


            <?php
                        try{	
                        /*   $sqlEquipo = "SELECT * FROM farajinventario.t_especificaciones_equipo where serviceTag= '$getCodProducto'";
                            $descripcionProducto="Tipo: ",$row['tipo']," ,Marca:",$row['marca']," ,Modelo:",$row['modelo']," ,Procesador:",$row['procesador']," ,Memoria Ram:",$row['mRam']," ,almacenamiento:",$row['almacenamiento'] ;
                          $descripcionProducto="Tipo:"+ $row['tipo'];   
                          +" ,Modelo:"+$row['modelo']+" ,Procesador:"+$row['procesador']+" ,Memoria Ram:"+$row['mRam']+" ,almacenamiento:"+$row['almacenamiento']           
                          $imgProducto=$row['img'];

                            */

                            $result = $db->query("SELECT * FROM farajinventario.t_especificaciones_equipo where codigoActivo= '$getCodProducto'");
                            $row_cnt = $result->rowCount();
                            $sqlEquipo="SELECT * FROM farajinventario.t_especificaciones_equipo where codigoActivo= '$getCodProducto'";
                            if ($row_cnt > 0){ 
                              foreach ($db->query($sqlEquipo) as $row) {
                                $tipo=$row['tipo'];
                                $marca=$row['marca'];
                                $modelo=$row['modelo'];
                                $proc=$row['procesador'];
                                $ram=$row['mRam'];
                                $memo=$row['almacenamiento'];
                                $descripcionProducto="Tipo: $tipo, Marca: $marca, Modelo: $modelo, Procesador: $proc, Ram: $ram, Alamacenamiento: $memo";
                                $imgProducto=$row['img'];
                                $imgURL="../multimedia/pc/$imgProducto";
                              }
                            }
                            $result = $db->query("SELECT * FROM farajinventario.t_especificaciones_monitor where serie= '$getCodProducto'");
                            $row_cnt = $result->rowCount();
                            $sqlEquipo="SELECT * FROM farajinventario.t_especificaciones_monitor where serie= '$getCodProducto'";
                            if ($row_cnt > 0){ 
                              foreach ($db->query($sqlEquipo) as $row) {
                                $tipo=$row['tipoMonitor'];
                                $modelo=$row['modeloMonitor'];

                                $descripcionProducto="Tipo: $tipo, Modelo: $modelo";
                                $imgProducto=$row['img'];
                                $imgURL="../multimedia/monitor/$imgProducto";
                              }
                            }
                              ?>
         </div>       
          
        <br>  
				<legend>Datos del Equipo</legend>
        <div class="contenedor-campos"> 
              <div class="campo">	
                  <label style="position:relative; top:7px;">Identificador: <?php echo $getCodProducto; ?></label>	
              </div>
              
                    <div class="campo">
                        <label class="control-label" style="position:relative; top:7px;">Descripción: </label>
                        <label class="control-label" style="position:relative; top:7px;"><?php echo $descripcionProducto; ?></label>
                    </div>
              
              <center>
				          <img src="<?php echo $imgURL; ?>" alt="">
              </center>
          </div> 
            <?php
                        
                      }
                      catch(PDOException $e){
                        echo "There is some problem in connection: " . $e->getMessage();
                      }

                      //cerrar conexión
                      $database->close();

        ?>
        </fieldset>
			</form>


        </div>
    </div>
</div>
