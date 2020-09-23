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

    /* ================================================================
     Registro datos gas
   	================================================================= */
   	static public function mdlIngresarDatosGas($tabla, $datos){

   		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(numeroMedidor, factorCorreccion, snGas) VALUES (:numeroMedidor, :factorCorreccion, :snGas)");
   		

      	$stmt -> bindparam(":numeroMedidor", $datos["numeroMedidor"], PDO::PARAM_STR);

     	$stmt -> bindparam(":factorCorreccion", $datos["factorCorreccion"], PDO::PARAM_STR);

     	$stmt -> bindparam(":snGas", $datos["snGas"], PDO::PARAM_STR);


        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
   	}

   	/* ================================================================
     Registro datos gas
   	================================================================= */
   	static public function mdlIngresarDatosAgua($tabla, $datos){

   		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(numeroMedidor, tarifaAlcantarilladoSuntuario, tarifaAlcantarilladoBasico, tarifaAlcantarilladoComplementario, tarifaAcueductoSuntuario, tarifaAcueductoBasico, tarifaAcueductoComplementario, cargoFijoLiquidacionAcueducto, cargoFijoLiquidacionAlcantarillado, snAgua) VALUES (:numeroMedidor, :tarifaAlcantarilladoSuntuario, :tarifaAlcantarilladoBasico, :tarifaAlcantarilladoComplementario, :tarifaAcueductoSuntuario, :tarifaAcueductoBasico, :tarifaAcueductoComplementario, :cargoFijoLiquidacionAcueducto, :cargoFijoLiquidacionAlcantarillado, :snAgua)");
   		

      	$stmt -> bindparam(":numeroMedidor", $datos["numeroMedidor"], PDO::PARAM_STR);

     	$stmt -> bindparam(":tarifaAlcantarilladoSuntuario", $datos["tarifaAlcantarilladoSuntuario"], PDO::PARAM_STR);

     	$stmt -> bindparam(":tarifaAlcantarilladoBasico", $datos["tarifaAlcantarilladoBasico"], PDO::PARAM_STR);

     	$stmt -> bindparam(":tarifaAlcantarilladoComplementario", $datos["tarifaAlcantarilladoComplementario"], PDO::PARAM_STR);

     	$stmt -> bindparam(":tarifaAcueductoSuntuario", $datos["tarifaAcueductoSuntuario"], PDO::PARAM_STR);

     	$stmt -> bindparam(":tarifaAcueductoBasico", $datos["tarifaAcueductoBasico"], PDO::PARAM_STR);

     	$stmt -> bindparam(":tarifaAcueductoComplementario", $datos["tarifaAcueductoComplementario"], PDO::PARAM_STR);

     	$stmt -> bindparam(":cargoFijoLiquidacionAcueducto", $datos["cargoFijoLiquidacionAcueducto"], PDO::PARAM_STR);

     	$stmt -> bindparam(":cargoFijoLiquidacionAlcantarillado", $datos["cargoFijoLiquidacionAlcantarillado"], PDO::PARAM_STR);

     	$stmt -> bindparam(":snAgua", $datos["snAgua"], PDO::PARAM_STR);


        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
   	}


   	/* ================================================================
     Registro datos Energia
   	================================================================= */
   	static public function mdlIngresarDatosEnergia($tabla, $datos){

   		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(numeroMedidor, tarifaEnergia, snEnergia) VALUES (:numeroMedidor, :tarifaEnergia, :snEnergia)");
   		

      	$stmt -> bindparam(":numeroMedidor", $datos["numeroMedidor"], PDO::PARAM_STR);

     	$stmt -> bindparam(":tarifaEnergia", $datos["tarifaEnergia"], PDO::PARAM_STR);

     	$stmt -> bindparam(":snEnergia", $datos["snEnergia"], PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();

        $stmt = null;
   	}

}