<?php 

/**
 * 
 */
class ServiciosControlador 
{
	
	/* ================================================================
        		en este metodo puede consultar cualquier tabla de la BD
        ================================================================= */
		static public function ctrMostrarTabla($tabla,$itemEnergia,$datoEnergia){

			$respuesta = modeloServicios::mdlMostrarServicio($tabla,$itemEnergia,$datoEnergia);

			return $respuesta;
		
		}

		static public function ctrIngrearDatosGas(){
				
			if (isset($_POST["nuevoNumeroMedidor"])){
				$tabla = "datos_gas";
				$_POST["snGas"] = 's';

            	$datos = array("numeroMedidor" => $_POST["nuevoNumeroMedidor"],
            					"factorCorreccion" => $_POST["nuevoFactorCorreccion"],
            					"snGas" => $_POST["snGas"]);

            	$respuesta = modeloServicios::mdlIngresarDatosGas($tabla, $datos);

            	if($respuesta == "ok"){

	                        	$color="tituloWhite";

		                        echo "<script>
		                                    Swal.fire({
												
		                                        type: 'success',
		                                        html: '<h3 class=".$color.">¡El usuario se ingreso correctamente!</h3>',
		                                        background: '#343a40',
		                                        showConfirmButton: true,
		                                        confirmButtonColor: '#28a745',
		                                        confirmButtonText: 'Ok',
		                                        closeOnConfirm: false
		                                        

		                                        }).then((result)=>{

		                                        if(result.value){

		                                           window.location = 'serviciosPublicos';
		                                        }      
		                                    });

		                              </script>";

		            }else{

		            	$color="tituloWhite";

	                        echo "<script>

		                            Swal.fire({

		                                type: 'error',
		                                html: '<h3 class=".$color.">¡El usuario no se pudo ingresar correctamente!</h3>',
		                                background: '#343a40',
		                                showConfirmButton: true,
		                                confirmButtonColor: '#dc3545',
		                                confirmButtonText: 'Ok',
		                                closeOnConfirm: false 

		                                }).then((result)=>{

		                                if(result.value){

		                                    window.location = 'serviciosPublicos';

		                                }  

		                            });

		                        </script>";
		                }
			}
		}

		static public function ctrIngrearDatosAgua(){
				
			if (isset($_POST["nuevoNumeroMedidor"])){
				$tabla = "datos_agua";
				$_POST["snAgua"] = 's';

            	$datos = array("numeroMedidor" => $_POST["nuevoNumeroMedidor"],
		            		   "tarifaAlcantarilladoSuntuario" => $_POST["nuevoTarifaAlcantarilladoSuntuario"],
		            		   "tarifaAlcantarilladoBasico" => $_POST["nuevoTarifaAlcantarilladoBasico"],
            		           "tarifaAlcantarilladoComplementario" => $_POST["nuevoTarifaAlcantarilladoComplementario"],
            				   "tarifaAcueductoSuntuario" => $_POST["nuevoTarifaAcueductoSuntuario"],
            				   "tarifaAcueductoBasico" => $_POST["nuevoTarifaAcueductoBasico"],
            				   "tarifaAcueductoComplementario" => $_POST["nuevoTarifaAcueductoComplementario"],
            				   "cargoFijoLiquidacionAcueducto" => $_POST["nuevoCargoFijoLiquidacionAcueducto"],
            				   "cargoFijoLiquidacionAlcantarillado" => $_POST["nuevoCargoFijoLiquidacionAlcantarillado"],
            				   "snAgua" => $_POST["snAgua"]);

            	$respuesta = modeloServicios::mdlIngresarDatosAgua($tabla, $datos);

            	if($respuesta == "ok"){

	                        	$color="tituloWhite";

		                        echo "<script>
		                                    Swal.fire({
												
		                                        type: 'success',
		                                        html: '<h3 class=".$color.">¡El usuario se ingreso correctamente!</h3>',
		                                        background: '#343a40',
		                                        showConfirmButton: true,
		                                        confirmButtonColor: '#28a745',
		                                        confirmButtonText: 'Ok',
		                                        closeOnConfirm: false
		                                        

		                                        }).then((result)=>{

		                                        if(result.value){

		                                           window.location = 'serviciosPublicos';
		                                        }      
		                                    });

		                              </script>";

		            }else{

		            	$color="tituloWhite";

	                        echo "<script>

		                            Swal.fire({

		                                type: 'error',
		                                html: '<h3 class=".$color.">¡El usuario no se pudo ingresar correctamente!</h3>',
		                                background: '#343a40',
		                                showConfirmButton: true,
		                                confirmButtonColor: '#dc3545',
		                                confirmButtonText: 'Ok',
		                                closeOnConfirm: false 

		                                }).then((result)=>{

		                                if(result.value){

		                                    window.location = 'serviciosPublicos';

		                                }  

		                            });

		                        </script>";
		                }
			}
		}

		static public function ctrIngrearDatosEnergia(){
				
			if (isset($_POST["nuevoNumeroMedidor"])){
				$tabla = "datos_energia";
				$_POST["snEnergia"] = 's';

            	$datos = array("numeroMedidor" => $_POST["nuevoNumeroMedidor"],
		            		   "tarifaEnergia" => $_POST["nuevoTarifaEnergia"],
            				   "snEnergia" => $_POST["snEnergia"]);

            	$respuesta = modeloServicios::mdlIngresarDatosEnergia($tabla, $datos);

            	if($respuesta == "ok"){

	                        	$color="tituloWhite";

		                        echo "<script>
		                                    Swal.fire({
												
		                                        type: 'success',
		                                        html: '<h3 class=".$color.">¡El usuario se ingreso correctamente!</h3>',
		                                        background: '#343a40',
		                                        showConfirmButton: true,
		                                        confirmButtonColor: '#28a745',
		                                        confirmButtonText: 'Ok',
		                                        closeOnConfirm: false
		                                        

		                                        }).then((result)=>{

		                                        if(result.value){

		                                           window.location = 'serviciosPublicos';
		                                        }      
		                                    });

		                              </script>";

		            }else{

		            	$color="tituloWhite";

	                        echo "<script>

		                            Swal.fire({

		                                type: 'error',
		                                html: '<h3 class=".$color.">¡El usuario no se pudo ingresar correctamente!</h3>',
		                                background: '#343a40',
		                                showConfirmButton: true,
		                                confirmButtonColor: '#dc3545',
		                                confirmButtonText: 'Ok',
		                                closeOnConfirm: false 

		                                }).then((result)=>{

		                                if(result.value){

		                                    window.location = 'serviciosPublicos';

		                                }  

		                            });

		                        </script>";
		                }

			}
		}
		
}