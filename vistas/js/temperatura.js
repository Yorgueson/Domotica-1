/*==============================
   Sweet alert eliminar
=============================*/

$(document).on("click", ".btnEliminar", function(){

    var idCuarto = $(this).attr("idCuarto");

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

        window.location = "index.php?vista=temperatura&idCuarto="+idCuarto;
        

      }
  })
})

/*==============================
   Bootstrap Switch
=============================*/

$("input[data-bootstrap-switch]").each(function(){
  $(this).bootstrapSwitch('state', $(this).prop('checked'));
});

$(document).on("click", ".btnEditarTemperatura", function () {

    var idTemperatura = $(this).attr("idTemperatura");

    document.getElementById('idActual').value=idTemperatura;

    console.log("el id es: " + idTemperatura);

    var datos = new FormData();

    datos.append("idTemperatura", idTemperatura);

    $.ajax({

        url: 'ajax/temperatura.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (respuesta) {

          $("#editarCuarto").val(respuesta["nombre"]);
          $("#editarTemp").val(respuesta["temp"]);
          $("#editarHum").val(respuesta["hum"]);
          $("#editarTvo").val(respuesta["tvo"]);

        }

    });
});

