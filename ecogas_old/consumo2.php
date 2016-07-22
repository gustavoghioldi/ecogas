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
		/*
				echo 'Row ' . $row . ' entry: ' 	. $info[$row]['entry'] 		. '<br />';
				echo 'Row ' . $row . ' cuadro: ' 	. $info[$row]['cuadro'] 	. '<br />';
				echo 'Row ' . $row . ' categoria: ' . $info[$row]['categoria'] 	. '<br />';
				echo 'Row ' . $row . ' cargo_f: ' 	. $info[$row]['cargo_f'] 	. '<br />';
				echo 'Row ' . $row . ' focegas: ' 	. $info[$row]['focegas'] 	. '<br />';
				echo 'Row ' . $row . ' cargo_m3: ' 	. $info[$row]['cargo_m3'] 	. '<br />';
				echo 'Row ' . $row . ' fact_min: ' 	. $info[$row]['fact_min'] 	. '<br />';
				echo 'Row ' . $row . ' cargo_m3Ent1000_9000: ' . $info[$row]['cargo_m3Ent1000_9000'] 	. '<br />';
				echo 'Row ' . $row . ' Cargo_m3May9000: ' . $info[$row]['Cargo_m3May9000'] 	. '<br />';
				echo 'Row ' . $row . ' zona_tarif: ' . $info[$row]['zona_tarif'] 	. '<br />';
		*/
				
				return $info[$row][$index];
			}
				
		//if($info[$row]['entry'] == $clave)
		//	return $info[$row];
	}
}

function Ahorro($m3_pactual, $m3_panteri) {
	$gPAhorro;//=NO_APLICA;
	//$m3_pactual = $_POST['m3periodoactual'];
	//$m3_panteri = $_POST['textfield2'];


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

function Get_Anterior($tarf_social, $ahorro) {
	
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

function Get_Actual($tarf_social, $ahorro) {
	if($tarf_social == 1)
		return "S";
	if( (strcmp($ahorro , NO_APLICA ) == 0) || (strcmp($ahorro , NO_AHORRO ) == 0))
		return "P";
	if( $ahorro < AHORRO_0_15)
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
	return ($ci_atnpd * $ci_ac);
	
	
}

function makeCI_ActualTarifaViejaPPesos($ci_atvpd, $ci_an) {
	return ($ci_atvpd * $ci_an);
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
	
    $datetime1 = date_create($date_1);	//fecha fech_marcaba
    $datetime2 = date_create($date_2);	//fecha fech_marca
    
	//calculos  Si fecha marcaba es menor que limite...
	$interval = date_diff($fech_limit, $datetime1);	//limite contr fech_marcaba
	$tmp = $interval->format('%R%a');
	
	echo "<br/> ";
	echo "Diferencia entre fecha marcaba y limite=".$tmp;
	echo "<br/>";
	echo "makeCI_ActualTarifNuevaPDias() fech_marcaba=".$date_1;
	echo "<br/>";
	echo "makeCI_ActualTarifNuevaPDias() fech_marca=".$date_2;
	echo "<br/>";
	echo "makeCI_ActualTarifNuevaPDias() fech_limit=".FECHA_LIMITE;
	echo "<br/> ";
	
	//Rehacer lo siguiente
	$pos = strpos($tmp, '+');
	//intervalo negativo!! En este caso entra aqui para fechas menores a la limite
	if($pos === false) {
		$interval2 = date_diff($datetime2, $fech_limit); //fech_marca contra limite
		echo "<br/> ";
		echo "makeCI_ActualTarifNuevaPDias() fech_marca contra limite es=".$interval2->format($differenceFormat);
		echo "<br/> ";
		$tmp3=$interval2->format($differenceFormat)+1;
		
		echo "<br/> ";
		echo "makeCI_ActualTarifNuevaPDias() Parcial tmp3=".$tmp3;
		echo "<br/> ";
		
		$interval3 = date_diff($datetime2, $datetime1);
		$tmp4=$interval3->format($differenceFormat);
		
		echo "<br/> ";
		echo "makeCI_ActualTarifNuevaPDias() Parcial tmp4=".$tmp4;
		echo "<br/> ";
		
		$factor=$tmp3/$tmp4;
		$factor = number_format($factor, 2, '.', '');
	}
	echo "<br/> ";
	echo "makeCI_ActualTarifNuevaPDias() factor=".$factor;
	echo "<br/> ";
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
	echo "<br/> ";
	echo "<br/> makeCI_Actual() Parcial=".$parcial;
	echo "<br/> ";
	
	if($m3 < 1000 ) {
		$parcial += ($tmp1*$m3);
		echo "<br/> ";
		echo "<br/> makeCI_Actual() m3 < 1000 Parcial=".$parcial;
		echo "<br/> ";
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
		echo "<br/> ";
		echo "<br/> Dentro de makeCI_Anterior() parcial=".$parcial ."index=".$index;
		echo "<br/> ";
			
	}else {
		
		$tmp1 		= readTCombinaciones($txt_file, $index, FOCEGAS);
		/*
		echo "<br/> ";
		echo "<br/> tmp1=".$tmp1;
		echo "<br/> ";
		*/
		//
		$parcial+=$tmp1;
		/*
		echo "<br/> ";
		echo "<br/> val of Parcial 2=".$parcial;
		echo "<br/> ";
		*/
	}
	
	$tmp1 		= readTCombinaciones($txt_file, $index, CARGO_M3);
	$tmp2 		= readTCombinaciones($txt_file, $index, CARGOM3_ENTR_1000_9000);//CARGOM3_MAY_9000
	$tmp3 		= readTCombinaciones($txt_file, $index, CARGOM3_MAY_9000);		//
	
	
	echo "<br/> ";
	echo "<br/> makeCI_Anterior()  tmp1=".$tmp1 ." metros ingresados como actuales=".$m3 ." parcial=".$parcial ;
	echo "<br/> ";
	
	if($m3 < 1000 ) {
		
		$parcial += ($m3*$tmp1);
		
		echo "<br/> ";
		echo "<br/> makeCI_Anterior() Parcial=" .$parcial;
		echo "<br/> ";
		
		
	}else if($tmp2 < 9000 ) {
		
		
		$parcial += ($tmp1*1000) + $tmp2 * ($m3-1000) ;
		
	}else{
		$parcial += ($tmp1*1000)+ ($tmp2*8000) + $tmp3;		
	}		
	$parcial = number_format($parcial, 2, '.', '');
		echo "<br/> ";
		echo "<br/> makeCI_Anterior() Parcial=" .$parcial;
		echo "<br/> ";
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
		echo "<br/> Entro por aqui FM_Actual_P())";
		echo "<br/> fact_minima=".$fact_minima;
		echo "<br/> pdias1=".$pdias1;
		echo "<br/>";
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
		echo "<br/> Categoria (P1 o P2 o P3-1 o P3-2)";
		echo "<br/> FM_Anterior_P=".$FM_Anterior_P;
		echo "<br/> FM_Actual_P=".$FM_Actual_P;
		echo "<br/>";
		
		
		$tmp = $FM_Anterior_P*6;
		if( $tmp < $FM_Actual_P ) {
			$ret = ( $FM_Actual_P-$FM_Anterior_P * 6);
			
		}else
			$ret = 0;
	}else {
		
		echo "<br/> Categoria (P1 o P2 o P3-1 o P3-2)";
		echo "<br/> Categoria: ".$categoria_cl;
		echo "<br/> FM_Anterior_P=".$FM_Anterior_P;
		echo "<br/> FM_Actual_P=".$FM_Actual_P;
		echo "<br/>";
		$tmp = ($FM_Anterior_P*5);
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
	$ret = number_format($ret, 2, '.', '');
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
	
	echo "<br/> ";
	echo "<br/> PF_pDias_CfAnt_P() tmp1 =" .$tmp1 ." cargf = ".$cargf;
	echo "<br/> ";
	
	$tmp2 = $tmp1 * (1 - $pf_pd_cfantyact);
		
	return number_format(($mci_anter - $tmp2), 2, '.', '');//($mci_anter - $tmp2);	
}

function PF_pDias_CfAct_P($txt_file, $tarif_soc, $mci_actual, $pf_pd_cfantyact, $zonaTarifa, $actual, $categ) {
	
	$index			=	Make_StrCombinacion2($zonaTarifa, $actual, $categ);
		
	$focegas 		= 	readTCombinaciones($txt_file, $index, FOCEGAS);
	$cargf 			= 	readTCombinaciones($txt_file, $index, CARGO_FIJO);
		
	$tmp2 = ($cargf + $focegas) * (1 - $pf_pd_cfantyact);
	
	echo "<br/> ";
	echo "<br/> PF_pDias_CfAct_P() focegas =" .$focegas ." cargf = ".$cargf. " pf_pd_cfantyact = ".$pf_pd_cfantyact. " tmp2 = ".$tmp2;
	echo "<br/> ";
		
	return number_format(($mci_actual - $tmp2), 2, '.', '');//($mci_actual - $tmp2);	
}

//function PF_pDias_Act($fech_marcaba, $fech_marca){
function PF_pDias_Act($date_1 , $date_2 , $differenceFormat = '%a' )
{
	$factor=1;
	//01/04/2016 Fecha limite
	//$fech_limit = date_create("2016-04-01");
	$fech_limit = date_create(FECHA_LIMITE);
	
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
		$factor = number_format($factor, 2, '.', '');
	}
	
	return $factor;
}

function PF_pDias_Ant( $pf_pdias_act ) {
	return  number_format((1-$pf_pdias_act), 2, '.', '');
	
}
function PF_pDias_Ant_P( $PF_pDias_Act, $PF_pDias_Ant) {
	return number_format(($PF_pDias_Act * $PF_pDias_Ant), 2, '.', '');
}

function PF_pDias_Act_P($PF_pDias_Act, $PF_pDias_CfAct_P) {
	
	return number_format(($PF_pDias_Act * $PF_pDias_CfAct_P), 2, '.', '');
}

function PF_Total($PF_pDias_Ant_P, $PF_pDias_Act_P) {
	
	return number_format(($PF_pDias_Ant_P + $PF_pDias_Act_P), 2, '.', '');
}

function PF_Bonificacion2($categoria_cl, $PF_pDias_CfAnt_P, $PF_Total){
	
	//Categoría ("P1" o "P2"o "P3-1" o "P3-2)
	if( (strcmp($categoria_cl , "P1" ) == 0) || (strcmp($categoria_cl , "P2" ) == 0) || (strcmp($categoria_cl , "P3-1" ) == 0) || (strcmp($categoria_cl , "P3-2" ) == 0)) {
		echo "<br/> Categoría (P1 o P2 o P3-1 o P3-2)";
		echo "<br/> Categoría=".$categoria_cl;
		$tmp = $PF_pDias_CfAnt_P*6;
		echo "<br/> tmp=".$tmp;
		if( $tmp < $PF_Total ) {
				return ($PF_Total - $tmp);
		}else
			return 0;
	}else {
				
		$tmp = ($PF_pDias_CfAnt_P*5);
		echo "<br/> PF_Bonificacion2() PF_pDias_CfAnt_P: ".$PF_pDias_CfAnt_P;
		echo "<br/> PF_Bonificacion2() Categoria: ".$categoria_cl;
		echo "<br/> PF_Bonificacion2()   PF_Total= ". $PF_Total;
		echo "<br/> PF_Bonificacion2() (PF_pDias_CfAnt_P*5)  tmp= " .$tmp;
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
	echo "<br/>   pf_total= ". $pf_total;
	echo "<br/>   pf_pdias_cfant_p= ". $fm_actual_p;
	if($prim_fact == 1) //Es primera factura
		return $pf_total;
	else
		return $fm_actual_p;
}

function Show_Percent_Incremento($Show_CuadroActual_SegColumna, $Show_CuadroAnterior_SegColumna) {
	echo "<br/>   Parametros de = Show_Percent_Incremento() <br/>";
	echo "<br/>   Show_CuadroActual_SegColumna= ". $Show_CuadroActual_SegColumna;
	echo "<br/>   Show_CuadroAnterior_SegColumna= ". $Show_CuadroAnterior_SegColumna;
	$ret = (($Show_CuadroActual_SegColumna / $Show_CuadroAnterior_SegColumna ) -1) * 100;
	
	return $ret;
}

function Show_CuadroAnterior_PrimColumn($get_anterior) {
	return $get_anterior;	
}

function Show_Cuadro_Actual_PrimColumn($actual) {
	echo "<br/>   Param = ". $actual;
	
	if( strcmp($actual , "P" ) == 0)
		return P;
	else if(strcmp($actual , "Q") == 0)
		return Q;
	else if( strcmp($actual , "S") == 0)
		return S;
	/*	
	define('P'	,"Anexo I");
	define('Q'	,"Anexo II");
	define('S'	,"Anexo III");
	*/
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
// END ---------------------------------------Primera Factura -----------------------------------------------

$txt_file    = file_get_contents('tcombinaciones.txt');

/* Ahorro */	
$m3_pactual 	= $_POST['m3_pactual'];
$m3_panteri 	= $_POST['m3_panteri'];
$z_tarifaria 	= $_POST['z_tarifaria'];
$tarf_social 	= $_POST['tarf_social'];
$categoria_cl 	= $_POST['categoria'];
$prim_fact 		= $_POST['primer_fact'];


/* Explicando Array to JSON
$json["success"]=1;$json["a"]=$m3_pactual;$json["b"]=$m3_panteri;$json["c"]=$tarf_social;$json["d"]=$z_tarifaria;$json["e"]=$categoria_cl;
$json_string = json_encode($json);

echo $json_string;
print_r($json_string);
*/

//Fechas:
//strtotime() — Convierte un str de fecha/hora a una fecha Unix
//Date() - Convierte una fecha Unix a string con formato especificado
$fech_marcaba = date('Y/m/d', strtotime( $_POST['fechaMarcaba']));	
$fech_marca   = date('Y/m/d', strtotime( $_POST['fechaMarca']));

echo "<br/>   fecha marcaba= ". $_POST['fechaMarcaba'];
echo "<br/> ";
echo "<br/>   fecha marca= ". $_POST['fechaMarca'];


$dias_interv = makeCI_ActualTarifNuevaPDias($fech_marcaba , $fech_marca, '%a' );
$dias_interv2 = makeCI_ActualTarifaViejaPDias($fech_marcaba , $fech_marca, '%a' );

echo "<br/>   fecha marcaba= ". $fech_marcaba;
echo "<br/> ";
echo "<br/>   fecha marca= ". $fech_marca;
echo "<br/> ";
echo "<br/>   dias_interv= ". $dias_interv;
echo "<br/> ";
echo "<br/>   dias_interv2= ". $dias_interv2;
echo "<br/> ";
echo "<br/>   m3 actual = ". $m3_pactual. " metros cubicos";
echo "<br/>   m3 anterior = ". $m3_panteri . " metros cubicos";
echo "<br/>   prim_fact= ". $prim_fact;
echo "<br/> ";

$percent = Ahorro($m3_pactual, $m3_panteri);
$anterior = Get_Anterior($tarf_social, $percent);
$actual = Get_Actual($tarf_social, $percent);

echo "<br/>   Ahorro()= ". $percent;
echo "<br/> ";

echo "<br/>   Get_Actual()= ". $actual;
echo "<br/> ";

$ret1 = makeCI_Anterior($txt_file, $z_tarifaria, $anterior, $categoria_cl, $tarf_social, $m3_pactual);
echo "<br/> ";
echo "<br/>   makeCI_Anterior()= ". $ret1;
echo "<br/> ";
 
 $ret2 = makeCI_Actual($txt_file, $z_tarifaria, $actual, $categoria_cl, $tarf_social, $m3_pactual);
echo "<br/> ";
echo "<br/>   makeCI_Actual()= ". $ret2;
echo "<br/> ";

echo "<br/>   Tarifa social= ". $tarf_social;
echo "<br/>   Get_Anterior() = ". $anterior;
echo "<br/> ";

$result1 = Make_StrCombinacion1($z_tarifaria, $anterior, $categoria_cl);
$result2 = Make_StrCombinacion2($z_tarifaria, $actual, $categoria_cl);
echo "<br/>   Make_StrCombinacion1()=  ". $result1;
echo "<br/>   Make_StrCombinacion1()=  ". $result2;
echo "<br/> ";

$ret=readTCombinaciones($txt_file, $result1, FOCEGAS);
echo "<br/>   ret ". print_r($ret);
$ret=readTCombinaciones($txt_file, $result2, FOCEGAS);
echo "<br/>   ret ". print_r($ret);



$result3 = makeCI_ActualTarifaViejaPPesos($dias_interv2, $ret1);
echo "<br/>   makeCI_ActualTarifaViejaPPesos() es =". $result3. " pesos !";

$result4 = makeCI_ActualTarifaNuevaPPesos($dias_interv, $ret2);
echo "<br/>   makeCI_ActualTarifaNuevaPPesos() es =". $result4. " pesos !";

$show_tot_fac_prorrateada = $result3+$result4;
echo "<br/>   show_tot_fac_prorrateada es =". $show_tot_fac_prorrateada;

$tfPro = Total_Fac_Prorrateada($result3, $result4);
echo "<br/>   Total_Fac_Prorrateada es =". $tfPro;

//Hasta aqui pasado //martes 5 de julio 12 del 12 gaty




$result5 = FM_Anterior_P($txt_file, $prim_fact, $ret1, $tarf_social, $z_tarifaria, $anterior, $categoria_cl);
echo "<br/>   Fac_Min_Anterior_Pesos() es =". $result5;

$result6 =FM_Actual_P($txt_file, $prim_fact, $show_tot_fac_prorrateada, $dias_interv, $dias_interv2, $z_tarifaria, $anterior, $categoria_cl);
echo "<br/>   FM_Actual_P() es =". $result6;

$result7 =FM_Bonificacion1_P($categoria_cl, $result5, $result6);
echo "<br/>   FM_Bonificacion1_P() es =". $result7;



//Hasta aqui pasado 2//martes 5 de julio 12 del 12 gaty

$result8 = PF_pDias_CfAntyAct($fech_marca , $fech_marcaba );
echo "<br/>   PF_pDias_CfAntyAct() es =". $result8;

$result9 = PF_pDias_CfAnt_P($txt_file, $tarf_social, $ret1, $result8, $z_tarifaria, $anterior, $categoria_cl);
echo "<br/>   PF_pDias_CfAnt_P() es =". $result9;

$result10 = PF_pDias_CfAct_P($txt_file, $tarf_social, $ret2, $result8, $z_tarifaria, $actual, $categoria_cl);
echo "<br/>   PF_pDias_CfAct_P() es =" . $result10;

$result11 = PF_pDias_Act($fech_marcaba, $fech_marca);
echo "<br/>   PF_pDias_Act() es =" . $result11;

$result12 = PF_pDias_Act($fech_marcaba , $fech_marca, '%a' );
echo "<br/>   PF_pDias_Act() es =" . $result12;

// Parametro viene de la FUNVION ANTERIRO !!!!!!!!!!!!!!!!!1
$result13 = PF_pDias_Ant( $result12 );
echo "<br/>   PF_pDias_Ant() es =" . $result13;

$result14 = PF_pDias_Ant_P( $result9, $result13);
echo "<br/>   PF_pDias_Ant_P() es =" . $result14;

$result15 = PF_pDias_Act_P($result11, $result10);
echo "<br/>   PF_pDias_Act_P() es =" . $result15;

$result16 = PF_Total($result14, $result15);
echo "<br/>   PF_Total() es =" . $result16;

$result17 =  PF_Bonificacion2($categoria_cl, $result9, $result16);
echo "<br/>   PF_Bonificacion2() es =" . $result17;


$result18 = Show_CuadroAnterior_SegColumna($prim_fact, $result9, $result5);
echo "<br/>   Show_CuadroAnterior_SegColumna() es =" . $result18;

$result19 = Show_CuadroActual_SegColumna($prim_fact, $result16, $result6);
echo "<br/>   Show_CuadroActual_SegColumna() es =" . $result19;

$result20 = Show_Percent_Incremento($result19, $result18 );
echo "<br/>   Show_Percent_Incremento() es =" . $result20;
$result21 = number_format($result20, 0, '.', '');
echo "<br/>   Show_Percent_Incremento() Redondeado =" . $result21;

$result22 = Show_CuadroAnterior_PrimColumn($anterior);
echo "<br/>   Show_CuadroAnterior_PrimColumn() es =" . $result22;

$result23 = Show_Cuadro_Actual_PrimColumn($actual);
echo "<br/>   Show_Cuadro_Actual_PrimColumn() es =" . $result23;

$result24 = Show_Bonificacion_sin_Impuestos($prim_fact, $result17, $result7);
echo "<br/>   Show_Bonificacion_sin_Impuestos() es =" . $result24;

$result25 = Show_Ahorro($percent);
echo "<br/>   Show_Ahorro() es =" . $result25;
?>