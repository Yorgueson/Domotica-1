  <div class="content-wrapper" style="background: #343a40; color:#fff;">
    
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Iluminación</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

              <li class="breadcrumb-item active" style="color:white;">Iluminación</li>

            </ol>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </section>



    <!-- Main content -->
    <section class="content">

      <div class="card" style="background: #343a40; color:#fff;">

        <!--Cabecera de la tarjeta -->

        <div class="card-header" style="background: #343a40; color:#fff;">

          <h3 class="card-title">Iluminación</h3>

          <div class="card-tools">

            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">

              <i class="fas fa-minus"></i></button>

            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">

              <i class="fas fa-times"></i></button>

          </div>

        </div>

        <!-- Opciones de ver y agregar -->

        <div class="container-fluid" style="background: #343a40; color:#fff;">

          <!-- Tarjeta para las opciones -->

          <div class="card" style="background: #343a40; color:#fff;">

              <!-- Cuerpo de la tarjeta -->

              <div class="card-body">
                
                <div class="row">

                  <!-- Tarjeta ver informe -->

                  <div class="col-lg-6 col-6">

                    <div class="small-box bg-info">

                      <div class="inner">

                        <h3>Ver Informe</h3>

                        <p>General</p>

                      </div>

                      <div class="icon">

                        <i class="far fa-eye"></i>

                      </div>

                      <a href="informegeneral" class="small-box-footer">

                        Ver

                        <i class="fas fa-arrow-circle-right"></i>

                      </a>

                    </div>

                  </div>

                  <!-- Tarjeta agregar -->

                  <div class="col-lg-6 col-6">

                    <div class="small-box bg-success">

                      <div class="inner">

                        <h3>Agregar</h3>

                        <p>Bombillos</p>

                      </div>

                      <div class="icon">

                        <i class="far fa-plus-square"></i>

                      </div>

                      <a class="small-box-footer" id="btnAgregar" data-toggle="modal" data-target="#modalAgregarBombillo">

                        Agregar

                        <i class="fas fa-arrow-circle-right"></i>

                      </a>

                    </div>

                  </div>

                </div>

              </div>

          </div>

        </div>

        <!-- Fin tarjeta ver y agregar -->

        <!-- Tarjeta para la tabla -->

        <div class="card" style="background: #343a40; color:#fff;">

          <div class="card-body table-responsive">

            <table class="table table-bordered table-striped tablas">
              
              <thead class="thead-dark">
                
                <tr>

                  <th>#</th>
                  <th>Nombre</th>
                  <th>Acciones</th>

                </tr>

              </thead>

              <tbody>

                <?php

                  $item = null;

                  $valor = null;

                  $iluminacion = ControladorIluminacion::ctrMostrarIluminacion($item, $valor);

                  foreach ($iluminacion as $key => $value) {
                    
                    echo '

                    <tr>

                      <td>'.($key+1).'</td>

                      <td class="text-uppercase">'.$value["nombre"].'</td>

                      <td>';

                      if ($value["encendido"] != 0) {
                      
                        echo '<button class="btn btn-outline-primary btnEncender" idBombillo="'.$value["id_bombillo"].'" estadoBombillo="0">
                                <i class="fas fa-lightbulb"></i>
                              </button>';
  
                      } else {
  
                        echo '<button class="btn btn-outline-danger btnEncender" idBombillo="'.$value["id_bombillo"].'" estadoBombillo="1">
                                <i class="fas fa-lightbulb"></i>
                              </button>';
  
                      }

                      echo '
                        
                        <button class="btn btn-outline-info" data-toggle="modal" data-target="#modalRevisarBombillo">
                          <i class="fas fa-eye"></i>
                        </button>

                        <label for="rangeInput" id="labelRange">'.$value["intensidad"].'</label>
                        
                        <input type="range" id="rangeInputIntensidad" name="rangeInput" min="0" max="10" step="1" onchange="actualizarIntensidad(this.value, '.$value["id_bombillo"].');">

                        <button class="btn btn-outline-warning btnEditarBombillo" idBombillo="'.$value["id_bombillo"].'" data-toggle="modal" data-target="#modalEditarBombillo">
                          <i class="fas fa-pencil-alt"></i>
                        </button>


                        <button class="btn btn-outline-danger btnEliminarBombillo" idBombillo="'.$value["id_bombillo"].'">
                          <i class="fa fa-times"></i>
                        </button>

                      </>

                    </tr>

                    ';

                  }

                ?>

              </tbody>

            </table>

          </div>
          <!-- /.card-body -->
    
        </div>
        <!-- Fin tarjeta para la tabla -->

      </div>
      <!-- /.card -->

    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <!--================================
    MODAL AGREGAR BOMBILLO
  =================================-->

<div class="modal fade" id="modalAgregarBombillo">

    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post">

          <!--================================
              CABEZA DEL MODAL
            =================================-->

          <div class="modal-header"  style="background: #007bff; color: white">

            <h4 class="modal-title">Agregar Bombillo</h4>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

              <span aria-hidden="true">&times;</span>

            </button>

          </div>

          <!--================================
              CUERPO DEL MODAL
            =================================-->

          <div class="modal-body">

            <div class="box-body">

              <!-- ingresar el nombre del bombillo -->

              <div class="form-group">
                      
                <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text"><i class="fa fa-th"></i></span>

                  </div>

                  <input type="text" class="form-control input-lg" placeholder="Ingrese el nombre del bombillo" id="nuevoNombre" name="nuevoNombre" required>

                </div>

              </div>

                <!-- Estado encendido/apagado -->

                <div class="form-group">
                      
                  <P>¿Bombillo esta encendido?:</P>

                  <div class="input-group mb-3">

                    <div class="input-group-prepend">

                      <span class="input-group-text"><i class="fa fa-th"></i></span>

                    </div>

                    <select class="form-control input-lg custom-select" id="nuevoEncendido" name="nuevoEncendido" required>

                      <option value="1">Si</option> 
                      <option value="0">No</option>
                      
                    </select>

                  </div>

                </div>

                <!-- seleccionar color del bombilllo -->

                <div class="form-group">
                      
                  <div class="input-group mb-3">

                    <div class="input-group-prepend">

                        <div class="input-group my-colorpicker2">

                          <label for="nuevoColor">Seleccione el color:</label>

                          <input type="color" id="nuevoColor" name="nuevoColor" value="#ff0000">

                        </div>

                    </div>

                </div>

                <!-- intencidad -->

                <div class="form-group">

                  <script>

                    function updateTextInput() {

                      var slider = document.getElementById("nuevaIntensidad");

                      var selectValue = document.getElementById("label");

                      selectValue.innerHTML = slider.value;
                      
                    }
                    
                  </script>
                      
                  <P>Intensidad:</P>

                    <div class="input-group mb-3">

                      <input type="range" min="0" max="10" class="custom-range" id="nuevaIntensidad" name="nuevaIntensidad" value="" onchange="updateTextInput();">

                      <label for="nuevaIntensidad" id="label">0</label>
                        
                    </div>

                </div>

                <!-- monitorear -->

                <div class="form-group">
                      
                    <P>Estado de monitoreo:</P>

                    <div class="input-group mb-3">

                    <div class="input-group-prepend">

                      <span class="input-group-text"><i class="fa fa-th"></i></span>

                      </div>

                      <select class="form-control input-lg custom-select" id="nuevoEstado" name="nuevoEstado" required>

                      <option value="1">Si</option> 
                      <option value="0">No</option>

                      </select>

                    </div>

                </div>

            </div>

          </div>

          <!--================================
              FOOTER DEL MODAL
            =================================-->

          <div class="modal-footer justify-content-between">

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>

          </div>

          <?php

            $crearBombillo = new ControladorIluminacion();

            $crearBombillo -> ctrCrearBombillo();

          ?>

        </form>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

</div>

<!--================================
    MODAL REVISAR BOMBILLO
  =================================-->

<div class="modal fade" id="modalRevisarBombillo">

<div class="modal-dialog">

  <div class="modal-content">

    <!--================================
        CABEZA DEL MODAL
      =================================-->

    <div class="modal-header"  style="background: #ff851b; color: white">

      <h4 class="modal-title">Revisar Bombillo</h4>

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">

        <span aria-hidden="true">&times;</span>

      </button>

    </div>

    <!--================================
        CUERPO DEL MODAL
      =================================-->

    <div class="modal-body">

      <div class="box-body">

        <!-- ENTREDA PARA EL NOMBRE -->

        <div class="card card-primary card-outline">

          <div class="card-header">

            <h3 class="card-title">
              <i class="far fa-chart-bar"></i>
              Consumo de bombillo
            </h3>

          </div>

          <div class="card-body">

            <div class="chart-container" style="position: relative;">
              <canvas id="GrafTvo" class="chartjs-render-monitor"></canvas>
            </div>

          </div>
          <!-- /.card-body-->
        </div>

        <div class="callout callout-success">

          <h5>Estado general del bombillo</h5>

          <p>Bueno.</p>

        </div>

        <!--<div class="col-md-12">

          <div class="card">

            <div class="card-header">

              

            </div>
            <div class="card-body">

              
              
            </div>

          </div>
        
        </div>-->

      </div>

    </div>

    <!--================================
        FOOTER DEL MODAL
      =================================-->

    <div class="modal-footer justify-content-between">

      <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>

    </div>

  </div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--================================
    MODAL EDITAR BOMBILLO
  =================================-->

<div class="modal fade" id="modalEditarBombillo">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--================================
            CABEZA DEL MODAL
          =================================-->

        <div class="modal-header"  style="background: #ff851b; color: white">

          <h4 class="modal-title">Editar Bombillo</h4>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            <span aria-hidden="true">&times;</span>

          </button>

        </div>

        <!--================================
            CUERPO DEL MODAL
          =================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTREDA PARA EL NOMBRE -->

            <label for="editarBombillo">Escribe el nuevo nombre</label>

            <div class="form-group">
            
              <div class="input-group mb-3">

                <div class="input-group-prepend">

                  <span class="input-group-text"><i class="fas fa-lightbulb"></i></span>

                </div>

                <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" required>

                <input type="hidden" name="idBombillo" id="idBombillo" required>

              </div>

            </div>

          </div>

        </div>

        <!--================================
            FOOTER DEL MODAL
          =================================-->

        <div class="modal-footer justify-content-between">

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

        <?php

          $editarBombillo = new ControladorIluminacion();

          $editarBombillo -> ctrEditarBombillo();

        ?> 

      </form>

    </div>
    <!-- /.modal-content -->
  </div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php

   $borrarBombillo = new ControladorIluminacion();

   $borrarBombillo -> ctrBorrarBombillo();

   $labelsHora=array();
   $estados=array();

  $tabla="estadisticas";

  $respuestaIluminacion= ControladorIluminacion::ctrHistoricoIluminacion($tabla);
  
  foreach($respuestaIluminacion as $key => $value){
    array_push($estados, $value["Estado"]);
    $hora_iluminacion=substr($value["fecha"],11,5);
    array_push($labelsHora, $hora_iluminacion);
  }

  echo (" weeeee aca estoy");
?>

<script>
//--------  Grafico de Temperatura --------------
    var ctxT =$("#GrafTvo").get(0).getContext('2d');
    var chart = new Chart(ctxT, {
      type: 'bar',
      data: {
        labels: [
        <?php
            foreach($labelsHora as $value){
              echo "'".$value."',";
            }
          ?>
        ],          
        datasets: [{
          label: 'Encendido',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: [
            <?php
              foreach($estados as $key => $value){
                echo $value.",";
              }
            ?>
          ]
        }]
      },

      // Configuration options go here
      options: {
        responsive: true,
        tooltips: {
          callbacks: {
            label: function(tooltipItems, data){
              return tooltipItems.yLabel + '';
            }
          }
        }
      }
    });
</script>