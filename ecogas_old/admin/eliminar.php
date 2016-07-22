<?php
//require_once("filelib.php");
session_start();
	$codigo=$_SESSION['codigo'];
	$cuadro=$_SESSION['cuadro'];
	$categoria=$_SESSION['categoria'];	
	$cargoFijo=floatval($_SESSION['cargoFijo']);//123;
	$Focegas=floatval($_SESSION['Focegas']);
	$cargom3=floatval($_SESSION['cargom3']);
	$factMinima=floatval($_SESSION['factMinima']);//456;
	$cargo1a9=floatval($_SESSION['cargo1a9']);
	$cargo9=floatval($_SESSION['cargo9']);//456;
	$z_tarifaria=$_SESSION['z_tarifaria'];
	//session_unset();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="../css/styles_form.css" 	rel="stylesheet" 	type="text/css">
        <link href="../css/fonts.css" 			rel="stylesheet" 	type="text/css">
        <link href="../css/jquery-ui.css"		rel="stylesheet" 	type="text/css">
            <title>Administrador</title>
        </head>
		<body>
        <form method="post" id="content" target="_self" action="delregister.php">
        <table width="100%" border="0" cellspacing="10" cellpadding="0">
                <tr>
                    <td width="14%">
                	<a href="verDatos.php" target="_self"><img src="../images/logo.png" /></a>
                    </td>     
                    <td width="86%" align="center" valign="middle">
                        <h1>¿Desea elimiar el campo con los siguientes registros?</h1>
                    </td> 				
                </tr>
          </table>
            <hr />
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Código:</td>
                <td><input class="ValCalc input" readonly="readonly" type="text" id="codigo" name="codigo" value="<?php echo $codigo;?>"/></td>
                <td>Cargo fijo:</td>
                <td><input class="ValCalc input" readonly="readonly" type="number" id="cargoFijo" name="cargoFijo" value="<?php echo $cargoFijo;?>"/></td>
                <td>Fact Minima:</td>
                <td><input class="ValCalc input" readonly="readonly" type="number" id="factMinima" name="factMinima" value="<?php echo $factMinima;?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Cuadro:</td>
                <td><input class="ValCalc input" readonly="readonly" type="text" id="cuadro"  name="cuadro" value="<?php echo $cuadro;?>"/></td>
                <td>Focegas</td>
                <td><input class="ValCalc input" readonly="readonly" type="number" id="Focegas" name="Focegas" value="<?php echo $Focegas;?>"/></td>
                <td>Cargo m3 1000 a 9000</td>
                <td><input class="ValCalc input" readonly="readonly" type="number" id="cargo1a9" name="cargo1a9" value="<?php echo $cargo1a9;?>"/></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Categoria:</td>
                <td>
                    <input class="ValCalc input" readonly="readonly" name="categoria" id="categoria" value="<?php echo $categoria;?>">
                </td>
                <td>Cargo m3</td>
                <td><input class="ValCalc input" readonly="readonly" type="number" id="cargom3" name="cargom3" value="<?php echo $cargom3;?>" /></td>
                <td>Cargo m3 &gt; 9000</td>
                <td><input class="ValCalc input" readonly="readonly" type="number" id="cargo9" name="cargo9" value="<?php echo $cargo9;?>" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Zona Tarifaria:</td>
                <td>
                    <input class="ValCalc input" readonly="readonly" name="z_tarifaria" id="z_tarifaria"  value="<?php echo $z_tarifaria;?>" >
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="center" valign="middle"><input name="btnCancel" title="Presiona el botón Calcular para visualizar los ajustes." type="submit" href="#" value="Cancelar" class="btn" /></td>
                <td align="center" valign="middle"><input name="btnAcept" title="Presiona el botón Calcular para visualizar los ajustes." type="submit" href="#"  value="Aceptar" class="btn"/></td>
              </tr>
            </table>
        </form>
		<script src="../js/jquery-2.1.js" type="text/javascript"></script>
        <script src="../js/jquery-ui.js" type="text/javascript"></script>
        <script src="../js/script.js" 	 type="text/javascript"></script>
        <script>
			$(function () {
				$(".cal").datepicker();
			});
			$( "#z_tarifaria" ).change(function() {
				if($( '#z_tarifaria option:selected' ).val() == 7) {
					$( '#popUp' ).hide();
				} else if( $( '#z_tarifaria option:selected' ).val() == 8 ) {
					$( '#popUp' ).hide();
				} else if( $( '#z_tarifaria option:selected' ).val() == 9 ) {
					$( '#popUp' ).hide();
				} else if( $( '#z_tarifaria option:selected' ).val() == 14) {
					$( '#popUp' ).hide();
				} else if( $( '#z_tarifaria option:selected' ).val() == 5) {
					$( '#popUp' ).hide();
				}
			});
		</script>
        <div id="popUp" class="popUp">
          <a class="cerrar" href="javascript:void(0);" onclick="cerrar()">X</a>
          <h2>NOTIFICACIÓN</h2>
          <p></p>
        </div>
</body>
</html>