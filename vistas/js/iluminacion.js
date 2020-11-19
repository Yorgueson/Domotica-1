//////////////////////////////////
/*       */




$(".btnEliminarBombillo").click(function() {

    var idBombillo = $(this).attr("idBombillo");

    Swal.fire({

		icon: "warning",
		title: "¿Esta seguro de borrar el bombillo?",
		text: "¡Si no lo esta puede cancelar la acción!",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, ¡Borrar bombillo!'

	}).then(function(result){
		
		if (result.value) {
			
			window.location = "index.php?vista=iluminacion&idBombillo="+idBombillo;
			
		}
		
	})
    
})

/*=================================================
	    EDITAR BOMBILLO
================================================*/

$(".btnEditarBombillo").click(function() {

	var idBombillo = $(this).attr("idBombillo");

    var datos = new FormData();

    datos.append("idBombillo", idBombillo);

    $.ajax({

        url: "ajax/iluminacion.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            $("#editarNombre").val(respuesta["nombre"]);

            $("#idBombillo").val(respuesta["id_bombillo"]);
            
        }

    })
    
})



$(function () {
    /* jQueryKnob */

    $('.knob').knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a   = this.angle(this.cv)  // Angle
            ,
              sa  = this.startAngle          // Previous start angle
            ,
              sat = this.startAngle         // Start angle
            ,
              ea                            // Previous end angle
            ,
              eat = sat + a                 // End angle
            ,
              r   = true

          this.g.lineWidth = this.lineWidth

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3)

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value)
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3)
            this.g.beginPath()
            this.g.strokeStyle = this.previousColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
            this.g.stroke()
          }

          this.g.beginPath()
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
          this.g.stroke()

          this.g.lineWidth = 2
          this.g.beginPath()
          this.g.strokeStyle = this.o.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
          this.g.stroke()

          return false
        }
      }
    })
    /* END JQUERY KNOB */

    //INITIALIZE SPARKLINE CHARTS
    $('.sparkline').each(function () {
      var $this = $(this)
      $this.sparkline('html', $this.data())
    })

    /* SPARKLINE DOCUMENTATION EXAMPLES http://omnipotent.net/jquery.sparkline/#s-about */
    drawDocSparklines()
    drawMouseSpeedDemo()

  })



$(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data        = [],
        totalPoints = 100
  
    function getRandomData() {
  
      if (data.length > 0) {
        data = data.slice(1)
      }
  
      // Do a random walk
      while (data.length < totalPoints) {
  
        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y    = prev + Math.random() * 10 - 5
  
        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }
  
        data.push(y)
      }
  
      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }
  
      return res
    }
  
    var interactive_plot = $.plot('#interactive', [
        {
          data: getRandomData(),
        }
      ],
      {
        grid: {
          borderColor: '#f3f3f3',
          borderWidth: 1,
          tickColor: '#f3f3f3'
        },
        series: {
          color: '#3c8dbc',
          lines: {
            lineWidth: 2,
            show: true,
            fill: true,
          },
        },
        yaxis: {
          min: 0,
          max: 100,
          show: true
        },
        xaxis: {
          show: true
        }
      }
    )
  
    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {
  
      interactive_plot.setData([getRandomData()])
  
      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on') {
        setTimeout(update, updateInterval)
      }
    }
  
    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     */
  
  
    /*
     * LINE CHART
     * ----------
     */
    //LINE randomly generated data
  
    var sin = [],
        cos = []
    for (var i = 0; i < 14; i += 0.5) {
      sin.push([i, Math.sin(i)])
      cos.push([i, Math.cos(i)])
    }
    var line_data1 = {
      data : sin,
      color: '#3c8dbc'
    }
    var line_data2 = {
      data : cos,
      color: '#00c0ef'
    }
    $.plot('#line-chart', [line_data1, line_data2], {
      grid  : {
        hoverable  : true,
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0,
        lines     : {
          show: true
        },
        points    : {
          show: true
        }
      },
      lines : {
        fill : false,
        color: ['#3c8dbc', '#f56954']
      },
      yaxis : {
        show: true
      },
      xaxis : {
        show: true
      }
    })
    //Initialize tooltip on hover
    $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
      position: 'absolute',
      display : 'none',
      opacity : 0.8
    }).appendTo('body')
    $('#line-chart').bind('plothover', function (event, pos, item) {
  
      if (item) {
        var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2)
  
        $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
          .css({
            top : item.pageY + 5,
            left: item.pageX + 5
          })
          .fadeIn(200)
      } else {
        $('#line-chart-tooltip').hide()
      }
  
    })
    /* END LINE CHART */
  
    /*
     * FULL WIDTH STATIC AREA CHART
     * -----------------
     */
    var areaData = [[2, 88.0], [3, 93.3], [4, 102.0], [5, 108.5], [6, 115.7], [7, 115.6],
      [8, 124.6], [9, 130.3], [10, 134.3], [11, 141.4], [12, 146.5], [13, 151.7], [14, 159.9],
      [15, 165.4], [16, 167.8], [17, 168.7], [18, 169.5], [19, 168.0]]
    $.plot('#area-chart', [areaData], {
      grid  : {
        borderWidth: 0
      },
      series: {
        shadowSize: 0, // Drawing is faster without shadows
        color     : '#00c0ef',
        lines : {
          fill: true //Converts the line chart to area chart
        },
      },
      yaxis : {
        show: false
      },
      xaxis : {
        show: false
      }
    })
  
    /* END AREA CHART */
  
    /*
     * BAR CHART
     * ---------
     */
  
    var bar_data = {
      data : [[1,10], [2,8], [3,4], [4,13], [5,17], [6,9]],
      bars: { show: true }
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: [[1,'January'], [2,'February'], [3,'March'], [4,'April'], [5,'May'], [6,'June']]
      }
    })
    /* END BAR CHART */
  
    /*
     * DONUT CHART
     * -----------
     */
  
    var donutData = [
      {
        label: 'Series2',
        data : 30,
        color: '#3c8dbc'
      },
      {
        label: 'Series3',
        data : 20,
        color: '#0073b7'
      },
      {
        label: 'Series4',
        data : 50,
        color: '#00c0ef'
      }
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }
  
        }
      },
      legend: {
        show: false
      }
    })
    /*
     * END DONUT CHART
     */
  
  })
  
  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
  
  /*==============================
      ENCENDER/APAGAR BOMBILLO 
  =============================*/

    $(".btnEncender").click(function(){

      var idBombillo = $(this).attr("idBombillo");
  
      var encendidoBombillo = $(this).attr("estadoBombillo");

      Swal.fire({

        icon: "warning",
        title: "¿Esta seguro de esta accion?",
        text: "¡Si no lo esta puede cancelar la acción!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si!'
    
      }).then(function(result){
        
        if (result.value) {
          
          var datos = new FormData();
  
          datos.append("activarId", idBombillo);
      
          datos.append("activarBombillo", encendidoBombillo);
      
          $.ajax({
      
              url: "ajax/iluminacion.ajax.php",
              method: "POST",
              data: datos,
              cache: false,
              contentType: false,
              processData: false,
      
              success: function(respuesta){

                window.location = "iluminacion";
      
              }
      
          })
          
        }
        
      })
  
      if (estadoBombillo == 0) {
  
          $(this).removeClass('btn-outline-primary');
          $(this).addClass('btn-outline-danger');
          $(this).attr('estadoBombillo', 1);
  
      } else {
  
          $(this).addClass('btn-outline-primary');
          $(this).removeClass('btn-outline-danger');
          $(this).attr('estadoBombillo', 0);
  
    }
  
  })

function actualizarIntensidad(val, idBombillo) {

  var idBombillo = idBombillo;

  var intensidad = val;

  console.log("Intensidad", intensidad);

  console.log("idBombillo", idBombillo);

  var datos = new FormData();

  datos.append("idBombillo", idBombillo);

  datos.append("intensidad", intensidad);

  $.ajax({

      url: "ajax/iluminacion.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,

      success: function(respuesta){

        window.location = "iluminacion";

      }

  })

}