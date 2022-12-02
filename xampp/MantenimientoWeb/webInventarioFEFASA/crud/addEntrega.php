<div class="modal fade bd-example-modal-lg" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            	<center><h4 class="modal-title" id="myModalLabel">Agregar Nueva Entrega</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
                
            </div>
            

            <table id="table_id" class="table table-bordered table-striped display">
                    <thead>
                      <tr>
                          <th>Identidad</th>
                          <th>Nombre</th>                  
                          <th>Acción</th>
                      </tr>
                      
                    </thead>
                    <tbody>
                      <?php
                        // incluye la conexión
                        

                    
                        try{	
                            $sql = 'SELECT * FROM tusuario';
                            foreach ($db->query($sql) as $row) {
                              ?>
                              <tr>
                                <td><?php echo $row['identidad']; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                
                                <td>
                                  <a href="#edit_<?php echo $row['identidad']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Ver</a>
                                </td>
                                <?php include('../crud/edit_delete_modal.php'); ?>
                              </tr>
                              <?php 
                            }
                        }
                        catch(PDOException $e){
                          echo "There is some problem in connection: " . $e->getMessage();
                        }

                        //cerrar conexión
                        $database->close();

                      ?>
                    </tbody>
                  </table>

			

        </div>
    </div>
</div>