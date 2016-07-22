<?php
require_once("consumo.php");

$txt_file    = file_get_contents('tcombinaciones.txt');

$m3_pactual 	= $_POST['m3_pactual'];
$m3_panterior 	= $_POST['m3_panteri'];
$z_tarifaria 	= $_POST['z_tarifaria'];
$categoria_cl 	= $_POST['categoria'];
$tarf_social 	= $_POST['tarf_social'];
$primera_fact	= $_POST['primer_fact'];

if ($z_tarifaria == 13 || $z_tarifaria == 14 || $z_tarifaria == 15) {
	$z_tarifaria = 0;
}

//Fechas:
//strtotime() 	— Convierte un str de fecha/hora a una fecha Unix
//Date() 		- Convierte una fecha Unix a string con formato especificado
$fech_marcaba = date('Y/m/d', strtotime( $_POST['fechaMarcaba']));	
$fech_marca   = date('Y/m/d', strtotime( $_POST['fechaMarca']));

//
$percent 	= Ahorro($m3_pactual, $m3_panterior);


$anterior 	= Get_Anterior($tarf_social, $percent, $categoria_cl);
$actual 	= Get_Actual($tarf_social, $percent, $categoria_cl);

$dias_interv = makeCI_ActualTarifNuevaPDias($fech_marcaba , $fech_marca, '%a' );
$dias_interv2 = makeCI_ActualTarifaViejaPDias($fech_marcaba , $fech_marca, '%a' );


$ret1 = makeCI_Anterior($txt_file, $z_tarifaria, $anterior, $categoria_cl, $tarf_social, $m3_pactual);
$ret2 = makeCI_Actual($txt_file, $z_tarifaria, $actual, $categoria_cl, $tarf_social, $m3_pactual);

$result1 = Make_StrCombinacion1($z_tarifaria, $anterior, $categoria_cl);
$result2 = Make_StrCombinacion2($z_tarifaria, $actual, $categoria_cl);

$result3 = makeCI_ActualTarifaViejaPPesos($dias_interv2, $ret1);
$result4 = makeCI_ActualTarifaNuevaPPesos($dias_interv, $ret2);

$tfPro = Total_Fac_Prorrateada($result3, $result4);

$result5 = FM_Anterior_P($txt_file, $primera_fact, $ret1, $tarf_social, $z_tarifaria, $anterior, $categoria_cl);
$result6 =FM_Actual_P($txt_file, $primera_fact, $tfPro, $dias_interv, $dias_interv2, $z_tarifaria, $anterior, $categoria_cl);
$result7 =FM_Bonificacion1_P($categoria_cl, $result5, $result6);




$result8 = PF_pDias_CfAntyAct($fech_marca , $fech_marcaba );
$result9 = PF_pDias_CfAnt_P($txt_file, $tarf_social, $ret1, $result8, $z_tarifaria, $anterior, $categoria_cl);
$result10 = PF_pDias_CfAct_P($txt_file, $tarf_social, $ret2, $result8, $z_tarifaria, $actual, $categoria_cl);
$result11 = PF_pDias_Act($fech_marcaba, $fech_marca);
$result12 = PF_pDias_Act($fech_marcaba , $fech_marca, '%a' );



// Parametro viene de la FUNVION ANTERIRO !!!!!!!!!!!!!!!!!1
$result13 = PF_pDias_Ant( $result12 );
$result14 = PF_pDias_Ant_P( $result9, $result13);
$result15 = PF_pDias_Act_P($result11, $result10);
$result16 = PF_Total($result14, $result15);
$result17 =  PF_Bonificacion2($categoria_cl, $result9, $result16);

$result18 = Show_CuadroAnterior_SegColumna($primera_fact, $result9, $result5);
$result19 = Show_CuadroActual_SegColumna($primera_fact, $result16, $result6);
$result20 = Show_Percent_Incremento($result19, $result18 );
$result22 = Show_CuadroAnterior_PrimColumn($anterior);
$result23 = Show_Cuadro_Actual_PrimColumn($actual);
$result24 = Show_Bonificacion_sin_Impuestos($primera_fact, $result17, $result7);

$percent = Show_Ahorro($percent);

$json["ahorro"]					=	$percent;
$json["cuadro_actual"]			=	$result23;//"Pato";//$actual;
$json["cuadro_actual_valor"]	=	number_format($result19, 2, '.', '');//"81";
$json["cuadro_anterior"]		=	$result22;//"Pato";//$anterior;
$json["cuadro_anterior_valor"]	=	number_format($result18, 2, '.', '');//"197.45";
$json["incremento_valor"]		=	number_format($result20, 0, '.', '');//"198";
$json["bonificacion_valor"]		=	number_format($result24, 2, '.', '');//"2.19";

/*
$json["ahorro"]					=	Show_Ahorro($percent);
$json["cuadro_actual"]			=	"Pato";//$actual;
$json["cuadro_actual_valor"]	=	"333.33";//number_format($result19, 2, '.', '');//"81";
$json["cuadro_anterior"]		=	"Puto";//$anterior;
$json["cuadro_anterior_valor"]	=	"555.55";//number_format($result18, 2, '.', '');//"197.45";
$json["incremento_valor"]		=	"666.66";//number_format($result20, 0, '.', '');//"198";
$json["bonificacion_valor"]		=	"777.77";//number_format($result24, 2, '.', '');//"2.19";
*/

$json_string = json_encode($json);

//echo $percent;
echo $json_string;
?>

<?php
require_once("consumo.php");

$txt_file    = file_get_contents('tcombinaciones.txt');

$m3_pactual 	= $_POST['m3_pactual'];
$m3_panterior 	= $_POST['m3_panteri'];
$z_tarifaria 	= $_POST['z_tarifaria'];
$categoria_cl 	= $_POST['categoria'];
$tarf_social 	= $_POST['tarf_social'];
$primera_fact	= $_POST['primer_fact'];

if ($z_tarifaria == 13 || $z_tarifaria == 14 || $z_tarifaria == 15) {
	$z_tarifaria = 0;
}

//Fechas:
//strtotime() 	— Convierte un str de fecha/hora a una fecha Unix
//Date() 		- Convierte una fecha Unix a string con formato especificado
$fech_marcaba = date('Y/m/d', strtotime( $_POST['fechaMarcaba']));	
$fech_marca   = date('Y/m/d', strtotime( $_POST['fechaMarca']));

//
$percent 	= Ahorro($m3_pactual, $m3_panterior);


$anterior 	= Get_Anterior($tarf_social, $percent, $categoria_cl);
$actual 	= Get_Actual($tarf_social, $percent, $categoria_cl);

$dias_interv = makeCI_ActualTarifNuevaPDias($fech_marcaba , $fech_marca, '%a' );
$dias_interv2 = makeCI_ActualTarifaViejaPDias($fech_marcaba , $fech_marca, '%a' );


$ret1 = makeCI_Anterior($txt_file, $z_tarifaria, $anterior, $categoria_cl, $tarf_social, $m3_pactual);
$ret2 = makeCI_Actual($txt_file, $z_tarifaria, $actual, $categoria_cl, $tarf_social, $m3_pactual);

$result1 = Make_StrCombinacion1($z_tarifaria, $anterior, $categoria_cl);
$result2 = Make_StrCombinacion2($z_tarifaria, $actual, $categoria_cl);

$result3 = makeCI_ActualTarifaViejaPPesos($dias_interv2, $ret1);
$result4 = makeCI_ActualTarifaNuevaPPesos($dias_interv, $ret2);

$tfPro = Total_Fac_Prorrateada($result3, $result4);

$result5 = FM_Anterior_P($txt_file, $primera_fact, $ret1, $tarf_social, $z_tarifaria, $anterior, $categoria_cl);
$result6 =FM_Actual_P($txt_file, $primera_fact, $tfPro, $dias_interv, $dias_interv2, $z_tarifaria, $anterior, $categoria_cl);
$result7 =FM_Bonificacion1_P($categoria_cl, $result5, $result6);




$result8 = PF_pDias_CfAntyAct($fech_marca , $fech_marcaba );
$result9 = PF_pDias_CfAnt_P($txt_file, $tarf_social, $ret1, $result8, $z_tarifaria, $anterior, $categoria_cl);
$result10 = PF_pDias_CfAct_P($txt_file, $tarf_social, $ret2, $result8, $z_tarifaria, $actual, $categoria_cl);
$result11 = PF_pDias_Act($fech_marcaba, $fech_marca);
$result12 = PF_pDias_Act($fech_marcaba , $fech_marca, '%a' );



// Parametro viene de la FUNVION ANTERIRO !!!!!!!!!!!!!!!!!1
$result13 = PF_pDias_Ant( $result12 );
$result14 = PF_pDias_Ant_P( $result9, $result13);
$result15 = PF_pDias_Act_P($result11, $result10);
$result16 = PF_Total($result14, $result15);
$result17 =  PF_Bonificacion2($categoria_cl, $result9, $result16);

$result18 = Show_CuadroAnterior_SegColumna($primera_fact, $result9, $result5);
$result19 = Show_CuadroActual_SegColumna($primera_fact, $result16, $result6);
$result20 = Show_Percent_Incremento($result19, $result18 );
$result22 = Show_CuadroAnterior_PrimColumn($anterior);
$result23 = Show_Cuadro_Actual_PrimColumn($actual);
$result24 = Show_Bonificacion_sin_Impuestos($primera_fact, $result17, $result7);

$percent = Show_Ahorro($percent);

$json["ahorro"]					=	$percent;
$json["cuadro_actual"]			=	$result23;//"Pato";//$actual;
$json["cuadro_actual_valor"]	=	number_format($result19, 2, '.', '');//"81";
$json["cuadro_anterior"]		=	$result22;//"Pato";//$anterior;
$json["cuadro_anterior_valor"]	=	number_format($result18, 2, '.', '');//"197.45";
$json["incremento_valor"]		=	number_format($result20, 0, '.', '');//"198";
$json["bonificacion_valor"]		=	number_format($result24, 2, '.', '');//"2.19";

/*
$json["ahorro"]					=	Show_Ahorro($percent);
$json["cuadro_actual"]			=	"Pato";//$actual;
$json["cuadro_actual_valor"]	=	"333.33";//number_format($result19, 2, '.', '');//"81";
$json["cuadro_anterior"]		=	"Puto";//$anterior;
$json["cuadro_anterior_valor"]	=	"555.55";//number_format($result18, 2, '.', '');//"197.45";
$json["incremento_valor"]		=	"666.66";//number_format($result20, 0, '.', '');//"198";
$json["bonificacion_valor"]		=	"777.77";//number_format($result24, 2, '.', '');//"2.19";
*/

$json_string = json_encode($json);

//echo $percent;
echo $json_string;
?>

<?php
require_once("consumo.php");

$txt_file    = file_get_contents('tcombinaciones.txt');

$m3_pactual 	= $_POST['m3_pactual'];
$m3_panterior 	= $_POST['m3_panteri'];
$z_tarifaria 	= $_POST['z_tarifaria'];
$categoria_cl 	= $_POST['categoria'];
$tarf_social 	= $_POST['tarf_social'];
$primera_fact	= $_POST['primer_fact'];

if ($z_tarifaria == 13 || $z_tarifaria == 14 || $z_tarifaria == 15) {
	$z_tarifaria = 0;
}

//Fechas:
//strtotime() 	— Convierte un str de fecha/hora a una fecha Unix
//Date() 		- Convierte una fecha Unix a string con formato especificado
$fech_marcaba = date('Y/m/d', strtotime( $_POST['fechaMarcaba']));	
$fech_marca   = date('Y/m/d', strtotime( $_POST['fechaMarca']));

//
$percent 	= Ahorro($m3_pactual, $m3_panterior);


$anterior 	= Get_Anterior($tarf_social, $percent, $categoria_cl);
$actual 	= Get_Actual($tarf_social, $percent, $categoria_cl);

$dias_interv = makeCI_ActualTarifNuevaPDias($fech_marcaba , $fech_marca, '%a' );
$dias_interv2 = makeCI_ActualTarifaViejaPDias($fech_marcaba , $fech_marca, '%a' );


$ret1 = makeCI_Anterior($txt_file, $z_tarifaria, $anterior, $categoria_cl, $tarf_social, $m3_pactual);
$ret2 = makeCI_Actual($txt_file, $z_tarifaria, $actual, $categoria_cl, $tarf_social, $m3_pactual);

$result1 = Make_StrCombinacion1($z_tarifaria, $anterior, $categoria_cl);
$result2 = Make_StrCombinacion2($z_tarifaria, $actual, $categoria_cl);

$result3 = makeCI_ActualTarifaViejaPPesos($dias_interv2, $ret1);
$result4 = makeCI_ActualTarifaNuevaPPesos($dias_interv, $ret2);

$tfPro = Total_Fac_Prorrateada($result3, $result4);

$result5 = FM_Anterior_P($txt_file, $primera_fact, $ret1, $tarf_social, $z_tarifaria, $anterior, $categoria_cl);
$result6 =FM_Actual_P($txt_file, $primera_fact, $tfPro, $dias_interv, $dias_interv2, $z_tarifaria, $anterior, $categoria_cl);
$result7 =FM_Bonificacion1_P($categoria_cl, $result5, $result6);




$result8 = PF_pDias_CfAntyAct($fech_marca , $fech_marcaba );
$result9 = PF_pDias_CfAnt_P($txt_file, $tarf_social, $ret1, $result8, $z_tarifaria, $anterior, $categoria_cl);
$result10 = PF_pDias_CfAct_P($txt_file, $tarf_social, $ret2, $result8, $z_tarifaria, $actual, $categoria_cl);
$result11 = PF_pDias_Act($fech_marcaba, $fech_marca);
$result12 = PF_pDias_Act($fech_marcaba , $fech_marca, '%a' );



// Parametro viene de la FUNVION ANTERIRO !!!!!!!!!!!!!!!!!1
$result13 = PF_pDias_Ant( $result12 );
$result14 = PF_pDias_Ant_P( $result9, $result13);
$result15 = PF_pDias_Act_P($result11, $result10);
$result16 = PF_Total($result14, $result15);
$result17 =  PF_Bonificacion2($categoria_cl, $result9, $result16);

$result18 = Show_CuadroAnterior_SegColumna($primera_fact, $result9, $result5);
$result19 = Show_CuadroActual_SegColumna($primera_fact, $result16, $result6);
$result20 = Show_Percent_Incremento($result19, $result18 );
$result22 = Show_CuadroAnterior_PrimColumn($anterior);
$result23 = Show_Cuadro_Actual_PrimColumn($actual);
$result24 = Show_Bonificacion_sin_Impuestos($primera_fact, $result17, $result7);

$percent = Show_Ahorro($percent);

$json["ahorro"]					=	$percent;
$json["cuadro_actual"]			=	$result23;//"Pato";//$actual;
$json["cuadro_actual_valor"]	=	number_format($result19, 2, '.', '');//"81";
$json["cuadro_anterior"]		=	$result22;//"Pato";//$anterior;
$json["cuadro_anterior_valor"]	=	number_format($result18, 2, '.', '');//"197.45";
$json["incremento_valor"]		=	number_format($result20, 0, '.', '');//"198";
$json["bonificacion_valor"]		=	number_format($result24, 2, '.', '');//"2.19";

/*
$json["ahorro"]					=	Show_Ahorro($percent);
$json["cuadro_actual"]			=	"Pato";//$actual;
$json["cuadro_actual_valor"]	=	"333.33";//number_format($result19, 2, '.', '');//"81";
$json["cuadro_anterior"]		=	"Puto";//$anterior;
$json["cuadro_anterior_valor"]	=	"555.55";//number_format($result18, 2, '.', '');//"197.45";
$json["incremento_valor"]		=	"666.66";//number_format($result20, 0, '.', '');//"198";
$json["bonificacion_valor"]		=	"777.77";//number_format($result24, 2, '.', '');//"2.19";
*/

$json_string = json_encode($json);

//echo $percent;
echo $json_string;
?>

