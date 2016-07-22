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
        <form id="content-02">
        <table width="100%" border="0" cellspacing="10" cellpadding="0">
                <tr>
                    <td width="12%" rowspan="2">
               		  <a href="verDatos.php" target="_self"><img src="../images/logo.png" /></a>
                    </td>     
                    <td align="center" valign="bottom">
                        <h1>MODIFICAR FACTURA MINIMA POR CATEGORIA</h1>
                    </td> 				
                </tr>
                <tr>
                  <td align="right" valign="middle">&nbsp;</td>
                </tr>
       	  </table>
			<!-- TABLAS DE PARAMETROS PARA CALCULOS (ZONA TARIFARIA, ETC) -->
             <table class="ValCalc" width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
              <tr>
                <td align="center">&nbsp;</td>
               </tr>
            </table>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
                <tr>
                    <td align="right">Categoria:</td>
                    <td align="left"><input class="ValCaplet" value="" id=""/></td>
                </tr>
                <tr>
                    <td align="right">Valor:</td>
                    <td align="left"><input class="ValCaplet" value="" id=""/></td>
                </tr>
            </table>
           
          
			<hr />
            <table width="100%" border="0" cellspacing="10" cellpadding="0">
          	<tr>
                <td width="2%" align="center" valign="middle"><input 	type="button"	href="#"  	value="Agregar" 	class="btn"/></td>
                <td width="2%" align="center" valign="middle"><input 	type="button" 	href="#" 	value="Cancelar" 	class="btn"/></td>
             <td width="8%" align="center" valign="middle"></td>     
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