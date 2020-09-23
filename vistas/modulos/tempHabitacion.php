<div class="content-wrapper" style="background: #6c757d; color:white;">
  
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-sm-4">
          <h1>Habitacion 1</h1>
        </div>

        <div class="col-sm-4 d-flex justify-content-center">
          <button class="btn btn-info btnImprimir"><i class="fas fa-print"></i></button>
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

  <!-- Temperatura -->
  <section class="content">
    <div class="card">
      <div class="card-header" style="background: #343a40; color:#fff;">
        <a>Temperatura</a>
      </div>
      <div class="card-body" style="background: #424242;">
        <div class="row">

          <!-- Control -->
          <div class="col-md-4 text-center">
            <div class="card card-primary">
              <div class="card-header" style="background:#343a40;">
               <h3 class="card-title">Control</h3>                  
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                  </button>                      
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <input type="text" class="knob" value="30" data-fgColor="#3c8dbc">
                <div class="knob-label text-primary">Temperatura y aire acondicionado</div>
                <input type="checkbox" checked data-toggle="toggle" data-size="large" data-width="100">
              </div>
            </div>
          </div>

          <!-- Grafico temp -->
          <div class="col-md-8">
              <div class="card card-primary">
                <div class="card-header" style="background:#343a40;">
                  <h3 class="card-title">Historial</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                      <i class="fas fa-expand"></i>
                    </button>                      
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">

                  <div class="chart-container" style="position: relative;">
                    <canvas id="GrafTemp" class="chartjs-render-monitor"></canvas>
                  </div>
                  
                </div>
                <!-- /.card-body -->
              </div>
          </div>

        </div>
      </div>
    </div>  
  </section>

  <!-- Humedad -->
  <section class="content">
    <div class="card">
      <div class="card-header" style="background: #343a40; color:#fff;">
        <a>Humedad</a>
      </div>      
      <div class="card-body" style="background: #424242;">
        <div class="row">
          <!-- Control -->
          <div class="col-md-4 text-center">
            <div class="card card-primary">
              <div class="card-header" style="background:#343a40;">
               <h3 class="card-title">Control</h3>                  
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                  </button>                      
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <input type="text" class="knob" data-readonly="true" value="30" data-fgColor="#3c8dbc">
                <div class="knob-label text-primary">Humedad y humidificador</div>
                <input type="checkbox" checked data-toggle="toggle" data-size="large" data-width="100">
              </div>
            </div>
          </div>            
          <!-- grafiko Humedad -->
          <div class="col-8">
              <div class="card card-primary">
                <div class="card-header" style="background:#343a40;">
                  <h3 class="card-title">Historial</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                      <i class="fas fa-expand"></i>
                    </button>                      
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-container" style="position: relative;">
                    <canvas id="GrafHum" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>  
  </section>

  <!-- TVOC -->
  <section class="content">
    <div class="card">
      <div class="card-header" style="background: #343a40; color:#fff;">
        <a>TVOC</a>
      </div>       
      <div class="card-body" style="background: #424242;">
        <div class="row">
          <!-- Control -->
          <div class="col-md-4 text-center">
            <div class="card card-primary">
              <div class="card-header" style="background:#343a40;">
               <h3 class="card-title">Control</h3>                  
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                  </button>                      
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <input type="text" class="knob" data-readonly="true" value="30" data-fgColor="#3c8dbc">
                <div class="knob-label text-primary">TVOC y Purificador</div>
                <input type="checkbox" checked data-toggle="toggle" data-size="large" data-width="100">
              </div>
            </div>
          </div>
          <!-- Grafico TVOC -->
          <div class="col-8">
              <div class="card card-primary">
                <div class="card-header" style="background:#343a40;">
                  <h3 class="card-title">Historial</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                      <i class="fas fa-expand"></i>
                    </button>                      
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">

                  <div class="chart-container" style="position: relative;">
                    <canvas id="GrafTvo" class="chartjs-render-monitor"></canvas>
                  </div>


                </div>
                <!-- /.card-body -->
              </div>
          </div>
        </div>
      </div>
    </div>  
  </section>

</div>
