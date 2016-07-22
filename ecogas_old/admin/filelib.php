<?php
define('FILE_CTARIFARIO',	"../tcombinaciones.txt");

//Variable globales de Crear:
//session_start();
//$_SESSION['codigo']="";
/* 
$codigo="";//"Algun";
$cargoFijo="";//123;
$factMinima="";//456;
$cuadro="";
$Focegas="";
$cargo1a9="";
$categoria;
$cargom3="";
$cargo9="";
$z_tarifaria;
*/		
				
function read_cuadroTarifarioFiltering($file, $filter) {
	$fp = fopen($file,'r');
	if (!$fp) {
		echo 'ERROR: No ha sido posible abrir el archivo. Revisa su nombre y sus permisos.'; 
		exit;
	}
	$loop = 0; // contador de líneas
	while (!feof($fp)) {
		$tmp = fgets($fp);
		$pos = strpos($tmp, $filter);
		if ($pos === false)
			$flines[] = $tmp; 	
	}
	fclose($fp);
	return $flines;		
}



function read_cuadroTarifario($file) {
	//$flines[];
	$fp = fopen($file,'r');
	if (!$fp) {
		echo 'ERROR: No ha sido posible abrir el archivo. Revisa su nombre y sus permisos.'; 
		exit;
	}
	$loop = 0; // contador de líneas
	while (!feof($fp)) {
		$flines[] = fgets($fp); 	
	}
	fclose($fp);
	return $flines;		
}

/*	------------------------------------ Seccion Cuadro Tarifador -----------------------------------	*/
function htmlPrint_cuadroTarifa($file) { 
	echo "<div  class='registros'>
	<table width='100%' border='0' align='center' cellpadding='0' cellspacing='10' id='tabla'>";
	$fp = fopen($file,'r');
	if (!$fp) {
		echo 'ERROR: No ha sido posible abrir el archivo. Revisa su nombre y sus permisos.'; 
		exit;
	}
	$loop = 0; // contador de líneas
	while (!feof($fp)) { // loop hasta que se llegue al final del archivo
		$loop++;
		$line = fgets($fp); // guardamos toda la línea en $line como un string
		// dividimos $line en sus celdas, separadas por el caracter |
		// e incorporamos la línea a la matriz $field
		$field[$loop] = explode ('|', $line);
		// generamos la salida HTML
		if(strlen($line)) {
			if( $field[$loop] != null ) {
				$value=trim($field[$loop][0])."|".trim($field[$loop][1])
									."|".trim($field[$loop][2])."|".trim($field[$loop][3])."|".trim($field[$loop][4])."|".trim($field[$loop][5])
									."|".trim($field[$loop][6])."|".trim($field[$loop][7])."|".trim($field[$loop][8])."|".trim($field[$loop][9]);
				echo "<tr>
						<td width='15' align='center' valign='middle'>
							<input type='checkbox' id='check-",$loop, "' name='cdrotarifa' value='",$value, "' >
						</td>
						<td width='50'  align='center'>".$field[$loop][0]."</td>
						<td width='50'  align='center'>".$field[$loop][1]."</td>
						<td width='50'  align='center'>".$field[$loop][2]."</td>
						<td width='60'  align='center'>".$field[$loop][3]."</td>
						<td width='50'  align='center'>".$field[$loop][4]."</td>
						<td width='60'  align='center'>".$field[$loop][5]."</td>
						<td width='70'  align='center'>".$field[$loop][6]."</td>
						<td width='120' align='center'>".$field[$loop][7]."</td>
						<td width='100' align='center'>".$field[$loop][8]."</td>
						<td width='105' align='center'>".$field[$loop][9]."</td>
					  </tr>";
				//$fp++; // necesitamos llevar el puntero del archivo a la siguiente línea
			} else {
				echo "registro con error";
			}
		}
	}
	fclose($fp);
	echo "</table></div>";
}
				
/*	End ------------------------------------ Seccion Cuadro Tarifador -----------------------------------	*/
/*	------------------------------------ Seccion Ini File -----------------------------------	*/
define('CATEGORIA', "Categoria");
define('ZTARIFARIA',"Zona_tarifaria");
define('INI_FILE', "simulador.ini");

    
/* readingFile(): Parse a ini file to multidimensional array
	argument:
		file name
	return:
		multidimensional array
*/
function readingIniFile($file) {	
	return parse_ini_file($file, true);
}

function getCategoria($file) {
	$mdarray=readingIniFile($file);
	
	foreach ($mdarray as $clave => $valor) {
		if( strcmp($clave , CATEGORIA )==0 ) {
			return $valor;
		}
		//echo "{$clave} => {$valor} ";
		//print_r($array);
	}	
}

function getZTarifaria($file) {
	$mdarray=readingIniFile($file);
	
	foreach ($mdarray as $clave => $valor) {
		if( strcmp($clave , ZTARIFARIA )==0 ) {
			//echo "Lo encontre=".$clave;
			//print_r($valor);
			return $valor;
		}
		// $array[3] se actualizará con cada valor de $array...
		//echo "{$clave} => {$valor} ";
		//print_r($array);
	}
	/*
	var_dump($mdarray);
	for ($row = 0; $row < 2; $row++) {
		var_dump($mdarray[$row]);
		if( strcmp($mdarray[$row] , ZTARIFARIA )==0 )
			echo "Lo encontre=".$mdarray[$row];
	}
	*/
}
	
/* writeIniFile(): To write back an array of objects back to the clean ini file
argument:
		1. file name
		2. multidimensional array
	return:		
*/
function writeIniFile($file, $array)
{
	$res = array();
	foreach($array as $key => $val)
	{
		if(is_array($val))
		{
			$res[] = "[$key]";
			foreach($val as $skey => $sval) $res[] = "$skey = ".(is_numeric($sval) ? $sval : '"'.$sval.'"');
		}
		else $res[] = "$key = ".(is_numeric($val) ? $val : '"'.$val.'"');
		print_r($res);
		
	}
	safelyWrite($file, implode("\r\n", $res));
}



function safelyWrite($fileName, $dataToSave)
{   
	/* with 'w' Open a file for write only. Erases the contents of the file or 
	creates a new file if it doesn't exist. 
	File pointer starts at the beginning of the file
	*/
	if ($fp = fopen($fileName, 'w'))
    {
        $startTime = microtime(TRUE);
        do
        {  
			$canWrite = flock($fp, LOCK_EX);
			// If lock not obtained sleep for 0 - 100 milliseconds, to avoid collision and CPU load
			if(!$canWrite) usleep(round(rand(0, 100)*1000));
        } while ((!$canWrite)and((microtime(TRUE)-$startTime) < 5));

        //file was locked so now we can store information
        if ($canWrite)
        {   fwrite($fp, $dataToSave);
            flock($fp, LOCK_UN);
        }
        fclose($fp);
    }
}
	
	
function writingFile($fName, $buffer) {
	/* with 'w' Open a file for write only. Erases the contents of the file or 
	creates a new file if it doesn't exist. 
	File pointer starts at the beginning of the file
	*/
	//$fp = fopen($fName, "w");
	$fh = fopen($fName,'w')         or die($php_errormsg);
	$tries = 3;
	while ($tries > 0) {
		$locked = flock($fh, LOCK_EX );
		if (! $locked) {
			sleep(1);
			$tries--;
		} else {
			// don't go through the loop again 
			$tries = 0;
		}
	}
	if ($locked) {
		fwrite($fh, $buffer) or die($php_errormsg);
		fflush($fh)                              or die($php_errormsg);
		flock($fh,	LOCK_UN)                       or die($php_errormsg);
		fclose($fh)                              or die($php_errormsg);
	} else {
		print "Can't get lock.";
	}  
}

function htmlPrint_ztarifa() {
	$ztarif= getZTarifaria(INI_FILE);
	foreach($ztarif as $text => $value){
		// <option value="4">Chamical</option>
		//echo '<a href="' . $url . '">' . $title . '</a>';
		echo '<option value="'.$value .'">' .$text .'</option>' ."\n";
	}
	
}

function htmlPrint_categoria() {
	$categ= getCategoria(INI_FILE);
	//print_r($categ);
	foreach($categ as $key => $value){
		// <option value="4">Chamical</option>
		//echo '<a href="' . $url . '">' . $title . '</a>';
		echo '<option value="'.$value .'">' .$value .'</option>' ."\n";
	}	
}

/*
$ver = read_cuadroTarifario(FILE_CTARIFARIO);
print_r($ver);
*/



?>