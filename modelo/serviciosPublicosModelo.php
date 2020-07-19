<?php 

/**
 * 
 */
class modeloServicios
{
	
	static public function mdlMostrarServicio($tabla,$itemEnergia,$datoEnergia)
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $itemEnergia = :itemEnergia");
			$stmt -> bindparam(":".$item, $datoEnergia, PDO::PARAM_STR);
			$stmt -> execute();

	        return $stmt -> fetch();
	        $stmt -> close();
	  		$stmt = null;
	  	}
}