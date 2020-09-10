<?php

	require_once "conexion.php";

	class puertaModelo{
		static public function mdlMostrarPuerta($tabla, $item, $valor)
		{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindparam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

				$stmt -> close();
	      		$stmt = null;
		}


		/* ================================================================
         							AGREGAR PUERTA
       	================================================================= */
       	static public function mdlAgregarPuerta($tabla, $datos){

       		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, sensorBloqueo, alarma, caracteristicas) VALUES (:nombre, :sensorBloqueo, :alarma, :caracteristicas)");
       		

            $stmt -> bindparam(":nombre", $datos["nombre"], PDO::PARAM_STR);

         	$stmt -> bindparam(":sensorBloqueo", $datos["sensorBloqueo"], PDO::PARAM_STR);

         	$stmt -> bindparam(":alarma", $datos["alarma"], PDO::PARAM_STR);

         	$stmt -> bindparam(":caracteristicas", $datos["caracteristicas"], PDO::PARAM_STR);


            if($stmt -> execute()){

                return "ok";

            }else{

                return "error";

            }

            $stmt -> close();

            $stmt = null;
       	}
	}
