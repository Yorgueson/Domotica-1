<?php 

require_once"./../../../controlador/serviciosPublicosControlador.php";
require_once"./../../../modelo/serviciosPublicosModelo.php";
/**
 * 
 */
class imprimirFactura
{

public $codigo;

public function traerImpresionFactura(){
	//traemos la informacion de la venta 

	// $itemEnergia="codigo";
	// $datoEnergia=$this->codigo;
	// $tabla = "productos";

	// $respuesta = ServiciosControlador::ctrMostrarTabla($tabla,$itemEnergia,$datoEnergia);

	// $fecha= substr($respuesta["fecha"],0,-8);
	// $descripcion=$respuesta["descripcion"];
	// $precio_venta = $respuesta["precio_venta"];


	//===============TRAEMOS LA INFO DEL CLIENTE==============


	//===============TRAEMOS LA INFO DEL PRODUCTO=============


// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf ->startPageGroup();

$pdf->AddPage();//para agregar una nueva pagina

$bloque1 = <<<EOF
	
	<table>

		<tr>
			
			<td style="width:80px"><img src="./images/casa.png"></td>

			<td style="background-color:white; width:140px">

				<div style="font-size:8,5px; text-align:right; line-height:15px;">

					<br>
					NIT:819291

					<br>
					direccion: calle 43 #43-12
					
				</div>


			</td>

			<td style="background-color:white; width:140px">
				
				<div style="font-size:8,5px; text-align:right; line-height:15px;">
					
					<br>
					Telefono: 3128919345

					<br>
					domotica@gmail.com


				</div>

			</td>

			<td style="background-color:white; width:160px; text-align:center; color:red;"><br><br>REPORTE No <br> 1200
			</td>


		</tr>

	</table>
	

EOF;

$pdf ->writeHTML($bloque1, false, false, false, false, '');


//=============== BLOQUE 2==============

$bloque2 = <<<EOF

		
	<br>

		<h3 style="text-align:center;">Datos de la Energia</h3>

	<br><br>
	<table style=" font-size:10px; padding:5px 10px;">

		<tr>

			<td style="border:1px solid #666; background-color:white; width:390px;">
				cliente:Juan pablo garcia
			</td>

			<td style="border:1px solid #666; background-color:white; width:150px; text-align:right;">
				fecha: 20/02/2020
			</td>

		</tr>

		<tr>
			<td style="border:1px solid #666; background-color:white; width:540px;">
				vendedor: ramiro sanez
			</td>
		</tr>
	</table>


EOF;

$pdf ->writeHTML($bloque2, false, false, false, false, '');

//=============== BLOQUE 3==============

$bloque3 = <<<EOF

	<br><br>
	<table>

		<tr>

			<td style="border:1px solid #666; background-color:white; width:150px; text-align:center;">No del Medidor</td>
			<td style="border:1px solid #666; background-color:white; width:110px; text-align:center;">lectura Actual</td>
			<td style="border:1px solid #666; background-color:white; width:130px; text-align:center;">Lectura Anterior</td>
			<td style="border:1px solid #666; background-color:white; width:150px; text-align:center;">Consumo del mes</td>

		</tr>

	</table>
EOF;

$pdf ->writeHTML($bloque3, false, false, false, false, '');
//=================================================

//=============== BLOQUE 4==============

$bloque4= <<<EOF
	
	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="border:1px solid #666; background-color:white; color:#333; width:150px; text-align:center;">1230</td>

			<td style="border:1px solid #666; background-color:white; color:#333; width:110px; text-align:center;">400230</td>

			<td style="border:1px solid #666; background-color:white; color:#333; width:130px; text-align:center;">23123</td>

			<td style="border:1px solid #666; background-color:white; color:#333; width:150px; text-align:center;">4</td>
			
		</tr>

	</table>

EOF;

$pdf ->writeHTML($bloque4, false, false, false, false, '');

//=============== BLOQUE 5==============

$bloque5= <<<EOF


	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="background-color:white; width:260px; text-align:center; color:#333;"></td>

			<td style="border-bottom:1px solid #666; color:#333; background-color:white; width:130px; text-align:center"></td>

			<td style="border-bottom:1px solid #666; color:#333; background-color:white; width:150px; text-align:center"></td>

		</tr>

		<tr>

			<td style="border-right:1px solid #666; color:#333; background-color:white; width:260px; text-align:center"></td>

			<td style="border:1px solid #666;  background-color:white; width:130px; text-align:center">
				
				consumo semanal

			</td>

			<td style="border:1px solid #666;  background-color:white; width:150px; text-align:center">
					
				3

			</td>

		</tr>

		<tr>

			<td style="border-right:1px solid #666; color:#333; background-color:white; width:260px; text-align:center"></td>

			<td style="border:1px solid #666;  background-color:white; width:130px; text-align:center">
				
				Consumo del dia

			</td>

			<td style="border:1px solid #666;  background-color:white; width:150px; text-align:center">
					
				0.50

			</td>

		</tr>

	</table>
	
EOF;

$pdf ->writeHTML($bloque5, false, false, false, false, '');
//========================================================
//salida del archivo

$pdf->Output('factura.pdf');


}


}

$factura = new imprimirFactura();

$factura-> codigo=$_GET['codigo'];
$factura->traerImpresionFactura();