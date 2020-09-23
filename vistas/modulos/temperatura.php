<div class="content-wrapper" style="background: #6c757d; color:white;"> 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-4">
          <h1>Temperatura</h1>
        </div>

        <div class="col-sm-4 d-flex justify-content-center">
          <div class="btn-group">

            <button class="btn btn-success btnAñadir" data-toggle="modal" data-target="#añadir"><i class="fas fa-plus"></i></button>
            <button class="btn btn-info btnImpPt" codigoHap="Habitacion"><i class="fas fa-print"></i></button>
          </div>          
        </div>

        <div class="col-sm-4">

          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active" style="color:white;">Temperatura</li>
          </ol>

        </div>

      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="card-body table-responsive">
      <table class="table table-bordered table-striped table-hover table-dark tablas">        
        <thead class="thead-dark">          
          <tr>
            <th>id</th>
            <th>Habitacion</th>
            <th>Temp</th>
            <th>Hum</th>
            <th>Tvo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody> 

          <?php  

            $item = null;
            $valor = null;

            $temp = temperaturaControlador::ctrMostrarTemp($item, $valor);

            foreach ($temp as $key => $value) {

            echo 

            '<tr>

              <td class="align-middle text-center">
                <h3>'.$value["id"].'</h1> 
              </td>

              <!-- NOMBRE -->
              <td class="align-middle text-center">
                <h3>'.$value["nombre"].'</h1> 
              </td>

              <!-- TEMPERATURA -->
              <td>
                <div class="bg-primary text-white text-center">
                  <h2 class="display-4">'.$value["temp"].'C°</h2>
                </div>
                <div class="d-flex justify-content-center">
                  <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                </div>              
              </td>
              
              <!-- HUMEDAD -->
              <td>
                <div class="bg-primary text-white text-center">
                  <h2 class="display-4">'.$value["hum"].'%</h2>
                </div>
                <div class="d-flex justify-content-center">
                  <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                </div>              
              </td>
              
              <!-- GASES -->
              <td>
                <div class="bg-primary text-white text-center">
                  <h2 class="display-4">'.$value["tvo"].'%</h2>
                </div>
                <div class="d-flex justify-content-center">
                  <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                </div>              
              </td>

              <!-- BOTONES -->
              <td>
                <a class="btn btn-info btnGrafica btn-lg btn-block" href="tempHabitacion" role="button"><i class="fas fa-chart-bar"></i></a>

                <div class="btn-group btn-block">
                  <button class="btn btn-info btnPermiso" data-toggle="modal" data-target="#permisos"><i class="fas fa-users-cog"></i></button>

                  <button class="btn btn-warning btnEditarTemperatura" idTemperatura="'.$value["id"].'" data-toggle="modal" data-target="#editar"><i class="fas fa-bell"></i></button>

                  <button class="btn btn-danger btnEliminar" idCuarto="'.$value["id"].'""><i class="fas fa-times"></i></button>
                </div>
              </td>
            <tr>';
        }

        ?>
        </tbody>
      </table>
    </div>    
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- MODAL EDITAR Y NOTI-->
<div class="modal fade" id="editar">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #343a40; color:#fff;">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Editar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background: #424242; color:#fff;">
          <div class="box-body">

            <div class="form-group">

              <div class="input-group">

                <div class="input-group-prepend">

                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>

                </div>

                <input type="text" class="form-control input-lg" name="idActual" id="idActual" required readonly>

              </div>

            </div>

          </div>
          <!-- Mmodifikar nombre -->
          <div class="box-body">

            <div class="form-group">

              <div class="input-group">

                <div class="input-group-prepend">

                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>

                </div>

                <input type="text" class="form-control input-lg" name="editarCuarto" id="editarCuarto"  required>

              </div>

            </div>

          </div>

          <div class="box-body">
            <h6>Ingrese la temperatura actual</h6>
            <div class="form-group">
              
              <div class="input-group">

                <div class="input-group-prepend">

                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>

                </div>

                <input type="text" class="form-control input-lg" name="editarTemp" id="editarTemp"  required>

              </div>

            </div>
          </div><br>

          <div class="box-body">
            <h6>Ingrese la humedad actual</h6>
            <div class="form-group">

              <div class="input-group">

                <div class="input-group-prepend">

                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>

                </div>

                <input type="text" class="form-control input-lg" name="editarHum" id="editarHum"  required>

              </div>

            </div>
          </div><br>

          <div class="box-body">
            <h6>Ingrese el porcentaje de gases actual</h6>
            <div class="form-group">
              
              <div class="input-group">

                <div class="input-group-prepend">

                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>

                </div>

                <input type="text" class="form-control input-lg" name="editarTvo" id="editarTvo"  required>

              </div>

            </div>
          </div>

        </div>

        <div class="modal-footer" style="background: #343a40; color:#fff;">

            <button type="submit" class="btn btn-dark">guardar</button>

            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

        </div>

        <?php

            $registro = new temperaturaControlador();

            $registro->ctrEditarTemperatura();

          ?>

      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- MODAL AÑADIR -->
<div class="modal fade" id="añadir">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #343a40; color:#fff;">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Añadir</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background: #424242; color:#fff;">
          <!-- Mmodifikar nombre -->
          <div class="box-body">

            <div class="form-group">

              <div class="input-group">

                <div class="input-group-prepend">

                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>

                </div>

                <input type="text" class="form-control input-lg" name="nuevoCuarto"
                placeholder="Ingresar Nombre" required>

              </div>

            </div>

          </div>

          <div class="box-body">
            <h6>Ingrese la temperatura actual</h6>
            <div class="form-group">
              
              <div class="input-group">

                <div class="input-group-prepend">

                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>

                </div>

                <input type="text" class="form-control input-lg" name="temp"
                placeholder="Ingresar Nombre" required>

              </div>

            </div>
          </div><br>

          <div class="box-body">
            <h6>Ingrese la humedad actual</h6>
            <div class="form-group">

              <div class="input-group">

                <div class="input-group-prepend">

                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>

                </div>

                <input type="text" class="form-control input-lg" name="hum"
                placeholder="Ingresar Nombre" required>

              </div>

            </div>
          </div><br>

          <div class="box-body">
            <h6>Ingrese el porcentaje de gases actual</h6>
            <div class="form-group">
              
              <div class="input-group">

                <div class="input-group-prepend">

                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>

                </div>

                <input type="text" class="form-control input-lg" name="tvo"
                placeholder="Ingresar Nombre" required>

              </div>

            </div>
          </div>

        </div>

        <div class="modal-footer" style="background: #343a40; color:#fff;">

            <button type="submit" class="btn btn-dark">Agregar</button>

            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

        </div>

        <?php

            $registro = new temperaturaControlador();

            $registro->ctrCrearCuarto();

          ?>

      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- MODAL PERMISOS-->
<div class="modal fade" id="permisos">
  <div class="modal-dialog">
    <div class="modal-content" style="background: #343a40; color:#fff;">
      <div class="modal-header">
        <h4 class="modal-title">Permisos</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #424242; color:#fff;" >
        <div class="table-responsive">
          <table class="table" >
            <caption>Permisos para administar los controles de la habitacion</caption>
            <thead>
              <tr>
                <th scope="col">Usuario</th>
                <th scope="col">Permiso</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">David</th>
                <td><button class="btn btn-success btn-xs" idUsuario="">Activado</button></td>
              </tr>
              <tr>
                <th scope="row">Edwin</th>
                <td><button class="btn btn-danger btn-xs" idUsuario="">Desactivado</button></td>
              </tr>
            </tbody>
          </table>
        </div>    

        <div class="form-check">

        </div>
      </div>

      <div class="modal-footer justify-content-between" style="background: #333; color: #888;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php

  $borrar = new temperaturaControlador();
  $borrar->ctrBorrarCuarto();

?>