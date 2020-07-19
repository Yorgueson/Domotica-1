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
}