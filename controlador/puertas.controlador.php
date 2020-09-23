
<?php

	class PuertasControlador{

		/* ================================================================
        						Agregar Puerta
        ================================================================= */
		static public function ctrCrearPuerta(){
				
				if (isset($_POST["nuevoNombre"])) {
					echo '<pre>'; print_r($_POST["nuevoNombre"]); echo '</pre>';


					if (preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])
                    	) {



							/*=============================================
							=      VALIDAR TOGGLE AGREGAR BLOQUEO        agregarCaracteristicas=
							=============================================*/
							
							if($_POST["agregarBloqueo"] == "on"){

								$_POST["agregarBloqueo"]=1;

							}else{
								$_POST["agregarBloqueo"]=3;
							}

							/*=============================================
							=      VALIDAR TOGGLE AGREGAR ALARMA        =
							=============================================*/
							
							if($_POST["agregarAlarma"] == "on"){

								$_POST["agregarAlarma"]=1;

							}else{
								$_POST["agregarAlarma"]=3;
							}

							//echo '<script> console.log("'.$_POST["agregarAlarma"].'") </script>';

							if($_POST["estadoPuerta"] == "on"){

								$_POST["estadoPuerta"]=1;

							}else{
								$_POST["estadoPuerta"]=0;
							}

							/*==================================
							=            Crear Foto            =
							==================================*/
							
								$ruta = "";
	                    if (isset($_FILES["nuevaFoto"]["tmp_name"])) {
	                    	
	                        list($ancho,$alto)=getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

	                        $nuevoAncho = 500;
	                        $nuevoAlto = 500;

	                        /*=============================================
	                         Directorio de la Foto
	                         =============================================*/
	                        $directorio = "images/puertas/".$_POST["nuevoNombre"];


	                        mkdir($directorio, 0755);

	                        /*=============================================
	                        Guardar la imagen segun su Formato
	                        =============================================*/

	                        if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

	                            /*=============================================
	                            Guardar Formato JPG en Directorio
	                            =============================================*/ 

	                            $aleatorio = mt_rand(100,999);

	                            $ruta = "images/puertas/".$_POST["nuevoNombre"]."/".$aleatorio.".jpg";

	                            $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

	                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

	                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho,$alto);

	                            imagejpeg($destino,$ruta);
	                        }

	                        if ($_FILES["nuevaFoto"]["type"] == "image/png") {

	                            /*=============================================
	                            Guardar Formato PNG en Directorio
	                            =============================================*/

	                            $aleatorio = mt_rand(100,999);

	                            $ruta = "images/puertas/".$_POST["nuevoNombre"]."/".$aleatorio.".png";

	                            $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

	                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

	                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho,$alto);

	                            imagepng($destino,$ruta);
	                        }

	                    }
							
							/*=====  End of Crear Foto  ======*/
							
							

							/*=============================================
							=           GUARDAR INFORMACION       =
							=============================================*/
							$tabla = "puertas";

							$datos = array("nombre" => $_POST["nuevoNombre"],
										"sensorBloqueo" => $_POST["agregarBloqueo"],
										"alarma" => $_POST["agregarAlarma"],
										"foto" => $ruta,
										"estado" => $_POST["estadoPuerta"]);

							$respuesta = puertaModelo::mdlAgregarPuerta($tabla, $datos);

							echo '<pre>'; print_r($respuesta); echo '</pre>';

							if($respuesta == "ok"){

	                        	$color="tituloWhite";

		                        echo "<script>
		                                    Swal.fire({
												
		                                        type: 'success',
		                                        html: '<h3 class=".$color.">¡La puerta se ingreso correctamente!</h3>',
		                                        background: '#343a40',
		                                        showConfirmButton: true,
		                                        confirmButtonColor: '#28a745',
		                                        confirmButtonText: 'Ok',
		                                        closeOnConfirm: false
		                                        

		                                        }).then((result)=>{

		                                        if(result.value){

		                                           window.location = 'puertas';
		                                        }      
		                                    });

		                              </script>";

		                    }

	                    }else{
	                    	$color="tituloWhite";

	                        echo "<script>

		                            Swal.fire({

		                                type: 'error',
		                                html: '<h3 class=".$color.">¡El nombre es invalido!</h3>',
		                                background: '#343a40',
		                                showConfirmButton: true,
		                                confirmButtonColor: '#dc3545',
		                                confirmButtonText: 'Ok',
		                                closeOnConfirm: false 

		                                }).then((result)=>{

		                                if(result.value){

		                                    window.location = 'puertas';

		                                }  

		                            });

		                        </script>";
	                    }

				}

		}

		/* ================================================================
        						Editar Puerta
        ================================================================= */
		static public function ctrEditarPuerta(){

				if (isset($_POST["editarNombre"])) {

					if (preg_match('/^[a-zA-Z0-9ñÑáéióúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {


							/*=============================================
							=      VALIDAR TOGGLE AGREGAR BLOQUEO        agregarCaracteristicas=
							=============================================*/
							
							if($_POST["agregarBloqueo"] == "on"){

								$_POST["agregarBloqueo"]=1;

							}else{
								$_POST["agregarBloqueo"]=3;
							}

							/*=============================================
							=      VALIDAR TOGGLE AGREGAR ALARMA        =
							=============================================*/
							
							if($_POST["agregarAlarma"] == "on"){

								$_POST["agregarAlarma"]=1;

							}else{
								$_POST["agregarAlarma"]=3;
							}

							//echo '<script> console.log("'.$_POST["agregarAlarma"].'") </script>';

							if($_POST["estadoPuerta"] == "on"){

								$_POST["estadoPuerta"]=1;

							}else{
								$_POST["estadoPuerta"]=0;
							}
							
							/*===================================
							=            Editar foto            =
							===================================*/
							$ruta = $_POST["fotoActual"];

							if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {

	                        list($ancho,$alto)=getimagesize($_FILES["editarFoto"]["tmp_name"]);

	                        $nuevoAncho = 500;
	                        $nuevoAlto = 500;

	                        /*=============================================
	                         Directorio de la Foto
	                         =============================================*/
	                        $directorio = "images/puertas/".$_POST["editarNombre"];


	                        if (!empty($_POST["fotoActual"])) {
	                        	
	                        	unlink($_POST["fotoActual"]);

	                        }else{

	                        	mkdir($directorio, 0755);

	                        }

	                        /*=============================================
	                        Guardar la imagen segun su Formato
	                        =============================================*/

	                        if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

	                            /*=============================================
	                            Guardar Formato JPG en Directorio
	                            =============================================*/ 

	                            $aleatorio = mt_rand(100,999);

	                            $ruta = "images/puertas/".$_POST["editarNombre"]."/".$aleatorio.".jpg";

	                            $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

	                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

	                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho,$alto);

	                            imagejpeg($destino,$ruta);
	                        }

	                        if ($_FILES["editarFoto"]["type"] == "image/png") {

	                            /*=============================================
	                            Guardar Formato PNG en Directorio
	                            =============================================*/

	                            $aleatorio = mt_rand(100,999);

	                            $ruta = "images/puertas/".$_POST["editarNombre"]."/".$aleatorio.".png";

	                            $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

	                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

	                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho,$alto);

	                            imagepng($destino,$ruta);
	                        }
	                    }
							
							
							/*=====  End of Editar foto  ======*/
							

							/*=============================================
							=           GUARDAR INFORMACION       =
							=============================================*/
							$tabla = "puertas";


							$datos = array("nombre" => $_POST["editarNombre"],
										"sensorBloqueo" => $_POST["agregarBloqueo"],
										"alarma" => $_POST["agregarAlarma"],
										"foto" => $ruta,
										"estado" => $_POST["estadoPuerta"],
										"numero" => $_POST["idPuertaEditar"]);
										


							$respuesta = puertaModelo::mdlEditarPuerta($tabla, $datos);


							if($respuesta == "ok"){

	                        	$color="tituloWhite";

		                        echo "<script>
		                                    Swal.fire({
												
		                                        type: 'success',
		                                        html: '<h3 class=".$color.">¡La puerta se ingreso correctamente!</h3>',
		                                        background: '#343a40',
		                                        showConfirmButton: true,
		                                        confirmButtonColor: '#28a745',
		                                        confirmButtonText: 'Ok',
		                                        closeOnConfirm: false
		                                        

		                                        }).then((result)=>{

		                                        if(result.value){

		                                           window.location = 'puertas';
		                                        }      
		                                    });

		                              </script>";

		                    }

	                    }else{
	                    	$color="tituloWhite";

	                        echo "<script>

		                            Swal.fire({

		                                type: 'error',
		                                html: '<h3 class=".$color.">¡El nombre es invalido!</h3>',
		                                background: '#343a40',
		                                showConfirmButton: true,
		                                confirmButtonColor: '#dc3545',
		                                confirmButtonText: 'Ok',
		                                closeOnConfirm: false 

		                                }).then((result)=>{

		                                if(result.value){

		                                    window.location = 'puertas';

		                                }  

		                            });

		                        </script>";
	                    }

				}

		}

		/* ================================================================
        		MOSTRAR PUERTAS
        ================================================================= */
		static public function ctrMostrarPuerta($item,$valor){

			$tabla = "puertas";

			$respuesta = puertaModelo::mdlMostrarPuerta($tabla, $item, $valor);

			return $respuesta;
		
		}
		/*======================================
		=            Contar Puertas            =
		======================================*/
		
		static public function ctrContarPuerta($item,$valor){

			$tabla = "puertas";

			$respuesta = puertaModelo::mdlContarPuerta($tabla, $valor);

			return $respuesta;
			echo '<script>console.log($respuesta);</script>';
		
		}
		
		/*=====  End of Contar Puertas  ======*/

				/*=============================================
		= BORRAR O ELIMINAR Puerta    =
		=============================================*/

		static public function ctrBorrarPuerta(){

			if (isset($_GET["idPuerta"])) {
				
				$tabla = "puertas";

				$datos = $_GET["idPuerta"];

				if ($_GET["fotoPuerta"] != null) {

					unlink($_GET["fotoPuerta"]);

					rmdir('images/puertas/'.$_GET["nombre"]);

					$respuesta = puertaModelo::mdlBorrarPuerta($tabla, $datos);
					if ($respuesta == "ok") {

						echo '<script>
					            Swal.fire({

					                type: "success",
					                title: "¡La puerta se a borrado correctamente!",
					                background: "#343a40",
					                showConfirmButton: true,
					                confirmButtonColor: "#28a745",
					                confirmButtonText: "Ok",
					                closeOnConfirm: false,
					                customClass: {

										title: "title-alert"
									},

					                }).then((result)=>{

					                    if(result.value){

					                        window.location = "puertas";
					                    }      
					                });

					            </script>';

						
					}

					
				}
				else{

					$respuesta = puertaModelo::mdlBorrarPuerta($tabla, $datos);
					if ($respuesta == "ok") {

						echo '<script>
					            Swal.fire({

					                type: "success",
					                title: "¡La puerta se a borrado correctamente!",
					                background: "#343a40",
					                showConfirmButton: true,
					                confirmButtonColor: "#28a745",
					                confirmButtonText: "Ok",
					                closeOnConfirm: false,
					                customClass: {

										title: "title-alert"
									},

					                }).then((result)=>{

					                    if(result.value){

					                        window.location = "puertas";
					                    }      
					                });

					            </script>';

						
					}

				}

			}

		}
		

	}

