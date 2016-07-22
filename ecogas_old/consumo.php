<?php //

define('NO_APLICA', "N/A");
define('NO_AHORRO', "No ahorro");

//Calculando Var Global Anerior
define('AHORRO_0_05', 	'5');
define('AHORRO_0_2', 	'20');

//Calculando Var Global Actual
define('AHORRO_0_15', 	'15');

//Indices para la funcion "readTCombinaciones($txt_file, $clave, $index)"
define('CUADRO',        			"cuadro");
define('CATEGORIA',  				"categoria");
define('CARGO_FIJO',      			"cargo_f");
define('FOCEGAS',       			"focegas");
define('CARGO_M3',       			"cargo_m3");
define('FACT_MINIMA',       		"fact_min");
define('CARGOM3_ENTR_1000_9000',    "cargo_m3Ent1000_9000");
define('CARGOM3_MAY_9000',       	"Cargo_m3May9000");
define('ZONA_TARIFARIA',       		"zona_tarif");

define('FECHA_LIMITE',       		"2016-04-01");
define('FECHA_LIMITE_PRIM_FACT',    "2016-03-31");

//Constantes Zonas Tarifarias
define('1_Catamarca',				'0' );
define('2_Chamical',				'4' );
define('3_Chepes_Aimogasta_VU',		'11');
define('4_Chilecito',				'12');
define('5_Córdoba',					'0' );
define('6_La Rioja',				'0' );
define('7_Mendoza',					'1' );
define('8_San Juan',				'2' );
define('9_San Luis',				'3' );
define('10_Malargüe',				'5' );

define('P'	,"Anexo I");
define('Q'	,"Anexo II");
define('S'	,"Anexo III");


function Make_StrCategoria($zonaTarifa, $anterior, $categ) {
	$cadena;
	
	$cadena = $zonaTarifa . "-" .$anterior . "-" .$categ ;
	return $cadena;
}

function Make_StrCombinacion1($zonaTarifa, $anterior, $categ) {
	$cadena;
	
	$cadena = $zonaTarifa . "-" .$anterior . "-" .$categ ;
	return $cadena;
}

function Make_StrCombinacion2($zonaTarifa, $actual, $categ) {
	$cadena;
	
	$cadena = $zonaTarifa . "-" .$actual . "-" .$categ ;
	return $cadena;
}


function readTCombinaciones($txt_file, $clave, $index) {
	//
	$rows        = explode("\n", $txt_file);
	//
	
	foreach($rows as $row => $data)
	{
		//get row data
		//$row_data = explode("\t", $data);
		$row_data = explode("|", $data);
		$info[$row]['entry'] = trim($row_data[0]);
			if($info[$row]['entry'] == $clave) {
			
				$info[$row]['cuadro']         			= trim($row_data[1]);
				$info[$row]['categoria']  				= trim($row_data[2]);
				$info[$row]['cargo_f']       			= trim($row_data[3]);
				$info[$row]['focegas']       			= trim($row_data[4]);
				$info[$row]['cargo_m3']       			= trim($row_data[5]);
				$info[$row]['fact_min']       			= trim($row_data[6]);
				$info[$row]['cargo_m3Ent1000_9000']    	= trim($row_data[7]);
				$info[$row]['Cargo_m3May9000']       	= trim($row_data[8]);
				$info[$row]['zona_tarif']       		= trim($row_data[9]);
				
				return $info[$row][$index];
			}
				
		//
		//
	}
}

function Ahorro($m3_pactual, $m3_panteri) {
	$gPAhorro;//=NO_APLICA;

	if( empty( $m3_panteri )) {
		return NO_APLICA;
	}
	
	$percent = (1 - $m3_pactual/$m3_panteri);
	
	if( $percent < 0 )
		$gPAhorro=NO_AHORRO;
	else
	//if($percent >= 0)
		$gPAhorro= $percent*100;
		
	return $gPAhorro;
}

function Get_Anterior($tarf_social, $ahorro, $categoria_cl) {
	
	if($tarf_social == 1)
		return "A";
	
	if( (strcmp($ahorro , NO_APLICA ) == 0) || (strcmp($ahorro , NO_AHORRO ) == 0))
		return "C";
	if( $ahorro < AHORRO_0_05)
		return "C";
	else if( $ahorro < AHORRO_0_2 )
		return "B";
	else
		return "A";
}	

function Get_Actual($tarf_social, $ahorro, $categoria_cl) {
	
	if($tarf_social == 1)
		return "S";
	
	if ( $categoria_cl == 'P1' || $categoria_cl == 'P2' || $categoria_cl == 'P3-1' || $categoria_cl == 'P3-2' )
		return "P";
	
	
	if( (strcmp($ahorro , NO_APLICA ) == 0) || (strcmp($ahorro , NO_AHORRO ) == 0))
		return "P";
	if( $ahorro < AHORRO_0_15 )
		return "P";
	else 
		return "Q";
}


/*------------------------------------------------------------------------
	dateDifference(). Solo Para fechas en string con formato YYYY-MM-DD
---------------------------------------------------------------------------
Parametros:
	$date_1 y $date_2:
		String con formato fecha Y-M_D
	
	$differenceFormat:
		Unidades de retorno, estas pueden ser:
		'%y Year %m Month %d Day %h Hours %i Minute %s Seconds'        =>  1 Year 3 Month 14 Day 11 Hours 49 Minute 36 Seconds
		'%y Year %m Month %d Day'                                    =>  1 Year 3 Month 14 Days
		'%m Month %d Day'                                            =>  3 Month 14 Day
		'%d Day %h Hours'                                            =>  14 Day 11 Hours
		'%d Day'                                                        =>  14 Days
		'%h Hours %i Minute %s Seconds'                                =>  11 Hours 49 Minute 36 Seconds
		'%i Minute %s Seconds'                                        =>  49 Minute 36 Seconds
		'%h Hours                                                    =>  11 Hours
		'%a Days                                                        =>  468 Days
*/


/* Calculos intermedios:
	makeCI_Actual():
	makeCI_Anterior():= 59.74029
	makeCI_ActualTarifNuevaPDias():
	makeCI_ActualTarifaViejaPDias();
*/
function makeCI_ActualTarifaNuevaPPesos($ci_atnpd, $ci_ac){
	return number_format(($ci_atnpd * $ci_ac), 2, '.', '');//($ci_atnpd * $ci_ac);
	
	
}

function makeCI_ActualTarifaViejaPPesos($ci_atvpd, $ci_an) {
	return number_format(($ci_atvpd * $ci_an), 2, '.', '');
}


//Funcion para re hacer
function makeCI_ActualTarifaViejaPDias($date_1 , $date_2 , $differenceFormat = '%a' ) {
	
	$ret = makeCI_ActualTarifNuevaPDias($date_1 , $date_2);
	return (1-$ret);
	
}
// Primer param: fech_marcaba, segundo: fech_marca
function makeCI_ActualTarifNuevaPDias($date_1 , $date_2 , $differenceFormat = '%a' )
{
	$factor=1;
	//01/04/2016 Fecha limite
	//$fech_limit = date_create("2016-04-01");
	$fech_limit = date_create(FECHA_LIMITE);
	
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
    
	//calculos  Si fecha marcaba es menor que limite...
	$interval = date_diff($fech_limit, $datetime1);	//limite contr fech_marcaba
	$tmp = $interval->format('%R%a');
		
	//Rehacer lo siguiente
	$pos = strpos($tmp, '+');
	//intervalo negativo!! En este caso entra aqui para fechas menores a la limite
	if($pos === false) {
		$interval2 = date_diff($datetime2, $fech_limit);
		$tmp3=$interval2->format($differenceFormat)+1;
		
		$interval3 = date_diff($datetime2, $datetime1);
		$tmp4=$interval3->format($differenceFormat);
		
		$factor=$tmp3/$tmp4;
		//$factor = number_format($factor, 2, '.', '');
	}
	
	return $factor;
}

function makeCI_Actual($txt_file, $zonaTarifa, $actual, $categ, $tarf_social, $m3) {
	$tmp1;$tmp2;$tmp3;
	
	$index=Make_StrCombinacion2($zonaTarifa, $actual, $categ);
	$parcial1 	= readTCombinaciones($txt_file, $index, CARGO_FIJO);
	$parcial2 	= readTCombinaciones($txt_file, $index, FOCEGAS);
	$tmp1 = readTCombinaciones($txt_file, $index, CARGO_M3);
	$tmp2 = readTCombinaciones($txt_file, $index, CARGOM3_ENTR_1000_9000);
	$tmp3 = readTCombinaciones($txt_file, $index, CARGOM3_MAY_9000);
	
	
	$parcial=$parcial1+$parcial2;
	
	
	if($m3 < 1000 ) {
		$parcial += ($tmp1*$m3);
		
	}
		
	else if($m3 < 9000)
		$parcial += (($tmp1*1000) + $tmp2 * ($m3 - 1000)); 
	else {
		$parcial += (($tmp1*1000) +  ($tmp2 * 8000) + ($tmp3 * ($m3 - 9000)));
	}
	$parcial = number_format($parcial, 2, '.', '');
	return $parcial;	
}

/* Calculos intermedios makeCI_Anterior()= 59.74029
*	Facturas completas antes de impuestos - retorna valor anterior en pesos de acuerdo a los m3
	Parametros:
		$m3: metros ingresados como actuales
*/
function makeCI_Anterior($txt_file, $zonaTarifa, $anterior, $categ, $tarf_social, $m3) {
	
	$tmp1;$tmp2;$tmp3;
	$index=Make_StrCombinacion1($zonaTarifa, $anterior, $categ);
	$parcial 	= readTCombinaciones($txt_file, $index, CARGO_FIJO); //CARGO_FIJO CARGO_M3
	
	if($tarf_social == 1) {
		$parcial+=0;			
	}else {
		
		$tmp1 		= readTCombinaciones($txt_file, $index, FOCEGAS);
		
		//
		$parcial+=$tmp1;
		
	}
	
	$tmp1 		= readTCombinaciones($txt_file, $index, CARGO_M3);
	$tmp2 		= readTCombinaciones($txt_file, $index, CARGOM3_ENTR_1000_9000);//CARGOM3_MAY_9000
	$tmp3 		= readTCombinaciones($txt_file, $index, CARGOM3_MAY_9000);		//
	
	if($m3 < 1000 ) {
		
		$parcial += ($m3*$tmp1);
		
	}else if($tmp2 < 9000 ) {
		
		
		$parcial += ($tmp1*1000) + $tmp2 * ($m3-1000) ;
		
	}else{
		$parcial += ($tmp1*1000)+ ($tmp2*8000) + $tmp3;		
	}		
	$parcial = number_format($parcial, 2, '.', '');
	return $parcial;	
}

//--------------------------------------- Facturacion Minima ---------------------------------------
function FM_Anterior_P($txt_file, $prim_fact, $makeCI_Anterior, $tarif_social, $zonaTarifa, $anterior, $categ) {
	
	$index=Make_StrCombinacion1($zonaTarifa, $anterior, $categ);
	$focegas 		= readTCombinaciones($txt_file, $index, FOCEGAS);
	$fact_minima 	= readTCombinaciones($txt_file, $index, FACT_MINIMA);
	
	$parcial2;
	if( $tarif_social == 1 )
		$parcial2 = 0;
	else
		$parcial2 = $focegas;
	
	$parcial2 += $fact_minima;
		
	if($prim_fact == 1)
		return $makeCI_Anterior;
	else if($makeCI_Anterior > $parcial2)
		return $makeCI_Anterior;
	else
		return $parcial2;

}

function FM_Actual_P($txt_file, $prim_fact, $fac_prorrateada, $pdias1, $pdias2, $zonaTarifa, $anterior, $categ) {
	$tmp = 0;
	$ret;
	$index			=	Make_StrCombinacion2($zonaTarifa, $anterior, $categ);
	$focegas 		= 	readTCombinaciones($txt_file, $index, FOCEGAS);
	$fact_minima 	= 	readTCombinaciones($txt_file, $index, FACT_MINIMA);
	
	if($prim_fact == 1) {
		$ret = $fac_prorrateada; //
	} else {
		$tmp = ($fact_minima *  $pdias1) + ($fact_minima * $pdias2) + $focegas;
		if( $tmp > $fac_prorrateada) {
			$ret = $tmp;
		} else {
			$ret = $fac_prorrateada;
		}
	}
	$ret = number_format($ret, 2, '.', '');
	return $ret;
}

function FM_Bonificacion1_P($categoria_cl, $FM_Anterior_P, $FM_Actual_P) {
	
	//Categoría ("P1" o "P2"o "P3-1" o "P3-2)
	if( (strcmp($categoria_cl , "P1" ) == 0) || (strcmp($categoria_cl , "P2" ) == 0) || (strcmp($categoria_cl , "P3-1" ) == 0) || (strcmp($categoria_cl , "P3-2" ) == 0)) {
		
		$tmp = $FM_Anterior_P*6;
		if( $tmp < $FM_Actual_P ) {
			$ret = ( $FM_Actual_P-$FM_Anterior_P * 6);
			
		}else
			$ret = 0;
	}else {
		
		$tmp = $FM_Anterior_P*5;
		if( $tmp < $FM_Actual_P ) {
			$ret = ( $FM_Actual_P - $FM_Anterior_P * 5);
		}else				// Agregado for Us
			$ret = 0;		// Agregado for Us
	}
	$ret = number_format($ret, 2, '.', '');
	return $ret;
}
/*
function FM_Bonificacion1_P($txt_file, $prim_fact, $fac_prorrateada, $pactdias1, $pviedias1, $zonaTarifa, $anterior, $categ, $tarif_social) {
	$ret;
	$tmp;
	$factor;
	
	$index1			=	Make_StrCombinacion1($zonaTarifa, $anterior, $categ);
	$index2			=	Make_StrCombinacion2($zonaTarifa, $anterior, $categ);
	
	$focegas1 		= 	readTCombinaciones($txt_file, $index1, FOCEGAS);
	$focegas2 		= 	readTCombinaciones($txt_file, $index2, FOCEGAS);
	
	$fact_minima1 	= 	readTCombinaciones($txt_file, $index1, FACT_MINIMA);
	$fact_minima2 	= 	readTCombinaciones($txt_file, $index2, FACT_MINIMA);
	
	if($prim_fact == 1 )
		$ret = $fac_prorrateada;
	else {
		if( $tarif_social == 1 )
			$factor = 0;
		else
			$factor = $focegas1 + $fact_minima1;
		$tmp1 = (($focegas2 + $fact_minima2) * ($pactdias1)) + ($pviedias1 * $factor); 
		// Mejorar
		if( $tmp1> $fac_prorrateada )
			$ret = $tmp1;
		else
			$ret = $fac_prorrateada;
	
	}
	return $ret;
}
*/
// End --------------------------------------- Facturacion Minima ---------------------------------------

// ---------------------------------------Primera factura -----------------------------------------------
function PF_pDias_CfAntyAct($date_1 , $date_2 , $differenceFormat = '%a') {
	$datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
    
	//calculos
	$interval = date_diff($datetime1, $datetime2);
	$ret= $interval->format($differenceFormat) + 1;
	
	$ret = $ret/60;
	//$ret = number_format($ret, 2, '.', '');
	return $ret; 	
}

function PF_pDias_CfAnt_P($txt_file, $tarif_soc, $mci_anter, $pf_pd_cfantyact, $zonaTarifa, $anterior, $categ) {
	
	$index			=	Make_StrCombinacion1($zonaTarifa, $anterior, $categ);
		
	$focegas 		= 	readTCombinaciones($txt_file, $index, FOCEGAS);
	$cargf 			= 	readTCombinaciones($txt_file, $index, CARGO_FIJO);
	
	if( $tarif_soc == 1)
		$tmp=0;
	else
		$tmp=$focegas;
	
	$tmp1 = $cargf + $tmp; //($tarif_soc?0:$focegas) ;
	
	$tmp2 = $tmp1 * (1 - $pf_pd_cfantyact);
	
	//$tmp2 = number_format($tmp2, 2, '.', '');
	
	//return number_format(($mci_anter - $tmp2), 2, '.', '');//($mci_anter - $tmp2);	
	return ($mci_anter - $tmp2);
}

function PF_pDias_CfAct_P($txt_file, $tarif_soc, $mci_actual, $pf_pd_cfantyact, $zonaTarifa, $actual, $categ) {
	
	$index			=	Make_StrCombinacion2($zonaTarifa, $actual, $categ);
		
	$focegas 		= 	readTCombinaciones($txt_file, $index, FOCEGAS);
	$cargf 			= 	readTCombinaciones($txt_file, $index, CARGO_FIJO);
		
	$tmp2 = ($cargf + $focegas) * (1 - $pf_pd_cfantyact);
	$tmp2 = number_format($tmp2, 2, '.', '');	
	//return number_format(($mci_actual - $tmp2), 2, '.', '');//($mci_actual - $tmp2);
	return ($mci_actual - $tmp2);
}

//function PF_pDias_Act($fech_marcaba, $fech_marca){
function PF_pDias_Act($date_1 , $date_2 , $differenceFormat = '%a' )
{
	$factor=1;
	//01/04/2016 Fecha limite
	//$fech_limit = date_create("2016-04-01");
	$fech_limit = date_create(FECHA_LIMITE_PRIM_FACT);
	
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);
    
	//calculos
	$interval = date_diff($fech_limit, $datetime1);
	$tmp = $interval->format('%R%a');
		
	//Rehacer lo siguiente
	$pos = strpos($tmp, '+');
	//intervalo negativo!!
	if($pos === false) {
		$interval2 = date_diff($datetime2, $fech_limit);
		$tmp3=$interval2->format($differenceFormat);
		
		$interval3 = date_diff($datetime2, $datetime1);
		$tmp4=$interval3->format($differenceFormat);
		
		$factor=$tmp3/$tmp4;
		//$factor = number_format($factor, 2, '.', '');
	}
	
	return $factor;
}

function PF_pDias_Ant( $pf_pdias_act ) {
	return  number_format((1-$pf_pdias_act), 2, '.', '');
	//return (1-$pf_pdias_act);
	
}
function PF_pDias_Ant_P( $PF_pDias_Act, $PF_pDias_Ant) {
	return number_format(($PF_pDias_Act * $PF_pDias_Ant), 2, '.', '');
	//return ($PF_pDias_Act * $PF_pDias_Ant);
}

function PF_pDias_Act_P($PF_pDias_Act, $PF_pDias_CfAct_P) {
	
	return number_format(($PF_pDias_Act * $PF_pDias_CfAct_P), 2, '.', '');
	//return ($PF_pDias_Act * $PF_pDias_CfAct_P);
}

function PF_Total($PF_pDias_Ant_P, $PF_pDias_Act_P) {
	
	return number_format(($PF_pDias_Ant_P + $PF_pDias_Act_P), 2, '.', '');
	//return ($PF_pDias_Ant_P + $PF_pDias_Act_P);
}

function PF_Bonificacion2($categoria_cl, $PF_pDias_CfAnt_P, $PF_Total){
	
	//Categoría ("P1" o "P2"o "P3-1" o "P3-2)
	if( (strcmp($categoria_cl , "P1" ) == 0) || (strcmp($categoria_cl , "P2" ) == 0) || (strcmp($categoria_cl , "P3-1" ) == 0) || (strcmp($categoria_cl , "P3-2" ) == 0)) {
		
		$tmp = number_format(($PF_pDias_CfAnt_P*6), 2, '.', '');
		if( $tmp < $PF_Total ) {
			return ($PF_Total - $tmp);
		}else
			return 0;
	}else {
				
		$tmp = number_format(($PF_pDias_CfAnt_P*5), 2, '.', '');
		
		if( $tmp < $PF_Total ) {
			return ($PF_Total - $tmp);
		}else				// Agregado for Us
			return 0;		// Agregado for Us
	}
}
function Total_Fac_Prorrateada($actTarifVPPesos, $actTarifNPPesos) {
		return ($actTarifVPPesos + $actTarifNPPesos);
}

// --------------------------- Show Functions: Display end values on the Site 	----------------------------------------------------
function Show_CuadroAnterior_SegColumna($prim_fact, $pf_pdias_cfant_p, $fm_anterior_p) {
	if($prim_fact == 1) //Es primera factura
		return $pf_pdias_cfant_p;
	else
		return $fm_anterior_p;
}

function Show_CuadroActual_SegColumna($prim_fact, $pf_total, $fm_actual_p) {
	
	if($prim_fact == 1) //Es primera factura
		return $pf_total;
	else
		return $fm_actual_p;
}

function Show_Percent_Incremento($Show_CuadroActual_SegColumna, $Show_CuadroAnterior_SegColumna) {
	
	$ret = (($Show_CuadroActual_SegColumna / $Show_CuadroAnterior_SegColumna ) -1) * 100;
	
	return $ret;
}

function Show_CuadroAnterior_PrimColumn($get_anterior) {
	return $get_anterior;	
}

function Show_Cuadro_Actual_PrimColumn($actual) {
	
	if( strcmp($actual , "P" ) == 0)
		return P;
	else if(strcmp($actual , "Q") == 0)
		return Q;
	else if( strcmp($actual , "S") == 0)
		return S;
}

function Show_Bonificacion_sin_Impuestos($prim_fact, $pf_bonificacion2, $fm_bonificacion1_p){
	if($prim_fact == 1)
		return $pf_bonificacion2;
	else return $fm_bonificacion1_p;
}
function Show_Ahorro($percent) {
	if( (strcmp($percent , NO_APLICA ) == 0) || (strcmp($percent , NO_AHORRO ) == 0) )
		return $percent;
	else 
		return number_format($percent, 2, '.', '');	
}
?>