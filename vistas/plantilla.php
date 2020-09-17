<?php 

  session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
  
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?php echo $_GET["vista"]; ?></title>

  <link rel="icon" href="images/icons/casa.png">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--================================
    PLUGINS DE CSS
  =================================-->

  <!-- Font Awesome -->
  <link href="https://kit-pro.fontawesome.com/releases/v5.13.1/css/pro.min.css" rel="stylesheet">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Iconos Pro -->
  <link href="https://kit-pro.fontawesome.com/releases/v5.13.1/css/pro.min.css" rel="stylesheet">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- daterange picker -->
  <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">
  
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="vistas/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  
  <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">

  <!-- Morris chart -->
  <link rel="stylesheet" href="vistas/plugins/morris.js/morris.css">

  <!--================================
    PLUGINS DE JAVASCRIPT
  =================================-->

  <!-- jQuery -->
  <script src="vistas/plugins/jquery/jquery.min.js"></script>

  <!-- Bootstrap 4 -->
  <script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

  <!-- Sweet Alert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
  
  <!-- Plugin para Internet Explorer 11 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!-- jQuery Knob -->
  <script src="vistas/plugins/jquery-knob/jquery.knob.min.js"></script>

  <!-- Sparkline -->
  <script src="vistas/plugins/sparklines/sparkline.js"></script>

  <!-- Bootstrap Switch -->
  <script src="vistas/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

    <!-- jQuery UI  -->
  <script src="vistas/plugins/jquery-ui/jquery-ui.min.js"></script>

  <!-- AdminLTE for demo purposes  -->
  <script src="vistas/dist/js/demo.js"></script>

  <!-- FLOT CHARTS  -->
  <script src="vistas/plugins/flot/jquery.flot.js"></script>

  <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized  -->
  <script src="vistas/plugins/flot-old/jquery.flot.resize.min.js"></script>

  <!-- FLOT PIE PLUGIN - also used to draw donut charts  -->
  <script src="vistas/plugins/flot-old/jquery.flot.pie.min.js"></script>


  <!-- bootstrap color picker -->
  <script src="vistas/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  
  

  <!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
  <script src="vistas/plugins/raphael/raphael.min.js"></script>
  <script src="vistas/plugins/morris.js/morris.min.js"></script>

  <!-- ChartJS http://www.chartjs.org/-->
  <script src="vistas/plugins/Chart.js/Chart.js"></script>

  <!-- InputMask -->
<script src="vistas/plugins/moment/moment.min.js"></script>
<script src="vistas/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>


<!-- date-range-picker -->
<script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>





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
                $_GET["vista"] == "iluminacion") {
              
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


?>



<script src="./vistas/js/puertas.js"></script>
<script src="./vistas/js/usuario.js"></script>
<!-- <script src="./vistas/js/serviciosP.js"></script> -->

</body>
</html>
