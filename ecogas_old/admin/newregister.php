<?php //
require_once("filelib.php");
//echo "Hola" ."\n";
//echo $_SERVER['REQUEST_METHOD'] ."\n";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //something posted
	$sep="\t|\t";
	//echo "Hola POST" ."\n";
    
	if (isset($_POST['btnAcept'])) {
		$filter = $_POST['codigo'];
		//echo $filter ."\n".PHP_EOL;
		
		$fline = read_cuadroTarifarioFiltering(FILE_CTARIFARIO, $filter);
		//$fline = read_cuadroTarifario(FILE_CTARIFARIO);
		
		$line =	$_POST['codigo'] .$sep //PHP_EOL.
				.$_POST['cuadro'] 		.$sep
				.$_POST['categoria']	.$sep
				.$_POST['cargoFijo'] 	.$sep
				.$_POST['Focegas']		.$sep
				.$_POST['cargom3']		.$sep
				.$_POST['factMinima']	.$sep
				.$_POST['cargo1a9']		.$sep
				.$_POST['cargo9']		.$sep
				.$_POST['z_tarifaria']	.PHP_EOL;
		$fline[] = $line;
		//array_push($fline, $line);
		//array_merge($fline, $line);
			
		//print_r( $fline);
		
		safelyWrite(FILE_CTARIFARIO, implode("", $fline));		
		
	} else {
        //assume btnCancel
    }
	session_unset();
	header("Location:verDatos.php");
}
//echo "chau loco" ."\n";
?>