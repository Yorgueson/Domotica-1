/*==============================
   DATATABLE
   =============================*/

   $(".tabla").DataTable({

     "language":{

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registro",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningun dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_", 
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(Filtrando de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
       "sFirst": "Primero",
       "sLast": "Último",
       "sNext": "Siguiente",
       "sPrevious": "Anterior",
     },
     "oAria": {
       "sSortAscending": "Activar para ordenar la columna de manera ascendente",
       "sSortDescending": "Activar para ordenar la columna de manera descendiente",
     },

   }

 });

/*==============================
   Bootstrap Switch
   =============================*/

   $("input[data-bootstrap-switch]").each(function(){
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
  });

/*=============================================
=            EDITAR PUERTA            =
=============================================*/

$(document).on("click", ".btnEditarPuerta" ,function(){
  
  var idPuerta = $(this).attr("idPuerta");

  var datos = new FormData();

  datos.append("idPuerta",idPuerta);

  $.ajax({

    url: 'ajax/puertas.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success:function(respuesta){

      $("#editarNombre").val(respuesta["nombre"]);
      $("#puertaBloqueoModal").val(respuesta["sensorBloqueo"]);
      $("#puertaAlarmaModal").val(respuesta["alarma"]);
      $("#fotoActual").val(respuesta["foto"]);
      $("#idPuerta").val(respuesta["estado"]);
      $("#idPuertaEditar").val(respuesta["numero"]);
      if(respuesta["foto"] != ""){
        $(".previsualizar").attr("src", respuesta["foto"]);
      }

    } 

  });
})

/*==============================
	BLOQUEAR/DESBLOQUEAR (PUERTA)
  =============================*/

  var botonPuerta = document.getElementById("btnOnOff");

  var iconoPuerta= document.getElementById("puertaAbierta");

  $(botonPuerta).click(function(){

    var estadoPuerta = $(iconoPuerta).attr("estadoPuerta");

    if (estadoPuerta == 1) {

      Swal.fire({

        icon: "warning",
        title: "¿Esta seguro que desea desbloquear la puerta?",
        text: "¡Si no lo esta puede cancelar la accion!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, ¡Dejar de bloquearla!'

      }).then((result) => {

        $(iconoPuerta).removeClass('fa fa-door-closed');

        $(iconoPuerta).addClass('fa fa-door-open');

        $(iconoPuerta).attr('estadoPuerta', 0);

      })

    } else {

      $(iconoPuerta).removeClass('fa fa-door-open');

      $(iconoPuerta).addClass('fa fa-door-closed');

      $(iconoPuerta).attr('estadoPuerta', 1);

    }

  })

  /*=====  fin del  bloquear/desbloquear (puerta)  ======*/



/*===============================================
=            sweet alert de eliminar            =
===============================================*/

$(document).on("click",'.btnEliminarPuerta', function() {

  var idPuerta = $(this).attr("idPuerta");
  var fotoPuerta = $(this).attr("fotoPuerta");
  var nombrePuerta = $(this).attr("nombrePuerta");

  Swal.fire({

    title: '<span class="tituloWhite"> ¿Estas seguro de eliminarlo? </span>',
    html: '<p class="text-white"> Puedes cancelar la accion si no estas seguro </p>',
    type: 'warning',
    background: '#343a40',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'si, eliminarlo!'

  }).then(function(result){

    if (result.value) {

        window.location = "index.php?vista=puertas&idPuerta="+idPuerta+"&fotoPuerta="+fotoPuerta+"&nombrePuerta="+nombrePuerta;
        

      }
  })
  

});

/*=====  fin del  sweet alert de eliminar  ======*/



  /*==================================================
  =            ALARMA.             =
  ==================================================*/
  
  var botonAlarma = document.getElementById("btnMonitorear");

  var iconoAlarma= document.getElementById("puertaAlarma");

  $(botonAlarma).click(function(){

    var estadoAlarma = $(iconoAlarma).attr("estadoAlarma");

    if (estadoAlarma == 1) {

      Swal.fire({

        icon: "warning",
        title: "¿Esta seguro que desea desactivar la alarma?",
        text: "¡Si no lo esta puede cancelar la accion!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, ¡Desactivarla!'

      }).then((result) => {

        $(iconoAlarma).removeClass('far fa-siren-on');

        $(iconoAlarma).addClass('far fa-siren');

        $(iconoAlarma).attr('estadoAlarma', 0);

      })

    } else {

      $(iconoAlarma).removeClass('far fa-siren');

      $(iconoAlarma).addClass('far fa-siren-on');

      $(iconoAlarma).attr('estadoAlarma', 1);

    }

  })
  
  
  /*=====  fin del Sweet alert de monitorear.  ======*/
  

    /*==================================================
  =            BLOQUEO MODAL EDITAR.             =
  ==================================================*/
  

  var botonBloqueoModal = document.getElementById("btnBloqueoModal");

  var iconoBloqueoModal= document.getElementById("puertaBloqueoModal");

  $(botonBloqueoModal).click(function(){

    var estadoBloqueoModal = $(iconoBloqueoModal).attr("estadoBloqueoModal");

    if (estadoBloqueoModal == 1) {


      $(iconoBloqueoModal).removeClass('far fa-lock-open-alt');

      $(iconoBloqueoModal).addClass('far fa-lock-alt');

      $(iconoBloqueoModal).attr('estadoBloqueoModal', 0);


    } else {

      $(iconoBloqueoModal).removeClass('far fa-lock-alt');

      $(iconoBloqueoModal).addClass('far fa-lock-open-alt');

      $(iconoBloqueoModal).attr('estadoBloqueoModal', 1);

    }

  })

 /*==================================================
  =            ESTADO MODAL EDITAR.             =
  ==================================================*/
  

  var botonEstadoModal = document.getElementById("btnEstadoModal");

  var iconoEstadoModal= document.getElementById("puertaEstadoModal");

  $(botonEstadoModal).click(function(){

    var estadoPuertaModal = $(iconoEstadoModal).attr("estadoPuertaModal");

    if (estadoPuertaModal == 1) {


      $(iconoEstadoModal).removeClass('far fa-door-open');

      $(iconoEstadoModal).addClass('far fa-door-closed');

      $(iconoEstadoModal).attr('estadoPuertaModal', 0);

    } else {

      $(iconoEstadoModal).removeClass('far fa-door-closed');

      $(iconoEstadoModal).addClass('far fa-door-open');

      $(iconoEstadoModal).attr('estadoPuertaModal', 1);

    }

  })

 /*==================================================
  =            ALARMA MODAL EDITAR.             =
  ==================================================*/
  

  var botonAlarmaModal = document.getElementById("btnAlarmaModal");

  var iconoAlarmaModal= document.getElementById("puertaAlarmaModal");

  $(botonAlarmaModal).click(function(){

    var alarmaPuertaModal = $(iconoAlarmaModal).attr("alarmaPuertaModal");

    if (alarmaPuertaModal == 1) {


      $(iconoAlarmaModal).removeClass('far fa-siren');

      $(iconoAlarmaModal).addClass('far fa-siren-on');

      $(iconoAlarmaModal).attr('alarmaPuertaModal', 0);

    } else {

      $(iconoAlarmaModal).removeClass('far fa-siren-on');

      $(iconoAlarmaModal).addClass('far fa-siren');

      $(iconoAlarmaModal).attr('alarmaPuertaModal', 1);

    }
  })
  
    /*==================================================
  =            BLOQUEO MODAL AGREGAR.             =
  ==================================================*/



  var botonAgregarBloqueoModal = document.getElementById("btnAgregarBloqueoModal");

  var iconoAgregarBloqueoModal= document.getElementById("agregarPuertaBloqueoModal");

  $(botonAgregarBloqueoModal).click(function(){

    var agregarEstadoBloqueoModal = $(iconoAgregarBloqueoModal).attr("agregarEstadoBloqueoModal");

    if (agregarEstadoBloqueoModal == 1) {

      $(iconoAgregarBloqueoModal).removeClass('far fa-lock-alt');

      $(iconoAgregarBloqueoModal).addClass('far fa-lock-open-alt');

      $(iconoAgregarBloqueoModal).attr('agregarEstadoBloqueoModal', 0);
      
    } else {

      $(iconoAgregarBloqueoModal).removeClass('far fa-lock-open-alt');

      $(iconoAgregarBloqueoModal).addClass('far fa-lock-alt');

      $(iconoAgregarBloqueoModal).attr('agregarEstadoBloqueoModal', 1);


    }

  })

/*==================================================
  =            ESTADO MODAL AGREGAR.             =
  ==================================================*/
  

  var botonAgregarEstadoModal = document.getElementById("btnAgregarEstadoModal");

  var iconoAgregarEstadoModal= document.getElementById("agregarPuertaEstadoModal");

  $(botonAgregarEstadoModal).click(function(){

    var agregarEstadoPuertaModal = $(iconoAgregarEstadoModal).attr("agregarEstadoPuertaModal");

    if (agregarEstadoPuertaModal == 1) {


      $(iconoAgregarEstadoModal).removeClass('far fa-door-open');

      $(iconoAgregarEstadoModal).addClass('far fa-door-closed');

      $(iconoAgregarEstadoModal).attr('agregarEstadoPuertaModal', 0);

    } else {

      $(iconoAgregarEstadoModal).removeClass('far fa-door-closed');

      $(iconoAgregarEstadoModal).addClass('far fa-door-open');

      $(iconoAgregarEstadoModal).attr('agregarEstadoPuertaModal', 1);

    }

  })

    /*==================================================
  =            ALARMA MODAL AGREGAR.             =
  ==================================================*/



  var botonAgregarAlarmaModal = document.getElementById("btnAgregarAlarmaModal");

  var iconoAgregarAlarmaModal= document.getElementById("agregarPuertaAlarmaModal");

  $(botonAgregarAlarmaModal).click(function(){

    var agregarAlarmaPuertaModal = $(iconoAgregarAlarmaModal).attr("agregarAlarmaPuertaModal");

    if (agregarAlarmaPuertaModal == 1) {


      $(iconoAgregarAlarmaModal).removeClass('far fa-siren');
      
      $(iconoAgregarAlarmaModal).addClass('far fa-siren-on');

      $(iconoAgregarAlarmaModal).attr('agregarAlarmaPuertaModal', 0);


    } else {

      $(iconoAgregarAlarmaModal).removeClass('far fa-siren-on');
      
      $(iconoAgregarAlarmaModal).addClass('far fa-siren');

      $(iconoAgregarAlarmaModal).attr('agregarAlarmaPuertaModal', 1);

    }
    
  })




 /*==================================================
  =            ESTADO PUERTA MODAL .             =
  ==================================================*/

  var botonAgregarEstado = document.getElementById("btnPtaEstado");

  var iconoEstadoAgregar= document.getElementById("idPuerta");

  $(botonAgregarEstado).click(function(){

    var idPuerta = $(iconoEstadoAgregar).attr("idPuerta");

    if (idPuerta == 1) {


      $(iconoEstadoAgregar).removeClass('fa fa-door-closed');
      
      $(iconoEstadoAgregar).addClass('fas fa-business-time');

      $(iconoEstadoAgregar).attr('idPuerta', 0);


    } else {

      $(iconoEstadoAgregar).removeClass('fas fa-business-time');
      
      $(iconoEstadoAgregar).addClass('fa fa-door-closed');

      $(iconoEstadoAgregar).attr('idPuerta', 1);

    }
    
  })
  /*=====================================
  =            Estado Puerta            =
  =====================================*/
  
  $(document).on("click",".btnPtaEstado", function() {
  
  var idPuerta = $(this).attr("idPuerta");

  var estadoPuerta = $(this).attr("estadoPuerta");

  var datos = new FormData();

  datos.append("puertaNumero",idPuerta);

  datos.append("estadoPuerta",estadoPuerta);

  $.ajax({

    url: 'ajax/puertas.ajax.php',
      method: 'POST',
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success:function(respuesta){

        if (window.matchMedia("(max-width:767px)")) {

          Swal.fire({

                type: 'success',
                title: '<span Class="text-white">¡El estado de la puerta se a actualizado correctamente!</span>',
                    background: '#343a40',
                    showConfirmButton: true,
                    confirmButtonColor: '#28a745',
                    confirmButtonText: 'Ok',
                    closeOnConfirm: false 

                    }).then((result)=>{

                        if(result.value){

                          window.location = 'puertas';
                        }      
                    });
        }

      }


  })

  if (estadoPuerta == 0) {

    $(this).removeClass('btn-success');
    $(this).addClass('btn-danger');
    $(this).html('Mal Estado');
    $(this).attr('estadoPuerta',1);

  } else {

    $(this).removeClass('btn-danger');
    $(this).addClass('btn-success');
    $(this).html('Buen Estado');
    $(this).attr('estadoPuerta',0);

  }

})
  
  /*=====  End of Estado Puerta  ======*/
  

  /*=============================================
=    Subiendo foto del usuario      =
=============================================*/

$(".nuevaFoto").change(function(){

  var imagen = this.files[0];

  /*=============================================
  Validar Formato Foto
  =============================================*/

  if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

    $(".nuevaFoto").val("");

    Swal.fire({

      icon: "error",
      title: 'Error al subir la imagen',
      text: 'La imagen debe estar en formato JPG o PNG',
      confirmButtonColor: '#dc3545',
      confirmButtonText: 'Cerrar'

    });

  }else if(imagen["size"] > 2000000){

    $(".nuevaFoto").val("");

    Swal.fire({

      type: 'error',
      background: '#343a40',
      html: '<p class="tituloWhite"> ¡Error al subir la imagen! </p>',
      text: 'La imagen excede el tamaño permitido de 2MB',
      confirmButtonColor: '#dc3545',
      confirmButtonText: 'Ok'

    });

  }else{

    var datosImagen = new FileReader;

    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function(event){

      var rutaImagen = event.target.result;
      
      $(".previsualizar").attr("src", rutaImagen);
    });
  }
})




