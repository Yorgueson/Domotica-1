<?php

  session_start();

 ?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title> DomoticaHOME</title>

  <link rel="icon" href="images/icons/casa.png">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- =============================================================
                PLUGINS
  ============================================================= -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="vistas/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- bootstrap slider -->
  <link rel="stylesheet" href="vistas/plugins/bootstrap-slider/css/bootstrap-slider.min.css">
  <!-- Booststrap -->
  <link  rel="stylesheet" href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css">


  <!-- =============================================================
          JS
  ============================================================= -->
  <!-- jQuery -->
  <script src="vistas/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="vistas/dist/js/demo.js"></script>
  <!-- DataTables -->
  <script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- FLOT CHARTS -->
  <script src="vistas/plugins/flot/jquery.flot.js"></script>
  <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
  <script src="vistas/plugins/flot-old/jquery.flot.resize.min.js"></script>
  <!-- jQuery Knob -->
  <script src="vistas/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- chart -->
  <script src="vistas/plugins/chart.js/Chart.min.js"></script>
  <!-- Bootstrap slider -->
  <script src="vistas/plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
  <!-- Bootstrap Switch -->
  <script src="vistas/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
  <!-- Bootstrap toggle-->
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->


<?php

  if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {


    echo '<div class="wrapper">';

       /*=============================================
       =            CABEZOTE            =
       =============================================*/
          include "vistas/modulos/cabezote.php";

       /*=============================================
       =            MENU           =
       =============================================*/
          include "vistas/modulos/menu.php";

       /*=============================================
       =            CONTENIDO            =
       =============================================*/
          if (isset($_GET["vista"])) {

              if ($_GET["vista"] == "inicio"||
                  $_GET["vista"] == "usuarios"||
                  $_GET["vista"] == "serviciosPublicos"||
                  $_GET["vista"] == "temperatura"||
                  $_GET["vista"] == "puertas"||
                  $_GET["vista"] == "ventanas"||
                  $_GET["vista"] == "salir"||
                  $_GET["vista"] == "iluminacion" ||
                  $_GET["vista"] == "tempHabitacion") {

                include 'vistas/modulos/'.$_GET["vista"].'.php';


              }else{

                include 'vistas/modulos/404.php';
              }
          }


       /*=============================================
       =            FOOTER           =
       =============================================*/
          include "vistas/modulos/footer.php";

    echo '</div>';

  }else{

    include "vistas/modulos/login.php";

  }

  if($_GET["vista"] == "serviciosPublicos"){

    echo '<script src="./vistas/js/serviciosP.js"></script>';
  }

?>



<script src="./vistas/js/plantilla.js"></script>
<script src="./vistas/js/usuario.js"></script>
<script src="vistas/js/temperatura.js"></script>
<script src="vistas/js/knob.js"></script>
<script src="vistas/js/boostrapSlider.js"></script>


<script src="vistas/js/GrafTemperatura.js"></script>
<script src="vistas/js/GrafHum.js"></script>
<script src="vistas/js/GrafTvo.js"></script>





</body>
</html>
