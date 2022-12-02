<?php
  include_once('../model/connection.php');
  session_start();
  $database = new Connection();
  $db = $database->open();

  $codMovimientor= $_GET['codID'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/fefasa-logo-1.png">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
  <title>FEFASA</title>
  <link href="../bootstrap/css/personal.css" rel="stylesheet">
</head>
<body>
<div class="modal-body">
			<div class="container-fluid">
        
<form method="POST" class="formulario" name="enviar">
    <?php
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

                    
</body>
</html>
<script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="../bootstrap/js/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.js"></script>
  <script src="../bootstrap/js/custom.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [50, 20, 10, 22, 50, 10, 40],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>
  <script>
    window.$('#table_id').DataTable();
  </script>