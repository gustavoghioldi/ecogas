<?php
	require_once("filelib.php");
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
        <form method="post" id="content-02" action="showdata.php" >
        <table width="100%" border="0" cellspacing="10" cellpadding="0">
                <tr>
                    <td width="12%" rowspan="2">
                        <a href="https://www.ecogas.com.ar"><img src="../images/logo.png" /></a>
                    </td>     
                    <td colspan="2" align="center" valign="bottom">
                        <h1>Ver datos</h1>
                    </td> 				
                </tr>
                <tr>
                  <td width="72%" align="right" valign="middle">Filtrar datos:</td>
                  <td width="16%" align="center" valign="middle"><input type="text" id="q" name="q" value="" class="ValCaplet input"/></td>
                </tr>
          </table>
    <hr />
            <table class="ValCalc" width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
              <tr>
                <td width="15">&nbsp;</td>
                <td width="50" align="center">Código:</td>
                <td width="50" align="center">Cuadro:</td>
                <td width="50" align="center">Categoria:</td>
                <td width="60" align="center">Cargo fijo:</td>
                <td width="50" align="center">Focegas</td>
                <td width="60" align="center">Cargo m3</td>
                <td width="70" align="center">Fact Minima:</td>
                <td width="120" align="center">Cargo m3 1000 a 9000</td>
                <td width="100" align="center">Cargo m3 &gt; 9000</td>
                <td width="105" align="center">Zona Tarifaria:</td>
              </tr>
            </table>
            
            <?php
				//require_once("filelib.php");
				htmlPrint_cuadroTarifa(FILE_CTARIFARIO);
			?>
            
  <hr />
            <table width="100%" border="0" cellspacing="10" cellpadding="0">
          	<tr>
                <td width="2%" align="center" valign="middle"><input name="btnAgregar" title="Presiona el botón Calcular para visualizar los ajustes." type="submit" href="#" value="Agregar" class="btn"/></td>
                <td width="2%" align="center" valign="middle"><input name="btnModificar" title="Presiona el botón Calcular para visualizar los ajustes." type="submit" href="#" value="Modificar" class="btn"/></td>
             <td width="8%" align="center" valign="middle">
				<input name="btnEliminar" title="Presiona el botón Calcular para visualizar los ajustes." type="submit" href="#" value="Eliminar" class="btn"/>             </td>     
			  <td width="88%" align="center" valign="middle">

			  </td> 				
              </tr>
          	<tr>
          	  <td align="center" valign="middle">
			  <!--<input type="submit" href="#" value="Buscar" class="btn"/> -->
           	  </td>
          	  <td colspan="3" align="left">&nbsp;</td>
          	  </tr>
			</table>
        </form>
		<script src="../js/jquery-2.1.js"				type="text/javascript"></script>
        <script src="../js/jquery-ui.js" 				type="text/javascript"></script>
        <script src="../js/jquery.uitablefilter.js" 	type="text/javascript"></script>
        <script src="../js/script.js" 	 				type="text/javascript"></script>
        <script>
			$(function () {
				$(".cal").datepicker();
			});
		</script>
        <div id="popUp" class="popUp">
          <a class="cerrar" href="javascript:void(0);" onclick="cerrar()">X</a>
          <h2>NOTIFICACIÓN</h2>
          <p></p>
        </div>
</body>
</html>