<?php //
require_once("filelib.php");
echo "Hola delregister" ."\n";
//echo $_SERVER['REQUEST_METHOD'] ."\n";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //something posted
	$sep="\t|\t";
	//echo "Hola GET" ."\n";
    
	if (isset($_POST['btnAcept'])) {
		$filter = $_POST['codigo'];
		//echo $filter ."\n".PHP_EOL;
		
		$fline = read_cuadroTarifarioFiltering(FILE_CTARIFARIO, $filter);
		
		/*
		$line =	PHP_EOL. $_GET['codigo'] . $sep 
				.$_GET['cargoFijo'] 	. $sep
				.$_GET['factMinima']	. $sep
				.$_GET['cuadro'] 		. $sep 
				.$_GET['Focegas']		. $sep 
				.$_GET['cargo1a9']		. $sep
				.$_GET['categoria']	. $sep 
				.$_GET['cargom3']		. $sep 
				.$_GET['cargo9']		. $sep 
				.$_GET['z_tarifaria'];
		$fline[] = $line;
		//array_push($fline, $line);
		//array_merge($fline, $line);
			
		print_r( $fline);
		*/
		safelyWrite(FILE_CTARIFARIO, implode("", $fline));		
		
	} else {
        //assume btnCancel
    }
	session_unset();
	header("Location:verDatos.php");
}
//echo "chau loco" ."\n";
?>