<?php

require_once "../controlador/iluminacionControlador.php";

require_once "../modelo/iluminacionModelo.php";

class AjaxIluminacion{

    /*=================================================
	    EDITAR BOMBILLO
    ================================================*/

    public $idBombillo;

    public function ajaxEditarBombillo(){
        
        $item = "id_bombillo";

        $valor = $this->idBombillo;

        $respuesta = ControladorIluminacion::ctrMostrarIluminacion($item, $valor);

        echo json_encode($respuesta);

    }

   /*==============================
      ENCENDER/APAGAR BOMBILLO 
    =============================*/

    public $activarBombillo;

    public $activarId;

    public function ajaxActivarBombillo()
	{

		$tabla = "iluminacion";

        $item1 = "encendido";
		$valor1 = $this->activarBombillo;

		$item2 = "id_bombillo";
		$valor2 = $this->activarId;

		$respuesta = ModeloIluminacion::mdlActualizarBombillo($tabla, $item1, $valor1, $item2, $valor2);

    }
    
    /*==============================
      INTENSIDAD BOMBILLO 
    =============================*/

    public $idBombilloIntensidad;

    public $intensidad;

    public function ajaxIntensidadBombillo()
	{

		$tabla = "iluminacion";

        $item1 = "intensidad";
		$valor1 = $this->intensidad;

		$item2 = "id_bombillo";
		$valor2 = $this->idBombilloIntensidad;

		$respuesta = ModeloIluminacion::mdlActualizarBombillo($tabla, $item1, $valor1, $item2, $valor2);

	}

}

/*=================================================
	EDITAR BOMBILLO
================================================*/

if (isset($_POST["idBombillo"])) {

    $bombillo = new AjaxIluminacion();

    $bombillo->idBombillo = $_POST["idBombillo"];

    $bombillo->ajaxEditarBombillo();
    
}

/*==============================
    ACTIVAR BOMBILLO
=============================*/

    if (isset($_POST["activarBombillo"])) {
	
        $activarBombillo = new AjaxIluminacion();
    
        $activarBombillo -> activarBombillo = $_POST["activarBombillo"];
    
        $activarBombillo -> activarId = $_POST["activarId"];
    
        $activarBombillo -> ajaxActivarBombillo();
    
    }

    /*==============================
    INTENSIDAD BOMBILLO
=============================*/

if (isset($_POST["idBombillo"])) {
	
    $intensidadBombillo = new AjaxIluminacion();

    $intensidadBombillo -> intensidad = $_POST["intensidad"];

    $intensidadBombillo -> idBombilloIntensidad = $_POST["idBombillo"];

    $intensidadBombillo -> ajaxIntensidadBombillo();

}
