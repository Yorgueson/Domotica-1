
<div class="content-wrapper" style="background: #6c757d; color:white;">


    <!--================================
    HEAD (MODULO PUERTAS, INICIO/ MODULO PUERTAS)
    =================================-->
    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1>Modulo Puertas</h1>

          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

              <li class="breadcrumb-item active" style="color: white;">Modulo Puertas</li>

            </ol>

          </div>

        </div>

      </div>
    </section>
    <!--================================
    CIERRE DE HEAD
    =================================-->

    

    <section class="content">

      <!--================================
          VER INFORME, AGREGAR PUERTAS
          =================================-->
          <div class="container-fluid">

            <div class="card">

              <div class="card-header" style="background: #343a40; color:#fff;">
                <!--puertas head -->
                <h3 class="card-title">
                  <i class="fa fa-door-open"></i>
                  Puertas
                </h3>
                <!-- /.puertas head -->
                <!-- /.card-header -->

              </div>

              <div class="card-body" style="background: #6c757d; color:#fff;">

                  <section class="content">
                    <div class="container-fluid">
                      <!-- Small boxes (Stat box) -->
                      <div class="row">
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-info">
                            <div class="inner">

                              <?php
                                $item = null;
                                $valor = null; 
                                $puertas = PuertasControlador::ctrContarPuerta($item, $valor);
                                  foreach ($puertas as $key => $value) {
                                  }
                                  echo'<h3>'.$value.'</h3>';
                                ?>
                              <p>Numero de puertas </p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-plus-circled"></i>
                            </div>
                            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modalAgregarPuerta">Agregar puerta <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>


                              <p>New Orders</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                      
                      </div>
                    </div>
                  </section>
                  
          <!--================================
          TABLA AGREGAR PUERTA
          =================================-->
          <div class="card-body-contenido">
          
          <table class="table table-bordered table-striped dt-responsive tabla">

          <thead class="thead-dark">
              <tr>
                <th style="width: 5px">#</th>
                <th>Nombre</th>
                <th>Foto</th>
                <th>Acciones</th>
                <th>Estado</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
            
              
            <?php
                    $item = null;
                    $valor = null; 
                    $puertas = PuertasControlador::ctrMostrarPuerta($item, $valor);
                    
                    foreach ($puertas as $key => $value) {
                      echo '<tr>
                      <td><b>'.$value["numero"].'</b></td>
                      <td><b>'.$value["nombre"].'</b></td>';

                      if ($value["foto"] != "") {
                        echo '<td>
                          <img src="'.$value["foto"].'" width="40px">';
                      }else{
                        echo '<td>
                          <img src="images/fotoPuertas/puertaDefecto.png" class="img-thumbnail" width="40px">';
                      }
                    echo '</td>
                       <td>
                      <div class="centradoText">
                          <button class="btn btn-outline-primary buttonFondo" id="btnOnOff" >

                            <i id="puertaAbierta" class="fa fa-door-closed" estadoPuerta="1"></i>
                          </button>

                          <button class="btn btn-outline-success buttonFondo"  id="btnMonitorear">

                            <i id="puertaAlarma" class="far fa-siren-on"estadoAlarma="1"></i>

                          </button>

                          <button class="btn btn-outline-info buttonFondo" data-toggle="modal" data-target="#modalHistorialPuerta">
                            <i class="fas fa-history"></i>
                          </button>
                        </div>    
                      </td>';

                        if ($value["estado"] == 1) {

                          echo '<td><button class="btn btn-danger btn-xs btnPtaEstado" idPuerta="'.$value["numero"].'" estadoPuerta="0">Mal estado</button></td>';

                        }else{

                          echo '<td><button class="btn btn-success btn-xs btnPtaEstado" idPuerta="'.$value["numero"].'" estadoPuerta="1">Buen estado</button></td>';

                        }
                      
                      echo'<td>
                      <div class="centradoText">
                        <button class="btn btn-outline-warning btnEditarPuerta buttonFondo" idPuerta="'.$value["numero"].'" data-toggle="modal" data-target="#modalEditarPuerta">
                          <i class="fas fa-pencil-alt"></i>
                        </button>
        
                        <button class="btn btn-danger btnEliminarPuerta" idPuerta="'.$value["numero"].'" fotoPuerta="'.$value["foto"].'" nombrePuerta="'.$value["nombre"].'"><i class="fa fa-times"></i></button>

                      </div>
                      </td>
                    </div>
                    ';
                                 
                    }
                    
                ?>
               
            </tbody>
            
          </table>
        </div>

            </div>
          </div>
      <!--================================
          CIERRE DE VER INFORME, AGREGAR PUERTAS
          =================================-->
        </section>
        <!-- CERRAR EL CONTENT -->
      </div>
      <!-- /.CIERRA DEL BODY -->


<!--================================
    MODAL HISTORIAL PUERTA
    =================================-->

    <div class="modal fade" id="modalHistorialPuerta">

      <div class="modal-dialog">

        <div class="modal-content" style="background: #6c757d; color:#fff;">

          <form role="form" method="post" enctype="multipart/form-data">

          <!--================================
              CABEZA DEL MODAL
              =================================-->

              <div class="modal-header"  style="background: #343a40; color: #fff">

                <h4 class="modal-title">Historial de la Puerta</h4>

                <button type="button" style="color:red;" class="close" data-dismiss="modal" aria-label="Close">

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
                        Consumo de Puerta
                      </h3>

                      <div class="card-tools">
                        Tiempo Real
                        <div class="btn-group" id="realtime" data-toggle="btn-toggle">

                          <button type="button" class="btn btn-default btn-sm active" data-toggle="on">On</button>
                          <button type="button" class="btn btn-default btn-sm" data-toggle="off">Off</button>

                        </div>

                      </div>

                    </div>
                    <div class="card-body">

                      <div id="interactive" style="height: 200px;"></div>

                    </div>
                    <!-- /.card-body-->
                  </div>

                  <div class="callout callout-success">

                    <h5>Estado general de la Puerta</h5>

                    <p>Bueno.</p>

                  </div>

                  <div class="col-md-12">

                    <div class="card">

                      <div class="card-header">

                        <h3 class="card-title">

                          <i class="fas fa-lightbulb"></i>
                          Detalles:

                        </h3>

                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">

                        <dl class="row">

                          <dt class="col-sm-4">Ubicacíon</dt>
                          <dd class="col-sm-8">Lorem ipsum dolor sit amet consectetur adipisicing elit.</dd>
                          <dt class="col-sm-4">Consumo</dt>
                          <dd class="col-sm-8">Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                          <dd class="col-sm-8 offset-sm-4">Donec id elit non mi porta gravida at eget metus.</dd>
                          <dt class="col-sm-4">Tiempo encendido</dt>
                          <dd class="col-sm-8">Etiam porta sem malesuada magna mollis euismod.</dd>
                          <dt class="col-sm-4">Comparacion</dt>
                          <dd class="col-sm-8">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
                            sit amet risus.
                          </dd>

                        </dl>

                      </div>
                      <!-- /.card-body -->

                    </div>
                    <!-- /.card -->

                  </div>

                </div>

              </div>

          <!--================================
              FOOTER DEL MODAL
              =================================-->

              <div class="modal-footer justify-content-between">

                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>

              </div>

            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<!--================================
    MODAL EDITAR
    =================================-->


    <div class="modal fade" id="modalEditarPuerta">

      <div class="modal-dialog">

        <div class="modal-content" style="background: #6c757d; color:#fff;">

          <form role="form" method="post" enctype="multipart/form-data">

      <!--================================
          CABEZA DEL MODAL
          =================================-->

            <div class="modal-header"  style="background: #343a40; color:#fff;">

              <h4 class="modal-title">Editar Puerta</h4>

              <button type="button" class="close" style="color:red;" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

              </button>

            </div>

         <!--================================
            CUERPO DEL MODAL
            =================================-->

            <div class="modal-body">

              <div class="box-body">

                <!-- ENTREDA PARA EL NOMBRE -->

                <div class="form-group">

                  <div class="input-group mb-3">

                    <div class="input-group-prepend">

                      <span class="input-group-text"><i class="far fa-door-closed"></i></span>

                    </div>

                    <input type="text" class="form-control input-lg" id="editarNombre" value="" name="editarNombre" required>

                  </div>

                </div>

                <!-- Estado encendido/apagado de bloqueo-->

                <input type="text" id="idPuertaEditar" name="idPuertaEditar" hidden="">

                <div class="form-group">

                  <label>Seleccionar bloqueo de la puerta:</label>
                  <div class="input-group mb-3">

                    <span class="input-group-text">
                      <i id="puertaBloqueoModal" class="far fa-lock-open-alt"estadoBloqueoModal="1"></i>
                    </span>

                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="btnBloqueoModal">
                      <label class="custom-control-label" for="btnBloqueoModal">  
                      </label>
                    </div>



                  </div>

                </div>
                

                <!-- Estado Alarma-->

                <div class="form-group">


                  <label>Estado de alarma</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text">
                      <i id="puertaAlarmaModal" class="far fa-siren"alarmaPuertaModal="1"></i>
                    </span>

                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="btnAlarmaModal">
                      <label class="custom-control-label" for="btnAlarmaModal">  
                      </label>
                    </div>

                  </div>
                </div>

                <!-- Estado-->

                <div class="form-group">


                    <label>Estado de puerta</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i id="idPuerta" class="fa fa-door-closed" idPuerta="1"></i>
                        </span>

                        <div class="custom-control custom-switch ">
                            <input type="checkbox" class="custom-control-input" id="btnPtaEstado" name="editarEstPuerta">
                            <label class="custom-control-label" for="btnPtaEstado">  
                            </label>
                        </div>

                    </div>
                </div>

                <!-- ENTREDA PARA SUBIR LA FOTO -->

                <div class="form-group">

                  <div class="panel">EDITAR FOTO</div>

                  <input type="file" class="nuevaFoto" id="editarFoto" name="editarFoto">

                  <input type="hidden" id="fotoActual" name="fotoActual">

                  <p class="help-block">Peso maximo de la foto 2 MB</p>

                  <img src="images/fotoPuertas/puertaDefecto.png" class="img-thumbnail previsualizar" width="100px">

                </div>

              </div>

            </div>


            <!--================================
              FOOTER DEL MODAL
              =================================-->

              <div class="modal-footer justify-content-between " style="background: #343a40; color:#fff;">

                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                <button type="submit" class="btn btn-primary">Guardar cambios</button>

              </div>

              <?php
                $editar = new PuertasControlador();
                $editar->ctrEditarPuerta();
              ?>

          </form>

        </div>
      </div>
    </div>

<!--================================
    MODAL ESTADISTICAS
    =================================-->

    <div class="modal fade" id="estadisticas">

      <div class="modal-dialog">

        <div class="modal-content" style="background: #6c757d; color:#fff;">

          <form role="form" method="post" enctype="multipart/form-data">

          <!--================================
              CABEZA DEL MODAL
              =================================-->

              <div class="modal-header"  style="background: #343a40; color: #fff">

                <h4 class="modal-title">Estadisticas</h4>

                <button type="button" style="color:red;" class="close" data-dismiss="modal" aria-label="Close">

                  <span aria-hidden="true">&times;</span>

                </button>

              </div>

          <!--================================
              CUERPO DEL MODAL
              =================================-->

              <div class="modal-body">

                  <div class="col-md-12">

                    <div class="card">

                  </div>

                </div>

              </div>

          <!--================================
              FOOTER DEL MODAL
              =================================-->

              <div class="modal-footer justify-content-between">

                <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>

              </div>

            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



<!--================================
    MODAL AGREGAR PUERTA
    =================================-->


    <div class="modal fade" id="modalAgregarPuerta">

      <div class="modal-dialog">

        <div class="modal-content" style="background: #6c757d; color:#fff;">

          <form role="form" method="post" enctype="multipart/form-data">

              <!--================================
                  CABEZA DEL MODAL
                  =================================-->

                  <div class="modal-header"  style="background: #343a40; color:#fff;">

                    <h4 class="modal-title">Agregar Puerta</h4>

                    <button type="button" class="close" style="color:red;" data-dismiss="modal" aria-label="Close">

                      <span aria-hidden="true">&times;</span>

                    </button>

                  </div>

               <!--================================
                  CUERPO DEL MODAL
                  =================================-->

                  <div class="modal-body">

                    <div class="box-body">

                      <!-- ENTREDA PARA EL NOMBRE -->

                      <div class="form-group">

                        <div class="input-group mb-3">

                          <div class="input-group-prepend">

                            <span class="input-group-text"><i class="far fa-door-closed"></i></span>

                          </div>

                          <input type="text" class="form-control input-lg" placeholder="Ingresar Nombre" name="nuevoNombre" required>

                        </div>

                      </div>

                      <!-- Estado encendido/apagado de bloqueo-->

                      <div class="form-group">

                        <label>Seleccionar bloqueo de la puerta:</label>
                        <div class="input-group mb-3">

                          <span class="input-group-text">
                            <i id="agregarPuertaBloqueoModal" class="far fa-lock-open-alt" estadoBloqueoModal="1"></i>
                          </span>

                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="btnAgregarBloqueoModal">
                            <label class="custom-control-label" for="btnAgregarBloqueoModal">  
                            </label>
                          </div>



                        </div>

                      </div>


                      <!-- Estado Alarma-->

                      <div class="form-group">


                        <label>Estado de alarma</label>
                        <div class="input-group mb-3">
                          <span class="input-group-text">
                            <i id="agregarPuertaAlarmaModal" class="far fa-siren"agregarAlarmaPuertaModal="1" ></i>
                          </span>

                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="btnAgregarAlarmaModal" name="agregarAlarma">
                            <label class="custom-control-label" for="btnAgregarAlarmaModal">  
                            </label>
                          </div>

                        </div>
                      </div>

                      <!-- Estado-->

                      <div class="form-group">


                        <label>Estado de puerta</label>
                        <div class="input-group mb-3">
                          <span class="input-group-text">
                            <i id="idPuerta" class="fa fa-door-closed"idPuerta="1" ></i>
                          </span>

                          <div class="custom-control custom-switch ">
                            <input type="checkbox" class="custom-control-input" id="btnPtaEstado" name="estadoPuerta">
                            <label class="custom-control-label" for="btnPtaEstado">  
                            </label>
                          </div>

                        </div>
                      </div>

                      <!-- ENTRADA PARA SUBIR LA FOTO -->

                      <div class="form-group">

                        <div class="panel">SUBIR FOTO</div>

                        <input type="file" class="nuevaFoto" name="nuevaFoto">

                        <p class="help-block">Peso maximo de la foto 2 MB</p>

                        <img src="images/fotoPuertas/puertaDefecto.png" class="img-thumbnail previsualizar" width="100px">

                      </div>

                    </div>

                  </div>


                  <!--================================
                    FOOTER DEL MODAL
                    =================================-->

                    <div class="modal-footer justify-content-between " style="background: #343a40; color:#fff;">

                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                      <button type="submit" class="btn btn-primary">Guardar cambios</button>

                    </div>

            <?php
              $crearPuertas = new PuertasControlador();
              $crearPuertas -> ctrCrearPuerta();

            ?>

          </form>

        </div>
      </div>
    </div>

            <?php
              $borrarPuertas = new PuertasControlador();
              $borrarPuertas -> ctrBorrarPuerta();
            ?>