<?php 

	require_once "conexion.php";

	/**
	 * 
	 */
	class temperaturaModelo
	{
		
		static public function mdlMostrarTemp($tabla, $item, $valor)
		{
			if ($item != null) {

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
				$stmt -> bindparam(":".$item, $valor, PDO::PARAM_STR);
				$stmt -> execute();


	         return $stmt -> fetch();

	          $stmt -> close();
	      		$stmt = null;

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

                $stmt -> execute();

                return $stmt -> fetchAll();

                $stmt -> close();

      			$stmt = null;

			}
			
		}

		static public function mdlIngresarCuarto($tabla, $datos){

       		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, temp, hum, tvo) VALUES (:nombre, :temp, :hum, :tvo)");
       		

            $stmt -> bindparam(":nombre", $datos["nombre"], PDO::PARAM_STR);

         	$stmt -> bindparam(":temp", $datos["temp"], PDO::PARAM_STR);

         	$stmt -> bindparam(":hum", $datos["hum"], PDO::PARAM_STR);

         	$stmt -> bindparam(":tvo", $datos["tvo"], PDO::PARAM_STR);


            if($stmt -> execute()){

                return "ok";

            }else{

                return "error";

            }

            $stmt -> close();

            $stmt = null;
       	}

       	static public function mdlBorrarCuarto($tabla, $datos){
        
          $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla  WHERE id = :id");
            
          $stmt -> bindparam(":id", $datos, PDO::PARAM_STR);

          if($stmt -> execute()){

                return "ok";

          }else{

                return "error";

          }

            $stmt -> close();

            $stmt = null;
        
        }

      static public function mdlEditarTemperatura($tabla, $datos){

          $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre,  temp = :temp, hum = :hum, tvo = :tvo WHERE id = :id");

          $stmt -> bindparam(":nombre", $datos["nombre"], PDO::PARAM_STR);

          $stmt -> bindparam(":temp", $datos["temp"], PDO::PARAM_STR);

          $stmt -> bindparam(":hum", $datos["hum"], PDO::PARAM_STR);

          $stmt -> bindparam(":tvo", $datos["tvo"], PDO::PARAM_STR);

          $stmt -> bindparam(":id", $datos["id"], PDO::PARAM_STR);

          if($stmt -> execute()){

              return "ok";

          }else{

              return "error";

          }

          $stmt -> close();

          $stmt = null;

        }

	}