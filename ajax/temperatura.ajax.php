<?php

require_once "../controlador/temperaturaControlador.php";
require_once "../modelo/temperaturaModelo.php";

/**
 * 
 */
class ajaxTemperatura
{
	public $idTemperatura;

	public function ajaxEditarTemp()
	{
		$item = "id";
		$valor = $this -> idTemperatura;

		$respuesta = temperaturaControlador::ctrMostrarTemp($item, $valor);


		echo json_encode($respuesta);
	}
}

/*=============================================
=            EDITAR Ventana            =
=============================================*/

if (isset($_POST["idTemperatura"])) {

	$editar = new ajaxTemperatura();

	$editar-> idTemperatura = $_POST["idTemperatura"];

	$editar->ajaxEditarTemp();
}