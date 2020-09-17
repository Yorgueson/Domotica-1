<?php 
	
	require_once "../controlador/puertas.controlador.php";
	require_once "../modelo/puertaModelo.php";

	/**
	 * 
	 */
	class ajaxPuertas{
		
		public $idPuerta;

		public function ajaxEditarPuerta()
		{
			$item = "numero";
			$valor = $this -> idPuerta;

			$respuesta = PuertasControlador::ctrMostrarPuerta($item, $valor);
			echo json_encode($respuesta);

		}
	

	/*=============================================
	=            Puerta Estado           =
	=============================================*/

		public $puertaNumero;
		public $estadoPuerta;

		public function ajaxEstadoPuerta()
		{

			$tabla = "puertas";

			$item1  = "estado";

			$valor1 = $this->estadoPuerta;

			$item2 ="numero";
			
			$valor2 =$this->puertaNumero;

			$respuesta = puertaModelo::mdlActualizarPuerta($tabla, $item1, $valor1, $item2, $valor2);

		}



		/*=============================================
		=    VALIDAR NO REPETIR USUARIO            =
		=============================================*/

	// 	public $validarUsuario;
	// 	public function ajaxValidarUsuario()
	// 	{
	// 		$item = "usuario";
	// 		$valor = $this ->validarUsuario;

	// 		$respuesta = usuariosControlador::ctrMostrarUsuario($item, $valor);

	// 		echo json_encode($respuesta);

	// 	}
	}

/*=============================================
=            EDITAR PUERTA          =
=============================================*/

if (isset($_POST["idPuerta"])) {
	
		$editar = new ajaxPuertas();

		$editar -> idPuerta = $_POST["idPuerta"];

		$editar -> ajaxEditarPuerta();

} 

/*=============================================
=            ACTIVAR USUARIO            =
=============================================*/
if (isset($_POST["estadoPuerta"])) {

	$estadoPuerta = new ajaxPuertas();

	$estadoPuerta-> puertaNumero = $_POST["puertaNumero"];

	$estadoPuerta-> estadoPuerta = $_POST["estadoPuerta"];

	$estadoPuerta-> ajaxEstadoPuerta();

}

/*=============================================
		=    VALIDAR NO REPETIR USUARIO            =
=============================================*/
// if (isset($_POST["validarUsuario"])) {
	
// 		$valUsuario = new ajaxUsuarios();

// 		$valUsuario -> validarUsuario = $_POST["validarUsuario"];

// 		$valUsuario -> ajaxValidarUsuario();
//} 




