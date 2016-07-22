<?php //
//require_once("filelib.php");
//echo "Hola" ."\n";
//echo $_SERVER['REQUEST_METHOD'] ."\n";
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST') {
	//echo "Hola POST" ."\n";
    
	if (isset($_POST['btnModificar']) || isset($_POST['btnEliminar'])) {
		
		if( !empty($_POST['cdrotarifa']) ) {
			
			/*
			echo "Hola cdrotarifa" ."\n";
			if(isset($_POST['btnModificar'])) echo $_POST['btnModificar'] ."\n";
			if(isset($_POST['btnEliminar'])) echo $_POST['btnEliminar'] ."\n";
			echo "Hola POST" ."\n";
			var_dump($_POST);
			print_r($_POST['cdrotarifa']);
			echo $_POST['cdrotarifa'];
			*/
			//print_r($_POST['cdrotarifa']);
			$porciones = explode("|", $_POST['cdrotarifa']);
			//echo "\n";
			//print_r($porciones);
			
			//echo $_POST['cdrotarifa'];
			
			$_SESSION['codigo']=$porciones[0];
			$_SESSION['cuadro']=$porciones[1];
			$_SESSION['categoria']=$porciones[2];
			$_SESSION['cargoFijo']=$porciones[3];
			$_SESSION['Focegas']=$porciones[4];
			$_SESSION['cargom3']=$porciones[5];
			$_SESSION['factMinima']=$porciones[6];
			$_SESSION['cargo1a9']=$porciones[7];
			$_SESSION['cargo9']=$porciones[8];
			$_SESSION['z_tarifaria']=$porciones[9];
					
			//echo $_SESSION['cargoFijo'];
			/*
			global $codigo;
			$codigo=$porciones[0];
			global $cargoFijo;
			$cargoFijo=$porciones[1];
			global $factMinima;
			$factMinima=$porciones[2];
			echo $codigo ." -- ".$cargoFijo." -- ".$factMinima." -- ".$_SESSION['codigo'];
			*/
			//$hola= "hola";
			if(isset($_POST['btnEliminar'])) header("Location:eliminar.php");
			else header("Location:crear.php");
		}else {
			header("Location:verDatos.php");
			
		}
		
	} else if (isset($_POST['btnAgregar'])){
		$_SESSION['codigo']=	"";
		$_SESSION['cuadro']=	"";
		$_SESSION['categoria']=	"";
		$_SESSION['cargoFijo']=	0.0;
		$_SESSION['Focegas']=	0.0;
		$_SESSION['cargom3']=	0.0;
		$_SESSION['factMinima']=0.0;
		$_SESSION['cargo1a9']=	0.0;
		$_SESSION['cargo9']=	0.0;
		$_SESSION['z_tarifaria']="";
		header("Location:crear.php");
        //assume btnCancel
    }
	//header("Location:crear.php");
}
//echo "chau loco" ."\n";
?>